<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scripture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'significance',
        'summary',
        'original_text',
        'transliteration',
        'translation',
        'commentary',
        'language',
        'author',
        'period',
        'featured_image',
        'gallery_images',
        'google_drive_pdf_url',
        'is_featured',
        'is_active',
        'content',
        'teachings'
    ];

    protected $casts = [
        'chapters' => 'array',
        'audio_recitations' => 'array',
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean'
    ];

    // Use slug for route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Generate slug from name
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = \Str::slug($value);
    }

    // Scope for featured scriptures
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for category
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Get scriptures by language
    public function scopeByLanguage($query, $language)
    {
        return $query->where('language', $language);
    }
}
