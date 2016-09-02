<?php

namespace App\Providers;

use Schema;

use App\Models\UserControl\Permission;

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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        if(Schema::hasTable('permissions')){
            foreach(Permission::all() as $permission) {
                Gate::define($permission->name, function($user) use ($permission) {
                    return $user->hasGroup($permission->groups);
                });
            }
        }
    }
}
