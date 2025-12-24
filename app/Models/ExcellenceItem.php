<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExcellenceItem extends Model
{
    protected $fillable = [
        'title',
        'description',
        'link_text',
        'link_url',
        'icon_type',
        'icon_svg',
        'icon_image',
        'icon_primary_style',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'icon_primary_style' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }
}
