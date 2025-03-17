<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExternalSystem extends Model
{
  

    use HasFactory;

    protected $table = 'EXTERNAL_SYSTEM';

    protected $primaryKey = 'System_ID';

    public $timestamps = false;

    protected $fillable = [
        'System_Name',
        'System_Type',
        'apiEndpoint',
        'apiKey',
        'supportedFeatures',
        'lastSyncDate',
        'Client_ID'
    ];

    // Relationship with User (Client)
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'Client_ID', 'User_ID');
    }


}
