<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class TelegramAlertService
{
    /**
     * Send error / exception alert to Telegram.
     */
    public static function sendException(Throwable $exception): void
    {
        $botToken = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        if (empty($botToken) || empty($chatId)) {
            return;
        }

        try {
            $env = app()->environment();
            $time = now()->setTimezone(config('app.timezone', 'Asia/Jakarta'))->format('Y-m-d H:i:s');
            $type = get_class($exception);
            $message = $exception->getMessage();
            $file = $exception->getFile();
            $line = $exception->getLine();

            if (app()->runningInConsole()) {
                $url = 'Artisan CLI (' . implode(' ', $_SERVER['argv'] ?? ['artisan']) . ')';
            } else {
                $url = request()->fullUrl();
            }

            $text = "🔴 Career Apps Alert [{$env}]\n"
                . "Waktu: {$time}\n"
                . "Tipe: {$type}\n"
                . "Pesan: {$message}\n"
                . "Lokasi: {$file}:{$line}\n"
                . "URL: {$url}";

            // Keep message within Telegram character limit (4096 chars)
            if (mb_strlen($text) > 4000) {
                $text = mb_substr($text, 0, 3990) . "\n...";
            }

            Http::timeout(5)->post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $text,
                'disable_web_page_preview' => true,
            ]);
        } catch (Throwable $e) {
            // Prevent recursive error loops; fallback to standard log
            Log::channel('single')->error('Failed to send Telegram alert: ' . $e->getMessage());
        }
    }
}
