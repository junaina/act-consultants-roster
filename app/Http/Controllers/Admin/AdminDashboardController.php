<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Registration;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        $registrations = Registration::with('user')->paginate(10);
        return view('admin.dashboard.index', compact('registrations'));
    }
}
