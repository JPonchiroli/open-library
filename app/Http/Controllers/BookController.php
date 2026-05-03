<?php

namespace App\Http\Controllers;

use BookService;
use App\DTOs\Book\BookCreateDto;
use App\DTOs\Book\BookUpdateDto;
use App\Http\Resources\BaseResource;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;

class BookController extends Controller
{
        public function __construct(
        public BookService $bookService
    ) {}

    
    public function show(int $id){
        
        $book = $this->bookService->getById($id);

        return new BaseResource($book);
        
    }

     public function index(){

        $users = $this->bookService->getAll();

        return BaseResource::collection($users);
    }

    public function delete(int $id){

        $this->bookService->delete($id);

        return response()->noContent();

    }

    public function store(BookStoreRequest $request){

        $dto = BookCreateDto::fromRequest($request->validated());

        $book = $this->bookService->store($dto);

        return new BaseResource($book);

    }

    public function update(BookUpdateRequest $request, int $id){

        $dto = BookUpdateDto::fromRequest($request->validated());

        $book = $this->bookService->update($id, $dto);

        return new BaseResource($book);

    }
}
