<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment, Session, App\CommentReply;
class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [];
      $data['page'] = 'admin_comments';
      $data['comments'] = Comment::orderBy('created_at', 'DESC')->paginate(10);
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
      $data = [];
      $data['page'] = 'admin_comment_replys';
      $data['comment'] = Comment::find($id);
      return view('admin', $data);
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

    public function approveComment($id)
    {
        $comment = Comment::find($id);
        if($comment)
        {
            $comment->moderate = 0;
            $comment->save();
            Session::flash('success', 'Comment has been approved successfully.');
        }
        else
        {
            Session::flash('admin_error_message', 'Something went wrong with comment approval.');
        }
        return back();
    }

    public function UnapproveComment($id)
    {
      $comment = Comment::find($id);
      if($comment)
      {
          $comment->moderate = 1;
          $comment->save();
          Session::flash('success', 'Comment has been unapproved successfully.');
      }
      else
      {
          Session::flash('admin_error_message', 'Something went wrong with comment unapproval.');
      }
      return back();
    }

    public function deleteComment($id)
    {
      $comment = Comment::find($id);
      if($comment)
      {
          $comment->delete();
          Session::flash('success', 'Comment has been deleted successfully.');
          return back();
      }
      Session::flash('admin_error_message', 'Something went wrong.');
      return back();
    }

    public function replyApproveComment($id)
    {
        $comment = CommentReply::find($id);
        if($comment)
        {
            $comment->moderate = 0;
            $comment->save();
            Session::flash('success', 'Comment has been approved successfully.');
        }
        else
        {
            Session::flash('admin_error_message', 'Something went wrong with comment approval.');
        }
        return back();
    }

    public function replyUnapproveComment($id)
    {
      $comment = CommentReply::find($id);
      if($comment)
      {
          $comment->moderate = 1;
          $comment->save();
          Session::flash('success', 'Comment has been unapproved successfully.');
      }
      else
      {
          Session::flash('admin_error_message', 'Something went wrong with comment unapproval.');
      }
      return back();
    }

    public function replyDeleteComment($id)
    {
      $comment = CommentReply::find($id);
      if($comment)
      {
          $comment->delete();
          Session::flash('success', 'Comment has been deleted successfully.');
          return back();
      }
      Session::flash('admin_error_message', 'Something went wrong.');
      return back();
    }

}
