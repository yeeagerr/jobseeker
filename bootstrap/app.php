<?php

use App\Http\Middleware\UserAndCompany;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'UserCompany' => App\Http\Middleware\UserAndCompany::class,
            'isVerified' => App\Http\Middleware\UserCompanyVerified::class,
            'guest-only' => App\Http\Middleware\GuestOnly::class,
            'no-cache' => App\Http\Middleware\NoCache::class,
            'UserOnly' => App\Http\Middleware\UserOnly::class,
            'CompanyOnly' => App\Http\Middleware\CompanyOnly::class,
            'IsYourJob' => App\Http\Middleware\IsYourJob::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
