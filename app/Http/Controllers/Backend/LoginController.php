<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->flash('success', 'Dang nhap thanh cong');
            return redirect()->route('admin.dashboard');
        } else {
            $request->session()->flash('error', 'Dang nhap that bat');
            return back();
        }
        
    }
}
