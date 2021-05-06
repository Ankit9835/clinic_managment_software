<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashBoardController extends Controller
{
		public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    	//dd(Auth::User()->role->name);
    	if(Auth::User()->role->name == 'patient'){
    		return view('home');
    	}
    	return view('dashboard');
    }
}
