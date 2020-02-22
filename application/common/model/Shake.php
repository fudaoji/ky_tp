<?php
/**
 * Created by PhpStorm.
 * Script Name: Shake.php
 * Create: 2018/1/24 15:39
 * Description:
 * Author: ZHF<843118712@qq.com>
 */

namespace app\common\model;

class Shake extends Base
{
    //使用另一个数据库
    protected $connection = 'db_config1';

    /*protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 数据库连接DSN配置
        'dsn'         => '',
        // 服务器地址
        'hostname'    => 'rm-uf6nv2dw31um36840po.mysql.rds.aliyuncs.com',
        // 数据库名
        'database'    => 'hhb',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => '12dde03fd2!',
        // 数据库连接端口
        'hostport'    => '3306',
        // 数据库连接参数
        'params'      => [],
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => 'ky_',
    ];*/
}