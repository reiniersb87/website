<?php

namespace Hel\Services\Projects;

use Joselfonseca\ImageManager\ImageManager;
use Hel\Events\ProjectWasCreated;
use Hel\Services\Category;
use Hel\Services\Tag;

class ProjectService {

	private $image;

	public function __construct(ImageManager $image){
		$this->image = $image;
	}

	public function getCategories(){
		$c = new Category;
		return $c->forSelect();
	}

	public function getTags(){
		$t = new Tag;
		return $t->forSelect();
	}

	public function createProject($request){
		$file = $this->image->doUpload();
		$input = $request->all();
		$projectData = [
			'image_id' => $file->id,
			'name' => $input['name'],
			'slug' => Project::generateSlug($input['name']),
			'description' => $input['description'],
			'url' => $input['url'],
			'user_email' => $input['user_email'],
			'user_twitter' => str_replace('@', '', $input['user_twitter']),
		];
		$project = Project::create($projectData);
		$project->tags()->sync($input['tags']);
		$project->categories()->sync($input['categories']);
		event(new ProjectWasCreated($project));
		return $project;
	}

}