<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlockIpMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $blockedIps = DB::table('blocked_ips')->pluck('ip_address')->toArray();

        if (in_array($request->ip(), $blockedIps)) {
            abort(403, 'Access denied. Your IP has been blocked.');
        }

        return $next($request);
    }
}
