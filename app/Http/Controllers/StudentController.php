<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('student');
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = time().''.$file->getClientOriginalName();
        $filePath = $file->storeAs('images',$fileName,'public');

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->image = $filePath;
        $student->save();
        return response()->json([
            'res'=>'Student create success',
        ]);
    }
}
