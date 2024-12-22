<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class ApiAuthorizationException extends Exception
{
    protected $code = Response::HTTP_FORBIDDEN;

    protected $message;
    public function __construct($message = "No permissions to perform this action"){
        $this->message = $message;
    }

    public function render()
    {
        return response()->json([
            "message" => $this->message
        ], $this->code);
    }
}
