<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sessions extends Model
{
    use HasFactory;

    protected $table = 'SESSIONS';

    protected $primaryKey = 'id'; // Default Laravel sessions table uses 'id'

    public $timestamps = false;

    protected $fillable = [
        'User_ID',
        'ip_address',
        'payload',
        'last_activity'
    ];

    // Relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'User_ID', 'User_ID');
    }


}
