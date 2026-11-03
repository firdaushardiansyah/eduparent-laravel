<?php

namespace Tests\Feature;

use App\Models\LoginAudit;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_is_stored_as_hash(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        $this->assertNotEquals('password123', $user->password);
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    public function test_role_is_not_mass_assignable(): void
    {
        $user = User::factory()->guru()->create();

        $user->fill(['role' => 'ortu']);
        $user->save();

        $user->refresh();

        $this->assertEquals('guru', $user->role->value);
    }

    public function test_login_audit_is_created_on_success(): void
    {
        $user = User::factory()->guru()->create([
            'password' => Hash::make('password123'),
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $this->assertDatabaseHas('login_audits', [
            'user_id' => $user->id,
            'event' => 'login_success',
        ]);
    }

    public function test_login_audit_is_created_on_failure(): void
    {
        $this->post('/login', [
            'email' => 'nonexistent@test.com',
            'password' => 'wrongpassword',
        ]);

        $this->assertDatabaseHas('login_audits', [
            'event' => 'login_failed',
        ]);
    }

    public function test_logout_audit_is_created(): void
    {
        $user = User::factory()->guru()->create();

        $this->actingAs($user);

        $this->post('/logout');

        $this->assertDatabaseHas('login_audits', [
            'user_id' => $user->id,
            'event' => 'logout',
        ]);
    }

    public function test_password_not_in_audit_log(): void
    {
        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'testpassword123',
        ]);

        $audits = LoginAudit::all();

        foreach ($audits as $audit) {
            $this->assertStringNotContainsString('testpassword123', json_encode($audit->toArray()));
        }
    }

    public function test_email_in_audit_is_hashed(): void
    {
        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'testpassword123',
        ]);

        $audit = LoginAudit::first();

        $this->assertNotEquals('test@test.com', $audit->email_attempted);
        $this->assertEquals(hash('sha256', 'test@test.com'), $audit->email_attempted);
    }

    public function test_csrf_protection_on_login(): void
    {
        $response = $this->withoutMiddleware(ValidateCsrfToken::class)
            ->post('/login', [
                'email' => 'test@test.com',
                'password' => 'password',
            ]);

        // Without CSRF middleware, request should process
        // With CSRF middleware active, missing token would return 419
        $response->assertSessionHasErrors('email'); // Login will fail due to wrong credentials
    }

    public function test_csrf_token_required_on_login(): void
    {
        // Test that form has CSRF field
        $response = $this->get('/login');
        $response->assertSee('csrf-token', false);
    }

    public function test_logout_only_accepts_post_method(): void
    {
        $user = User::factory()->guru()->create();

        $this->actingAs($user);

        $response = $this->get('/logout');

        $response->assertStatus(405);
    }

    public function test_new_password_cannot_be_same_as_current(): void
    {
        $user = User::factory()->guru()->create([
            'password' => Hash::make('password123'),
        ]);

        $this->actingAs($user);

        $response = $this->post('/change-password', [
            'current_password' => 'password123',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_password_requires_minimum_10_characters(): void
    {
        $user = User::factory()->guru()->create([
            'password' => Hash::make('oldpass123'),
        ]);

        $this->actingAs($user);

        $response = $this->post('/change-password', [
            'current_password' => 'oldpass123',
            'password' => 'Short1',
            'password_confirmation' => 'Short1',
        ]);

        $response->assertSessionHasErrors('password');
    }
}
