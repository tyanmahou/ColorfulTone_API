<?php

namespace ct_api;

class ResponseView
{
    const HEADER_JSON = 'Content-Type: application/json; charset=utf-8';

    /**
     * レスポンスの形を成型
     * 
     * @param callable $action
     * @return array
     */
    private function handleResponse(callable $action): array
    {
        try {
            $response = [
                'status' => 'success',
                'result' => $action()
            ];
        } catch (\Exception $ex) {
            $response = [
                'status' => 'failed',
                'result' => [
                    'message' => $ex->getMessage(),
                    'code' => $ex->getCode(),
                ],
            ];
        }
        return $response;
    }
    public function render(callable $action): void
    {
        ob_start();
        $response = $this->handleResponse($action);
        ob_end_clean();

        $json = json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        // アプリ側で置換がないのでこちらで置換しておく
        $json = str_replace('\\\\', '\\', $json);
        header(self::HEADER_JSON);
        echo $json;
    }
}
