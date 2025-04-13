<?php

namespace App\Http\Controllers;

use App\Models\Scripture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScriptureController extends Controller
{
    public function publicIndex(Request $request)
    {
        // Get filter parameters
        $language = $request->input('language');
        $period = $request->input('period');
        $category = $request->input('category');

        // Base query
        $query = Scripture::where('is_active', true);

        // Apply filters if they exist
        if ($language) {
            $query->where('language', $language);
        }
        if ($period) {
            $query->where('period', $period);
        }
        if ($category) {
            $query->where('category', $category);
        }

        // Get featured scriptures
        $featuredScriptures = Scripture::where('is_featured', true)
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        // Get all scriptures with pagination
        $scriptures = $query->latest()->paginate(12);

        // Get unique values for filters
        $languages = Scripture::distinct()->pluck('language')->filter()->sort();
        $periods = Scripture::distinct()->pluck('period')->filter()->sort();
        $categories = Scripture::distinct()->pluck('category')->filter()->sort();

        return view('scriptures.index', compact(
            'scriptures',
            'featuredScriptures',
            'languages',
            'periods',
            'categories'
        ));
    }

    public function show(Scripture $scripture)
    {
        // Check if it's a public or admin route
        if (request()->segment(1) === 'superadmin') {
            return view('superadmin.scriptures.show', compact('scripture'));
        }
        
        return view('scriptures.show', compact('scripture'));
    }

    public function featured()
    {
        $scriptures = Scripture::where('is_featured', true)
            ->where('is_active', true)
            ->latest()
            ->paginate(12);
        
        return view('scriptures.index', [
            'scriptures' => $scriptures,
            'languages' => Scripture::distinct()->pluck('language')->filter()->sort(),
            'periods' => Scripture::distinct()->pluck('period')->filter()->sort(),
            'categories' => Scripture::distinct()->pluck('category')->filter()->sort(),
        ]);
    }

    public function byLanguage($language)
    {
        $scriptures = Scripture::where('language', $language)
            ->where('is_active', true)
            ->latest()
            ->paginate(12);
        
        return view('scriptures.index', [
            'scriptures' => $scriptures,
            'languages' => Scripture::distinct()->pluck('language')->filter()->sort(),
            'periods' => Scripture::distinct()->pluck('period')->filter()->sort(),
            'categories' => Scripture::distinct()->pluck('category')->filter()->sort(),
        ]);
    }

    public function byPeriod($period)
    {
        $scriptures = Scripture::where('period', $period)
            ->where('is_active', true)
            ->latest()
            ->paginate(12);
        
        return view('scriptures.index', [
            'scriptures' => $scriptures,
            'languages' => Scripture::distinct()->pluck('language')->filter()->sort(),
            'periods' => Scripture::distinct()->pluck('period')->filter()->sort(),
            'categories' => Scripture::distinct()->pluck('category')->filter()->sort(),
        ]);
    }

    // SuperAdmin methods
    public function index()
    {
        $scriptures = Scripture::latest()->paginate(10);
        return view('superadmin.scriptures.index', compact('scriptures'));
    }

    public function create()
    {
        return view('superadmin.scriptures.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'content' => 'required|string',
            'significance' => 'required|string',
            'teachings' => 'required|string',
            'commentary' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'google_drive_pdf_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('scriptures/featured', 'public');
        }

        $scripture = Scripture::create($validated);

        if ($request->hasFile('gallery_images')) {
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryPaths[] = $image->store('scriptures/gallery', 'public');
            }
            $scripture->gallery_images = $galleryPaths;
            $scripture->save();
        }

        return redirect()->route('superadmin.scriptures.index')
            ->with('success', 'Scripture created successfully.');
    }

    public function edit(Scripture $scripture)
    {
        return view('superadmin.scriptures.edit', compact('scripture'));
    }

    public function update(Request $request, Scripture $scripture)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'content' => 'required|string',
            'significance' => 'required|string',
            'teachings' => 'required|string',
            'commentary' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'google_drive_pdf_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('featured_image')) {
            if ($scripture->featured_image) {
                Storage::disk('public')->delete($scripture->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('scriptures/featured', 'public');
        }

        if ($request->hasFile('gallery_images')) {
            if ($scripture->gallery_images) {
                foreach ($scripture->gallery_images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryPaths[] = $image->store('scriptures/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryPaths;
        }

        $scripture->update($validated);

        return redirect()->route('superadmin.scriptures.index')
            ->with('success', 'Scripture updated successfully.');
    }

    public function destroy(Scripture $scripture)
    {
        if ($scripture->featured_image) {
            Storage::disk('public')->delete($scripture->featured_image);
        }
        if ($scripture->gallery_images) {
            foreach ($scripture->gallery_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $scripture->delete();

        return redirect()->route('superadmin.scriptures.index')
            ->with('success', 'Scripture deleted successfully.');
    }

    public function read(Scripture $scripture)
    {
        if (!$scripture->is_active) {
            abort(404);
        }
        
        // No need to modify Google Drive PDF URL as it's already a full URL
        return view('scriptures.read', compact('scripture'));
    }
} 