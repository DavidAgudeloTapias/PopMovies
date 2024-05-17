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
        $viewData["title"] = trans("app.account_controller.title");
        $viewData["subtitle"] = trans("app.account_controller.subtitle");
        $viewData["orders"] = Order::with(['items.movie'])->where('user_id', Auth::user()->getId())->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }
}
