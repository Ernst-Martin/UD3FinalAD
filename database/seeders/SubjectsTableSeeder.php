<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            'Mathematics',
            'Physics',
            'Chemistry',
            'Biology',
            'History',
            'Literature',
            'Computer Science',
            'English',
        ];

        $teachers = User::where('role', 'teacher')->get();

        foreach ($subjects as $index => $subject) {
            Subject::create([
                'teacher_id' => $teachers[$index % $teachers->count()]->id,
                'name' => $subject,
                'description' => "Description for $subject course",
            ]);
        }
    }
}