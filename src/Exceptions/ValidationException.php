<?php

namespace UsamamuneerChaudhary\Daftravel\Exceptions;

class ValidationException extends DaftravelException
{
    protected mixed $errors;

    public function __construct($message = 'Validation failed', $errors = [], $code = 422, $previous = null, $response = null, $statusCode = null)
    {
        parent::__construct($message, $code, $previous, $response, $statusCode);
        $this->errors = $errors;
    }

    /**
     * Get the validation errors.
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
