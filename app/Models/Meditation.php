<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meditation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'benefits',
        'instructions',
        'audio_file',
        'video_file',
        'featured_image',
        'category',
        'difficulty_level',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'benefits' => 'array',
        'instructions' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
} 