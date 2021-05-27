<?php
namespace app\api;
use think\App;
use think\Request;

/**
 * Class ApiController
 * @package app\api
 */
abstract class ApiController
{
    use ApiJson;

    /**
     * 应用容器
     * @var App
     */
    public $app;

    /**
     * 请求对象
     * @var Request
     */
    public $request;
}