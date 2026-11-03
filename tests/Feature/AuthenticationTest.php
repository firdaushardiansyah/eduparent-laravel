<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guru_can_login_and_redirects_to_guru_dashboard(): void
    {
        $guru = User::factory()->guru()->create([
            'email' => 'guru@test.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'guru@test.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($guru);
        $response->assertRedirect('/guru/dashboard');
    }

    public function test_ortu_can_login_and_redirects_to_ortu_dashboard(): void
    {
        $ortu = User::factory()->ortu()->create([
            'email' => 'ortu@test.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'ortu@test.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($ortu);
        $response->assertRedirect('/ortu/dashboard');
    }

    public function test_login_with_wrong_credentials_shows_generic_error(): void
    {
        $response = $this->post('/login', [
            'email' => 'wrong@test.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_login_with_wrong_password_shows_generic_error(): void
    {
        User::factory()->guru()->create([
            'email' => 'guru@test.com',
            'password' => Hash::make('correctpassword'),
        ]);

        $response = $this->post('/login', [
            'email' => 'guru@test.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_inactive_account_cannot_login(): void
    {
        User::factory()->inactive()->create([
            'email' => 'inactive@test.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'inactive@test.com',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_rate_limiting_blocks_after_5_failed_attempts(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', [
                'email' => 'test@test.com',
                'password' => 'wrong',
            ]);
        }

        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'wrong',
        ]);

        $response->assertSessionHasErrors('email');
        $errors = session()->get('errors');
        $this->assertNotNull($errors);
        $this->assertStringContainsString('too many', strtolower($errors->first('email')));
    }

    public function test_session_is_regenerated_after_login(): void
    {
        $user = User::factory()->guru()->create([
            'password' => Hash::make('password123'),
        ]);

        $oldToken = session()->token();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $this->assertNotEquals($oldToken, session()->token());
    }

    public function test_logout_invalidates_session(): void
    {
        $user = User::factory()->guru()->create();

        $this->actingAs($user);

        $response = $this->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/login');
    }

    public function test_password_is_rehashed_if_needed(): void
    {
        // Test that password hashing works correctly
        $user = User::factory()->guru()->create([
            'password' => 'password123',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/guru/dashboard');

        $user->refresh();
        
        // Verify password is properly hashed
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    public function test_must_change_password_redirects_to_password_change_page(): void
    {
        $user = User::factory()->guru()->mustChangePassword()->create();

        $this->actingAs($user);

        $response = $this->get('/guru/dashboard');

        $response->assertRedirect('/change-password');
    }

    public function test_can_change_password(): void
    {
        $user = User::factory()->guru()->mustChangePassword()->create([
            'password' => Hash::make('oldpassword123'),
        ]);

        $this->actingAs($user);

        $response = $this->post('/change-password', [
            'current_password' => 'oldpassword123',
            'password' => 'NewPassword123',
            'password_confirmation' => 'NewPassword123',
        ]);

        $user->refresh();

        $this->assertFalse($user->must_change_password);
        $this->assertTrue(Hash::check('NewPassword123', $user->password));
        $response->assertRedirect('/guru/dashboard');
    }
}
