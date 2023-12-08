<?php

namespace App\Http\Middleware;

use App\Models\UserRequestLog;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws Exception
     */
    public function handle(Request $request, Closure $next): Response
    {

        try {
            $response = $next($request);

        } catch (Exception $e) {
            $error = $e;

        }

        $request->has('password') ? $request['password'] = '*' : '';
        $exec = microtime(true) - LARAVEL_START;
        UserRequestLog::create([
            'token' => $request->bearerToken(),
            'ip' => $request->ip(),
            'url' => $request->url(),
            'method' => $request->method(),
            'request' => $request->all(),
            'response' => $error ?? $response->getContent(),
            'request_time' => now(),
            'execution_time' => $exec
        ]);
        if (isset($error)) {
            throw $error;
        }
        return $response;

    }
}
