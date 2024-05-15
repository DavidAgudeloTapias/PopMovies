<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders() : View
    {
        $viewData = [];
        $viewData["title"] = "My Orders - PopMovies";
        $viewData["subtitle"] = "My Orders";
        $viewData["orders"] = Order::with(['items.movie'])->where('user_id', Auth::user()->getId())->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }
}
