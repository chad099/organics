<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $table = 'comment_replys';
    protected $guarded = array();

    public static function store($request)
    {
      $comment = self::firstOrNew(array('id'=>$request->id));
      $comment->comment_id = $request->comment_id;
      $comment->user_id = $request->user_id;
      $comment->comment = $request->comment;
      $comment->save();
      return true;
    }

}
