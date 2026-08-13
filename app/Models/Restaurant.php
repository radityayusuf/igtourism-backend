<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Restaurant extends Model
{
    protected $fillable = [
        'destination_id', 'name', 'slug', 'description', 'description_id',
        'cuisine_type', 'price_range', 'address', 'phone', 'website',
        'image', 'gallery', 'latitude', 'longitude', 'is_featured',
    ];

    protected $appends = ['image_url'];
    protected $casts = ['gallery' => 'array', 'is_featured' => 'boolean'];
    public function destination(): BelongsTo { return $this->belongsTo(Destination::class); }
    public function chefs() { return $this->hasMany(Chef::class); }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) return null;
        if (str_starts_with($this->image, 'http')) return $this->image;
        return url('storage/' . $this->image);
    }
}
