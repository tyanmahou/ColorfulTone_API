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
    private function handleResponse(callable $action) : array
    {
        try {
            $response = [
                'status' => 'success',
                'value' => $action()
            ];
        } catch (\Exception $ex) {
            $response = [
                'status' => 'failed',
                'value' => [
                    'message' => $ex->getMessage(),
                    'code' => $ex->getCode(),
                ],
            ];
        }
        return $response;
    }
    public function render(callable $action) : void
    {
        ob_start();
        $response = $this->handleResponse($action);
        ob_end_clean();

        $json = json_encode($response);

        header(self::HEADER_JSON);
        echo $json;
    }
}