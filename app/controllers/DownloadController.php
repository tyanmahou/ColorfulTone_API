<?php
namespace ct_api;

class DownloadController
{
    static public function listAction(): array
    {
        $body = Request::getBody();
        $version = $body['version'] ?? '0.0.0.0';
        $response = DownloadManager::getList($version);
        return $response;
    }
}
