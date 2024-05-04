<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'date',
        'start_time',
        'end_time'
    ];
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

}
