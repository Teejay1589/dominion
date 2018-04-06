<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternalController extends Controller
{
    public function showInternalIndex () {
        return view('auth.internals.internal');
    }

    public function showStaffLoginForm () {
        return view('auth.internals.loginStaff');
    }

    public function showDoctorLoginForm () {
        return view('auth.internals.loginDoctor');
    }

    public function showAdminLoginForm () {
        return view('auth.internals.loginAdmin');
    }
}
