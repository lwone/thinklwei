CRUD 框架
---
为了快速开发找来的框架，后期增加插件化开发的功能

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
* 执行 `build.cmd` 可更新 `composer` 插件，会删除并替换 `vendor` 目录
* 执行 `php think run` 启用本地开发环境，访问 `http://127.0.0.1:8000`
* 执行 `php think xadmin:fansall` 同步微信粉丝数据（依赖于 `wechat` 模块）
* 执行 `php think xadmin:version` 查看当前版本号，显示 `ThinkPHP` 版本及 `ThinkLibrary` 版本

#### 1. 线上代码更新
* 执行 `php think xadmin:install admin` 从线上服务更新 `admin` 模块的所有文件（注意文件安全）
* 执行 `php think xadmin:install wechat` 从线上服务更新 `wechat` 模块的所有文件（注意文件安全）
* 执行 `php think xadmin:install static` 从线上服务更新 `static` 静态资料文件（注意文件安全）
* 执行 `php think xadmin:install config` 从线上服务更新 `config` 常用配置文件（注意文件安全）

#### 2. 守护进程管理（可自建定时任务去守护监听主进程）
* 执行 `php think xadmin:queue listen` [监听]启动异步任务监听服务
* 执行 `php think xadmin:queue start`  [控制]检查创建任务监听服务（建议定时任务执行）
* 执行 `php think xadmin:queue query`  [控制]查询当前任务相关的进程
* 执行 `php think xadmin:queue status`  [控制]查看异步任务监听状态
* 执行 `php think xadmin:queue stop`   [控制]平滑停止所有任务进程

#### 3. 本地调试管理（可自建定时任务去守护监听主进程）
* 执行 `php think xadmin:queue webstop` [调试]停止本地调试服务
* 执行 `php think xadmin:queue webstart` [调试]开启本地调试服务（建议定时任务执行）
* 执行 `php think xadmin:queue webstatus` [调试]查看本地调试状态