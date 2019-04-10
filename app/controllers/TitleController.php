<?php
namespace ct_api;

class TitleController extends BaseController
{
    static public function versionAction() : array
    {
        $version = VersionManager::getCurrentVersion();
        return [
            'version' => $version,
        ];
    }
}