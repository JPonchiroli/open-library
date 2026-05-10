<?php

namespace App\Http\Controllers;

use App\Services\LoanService;
use App\DTOs\Loan\LoanCreateDto;
use App\DTOs\Loan\LoanUpdateDto;
use App\Http\Resources\BaseResource;
use App\Http\Requests\Loan\LoanStoreRequest;
use App\Http\Requests\Loan\LoanUpdateRequest;

class LoanController extends Controller
{
    public function __construct(
        public LoanService $loanService
    ) {}

    public function show(int $id){
        
        $loan = $this->loanService->getById($id);

        return new BaseResource($loan);
        
    }

     public function index(){

        $users = $this->loanService->getAll();

        return BaseResource::collection($users);
    }

    public function delete(int $id){

        $this->loanService->delete($id);

        return response()->noContent();

    }

    public function store(LoanStoreRequest $request){
        
        $dto = LoanCreateDto::fromRequest($request->validated());
        
        $this->loanService->store($dto);

        return redirect()
            ->back()
            ->with('success', "Loans register Successfully");

    }

    public function update(LoanUpdateRequest $request, int $id){

        $dto = LoanUpdateDto::fromRequest($request->validated());

        $loan = $this->loanService->update($id, $dto);

        return new BaseResource($loan);

    }
}
