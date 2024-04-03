<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Order;
use App\Models\Item;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request) : View
    {
        $total = 0;
        $moviesInCart = [];
        $moviesInSession = $request->session()->get("movies");

        if ($moviesInSession) {
            $moviesInCart = Movie::findMany(array_keys($moviesInSession));
            $total = Movie::sumPricesByQuantities($moviesInCart, $moviesInSession);
        }

        $viewData = [];
        $viewData["title"] = "Cart - PopMovies";
        $viewData["subtitle"] = "Shopping Cart";
        $viewData["total"] = $total;
        $viewData["movies"] = $moviesInCart;
        return view('cart.index')->with("viewData", $viewData);
    }

    public function add(Request $request, int $id) : RedirectResponse | View
    {
        $movie = Movie::findOrFail($id);
        $quantityToAdd = $request->input('quantity');
        if ($quantityToAdd > $movie->getStock()) {
            return redirect()->route('movie.show', $id)->with('error', 'Insufficient stock to add to cart.');
        }

        $movies = $request->session()->get("movies");
        $movies[$id] = $quantityToAdd;
        $request->session()->put('movies', $movies);

        $viewData = [];
        $viewData["title"] = $movie->getTitle()." - Movies available";
        $viewData["subtitle"] = $movie->getTitle()." - Movie information";
        $viewData["movie"] = $movie;

        session()->flash('success', 'The movie has been added to cart.');

        return view('movie.show')->with("viewData", $viewData);
    }

    public function delete(Request $request) : RedirectResponse
    {
        $request->session()->forget('movies');
        return back();
    }

    public function purchase(Request $request) : View | RedirectResponse
    {
        $moviesInSession = $request->session()->get("movies");
        if ($moviesInSession) {
            $userId = Auth::user()->getId();
            $user = Auth::user();

            $total = 0;
            $moviesInCart = Movie::findMany(array_keys($moviesInSession));

            if ($user->getBalance() >= $total) {
                $order = new Order();
                $order->setUserId($userId);
                $order->setTotal(0);
                $order->save();

                foreach ($moviesInCart as $movie) {
                    $quantity = $moviesInSession[$movie->getId()];
                    $item = new Item();
                    $item->setQuantity($quantity);
                    $item->setPrice($movie->getPrice());
                    $item->setMovieId($movie->getId());
                    $item->setOrderId($order->getId());
                    $movie->decrement('stock', $quantity);
                    $item->save();
                    $total = $total + ($movie->getPrice()*$quantity);
                }

                $order->setTotal($total);
                $order->save();

                $newBalance = $user->getBalance() - $total;
                $user->setBalance($newBalance);
                $user->save();

                $request->session()->forget('movies');

                $viewData = [];
                $viewData["title"] = "Purchase - PopMovies";
                $viewData["subtitle"] = "Purchase Status";
                $viewData["order"] = $order;

                return view('cart.purchase')->with("viewData", $viewData);
            } else {
                return redirect()->route('cart.index')->with('error', 'Insufficient balance to complete the purchase.');
            }
        } else {
            return redirect()->route('cart.index');
        }
    }
}
