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

    public function comments()
    {
      return $this->hasMany('App\DealComment', 'deal_id', 'id')->where('is_approve', 1);
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

    public function upVoteCounts()
    {
      return $this->hasMany('App\DealVote', 'deal_id', 'id')->where('up', 1);
    }

}
