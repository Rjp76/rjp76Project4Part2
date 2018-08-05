<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        /*this is new i promise i forgot to make a seperate branch*/
        $user = Auth::user();
        $questions = $user->questions()->paginate(6);
        return view('home')->with('questions', $questions);
    }
}
