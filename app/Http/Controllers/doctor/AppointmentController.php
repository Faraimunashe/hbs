<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Exception;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('doctor.appointments', [
            'appointments' => dr_appointments()
        ]);
    }

    public function new($cons_id, $patient)
    {
        return view('doctor.create-appointment',[
            'cons_id' => $cons_id,
            'patient' => $patient
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'consultation_id' => ['required', 'numeric'],
            'time' => ['required'],
            'date' => ['required', 'date'],
            'topic' => ['required', 'string'],
            'location' => ['required', 'string']
        ]);

        try{
            $app = new Appointment();
            $app->consultation_id = $request->consultation_id;
            $app->time = $request->time;
            $app->date = $request->date;
            $app->topic = $request->topic;
            $app->location = $request->location;
            $app->status = 1;
            $app->save();

            return redirect()->back()->with('success', 'You successfully added appointment');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
