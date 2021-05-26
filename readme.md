THINKLWEI 框架
---
为了适应工作需求的快速开发，网上找来的thinkadmin框架,然后对他进行符合我的代码风格的二次开发,后期将会增加插件化开发的功能。

## 注解权限
注解权限是指通过方法注释来实现后台 RBAC 授权管理，用注解来管理功能节点。
开发人员只需要写好注释，RBAC 的节点会自动生成，只需要配置角色及用户就可以使用RBAC权限。

* 此版本的权限使用注解实现
* 注释必需使用标准的块注释，如下案例
* 其中`@auth true`表示访问需要权限验证
* 其中`@menu true`显示在菜单编辑的节点可选项
* 其中`@login true`需要强制登录才可访问
```php
/**
* 操作的名称
* @auth true  # 表示需要验证权限
* @menu true  # 在菜单编辑的节点可选项
* @login true # 需要强制登录可访问 
*/
public function index(){
   // @todo
}
```
## 框架指令
####  守护进程管理（可自建定时任务去守护监听主进程）
* 执行 `php think xadmin:queue listen` [监听]启动异步任务监听服务
* 执行 `php think xadmin:queue start`  [控制]检查创建任务监听服务（建议定时任务执行）
* 执行 `php think xadmin:queue query`  [控制]查询当前任务相关的进程
* 执行 `php think xadmin:queue status`  [控制]查看异步任务监听状态
* 执行 `php think xadmin:queue stop`   [控制]平滑停止所有任务进程

#### 本地调试管理（可自建定时任务去守护监听主进程）
* 执行 `php think xadmin:queue webstop` [调试]停止本地调试服务
* 执行 `php think xadmin:queue webstart` [调试]开启本地调试服务（建议定时任务执行）
* 执行 `php think xadmin:queue webstatus` [调试]查看本地调试状态

## Restful API风格
####  具体格式参考文档
```php
<?php

namespace app\api\controller\v1;

/**
 * API请求演示
 * Class Demo
 * @package app\api\controller
 */
class Demo
{
    /**
     * 从服务器取出资源（一项或多项）。
     */
    public function get(){

    }

    /**
     * 在服务器新建一个资源。
     */
    public function post(){

    }

    /**
     * 在服务器更新资源（客户端提供改变后的完整资源）。
     */
    public function put(){

    }

    /**
     * 在服务器更新资源（客户端提供改变的属性）。
     */
    public function patch(){

    }

    /**
     * 从服务器删除资源。
     */
    public function delete(){

    }
}
```
