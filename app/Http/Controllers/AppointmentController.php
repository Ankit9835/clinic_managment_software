<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $myappointments = Appointment::where('user_id', Auth::User()->id)->get();
        return view('admin.appointment.index',compact('myappointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'date' => 'required|unique:appointments,date,NULL,id,user_id,'.\Auth::id(),
            'time' => 'required'

        ]);

        //dd($request->all());
        $appointment = Appointment::create([

            'user_id' => Auth::User()->id,
            'date' => $request->date

        ]);

        foreach ($request->time as  $time) {
            Time::create([

                'appointment_id' => $appointment->id,
                'time' => $time

            ]);
        }

        return redirect()->back()->with('message', 'Appointment Created SuccessFully');
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
        //
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

    public function check(Request $request){
        $date = $request->date;

        $appointment = Appointment::where('user_id', auth()->user()->id)->where('date', $date)->first();

        if(!$appointment){
            return redirect()->back()->with('errmessage', 'No Appointments For This Date Given By You');
        }

        $appointmentId = $appointment->id;

        $times = Time::where('appointment_id', $appointmentId)->get();
        //dd($time);

        return view('admin.appointment.index', compact('date','appointmentId','times'));
    }

    public function updateAppointment(Request $request){

        $appointmentId = $request->appointmentId;

        $remove = Time::where('appointment_id', $appointmentId)->delete();

        foreach($request->time as $time){

            Time::create([

                'appointment_id' => $appointmentId,
                'time' => $time,
                'status' => 0

            ]);

        }

        return redirect()->route('appointment.index')->with('message', 'Appointment Updated SuccessFully');

    }


}
