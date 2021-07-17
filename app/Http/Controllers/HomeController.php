<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('karyawan.content.dashboard');
    }

    public function showChangePasswordForm()
    {
        return view('auth.changepassword');
    }

    public function passwordPatch()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $curentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $curentPassword)) {

            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            return back()->with(['success', 'You are change your password']);
        }
        else{
            return back()->withErrors(['old_password' => 'You Have to Fill your old password']);
        }
    }
        
}
