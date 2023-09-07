@extends('layouts.app')

@section('content')
    <h1>Edit Student Details</h1>
    <form action="{{ route('students.update', $student->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $student->studentDetail->address }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $student->studentDetail->phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Details</button>
    </form>
@endsection
