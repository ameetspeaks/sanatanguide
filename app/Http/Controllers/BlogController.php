<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function publicIndex()
    {
        $blogs = Blog::with('user')
            ->where('is_active', true)
            ->latest()
            ->paginate(10);
            
        return view('blogs.index', compact('blogs'));
    }

    public function index()
    {
        $blogs = Blog::with('user')
            ->latest()
            ->paginate(10);
            
        return view('superadmin.blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        if (request()->is('superadmin/*')) {
            return view('superadmin.blogs.show', compact('blog'));
        }
        
        if (!$blog->is_active) {
            abort(404);
        }
        return view('blogs.show', compact('blog'));
    }

    public function create()
    {
        return view('superadmin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['user_id'] = auth()->id();

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blogs/featured', 'public');
        }

        Blog::create($validated);

        return redirect()->route('superadmin.blogs.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('superadmin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($request->title);

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('blogs/featured', 'public');
        }

        $blog->update($validated);

        return redirect()->route('superadmin.blogs.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }
        
        $blog->delete();

        return redirect()->route('superadmin.blogs.index')
            ->with('success', 'Blog post deleted successfully.');
    }
} 