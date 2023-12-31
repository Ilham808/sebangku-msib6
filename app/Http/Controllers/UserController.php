<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index',
            [
                'users' => User::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'number' => 'required|string|max:255',
            'role' => 'required|in:admin,user',
            'status' => 'required|boolean',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->number,
            'is_active' => $request->status,
            'roles' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            return redirect()->route('user.index')->with('success', 'User created successfully');
        }else{
            return redirect()->route('user.index')->with('error', 'User created failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'number' => 'required|string|max:255',
            'role' => 'required|in:admin,user',
            'status' => 'required|boolean',
            'password' => 'nullable|string|confirmed|min:8',
        ]);

        if ($request->password) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->number,
                'is_active' => $request->status,
                'roles' => $request->role,
                'password' => bcrypt($request->password),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->number,
                'is_active' => $request->status,
                'roles' => $request->role,
            ]);
        }

        if ($user) {
            return redirect()->route('user.index')->with('success', 'User updated successfully');
        }else{
            return redirect()->route('user.index')->with('error', 'User updated failed');
        }
    }

    public function approve(User $user)
    {
        $user->is_active = true;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User approved successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
