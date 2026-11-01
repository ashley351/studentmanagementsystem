<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{

    // Fields that can be inserted or updated

    protected $fillable = [

        'code',
        'title',
        'credit_units',
        'lecturer_id',

    ];


    // A course belongs to one lecturer

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }


    // A course has many registrations

    public function registrations()
    {
        return $this->hasMany(CourseRegistration::class);
    }


    // A course can have many students

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'course_registrations',
            'course_id',
            'student_id'
        )->withTimestamps();
    }

}
