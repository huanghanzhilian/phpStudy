<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		
		$this->display();
    }
	public function fafang(){
		//print_r($_POST);die;
		$post['yhqname']=I('post.yhqname','','trim');
		$post['yhqprice']=I('post.yhqprice','','trim');
		$r=I('post.user_name','','trim');
		$mysql=M('m_user');
		$arr=$mysql->where("user_name='$r'")->find();
		//print_r($arr);die;
		$post['user_id']=$arr['user_id'];
		$sql=M('yhq');
		$arr1=$sql->add($post);
		if($arr1){
			header('location:'. __CONTROLLER__.'/index/');
			}else{
					$this->error('添加失败');
				}
	}
	
}
