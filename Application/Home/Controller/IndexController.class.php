<?php
namespace Home\Controller;
use Think\Controller;
//import('Vendor.jsonRPC.jsonRPCClient');
class IndexController extends Controller {
    public function index(){
        $this->show();

    }



    public  function addUserSen(){
        $data=I('post.');
        //session("topic",$data['me']);
        $tp=session('top');
        vendor('jsonRPC.jsonRPCClient');
        $client = new \jsonRPCClient('http://118.190.116.143:6117/');
        $ret=$client->addUserSen($tp,$data['me']);
        $real=json_decode($ret);

        $this->ajaxReturn($real);

    }
    function nlpSim(){
        $data=I('post.');
        //session("topic",$data['me']);
        $tp=session('top');
        #echo $tp;
        vendor('jsonRPC.jsonRPCClient');
        $client = new \jsonRPCClient('http://118.190.116.143:6117/');
        $ret=$client->nlpSim($tp,$data['me']);
        $real=json_decode($ret);

        $this->ajaxReturn($real);



    }
    public  function wordDis(){
        $data=I('post.');
        $tp=session('top');
        vendor('jsonRPC.jsonRPCClient');
        $client = new \jsonRPCClient('http://118.190.116.143:6117/');
        $ret=$client->wordDis($tp,$data['me']);
        $real=json_decode($ret);

        $this->ajaxReturn($real);
    }
    public function getAllUserSen(){
        $data=I('post.');
        $tp=session('top');
        //echo $tp;
        vendor('jsonRPC.jsonRPCClient');
        $client = new \jsonRPCClient('http://118.190.116.143:6117/');
        $ret=$client->getAllUserSen($tp);
        $real=json_decode($ret);

        $this->ajaxReturn($real);
    } public function callTerm(){
        $data=I('post.');

        vendor('jsonRPC.jsonRPCClient');
        $client = new \jsonRPCClient('http://118.190.116.143:6115/');
        $ret=$client->getTerms($data['me']);
        $real=json_decode($ret);

        $this->ajaxReturn($real);
    }
    public function simsee(){
        $data=I('get.');
        session('top',$data['topic']);
        $this->show();
    }
    public function substr(){
        $data=I('get.');

        session('top',$data['topic']);
        $this->show();
    }

}