<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthAndImpersonateTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_impersonate_user()
    {
        $admin = User::factory()->create([
            'role' => 'ADMIN',
        ]);

        $user = User::factory()->create([
            'role' => 'USER',
        ]);

        // Login as admin
        $this->actingAs($admin);

        // Impersonate the user
        $response = $this->get('/impersonate/' . $user->id);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
        $this->assertEquals($admin->id, session('impersonator_id'));
    }

    public function test_non_admin_cannot_impersonate()
    {
        $user1 = User::factory()->create(['role' => 'USER']);
        $user2 = User::factory()->create(['role' => 'USER']);

        $this->actingAs($user1);

        $response = $this->get('/impersonate/' . $user2->id);

        // Should return 403 Forbidden
        $response->assertStatus(403);
    }

    public function test_admin_can_stop_impersonating()
    {
        $admin = User::factory()->create(['role' => 'ADMIN']);
        $user = User::factory()->create(['role' => 'USER']);

        // First login as admin and start impersonating
        $this->actingAs($admin);
        $this->get('/impersonate/' . $user->id);

        // Now stop impersonating
        $response = $this->get('/stop-impersonate');

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($admin);
        $this->assertNull(session('impersonator_id'));
    }
}
