<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Chef extends Model
{
    protected $fillable = ['restaurant_id', 'name', 'slug', 'bio', 'bio_id', 'specialty', 'image', 'is_featured'];
    protected $casts = ['is_featured' => 'boolean'];
    public function restaurant(): BelongsTo { return $this->belongsTo(Restaurant::class); }
}
