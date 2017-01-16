<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post, App\Comment, Validator, Session, App\CommentReply;
class PublicPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    protected function validator(array $data, $rules)
    {
        return Validator::make($data, $rules);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all(), ['comment'=>'required', 'user_id'=>'required']);

        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }

        if(Comment::store($request))
        {
          Session::flash('message', 'Comment has been saved successfully!');
        }
        else
        {
          Session::flash('error_message', 'Something went wrong!');
        }
        return back();
    }

    public function addReply(Request $request)
    {
        $validator = $this->validator($request->all(), ['comment'=>'required', 'user_id'=>'required', 'comment_id'=>'required']);

        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }

        if(CommentReply::store($request))
        {
          Session::flash('message', 'Comment has been saved successfully!');
        }
        else
        {
          Session::flash('error_message', 'Something went wrong!');
        }
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
        $data['page'] = 'post';
        $data['post'] = Post::find($id);
        $data['post']->views += 1;
        $data['post']->save();
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
}
