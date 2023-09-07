@extends('layouts.app')

@section('content')
    <h1>Student List</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $count=>$student)
                <tr>
                    <td>{{ $count+1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->studentDetail->address }}</td>
                    <td>{{ $student->studentDetail->phone }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="text-success"><i class="bi bi-eyeglasses"></i></a>
                        <a href="{{ route('students.edit', $student->id) }}" class="text-success"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-danger bg-light border-0" onclick="return confirm('Are you sure you want to delete this student?')"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
