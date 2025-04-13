<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FestivalController extends Controller
{
    public function publicIndex(Request $request)
    {
        // Get filter parameters
        $month = $request->input('month');
        $region = $request->input('region');
        $deity = $request->input('deity');

        // Base query
        $query = Festival::where('is_active', true);

        // Apply filters if they exist
        if ($month) {
            $query->whereMonth('date', $month);
        }
        if ($region) {
            $query->where('region', $region);
        }
        if ($deity) {
            $query->where('deity', $deity);
        }

        // Get upcoming festivals
        $upcomingFestivals = Festival::where('is_active', true)
            ->where('date', '>=', now())
            ->orderBy('date')
            ->take(6)
            ->get();

        // Get all festivals with pagination
        $festivals = $query->latest()->paginate(9);

        // Get unique values for filters
        $regions = Festival::distinct()->pluck('region')->filter()->sort();
        $deities = Festival::distinct()->pluck('deity')->filter()->sort();

        return view('festivals.index', compact(
            'festivals',
            'upcomingFestivals',
            'regions',
            'deities'
        ));
    }

    public function index()
    {
        $festivals = Festival::latest()->paginate(10);
        return view('superadmin.festivals.index', compact('festivals'));
    }

    public function show(Festival $festival)
    {
        // Check if it's a public or admin route
        if (request()->segment(1) === 'superadmin') {
            return view('superadmin.festivals.show', compact('festival'));
        }
        
        return view('festivals.show', compact('festival'));
    }

    public function create()
    {
        return view('superadmin.festivals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'deity' => 'required|string|max:255',
            'date' => 'required|date',
            'duration' => 'required|string|max:255',
            'significance' => 'required|string',
            'celebration_method' => 'required|string',
            'customs_and_rituals' => 'required|array',
            'related_stories' => 'nullable|string',
            'special_foods' => 'nullable|array',
            'required_items' => 'nullable|array',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_major' => 'boolean',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('festivals/featured', 'public');
        }

        $gallery = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $gallery[] = $image->store('festivals/gallery', 'public');
            }
        }
        $validated['gallery'] = $gallery;

        Festival::create($validated);

        return redirect()->route('superadmin.festivals.index')
            ->with('success', 'Festival created successfully.');
    }

    public function edit(Festival $festival)
    {
        return view('superadmin.festivals.edit', compact('festival'));
    }

    public function update(Request $request, Festival $festival)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'deity' => 'required|string|max:255',
            'date' => 'required|date',
            'duration' => 'required|string|max:255',
            'significance' => 'required|string',
            'celebration_method' => 'required|string',
            'customs_and_rituals' => 'required|array',
            'related_stories' => 'nullable|string',
            'special_foods' => 'nullable|array',
            'required_items' => 'nullable|array',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_major' => 'boolean',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('featured_image')) {
            if ($festival->featured_image) {
                Storage::disk('public')->delete($festival->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('festivals/featured', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($festival->gallery) {
                foreach ($festival->gallery as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $gallery = [];
            foreach ($request->file('gallery') as $image) {
                $gallery[] = $image->store('festivals/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        $festival->update($validated);

        return redirect()->route('superadmin.festivals.index')
            ->with('success', 'Festival updated successfully.');
    }

    public function destroy(Festival $festival)
    {
        if ($festival->featured_image) {
            Storage::disk('public')->delete($festival->featured_image);
        }
        if ($festival->gallery) {
            foreach ($festival->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $festival->delete();

        return redirect()->route('superadmin.festivals.index')
            ->with('success', 'Festival deleted successfully.');
    }

    public function featured()
    {
        $festivals = Festival::where('is_featured', true)
            ->where('is_active', true)
            ->latest()
            ->paginate(10);
        
        return view('festivals.index', [
            'festivals' => $festivals,
            'regions' => Festival::distinct()->pluck('region')->filter()->sort(),
            'deities' => Festival::distinct()->pluck('deity')->filter()->sort(),
        ]);
    }

    public function upcoming()
    {
        $festivals = Festival::where('is_active', true)
            ->where('date', '>=', now())
            ->orderBy('date')
            ->paginate(10);
        
        return view('festivals.index', [
            'festivals' => $festivals,
            'regions' => Festival::distinct()->pluck('region')->filter()->sort(),
            'deities' => Festival::distinct()->pluck('deity')->filter()->sort(),
        ]);
    }

    public function byDeity($deity)
    {
        $festivals = Festival::where('deity', $deity)
            ->where('is_active', true)
            ->latest()
            ->paginate(10);
        
        return view('festivals.index', [
            'festivals' => $festivals,
            'regions' => Festival::distinct()->pluck('region')->filter()->sort(),
            'deities' => Festival::distinct()->pluck('deity')->filter()->sort(),
        ]);
    }
} 