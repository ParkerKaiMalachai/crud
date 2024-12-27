<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

final class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::factory()
            ->count(10)
            ->create();
    }
}
