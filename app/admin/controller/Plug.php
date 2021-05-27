<?php
namespace app\admin\controller;
use think\admin\Controller;
use think\admin\service\AdminService;
use think\facade\View;

/**
 * 插件化管理
 * Class Plug
 * @package app\admin\controller
 */
class Plug extends Controller
{
    /**
     * 绑定数据表
     * @var string
     */
    private $table = 'SystemPlugs';

    /**
     * 插件列表
     * @auth true
     */
    public function index(){
        $this->title = '插件列表';
        $this->actions = $this->app->db->name($this->table);
        $query = $this->_query($this->table)->order('id desc');
        $query->page();
    }
}