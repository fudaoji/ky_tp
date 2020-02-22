<?php
namespace app\index\controller;
use ky\Kredis;
use think\Controller;

class Index extends Controller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    public function knockoutJs(){
        return $this->fetch();
    }

    public function index(){
        dump(request()->server());
    }

    public function memcache(){
        for($i = 1; $i <= 10; $i++){
            //cache("key_" . $i, $i, 10);
        }
        for($i = 1; $i <= 10; $i++){
            echo cache("key_" . $i) . "<br>";
            //cache("key_" . $i, null);
        }
    }

    public function redis(){
        $redis = (new Kredis())->getClient();

        for($i = 1; $i <= 10; $i++){
            //$redis->set("key_" . $i, $i);
        }
        for($i = 1; $i <= 10; $i++){
            echo $redis->get("key_" . $i) . "<br>";
            //cache("key_" . $i, null);
        }
    }

}
