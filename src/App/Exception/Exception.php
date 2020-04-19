<?php

declare(strict_types=1);

namespace App\App\Exception;

use Exception as BaseException;
use Throwable;

class Exception extends BaseException implements ExceptionInterface
{
    /**
     * @return static
     */
    public static function wrap(Throwable $throwable, ?string $message = null): object
    {
        return new static($message ?? $throwable->getMessage(), $throwable->getCode(), $throwable);
    }
}
