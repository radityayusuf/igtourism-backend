<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExperienceCategory extends Model
{
    protected $fillable = [
        'name', 'name_id', 'slug', 'icon', 'description', 'description_id', 'sort_order',
    ];

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class, 'category_id');
    }
}
