<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'role' => 'required|exists:roles,id',
        ]);


        User::create([
            'fullname' => $validateData['fullname'],
            'username' => $validateData['username'],
            'password' => Hash::make($validateData['password']),
            'roleId' => $validateData['role'],
        ]);

        return redirect('/dashboard/user')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::findOrFail($user->id);
        return view('dashboard.user.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|',
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable|min:8',
            'role' => 'required|exists:roles,id',
        ]);
    
        $user = User::findOrFail($id);
        $user->fullname = $validatedData['fullname'];
        $user->username = $validatedData['username'];
    
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
    
        $user->roleId = $validatedData['role'];
        $user->save();
    
        return redirect('/dashboard/user')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/user')->with('success', 'User deleted successfully.');
    }
}
