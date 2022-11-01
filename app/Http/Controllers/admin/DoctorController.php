<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->paginate(10);
        return view('admin.doctors', [
            'doctors' => $doctors
        ]);
    }

    public function new()
    {
        return view('admin.new-doctor');
    }

    public function add(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'sex' => ['required', 'string'],
            'phone' => ['required', 'digits:10', 'starts_with:07'],
            'address' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8']
        ]);

        try{

            $user = User::create([
                'name' => $request->lname.' '.substr($request->fname, 0, 1),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->attachRole('doctor');

            event(new Registered($user));

            $doctor = new Doctor();
            $doctor->user_id = $user->id;
            $doctor->fname = $request->fname;
            $doctor->lname = $request->lname;
            $doctor->sex = $request->sex;
            $doctor->phone = $request->phone;
            $doctor->address = $request->address;
            $doctor->save();

            return redirect()->back()->with('success', 'You have successfully added a new doctor');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
