<?php

namespace Hel\Http\Controllers;

use Joselfonseca\LaravelAdminBlog\Services\Article;

/**
 * Class HomeController
 * @package Hel\Http\Controllers
 */
class PodcastsController extends Controller {

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
		return view('podcast.index')->with('articles', $articles)->with('currentMenu', 'home');
	}

    /**
     * @param $slug
     * @return $this
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $articles = Article::where('published', 1)->whereNotIn('id', [$article->id])
            ->whereHas('categories', function($query){
                $query->where('slug', 'podcast');
            })->orderBy('created_at', 'DESC')->take(5)->get();
        return view('podcast.show')
            ->with('article', $article)
            ->with('articles', $articles)
            ->with('currentMenu', 'home');
    }

}
