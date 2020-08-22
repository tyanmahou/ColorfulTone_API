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
            return $a['order'] <=> $b['order'] ?:
            $a['download_id'] <=> $b['download_id'];
        });
        $result = [];
        foreach ($downloads as $content) {
            $content['download_id'] = (int)$content['download_id'];
            unset($content['start_date']);
            unset($content['end_date']);

            $result[] = $content;
        }
        return $result;
    }
}
