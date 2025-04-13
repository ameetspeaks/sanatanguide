<?php

namespace App\Http\Controllers;

use App\Models\Meditation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MeditationController extends Controller
{
    public function index()
    {
        $meditations = Meditation::latest()->paginate(10);
        return view('superadmin.meditations.index', compact('meditations'));
    }

    public function create()
    {
        return view('superadmin.meditations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'benefits' => 'required|string',
            'instructions' => 'required|string',
            'audio_file' => 'nullable|file|mimes:mp3,wav|max:10240',
            'video_file' => 'nullable|file|mimes:mp4,avi,mov|max:20480',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'difficulty_level' => 'required|string|in:beginner,intermediate,advanced',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('audio_file')) {
            $validated['audio_file'] = $request->file('audio_file')->store('meditations/audio', 'public');
        }

        if ($request->hasFile('video_file')) {
            $validated['video_file'] = $request->file('video_file')->store('meditations/video', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('meditations/featured', 'public');
        }

        Meditation::create($validated);

        return redirect()->route('superadmin.meditations.index')
            ->with('success', 'Meditation created successfully.');
    }

    public function show(Meditation $meditation)
    {
        return view('superadmin.meditations.show', compact('meditation'));
    }

    public function edit(Meditation $meditation)
    {
        return view('superadmin.meditations.edit', compact('meditation'));
    }

    public function update(Request $request, Meditation $meditation)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'benefits' => 'required|string',
            'instructions' => 'required|string',
            'audio_file' => 'nullable|file|mimes:mp3,wav|max:10240',
            'video_file' => 'nullable|file|mimes:mp4,avi,mov|max:20480',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'difficulty_level' => 'required|string|in:beginner,intermediate,advanced',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('audio_file')) {
            if ($meditation->audio_file) {
                Storage::disk('public')->delete($meditation->audio_file);
            }
            $validated['audio_file'] = $request->file('audio_file')->store('meditations/audio', 'public');
        }

        if ($request->hasFile('video_file')) {
            if ($meditation->video_file) {
                Storage::disk('public')->delete($meditation->video_file);
            }
            $validated['video_file'] = $request->file('video_file')->store('meditations/video', 'public');
        }

        if ($request->hasFile('featured_image')) {
            if ($meditation->featured_image) {
                Storage::disk('public')->delete($meditation->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('meditations/featured', 'public');
        }

        $meditation->update($validated);

        return redirect()->route('superadmin.meditations.index')
            ->with('success', 'Meditation updated successfully.');
    }

    public function destroy(Meditation $meditation)
    {
        if ($meditation->audio_file) {
            Storage::disk('public')->delete($meditation->audio_file);
        }

        if ($meditation->video_file) {
            Storage::disk('public')->delete($meditation->video_file);
        }

        if ($meditation->featured_image) {
            Storage::disk('public')->delete($meditation->featured_image);
        }

        $meditation->delete();

        return redirect()->route('superadmin.meditations.index')
            ->with('success', 'Meditation deleted successfully.');
    }
} 