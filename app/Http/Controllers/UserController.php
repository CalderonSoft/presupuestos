<?php

namespace Budgets\Http\Controllers;

use Validator;
use Budgets\User;
use Illuminate\Http\Request;
use Budgets\Http\Requests\UpdateUserRequest;
use Budgets\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    
	public function index()
    {        
    	$users = User::get()->sortBy('name');
    	return view('users.index', compact('users'));     
    }

    protected function store(CreateUserRequest $data)
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

    public function edit(User $user)
    {
    	return view('users.edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $request)
    {
    	if ($user->email == $request->get('email')) {
    		$user->update(
			$request->only('name', 'genre', 'role'));
    	} else {
    		Validator::make($request->all(), [
    			'email' => 'unique:users',
    		])->validate();
    		$user->update(
			$request->only('name', 'email', 'genre', 'role'));
    	}    	
    	session()->flash('message', '¡Usuario actualizado!');
    	return redirect()->route('users.index');
    }

    public function changePass(Request $request)
    {
    	$user = User::find($request->get('user_id'));

    	Validator::make($request->all(), [
			'password' => 'required|min:6',
		])->validate();
		$user->password = bcrypt($request->get('password'));
		$user->save();
		// $user->update($request->only(bcrypt('password')));
		session()->flash('message', '¡Contraseña actualizada!');
		return back();
    }

    public function destroy(User $user)
    {
    	$user->delete();
    	session()->flash('message', '¡El usuario ha sido eliminado!');
    	return back();
    }

}
