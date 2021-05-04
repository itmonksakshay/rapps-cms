<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MediaRepository;
use App\Contracts\MediaContract;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        MediaContract::class => MediaRepository::class
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
