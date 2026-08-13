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

    protected $appends = ['image_url'];

    protected $casts = [
        'map_data' => 'array',
    ];

    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) return null;
        if (str_starts_with($this->image, 'http')) return $this->image;
        return url('storage/' . $this->image);
    }
}
