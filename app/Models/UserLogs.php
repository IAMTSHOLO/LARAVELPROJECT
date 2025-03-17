<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserLogs extends Model
{


    use HasFactory;

    protected $table = 'USER_LOGS';

    protected $primaryKey = 'Log_ID';

    public $timestamps = false;

    protected $fillable = [
        'User_ID',
        'Action',
        'Timestamp'
    ];

    // Relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'User_ID', 'User_ID');
    }


}
