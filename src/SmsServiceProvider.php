<?php


namespace Ssl\Isms;
use Illuminate\Support\ServiceProvider;


class SmsServiceProvider extends ServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return  void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/isms.php' => config_path('isms.php'),
        ], 'isms');
    }    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/isms.php',
            'isms'
        );
    }
}
