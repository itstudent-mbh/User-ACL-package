# User-ACL-package
User access Controller package for laravel


# Install 
~ composer require mbhanife/laravel-users-acl
php artisan migrate 

# Use
Add ' use HasRole ' to user model  

add new role 
just set name for that
Role::create(['name' => 'role name']);


add new permission
Permission::create('name' => 'permission name')


attach permission to role 
$role = Role::find(x);
$role->givePermissions(['permission name 1','permission name 2',...])

attach role to user
$user = user::find(x);
$user->giveRoles(['role name 1','role name 2',...])


use permissions in controller 
if ($user->can('permission name')) {
    do somethings
}
