<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Event extends Model
{
    protected $fillable = ['title', 'title_id', 'slug', 'description', 'description_id', 'event_type', 'start_date', 'end_date', 'location', 'province_id', 'product_category_id', 'image', 'registration_url', 'is_featured'];
    protected $casts = ['start_date' => 'date', 'end_date' => 'date', 'is_featured' => 'boolean'];
    public function province(): BelongsTo { return $this->belongsTo(Province::class); }
    public function productCategory(): BelongsTo { return $this->belongsTo(ProductCategory::class); }
}
