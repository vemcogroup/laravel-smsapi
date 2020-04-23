<?php

namespace Vemcogroup\SmsApi\Exceptions;

use Exception;

class SmsApiException extends Exception
{
    public static function communicationError($message): self
    {
        return new static('Error in communication with SmsApi: ' . $message);
    }
}
