<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Recipe extends Model
{
    protected $fillable = ['name', 'name_id', 'slug', 'description', 'description_id', 'ingredients', 'instructions', 'image', 'prep_time', 'cook_time', 'servings'];
    protected $casts = ['ingredients' => 'array', 'instructions' => 'array'];
    public function products(): BelongsToMany { return $this->belongsToMany(GiProduct::class, 'recipe_product'); }
}
