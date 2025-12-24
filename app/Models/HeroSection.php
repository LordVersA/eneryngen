<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'page',
        'badge_text',
        'title',
        'subtitle',
        'highlight_heading',
        'highlight_text',
        'cta_text',
        'cta_url',
        'background_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeForPage($query, $page)
    {
        return $query->where('page', $page)->where('is_active', true);
    }
}
