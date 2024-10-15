<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
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
       Mail::send('emailRegister', ['user' => $user, 'password' => $randomPassword], function($message) use ($user) {
           $message->to($user->email);
           $message->subject('Welcome to the Dashboard');
       });

       return redirect()->back()->with('success', ' An Email has been sent , please check your email');
    }
    public function showLoginForm()
    {
        return view('dashboard-login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('dashboard')->attempt($credentials)) {
            // Get the currently authenticated user
            $user = Auth::guard('dashboard')->user();
    
            // Check if the user has changed their password
            if (!$user->password_changed) {
                // Redirect to password change page if password hasn't been changed
                return redirect()->route('dashboard.password.change');
            }
    
            // If password has already been changed, proceed to the dashboard
            return redirect()->intended('/dashboard');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    public function logout()
    {
        Auth::guard('dashboard')->logout();
    
        return redirect('/');
    }
    public function showChangePasswordForm()
{
    return view('dashboard-change-password');
}

public function changePassword(Request $request)
{
    $request->validate([
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = Auth::guard('dashboard')->user();
    $user->password = Hash::make($request->password);
    $user->password_changed = true;
    $user->save();

    return redirect('/dashboard')->with('success', 'Password changed successfully.');
}



    
}