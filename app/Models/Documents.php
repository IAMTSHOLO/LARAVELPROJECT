<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documents extends Model
{
    //namespace App\Models;

    use HasFactory;

    protected $table = 'DOCUMENTS';

    protected $primaryKey = 'Document_ID';

    public $timestamps = false;

    protected $fillable = [
        'Document_Name',
        'Document_Type',
        'File_Path',
        'UploadDate',
        'LastModifiedDate',
        'User_ID'
    ];

 // Relationship with User
 public function user(): BelongsTo
 {
     return $this->belongsTo(User::class);
 }
}
