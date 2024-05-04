<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'teacher_id',
        'monthly_amount',
        'registration_amount',
        'month_required',
    ];

    public function plannings()
    {
        return $this->hasMany(Planning::class);
    }

}
