<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use app\Http\Middleware\CheckUserProfile;
class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // ... existing middleware ...
        'role' => \App\Http\Middleware\CheckRole::class,
        'permission' => \App\Http\Middleware\CheckPermission::class,
        'check.profile' => \App\Http\Middleware\CheckUserProfile::class,
    ];
} 