<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Activity;

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
        $users = Activity::usersBySeconds(5)->get();

        return view('home', array('users' => $users));
    }

    public function test(Request $request)
    {
        session(['key' => array('key1' => 'value1', 'key2' => 'value2')]);

        $value = session('key');

        $value['key1'] = 'changed';
        session(['key' => $value]);

        $value = session('key');

        $users = Activity::users()->get();

        return response()->json(['users' => $users], 200);
    }

}
