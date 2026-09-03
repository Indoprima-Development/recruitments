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
            \App\Services\TelegramAlertService::sendException($e);
        });
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            $status = $exception->getStatusCode();
        }

        // Handle decryption payload invalid exceptions globally
        if ($exception instanceof \Illuminate\Contracts\Encryption\DecryptException) {
            return redirect('/home')->with('error', 'Sesi atau link tidak valid atau sudah kadaluarsa. Silakan coba lagi.');
        }

        // Handle uploaded files exceeding the server's allowed size globally
        if ($exception instanceof \Symfony\Component\HttpFoundation\File\Exception\FileException
            || $exception instanceof \Illuminate\Http\Exceptions\PostTooLargeException) {
            \RealRashid\SweetAlert\Facades\Alert::error('Gagal!', 'Ukuran file yang diupload terlalu besar. Maksimal 1 MB.');
            return redirect()->back()->withInput($request->except(['password', 'password_confirmation']));
        }

        return parent::render($request, $exception);
    }
}
