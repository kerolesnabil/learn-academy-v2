<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected function login()
    {
        return view('admin.auth.login');
    }

    public function doLogin(Request $request)
    {
            $data=$request->validate([
                'email'=>'required|email',
                'password'=>'required|string'
            ]);

            if (!auth()->guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']]))
            {
                return back();
            }
            else {
                return redirect(route('admin.home'));
            }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect(route('admin.login'));
    }
}
