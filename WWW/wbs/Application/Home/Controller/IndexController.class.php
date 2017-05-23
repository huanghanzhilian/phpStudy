<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
     $mysql=M('dingdan');
	$arr=$mysql->select();
	$up=$mysql->where("zt='3'")->count();
	$int=$mysql->where("zt='1'")->count();
	$this->assign('up',$up);
	$this->assign('int',$int);
	$this->assign('arr',$arr);
	$this->display();
    }
}