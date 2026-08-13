<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GiProduct extends Model
{
    protected $fillable = [
        'destination_id', 'category_id', 'name', 'name_id', 'slug',
        'description', 'description_id', 'origin_story', 'origin_story_id',
        'landscape_desc', 'landscape_desc_id', 'process_desc', 'process_desc_id',
        'taste_profile', 'taste_profile_id', 'image', 'gallery', 'is_featured',
    ];

    protected $appends = ['image_url'];

    protected $casts = [
        'gallery' => 'array',
        'is_featured' => 'boolean',
    ];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function producers(): BelongsToMany
    {
        return $this->belongsToMany(Producer::class, 'producer_product');
    }

    public function supplyChainSteps(): HasMany
    {
        return $this->hasMany(SupplyChainStep::class)->orderBy('step_order');
    }

    public function marketListings(): HasMany
    {
        return $this->hasMany(MarketListing::class);
    }

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'recipe_product');
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) return null;
        if (str_starts_with($this->image, 'http')) return $this->image;
        return url('storage/' . $this->image);
    }
}
