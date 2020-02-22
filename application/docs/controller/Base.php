<?php
/**
 * SCRIPT_NAME: Base.php
 * Created by PhpStorm.
 * Time: 2017/11/11 21:56
 * Description: 控制器基类
 * Author: Doogie <461960962@qq.com>
 */

namespace app\docs\controller;

use think\Controller;
use think\View;

class Base extends Controller
{
    protected $assign = [];

    /**
     * 析构函数
     * @Author  Doogie<461960962@qq.com>
     */
    public function _initialize(){

    }

    /**
     * 统一视图
     * @param string $view
     * @param array $assign
     * @return mixed
     * @Author  Doogie<461960962@qq.com>
     */
    public function show($assign = [], $view = ''){
        $template = new View([
            'view_path'     => APP_PATH . request()->module().'/view/'.config('theme'). '/',
        ]);

        $assign['module'] = strtolower(request()->module());
        $assign['controller'] = strtolower(request()->controller());
        $assign['action'] = strtolower(request()->action());
        $assign['version'] = config('app_debug') ? time() : config('version');
        $this->assign = array_merge($this->assign, $assign);

        if(! $view){
            $view = $assign['action'];
        }
        return $template->fetch($view, $this->assign);
    }
}