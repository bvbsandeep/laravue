<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class ApiException extends Exception
{
    protected $code;
    protected $message;

    public function __construct($message, $code = Response::HTTP_BAD_REQUEST)
    {
        $this->message = $message;
        $this->code = $code;
    }

    public function render()
    {
        return response()->json([
            "message" => $this->message,
        ], $this->code);
    }
}
