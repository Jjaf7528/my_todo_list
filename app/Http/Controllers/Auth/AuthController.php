<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function register(){
        return view('auth.register');
    }

    public function registerVerify(AuthRequest $request){

        $email =$request->input('email');
        $user = User::where('email',$email)->first();

        if($user){
            return back()->withErrors(['email already exists' => 'Email ya existente'])->withInput();
        }

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login');
    }
    
    public function login(){
        return view('auth.login');
    }

    public function loginVerify(AuthRequest $request)
    {       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            return redirect()->route('tasks.index')->with('success','Se ha iniciado exitosamente la sesión.');
        }

        return back()->withErrors(['invalid_credentials' => 'Email o contraseña incorrectos'])->withInput();
    }
    
    public function signOut()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

}
