<?php

namespace App\Models;
use App\Casters\MainPageSectionTypeCaster;
use Illuminate\Database\Eloquent\Model;


class MainPageSection extends Model
{
    protected $casts = [
        'type' => MainPageSectionTypeCaster::class,
        'content' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'title',
        'type',
        'content'
    ];
}
