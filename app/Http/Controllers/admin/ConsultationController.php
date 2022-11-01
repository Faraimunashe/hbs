<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::latest()->paginate(10);

        return view('admin.consultations', [
            'consultations' =>$consultations
        ]);
    }

    public function new($app_id)
    {
        $app = Application::find($app_id);
        if(is_null($app)){
            return redirect()->back()->with('error', 'Error cannot locate applications');
        }

        $patient = Patient::where('user_id', $app->user_id)->first();
        $doctors = Doctor::all();
        return view('admin.new-consultation', [
            'patient' => $patient,
            'doctors' => $doctors,
            'app_id' => $app_id
        ]);
    }

    public function assign(Request $request)
    {
        $request->validate([
            'patient_id' => ['required', 'integer'],
            'doctor_id' => ['required', 'integer'],
            'app_id' => ['required', 'integer']
        ]);

        try{
            $cons = new Consultation();
            $cons->doctor_id = $request->doctor_id;
            $cons->patient_id = $request->patient_id;
            $cons->save();

            $application = Application::find($request->app_id);
            $application->delete();

            return redirect()->route('dashboard');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
