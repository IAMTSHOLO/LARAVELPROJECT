<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChattingLog extends Model
{

    use HasFactory;

    protected $table = 'CHATTING_LOG';

    protected $primaryKey = 'LogID';

    public $timestamps = false;

    protected $fillable = [
        'Client_ID',
        'Lawyer_ID',
        'Message',
        'Sent_At',
        'Action'
    ];


}
