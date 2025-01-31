<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return Attendance::with(['user', 'subject'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date',
            'present' => 'required|boolean',
        ]);

        return Attendance::create($request->all());
    }

    public function show(Attendance $attendance)
    {
        return $attendance->load(['user', 'subject']);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'present' => 'sometimes|required|boolean',
        ]);

        $attendance->update($request->all());
        return $attendance;
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return response()->noContent();
    }
}