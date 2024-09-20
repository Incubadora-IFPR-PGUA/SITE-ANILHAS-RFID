<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\AnilhaCadastro;
use App\Models\AnilhaPendente;
use App\Models\AnilhaRegistro;
use App\Policies\CadastroAnilhaPolicy;
use App\Policies\PendenteAnilhaPolicy;
use App\Policies\RegistroAnilhaPolicy;

class AuthServiceProvider extends ServiceProvider {
    protected $policies = [
        AnilhaCadastro::class => CadastroAnilhaPolicy::class,
        AnilhaPendente::class => PendenteAnilhaPolicy::class,
        AnilhaRegistro::class => RegistroAnilhaPolicy::class,
    ];

    public function boot(): void {
        $this->registerPolicies();
    }
}