<?php

$paths = [
    // Controller
    'BaseController' => './app/controllers/BaseController.php',
    'DownloadController' => './app/controllers/DownloadController.php',
    'TitleController' => './app/controllers/TitleController.php',

    // Manager
    'DownloadManager' => './app/managers/DownloadManager.php',
    'VersionManager' => './app/managers/VersionManager.php',

    // Service
    'DownloadService' => './app/services/DownloadService.php',
    'VersionService' => './app/services/VersionService.php',

    // Util
    'Constants' => './app/utils/Constants.php',
    'Connection' => './app/utils/Connection.php',
    'Database' => './app/utils/Database.php',
    'DateTimeUtil' => './app/utils/DateTimeUtil.php',
    'Log' => './app/utils/Log.php',
    'Request' => './app/utils/Request.php',

    // exception
    'AppException' => './app/exceptions/AppException.php',
    'RequestException' => './app/exceptions/RequestException.php',

    // views
    'ResponseView' => './app/views/ResponseView.php'
];

spl_autoload_register(function ($name) use ($paths) {
    $path = $paths[end(explode('\\', $name))];
    if (file_exists($path)) {
        require_once $path;
    }
});
