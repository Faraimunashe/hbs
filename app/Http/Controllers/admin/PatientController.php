<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->paginate(10);

        return view('admin.patients', [
            'patients' => $patients
        ]);
    }
}
