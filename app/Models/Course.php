<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    public function plannings()
    {
        return $this->hasMany(Planning::class);
    }
    protected $fillable=[
        'name',
        'description',
        'coeff',
        'profile_id'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

}
