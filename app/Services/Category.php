<?php

namespace Hel\Services;

use Hel\Services\SlugGeneratorTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use SlugGeneratorTrait;

    protected $table = 'projects_categories';
    protected $fillable = ['name', 'slug'];

    public function projects()
    {
        return $this->morphedByMany('Hel\Services\Projects\Project', 'projects_categoryables', null, 'project_category_id', 'project_category_id');
    }

    public static function processCategoriesToArray($categoryString, $returnModel = false)
    {
        $categories = explode(',', $categoryString);
        array_walk($categories, function (&$category) {
            trim($category);
        });
        if (!empty($returnModel)) {
            return static::trasnlateToModels($categories);
        }
        return static::trasnlateToIds($categories);
    }

    public static function trasnlateToIds($categories)
    {
        array_walk($categories, function (&$category) {
            $t = Tag::firstOrCreate(['name' => $category]);
            $category = $t->id;
        });
        return $categories;
    }

    public static function trasnlateToModels($categories)
    {
        array_walk($categories, function (&$category) {
            $category = Tag::firstOrCreate(['name' => $category]);
        });
        return $categories;
    }

    public function searchByCategory($category, $categoryable)
    {
        $category = $this->where('slug', '=', $category)->firstOrFail();
        return ['category' => $category, 'collection' => $category->{$categoryable}()->orderBy('created_at', 'desc')->where('is_published', '=', '1')->get()];
    }

    public function forSelect()
    {
        $data = [];
        $this->orderBy('name')->get()->each(function ($cate) use (&$data) {
            $data[$cate->id] = $cate->name;
        });
        return $data;
    }
}
