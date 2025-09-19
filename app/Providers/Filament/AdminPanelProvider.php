<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\AccountCustomWidget;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->authGuard('web')
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                    AccountCustomWidget::class,
                    FilamentInfoWidget::class,     
                ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->navigationGroups([
                NavigationGroup::make('Conteúdo')
                    ->items($this->getNavigationItems()),
            ]);
    }

    /**
     * Retorna o menu lateral dinâmico baseado nas permissões do usuário
     */
    protected function getNavigationItems(): array
    {
        $items = [];

        $user = auth()->user();

        if (!$user) {
            return $items;
        }

        if ($user->can('view impactos')) {
            $items[] = NavigationItem::make('Impactos')
                ->url(route('filament.resources.impacts.index'))
                ->icon('heroicon-o-rectangle-stack');
        }

        if ($user->can('view comunidades')) {
            $items[] = NavigationItem::make('Comunidades')
                ->url(route('filament.resources.comunidades.index'))
                ->icon('heroicon-o-users');
        }

        if ($user->can('view experiencias')) {
            $items[] = NavigationItem::make('Experiências')
                ->url(route('filament.resources.experiencias.index'))
                ->icon('heroicon-o-briefcase');
        }

        // Aqui você pode adicionar outros resources conforme necessário

        return $items;
    }
}