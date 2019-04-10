<?php
namespace ct_api;

class AppException extends \Exception
{
    public function __construct(string $msg = 'error', int $code = 500)
    {
        parent::__construct($msg,$code);
    }
}