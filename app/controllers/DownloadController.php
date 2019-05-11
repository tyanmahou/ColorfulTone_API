<?php
namespace ct_api;

class DownloadController
{
    static public function listAction(): array
    {
        $response = DownloadManager::getDownloads();
        return $response;
    }
}
