<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;
    protected $fillable = [
            'sender_id',
            'recipient_id',
            'subject',
            'message',
            'read_at',
    ];
    public function sender()
    {
        return $this->belongsTo(Profile::class, 'sender_id');
    }
}
