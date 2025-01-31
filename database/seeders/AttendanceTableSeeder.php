<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Enrollment;
use Illuminate\Database\Seeder;

class AttendanceTableSeeder extends Seeder
{
    public function run(): void
    {
        $enrollments = Enrollment::all();
        $dates = [
            now()->subDays(2),
            now()->subDays(1),
            now(),
        ];

        foreach ($enrollments as $enrollment) {
            foreach ($dates as $date) {
                Attendance::create([
                    'user_id' => $enrollment->user_id,
                    'subject_id' => $enrollment->subject_id,
                    'date' => $date,
                    'present' => random_int(0, 1),
                ]);
            }
        }
    }
}