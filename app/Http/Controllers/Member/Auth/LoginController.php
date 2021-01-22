<?php

namespace App\Http\Controllers\Member\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as DefaultLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends DefaultLoginController
{
    protected $redirectTo = '/member/home';

    public function __construct()
    {
        $this->middleware('guest:members')->except('logout');
    }

    public function showLoginForm()
    {
        return view('members.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('members')->attempt(['user_id' => $request->school_id, 'password' => $request->password]))
        {
            return redirect()->intended('/');
        }
        else
        {
            toastr()->error('Your credentials not correct');
            return redirect()->back();
        }
    }

    protected function guard()
    {
        return Auth::guard('members');
    }

    public function logout(Request $request)
    {
        Auth::guard('members')->logout();
        return redirect()->intended('/');
    }

}
