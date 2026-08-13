<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Island extends Model
{
    protected $fillable = [
        'name', 'name_id', 'slug', 'description', 'description_id', 'image',
    ];

    protected $appends = ['image_url'];

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
