<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'message',
        'agreement',
        'is_read',
    ];

    protected $casts = [
        'agreement' => 'boolean',
        'is_read' => 'boolean',
    ];
}
