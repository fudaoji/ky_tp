<?php
/**
 * Created by PhpStorm.
 * Script Name: Index.php
 * Create: 2017/11/11 下午8:34
 * Description:
 * Author: Doogie<461960962@qq.com>
 */
namespace  app\docs\controller;


class Phantomjs extends Base
{
    /**
     * @return mixed
     * Author: Doogie<fdj@kuryun.cn>
     */
    public function index(){
        $assign = ['meta_title' => 'Phantomjs'];
        return $this->show($assign);
    }

    public function quickStart(){
        $assign = ['meta_title' => '快速上手'];
        return $this->show($assign);
    }

    public function download(){
        $assign = ['meta_title' => '下载'];
        return $this->show($assign);
    }
    public function build(){
        $assign = ['meta_title' => '构建'];
        return $this->show($assign);
    }
    public function releases(){
        $assign = ['meta_title' => '版本'];
        return $this->show($assign);
    }
    public function releasesNames(){
        $assign = ['meta_title' => '版本名称'];
        return $this->show($assign);
    }

}