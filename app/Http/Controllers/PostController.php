<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\Repositories\PostRepositoryInterface;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Response;

final readonly class PostController extends Controller
{
    public function __construct(private PostRepositoryInterface $postRepository) {}

    public function index(): Response
    {
        $posts = $this->postRepository->getAll();

        return response()->view('Post/index', compact('posts'));
    }

    public function show(string $id): Response
    {
        $post = $this->postRepository->getByID($id);

        return response()->view('Post/show', compact('post'));
    }

    public function store(PostRequest $request): Response
    {
        $validated = $request->validated();

        $post = $this->postRepository->create($request->title);

        return response()->view('Post/show', compact('post'));
    }

    public function update(PostRequest $request): Response
    {
        $validated = $request->validated();

        $this->postRepository->update($request->all());

        $post = $this->postRepository->getByID($request->id);

        return response()->view('Post/show', compact('post'));
    }

    public function destroy(PostRequest $request): Response
    {
        $validated = $request->validated();

        $this->postRepository->delete($request->id);

        $result = ['delete' => true];

        return response()->view('Post/show', compact('result'));
    }
}
