<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class DashboardUserController extends Controller
{

    public function showRegisterForm()
    {
        return view('dashboard-register');
    }
    
    public function register(Request $request) {
       $request->validate ([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
       ]);

       if (DashboardUser::where('email', $request->email)->exists()) {
        return redirect()->back()->withErrors(['email' => 'This email address is already registered.']);
    }

       $randomPassword = Str::random(10);

       $user = DashboardUser::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($randomPassword),
       ]);
       Mail::send('', ['user' => $user, 'password' => $randomPassword], function($message) use ($user) {
           $message->to($user->email);
           $message->subject('Welcome to the Dashboard');
       });

       return redirect()->back()->with('success', ' An Email has been sent , please check your email');
    }
}
