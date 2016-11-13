<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Activity;
use Illuminate\Support\Facades\Auth;

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
        $userId = Auth::user()->id;
        $users = Activity::usersBySeconds(60)->get();

        return view('home', array(
            'users' => $users,
            'user_id' => $userId,
        ));
    }

}
