<?php
namespace Admin\Controller;
use Think\Controller;
class YouhuiquanController extends Controller {
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
		}
		}
		
		$this->display();
    }
	public function fafang(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		}
		}
		$this->display();
	}
	public function yhqw_show(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$mysql=M('yhq');
		$arr=$mysql->join("yonghuuser on yhq.k_userid=yonghuuser.k_userid")->where("zt='0'")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function yhqy_show(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$mysql=M('yhq');
		$arr=$mysql->join("yonghuuser on yhq.k_userid=yonghuuser.k_userid")->where("zt='1'")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function youhuishanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$id=I('get.id');
		$mysql=M('yhq');
		$arr1=$mysql->where("yhq_id='$id'")->delete();
		$arr=$mysql->join("yonghuuser on yhq.k_userid=yonghuuser.k_userid")->where("zt='0'")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function youhuishanchua(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$id=I('get.id');
		$mysql=M('yhq');
		$arr1=$mysql->where("yhq_id='$id'")->delete();
		$arr=$mysql->join("yonghuuser on yhq.k_userid=yonghuuser.k_userid")->where("zt='1'")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function fafangadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$yhqprice=I('post.yhqprice','','trim');
		$phone=I('post.user_name','','trim');
		$mysql=M('yonghuuser');
		$arr=$mysql->where("phone='$phone'")->find();
		if($arr){
		$post['ma']=randomkeys(16); 
		$post['yhqprice']=$yhqprice;
		$post['k_userid']=$arr['k_userid'];
		$sql=M('yhq');
		$arr1=$sql->add($post);
		if($arr1){
			header('location:'. __CONTROLLER__.'/index/');
			}
		}else{
			$data['phone']=$phone;
			$arr3=$mysql->add($data);
			if($arr3){
				$post['ma']=randomkeys(16); 
				$post['yhqprice']=$yhqprice;
				$post['k_userid']=$arr3;
				$sql=M('yhq');
				$arr1=$sql->add($post);
		if($arr1){
			header('location:'. __CONTROLLER__.'/index/');
			}
			}
		}
	}
		}
		}
public function glyhm(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	$mysql=M('yaoqingma');
	$arr=$mysql->join("m_user on yaoqingma.yq_user_id=m_user.user_id")->select();
		}
		}
	$this->assign('arr',$arr);
	$this->display();

}
public function yqxiugai(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	$yq_id=I('get.yq_id');
		}
		}
	$this->assign('yq_id',$yq_id);
	$this->display();
}
public function add(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	//print_r($_POST);die;
	$yq_id=I('post.yq_id');
	$post['yq_price']=I('post.yq_price');
	$mysql=M('yaoqingma');
	$arr=$mysql->where("yq_id='$yq_id'")->save($post);
	if($arr){
		header('location:'. __CONTROLLER__.'/glyhm/');
	}

}
		}
		}
}
?>