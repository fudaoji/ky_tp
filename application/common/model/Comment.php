<?php
/**
 * Created by PhpStorm.
 * Script Name: Comment.php
 * Create: 2019/11/30 17:56
 * Description: 评论表
 * Author: Doogie<fdj@kuryun.cn>
 */

namespace app\common\model;

class Comment extends Base
{
    protected $autoWriteTimestamp = false;
    protected $key = 'blog_id';
    protected $rule = [
        'type' => 'mod',
        'num' => 5
    ];
}