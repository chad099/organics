<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DateTime, Hash, App\Util, Auth, DB;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','first_name', 'last_name', 'display_name', 'confirmed', 'confirmation_code', 'total_approve_posts', 'votes'
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
      $user->name = $request->name || "";
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->display_name = $request->display_name;
      $user->role = $request->role;
      $user->is_blocked = ($request->is_blocked == 'on')? 1 : 0;
      $user->save();
      return true;
    }

    public static function createUser($request){
      $user = User::firstOrNew(array('id'=>$request->id));
      $user->name = $request->name || "";
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->display_name = $request->display_name;
      $user->email = $request->email;
      $user->password = Hash::make('123456');
      $user->role = $request->role;
      $user->save();
      return true;
    }

    public function comments()
    {
      return $this->hasMany('App\Comment', 'user_id', 'id')->where('moderate', 0);
    }

    public function userAllComments()
    {
      return DB::table('comments')
                  ->leftJoin('users', 'users.id', '=', 'comments.user_id')
                  ->leftJoin('deal_comments', 'deal_comments.user_id', '=', 'users.id')
                  ->where('comments.moderate', 0)
                  ->orWhere('deal_comments.is_approve', 1)
                  ->count();
    }

    public function posts()
    {
      return $this->hasMany('App\Post', 'user_id', 'id')->where('is_approved', 1)->orderBy('created_at', 'DESC');
    }

    public function secondsToTime($created_at, $updated_at) {
      $then = new DateTime(date('Y-m-d H:i:s', $created_at));
      $now = new DateTime(date('Y-m-d H:i:s', $updated_at));
      $diff = $then->diff($now);
      return $diff->y."y ".$diff->m."m ".$diff->d."d ".$diff->h."h ".$diff->i."m ".$diff->s."s";
      return array('years' => $diff->y, 'months' => $diff->m, 'days' => $diff->d, 'hours' => $diff->h, 'minutes' => $diff->i, 'seconds' => $diff->s);
    }

    public function totalPostsIncrement()
    {
      $this->total_approve_posts += 1;
      $this->save();
      return true;
    }

    public function badge()
    {
      if($this->role == 0) {
        return Util::userBadge('admin');
      }

      return Util::userBadge($this->total_approve_posts);
    }

    public function deals()
    {
      return $this->hasMany('App\Deal', 'user_id', 'id')->where('is_active', 1);
    }
}
