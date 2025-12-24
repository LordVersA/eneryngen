<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicalSupportTile extends Model
{
    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_url',
        'background_color',
        'border_accent_color',
        'icon_type',
        'icon_svg',
        'icon_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
