<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Puja extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'significance',
        'procedure',
        'required_items',
        'benefits',
        'duration',
        'price',
        'is_featured',
        'featured_image',
        'gallery',
        'related_festivals',
        'related_scriptures',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'gallery' => 'array',
        'related_festivals' => 'array',
        'related_scriptures' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($puja) {
            $puja->slug = Str::slug($puja->name);
        });

        static::updating(function ($puja) {
            $puja->slug = Str::slug($puja->name);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image ? Storage::url($this->featured_image) : null;
    }

    public function getGalleryUrlsAttribute()
    {
        return collect($this->gallery)->map(function ($image) {
            return Storage::url($image);
        })->toArray();
    }
}
