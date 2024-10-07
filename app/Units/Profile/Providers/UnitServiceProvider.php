<?php

namespace App\Units\Profile\Providers;

use App\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'profile';

    protected $hasTranslations = true;

    protected $hasViews = true;

    protected $providers = [
        RouteServiceProvider::class,
    ];
}
