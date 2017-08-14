<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 10:49
 */

namespace Home\Controller;


use Think\Controller;

class NewsController extends Controller
{
    public  function  archive(){
        //echo U('news/3443')."<BR>";
        echo "asdasd  ".I('get.id');
        print I('server.REQUEST_METHOD');
        print I('server.REMOTE_ADDR');
        print IS_GET;
        //$data['status']  = 1;
        //$data['content'] = 'content';
        //$this->ajaxReturn($data,'xml');
    }
    public function _empty($name){
        echo '没有改路径';
    }
}