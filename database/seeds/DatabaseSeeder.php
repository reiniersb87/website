<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Hel\Services\Category;
use Hel\Services\Tag;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		Category::create(['name' => 'Sitio Web']);
		Category::create(['name' => 'E-Commerce']);
		Category::create(['name' => 'API']);
		Category::create(['name' => 'Negocios']);
		Category::create(['name' => 'Open Source']);
		Category::create(['name' => 'Portafolio']);
		Category::create(['name' => 'Blog']);
		Category::create(['name' => 'Servicio al cliente']);
		Category::create(['name' => 'Agencia']);
		Category::create(['name' => 'Entretenimiento']);
		Category::create(['name' => 'Tecnología']);
		Category::create(['name' => 'Educación']);
		Category::create(['name' => 'Software como servicio']);
		Category::create(['name' => 'Servicios']);
		// create tags
		Tag::create(['name' => 'Laravel 4']);
		Tag::create(['name' => 'Laravel 5']);
		Tag::create(['name' => 'CMS']);
		Tag::create(['name' => 'PyroCMS']);
		Tag::create(['name' => 'PongoCMS']);
		Tag::create(['name' => 'Paquetes']);
		Tag::create(['name' => 'Blog']);
		Tag::create(['name' => 'Bootstrap']);
		Tag::create(['name' => 'Foundation']);
		Tag::create(['name' => 'Semantic UI']);
		Tag::create(['name' => 'API']);
	}

}
