<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
      
        if ($user->last_login_at) {
            
        }

       
        return redirect()->intended('');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        // Attempt to log in using the 'dashboard' guard
        if (Auth::guard('dashboard')->attempt($credentials)) {
            // Fetch the logged-in user
            $user = Auth::guard('dashboard')->user();
            
            // Check if password has been changed
            if (!$user->password_changed) {
                // Redirect to change password page
                return redirect()->route('dashboard.changePassword');
            }
            
    
            // If the password is changed, redirect to the dashboard
            return redirect()->intended('/dashboard');
        }
    
        // If credentials are invalid
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
