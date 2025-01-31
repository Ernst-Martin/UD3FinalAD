<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Assignment;
use App\Models\Enrollment;
use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    public function run(): void
    {
        $enrollments = Enrollment::all();

        foreach ($enrollments as $enrollment) {
            $assignments = Assignment::where('subject_id', $enrollment->subject_id)->get();
            
            foreach ($assignments as $assignment) {
                if ($assignment->due_date < now()) {
                    Grade::create([
                        'user_id' => $enrollment->user_id,
                        'assignment_id' => $assignment->id,
                        'score' => random_int(5, 10),
                        'comments' => 'Random generated grade',
                    ]);
                }
            }
        }
    }
}