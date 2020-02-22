<?php
/**
 * Created by PhpStorm.
 * Script Name: config_weixin.php
 * Create: 2017/2/13 下午8:30
 * Description: 微信配置
 * Author: Doogie<461960962@qq.com>
 */

// +----------------------------------------------------------------------
// | 缓存设置
// +----------------------------------------------------------------------

return [
    // 使用复合缓存类型
    'type'  =>  'complex',
    // 默认使用的缓存
    'default' => [
        // 驱动方式
        'type' => 'memcached',
        'host'  => \think\Env::get('memcached.host', 'localhost'),
        'port'  => \think\Env::get('memcached.port', 11211)
    ],
    // 文件缓存
    'file'   =>  [
        // 驱动方式
        'type' => 'file',
        // 设置不同的缓存保存目录
        'path' => CACHE_PATH,
    ],
    // memcache缓存
    'memcached' =>  [
        'type'  => 'memcached',
        'host'  => \think\Env::get('memcached.host', 'localhost'),
        'port'  => \think\Env::get('memcached.port', 11211)
    ],
    // redis缓存
    'redis' =>  [
        'type'  => 'redis',
        'host'  => \think\Env::get('redis.host', 'localhost'),
        'port'  => \think\Env::get('redis.port', 6379)
    ]
];