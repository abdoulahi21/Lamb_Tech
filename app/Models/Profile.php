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
    public function schoolclasses()
    {
        return $this->belongsToMany(SchoolClass::class, 'registrations');
    }

    public function registration() {
        return $this->belongsToMany(SchoolClass::class,'registrations','profile_id','schoolclass_id')
            ->withPivot('academic_year','documents','status');
    }

    public function allTeachers()
    {
        // les roles se trouvent dans la table users et la table user a une la cle etrangere profile_id qui reference la table profiles
        return $this->hasMany(User::class, 'profile_id')->where('role', 'professeur');
    }

}
