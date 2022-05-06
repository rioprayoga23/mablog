<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
    return view('register.index',[
        'title' => 'Register',
        ]);
    }

    public function store(Request $request){
        $validationData = $request->validate([
            'name' => 'required|max:225',
            'username' =>'required|min:3|max:225|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:225'
        ]);

        $validationData['password'] = Hash::make($validationData['password']);

        User::create($validationData);

        return redirect('/login')->with('success', 'Registration successfull! Please login');

        
    }


}
