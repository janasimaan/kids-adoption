<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Dashboard.login');
    }


    public function submit_login(): \Illuminate\Http\RedirectResponse
    {
        $inputs = \request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $auth = Admin::where('email', $inputs['email'])->where('password', $inputs['password'])->first();

        if ($auth === null) {
            return back();
        } else {
            Session::put('admin', $auth->id);
            return redirect()->route('dashboard');
        }
    }

    public function logout()
    {
        Session::forget('admin');
    }
}
