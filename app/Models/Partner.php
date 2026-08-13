<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Partner extends Model
{
    protected $fillable = ['name', 'logo', 'website', 'type', 'is_featured', 'sort_order'];
    protected $casts = ['is_featured' => 'boolean'];
}
