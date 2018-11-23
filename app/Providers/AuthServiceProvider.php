<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
		Post::class=>PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
		Gate::before(function ($user){
			if($user->role->role === config('constant-auth.superAdmin')) {
				return true;
			}
		});
		Gate::resource('posts', 'PostPolicy');

//		Gate::define('posts.view', 'PostPolicy@view');
//		Gate::define('posts.create', 'PostPolicy@create');
//		Gate::define('posts.update', 'PostPolicy@update');
//		Gate::define('posts.delete', 'PostPolicy@delete');
    }
}
