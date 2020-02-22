<?php
/**
 * Created by PhpStorm.
 * Script Name: Base.php
 * Create: 2019/11/30 17:36
 * Description:
 * Author: Doogie<fdj@kuryun.cn>
 */

namespace app\blog\controller;

use think\Controller;
use think\View;

class Base extends Controller
{
    protected $assign = [];
    /**
     * 统一视图
     * @param string $view
     * @param array $assign
     * @return mixed
     * @Author  Doogie<461960962@qq.com>
     */
    public function show($assign = [], $view = ''){
        $template = new View([
            'view_path'     => APP_PATH . request()->module().'/view/',
        ]);

        $assign['module'] = strtolower(request()->module());
        $assign['controller'] = strtolower(request()->controller());
        $assign['action'] = strtolower(request()->action());
        $this->assign = array_merge($this->assign, $assign);

        if(! $view){
            $view = $assign['action'];
        }
        return $template->fetch($view, $this->assign);
    }
}