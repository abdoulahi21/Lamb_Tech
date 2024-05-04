<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'course_id',
        'type',
        'appreciation',
        'student_id',
        'teacher_id',
        'semester',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
