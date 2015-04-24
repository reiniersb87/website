<?php namespace Hel\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Hel\Services\Projects\Project;
use Hel\Services\Category;
use Hel\Services\Tag;
use Hel\Services\SlugGeneratorObserver;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);
		Project::observe(new SlugGeneratorObserver);
		Category::observe(new SlugGeneratorObserver);
		Tag::observe(new SlugGeneratorObserver);
	}

}
