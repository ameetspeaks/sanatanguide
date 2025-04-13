<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'region',
        'deity',
        'significance',
        'celebration_method',
        'customs_and_rituals',
        'related_stories',
        'special_foods',
        'required_items',
        'featured_image',
        'gallery',
        'is_major',
        'is_featured',
        'is_active',
        'dates',
        'date',
        'duration',
        'rituals',
        'customs',
        'food',
        'clothing',
        'decorations'
    ];

    protected $casts = [
        'gallery' => 'array',
        'dates' => 'array',
        'is_major' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'date' => 'date',
        'customs_and_rituals' => 'array',
        'special_foods' => 'array',
        'required_items' => 'array'
    ];

    // Generate slug from name
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = \Str::slug($value);
    }

    // Scope for featured festivals
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for major festivals
    public function scopeMajor($query)
    {
        return $query->where('is_major', true);
    }

    // Scope for active festivals
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Get upcoming festivals
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now())
            ->where('is_active', true)
            ->orderBy('date');
    }

    // Get festivals by deity
    public function scopeByDeity($query, $deity)
    {
        return $query->where('deity', $deity)
            ->where('is_active', true);
    }

    // Get festivals by region
    public function scopeByRegion($query, $region)
    {
        return $query->where('region', $region)
            ->where('is_active', true);
    }
}
