<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Province extends Model
{
    protected $fillable = [
        'region_id', 'island_id', 'name', 'name_id', 'slug',
        'description', 'description_id', 'image', 'geo_json',
        'latitude', 'longitude', 'gi_destination_count',
        'gi_product_count', 'experience_count',
    ];

    protected $casts = [
        'geo_json' => 'array',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function island(): BelongsTo
    {
        return $this->belongsTo(Island::class);
    }

    public function destinations(): HasMany
    {
        return $this->hasMany(Destination::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
