<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class PlantController extends Controller
{
    public function index() : View
    {
        $plantsResponse = Http::get('http://34.134.181.54/public/api/plants');
        
        if ($plantsResponse->successful()) {
            $plants = $plantsResponse->json();
        } else {
            $plants = [];
        }

        $viewData['plants'] = $plants;

        return view('plants.index')->with('viewData', $viewData);
    }
}
