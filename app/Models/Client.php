<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['User_ID']; // Only storing user reference
  
    

    protected $table = 'Clients'; // Assuming your table name is Clients

    protected $primaryKey = 'Client_ID';

    public $timestamps = false;


    // Relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
