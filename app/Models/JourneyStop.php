<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JourneyStop extends Model
{
    protected $fillable = [
        'journey_id', 'destination_id', 'day_number', 'description',
        'description_id', 'activities', 'overnight', 'sort_order',
    ];

    protected $casts = ['activities' => 'array', 'overnight' => 'boolean'];

    public function journey(): BelongsTo { return $this->belongsTo(Journey::class); }
    public function destination(): BelongsTo { return $this->belongsTo(Destination::class); }
}
