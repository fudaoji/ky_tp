<?php
/**
 * Created by PhpStorm.
 * Script Name: Index.php
 * Create: 2019/12/19 15:27
 * Description:
 * Author: Doogie<fdj@kuryun.cn>
 */

namespace app\wap\controller;

class Index extends Base
{
    public function index(){
        return $this->show();
    }

    public function map(){
        return $this->show();
    }
}