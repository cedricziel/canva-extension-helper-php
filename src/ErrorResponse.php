<?php

declare(strict_types=1);

namespace Canva;

class ErrorResponse implements Response
{
    private string $errorCode;

    private string $type;

    /**
     * @see Error
     */
    public function __construct(string $errorCode)
    {
        $this->type = Response::ERROR;
        $this->errorCode = $errorCode;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): ErrorResponse
    {
        $this->type = $type;

        return $this;
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function setErrorCode(string $errorCode): ErrorResponse
    {
        $this->errorCode = $errorCode;

        return $this;
    }
}
