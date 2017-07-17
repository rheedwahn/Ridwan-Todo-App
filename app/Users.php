<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Users extends Model implements AuthenticatableContract
{
    //
	use Authenticatable;

    protected $table = 'users';

    protected $fillable = [
    'name','email','password','user_image','username',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function todos()
    {
    	return $this->hasMany('App\Todo');
    }
}
