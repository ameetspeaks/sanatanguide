<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('superadmin.users.index', compact('users'));
    }

    public function create()
    {
        return view('superadmin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'gotra' => 'nullable|string|max:255',
            'role' => ['required', Rule::in(['user', 'admin'])],
            'is_premium' => 'boolean',
            'is_superadmin' => 'boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['email_verified_at'] = now();

        User::create($validated);

        return redirect()->route('superadmin.users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('superadmin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('superadmin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'gotra' => 'nullable|string|max:255',
            'role' => ['required', Rule::in(['user', 'admin'])],
            'is_premium' => 'boolean',
            'is_superadmin' => 'boolean',
        ]);

        $user->update($validated);

        return redirect()->route('superadmin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('superadmin.users.index')
            ->with('success', 'User deleted successfully.');
    }
} 