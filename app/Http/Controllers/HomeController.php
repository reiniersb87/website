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
        $articles = Article::where('published', 1)->orderBy('created_at', 'DESC')->paginate(20);
		return view('home')->with('articles', $articles)->with('activeMenu', 'home');
	}

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $articles = Article::where('published', 1)->whereNotIn('id', [$article->id])->orderBy('created_at', 'DESC')->take(5);
        return view('episode')
            ->with('article', $article)
            ->with('articles', $articles)
            ->with('activeMenu', 'home');
    }

}
