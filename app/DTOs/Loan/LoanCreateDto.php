<?php

namespace App\DTOs\Loan;

use App\DTOs\DTO;

class LoanCreateDto extends DTO {

    public function __construct(
        public int $user_id,
        public int $book_id,
        public ?string $loan_date,
        public ?string $return_date,
    ) {}

    public static function fromRequest(array $request): self
    {

        return new self(
            $request['user_id'],
            $request['book_id'],
            $request['loan_date'],
            $request['return_date'] ?? null
        );

    }

}