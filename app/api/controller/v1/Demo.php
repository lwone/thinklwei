<?php

namespace app\api\controller\v1;

use app\api\ApiController;
use think\admin\Controller;

/**
 * API请求演示
 * Class Demo
 * @package app\api\controller
 */
class Demo extends ApiController
{
    /**
     * 从服务器取出资源（一项或多项）。
     */
    public function get(){
       $this->success('GET API请求');
    }

    /**
     * 在服务器新建一个资源。
     */
    public function post(){
        return json('POST API请求');
    }

    /**
     * 在服务器更新资源（客户端提供改变后的完整资源）。
     */
    public function put(){
        return json('PUT API请求');
    }

    /**
     * 在服务器更新资源（客户端提供改变的属性）。
     */
    public function patch(){
        return json('PATCH API请求');
    }

    /**
     * 从服务器删除资源。
     */
    public function delete(){
        return json('DELETE API请求');
    }
}