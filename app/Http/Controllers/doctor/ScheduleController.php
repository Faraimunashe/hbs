<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Exception;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index($consultation_id, $patient_id)
    {
        return view('doctor.schedule', [
            'cons_id' => $consultation_id,
            'patient_id' => $patient_id
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'consultation_id' => ['required', 'integer'],
            'qty' => ['required', 'integer'],
            'drug' => ['required', 'string'],
            'time' => ['required']
        ]);

        try{
            $sch = new Schedule();
            $sch->consultation_id = $request->consultation_id;
            $sch->qty = $request->qty;
            $sch->drug = $request->drug;
            $sch->time = $request->time;
            $sch->save();

            return redirect()->back()->with('success', 'Successfully added new schedule.');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
