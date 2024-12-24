<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\Repositories\PostRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function __construct(private PostRepositoryInterface $repository) {}
    public function posts(): Response
    {
        $posts = $this->repository->getAll();

        return response()->view('posts', compact('posts'));
    }

    public function getItem(string $id): Response
    {
        $post = $this->repository->getByID($id);

        return response()->view('post', compact('post'));
    }
    public function create(Request $request): Response
    {
        $post = $this->repository->create($request->all()['title']);

        return response()->view('post', compact('post'));
    }

    public function update(Request $request): Response
    {
        if (!$this->repository->update($request->all())) {

            throw new Exception('post was not updated');
        }

        $post = $this->repository->getByID($request->all()['id']);

        return response()->view('post', compact('post'));
    }

    public function delete(Request $request): Response
    {
        if (!$this->repository->delete($request->all()['id'])) {

            $result = ['delete' => false];

            return response()->view('post',  compact('result'));
        }

        $result = ['delete' => true];

        return response()->view('post', compact('result'));
    }
}
