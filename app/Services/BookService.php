<?php

namespace App\Services; 

use App\Services\BaseService;
use App\Repositories\BookRepository;

class BookService extends BaseService {

    public function __construct(BookRepository $repository)
    {
        return parent::__construct($repository);
    }

}