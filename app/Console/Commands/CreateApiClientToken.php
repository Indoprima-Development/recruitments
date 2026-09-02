<?php

namespace App\Console\Commands;

use App\Models\ApiClient;
use Illuminate\Console\Command;

class CreateApiClientToken extends Command
{
    protected $signature = 'api-client:create-token {name : Nama aplikasi eksternal, mis. "Sistem Kepegawaian"}';

    protected $description = 'Membuat client API baru beserta token aksesnya (mis. untuk membuka file CV dari aplikasi lain)';

    public function handle(): int
    {
        $name = $this->argument('name');

        $client = ApiClient::create([
            'name' => $name,
            'is_active' => true,
        ]);

        $token = $client->createToken($name, ['cv:read'])->plainTextToken;

        $this->info("Client '{$name}' berhasil dibuat (ID: {$client->id}).");
        $this->line('Token (simpan baik-baik, tidak akan ditampilkan lagi):');
        $this->line($token);

        return self::SUCCESS;
    }
}
