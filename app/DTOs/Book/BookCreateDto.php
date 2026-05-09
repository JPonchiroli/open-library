<?php

namespace App\DTOs\Book;

use App\DTOs\DTO;

class BookCreateDto extends DTO {

    public function __construct(
        public string $title,
        public string $author,
        public string $isbn,
        public int $available_copies,
        public string $book_cover_url
    ) {}

    public static function fromRequest(array $request): self
    {
        
        return new self(
            $request['title'],
            $request['author'],
            $request['isbn'],
            $request['available_copies'],
            $request['book_cover_url']
        );

    }

}