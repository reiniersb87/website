<?php namespace Hel\Events;

use Hel\Events\Event;

use Illuminate\Queue\SerializesModels;

class ProjectWasCreated extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

}
