<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::before(function (User $user) {
        //     return $user->hasroles('admin');
        // });

        Gate::define('ajouter les émetteurs', function (User $user) {
            return $user->haspermission('ajouter les émetteurs');
        });
        Gate::define('ajouter les courriers', function (User $user) {
            return $user->haspermission('ajouter les courriers');
        });

        Gate::define('modifier les courriers', function (User $user) {
            return $user->haspermission('modifier les courriers');
        });

        Gate::define('supprimer les courriers', function (User $user) {
            return $user->haspermission('supprimer les courriers');
        });


        Gate::define('déstocker les courriers', function (User $user) {
            return $user->haspermission('déstocker les courriers');
        });

        Gate::define('voir les courriers', function (User $user) {
            return $user->haspermission('voir les courriers');
        });
        Gate::define('consulter la liste des courriers', function (User $user) {
            return $user->haspermission('consulter la liste des courriers');
        });

        Gate::define('consulter la liste des emplacements', function (User $user) {
            return $user->haspermission('consulter la liste des emplacements');
        });
        Gate::define('ajouter les emplacements', function (User $user) {
            return $user->haspermission('ajouter les emplacements');
        }); Gate::define('modifier les emplacements', function (User $user) {
            return $user->haspermission('modifier les emplacements');
        });
        Gate::define('modifier les émetteurs', function (User $user) {
            return $user->haspermission('modifier les émetteurs');
        });
        Gate::define('valider la réception des courriers', function (User $user) {
            return $user->haspermission('valider la réception des courriers');
        });
        Gate::define('consulter la liste des émetteurs', function (User $user) {
            return $user->haspermission('consulter la liste des émetteurs');
        });
        Gate::define('ajouter les utilisateurs', function (User $user) {
            return $user->haspermission('ajouter les utilisateurs');
        });
        Gate::define('afficher les utilisateurs', function (User $user) {
            return $user->haspermission('afficher les utilisateurs');
        });
        Gate::define('consulter la liste des utilisateurs', function (User $user) {
            return $user->haspermission('consulter la liste des utilisateurs');
        });
        Gate::define('modifier le profil des utilisateurs', function (User $user) {
            return $user->haspermission('modifier le profil des utilisateurs');
        });
        Gate::define('voir les emplacements', function (User $user) {
            return $user->haspermission('voir les emplacements');
        });
        Gate::define('consulter la liste des postes', function (User $user) {
            return $user->haspermission('consulter la liste des postes');
        });
        Gate::define('modifier un poste', function (User $user) {
            return $user->haspermission('modifier un poste');
        });
        Gate::define('voir son profil', function (User $user) {
            return $user->haspermission('voir son profil');
        });
        Gate::define('ajouter les postes', function (User $user) {
            return $user->haspermission('ajouter les postes');
        });
        Gate::define('modifier les paramètres', function (User $user) {
            return $user->haspermission('modifier les paramètres');
        });
        Gate::after(function (User $user) {
            return $user->hasroles('admin');
        });

    }


}
