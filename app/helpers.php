<?php

use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

function get_doctor($doctor_id){
    return Doctor::find($doctor_id);
}

function get_patient($patient_id){
    return Patient::find($patient_id);
}

function patient($user_id){
    return Patient::where('user_id',$user_id)->first();
}

function cons_status($num){
    $status = new stdClass();
    if($num === 0){
        $status->label = "Closed";
        $status->badge = "danger";
    }else{
        $status->label = "Open";
        $status->badge = "success";
    }

    return $status;
}

function dr_consultations(){
    $consultations = Consultation::join('doctors', 'doctors.id', '=', 'consultations.doctor_id')
        ->join('patients', 'patients.id', '=', 'consultations.patient_id')
        ->where('doctors.user_id', Auth::id())
        ->select('consultations.id', 'consultations.status', 'consultations.created_at', 'patients.fname', 'patients.lname', 'patients.sex', 'patients.dob', 'patients.phone')
        ->get();

    return $consultations;

}

function dr_appointments(){
    $appointments = Appointment::join('consultations', 'consultations.id', '=', 'appointments.consultation_id')
        ->join('doctors', 'doctors.id', '=', 'consultations.doctor_id')
        ->where('doctors.user_id', Auth::id())
        ->select('appointments.id', 'appointments.time', 'appointments.date', 'appointments.topic', 'appointments.status', 'consultations.patient_id')
        ->orderBy('appointments.created_at', 'desc')
        ->get();

    return $appointments;
}

