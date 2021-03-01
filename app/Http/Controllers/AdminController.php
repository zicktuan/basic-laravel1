<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function AuthLogin() {
        $adminId = Session::get('admin_id');
        if ($adminId) {
            return redirect()->to('dashboard');
        } else {
            return redirect()->to('admin')->send();
        }

    }

    public function index() {
        return view('loginAdmin');
    }

    public function showDashboard() {
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request) {
        $email = $request->admin_email;
        $pass = $request->admin_pass;

        $result = DB::table('tbl_admin')->where('admin_email', $email)->where('admin_password', md5($pass))->first();

        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);

            return redirect()->route('admin.dashboard');
        } else {
            Session::put('message', 'Email hoặc mật khẩu không đúng!');
            return redirect('admin');
        }

    }

    public function logout() {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return redirect('admin');
    }
}
