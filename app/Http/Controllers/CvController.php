<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CvController extends Controller
{
    public function show($id): StreamedResponse
    {
        $authUser = Auth::user();

        if ((int) $authUser->id !== (int) $id && strtoupper($authUser->role) !== 'ADMIN') {
            abort(403, 'Akses ditolak.');
        }

        $path = 'cv/' . $id . '.pdf';

        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'CV tidak ditemukan.');
        }

        return Storage::disk('local')->response($path, $id . '.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
