<?php namespace MetinSeylan\XenBridge;

use Illuminate\Support\ServiceProvider;

class XenBridgeServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['XenBridge'] = $this->app->share(function($app)
                {
                    $app['XenBridge.loaded'] = true;
                    return new XenBridge;
                });
	}
        
        public function boot()
        {
            
            
            
            $this->package('MetinSeylan/XenBridge');
            XenBridge::boot();
            
        }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('XenBridge');
	}

}