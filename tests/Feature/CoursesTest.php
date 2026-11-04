<?php

use App\Models\Course;
use App\Models\User;

test('authenticated users can create and view a course', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->post(route('courses.store'), [
        'code' => 'CSC101',
        'title' => 'Introduction to Computing',
        'description' => 'Foundational computing concepts.',
        'credit_units' => 3,
    ]);

    $course = Course::where('code', 'CSC101')->firstOrFail();

    $response->assertRedirect(route('courses.index'));
    $this->assertDatabaseHas('courses', [
        'id' => $course->id,
        'title' => 'Introduction to Computing',
        'description' => 'Foundational computing concepts.',
        'credit_units' => 3,
    ]);

    $this->get(route('courses.show', $course))
        ->assertOk()
        ->assertSee('Introduction to Computing')
        ->assertSee('Foundational computing concepts.');
});

test('authenticated users can access the course pages', function () {
    $this->actingAs(User::factory()->create());

    $course = Course::create([
        'code' => 'CSC102',
        'title' => 'Data Structures',
        'description' => 'Core data structures.',
        'credit_units' => 4,
    ]);

    $this->get(route('courses.index'))
        ->assertOk()
        ->assertSee('Data Structures');

    $this->get(route('courses.create'))
        ->assertOk()
        ->assertSee('Add Course');

    $this->get(route('courses.edit', $course))
        ->assertOk()
        ->assertSee('Edit Course')
        ->assertSee('Data Structures');
});

test('guests are redirected to login when accessing courses', function () {
    $this->get(route('courses.index'))
        ->assertRedirect(route('login'));
});
