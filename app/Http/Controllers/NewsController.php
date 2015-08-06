<?php

namespace Hel\Http\Controllers;

use Illuminate\Http\Request;

use Hel\Http\Requests;
use Hel\Http\Controllers\Controller;
use Joselfonseca\LaravelAdminBlog\Services\Article;

class NewsController extends Controller
{
    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::where('published', 1)->whereHas('categories', function($query){
            $query->where('slug', 'noticias');
        })->orderBy('created_at', 'DESC')->paginate(20);
        return view('news')->with('articles', $articles)->with('currentMenu', 'news');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $articles = Article::where('published', 1)->whereNotIn('id', [$article->id])
            ->whereHas('categories', function($query){
                $query->where('slug', 'noticias');
            })->orderBy('created_at', 'DESC')->take(5)->get();
        return view('new')
            ->with('article', $article)
            ->with('articles', $articles)
            ->with('currentMenu', 'news');
    }
}
