<?php
namespace Mbhanife\LaravelUsersAcl\Models;

use Illuminate\Database\Eloquent\Model;
use Mbhanife\LaravelUsersAcl\Models\Traits\HasPermissions;

class Role extends Model
{
    use HasPermissions;

    protected $fillable = [
        'name',
    ];
}
