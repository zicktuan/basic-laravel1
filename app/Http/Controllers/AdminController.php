<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('loginAdmin');
    }

    public function showDashboard() {
        return view('admin.dashboard');
    }

    public function dashboard() {
        echo 1111;
    }
}
