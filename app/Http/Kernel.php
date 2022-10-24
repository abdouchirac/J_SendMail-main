<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.admin' => \App\Http\Middleware\adminmiddleware::class,
        'auth.employe' => \App\Http\Middleware\employemiddleware::class,
        'auth.modifier les courriers' => \App\Http\Middleware\courriereditmiddleware::class,
        'auth.ajouter les courriers' => \App\Http\Middleware\courrierlistmiddleware::class,
        'auth.voir les courriers' => \App\Http\Middleware\courriereshowmiddleware::class,
        'auth.valider la réception des courriers' => \App\Http\Middleware\courrierusermiddleware::class,
        'auth.déstocker les courriers' => \App\Http\Middleware\destockermiddleware::class,
        'auth.modifier les émetteurs' => \App\Http\Middleware\emeteureditmiddleware::class,
        'auth.ajouter les émetteurs' => \App\Http\Middleware\emeteurlistmiddleware::class,
        'auth.modifier les emplacements' => \App\Http\Middleware\emplacementeditmiddleware::class,
        'auth.consulter la liste des courriers' => \App\Http\Middleware\courrierindexmiddleware::class,
        'auth.consulter la liste des emplacements' => \App\Http\Middleware\emplacementindexmiddleware::class,
        'auth.consulter la liste des émetteurs' => \App\Http\Middleware\emeteurindexmiddleware::class,
        'auth.ajouter les utilisateurs' => \App\Http\Middleware\usercreatemiddleware::class,
        'auth.afficher les utilisateurs' => \App\Http\Middleware\usershowmiddleware::class,
        'auth.ajouter les emplacements' => \App\Http\Middleware\emplacementlistmiddleware::class,
        'auth.consulter la liste des utilisateurs' => \App\Http\Middleware\userindexmiddleware::class,
        'auth.modifier le profil des utilisateurs' => \App\Http\Middleware\usereditmiddleware::class,
        'auth.afficher les utilisateurs' => \App\Http\Middleware\usershowmiddleware::class,
        'auth.voir les emplacements' => \App\Http\Middleware\emplacementshowmiddleware::class,
        'auth.modifier un poste' => \App\Http\Middleware\posteeditmiddleware::class,
        'auth.consulter la liste des postes' => \App\Http\Middleware\posteeditmiddleware::class,
        'auth.ajouter les postes' => \App\Http\Middleware\posteaddmiddleware::class,
        'auth.modifier les paramètres' => \App\Http\Middleware\parametremiddleware::class,
        'auth.voir son profil' => \App\Http\Middleware\profilemiddleware::class,
        'auth.ajouter les postes' => \App\Http\Middleware\posteaddmiddleware::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

    ];
}
