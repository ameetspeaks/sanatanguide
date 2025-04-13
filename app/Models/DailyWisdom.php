<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyWisdom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'source',
        'featured_image',
        'is_featured',
        'is_active',
        'date',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'date' => 'date',
    ];
} 