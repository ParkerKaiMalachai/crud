<?php

declare(strict_types=1);

namespace App\Providers;

use App\Interfaces\Repositories\PostRepositoryInterface;
use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        PostRepositoryInterface::class => PostRepository::class,
    ];

    public function register(): void {}

    public function boot(): void {}
}
