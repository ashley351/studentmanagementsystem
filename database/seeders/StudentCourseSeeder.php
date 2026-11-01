<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentCourseSeeder extends Seeder
{
    public function run(): void
    {

        // STEP 1: CREATE FIVE STUDENTS

        $students = [

            [
                'registration_number' => '24/U/11375/PS',
                'name' => 'Richard Ssevume',
                'email' => '2400711375@mubs.ac.ug',
            ],

            [
                'registration_number' => '24/U/03713/PS',
                'name' => 'Ashley Joanah Senkali',
                'email' => '2400703713@mubs.ac.ug',
            ],

            [
                'registration_number' => '24/U/25160/PS',
                'name' => 'Mariam Kisakye N',
                'email' => '2400725160@mubs.ac.ug',
            ],

            [
                'registration_number' => '24/U/20186/EVE',
                'name' => 'Shorn Ssempijja',
                'email' => '2400720186@mubs.ac.ug',
            ],

            [
                'registration_number' => '24/U/06148/PS',
                'name' => 'Prillar Komuhimbo',
                'email' => '2400706148@mubs.ac.ug',
            ],

            [
                'registration_number' => '24/U/04960/PS',
                'name' => 'Ezra Kabali',
                'email' => '2400704960@mubs.ac.ug',
            ],

        ];

        foreach ($students as $data) {

            // CREATE STUDENT PROFILE

            $student = Student::firstOrCreate(
                [
                    'registration_number' => $data['registration_number'],
                ],
                [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    
                ]
            );

            // CREATE STUDENT USER ACCOUNT

            $user = User::firstOrCreate(
                [
                    'email' => $data['email'],
                ],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('Bbc#2026'),
                ]
            );

            // LINK USER TO STUDENT PROFILE

            $user->forceFill([
                'student_id' => $student->id,
            ])->save();

            // ASSIGN STUDENT ROLE

            $user->syncRoles(['student']);

        }


        // STEP 2: GET LECTURER

        $lecturer = User::where(
            'email',
            'lecturer@mubs.ac.ug'
        )->firstOrFail();


        // STEP 3: CREATE FOUR COURSES

        $courses = [

            [
                'course_code' => 'BUC3101',
                'title' => 'Advanced Web Development',
                'description' => 'Web application development',
            ],

            [
                'course_code' => 'BUC3102',
                'course_name' => 'Database Management Systems',
                'description' => 'Database design and management',
            ],

            [
                'course_code' => 'BUC3103',
                'course_name' => 'Software Engineering',
                'description' => 'Software development processes',
            ],

            [
                'course_code' => 'BUC3104',
                'course_name' => 'Business Intelligence',
                'description' => 'Data analysis and reporting',
            ],

        ];

        foreach ($courses as $data) {

            Course::firstOrCreate(
                [
                    'course_code' => $data['course_code'],
                ],
                [
                    'course_name' => $data['course_name'],
                    'description' => $data['description'],
                    'lecturer_id' => $lecturer->id,
                ]
            );

        }

    }
}