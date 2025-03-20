<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;

class AuthencationController extends Controller
{
    public function adminLogin(){
        try{
            return view('auth.backend.login');
        }catch(\Exception $e){
            return "Something went wrong.";
        }
    }
    public function adminLoginSubmit(LoginRequest $request){
        $request->authenticate();
        try{

        $request->session()->regenerate();
        if(Auth::user()->role_id == 1){
            return redirect('/admin/dashboard');
        }elseif(Auth::user()->role_id == 2){
            return redirect('/dashboard');
        } 
        }catch(\Exception $e){
            return "Something went wrong.";
        }
    }
    public function customerLogin(){
        try{
            return view('auth.frontend.login');
        }catch(\Exception $e){
            return "Something went wrong.";
        }
    }
    public function customerLoginSubmit(LoginRequest $request){
        $request->authenticate(); 
        try{
        $request->session()->regenerate();
        if(Auth::user()->role_id == 1){
            return redirect('/admin/dashboard');
        }elseif(Auth::user()->role_id == 2){
            return redirect('/dashboard');
        }
        }catch(\Exception $e){
            return "Something went wrong.";
        }
    }
    public function customerRegister(){
        try{
            return view('auth.frontend.register');
        }catch(\Exception $e){
            return "Something went wrong.";
        }
    }
    public function customerRegisterSubmit(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'numeric',  'digits:10', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role_id' => 2,
            ]);
    
            event(new Registered($user)); 
            Auth::login($user);
            return redirect('/'); 
        }catch(\Exception $e){
            return "Something went wrong.";
        }
    }

    public function adminDashboard(){
        try{
            return view('backend.dashboard.admin_dashboard');
        }catch(\Exception $e){
            return "Something went wrong.";
        }
    }
}
