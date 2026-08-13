<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Milestone extends Model
{
    protected $fillable = ['name', 'name_id', 'slug', 'description', 'description_id', 'icon', 'badge_image', 'stamps_required', 'reward_type', 'reward_value', 'sort_order'];
}
