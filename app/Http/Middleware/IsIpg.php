<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Constants\Constants;

class IsIpg
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = Constants::ApiPegawaiBaseUrl."/api/validate-token";
        $dataPegawai = GetAPI($url,GetHeaderAPIFromAuthorization($request));
        if (array_key_exists("success",$dataPegawai) && $dataPegawai["success"]) {
            return $next($request);
        }

        return response()->json([
            "success" => false,
            "message" => 'Unautorized. Please sign in first'
        ],401);
    }
}
