<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\User as VoyagerUser;



class User extends VoyagerUser
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'role_id',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * Get the role for user
     */
    public function role()
    {
        return $this->hasOne('App\Role');
    }

    public function review()
    {
        return $this->hasOne('App\Review');
    }

    /**
     * Check role of a user
     *
     * @param String $roleName
     *
     * @return bool
     */
    public function isA(String $roleName)
    {
        $role = Role::where('name', $roleName)->firstOrFail();
        if ($this->role_id == $role->id) {
            return true;
        }
        return false;
    }

    /**
     * Check if the user is the owner of a shop
     *
     * @param Shop $shop
     *
     * @return bool
     */
    public function isOwnerOf(Shop $shop)
    {
        if ( $this->id == $shop->shop_owner_id ) {
            return true;
        }
        return false;
    }
}
