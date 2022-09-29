<?php
namespace Mbhanife\LaravelUsersAcl\Models\Traits;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;
use Mbhanife\LaravelUsersAcl\Models\Role;

trait HasRoles
{

    /**
     * The roles that belong to the HasRoles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function giveRoles(... $roles)
    {
        $roles = $this->getAllRoles($roles);

        if ($roles->isEmpty()) return $this;

        $this->roles()->syncWithoutDetaching($roles);

        return $this;

    }

    public function withdrawRoles(... $roles)
    {
        $roles = $this->getAllRoles($roles);

        $this->roles()->detach($roles);

        return $this;

    }

    public function refreshRoles(... $roles)
    {
        $roles = $this->getAllRoles($roles);

        if ($roles->isEmpty()) return $this;

        $this->roles()->sync($roles);

        return $this;

    }

    public function hasRole(Role $role)
    {
        // return true or false
        return $this->roles->contains($role);
    }

    private function getAllRoles(array $roles)
    {
        return Role::whereIn('name', Arr::flatten($roles))->get();
    }

}
