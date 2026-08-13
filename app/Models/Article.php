<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Article extends Model
{
    protected $fillable = ['category_id', 'title', 'title_id', 'slug', 'excerpt', 'excerpt_id', 'body', 'body_id', 'author', 'image', 'gallery', 'published_at', 'is_featured'];
    protected $casts = ['gallery' => 'array', 'published_at' => 'datetime', 'is_featured' => 'boolean'];
    public function category(): BelongsTo { return $this->belongsTo(ArticleCategory::class, 'category_id'); }
}
