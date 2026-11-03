<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guru_can_access_guru_dashboard(): void
    {
        $guru = User::factory()->guru()->create();

        $response = $this->actingAs($guru)->get('/guru/dashboard');

        $response->assertOk();
    }

    public function test_ortu_can_access_ortu_dashboard(): void
    {
        $ortu = User::factory()->ortu()->create();

        $response = $this->actingAs($ortu)->get('/ortu/dashboard');

        $response->assertOk();
    }

    public function test_guru_cannot_access_ortu_dashboard(): void
    {
        $guru = User::factory()->guru()->create();

        $response = $this->actingAs($guru)->get('/ortu/dashboard');

        $response->assertForbidden();
    }

    public function test_ortu_cannot_access_guru_dashboard(): void
    {
        $ortu = User::factory()->ortu()->create();

        $response = $this->actingAs($ortu)->get('/guru/dashboard');

        $response->assertForbidden();
    }

    public function test_guest_redirected_to_login(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_inactive_user_is_logged_out(): void
    {
        $user = User::factory()->inactive()->guru()->create();

        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $this->assertGuest();
        $response->assertRedirect('/login');
    }

    public function test_dashboard_redirects_to_role_specific_dashboard(): void
    {
        $guru = User::factory()->guru()->create();
        $ortu = User::factory()->ortu()->create();

        $this->actingAs($guru)
            ->get('/dashboard')
            ->assertRedirect('/guru/dashboard');

        $this->actingAs($ortu)
            ->get('/dashboard')
            ->assertRedirect('/ortu/dashboard');
    }
}
