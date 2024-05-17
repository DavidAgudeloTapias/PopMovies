<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() : View
    {
        $viewData = [];
        $viewData["title"] = trans("app.home_controller.title");

        $response = Http::get('https://api.adviceslip.com/advice');

        if ($response->successful()) {
            $viewData['advice'] = $response->json()['slip']['advice'];
        } else {
            $viewData['advice'] = "No advice available at the moment.";
        }

        return view('home.index')->with("viewData", $viewData);
    }
}
