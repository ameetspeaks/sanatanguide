<?php

namespace App\Http\Controllers;

use App\Models\Puja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PujaController extends Controller
{
    public function index()
    {
        $pujas = Puja::latest()->paginate(12);
        return view('superadmin.pujas.index', compact('pujas'));
    }

    public function show(Puja $puja)
    {
        if (auth()->check() && auth()->user()->is_superadmin) {
            return view('superadmin.pujas.show', compact('puja'));
        }
        return view('pujas.show', compact('puja'));
    }

    public function create()
    {
        return view('superadmin.pujas.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'significance' => 'required|string',
            'procedure' => 'required|string',
            'required_items' => 'required|string',
            'benefits' => 'required|string',
            'duration' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'is_featured' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'related_festivals' => 'nullable|array',
            'related_scriptures' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['featured_image', 'gallery']);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('pujas/featured', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $image) {
                $gallery[] = $image->store('pujas/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        Puja::create($data);

        return redirect()->route('superadmin.pujas.index')->with('success', 'Puja created successfully.');
    }

    public function edit(Puja $puja)
    {
        return view('superadmin.pujas.edit', compact('puja'));
    }

    public function update(Request $request, Puja $puja)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'significance' => 'required|string',
            'procedure' => 'required|string',
            'required_items' => 'required|string',
            'benefits' => 'required|string',
            'duration' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'is_featured' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'related_festivals' => 'nullable|array',
            'related_scriptures' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['featured_image', 'gallery']);

        if ($request->hasFile('featured_image')) {
            if ($puja->featured_image) {
                Storage::disk('public')->delete($puja->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('pujas/featured', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($puja->gallery) {
                foreach ($puja->gallery as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $gallery = [];
            foreach ($request->file('gallery') as $image) {
                $gallery[] = $image->store('pujas/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        $puja->update($data);

        return redirect()->route('superadmin.pujas.index')->with('success', 'Puja updated successfully.');
    }

    public function destroy(Puja $puja)
    {
        if ($puja->featured_image) {
            Storage::disk('public')->delete($puja->featured_image);
        }

        if ($puja->gallery) {
            foreach ($puja->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $puja->delete();

        return redirect()->route('superadmin.pujas.index')->with('success', 'Puja deleted successfully.');
    }

    public function featured()
    {
        $pujas = Puja::where('is_featured', true)->latest()->paginate(12);
        return view('superadmin.pujas.index', compact('pujas'));
    }

    public function category($category)
    {
        $pujas = Puja::where('category', $category)->latest()->paginate(12);
        return view('superadmin.pujas.index', compact('pujas'));
    }

    public function publicIndex()
    {
        $featuredPujas = Puja::where('is_featured', true)
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        $pujas = Puja::where('is_active', true)
            ->latest()
            ->paginate(12);

        $categories = Puja::select('category')
            ->distinct()
            ->pluck('category');

        $deities = Puja::select('deity')
            ->distinct()
            ->pluck('deity');

        return view('pujas.index', compact('featuredPujas', 'pujas', 'categories', 'deities'));
    }
} 