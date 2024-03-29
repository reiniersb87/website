<?php

namespace Hel\Http\Controllers;

use Hel\User;
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
        })->orderBy('created_at', 'DESC')->paginate(12);
        return view('news.index')->with('articles', $articles)->with('currentMenu', 'news');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $articles = Article::where('published', 1)->whereNotIn('id', [$article->id])
            ->whereHas('categories', function($query){
                $query->where('slug', 'noticias');
            })->orderBy('created_at', 'DESC')->take(3)->get();
        return view('news.show')
            ->with('article', $article)
            ->with('articles', $articles)
            ->with('author', User::find($article->user_id))
            ->with('currentMenu', 'news');
    }
}
