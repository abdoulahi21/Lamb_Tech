<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_id',
        'schoolclass_id',
        'academic_year',
        'status',
        'documents',
    ];
    public function student()
    {
        return $this->belongsToMany(Profile::class,'registrations','profile_id','schoolclass_id')
            ->withPivot('academic_year','documents','status');
    }
}
