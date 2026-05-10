<?php

namespace App\DTOs\Loan;

use App\DTOs\DTO;

class LoanUpdateDto extends DTO {

    public function __construct(
        public ?string $loan_date,
        public ?string $return_date,
    ) {}

    public static function fromRequest(array $request): self
    {
        
        return new self(
            $request['loan_date'],
            $request['return_date'] || null
        );

    }

}