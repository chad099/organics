<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = array();

    public static function store($request) {
      $post  = Post::firstOrNew(array('id'=>$request->id));
      $post->user_id = Auth::user()->id;
      $post->title  = $request->title;
      $post->post = $request->post;
      if($request->hasFile('thumbnail_image')){
        $imageName = time().'.'.$request->thumbnail_image->getClientOriginalExtension();
        $request->thumbnail_image->move(public_path('assets/post/images'), $imageName);
        $post->thumbnail_image = $imageName;
      }
      if($request->type == 'saved') {
        $post->saved = 1;
      }
      $post->save();
      return true;
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment', 'post_id', 'id')->where('moderate', 0);
    }

    public function calculateTime($time)
    {

        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }

    }

    public function likes()
    {
      return $this->hasMany('App\UserLikeDislike', 'post_id', 'id')->where('like', 1);
    }

    public function dislikes()
    {
      return $this->hasMany('App\UserLikeDislike', 'post_id', 'id')->where('dislike', 1);
    }


}
