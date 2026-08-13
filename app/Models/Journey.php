<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Journey extends Model
{
    protected $fillable = [
        'name', 'name_id', 'slug', 'tagline', 'tagline_id',
        'description', 'description_id', 'route_summary', 'route_summary_id',
        'duration_days', 'price_from', 'currency', 'target_audience',
        'style', 'image', 'gallery', 'is_featured',
    ];

    protected $casts = [
        'gallery' => 'array', 'is_featured' => 'boolean', 'price_from' => 'decimal:2',
    ];

    public function stops(): HasMany
    {
        return $this->hasMany(JourneyStop::class)->orderBy('day_number')->orderBy('sort_order');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(JourneyBooking::class);
    }
}
