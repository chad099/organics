<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class DealComment extends Model
{
    protected $table = 'deal_comments';
    protected $guarded = array();

    public static function store($request)
    {
      $comment = self::firstOrNew(array('id'=>$request->id));
      $comment->deal_id = $request->deal_id;
      $comment->user_id = $request->user_id;
      $comment->comment = $request->comment;
      $comment->email = ($request->email)? $request->email : Auth::user()->email;
      $comment->save();
      return true;
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
