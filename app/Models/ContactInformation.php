<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $fillable = [
        'type',
        'value',
        'label',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    const TYPE_EMAIL = 'email';
    const TYPE_PHONE = 'phone';
    const TYPE_LOCATION = 'location';
    const TYPE_ADDRESS = 'address';
    const TYPE_LINKEDIN = 'linkedin';

    public static function getTypes(): array
    {
        return [
            self::TYPE_EMAIL => 'Email',
            self::TYPE_PHONE => 'Phone',
            self::TYPE_LOCATION => 'Location',
            self::TYPE_ADDRESS => 'Address',
            self::TYPE_LINKEDIN => 'LinkedIn',
        ];
    }

    public static function getActive()
    {
        return self::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }

    public static function getByType(string $type)
    {
        return self::where('type', $type)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }
}
