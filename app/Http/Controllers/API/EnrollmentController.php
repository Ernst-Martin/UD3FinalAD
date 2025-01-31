<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        return Enrollment::with(['user', 'subject'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        return Enrollment::create($request->all());
    }

    public function show(Enrollment $enrollment)
    {
        return $enrollment->load(['user', 'subject']);
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'subject_id' => 'sometimes|required|exists:subjects,id',
        ]);

        $enrollment->update($request->all());
        return $enrollment;
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return response()->noContent();
    }
}