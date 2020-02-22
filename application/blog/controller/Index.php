<?php
/**
 * Created by PhpStorm.
 * Script Name: Index.php
 * Create: 2019/11/30 17:40
 * Description:
 * Author: Doogie<fdj@kuryun.cn>
 */

namespace app\blog\controller;
use think\Db;

class Index extends Base
{
    /**
     * 博客列表
     * Author: Doogie<fdj@kuryun.cn>
     */
    public function index(){
        $subQuery = Db::table('emp')
            ->alias('e')
            ->field('e.dept_id, COUNT(*) AS etotal')
            ->group('dept_id')
            ->buildSql();

        $res = Db::table('dept')
            ->alias('d')
            ->join($subQuery . ' e', 'e.dept_id=d.id')
            ->field('d.id,d.dname,d.loc,e.etotal')
            ->cache(md5($subQuery))
            ->select();
        dump(db()->getLastSql());exit;

        $list = model('blog')->getList([1, 20], [], ['id' => 'desc']);
        return $this->show(['list' => $list]);
    }

    /**
     * 博客列表
     * Author: Doogie<fdj@kuryun.cn>
     */
    public function tj(){
        $blog_id = input('id', 0);
        $list = model('blogTj')->getList([1, 20], ['blog_id' => $blog_id, 'partition_time' => time()], ['id' => 'desc']);
        return $this->show(['list' => $list]);
    }

    /**
     * 博客详情页
     * @return mixed
     * Author: Doogie<fdj@kuryun.cn>
     */
    public function detail(){
        $id = input('id', 0);
        model('blogTj')->addOne(['blog_id' => $id, 'type' => 'view', 'partition_time' => time()]);
        $data = model('blog')->getOne($id);
        $comments = model('comment')->getAll(['blog_id' => $id]);
        $comment_tb = 'comment_' . (($id % 5) + 1);
        $id = " 0 ' or ' 1=1";
        $res = model('blog')->getList([1, 10], ['id' => $id]);

        dump(model('blog')->getLastSql());exit;
        return $this->show(['blog' => $data, 'comments' => $comments]);
    }

    /**
     * 修改博客
     * @return mixed
     * Author: Doogie<fdj@kuryun.cn>
     */
    public function edit(){
        if(request()->isPost()){
            $post_data = input('post.');
            $res = model('blog')->updateOne($post_data);
            if($res){
                $this->success('修改成功', url('detail', ['id' => $post_data['id']]));
            }else{
                $this->error('修改失败，请刷新重试');
            }
        }
        $id = input('id', 0);
        $data = model('blog')->getOne($id);
        return $this->show(['blog' => $data]);
    }

    /**
     * 删除博客
     * Author: Doogie<fdj@kuryun.cn>
     */
    public function delPost(){
        $id = input('id', 0);
        $res = model('blog')->delOne($id);
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败，请刷新重试');
        }
    }

    /**
     * 提交评论
     * Author: Doogie<fdj@kuryun.cn>
     */
    public function commentPost(){
        $post_data = input('post.');
        $res = model('comment')->addOne($post_data);
        if($res){
            model('blogTj')->addOne(['blog_id' => $post_data['blog_id'], 'type' => 'comment', 'partition_time' => time()]);
            $this->success('评论成功');
        }else{
            $this->error('评论失败，请刷新重试');
        }
    }

    /**
     * 提交评论
     * Author: Doogie<fdj@kuryun.cn>
     */
    public function commentDelPost(){
        $post_data = input();
        $res = model('comment')->delOne($post_data);
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败，请刷新重试');
        }
    }
}