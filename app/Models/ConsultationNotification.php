<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ConsultationNotification extends Model
{
    // namespace App\Models;

    use HasFactory;

    protected $table = 'CONSULTATION_NOTIFICATIONS';

    public $timestamps = false;

    protected $fillable = [
        'Consultation_ID',
        'Notification_ID'
    ];


}
