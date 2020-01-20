<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Encrypt the passwords
    **/
    public function setPasswordAttribute($value){
      $this->attributes['password'] = bcrypt($value);
    }

    public function posts(){
      return $this->hasMany('App\Post', 'author_id');
    }

      public function roles(){
      return $this->belongsToMany(Role::class);
    }

    /*
      * Are you authorised?
      * @param string|array $roles
    */
    public function authoriseRoles($roles){ 

      if(is_array($roles)){
        return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorised');
      }

      return $this->hasRole($roles) || abort(401, 'This action is unauthorised');

    }

    /**
      * Check multiple roles
      * @param array $roles
    **/
    public function hasAnyRole($roles){
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
    *  Check one role
    **/
    public function hasRole($role){
      return null !== $this->roles()->where('name', $roles)->first();
    }
}
