<?php

namespace FactoryCms\FactoryCms\Exceptions;

use Throwable;

class UndefinedControllerException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
