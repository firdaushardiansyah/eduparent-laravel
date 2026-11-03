<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * SECURITY: Only runs in local/testing environments.
     * Password is taken from .env (SEED_GURU_PASSWORD, SEED_ORTU_PASSWORD)
     * or defaults to a random string displayed once.
     */
    public function run(): void
    {
        // Only seed in local/testing environment
        if (! app()->environment(['local', 'testing'])) {
            $this->command->warn('User seeding skipped: not in local/testing environment');

            return;
        }

        // Get password from .env or generate random
        $guruPassword = env('SEED_GURU_PASSWORD');
        $ortuPassword = env('SEED_ORTU_PASSWORD');

        if (! $guruPassword) {
            $guruPassword = 'guru123';
            $this->command->info("Generated Guru password: {$guruPassword}");
        }

        if (! $ortuPassword) {
            $ortuPassword = 'ortu123';
            $this->command->info("Generated Ortu password: {$ortuPassword}");
        }

        // Create Guru user
        $guru = User::factory()->create([
            'name' => 'Guru Demo',
            'email' => 'guru@eduparent.test',
            'password' => Hash::make($guruPassword),
            'role' => UserRole::Guru->value,
            'is_active' => true,
            'must_change_password' => false,
        ]);

        $this->command->info("Created Guru: {$guru->email}");

        // Create Orang Tua user with must change password
        $ortu = User::factory()->create([
            'name' => 'Orang Tua Demo',
            'email' => 'ortu@eduparent.test',
            'password' => Hash::make($ortuPassword),
            'role' => UserRole::Ortu->value,
            'is_active' => true,
            'must_change_password' => true,
        ]);

        $this->command->info("Created Orang Tua: {$ortu->email} (must change password)");

        // Create inactive user for testing
        $inactive = User::factory()->inactive()->guru()->create([
            'name' => 'Guru Nonaktif',
            'email' => 'nonaktif@eduparent.test',
            'password' => Hash::make('inactive123'),
        ]);

        $this->command->info("Created inactive user: {$inactive->email}");
    }
}
