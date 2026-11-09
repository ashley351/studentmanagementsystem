@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Student</h2>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        @include('students._form')
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection