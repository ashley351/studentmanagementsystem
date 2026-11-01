<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use App\Models\Registration;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {

        // SAMPLE STUDENT COURSE REGISTRATIONS

        $registrations = [

            [
                'student' => '2026/BBC/001',
                'course' => 'BUC3101',
            ],

            [
                'student' => '2026/BBC/001',
                'course' => 'BUC3102',
            ],

            [
                'student' => '2026/BBC/002',
                'course' => 'BUC3101',
            ],

            [
                'student' => '2026/BBC/002',
                'course' => 'BUC3103',
            ],

            [
                'student' => '2026/BBC/003',
                'course' => 'BUC3102',
            ],

            [
                'student' => '2026/BBC/003',
                'course' => 'BUC3104',
            ],

            [
                'student' => '2026/BBC/004',
                'course' => 'BUC3103',
            ],

            [
                'student' => '2026/BBC/005',
                'course' => 'BUC3104',
            ],

        ];


        foreach ($registrations as $data) {

            // FIND STUDENT

            $student = Student::where(
                'student_number',
                $data['student']
            )->firstOrFail();


            // FIND COURSE

            $course = Course::where(
                'course_code',
                $data['course']
            )->firstOrFail();


            // CREATE REGISTRATION

            Registration::firstOrCreate(

                [
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                ],

                [
                    'registration_date' => now(),
                ]

            );

        }

    }
}