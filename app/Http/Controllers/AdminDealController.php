<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal, Session;
class AdminDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['page'] = 'admin_deals';
        $data['deals'] = Deal::orderBy('created_at', 'DESC')->paginate(25);
        return view('admin', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function approveDeal($id)
    {
      $deal = Deal::find($id);
      $deal->is_active = 1;
      $deal->save();
      $post->user->totalPostsIncrement();
      Session::flash('message',  'Deal has been approved successfully.');
      return back();
    }

    public function unapproveDeal($id)
    {
      $deal = Deal::find($id);
      $deal->is_active = 0;
      $deal->save();
      Session::flash('message',  'Deal has been un approved successfully.');
      return back();
    }

    public function deleteDeal($id)
    {
      $deal = Deal::find($id);
      if($deal)
      {
        $deal->delete();
        Session::flash('message',  'Deal has been deleted successfully.');
        return back();
      }

      Session::flash('message',  'Deal has not delete successfully.');
      return back();
    }


}
