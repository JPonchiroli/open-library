<?php

namespace App\Repositories;

use App\DTOs\DTO;
use App\Exceptions\ApiException;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class BaseRepository {

    public function __construct(
        protected Model $model
    ) {}

    public function get(string $id): ?Model 
    {
        $entity = $this->model->find($id);
        
        if (!$entity) 
            throw new ApiException(Response::HTTP_NOT_FOUND, 'Register not found');

        return $entity;
        
    }

    public function getAll() {
        return $this->model->get();
    }

    public function delete(string $id)
    {

        $entity = $this->get($id);

        if (!$entity) 
            throw new ApiException(Response::HTTP_NOT_FOUND, 'Register not found');
            
        return $entity->delete();

    }

    public function create(DTO $dto): Model 
    {
        return $this->model->create($dto->toArray());
    }

    public function update(string $id, DTO $dto): ?Model 
    {

        $entity = $this->get($id);

        if (isset($entity)) {

            $entity->fill($dto->toArray());
            $entity->save();
            
            return $entity;

        }

        return null;

    }

}