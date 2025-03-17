<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consultation extends Model
{
   
    use HasFactory;

    protected $table = 'CONSULTATIONS';

    protected $primaryKey = 'Consultation_ID';

    public $timestamps = false;

    protected $fillable = [
        'Date',
        'Time',
        'Consultation_technique',
        'Area_of_consultation',
        'Day_of_Week',
        'Lawyer_ID',
        'Client_ID',
        'Availability_ID',
        'Notification_ID',
        'Notification_technique'
    ];

     // Relationship with Lawyer
 public function lawyer(): BelongsTo
 {
     return $this->belongsTo(Lawyer::class, 'Lawyer_ID', 'Lawyer_ID');
 }

  // Relationship with Client
  public function Client(): BelongsTo
  {
      return $this->belongsTo(Lawyer::class, 'Client_ID', 'Client_ID');
  }
 // Relationship with Availability
 public function Availability(): BelongsTo
 {
     return $this->belongsTo(Lawyer::class, 'Availability_ID', 'Availability_ID');
 }

 // Relationship with Notifications
 public function Notification(): BelongsTo
 {
     return $this->belongsTo(Lawyer::class, 'Notification_ID', 'Notification_ID');
 }
}
