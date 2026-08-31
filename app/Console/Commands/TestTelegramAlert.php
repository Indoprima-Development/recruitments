<?php

namespace App\Console\Commands;

use App\Services\TelegramAlertService;
use Exception;
use Illuminate\Console\Command;

class TestTelegramAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:test-alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test exception alert to Telegram';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Mengirim test exception alert ke Telegram...');

        try {
            throw new Exception('Ini adalah pesan uji coba alert Telegram dari Career Apps.');
        } catch (Exception $e) {
            TelegramAlertService::sendException($e);
        }

        $this->info('Selesai! Silakan cek Telegram bot/channel Anda.');

        return Command::SUCCESS;
    }
}
