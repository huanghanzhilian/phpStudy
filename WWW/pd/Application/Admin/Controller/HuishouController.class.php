<?php
namespace Admin\Controller;
use Think\Controller;
class HuishouController extends Controller {
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
		$mysql=M('huishou');
		$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->join("m_user on huishou.user_id=m_user.user_id")->where("zt='2'")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();	
	}
	public function querenhuishou(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			 $huishou_id=I('get.huishou_id');//die;echo
			$mysql=M('huishou');
			$arr=$mysql->where("huishou_id='$huishou_id'")->find();
			$user_id=$arr['user_id'];
			$cpk_id=$arr['cpk_id'];//die;echo 
			$dnf=M('chanpinku');
			$arr4=$dnf->where("cpk_id='$cpk_id'")->find();
			$cpk_price=$arr4['cpk_price'];//die;echo 
				$my=M('m_user');
				$arr2=$my->where("user_id='$user_id'")->find();
				$data['yuemoney']=($arr2['yuemoney']+$cpk_price);//die;echo
				$ddd=$my->where("user_id='$user_id'")->save($data);
				if($ddd){
					$fg['zt']=3;
					$as=$mysql->where("huishou_id='$huishou_id'")->save($fg);
					if($as){
					$h=M('yue');
					$dat['user_id']=$user_id;
					$dat['yue_type']='回收';
					$dat['ddh']=$ddh;
					$dat['jy_money']='+'.$cpk_price;
					$dat['jy_time']=date('Y-m-d H:i:s', time());
					$arrtg=$h->add($dat);
				if($arrtg){
				header('location:'.__CONTROLLER__.'/index');
				}
			}
			
			}
	}
	}
	}
	

	public function yihuishou(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$mysql=M('huishou');
			$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->join("m_user on huishou.user_id=m_user.user_id")->where("zt='3'")->select();
			}
			}
			$this->assign('arr',$arr);
			$this->display();
	}
	public function bhg(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$huishou_id=I('get.huishou_id');
			$mysql=M('huishou');
				$fg['zt']=4;
					$as=$mysql->where("huishou_id='$huishou_id'")->save($fg);
					header('location:'.__CONTROLLER__.'/index');

	}
		}
	}
	public function buhege(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$mysql=M('huishou');
			$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->join("m_user on huishou.user_id=m_user.user_id")->where("zt='4'")->select();
			//print_r($arr);die;
		}
		}
			$this->assign('arr',$arr);
			$this->display();
	}
	

}
?>