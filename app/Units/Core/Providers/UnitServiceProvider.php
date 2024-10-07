<?php

namespace App\Units\Core\Providers;

use App\Support\Units\ServiceProvider;
use App\Units\Core\View\Components\AppLayout;
use App\Units\Core\View\Components\GuestLayout;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'core';

    protected $hasViews = true;

    protected $hasTranslations = true;

    protected $hasComponents = true;

    protected $providers = [
        AppServiceProvider::class,
    ];

    protected $components = [
        AppLayout::class,
        GuestLayout::class,
    ];
}
