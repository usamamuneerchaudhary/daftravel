<?php

namespace UsamamuneerChaudhary\Daftravel\Exceptions;

class ApiException extends DaftravelException
{
    public function __construct($message = 'API request failed', $code = 500, $previous = null, $response = null, $statusCode = null)
    {
        parent::__construct($message, $code, $previous, $response, $statusCode);
    }
}