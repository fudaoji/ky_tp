<?php
/**
 * Created by PhpStorm.
 * Script Name: Doc.php
 * Create: 2017/11/11 上午10:39
 * Description: Phantomjs的插件
 * Author: Doogie<461960962@qq.com>
 */
namespace  app\docs\widget;

class Phantomjs
{
    public function improveHtml($url = ''){
        $html = '<div class="shift__up island promo improve">耽误您宝贵的时间来 <a target="_blank" href="'.$url.'">完善文档</a> 从而帮助更多的使用者, 我们乐意看到您的贡献.</div>';
        return $html;
    }

    /**
     * 接口文档底部菜单
     * @param string $current
     * @return string
     * @author: Doogie<461960962@qq.com>
     */
    public function sidebar($current = 'index'){
        $html = '';
        $nav_arr = [
            [
                'title' => '起步',
                'subnav' => [
                    ['name' => 'download', 'title' => '下载'],
                    ['name' => 'build', 'title' => '构建'],
                    ['name' => 'releases', 'title' => '版本'],
                    ['name' => 'releasesnames', 'title' => '版本名称'],
                    ['name' => 'repl', 'title' => '控制台'],
                ]
            ],
            [
                'title' => '学习',
                'subnav' => [
                    ['name' => 'quickstart', 'title' => '快速上手'],
                    /*['name' => 'build', 'title' => '构建'],
                    ['name' => 'releases', 'title' => '版本'],
                    ['name' => 'releasesnames', 'title' => '版本名称'],
                    ['name' => 'repl', 'title' => '控制台'],*/
                ]
            ]
        ];

        foreach($nav_arr as $k => $v){
            $html .= '<li class="nav-group">'.
            '<div class="nav-group-label">'.$v['title'].'</div>'.
            '<ul>';
            foreach ($v['subnav'] as $k2 => $v2){
                $class = $v2['name'] == $current ? 'current' : '';
                $html .= '<li class="nav-item nav-item-doc '.$class.'">'.
                    '<span class="nav-item-label">D</span>' .
                    '<a href="'.url('phantomjs/'.$v2['name']).'" class="nav-item-name">'.$v2['title'].'</a>'.
                '</li>';
            }
            $html .= '</ul></li>';
        }

        return $html;
    }
}
