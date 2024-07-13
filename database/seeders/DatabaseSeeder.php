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
        $defaultUserEmail = env('DEFAULT_USER_EMAIL');
        $defaultUserName = env('DEFAULT_USER_NAME',);
        $defaultUserPassword = env('DEFAULT_USER_PASSWORD');

        // Check if the environment variables are set
        if (!$defaultUserEmail || !$defaultUserName || !$defaultUserPassword) {
            throw new \Exception('Default user environment variables are not set');
        }

        // Check if the user already exists
        $user = User::where('email', $defaultUserEmail)->first();

        if ($user) {
            // User exists, update user information
            $user->update([
                'name' => $defaultUserName,
                'is_admin' => true,
                // Optionally update other fields if necessary
            ]);
        } else {
            // User does not exist, create a new user
            User::create([
                'name' => $defaultUserName,
                'email' => $defaultUserEmail,
                'password' => Hash::make($defaultUserPassword),
                'is_admin' => true,
            ]);
        }

        // Call other seeders
        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
        ]);
    }
}
