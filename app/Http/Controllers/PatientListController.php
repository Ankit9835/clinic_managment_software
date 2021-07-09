<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class PatientListController extends Controller
{
    //
    public function index(Request $request){

    	if($request->date){
    		$bookings = Booking::latest()->where('date', $request->date)->get();
    	//dd($bookings);
    	return view('admin.patientlist.index', compact('bookings'));
    	}

    	$bookings = Booking::latest()->where('date', date('Y-m-d'))->get();
    	//dd($bookings);
    	return view('admin.patientlist.index', compact('bookings'));
    }

    public function toggleStatus($id){

    	$booking = Booking::find($id);
    	$booking->status =! $booking->status;
    	$booking->save();

    	return redirect()->back();

    }

    public function allPatient(){

    	$bookings = Booking::latest()->paginate(10);
    	return view('admin.patientlist.all', compact('bookings'));

    }
}
