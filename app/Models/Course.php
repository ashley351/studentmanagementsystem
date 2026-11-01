<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'title', 'credit_units'];

    public function registrations()
    {
        return $this->hasMany(CourseRegistration::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_registrations')
                    ->withTimestamps();
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }
}
