<?php

namespace Vueon;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class VueonServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'vueon');

		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__ . '/../vite' => base_path('vue-project')
			], 'vueon-config');

			$this->publishes([
				__DIR__ . '/../resources/views' => resource_path('views/vendor/vueon'),
			], 'vueon-views');
		}

		Blade::directive('vueon', function () {
			return file_get_contents(base_path() . '/public/index.html');
		});
	}
}
