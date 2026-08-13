<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producer extends Model
{
    protected $fillable = [
        'destination_id', 'name', 'slug', 'role', 'role_id',
        'village', 'story', 'story_id', 'photo', 'is_featured',
    ];

    protected $casts = ['is_featured' => 'boolean'];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(GiProduct::class, 'producer_product');
    }
}
