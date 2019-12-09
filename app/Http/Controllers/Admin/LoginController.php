<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('backend.login.index');
    }

    public function checkLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data) && Auth::user()->role_id == 1) {
            $request->session()->flash('success', 'Đăng nhập thành công!!!');
            return redirect()->route('admin.dashboard');
        } else {
            $request->session()->flash('error', 'Đăng nhập thất bại!!!');
            return back();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
