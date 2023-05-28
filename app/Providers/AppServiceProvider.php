<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\People\Domain\Repository\PeopleRepository;
use Src\People\Infrastructure\Persistence\Repository\PeopleJsonRepository;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        PeopleRepository::class => PeopleJsonRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
