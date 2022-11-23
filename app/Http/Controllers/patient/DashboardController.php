<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Appointment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $appointments = Appointment::join('consultations', 'consultations.id', '=', 'appointments.consultation_id')
            ->join('patients', 'patients.id', '=', 'consultations.patient_id')
            ->where('patients.user_id', Auth::id())
            ->select('appointments.id', 'appointments.topic', 'appointments.time', 'appointments.date')
            ->get();

        return view('patient.dashboard', [
            'appointments' => $appointments
        ]);
    }

    public function apply(Request $request)
    {
        $request->validate([
            'resp' => ['required', 'integer']
        ]);

        if($request->resp == 0){
            return redirect()->back()->with('info', 'Well! Stay healthy, stay safe.');
        }

        try{
            $app = Application::where('user_id', Auth::id())->first();
            if(is_null($app)){
                $app = new Application();
                $app->user_id = Auth::id();
                $app->save();
                return redirect()->back()->with('success', 'Successfully booked a consultation.');
            }
            return redirect()->back()->with('error', 'You have a pending consultation');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
