<?php

namespace App\Services;

use App\DTOs\DTO;
use App\Models\Book;
use App\Services\BaseService;
use App\Exceptions\ApiException;
use App\DTOs\Loan\LoanCreateDto;
use App\Repositories\LoanRepository;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class LoanService extends BaseService {

    public function __construct(LoanRepository $repository)
    {
        return parent::__construct($repository);
    }

    public function store(DTO $dto): ?Model
    {

        if (!$dto instanceof LoanCreateDto) 
            throw new ApiException(Response::HTTP_BAD_REQUEST, 'Invalid DTO');

        $isAvailable = Book::where('id', $dto->book_id)
                            ->where('available_copies', '>=', 1)
                            ->exists();

        if (!$isAvailable)
            throw new ApiException(Response::HTTP_BAD_REQUEST, 'The book is not available');

        Book::where('book_id', $dto->book_id)
            ->decrement('available_copies');

        return $this->repository->create($dto);
    }

}