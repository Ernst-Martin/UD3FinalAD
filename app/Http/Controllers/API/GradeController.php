<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        return Grade::with(['user', 'assignment'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'assignment_id' => 'required|exists:assignments,id',
            'score' => 'required|numeric|min:0|max:10',
            'comments' => 'nullable|string',
        ]);

        return Grade::create($request->all());
    }

    public function show(Grade $grade)
    {
        return $grade->load(['user', 'assignment']);
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'score' => 'sometimes|required|numeric|min:0|max:10',
            'comments' => 'nullable|string',
        ]);

        $grade->update($request->all());
        return $grade;
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return response()->noContent();
    }
}