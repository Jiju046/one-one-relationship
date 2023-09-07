<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('studentDetail')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $student = Student::create(['name' => $validatedData['name'], 'email' => $validatedData['email']]);
        $student->studentDetail()->create(['address' => $validatedData['address'], 'phone' => $validatedData['phone']]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }


    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $student->update(['name' => $validatedData['name'], 'email' => $validatedData['email']]);
        $studentDetail = $student->studentDetail;
        $studentDetail->update(['address' => $validatedData['address'], 'phone' => $validatedData['phone']]);

        return redirect()->route('students.show', $student->id)->with('success', 'Student details updated successfully.');
    }


    public function destroy(Student $student)
    {
        $student->studentDetail()->delete(); // Delete associated student details
        $student->delete(); // Delete student record
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}

