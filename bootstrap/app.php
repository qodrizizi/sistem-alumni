<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request; // <-- TAMBAHKAN INI

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // 👇👇👇 TAMBAHKAN LOGIKA UNTUK MENGATASI AUTHENTICATION EXCEPTION
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            
            // Jika request ditujukan untuk API (atau jika client meminta JSON)
            if ($request->is('api/*') || $request->expectsJson()) {
                
                // Kembalikan response JSON 401 Unauthorized
                return response()->json([
                    'message' => 'Unauthenticated.' 
                ], 401);
            }
        });
        // 👆👆👆 LOGIKA END
    })->create();