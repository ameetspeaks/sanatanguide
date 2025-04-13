<?php

namespace App\Http\Controllers;

use App\Models\DailyWisdom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DailyWisdomController extends Controller
{
    public function index()
    {
        $wisdoms = DailyWisdom::latest()->paginate(10);
        return view('superadmin.daily-wisdoms.index', compact('wisdoms'));
    }

    public function create()
    {
        return view('superadmin.daily-wisdoms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'source' => 'required|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('daily-wisdoms/featured', 'public');
        }

        DailyWisdom::create($validated);

        return redirect()->route('superadmin.daily-wisdoms.index')
            ->with('success', 'Daily wisdom created successfully.');
    }

    public function show(DailyWisdom $dailyWisdom)
    {
        return view('superadmin.daily-wisdoms.show', compact('dailyWisdom'));
    }

    public function edit(DailyWisdom $dailyWisdom)
    {
        return view('superadmin.daily-wisdoms.edit', compact('dailyWisdom'));
    }

    public function update(Request $request, DailyWisdom $dailyWisdom)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'source' => 'required|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($dailyWisdom->featured_image) {
                Storage::disk('public')->delete($dailyWisdom->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('daily-wisdoms/featured', 'public');
        }

        $dailyWisdom->update($validated);

        return redirect()->route('superadmin.daily-wisdoms.index')
            ->with('success', 'Daily wisdom updated successfully.');
    }

    public function destroy(DailyWisdom $dailyWisdom)
    {
        if ($dailyWisdom->featured_image) {
            Storage::disk('public')->delete($dailyWisdom->featured_image);
        }

        $dailyWisdom->delete();

        return redirect()->route('superadmin.daily-wisdoms.index')
            ->with('success', 'Daily wisdom deleted successfully.');
    }
} 