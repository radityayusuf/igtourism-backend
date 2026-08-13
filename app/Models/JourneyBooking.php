<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JourneyBooking extends Model
{
    protected $fillable = [
        'user_id', 'journey_id', 'booking_date', 'participants',
        'status', 'total_price', 'notes',
    ];
    protected $casts = ['booking_date' => 'date', 'total_price' => 'decimal:2'];
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function journey(): BelongsTo { return $this->belongsTo(Journey::class); }
}
