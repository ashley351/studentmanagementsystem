<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  Illuminate\Support\Facades\DB;
 // added this to interact with the xampp database table
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // this tells laravel to look for a view file named 'create.balde.php'
        //inside a folder named 'registrations.create'
        return view('registrations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming form fields from the student
        $validate =$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:registrations'
        ]);

        //insert the student into your xampp database table
        //Note: Replace 'students' with the exact name of you made in phpMyAdmin
        DB::table('students')->insert([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Redirect back to the form page with a success message alert
        return redirect()->route('registrations.create')->with('success', 'Student registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
