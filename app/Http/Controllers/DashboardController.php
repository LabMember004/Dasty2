<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;
use App\Models\DashboardUser;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::guard('dashboard')->check()) {
                return redirect()->route('dashboard.login'); 
            }
            return $next($request);
        });
    }
public function index() {
    $products = Product::all();
    $users = User::all();
    $dashboardUsers = DashboardUser::all();

    if (Auth::check() && Auth::user()->password_changed == 0) {
        return redirect()->route('password.change');
    }
    return view('dashboard', compact('products', 'users' , 'dashboardUsers'));
}
public function destroy($id)
{
    $user = User::findOrFail($id);
    
    $user->delete();
    return redirect()->route('dashboard');
}

public function edit($id)
{
    $user = User::findOrFail($id);
    return view('products.dashboard-edit', compact('user'));
}
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->save();
    return redirect()->route('dashboard');
}
public function products() 
{
    $products=Product::all();
    return view('dashboard-products' , ['products' => $products]);
}
public function destroyProduct($id)
{
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('dashboard.products');
}

}