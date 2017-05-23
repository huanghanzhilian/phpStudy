<?php
namespace Admin\Controller;
use Think\Controller;
class CangkuglController extends Controller {
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
				$db=M('cangku');
		$sql=M('m_user');
		$arr1=$sql->where("sfzt in(1,2,3)")->select();
			 $user_id='';
		foreach($arr1 as $k=>$v){
		  $user_id.=','.$v['user_id'];
		
		}
	 $user_id=substr($user_id,1);
		
		$arr33=$db->where("zta='0'")->find();
		if(!$arr33){
			$arr6=$db->where("zta='0' and user_id in($user_id)")->find();
		}else{
			$arr6=$db->where(" zta='0' and user_id in($user_id)")->select();
		foreach ($arr6 as $v=>$k) {
		   $cpk_id.=','.$k['cpk_id'];
		}
		$cpk_id=substr($cpk_id,1);
		$mysql=M('chanpinku');
		$arr5=$mysql->where("cpk_id in($cpk_id)")->select();
		foreach ($arr5 as $v=>$k) {
		   $modeid.=','.$k['model_id'];
		}
		$modeid=substr($modeid,1);//	die;echo echo 	
		$my=M('maintenance_model');
		$arr3=$my->where("model_id in ($modeid)")->select();
		foreach ($arr3 as $v=>$k) {
		   $brandid.=','.$k['brand_id'];
		}
		
		
			 $brandid=substr($brandid,1);
			 $m=M('maintenance_brand');
			$arr4=$m->where("brand_id in($brandid)")->select();
			 }
		
		
		
		}
		}
		$this->assign('arr3',$arr3);
		$this->assign('arr4',$arr4);
		$this->display();
		
		}

		public function pingpai(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			  $brandid=I('get.brand_id');//die;echo 
		$db=M('cangku');
		
		$sql=M('m_user');
		$arr1=$sql->where("sfzt in(1,2,3)")->select();
			 $user_id='';
		foreach($arr1 as $k=>$v){
		  $user_id.=','.$v['user_id'];
		
		}
	 $user_id=substr($user_id,1);
		$arr6=$db->where("zta='0' and user_id in($user_id)")->select();
		if(!$arr6){
			$this->error('没有产品请购买');
		}

		foreach ($arr6 as $v=>$k) {
		   $cpk_id.=','.$k['cpk_id'];
		}
	$cpk_id=substr($cpk_id,1);//die;echo //echo 	echo	die;die;
		$mysql=M('chanpinku');
		$arr5=$mysql->where("cpk_id in($cpk_id)")->select();
		foreach ($arr5 as $v=>$k) {
		   $model_id.=','.$k['model_id'];
		}
		$model_id=substr($model_id,1);//die;echo //	die;echo echo 	
		$my=M('maintenance_model');
		$arr3=$my->where("model_id in ($model_id) and brand_id in($brandid)")->select();
		$arr22=$my->where("model_id in ($model_id) and brand_id in($brandid)")->select();
		foreach ($arr22 as $v=>$k) {
		   $brand_id.=','.$k['brand_id'];
		}
			 $bid=substr($brand_id,1);
		$arr91=$my->where("model_id in ($model_id)")->select();
		foreach ($arr91 as $v=>$k) {
		   $brand_id.=','.$k['brand_id'];
		    $modeid.=','.$k['model_id'];
		}
			 $brand_id=substr($brand_id,1);
		 $modeid=substr($modeid,1);//die;	echo 
		$m=M('maintenance_brand');
		

		$arr9=$my->where("model_id in ($modeid) and brand_id='$brandid'")->select();
		//print_r($arr9);die;
		$mid='';
			foreach ($arr9 as $v=>$k) {
		   $mid.=','.$k['model_id'];
		   $brid.=','.$k['brand_id'];
		}
		 $mid=substr($mid,1);
		$brid=substr($brid,1);//die;echo  
		$arr=$my->where("model_id in($mid)")->select();
		$arr4=$m->where("brand_id in($brid)")->select();
		//print_r($arr);die;
		foreach($arr as $k=>$v){
		  $model_id=$v['model_id'];
		  $arr2=$mysql->where("cpk_id in($cpk_id) and model_id='$model_id'")->select();
			$arr[$k]['data']=$arr2;
		}
		
		}
		}
		//print_r($arr);die;
		//$this->assign('numss',$numss);
		$this->assign('arr3',$arr3);
		$this->assign('arr',$arr);
		$this->assign('arr4',$arr4);
		$this->display();
		}
	public function changk_xq(){
		
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$cpk_id=I('get.cpk_id');
		$sql=M('m_user');
		$arr1=$sql->where("sfzt in(1,2,3)")->select();
			 $user_id='';
		foreach($arr1 as $k=>$v){
		  $user_id.=','.$v['user_id'];
		
		}
	 $user_id=substr($user_id,1);
		$db=M('cangku');
		$arr6=$db->where("zta='0'")->select();
		if(!$arr6){
			$this->error('没有产品请购买');
		}
		$mysql=M('chanpinku');
		
		$arr5=$db->where("cpk_id in ($cpk_id) and zta='0' and user_id in($user_id)")->select();
			 $cangku_id='';
		foreach($arr5 as $k=>$v){
		  $cangku_id.=','.$v['cangku_id'];
		
		}
	 $cangku_id=substr($cangku_id,1);
		 $arr9=$db->join("chanpinku on cangku.cpk_id=chanpinku.cpk_id")->join("ddxxb on cangku.ddxx_id=ddxxb.ddxx_id")->where("cangku_id in($cangku_id) and zta='0'")->select();
		
			 $ddxx_id='';
		foreach($arr9 as $k=>$v){
		  $ddxx_id.=','.$v['ddxx_id'];
		
		}
	 $ddxx_id=substr($ddxx_id,1);
	 $sqlsql=M('ddxxb');
	 $arr10=$sqlsql->join("m_user on ddxxb.use_id=m_user.user_id")->join("dingdanhao on ddxxb.dingdanhaoid=dingdanhao.id")->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->where("ddxx_id in($ddxx_id)")->select();
		}
		}
		// $arr101=$sqlsql->select();
		// print_r($arr10);die;
		$this->assign('arr10',$arr10);
		$this->display();
}
	
	
}