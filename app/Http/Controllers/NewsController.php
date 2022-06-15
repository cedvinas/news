<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::get();
        return view('news.index', compact('news'));
    }

    public function show(News $news): View
    {
        return view('news.show', compact('news'));
    }

    public function create(Request $request): RedirectResponse|View
    {
        if ($request->isMethod('post')) {

             $request->validate([
                'title' => 'required|between:2,100',
                'active' => 'required'
            ]);

            News::create($request->all());

            return redirect('/index')
                ->with('success', 'Article created successfully!');
        }

        return view('news.create');
    }


    public function edit(News $news, Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|between:2,255',
                'active' => 'required',
            ]);

            $news->update($request->all());

            return redirect(route('show', $news->id))
                ->with('success', 'Article updated successfully!');
        }
        
        return view('news.edit', ['news' => $news]);
    }

    

    public function delete(News $new): RedirectResponse
    {
        $new->delete();

        return redirect(url('/index'))->with('success', 'Article deleted successfully!');
    }
}
