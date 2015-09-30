<?php

namespace Hel\Http\Controllers;

use Joselfonseca\LaravelAdminBlog\Services\Article;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $articles = Article::where('published', 1)->whereHas('categories', function($query){
            $query->where('slug', 'podcast');
        })->orderBy('created_at', 'DESC')->paginate(12);
		return view('home')->with('articles', $articles)->with('currentMenu', 'home');
	}

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $articles = Article::where('published', 1)->whereNotIn('id', [$article->id])
            ->whereHas('categories', function($query){
                $query->where('slug', 'podcast');
            })->orderBy('created_at', 'DESC')->take(5)->get();
        return view('episode')
            ->with('article', $article)
            ->with('articles', $articles)
            ->with('currentMenu', 'home');
    }

}
