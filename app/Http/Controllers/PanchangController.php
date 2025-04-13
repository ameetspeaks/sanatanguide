<?php

namespace App\Http\Controllers;

use App\Models\Panchang;
use Illuminate\Http\Request;

class PanchangController extends Controller
{
    public function publicIndex(Request $request)
    {
        $date = $request->input('date') ? date('Y-m-d', strtotime($request->input('date'))) : date('Y-m-d');
        
        // Get or create panchang data for the date
        $panchang = Panchang::firstOrCreate(
            ['date' => $date],
            [
                'tithi_number' => '1',
                'tithi_name' => 'Pratipada',
                'tithi_end' => '06:30',
                'nakshatra' => 'Ashwini',
                'nakshatra_end' => '07:45',
                'yoga' => 'Vishkambha',
                'yoga_end' => '08:15',
                'sunrise' => '06:00',
                'sunset' => '18:30',
                'moon_sign' => 'Aries',
                'moon_phase' => 'Shukla Paksha',
                'rahu_kaal' => '09:00 - 10:30',
                'yamaganda' => '12:00 - 13:30',
                'gulika' => '14:00 - 15:30',
                'brahma_muhurta' => '04:30 - 05:15',
                'abhijit' => '11:45 - 12:30',
                'godhuli' => '18:00 - 18:30',
                'vijaya' => '13:45 - 14:30',
                'samvat' => '2080',
                'masa' => 'Chaitra',
                'paksha' => 'Shukla',
                'festivals' => []
            ]
        );

        return view('panchang.index', compact('panchang'));
    }

    public function index()
    {
        $panchang = Panchang::latest()->paginate(10);
        return view('superadmin.panchang.index', compact('panchang'));
    }

    public function create()
    {
        return view('superadmin.panchang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date|unique:panchang',
            'tithi' => 'required|string',
            'nakshatra' => 'required|string',
            'yoga' => 'required|string',
            'karana' => 'required|string',
            'sunrise' => 'required|date_format:H:i',
            'sunset' => 'required|date_format:H:i',
            'moonrise' => 'required|date_format:H:i',
            'moonset' => 'required|date_format:H:i',
            'rahukalam' => 'required|string',
            'yamagandam' => 'required|string',
            'gulikakalam' => 'required|string',
            'abhyudayam' => 'required|string',
            'amritakalam' => 'required|string',
            'brahmamuhurta' => 'required|string',
            'auspicious_timings' => 'nullable|array',
            'inauspicious_timings' => 'nullable|array',
            'festivals' => 'nullable|array',
            'special_events' => 'nullable|array',
            'description' => 'nullable|string',
        ]);

        Panchang::create($validated);

        return redirect()->route('superadmin.panchang.index')
            ->with('success', 'Panchang entry created successfully.');
    }

    public function show(Panchang $panchang)
    {
        return view('superadmin.panchang.show', compact('panchang'));
    }

    public function edit(Panchang $panchang)
    {
        return view('superadmin.panchang.edit', compact('panchang'));
    }

    public function update(Request $request, Panchang $panchang)
    {
        $validated = $request->validate([
            'date' => 'required|date|unique:panchang,date,' . $panchang->id,
            'tithi' => 'required|string',
            'nakshatra' => 'required|string',
            'yoga' => 'required|string',
            'karana' => 'required|string',
            'sunrise' => 'required|date_format:H:i',
            'sunset' => 'required|date_format:H:i',
            'moonrise' => 'required|date_format:H:i',
            'moonset' => 'required|date_format:H:i',
            'rahukalam' => 'required|string',
            'yamagandam' => 'required|string',
            'gulikakalam' => 'required|string',
            'abhyudayam' => 'required|string',
            'amritakalam' => 'required|string',
            'brahmamuhurta' => 'required|string',
            'auspicious_timings' => 'nullable|array',
            'inauspicious_timings' => 'nullable|array',
            'festivals' => 'nullable|array',
            'special_events' => 'nullable|array',
            'description' => 'nullable|string',
        ]);

        $panchang->update($validated);

        return redirect()->route('superadmin.panchang.index')
            ->with('success', 'Panchang entry updated successfully.');
    }

    public function destroy(Panchang $panchang)
    {
        $panchang->delete();

        return redirect()->route('superadmin.panchang.index')
            ->with('success', 'Panchang entry deleted successfully.');
    }
} 