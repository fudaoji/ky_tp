<?php
/**
 * Created by PhpStorm.
 * Script Name: BlogTj.php
 * Create: 2019/11/30 18:09
 * Description:
 * Author: Doogie<fdj@kuryun.cn>
 */

namespace app\common\model;

class BlogTj extends Base
{
    protected $updateTime = false;
    protected $key = 'partition_time';
    protected $rule = [
        'type' => 'year',
        'expr' => 2019,  //第一张表是哪年建的就写哪年
        'num' => 0
    ];

    public function __construct($data = [])
    {
        $this->rule['num'] = date('Y') - $this->rule['expr'] + 1;  //避免过一年就改一次
        parent::__construct($data);
    }
}