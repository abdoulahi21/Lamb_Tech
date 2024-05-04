<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\EventListener\ProfilerListener;

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


    public function teacher()
    {
        return $this->belongsTo(Profile::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(ProfilerListener::class, 'registrations');
    }

}
