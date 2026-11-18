<?php

namespace App\Models;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    
    public function Teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function Students()
    {
        return $this->belongsToMany(Student::class);
    }
}