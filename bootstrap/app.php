<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Alias middleware
        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'role' => \App\Http\Middleware\CheckRole::class,
        ]);
        
        // Global middleware (jika perlu)
        // $middleware->append([
        //     // middleware global
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();