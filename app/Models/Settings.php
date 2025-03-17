<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'SETTINGS';

    protected $primaryKey = 'Setting_ID';

    public $timestamps = false;

    protected $fillable = [
        'Language_preference',
        'Font_Size',
        'Color_mode',
        'Notification_preference',
        'User_ID'
    ];

    // Relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'User_ID', 'User_ID');
    }


}
