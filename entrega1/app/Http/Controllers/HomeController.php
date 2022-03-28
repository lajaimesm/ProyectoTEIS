<?php

namespace App\Http\Controllers;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        if( !is_null(Auth::user()) && Auth::user()->type =='1')
            return view('home.index');
        else 
            return view('layouts_user.app');
    }
}