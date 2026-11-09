<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['registration_number', 'name', 'email', 'user_id'];

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
