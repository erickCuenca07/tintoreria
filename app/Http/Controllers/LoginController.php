<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        if(auth()->attempt(request(['email','password']))==false){
            return back()->withErrors([
                'message' =>'User o password incorrectos'
            ]);
        }
        return redirect()->route('pedidos.index');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->route('login.index');
    }
}
