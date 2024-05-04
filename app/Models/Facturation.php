<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturation extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_id',
        'month',
        'delay',
        'status',
    ];
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
