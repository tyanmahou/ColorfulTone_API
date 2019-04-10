<?php

$paths = [
    // Controller
    'BaseController' => './app/controllers/BaseController.php',
    'TitleController' => './app/controllers/TitleController.php',

    // Manager
    'VersionManager' => './app/managers/VersionManager.php',

    // Service
    'VersionService' => './app/services/VersionService.php',
    
    // Util
    'Constants' => './app/utils/Constants.php',
    'Connection' => './app/utils/Connection.php',
    'Database' => './app/utils/Database.php',
    'DateTimeUtil' => './app/utils/DateTimeUtil.php',

    // exception
    'AppException' => './app/exceptions/AppException.php',

    // views
    'ResponseView' => './app/views/ResponseView.php'
];

spl_autoload_register(function ($name) use ($paths) {
    $path = $paths[end(explode('\\', $name))];
    if (file_exists($path)) {
        require_once $path;
    }
});
