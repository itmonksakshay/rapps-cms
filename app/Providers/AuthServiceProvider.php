<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];




    /**
     * Register any authentication / authorization services.
     *
     * @return void
     * 
     * 
     */
     
     public function register () {
        $this->app['auth']->provider('eliptic-curve-based-auth-provider', function ($app, array $config) {
            return new RappUserAuthProvider();
        });
	}
     
     
     
     
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
