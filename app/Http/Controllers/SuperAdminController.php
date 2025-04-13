<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Temple;
use App\Models\Festival;
use App\Models\Scripture;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'temples' => Temple::count(),
            'festivals' => Festival::count(),
            'scriptures' => Scripture::count(),
            'premium_users' => User::where('is_premium', true)->count(),
            'superadmins' => User::where('is_superadmin', true)->count(),
        ];

        $recentUsers = User::latest()->take(5)->get();
        $recentTemples = Temple::latest()->take(5)->get();
        $recentFestivals = Festival::latest()->take(5)->get();

        return view('superadmin.dashboard', compact('stats', 'recentUsers', 'recentTemples', 'recentFestivals'));
    }

    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('superadmin.users.index', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('superadmin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'is_premium' => 'boolean',
            'is_superadmin' => 'boolean',
        ]);

        $user->update($validated);

        return redirect()->route('superadmin.users')
            ->with('success', 'User updated successfully.');
    }

    public function temples()
    {
        $temples = Temple::latest()->paginate(10);
        return view('superadmin.temples.index', compact('temples'));
    }

    public function festivals()
    {
        $festivals = Festival::latest()->paginate(10);
        return view('superadmin.festivals.index', compact('festivals'));
    }

    public function scriptures()
    {
        $scriptures = Scripture::latest()->paginate(10);
        return view('superadmin.scriptures.index', compact('scriptures'));
    }

    public function settings()
    {
        return view('superadmin.settings');
    }
} 