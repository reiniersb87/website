<?php

namespace Hel\Http\Controllers;

use Hel\Http\Controllers\Controller;
use Hel\Services\Projects\ProjectService;
use Hel\Http\Requests\CreateProjectRequest;

class SitesController extends Controller
{

	private $service;

	public function __construct(ProjectService $service)
	{
		$this->service = $service;
	}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('sites.index')->with('currentMenu', 'home');
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
