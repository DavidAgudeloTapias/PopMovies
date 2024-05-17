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
        $viewData['title'] = trans("app.news_controller.title");
        $viewData['subtitle'] = trans("app.news_controller.subtitle");
        
        $orderDate = $request->input('order');
        $orderTitle = $request->input('alphabetical');

        if ($orderDate && in_array($orderDate, ['asc', 'desc'])) {
            $viewData['news'] = News::orderBy('created_at', $orderDate)->get();
        } elseif ($orderTitle && in_array($orderTitle, ['asc', 'desc'])) {
            $viewData['news'] = News::orderBy('title', $orderTitle)->get();
        } else {
            $viewData['news'] = News::all();
        }

        return view('news.index')->with('viewData', $viewData);
    }

    public function show(int $id) : View
    {
        $viewData = [];
        $news = News::findOrFail($id);
        $viewData['title'] = $news['title'];
        $viewData['subtitle'] = trans("app.news_controller.info");
        $viewData['news'] = $news;

        return view('news.show')->with('viewData', $viewData);
    }
}
