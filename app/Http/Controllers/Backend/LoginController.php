<?php

namespace App\Http\Controllers\Backend;

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
        $password = bcrypt($request->password);
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data) && Auth::user()->role_id == 1) {
            $request->session()->flash('success', 'Dang nhap thanh cong');
            return redirect()->route('admin.dashboard');
        } else {
            $request->session()->flash('error', 'Dang nhap that bat');
            return back();
        }
        
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
