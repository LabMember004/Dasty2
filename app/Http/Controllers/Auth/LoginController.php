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
        // Validate the request...
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);


        if (Auth::guard('dashboard')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return $this->authenticated($request, Auth::guard('dashboard')->user());
        }
        if (Auth::guard('web')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return $this->authenticated($request, Auth::guard('web')->user());
        }

     

        // If authentication fails
        return back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
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
