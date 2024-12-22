<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

class ApiValidationException extends Exception
{
    protected $validator;
    protected $code = Response::HTTP_UNPROCESSABLE_ENTITY;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function render()
    {
        return response()->json([
            "message" => $this->validator->errors()->first(),
            "errors" => $this->validator->errors()
        ], $this->code);
    }
}
