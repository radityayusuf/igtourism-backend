<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    protected $fillable = [
        'name', 'name_id', 'slug', 'icon', 'description', 'description_id',
        'image', 'sort_order',
    ];
    
    public function products(): HasMany
    {
        return $this->hasMany(GiProduct::class, 'category_id');
    }
}
