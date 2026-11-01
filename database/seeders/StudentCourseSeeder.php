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

        // STEP 1: CREATE SIX STUDENTS

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


        // LOOP THROUGH THE STUDENTS

        foreach ($students as $data) {

            // CREATE A USER ACCOUNT FOR EACH STUDENT

            $user = User::firstOrCreate(

                [
                    'email' => $data['email'],
                ],

                [
                    'name' => $data['name'],
                    'password' => Hash::make('Bbc#2026'),
                ]

            );


            // ASSIGN THE STUDENT ROLE TO THE USER

            $user->syncRoles(['student']);


            // CREATE THE STUDENT PROFILE AND LINK IT TO THE USER

            Student::updateOrCreate(

                [
                    'registration_number' => $data['registration_number'],
                ],

                [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'user_id' => $user->id,
                ]

            );

        }


        // STEP 2: CREATE FOUR COURSES

        $courses = [

            [
                'code' => 'BUC3101',
                'title' => 'Advanced Web Application Development',
                'credit_units' => 5,
            ],

            [
                'code' => 'BUC3102',
                'title' => 'Accounting Information System',
                'credit_units' => 4,
            ],

            [
                'code' => 'BUC3103',
                'title' => 'Software Engineering for Business',
                'credit_units' => 4,
            ],

            [
                'code' => 'BUC3104',
                'title' => 'Mobile Application Development',
                'credit_units' => 4,
            ],

        ];


        // LOOP THROUGH THE COURSES AND SAVE THEM

        foreach ($courses as $data) {

            Course::updateOrCreate(

                [
                    'code' => $data['code'],
                ],

                [
                    'title' => $data['title'],
                    'credit_units' => $data['credit_units'],
                ]

            );

        }


        // DISPLAY A SUCCESS MESSAGE

        $this->command->info(
            'Six students and four courses created successfully!'
        );

    }

}
