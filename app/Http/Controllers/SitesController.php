<?php

namespace Hel\Http\Controllers;

use Hel\Http\Controllers\Controller;
use Hel\Services\Projects\ProjectService;
use Hel\Http\Requests\CreateProjectRequest;
use Hel\Services\Projects\Project;
use Joselfonseca\ImageManager\ImageRender;
use Hel\Services\Category;
use Hel\Services\Tag;

class SitesController extends Controller
{

    private $service;
    private $img;

    public function __construct(ProjectService $service, ImageRender $img)
    {
        $this->service = $service;
        $this->img = $img;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('sites.index')
            ->with('projects', $this->service->getProjects())
            ->with('currentMenu', 'proyectos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('sites.create')
            ->with('categories', $this->service->getCategories())
            ->with('tags', $this->service->getTags())
            ->with('currentMenu', 'addproject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $this->service->createProject($request);
        flash()->success('Gracias! Se ha enviado el proyecto para revisión');
        return redirect('/proyectos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        // related tags 
        $c = $project->categories;
        $related = Project::whereHas('categories', function ($query) use ($c) {
            $categories = [];
            $c->each(function ($cate) use ($query, &$categories) {
                $categories[] = $cate->id;
            });
            $query->whereIn('projects_categories.id', $categories);
        })->where('is_published', 1)->where('id', '!=', $project->id)->take(3)->get();
        return view('sites.show')->with('project', $project)->with('related', $related)->with('currentMenu', 'proyectos');
    }

    public function byCategory($slug)
    {
        $category = new Category;
        $collection = $category->searchByCategory($slug, 'projects');
        return view('sites.index')
            ->with('categoryOn', $collection['category'])
            ->with('projects', $collection['collection'])
            ->with('currentMenu', 'proyectos');
    }

    public function byTag($slug)
    {
        $tag = new Tag;
        $collection = $tag->searchByTag($slug, 'projects');
        return view('sites.index')
            ->with('tagOn', $collection['tag'])
            ->with('projects', $collection['collection'])
            ->with('currentMenu', 'proyectos');
    }

}
