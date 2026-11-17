<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    //función get global
    public function index(): JsonResponse
    {
        $students = Student::latest()->paginate(20);

        return response()->json($students, 200);
    }

    //función get individual
    public function show(Student $student): JsonResponse
    {
        // Laravel busca el ID automáticamente. Si no existe, devuelve 404 solo.
        return response()->json([
            'data' => $student,
        ], 200);
    }

    //función post
    public function store(StoreStudentRequest $request): JsonResponse
    {
        $student = Student::create($request->validated());

        return response()->json([
            'message' => 'Estudiante creado correctamente.',
            'data'    => $student,
        ], 201);
    }

    //función put
    public function update(UpdateStudentRequest $request, Student $student): JsonResponse
    {
        $student->update($request->validated());

        return response()->json([
            'message' => 'Estudiante actualizado correctamente.',
            'data'    => $student,
        ], 200);
    }

    //función delete
    public function destroy(Student $student): JsonResponse
    {
        $student->delete();

        return response()->json([
            'message' => 'Estudiante eliminado correctamente.',
        ], 200);
    }
}