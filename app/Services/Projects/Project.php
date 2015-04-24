<?php

namespace Hel\Services\Projects;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{

	protected $table = 'projects';
	protected $fillable = ['image_id', 'name', 'slug', 'description', 'url', 'user_email', 'user_twitter', 'is_published', 'is_featured', 'is_new'];

	public function tags() {
        return $this->morphToMany('Hel\Services\Tag', 'taggable');
    }

	public function categories() {
        return $this->morphToMany('Hel\Services\Category', 'categorable');
    }

    
}
