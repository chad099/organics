<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal, Validator, Session, App\DealComment, App\DealVote, Auth;
class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected function validator(array $data, $rules)
     {
         return Validator::make($data, $rules);
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['title'=>'required', 'price'=>'required|integer', 'price_type'=>'required', 'store_name'=>'required'];

        $validate = $this->validator($request->all(), $rules);
        if($validate->fails())
        {
          return back()->withInput()->withErrors($validate);
        }

        Deal::store($request);
        Session::flash('message', 'Your deal has been submitted successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $data['page'] = 'deal';
        $data['deal'] = Deal::find($id);
        if($data['deal'])
        {
          $data['deal']->views++;
          $data['deal']->save();
        }
        return view('two_column', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addComment(Request $request)
    {

      $rules = ['comment'=>'required'];
      $validate = $this->validator($request->all(), $rules);
      if($validate->fails())
      {
        return back()->withInput()->withErrors($validate);
      }

      DealComment::store($request);
      Session::flash('message', 'Your comment has been submitted successfully.');
      return back();
    }

    public function dealVote(Request $request)
    {
      $dealvote = dealVote::firstOrNew( array('user_id' => Auth::user()->id, 'deal_id' => $request->id));
      $dealvote->up = 0;
      $dealvote->down = 0;
       if($request->vote == 'like')
       {
           $dealvote->up = 1;
       }
       else {
           $dealvote->down = 1;
       }
      $dealvote->user_id = Auth::user()->id;
      $dealvote->deal_id = $request->id;
      $dealvote->save();
      return 'success';
    }
}
