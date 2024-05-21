<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AdminNewsController extends Controller
{
    public function index() : View
    {
        $viewData = [];
        $viewData["title"] = trans("admin.news_controller.index_title");
        $viewData["news"] = News::all();
        return view('admin.news.index')->with("viewData", $viewData);
    }

    public function store(Request $request) : RedirectResponse
    {
        $newNews = new News();
        $newNews->setTitle($request->input('title'));
        $newNews->setContent($request->input('content'));
        $newNews->setSource($request->input('source'));
        $newNews->setImage("game.png");
        $newNews->save();

        if ($request->hasFile('image')) {
            $imageName = $newNews->getId().".".$request->file('image')->extension();
            $imagePath = 'img/news/'.$imageName;
            $request->file('image')->move(public_path('img/news'), $imageName);

            $newNews->setImage($imagePath);
            $newNews->save();
        }

        return back();
    }

    public function delete(int $id) : RedirectResponse
    {
        News::destroy($id);
        return back();
    }

    public function edit(int $id) : View
    {
        $viewData = [];
        $viewData["title"] = trans("admin.news_controller.edit_title");
        $viewData["news"] = News::findOrFail($id);
        return view('admin.news.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, int $id) : RedirectResponse
    {
        $news = News::findOrFail($id);
        $news->setTitle($request->input('title'));
        $news->setContent($request->input('content'));
        $news->setSource($request->input('source'));

        if ($request->hasFile('image')) {
            $imageName = $news->getId().".".$request->file('image')->extension();
            $imagePath = 'img/news/'.$imageName;
            $request->file('image')->move(public_path('img/news'), $imageName);

            $news->setImage($imagePath);
        }

        $news->save();

        return redirect()->route('admin.news.index');
    }
}
