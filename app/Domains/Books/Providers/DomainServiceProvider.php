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
        Contracts\BookRepository::class => Repositories\BookRepository::class,
        Contracts\AuthorRepository::class => Repositories\AuthorRepository::class,
        Contracts\SubjectRepository::class => Repositories\SubjectRepository::class,
        Contracts\AuthorSummaryRepository::class => Repositories\AuthorSummaryRepository::class, // Database view
    ];

    /**
     * @var array Providers registered within the domain
     */
    protected $subProviders = [
        //EventServiceProvider::class,
    ];
}
