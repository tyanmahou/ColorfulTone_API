<?php

namespace ct_api;

class Request
{
    static public function getBody(array $requires = []) : array
    {
        $body = file_get_contents('php://input');
        foreach ($requires as $value) {
            if (!isset($body['values'][$value])) {
                throw new RequestException("request requires {$value}");
            }
        }
        return $body['values'];
    }
}