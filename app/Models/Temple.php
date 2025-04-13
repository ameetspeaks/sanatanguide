<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Temple extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'deity',
        'city',
        'state',
        'country',
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
        'gallery',
    ];

    protected $casts = [
        'opening_time' => 'datetime',
        'closing_time' => 'datetime',
        'special_darshan_available' => 'boolean',
        'special_darshan_fee' => 'decimal:2',
        'rules' => 'array',
        'facilities' => 'array',
        'festivals' => 'array',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Generate slug from name
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($temple) {
            $temple->slug = Str::slug($temple->name);
        });

        static::updating(function ($temple) {
            if ($temple->isDirty('name')) {
                $temple->slug = Str::slug($temple->name);
            }
        });
    }

    // Scope for featured temples
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for active temples
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for temples by city
    public function scopeByCity($query, $city)
    {
        return $query->where('city', $city);
    }

    // Scope for temples by state
    public function scopeByState($query, $state)
    {
        return $query->where('state', $state);
    }

    // Scope for temples by deity
    public function scopeByDeity($query, $deity)
    {
        return $query->where('deity', $deity);
    }
}
