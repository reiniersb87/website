<?php

namespace Hel\Http\Controllers;

use Illuminate\Http\Request;

use Hel\Http\Requests;
use Hel\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Joselfonseca\LaravelAdminBlog\Services\Article;
use Roumen\Feed\Facades\Feed;


class RssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function news()
    {
        // create new feed
        $feed = Feed::make();

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'laravelFeedKey');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts

            $posts = Article::where('published', 1)->whereHas('categories', function($query){
                $query->where('slug', 'noticias');
            })->orderBy('created_at', 'DESC')->get();
            // set your feed's title, description, link, pubdate and language
            $feed->title = 'RSS Noticias';
            $feed->description = 'Noticias Laravel RSS';
            $feed->logo = 'http://yoursite.tld/logo.jpg';
            $feed->link = URL::to('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $posts[0]->created_at;
            $feed->lang = 'es';
            $feed->setShortening(false); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($posts as $post)
            {
                // set item's title, author, url, pubdate, description and content
                $feed->add($post->title, $post->author, URL::to("noticias/" . $post->slug), $post->created_at, $post->body,$post->intro);
            }

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
