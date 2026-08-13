<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Accommodation extends Model
{
    protected $fillable = ['destination_id', 'name', 'slug', 'description', 'description_id', 'type', 'price_range', 'address', 'website', 'image', 'latitude', 'longitude'];
    public function destination(): BelongsTo { return $this->belongsTo(Destination::class); }
}
