<?php

namespace Yoeunes\Notify\Alert;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Yoeunes\Notify\Laravel\Session\Session;
use Yoeunes\Notify\Alert\Factories\AlertFactory;
use Yoeunes\Notify\NotifyManager;

class NotifyAlertServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAlertFactory();
    }

    public function registerAlertFactory()
    {
        $this->app->extend('notify', function (NotifyManager $manager, Application $app) {
            $session = $app['session'];

            $manager->extend('alert', function ($config) use ($session) {
                return new AlertFactory($config, new Session($session));
            });

            return $manager;
        });
    }
}
