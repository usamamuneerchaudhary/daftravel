<?php

namespace UsamamuneerChaudhary\Daftravel\Exceptions;

use Exception;

class DaftravelException extends Exception
{
    protected mixed $response;
    protected mixed $statusCode;

    public function __construct($message = '', $code = 0, $previous = null, $response = null, $statusCode = null)
    {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
        $this->statusCode = $statusCode;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
