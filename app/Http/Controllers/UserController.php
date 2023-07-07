<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Hash;

class UserController extends Controller
{
    public function fetch()
    {
        $users = User::all();
        return view('welcome',compact('users'));
    }



    public function add(Request $request)
    {
        $add = new User();
        $add->name = $request->post('name');
        $add->email = $request->post('email');
        $add->password = Hash::make($request->post('password'));
        $add->save();
        return redirect('user');
    }

    public function user()
    {
        return view('user');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user',compact('user'));
    }




}
