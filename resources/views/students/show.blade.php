@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Students</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->student_number }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('students.destroy', $student) }}"
                              class="d-inline" onsubmit="return confirm('Delete this student?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No students found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $students->links() }}
</div>
@endsection