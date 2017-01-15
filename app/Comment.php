<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = array();

    public static function store($request)
    {
      $comment = self::firstOrNew(array('id'=>$request->id));
      $comment->post_id = $request->post_id;
      $comment->user_id = $request->user_id;
      $comment->comment = $request->comment;
      $comment->save();
      return true;
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function post()
    {
      return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
