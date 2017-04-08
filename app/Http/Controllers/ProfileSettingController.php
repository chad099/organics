<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Validator, Hash, Session;
class ProfileSettingController extends Controller
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

    protected function validator(array $data, $rules)
    {
        return Validator::make($data, $rules);
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
      $validator = $this->validator($request->all(), ['display_name'=>'required', 'email'=>'required|email']);
      if($validator->fails())
      {
          return back()->withErrors($validator);
      }
      Auth::user()->display_name = $request->display_name;
      Auth::user()->email = $request->email;
      Auth::user()->save();
      Session::flash('message', 'profile has changed successfully.');
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
        $data['page'] = 'profile_setting';
        $data['user'] = Auth::user();
        return view('index', $data);
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

    public function imageUpload(Request $request) {

     if(!$request->file){
        return ['error'=> true, 'message'=>'Please choose image'];
      }

      $validator = $this->validator($request->all(), ['file'=>'required|image|mimes:jpeg,png,jpg|max:2048']);

      if($validator->fails())
      {
          return response()->json(['errors'=>$validator->errors()]);
      }

      $filename = time().'_'.$request->file->getClientOriginalName();
      $path = 'assets/front/profileImages';
      $request->file->move($path, $filename);
      if(Auth::user()->profile_image) {
          unlink($path.'/'.Auth::user()->profile_image);
      }

      Auth::user()->profile_image = $filename;
      Auth::user()->save();
      return json_encode(array('profile_image' => Auth::user()->profile_image));
    }

    public function changePassword(){
      $data = [];
      $data['user'] = Auth::user();
      $data['page'] = 'changepassword';
      return view('index', $data);
    }

    public function saveChangePassword(Request $request) {
      $validator = $this->validator($request->all(), ['password'=>'required|min:6', 'confirm_password'=>'required|same:password']);
      if($validator->fails())
      {
          return back()->withErrors($validator);
      }
      Auth::user()->password = Hash::make($request->password);
      Auth::user()->save();
      Session::flash('message', 'Password has changed successfully.');
      return redirect('profile-setting/'.Auth::user()->id.'/edit');
    }
}
