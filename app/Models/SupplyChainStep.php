<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupplyChainStep extends Model
{
    protected $fillable = [
        'gi_product_id', 'step_order', 'level', 'label', 'label_id',
        'description', 'description_id', 'icon', 'latitude', 'longitude',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(GiProduct::class, 'gi_product_id');
    }
}
