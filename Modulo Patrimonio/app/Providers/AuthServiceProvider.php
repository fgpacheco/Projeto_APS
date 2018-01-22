<?php

namespace web\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'web\Model' => 'web\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();
        $this->registerGlobalPolicies();
        //
    }

    public function registerGlobalPolicies() {
        Gate::define('criar-global', function ($user) {
            return $user->hasAccess(['criar-global']);
        });
        Gate::define('editar-global', function ($user) {
            return $user->hasAccess(['editar-global']);
        });
        Gate::define('remover-global', function ($user) {
            return $user->hasAccess(['remover-global']);
        });
        Gate::define('visualizar-global', function ($user) {
            return $user->hasAccess(['visualizar-global']);
        });
        Gate::define('acessoRestrito-global', function ($user) {
            return $user->hasAccess(['acessoRestrito-global']);
        });
        Gate::define('see-all-drafts', function ($user) {
            return $user->inRole('editor');
        });
    }

}
