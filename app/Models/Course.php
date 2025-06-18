<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_name','course_code', 'unit', 'description'];
    /** @use HasFactory<\Database\Factories\CoursesFactory> */
    use HasFactory;
}
