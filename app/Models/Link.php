<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Link extends Model
{
    protected $fillable = [
        'title',
        'url',
        'description',
        'clicks',
        'is_active'
    ];

    protected function casts(): array{
        return [
            'is_active' => 'boolean',
            'clicks' => 'integer',
        ];
    }
}
