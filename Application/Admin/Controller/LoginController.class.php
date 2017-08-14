<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 15:50
 */

namespace Admin\Controller;


use Think\Controller;

class LoginController extends  Controller
{
    public  function  login(){
       // echo U('app.js');
        $this->show();
    }
    public  function myPage(){
        $this->show();
    }
    public  function checklogin(){
        echo I('post.user').I('post.passwd');

        $user=M('User','think_','DB_CONFIG1');

        /*
        $ret=$user->where("user=%s and passwd=%s",array(I('post.user'),I('post.passwd')))->select();
        if($ret){

            $this->ajaxReturn($dt);
        }
        else{
            echo "asdsaas<BR>";
        }*/


        //echo "finish<BR>";
    }
}