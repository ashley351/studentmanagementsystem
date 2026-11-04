<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registrations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'registration_number' => ['required', 'string', 'max:255', 'unique:students,registration_number'],
        ]);

        Student::create($validated);

        return redirect()->route('registrations.create')->with('success', 'Student registered successfully!');
    }
}
