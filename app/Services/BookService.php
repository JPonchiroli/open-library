<?php

use App\Repositories\BaseRepository;
use App\Services\BaseService;

class BookService extends BaseService {

    #[Override]
    public function __construct(BaseRepository $repository)
    {
        return parent::__construct($repository);
    }

}