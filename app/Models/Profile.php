<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthday',
        'place_of_birth',
        'phone',
        'status',
        'responsable_id',
        'address',
        'gender',
        'image',
        'month_paid',
    ];

    public function responsable()
    {
        return $this->belongsTo(Profile::class, 'responsable_id');
    }

    public function taughtClasses()
    {
        return $this->hasMany(SchoolClass::class, 'teacher_id');
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'profile_id');
    }
}
