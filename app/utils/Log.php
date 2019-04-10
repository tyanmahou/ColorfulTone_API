<?php

namespace ct_api;

class Log
{
    static public function error(string $log) : void
    {
        error_log($log, 3, $_SERVER['ERROR_LOG_PATH'] . 'ct/error_log');
    }

    static public function info(string $log) : void
    {
        error_log($log, 3, $_SERVER['ERROR_LOG_PATH'] . 'ct/info_log');
    }
}