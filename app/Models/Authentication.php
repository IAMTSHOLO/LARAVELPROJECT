<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Authentication extends Model
{
    //use HasFactory;

    protected $table = 'AUTHENTICATION'; // Explicit table name if different from Laravel's naming convention

    protected $primaryKey = 'Auth_ID'; // Explicit primary key if not "id"

    public $timestamps = false; // If timestamps (created_at, updated_at) are not used

    protected $fillable = [
        'Auth_Token',
        'Last_Login',
        'Failed_Attempts',
        'User_ID'
    ];
     // Relationship with User
     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class);
     }
}
