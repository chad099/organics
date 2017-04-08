<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [];
      $data['page'] = 'index';
      $data['posts'] = Post::orderBy('created_at', 'DESC')->where('is_approved', 1)->simplePaginate(6);
      return view('index', $data);
    }
}
