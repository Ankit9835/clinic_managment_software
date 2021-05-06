<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;

class FrontEndController extends Controller
{
    public function index(){
    	date_default_timezone_set('Asia/Kolkata');
    	//dd(date('Y-m-d'));
    	if(request('date')){
    		$doctors = $this->findDoctorsBasedOnDate(request('date'));
    		return view('welcome',compact('doctors'));
    	}
    	$doctors = Appointment::where('date', date('Y-m-d'))->get();
    	return view('welcome',compact('doctors'));
    }

    public function show($doctorId, $date){

    	$appointment = Appointment::where('user_id', $doctorId)->where('date', $date)->first();

    	$times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
    	//dd($time);
    	$user = User::where('id', $doctorId)->first();

    	return view('appointment', compact('times','date','appointment','user'));

    }

    public function findDoctorsBasedOnDate($date){
    	$doctors = Appointment::where('date', $date)->get();
    	return $doctors;
    }
}
