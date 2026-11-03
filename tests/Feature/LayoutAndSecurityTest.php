<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class LayoutAndSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_layout_check_route_returns_ok_on_local(): void
    {
        $user = User::factory()->guru()->create();

        $response = $this->actingAs($user)->get('/layout-check');

        $response->assertStatus(200);
        $response->assertSee('Pengujian Base Layout & Binding Aset');
        $response->assertSee('name="csrf-token"', false);
    }

    public function test_security_headers_are_present(): void
    {
        $user = User::factory()->guru()->create();

        $response = $this->actingAs($user)->get('/layout-check');

        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
        $response->assertHeader('Content-Security-Policy-Report-Only');
    }

    public function test_session_cookie_configuration(): void
    {
        $this->assertTrue(config('session.http_only'));
        $this->assertEquals('lax', config('session.same_site'));
        $this->assertEquals(120, config('session.lifetime'));
    }

    public function test_form_submission_with_csrf_succeeds(): void
    {
        $user = User::factory()->guru()->create();

        $response = $this->actingAs($user)
            ->withSession(['_token' => 'test-csrf-token'])
            ->post('/layout-check/submit', [
                '_token' => 'test-csrf-token',
                'nama_siswa' => 'Budi Santoso',
                'kelas' => 'TK-A',
            ]);

        $response->assertSessionHas('success');
    }

    public function test_xss_escaping_in_flash_and_form(): void
    {
        $user = User::factory()->guru()->create();
        $xssPayload = '<script>alert("xss")</script>';

        $response = $this->actingAs($user)
            ->withSession(['_token' => 'test-csrf-token'])
            ->post('/layout-check/submit', [
                '_token' => 'test-csrf-token',
                'nama_siswa' => $xssPayload,
                'kelas' => 'TK-A',
            ]);

        $redirectResponse = $this->actingAs($user)->get('/layout-check');
        $content = $redirectResponse->getContent();

        // Ensure literal script tags are escaped into HTML entities and not executed as raw HTML
        $this->assertStringNotContainsString('<script>alert("xss")</script>', $content);
        $this->assertStringContainsString(e($xssPayload), $content);
    }

    public function test_logout_route_is_post(): void
    {
        $routes = Route::getRoutes()->getByName('logout');
        $this->assertNotNull($routes);
        $this->assertContains('POST', $routes->methods());
        $this->assertNotContains('GET', $routes->methods());
    }

    public function test_guest_layout_and_login_page_renders(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Masuk ke EduParent');
    }

    public function test_dashboard_redirects_for_authenticated_users(): void
    {
        $user = User::factory()->guru()->create();

        $response = $this->actingAs($user)->get('/');

        $response->assertRedirect('/dashboard');
    }

    public function test_all_core_template_assets_exist_in_public(): void
    {
        $assets = [
            'assets/css/bootstrap.min.css',
            'assets/css/style.css',
            'assets/css/custom-theme.css',
            'assets/js/theme-script.js',
            'assets/js/jquery-3.7.1.min.js',
            'assets/js/bootstrap.bundle.min.js',
            'assets/js/script.js',
            'assets/img/logo.svg',
            'assets/img/logo-small.svg',
            'assets/img/logo-white.svg',
            'assets/plugins/tabler-icons/tabler-icons.min.css',
            'assets/plugins/fontawesome/css/all.min.css',
            'assets/plugins/simplebar/simplebar.min.css',
            'assets/plugins/simplebar/simplebar.min.js',
        ];

        foreach ($assets as $asset) {
            $this->assertTrue(
                File::exists(public_path($asset)),
                "Asset does not exist in public directory: {$asset}"
            );
        }
    }
}
