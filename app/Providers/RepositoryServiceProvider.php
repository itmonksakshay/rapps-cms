<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MediaRepository;
use App\Contracts\MediaContract;
use App\Repositories\UserRoleRepository;
use App\Contracts\UserRoleContract;
use App\Repositories\UserManagementRepository;
use App\Contracts\UserManagementContract;
use App\Repositories\RappUserRepository;
use App\Contracts\RappUserContract;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        MediaContract::class => MediaRepository::class,
        UserRoleContract::class => UserRoleRepository::class,
        UserManagementContract::class => UserManagementRepository::class,
        RappUserContract::class => RappUserRepository::class,
    ];
    public function register(){
		
		foreach ($this->repositories as $interface => $implementation){
			
			$this->app->bind($interface, $implementation);
		}
      
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
