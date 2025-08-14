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
        if ($this->isHttpException($exception)) {
            $status = $exception->getStatusCode();

            // Daftar status code yang akan dipantau
            $monitorCodes = [400, 402, 403, 404, 405, 406, 407, 408, 409, 410, 412, 414, 415, 422, 429, 431];

            if (in_array($status, $monitorCodes)) {
                $ip = $request->ip();

                // Hitung jumlah percobaan akses error tertentu per IP
                $count = Cache::increment("error_count_{$status}_{$ip}");

                // Set kadaluarsa counter (1 jam)
                Cache::put("error_count_{$status}_{$ip}", $count, now()->addHour());

                // Random limit antara 6–10
                $limit = rand(6, 10);

                if ($count >= $limit) {
                    DB::table('blocked_ips')->updateOrInsert(
                        ['ip_address' => $ip],
                        ['created_at' => now(), 'updated_at' => now()]
                    );

                    // Langsung blokir request
                    abort(403, 'Access denied. Your IP has been blocked.');
                }
            }
        }

        return parent::render($request, $exception);
    }
}
