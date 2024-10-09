<?php

namespace App\Units\Books\Providers;

use App\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'books';

    protected $hasTranslations = true;

    protected $hasViews = true;

    protected $providers = [
        RouteServiceProvider::class,
    ];
}
