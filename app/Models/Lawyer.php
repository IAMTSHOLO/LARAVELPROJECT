<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lawyer extends Model
{
    use HasFactory;
    
    protected $table = 'LAWYERS'; // Assuming your table name is LAWYERS

    protected $primaryKey = 'Lawyer_ID';

    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'specialization',
        'years_of_experience',
    ];

    // Relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
