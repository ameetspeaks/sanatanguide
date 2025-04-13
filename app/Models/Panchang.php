<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panchang extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'tithi_number',
        'tithi_name',
        'tithi_end',
        'nakshatra',
        'nakshatra_end',
        'yoga',
        'yoga_end',
        'sunrise',
        'sunset',
        'moon_sign',
        'moon_phase',
        'rahu_kaal',
        'yamaganda',
        'gulika',
        'brahma_muhurta',
        'abhijit',
        'godhuli',
        'vijaya',
        'samvat',
        'masa',
        'paksha',
        'festivals',
    ];

    protected $casts = [
        'date' => 'date',
        'festivals' => 'array',
    ];
}
