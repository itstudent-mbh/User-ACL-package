<?php
namespace Mbhanife\LaravelUsersAcl\Facades;

use Illuminate\Support\Facades\Facade;

class AclFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'cms';
    }
}
