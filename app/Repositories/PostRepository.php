<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\ModelNotFoundException;
use App\Interfaces\Repositories\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

final class PostRepository implements PostRepositoryInterface
{
    public function getById(string $id): Post
    {
        $post = Post::query()
            ->whereKey($id)
            ->first();

        if (!$post) {
            throw new ModelNotFoundException('Not found');
        }

        return $post;
    }

    public function getAll(): Collection
    {
        return Post::query()
            ->get();
    }

    public function create(string $title): Post
    {
        return Post::query()
            ->create(['title' => $title]);
    }

    public function update(array $values): mixed
    {
        $post = Post::query()->whereKey($values['id'])->firstOrFail();

        return $post->update(['title' => $values['title']]);
    }

    public function delete(string $id): mixed
    {
        $post = Post::query()->whereKey($id)->firstOrFail();

        return $post->delete();
    }
}
