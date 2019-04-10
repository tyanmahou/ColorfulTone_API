<?php
namespace ct_api;

class VersionManager
{
    /**
     * 現在のバージョンを取得
     *
     * @return string
     */
    static public function getCurrentVersion() : string
    {
        $current = DateTimeUtil::getCurrentDateTime();

        $versions = array_filter(
            VersionService::selectVersions(),
            function ($version) use ($current) {
                return DateTimeUtil::isOnBetweenDefault(
                    $current,
                    $version['start_date'],
                    $version['end_date']
                );
            }
        );
        // 複数ある場合は最新のものを優先
        usort($versions, function ($a, $b) {
            return -($a['version_id'] <=> $b['version_id']);
        });
        $currentVersion = current($versions);
        if (empty($currentVersion)) {
            throw new AppException("Missing version");
        }
        return $currentVersion['version'];
    }
}