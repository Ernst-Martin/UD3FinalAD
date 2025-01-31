<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Database\Seeder;

class EnrollmentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $students = User::where('role', 'student')->get();
        $subjects = Subject::all();

        foreach ($students as $student) {
            // Matricular cada estudiante en 4 asignaturas aleatorias
            $randomSubjects = $subjects->random(4);
            foreach ($randomSubjects as $subject) {
                Enrollment::create([
                    'user_id' => $student->id,
                    'subject_id' => $subject->id,
                ]);
            }
        }
    }
}