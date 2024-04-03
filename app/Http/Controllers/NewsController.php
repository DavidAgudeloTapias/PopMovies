<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request) : View
    {
        $viewData = [];
        $viewData['title'] = 'News - PopMovies';
        $viewData['subtitle'] = 'List of News';
        $viewData['news'] = News::all();

        $orderDate = $request->input('order', 'desc');
        if ($orderDate) {
            $viewData['news'] = News::orderBy('created_at', in_array($orderDate, ['asc', 'desc']) ? $orderDate : 'desc')->get();
        } 

        $orderTitle = $request->input('alphabetical');
        if ($orderTitle) {
            $viewData['news'] = News::orderBy('title', in_array($orderTitle, ['asc', 'desc']) ? $orderTitle : 'desc')->get();
        }

        return view('news.index')->with('viewData', $viewData);
    }

    public function show(int $id) : View
    {
        $viewData = [];
        $news = News::findOrFail($id);
        $viewData['title'] = $news['title'];
        $viewData['subtitle'] = 'News information';
        $viewData['news'] = $news;

        return view('news.show')->with('viewData', $viewData);
    }
}
