<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
            $user= new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->save();
            return redirect()->route('pedidos.index');
        
      
    }

    public function destroy($id)
    {
        //
    }
}
