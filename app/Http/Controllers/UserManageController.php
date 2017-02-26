<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User, App\Role, Session;
class UserManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['page'] = 'userlist';
        $data['users'] = User::users();
        return view('admin', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = [];
      $data['page'] = 'usercreate';
      $data['roles'] = Role::all();
      return view('admin', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('id') && $request->id) {
          User::store($request);
          Session::flash('success', 'User has been updated successfully');
          return back();
        }
        
        User::createUser($request);
        Session::flash('success', 'User has been created successfully');
        return redirect('/admin/users');
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
      $data = [];
      $data['page'] = 'useredit';
      $data['user'] = User::find($id);
      $data['roles'] = Role::all();
      return view('admin', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
      User::store($request);
      Session::flash('success', 'User has been updated successfully');
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user) {
             $user->delete();
             Session::flash('success', 'User delete successfully');
             return back();
        }
        Session::flash('error', 'User not found!');
        return back();
    }
}
