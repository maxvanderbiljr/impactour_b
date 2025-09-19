<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Community;
use App\Models\Experience;
use App\Models\Hero;
use App\Models\Impact;
use App\Models\Navigation;
use App\Models\HowItWorks;
use App\Policies\UserPolicy;
use App\Policies\CommunityPolicy;
use App\Policies\ExperiencePolicy;
use App\Policies\HeroPolicy;
use App\Policies\ImpactPolicy;
use App\Policies\NavigationPolicy;
use App\Policies\HowItWorksPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * O array de policies do aplicativo.
     */
    // protected $policies = [
    //     User::class => UserPolicy::class,
    //     Community::class => CommunityPolicy::class,
    //     Experience::class => ExperiencePolicy::class,
    //     Hero::class => HeroPolicy::class,
    //     Impact::class => ImpactPolicy::class,
    //     Navigation::class => NavigationPolicy::class,
    //     HowItWorks::class => HowItWorksPolicy::class,
    //     // Adicione outras policies aqui conforme seus models/resources
    // ];

    /**
     * Registra quaisquer serviços de autenticação/autorização.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}