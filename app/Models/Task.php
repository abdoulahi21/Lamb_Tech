<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];

    function teacher() {
        return $this->belongsTo(Profile::class);
    }

    function schoolClass() {
        return $this->belongsTo(SchoolClass::class);
    }
}
