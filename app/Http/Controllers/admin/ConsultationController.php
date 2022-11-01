<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
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
}
