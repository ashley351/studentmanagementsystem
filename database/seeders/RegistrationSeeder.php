<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Course;

class RegistrationSeeder extends Seeder
{
    
          public function run(): void {
             $registrations = [ 
                 ['registration_number' => '24/U/11375/PS',
                  'code' => 'BUC3101', 'days_ago' => 2],
                  
                  [ 'registration_number' => '24/U/03713/PS', 
                  'code' => 'BUC3102', 'days_ago' => 5], 
                  
                  [ 'registration_number' => '24/U/25160/PS', 
                  'code' => 'BUC3101', 'days_ago' => 8], 
                  
                  [ 'registration_number' => '24/U/20186/EVE',
                   'code' => 'BUC3103', 'days_ago' => 11],
                   
                   [ 'registration_number' => '24/U/06148/PS', 
                   'code' => 'BUC3102', 'days_ago' => 14], 
                   
                   [ 'registration_number' => '24/U/11375/PS', 
                   'code' => 'BUC3104', 'days_ago' => 17], 
                   
                   [ 'registration_number' => '24/U/06148/PS', 
                   'code' => 'BUC3103', 'days_ago' => 20],
                   
                   [ 'registration_number' => '24/U/04960/PS',
                    'code' => 'BUC3104', 'days_ago' => 23],
                     ];

        // Insert registrations

       foreach ($registrations as $data) { 

        // Find student using the correct registration number 
        $student = Student::where(
             'registration_number', 
             $data['registration_number']
             
             )->first(); 
        if (!$student) { throw new \RuntimeException( "Student not found: " . 
        
        $data['registration_number'] );
         }

         // Find course using its course code
          
          $course = Course::where( 'code',
           $data['code'] 
           )->first(); if (!$course) { throw new \RuntimeException(
             "Course not found: " . $data['code'] );
              }
          
          // Insert registration without creating duplicates
           
           DB::table('course_registrations')->updateOrInsert(
             [
                 'student_id' => $student->id, 
                 'course_id' => $course->id,
                  ], 
                  [
                    'created_at' => now()->subDays($data['days_ago'])->setTime(10, 0),
                    'updated_at' => now(),
                  ] ); 
                  }
                   $this->command->info
                   
                   ( 
                    'Sample course registrations created successfully!' 
                    );
                     }

                     
                      }
    
