<?php

namespace UsamamuneerChaudhary\Daftravel\Exceptions;

class AuthenticationException extends DaftravelException
{
    public function __construct($message = 'Authentication failed', $code = 401, $previous = null, $response = null, $statusCode = null)
    {
        parent::__construct($message, $code, $previous, $response, $statusCode);
    }
}