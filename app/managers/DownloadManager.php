<?php
namespace ct_api;

class DownloadManager
{
    /**
     * ダウンロードコンテンツ取得
     *
     * @return array
     */
    static public function getList(): array
    {
        $current = DateTimeUtil::getCurrentDateTime();

        $downloads = array_filter(
            DownloadService::selectDownloads(),
            function ($version) use ($current) {
                return DateTimeUtil::isOnBetweenDefault(
                    $current,
                    $version['start_date'],
                    $version['end_date']
                );
            }
        );
        // 複数ある場合は最新のものを優先
        usort($downloads, function ($a, $b) {
            return $a['download_id'] <=> $b['download_id'];
        });
        $result = [];
        foreach ($downloads as $content) {
            $result[] = [
                'download_id' => (int)$content['download_id'],
                'download_url' => $content['download_url'],
                'save_local_pass' => $content['save_local_pass'],
            ];
        }
        return $result;
    }
}
