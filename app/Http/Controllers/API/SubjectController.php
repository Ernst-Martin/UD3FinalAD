<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return Subject::with(['teacher', 'assignments'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'name' => 'required',
            'description' => 'required',
        ]);

        return Subject::create($request->all());
    }

    public function show(Subject $subject)
    {
        return $subject->load(['teacher', 'students', 'assignments']);
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'teacher_id' => 'sometimes|required|exists:users,id',
            'name' => 'sometimes|required',
            'description' => 'sometimes|required',
        ]);

        $subject->update($request->all());
        return $subject;
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->noContent();
    }
}