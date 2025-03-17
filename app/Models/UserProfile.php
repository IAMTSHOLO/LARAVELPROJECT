<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{


    use HasFactory;

    protected $table = 'USER_PROFILE';

    protected $primaryKey = 'Profile_ID';

    public $timestamps = false;

    protected $fillable = [
        'User_ID',
        'Role'
    ];

    // Relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'User_ID', 'User_ID');
    }


}
