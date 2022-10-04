<?php

namespace Mbhanife\LaravelUsersAcl\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Mbhanife\LaravelUsersAcl\Models\Permission;

class RolesPermissionsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if (Schema::hasTable('permissions'))
        {
            Permission::all()->map(function ($permission){
                Gate::define($permission->name, function ($user) use ($permission){
                    foreach($user->roles as $role){
                        if($role->hasPermission($permission)) return true;
                    }
                });
            });
        }

    }
}
