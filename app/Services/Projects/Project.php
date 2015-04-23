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

    public static function generateSlug($name) {
        $slug = str_slug($name);
        $slugCount = count(Project::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
}
