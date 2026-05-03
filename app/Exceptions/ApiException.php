<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiException extends HttpException {

    public function render() {

        return response()->json([
            'success' => false,
            'status'  => $this->getStatusCode(),
            'message' => $this->getMessage()
        ], $this->getStatusCode());

    }

}