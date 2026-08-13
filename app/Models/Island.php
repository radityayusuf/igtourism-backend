<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Island extends Model
{
    protected $fillable = [
        'name', 'name_id', 'slug', 'description', 'description_id', 'image',
    ];

    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class);
    }
}
