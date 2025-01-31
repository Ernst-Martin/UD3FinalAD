<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function ($user) {
            UserProfile::create([
                'user_id' => $user->id,
                'address' => "Address for {$user->name}",
                'phone' => "6" . random_int(10000000, 99999999),
                'emergency_contact' => "Emergency contact for {$user->name}",
            ]);
        });
    }
}