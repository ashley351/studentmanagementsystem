<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'registration_number'];

    public function registrations()
    {
        return $this->hasMany(CourseRegistration::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_registrations')
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

