<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $fillable = [
        'title',
        'organizer',
        'description',
        'registration_start',
        'registration_end',
        'registration_url',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'registration_start' => 'date',
            'registration_end' => 'date',
            'is_active' => 'boolean',
        ];
    }
}
