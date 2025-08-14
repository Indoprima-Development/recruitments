<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // Deteksi jika error adalah 404 Not Found
        if ($this->isHttpException($exception) && $exception->getStatusCode() === 404) {
            $ip = $request->ip();

            // Hitung jumlah percobaan akses halaman 404
            $count = Cache::increment("404_count_{$ip}");

            // Set kadaluarsa counter ini (misalnya 1 jam)
            Cache::put("404_count_{$ip}", $count, now()->addHour());

            // Jika lebih dari atau sama dengan 10 kali, blokir otomatis
            if ($count >= 10) {
                DB::table('blocked_ips')->updateOrInsert(
                    ['ip_address' => $ip],
                    ['created_at' => now(), 'updated_at' => now()]
                );

                // Bisa langsung hentikan request
                abort(403, 'Access denied. Your IP has been blocked.');
            }
        }

        return parent::render($request, $exception);
    }
}
