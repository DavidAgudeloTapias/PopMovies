<?php
namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() : View
    {
        $viewData = [];
        $viewData["title"] = trans("app.home_controller.title");
        return view('home.index')->with("viewData", $viewData);
    }
}
