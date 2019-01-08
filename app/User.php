<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roles() {
        return $this->belongsToMany('App\Role','users_roles');

    }

    public function hasRole( ... $roles ) {
      
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {

                return true;
            }
        }
        return false;
    }
    public function checkRole(... $roles){
        $result =  false;
        dd($this->roles);
         foreach ($roles as $role) {
            if ($role =$this->roles->where('slug',$role)->first()) {

                $result =  true;
            }

        }
        return $result;
    }
    public function permissions() {

        return $this->belongsToMany('App\Permission','users_permissions');

    }
    protected function hasPermission($permission) {

        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }


    public function hasPermissionTo( $permission) {
       
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission) {

        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    protected function getAllPermissions(array $permissions) {
        return Permission::whereIn('slug',$permissions)->get();
    }
    public function profile(){
        return $this->hasOne('App\UserProfile');
    }
}
