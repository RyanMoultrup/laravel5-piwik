<?php 

namespace RyanMoultrup\Piwik;

use Illuminate\Support\ServiceProvider;

class PiwikServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
		    __DIR__.'/../../config/config.php' => config_path('piwik.php'),
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('piwik', function() {
        	return new Piwik;
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('RyanMoultrup\Piwik\Piwik');
	}

}