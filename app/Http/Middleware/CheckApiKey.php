<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // this's consider custom header.
        $key = $request->header('x-api-key');

        if (!$key == config('app.api_key')) {
            return response()->json([
                'message' => 'Invalid Api Key',
            ], 400);
        }

        // here make update on ip address
        // ths way best from use $request->user()
        $user = Auth::guard('sanctum')->user();

        if ($user) {
            $user->currentAccessToken()->forceFill([
                'ip_address' => $request->ip(),
            ])->save();
        }

        return $next($request);
    }
}
