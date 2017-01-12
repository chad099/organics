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
      $post->save();
      return true;
    }
}
