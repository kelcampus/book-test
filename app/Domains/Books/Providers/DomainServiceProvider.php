<?php

namespace App\Domains\Books\Providers;

use App\Support\Domain\ServiceProvider;
use App\Domains\Books\Contracts;
use App\Domains\Books\Repositories;

/**
 * Class DomainServiceProvider.
 *
 * Register Books Domain Resources and Services
 */
class DomainServiceProvider extends ServiceProvider
{
    /**
     * @var string Domain "alias"
     */
    protected $alias = 'Books';

    /**
     * @var bool Enable translations
     */
    protected $hasTranslations = true;

    /**
     * @var array Bind contracts to implementations
     */
    public $bindings = [
        Contracts\LivroRepository::class => Repositories\LivroRepository::class,
        Contracts\AutorRepository::class => Repositories\AutorRepository::class,
        Contracts\AssuntoRepository::class => Repositories\AssuntoRepository::class
    ];

    /**
     * @var array Providers registered within the domain
     */
    protected $subProviders = [
        //EventServiceProvider::class,
    ];
}
