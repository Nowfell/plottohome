<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/properties')
                        ->withSuccess('Signed in');
        }
  
        return redirect("admin")->withSuccess('Login details are not valid');
    }
    
      
    public function resetUser(Request $request)
    {  
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);
           
        User::where('name', 'Admin')->update([
            'password' => Hash::make($request->password)
        ]);
         
        return redirect("admin/reset")->withSuccess('Password Reset Successfully');
    }
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('admin.properties.index');
        }
  
        return redirect("admin")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('admin');
    }

    public function reset(){
        return view('admin.reset');
    }
}
