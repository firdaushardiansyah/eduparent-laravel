<?php

namespace App\Console\Commands;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

class MakeGuruCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:guru {email?} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Guru user account';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $email = $this->argument('email') ?? text(
            label: 'Email',
            placeholder: 'guru@example.com',
            required: true,
            validate: fn (string $value) => match (true) {
                ! filter_var($value, FILTER_VALIDATE_EMAIL) => 'Email tidak valid.',
                User::where('email', $value)->exists() => 'Email sudah digunakan.',
                default => null
            }
        );

        $name = $this->argument('name') ?? text(
            label: 'Nama',
            placeholder: 'Nama Guru',
            required: true
        );

        $password = password(
            label: 'Password',
            placeholder: 'Minimal 10 karakter',
            required: true,
            validate: function (string $value) {
                $validator = Validator::make(['password' => $value], [
                    'password' => ['required', 'string', 'min:10'],
                ]);

                if ($validator->fails()) {
                    return $validator->errors()->first('password');
                }

                return null;
            }
        );

        $confirmPassword = password(
            label: 'Konfirmasi Password',
            required: true,
            validate: fn (string $value) => $value !== $password ? 'Password tidak sama.' : null
        );

        // Create user
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->setRole(UserRole::Guru);
        $user->setActive(true);
        $user->setMustChangePassword(false);
        $user->save();

        $this->components->info("Guru account created successfully for {$email}");

        return self::SUCCESS;
    }
}
