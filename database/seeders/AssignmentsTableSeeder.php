<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class AssignmentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = Subject::all();

        foreach ($subjects as $subject) {
            // Crear 3 tareas por asignatura
            for ($i = 1; $i <= 3; $i++) {
                Assignment::create([
                    'subject_id' => $subject->id,
                    'title' => "Assignment $i for {$subject->name}",
                    'description' => "Description for assignment $i",
                    'max_score' => 10.0,
                    'due_date' => now()->addDays(random_int(1, 30)),
                ]);
            }
        }
    }
}