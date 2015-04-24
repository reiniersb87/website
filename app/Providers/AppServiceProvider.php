<?php namespace Hel\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Hel\Services\Category;
use Hel\Services\Tag;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::composer('*', function($view)
		{
		    $view->with('categoriesList', Category::orderBy('name', 'asc')->get())
		    ->with('tagList', Tag::orderBy('name', 'asc'));
		});
		
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'Hel\Services\Registrar'
		);
	}

}
