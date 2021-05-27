<?php

namespace app\api;

use think\exception\HttpResponseException;

/**
 * Trait ApiJson
 * @package app\api
 */
trait ApiJson
{
    public function success($data = [], $code = 200, $msg = '')
    {
        $response = $this->responseJsonData($data, $code, $msg);
        throw new HttpResponseException($response);
    }

    public function error($code = 500, $msg = '',$data=[], $http_code = 200)
    {
        $response = $this->responseJsonData($data, $code, $msg, $http_code);
        throw new HttpResponseException($response);
    }

    protected function responseJsonData($data = [], $code = 200, $errMsg = '', $http_code = 200)
    {
        $return['code'] = (int)$code;
        if (!empty($errMsg)) {
            $return['message'] = $errMsg;
        } else {
            $message = isset(config('apiCode')[$code])?config('apiCode')[$code]:'';
            $return['message'] = $message;
        }
        $return['data'] = $data;
        return json($return, $http_code);
    }
}