<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Temple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TempleController extends Controller
{
    public function index()
    {
        $temples = Temple::latest()->paginate(10);
        return view('superadmin.temples.index', compact('temples'));
    }

    public function create()
    {
        return view('superadmin.temples.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'deity' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|string',
            'pincode' => 'required|string|max:10',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i',
            'darshan_duration' => 'nullable|integer',
            'special_darshan_available' => 'boolean',
            'special_darshan_fee' => 'nullable|numeric',
            'dress_code' => 'nullable|string',
            'rules' => 'nullable|string',
            'facilities' => 'nullable|string',
            'history' => 'nullable|string',
            'architecture' => 'nullable|string',
            'festivals' => 'nullable|string',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('temples/featured', 'public');
        }

        $gallery = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $gallery[] = $image->store('temples/gallery', 'public');
            }
        }
        $validated['gallery'] = $gallery;

        Temple::create($validated);

        return redirect()->route('superadmin.temples.index')
            ->with('success', 'Temple created successfully.');
    }

    public function show(Temple $temple)
    {
        return view('superadmin.temples.show', compact('temple'));
    }

    public function edit(Temple $temple)
    {
        return view('superadmin.temples.edit', compact('temple'));
    }

    public function update(Request $request, Temple $temple)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'deity' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|string',
            'pincode' => 'required|string|max:10',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i',
            'darshan_duration' => 'nullable|integer',
            'special_darshan_available' => 'boolean',
            'special_darshan_fee' => 'nullable|numeric',
            'dress_code' => 'nullable|string',
            'rules' => 'nullable|string',
            'facilities' => 'nullable|string',
            'history' => 'nullable|string',
            'architecture' => 'nullable|string',
            'festivals' => 'nullable|string',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($temple->featured_image) {
                Storage::disk('public')->delete($temple->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('temples/featured', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($temple->gallery) {
                foreach ($temple->gallery as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $gallery = [];
            foreach ($request->file('gallery') as $image) {
                $gallery[] = $image->store('temples/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        $temple->update($validated);

        return redirect()->route('superadmin.temples.index')
            ->with('success', 'Temple updated successfully.');
    }

    public function destroy(Temple $temple)
    {
        if ($temple->featured_image) {
            Storage::disk('public')->delete($temple->featured_image);
        }
        if ($temple->gallery) {
            foreach ($temple->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $temple->delete();

        return redirect()->route('superadmin.temples.index')
            ->with('success', 'Temple deleted successfully.');
    }

    public function exportSampleCsv()
    {
        $headers = [
            'name',
            'description',
            'deity',
            'city',
            'state',
            'address',
            'pincode',
            'latitude',
            'longitude',
            'opening_time',
            'closing_time',
            'darshan_duration',
            'special_darshan_available',
            'special_darshan_fee',
            'dress_code',
            'rules',
            'facilities',
            'history',
            'architecture',
            'festivals',
            'contact_number',
            'email',
            'website',
            'is_featured',
            'is_active',
            'featured_image',
            'gallery'
        ];

        // Create CSV content
        $csv = implode(',', $headers) . "\n";

        // Return the response
        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="temple_import_sample.csv"',
        ]);
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        $file = $request->file('csv_file');
        $handle = fopen($file->getPathname(), 'r');
        
        // Skip header row
        fgetcsv($handle);
        
        $successCount = 0;
        $errorCount = 0;
        $errors = [];

        while (($data = fgetcsv($handle)) !== false) {
            try {
                $templeData = [
                    'name' => $data[0],
                    'description' => $data[1],
                    'deity' => $data[2],
                    'city' => $data[3],
                    'state' => $data[4],
                    'address' => $data[5],
                    'pincode' => $data[6],
                    'latitude' => $data[7] ?: null,
                    'longitude' => $data[8] ?: null,
                    'opening_time' => $data[9],
                    'closing_time' => $data[10],
                    'darshan_duration' => $data[11] ?: null,
                    'special_darshan_available' => strtolower($data[12]) === 'true',
                    'special_darshan_fee' => $data[13] ?: null,
                    'dress_code' => $data[14] ?: null,
                    'rules' => $data[15] ? explode(',', $data[15]) : [],
                    'facilities' => $data[16] ? explode(',', $data[16]) : [],
                    'history' => $data[17] ?: null,
                    'architecture' => $data[18] ?: null,
                    'festivals' => $data[19] ? explode(',', $data[19]) : [],
                    'contact_number' => $data[20] ?: null,
                    'email' => $data[21] ?: null,
                    'website' => $data[22] ?: null,
                    'is_featured' => strtolower($data[23]) === 'true',
                    'is_active' => strtolower($data[24]) === 'true',
                    'featured_image' => $data[25] ?: null,
                    'gallery' => $data[26] ? explode(',', $data[26]) : []
                ];

                // Validate required fields
                $validator = \Validator::make($templeData, [
                    'name' => 'required|string|max:255',
                    'description' => 'required|string',
                    'deity' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                    'state' => 'required|string|max:255',
                    'address' => 'required|string',
                    'pincode' => 'required|string|max:10',
                    'opening_time' => 'required|date_format:H:i',
                    'closing_time' => 'required|date_format:H:i',
                ]);

                if ($validator->fails()) {
                    $errors[] = "Row " . ($successCount + $errorCount + 1) . ": " . implode(', ', $validator->errors()->all());
                    $errorCount++;
                    continue;
                }

                Temple::create($templeData);
                $successCount++;
            } catch (\Exception $e) {
                $errors[] = "Row " . ($successCount + $errorCount + 1) . ": " . $e->getMessage();
                $errorCount++;
            }
        }

        fclose($handle);

        $message = "Import completed. Success: {$successCount}, Errors: {$errorCount}";
        if (!empty($errors)) {
            $message .= "\nErrors:\n" . implode("\n", $errors);
        }

        return redirect()->back()->with('message', $message);
    }
} 