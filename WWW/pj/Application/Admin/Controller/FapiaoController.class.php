<?php
namespace Admin\Controller;
use Think\Controller;
class FapiaoController extends Controller {
	public function index(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$mysql=M('fp');
		$arr=$mysql->join("goods on fp.goods_id=goods.id")->where("zt='0'")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
		
		}
	public function qrkj(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			 $fp_id=I('get.fp_id');//die;echo 
			 $mysql=M('fp');
			 $post['zt']=1;
			 $arr=$mysql->where("fp_id='$fp_id'")->save($post);
			 if($arr){
				$this->success('已成功!',__CONTROLLER__.'/index',1);
			 }
		}
		}
		}
	public function yikj(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$mysql=M('fp');
		$arr=$mysql->join("goods on fp.goods_id=goods.id")->where("zt='1'")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
		
		}
	public function fapiaoshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		 $fp_id=I('get.fp_id');
		  $mysql=M('fp');
			 $arr=$mysql->where("fp_id='$fp_id'")->delete();
			 if($arr){
			$this->success('删除成功!',__CONTROLLER__.'/index',1);
			 }
	}
		}
		}

}