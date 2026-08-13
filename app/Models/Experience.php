<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    protected $fillable = [
        'destination_id', 'category_id', 'name', 'name_id', 'slug',
        'description', 'description_id', 'duration', 'price', 'currency',
        'min_persons', 'max_persons', 'image', 'gallery', 'includes',
        'excludes', 'is_featured',
    ];

    protected $appends = ['image_url'];

    protected $casts = [
        'gallery' => 'array', 'includes' => 'array', 'excludes' => 'array',
        'is_featured' => 'boolean', 'price' => 'decimal:2',
    ];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ExperienceCategory::class, 'category_id');
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) return null;
        if (str_starts_with($this->image, 'http')) return $this->image;
        return url('storage/' . $this->image);
    }
}
