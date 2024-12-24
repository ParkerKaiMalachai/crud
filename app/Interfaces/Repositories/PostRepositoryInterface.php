<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

interface PostRepositoryInterface
{
    public function getByID(string $id);

    public function getAll();

    public function create(string $title);

    public function update(array $values);

    public function delete(string $id);
}
