<?php

namespace App\Http\Controllers;

use App\Models\Temple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TempleController extends Controller
{
    public function publicIndex(Request $request)
    {
        // Get filter parameters
        $state = $request->input('state');
        $city = $request->input('city');
        $deity = $request->input('deity');

        // Base query
        $query = Temple::where('is_active', true);

        // Apply filters if they exist
        if ($state) {
            $query->where('state', $state);
        }
        if ($city) {
            $query->where('city', $city);
        }
        if ($deity) {
            $query->where('deity', $deity);
        }

        // Get featured temples
        $featuredTemples = Temple::where('is_featured', true)
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        // Get all temples with pagination
        $temples = $query->latest()->paginate(8);

        // Get unique values for filters
        $states = Temple::distinct()->pluck('state')->sort();
        $cities = Temple::distinct()->pluck('city')->sort();
        $deities = Temple::distinct()->pluck('deity')->sort();

        return view('temples.index', compact(
            'temples',
            'featuredTemples',
            'states',
            'cities',
            'deities'
        ));
    }

    public function index()
    {
        $temples = Temple::latest()->paginate(10);
        return view('superadmin.temples.index', compact('temples'));
    }

    public function show(Temple $temple)
    {
        // Check if it's a public or admin route
        if (request()->segment(1) === 'superadmin') {
            return view('superadmin.temples.show', compact('temple'));
        }
        
        return view('temples.show', compact('temple'));
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

    public function featured()
    {
        $temples = Temple::where('is_featured', true)
            ->where('is_active', true)
            ->latest()
            ->paginate(10);
        
        return view('temples.index', [
            'temples' => $temples,
            'states' => Temple::distinct()->pluck('state')->sort(),
            'cities' => Temple::distinct()->pluck('city')->sort(),
            'deities' => Temple::distinct()->pluck('deity')->sort(),
        ]);
    }

    public function byCity($city)
    {
        $temples = Temple::where('city', $city)
            ->where('is_active', true)
            ->latest()
            ->paginate(10);
        
        return view('temples.index', [
            'temples' => $temples,
            'states' => Temple::distinct()->pluck('state')->sort(),
            'cities' => Temple::distinct()->pluck('city')->sort(),
            'deities' => Temple::distinct()->pluck('deity')->sort(),
        ]);
    }

    public function byState($state)
    {
        $temples = Temple::where('state', $state)
            ->where('is_active', true)
            ->latest()
            ->paginate(10);
        
        return view('temples.index', [
            'temples' => $temples,
            'states' => Temple::distinct()->pluck('state')->sort(),
            'cities' => Temple::distinct()->pluck('city')->sort(),
            'deities' => Temple::distinct()->pluck('deity')->sort(),
        ]);
    }

    public function byDeity($deity)
    {
        $temples = Temple::where('deity', $deity)
            ->where('is_active', true)
            ->latest()
            ->paginate(10);
        
        return view('temples.index', [
            'temples' => $temples,
            'states' => Temple::distinct()->pluck('state')->sort(),
            'cities' => Temple::distinct()->pluck('city')->sort(),
            'deities' => Temple::distinct()->pluck('deity')->sort(),
        ]);
    }

    public function exportSampleCsv()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="temple_import_sample.csv"',
        ];

        $callback = function() {
            $file = fopen('php://output', 'w');
            
            // Add UTF-8 BOM for Excel
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Headers with required field indicators
            fputcsv($file, [
                'name*',
                'description*',
                'deity*',
                'city*',
                'state*',
                'address*',
                'pincode*',
                'latitude',
                'longitude',
                'opening_time* (HH:MM)',
                'closing_time* (HH:MM)',
                'darshan_duration (minutes)',
                'special_darshan_available (true/false)',
                'special_darshan_fee',
                'dress_code',
                'rules (comma separated)',
                'facilities (comma separated)',
                'history',
                'architecture',
                'festivals (comma separated)',
                'contact_number',
                'email',
                'website',
                'is_featured (true/false)',
                'is_active (true/false)',
                'featured_image (public URL)',
                'gallery (comma separated URLs)'
            ]);

            // Add sample data
            fputcsv($file, [
                'Sample Temple',
                'Sample temple description',
                'Lord Shiva',
                'Varanasi',
                'Uttar Pradesh',
                'Sample Address',
                '221001',
                '25.3176',
                '82.9739',
                '05:00',
                '21:00',
                '30',
                'true',
                '100.00',
                'Traditional attire required',
                'No photography,No mobile phones',
                'Parking,Restrooms,Prasad',
                'Ancient temple history',
                'Traditional architecture',
                'Maha Shivaratri,Shravan',
                '1234567890',
                'sample@temple.com',
                'https://sampletemple.com',
                'true',
                'true',
                'https://example.com/temple.jpg',
                'https://example.com/image1.jpg,https://example.com/image2.jpg'
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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