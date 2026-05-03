<?php

namespace App\DTOs\Book;

use App\DTOs\DTO;

class BookUpdateDto extends DTO {

    public function __construct(
        public string $title,
        public string $author
    ) {}

    public static function fromRequest(array $request): self
    {
        
        return new self(
            $request['title'],
            $request['author']
        );

    }

}