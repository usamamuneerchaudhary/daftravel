<?php

namespace UsamamuneerChaudhary\Daftravel\Exceptions;

class RateLimitException extends DaftravelException
{
    protected mixed $retryAfter;

    public function __construct($message = 'Rate limit exceeded', $retryAfter = null, $code = 429, $previous = null, $response = null, $statusCode = null)
    {
        parent::__construct($message, $code, $previous, $response, $statusCode);
        $this->retryAfter = $retryAfter;
    }

    /**
     * Get the time in seconds to wait before retrying the request.
     */
    public function getRetryAfter()
    {
        return $this->retryAfter;
    }
}
