<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Logic to gather admin-related data
        return view('admin.dashboard');
    }
}
