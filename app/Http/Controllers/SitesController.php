<?php

namespace Hel\Http\Controllers;

use Hel\Http\Controllers\Controller;
use Hel\Services\Projects\ProjectService;
use Hel\Http\Requests\CreateProjectRequest;
use Hel\Services\Projects\Project;
use Joselfonseca\ImageManager\ImageRender;

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
                ->with('currentMenu', 'home');
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

    public function projectImage($id, $heigth){
        try {
            $i = \Joselfonseca\ImageManager\Models\ImageManagerFiles::find($id);
            $this->img->setProperties(IM_UPLOADPATH, $i->path, null, $heigth, false);
        } catch (ModelNotFoundException $e) {
            $this->img->setProperties(null, null, null, $heigth, false);
        }
        return $this->img->render();
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
    	return redirect('/');
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
     * @param  int  $id
     * @return Response
     */
    public function update($id)
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
