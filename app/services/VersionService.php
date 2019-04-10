<?php
namespace ct_api;

class VersionService
{
    static public function selectVersions(): array
    {
        $result = Database::mst()->fetchAll('SELECT * FROM versions');
        return array_column(
            $result,
            null,
            'version_id'
        );
    }
}