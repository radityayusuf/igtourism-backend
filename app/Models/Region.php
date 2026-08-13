<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $fillable = [
        'name', 'name_id', 'slug', 'description', 'description_id',
        'image', 'map_data', 'sort_order',
    ];

    protected $casts = [
        'map_data' => 'array',
    ];

    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class);
    }
}
