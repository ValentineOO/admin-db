<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $defaultUserEmail = env('DEFAULT_USER_EMAIL', 'demo@gmail.com');
        $defaultUserName = env('DEFAULT_USER_NAME', 'demo');
        $defaultUserPassword = env('DEFAULT_USER_PASSWORD', 'demo');

        // Check if the user already exists
        $user = User::where('email', $defaultUserEmail)->first();

        if ($user) {
            // User exists, update user information
            $user->update([
                'name' => $defaultUserName,
                // Optionally update other fields if necessary
            ]);
        } else {
            // User does not exist, create a new user
            User::create([
                'name' => $defaultUserName,
                'email' => $defaultUserEmail,
                'password' => Hash::make($defaultUserPassword),
            ]);
        }

        // Call other seeders
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
    }
}
