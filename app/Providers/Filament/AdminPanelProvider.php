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
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Pages\Auth\Login;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->login()
            ->brandName('Admin Portal')
            ->brandLogo(asset('img/logo_warna.webp'))
            ->brandLogoHeight('5rem')
            ->favicon(asset('img/author.webp'))
            ->darkMode() 
            ->colors([
                'primary' => Color::hex('#1E293B'),
            ])
            ->renderHook(
    'panels::auth.login.form.before',
    fn () => new \Illuminate\Support\HtmlString('
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap");
            @import url("https://fonts.googleapis.com/css2?family=Antek+Latin:wght@400;600;700&display=swap");
            .fi-simple-layout .fi-simple-header h1,
            .fi-simple-layout .fi-simple-header-title,
            .fi-simple-layout [data-slot="heading"],
            .fi-simple-layout [data-slot="title"] {
                display: none !important;
            }
        </style>

        <div style="margin-bottom: 1rem; text-align: center;">
            <h1 style="
                font-family: \'Playfair Display\', serif;
                font-size: 1.75rem;
                font-weight: 700;
                color: #F8FAFC;
                margin-bottom: .25rem;
            ">
                Portal Media
            </h1>

            <p style="
                font-family: \'Antek Latin\', sans-serif;
                color: #94A3B8;
                font-size: .95rem;
            ">
                Silakan login untuk mengelola konten.
            </p>
        </div>
    ')
)


            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
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
            ->viteTheme('resources/css/filament/admin/theme.css');
    }
}