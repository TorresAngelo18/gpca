<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        // api: __DIR__ . '/../routes/api.php'

        api: [
            'prefix' => 'api',                     // <-- ensures all API routes are under /api
            'path'   => __DIR__ . '/../routes/api.php',
            'namespace' => 'App\Http\Controllers\Api', // optional: sets default namespace for API
        ],
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
