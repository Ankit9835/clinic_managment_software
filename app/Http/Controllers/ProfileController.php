<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index(){
    	return view('profile.index');
    }

    public function store(Request $request){

    	$request->validate([

    		'name' => 'required',
    		'gender' => 'required'

    	]);

    	User::where('id', auth()->user()->id)->update([
    		'name' => $request->name,
    		'address' => $request->address,
    		'phone_number' => $request->phone_number,
    		'gender' => $request->gender,
    		'description' => $request->description
    	]);

    	return redirect()->back()->with('message', 'Profile Updated SuccessFully');

    }

    public function profilePic(Request $request){

    	$this->validate($request,['file'=>'required|image|mimes:jpeg,jpg,png']);
    	if($request->hasFile('file')){
    		$image = $request->file('file');
    		$name = time().'.'.$image->getClientOriginalExtension();
    		$destination = public_path('/profile');
    		$image->move($destination,$name);
    		
    		$user = User::where('id',auth()->user()->id)->update(['image'=>$name]);
    		
    		return redirect()->back()->with('message','profile updated');


    	}

    }
}
