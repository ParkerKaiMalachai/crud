<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\Repositories\PostRepositoryInterface;
use App\Models\Post;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{
    public function getByID(string $id): Post
    {
        $post = Post::find($id);

        if (!$post) {
            throw new Exception('Not found');
        }

        return $post;
    }

    public function getAll(): Collection
    {
        return Post::all();
    }

    public function create(string $title): Post
    {
        $post = Post::create(['title' => $title]);

        if (!$post) {
            throw new Exception('Not created');
        }

        return $post;
    }

    public function update(array $values): mixed
    {
        $post = Post::find($values['id']);

        if (!$post) {
            throw new Exception('Not found');
        }

        return $post->update(['title' => $values['title']]);
    }

    public function delete(string $id): mixed
    {
        $post = Post::find($id);

        if (!$post) {
            throw new Exception('Not found');
        }

        return $post->delete();
    }
}
