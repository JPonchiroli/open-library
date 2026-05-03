<?php

namespace App\Services;

use App\DTOs\DTO;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseService extends BaseRepository {

    public function __construct(
        protected BaseRepository $repository
    ) {}

    public function getById(string $id): ?Model
    {
        return $this->repository->get($id);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function delete(string $id): bool
    {
        return $this->repository->delete($id);
    }

    public function store(DTO $dto): ?Model
    {
        return $this->repository->create($dto);
    }

    public function update(string $id, DTO $dto): ?Model
    {
        return $this->repository->update($id, $dto);
    }

}