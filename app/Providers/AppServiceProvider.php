<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
			'App\Repositories\Contracts\RoleRepositoryInterface',
			'App\Repositories\Eloquents\RoleRepository'
		);
        $this->app->bind(
			'App\Repositories\Contracts\UserRepositoryInterface',
			'App\Repositories\Eloquents\UserRepository'
		);
		$this->app->bind(
			'App\Repositories\Contracts\PermissionRepositoryInterface',
			'App\Repositories\Eloquents\PermissionRepository'
		);
		$this->app->bind(
			'App\Repositories\Contracts\PermissionRoleRepositoryInterface',
			'App\Repositories\Eloquents\PermissionRoleRepository'
		);
    }
}
