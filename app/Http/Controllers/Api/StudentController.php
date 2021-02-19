<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller; 
use App\Models\Student;
use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return response()->json([
            "success" => true,
            "message" => "Student List",
            "data" => $students
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'address'       =>  'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $student = Student::create($input);
        return response()->json([
            "success"   => true,
            "message"   => "Student created successfully.",
            "data"      => $student
        ]);
    }

    public function show($id)
    {
        $student = Student::find($id);
        if (is_null($student)) {
            return response()->json($validator->errors());  
        }
        return response()->json([
            "success"   => true,
            "message"   => "Student retrieved successfully.",
            "data"      => $student
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'address'       => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());      
        }

        $student->first_name = $input['first_name'];
        $student->last_name = $input['last_name'];
        $student->address = $input['address'];
        $student->save();

        return response()->json([
            "success"   => true,
            "message"   => "Student updated successfully.",
            "data"      => $student
        ]);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            "success"   => true,
            "message"   => "Student deleted successfully.",
            "data"      => $student
        ]);
    }
}
