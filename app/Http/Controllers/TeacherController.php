<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //función get global
    public function index(): JsonResponse
    {
        $teacher = Teacher::latest()->paginate(20);

        return response()->json($teacher, 200);
    }

    //función get individual
    public function show(Teacher $teacher): JsonResponse
    {
        // Laravel busca el ID automáticamente. Si no existe, devuelve 404 solo.
        return response()->json([
            'data' => $teacher,
        ], 200);
    }

    //función post
    public function store(StoreTeacherRequest $request): JsonResponse
    {
        $teacher = Teacher::create($request->validated());

        return response()->json([
            'message' => 'Profesor creado correctamente.',
            'data'    => $teacher,
        ], 201);
    }

    //función put
    public function update(UpdateTeacherRequest $request, Teacher $teacher): JsonResponse
    {
        $teacher->update($request->validated());

        return response()->json([
            'message' => 'Profesor actualizado correctamente.',
            'data'    => $teacher,
        ], 200);
    }

    //función delete
    public function destroy(Teacher $teacher): JsonResponse
    {
        $teacher->delete();

        return response()->json([
            'message' => 'Profesor eliminado correctamente.',
        ], 200);
    }
    public function matricular(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->modules()->attach($request->module_id);

        return response()->json([
            'message' => 'Matrícula del profesor realizada correctamente'
        ], 201);
    }
}
