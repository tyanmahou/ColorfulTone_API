<?php
namespace ct_api;

class DownloadService
{
    static public function selectDownloads(): array
    {
        $result = Database::mst()->fetchAll('SELECT * FROM downloads');
        return array_column(
            $result,
            null,
            'download_id'
        );
    }
}