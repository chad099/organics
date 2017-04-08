<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Deal extends Model
{
    protected $table = 'deals';
    protected $guarded = array();

    public static function store($request)
    {
      $deal = Deal::firstOrNew(array('id'=>$request->id));
      $deal->user_id = Auth::user()->id;
      $deal->title = $request->title;
      $deal->message = $request->message;
      $deal->price = $request->price;
      $deal->price_type = $request->price_type;
      $deal->store_name = $request->store_name;
      $deal->link = $request->link;
      if($request->hasFile('product_image'))
      {
        if($deal->product_image)
        {
          unlink('assets/front/productImages/'.$deal->product_image);
        }
        $filename = time().'_'.$request->product_image->getClientOriginalName();
        $request->product_image->move('assets/front/productImages', $filename);
        $deal->product_image = $filename;
      }

      $deal->save();
      return true;
    }

    public function user()
    {
      return $this->hasOne('App\User', 'id', 'user_id');
    }
}
