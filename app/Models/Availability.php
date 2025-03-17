<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Availability extends Model
{
    //use HasFactory;

    protected $table = 'AVAILABILITY';

    protected $primaryKey = 'Availability_ID';

    public $timestamps = false;

    protected $fillable = [
        'Available_Date',
        'Available_Time',
        'Status',
        'DayOfWeek',
        'Lawyer_ID'
    ];

     // Relationship with Lawyer
     public function lawyer(): BelongsTo
     {
         return $this->belongsTo(Lawyer::class, 'Lawyer_ID', 'Lawyer_ID');
     }
}
