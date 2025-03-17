<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chatting extends Model
{
    
    use HasFactory;

    protected $table = 'CHATTING';

    protected $primaryKey = 'ChatID';

    public $timestamps = false;

    protected $fillable = [
        'Message',
        'Sent_At',
        'Sent_By',
        'Client_ID',
        'Lawyer_ID'
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

}
