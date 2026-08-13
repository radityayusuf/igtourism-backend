<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class MarketListing extends Model
{
    protected $fillable = ['gi_product_id', 'seller_name', 'price', 'currency', 'unit', 'stock', 'weight', 'description', 'description_id', 'image', 'is_active'];
    protected $casts = ['price' => 'decimal:2', 'is_active' => 'boolean'];
    public function product(): BelongsTo { return $this->belongsTo(GiProduct::class, 'gi_product_id'); }
}
