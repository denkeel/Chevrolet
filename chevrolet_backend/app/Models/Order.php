<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'id',
        'user_id',
        'client_id',
        'start_time',
        'end_time',
        'vin_code',
        'description',
        'completed_work',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
