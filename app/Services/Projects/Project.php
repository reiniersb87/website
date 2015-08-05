<?php

namespace Hel\Services\Projects;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{

	protected $table = 'projects';
	protected $fillable = ['image_id', 'name', 'slug', 'description', 'url', 'user_email', 'user_twitter', 'is_published', 'is_featured', 'is_new'];

	public function tags() {
        return $this->morphToMany('Hel\Services\Tag', 'projects_taggable', null, null, 'project_tag_id');
    }

	public function categories() {
        return $this->morphToMany('Hel\Services\Category', 'projects_categoryables', null, null, 'project_category_id');
    }

    
}
