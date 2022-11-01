<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Exception;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index($cons_id, $patient)
    {
        return view('doctor.create-prescription', [
            'cons_id' => $cons_id,
            'patient' => $patient
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'consultation_id' => ['required', 'numeric'],
            'description' => ['required', 'string']
        ]);

        try{
            $pr = new Prescription();
            $pr->consultation_id = $request->consultation_id;
            $pr->description = $request->description;
            $request->save();

            return redirect()->back()->with('success', 'You have successfully added prescription');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
