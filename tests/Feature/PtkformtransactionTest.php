<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Ptkformtransaction;
use App\Models\Ptkform;

class PtkformtransactionTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_submit_lamaran_with_null_scores_handled()
    {
        $user = User::factory()->create(['role' => 'USER']);

        $ptkform = new Ptkform();
        $ptkform->title = 'Lowongan Developer';
        $ptkform->status = 'Aktif';
        $ptkform->created_by = $user->id;
        $ptkform->save();

        $this->actingAs($user);
        $this->withoutMiddleware();

        // Simulasi submit lamaran dimana questions null atau score null
        $response = $this->post(route('ptkformtransactions.store'), [
            'ptkform_id' => $ptkform->id,
            'experience_years' => 2,
            'experience_months' => 5,
            'questions' => json_encode(['questions' => 'test tapi tanpa score array']), // Ini akan menguji safety check
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('ptkformtransactions', [
            'user_id' => $user->id,
            'ptkform_id' => $ptkform->id,
            'score_candidate' => 0 // Harus fallback ke 0 dengan aman tanpa Exception
        ]);
    }

    public function test_admin_can_delete_lamaran()
    {
        $admin = User::factory()->create(['role' => 'ADMIN']);
        $user = User::factory()->create(['role' => 'USER']);

        $ptkform = new Ptkform();
        $ptkform->title = 'Lowongan';
        $ptkform->status = 'Aktif';
        $ptkform->created_by = $user->id;
        $ptkform->save();

        $lamaran = Ptkformtransaction::create([
            'ptkform_id' => $ptkform->id,
            'user_id' => $user->id,
            'status' => 0,
            'score_candidate' => 50,
            'experience_years' => 1
        ]);

        $this->actingAs($admin);
        $this->withoutMiddleware();

        // Uji penghapusan via route admin deleteLamaran
        $response = $this->delete(route('ptkformtransactions.deleteLamaran', ['id' => $lamaran->id]));

        $response->assertRedirect();
        $this->assertDatabaseMissing('ptkformtransactions', [
            'id' => $lamaran->id
        ]);
    }
}
