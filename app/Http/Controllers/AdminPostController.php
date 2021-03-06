<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post, Session, Validator;
class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['page'] = 'admin_post';
        $data['posts'] = Post::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   protected function validator(array $data)
   {

   }

    public function store(Request $request)
    {


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

    public function approvePost($id)
    {
      $post = Post::find($id);
      if($post)
      {
          $post->is_approved = 1;
          echo  $post->user->totalPostsIncrement();
          die;
          $post->save();
          Session::flash('success', 'Post has been approved successfully.');
      }
      else
      {
          Session::flash('admin_error_message', 'Something went wrong with approval.');
      }
      return back();
    }

    public function getPost($id)
    {
      $data = [];
      $data['page'] = 'admin_post_edit';
      $data['post'] = Post::find($id);
      return view('admin', $data);
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        if($post) {
            $post->delete();
            Session::flash('success', 'Post has been deleted successfully.');
            return redirect('/admin/posts');
        }
        Session::flash('admin_error_message', 'Something went wrong.');
        return back();
    }

    public function viewPost($id)
    {
      $data = [];
      $data['page'] = 'view_post';
      $data['post'] = Post::find($id);
      return view('admin', $data);
    }
}
