<?php

use App\Models\Student;
use App\Models\User;

test('authenticated users can register a student', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->post(route('registrations.store'), [
        'name' => 'Taylor Student',
        'email' => 'taylor@example.com',
        'registration_number' => 'STU-1001',
    ]);

    $response->assertRedirect(route('registrations.create'));
    $this->assertDatabaseHas('students', [
        'name' => 'Taylor Student',
        'email' => 'taylor@example.com',
        'registration_number' => 'STU-1001',
    ]);
});

test('student registrations reject duplicate email addresses', function () {
    $this->actingAs(User::factory()->create());

    Student::create([
        'name' => 'Existing Student',
        'email' => 'existing@example.com',
        'registration_number' => 'STU-1002',
    ]);

    $this->from(route('registrations.create'))
        ->post(route('registrations.store'), [
            'name' => 'Another Student',
            'email' => 'existing@example.com',
            'registration_number' => 'STU-1003',
        ])
        ->assertSessionHasErrors('email');
});
