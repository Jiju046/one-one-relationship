@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Address:</strong> {{ $student->studentDetail->address }}</p>
    <p><strong>Phone:</strong> {{ $student->studentDetail->phone }}</p>
    
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
@endsection
