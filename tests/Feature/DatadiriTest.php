<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Datadiri;

class DatadiriTest extends TestCase
{
    use RefreshDatabase;

    public function test_ekspektasi_gaji_cleans_currency_format_before_save()
    {
        $user = User::factory()->create(['role' => 'USER']);

        Datadiri::create([
            'user_id' => $user->id,
            'name' => 'John Doe',
            'gender' => 'Laki-laki',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-01',
            'agama' => 'Islam',
            'alamat' => 'Alamat test',
            'no_hp' => '08123',
            'no_wa' => '08123',
            'status_rumah' => 'Sendiri',
            'golongan_darah' => 'O',
            'tinggi_badan' => 170,
            'berat_badan' => 70,
            'ktp' => '1234'
        ]);

        $this->actingAs($user);
        $this->withoutMiddleware();

        // Simulasi submit Datadiri form dengan mata uang / format angka
        $response = $this->post('/datadiris/pernyataan/' . $user->id, [
            'ekspektasi_gaji' => '5.000.000', // This is what caused the SQL Server cast exception
            'fasilitas_harapan' => 'Asuransi',
            'kesediaan_penempatan' => 1,
            'kesediaan_mulai_bekerja' => '2026-03-02',
            'keterangan_jabatan_terakhir' => '-'
        ]);

        if (session('errors')) {
            file_put_contents('err.txt', json_encode(session('errors')->all()));
        }

        $response->assertRedirect('forms?section=pernyataan');

        // Verify database value saved without dots
        $this->assertDatabaseHas('datadiris', [
            'user_id' => $user->id,
            'ekspektasi_gaji' => 5000000
        ]);

        // Coba edit dengan value lain (karena logic create & update menyatu di fungsi ini)
        $responseEdit = $this->post('/datadiris/pernyataan/' . $user->id, [
            'ekspektasi_gaji' => '8,500,000.00', // Uji case beda format
            'fasilitas_harapan' => 'Asuransi',
            'kesediaan_penempatan' => 1,
            'kesediaan_mulai_bekerja' => '2026-03-02',
            'keterangan_jabatan_terakhir' => '-'
        ]);

        $responseEdit->assertRedirect('forms?section=pernyataan');

        $this->assertDatabaseHas('datadiris', [
            'user_id' => $user->id,
            'ekspektasi_gaji' => 850000000 // karena , dan . dibuang
        ]);
    }
}
