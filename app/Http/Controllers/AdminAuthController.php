<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function loginReq(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // checking if admin detail is correct
        $query = admin::where('username', $validatedData['username'])->where('password', $validatedData['password'])->first();
        if ($query == "") {
            return redirect()->back()->withErrors('Username or Password is incorrect');
        }

        // setting session
        session(['admin' => $query]);
        return redirect()->route('admin.dashboard');
    }
}
