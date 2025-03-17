<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notifications extends Model
{
    
    use HasFactory;

    protected $table = 'NOTIFICATIONS';

    protected $primaryKey = 'Notification_ID';

    public $timestamps = false;

    protected $fillable = [
        'Notification_Type',
        'Message',
        'Time_Sent',
        'Notification_technique',
        'User_ID',
        'Created_At'
    ];

    // Relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'User_ID', 'User_ID');
    }


}
