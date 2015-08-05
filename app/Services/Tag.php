<?php

namespace Hel\Services;

use Illuminate\Database\Eloquent\Model;
use Hel\Services\SlugGeneratorTrait;

class Tag extends Model
{
    use SlugGeneratorTrait;

    protected $table = 'projects_tags';
    protected $fillable = ['name'];

    public function projects() {
        return $this->morphedByMany('Hel\Services\Projects\Project', 'projects_taggable', null, 'project_tag_id', 'project_tag_id');
    }

    public static function processTagsToArray($tagString, $returnModel = false)
    {
        $tags = explode(',', $tagString);
        array_walk($tags, function (&$tag) {
            trim($tag);
        });
        if (!empty($returnModel)) {
            return static::trasnlateToModels($tags);
        }
        return static::trasnlateToIds($tags);
    }

    public static function trasnlateToIds($tags)
    {
        array_walk($tags, function (&$tag) {
            $t = Tag::firstOrCreate(['name' => $tag]);
            $tag = $t->id;
        });
        return $tags;
    }

    public static function trasnlateToModels($tags)
    {
        array_walk($tags, function (&$tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
        });
        return $tags;
    }

    public function searchByTag($tag, $taggable)
    {
        $tag = $this->where('slug', '=', $tag)->firstOrFail();
        return ['tag' => $tag, 'collection' => $tag->{$taggable}()->orderBy('created_at', 'desc')->where('is_published', '=', '1')->get()];
    }

    public function forSelect(){
        $data = [];
        $this->orderBy('name')->get()->each(function($cate) use (&$data){
            $data[$cate->id] = $cate->name;
        });
        return $data;
    }

}
