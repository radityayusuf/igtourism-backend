<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    protected $fillable = [
        'province_id', 'name', 'name_id', 'slug', 'tagline', 'tagline_id',
        'description', 'description_id', 'image', 'gallery',
        'latitude', 'longitude', 'map_embed', 'is_featured',
    ];

    protected $appends = ['image_url'];

    protected $casts = [
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function giProducts(): HasMany
    {
        return $this->hasMany(GiProduct::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function producers(): HasMany
    {
        return $this->hasMany(Producer::class);
    }

    public function restaurants(): HasMany
    {
        return $this->hasMany(Restaurant::class);
    }

    public function accommodations(): HasMany
    {
        return $this->hasMany(Accommodation::class);
    }

    public function passportStamps(): HasMany
    {
        return $this->hasMany(PassportStamp::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) return null;
        if (str_starts_with($this->image, 'http')) return $this->image;
        return url('storage/' . $this->image);
    }
}
