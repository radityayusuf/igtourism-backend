<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PassportStamp extends Model
{
    protected $fillable = ['user_id', 'destination_id', 'stamped_at', 'stamp_image', 'notes'];
    protected $casts = ['stamped_at' => 'datetime'];
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function destination(): BelongsTo { return $this->belongsTo(Destination::class); }
}
