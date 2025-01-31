<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        return Assignment::with(['subject', 'grades'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required',
            'description' => 'required',
            'max_score' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        return Assignment::create($request->all());
    }

    public function show(Assignment $assignment)
    {
        return $assignment->load(['subject', 'grades']);
    }

    public function update(Request $request, Assignment $assignment)
    {
        $request->validate([
            'subject_id' => 'sometimes|required|exists:subjects,id',
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'max_score' => 'sometimes|required|numeric',
            'due_date' => 'sometimes|required|date',
        ]);

        $assignment->update($request->all());
        return $assignment;
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return response()->noContent();
    }
}