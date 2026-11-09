@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $student->name }}</h2>
    <p><strong>Student No:</strong> {{ $student->student_number }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Phone:</strong> {{ $student->phone }}</p>

    <h4>Registered Courses</h4>
    <ul>
        @forelse ($student->courses as $course)
            <li>{{ $course->name }}</li>
        @empty
            <li>No registered courses.</li>
        @endforelse
    </ul>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection