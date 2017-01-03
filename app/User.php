<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function users ()
    {
      return User::where('role', '!=', 0)->get();
    }

    public function level () {
      return $this->hasOne('App\Role', 'value', 'role');
    }

    public static function store($request){
      $user = User::firstOrNew(array('id'=>$request->id));
      $user->name = $request->name;
      $user->role = $request->role;
      $user->save();
      return true;
    }
}
