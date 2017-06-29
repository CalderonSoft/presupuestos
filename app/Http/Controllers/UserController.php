<?php

namespace Budgets\Http\Controllers;

use Budgets\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
	public function index()
    {        
    	$users = User::get()->sortBy('name');
    	return view('users.index', compact('users'));     
    }

    protected function store(Request $data)
    {
        session()->flash('message', '¡Usuario creado!');
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'genre' => $data['genre'],
            'role' => $data['role'],
        ]);
        return back();
    }

}
