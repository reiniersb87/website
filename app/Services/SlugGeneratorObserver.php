<?php 

namespace Hel\Services;
use Hel\Services\SlugGeneratorTrait;

class SlugGeneratorObserver {

	use SlugGeneratorTrait;

	public $model;

    public function saving($model) {
        $this->model = $model;
        if(!isset($this->model->id)){
            $this->model->slug = $this->generateSlug($this->model->name);
        }
    }
}