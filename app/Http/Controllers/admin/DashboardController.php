<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $applications = Application::latest()->paginate(10);

        return view('admin.dashboard',[
            'applications' => $applications
        ]);
    }
}
