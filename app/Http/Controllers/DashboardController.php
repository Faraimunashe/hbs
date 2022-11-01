<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('admin'))
        {
            return redirect()->route('admin-dashboard');
        }elseif(Auth::user()->hasRole('doctor'))
        {
            return redirect()->route('dr-dashboard');
        }elseif(Auth::user()->hasRole('patient'))
        {
            return redirect()->route('pt-dashboard');
        }
    }
}
