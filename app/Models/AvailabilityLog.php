<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class AvailabilityLog extends Model
{
    
    use HasFactory;

    protected $table = 'AVAILABILITY_LOGS';

    protected $primaryKey = 'Log_ID';

    public $timestamps = false;

    protected $fillable = [
        'Lawyer_ID',
        'Old_Date',
        'New_Date',
        'Timestamp'
    ];
 // Relationship with Lawyer
 public function lawyer(): BelongsTo
 {
     return $this->belongsTo(Lawyer::class, 'Lawyer_ID', 'Lawyer_ID');
 }


}
