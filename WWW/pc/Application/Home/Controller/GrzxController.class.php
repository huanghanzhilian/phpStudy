<?php
namespace Home\Controller;
use Think\Controller;
class GrzxController extends Controller {
		public function index(){
			$username=$_COOKIE['username'];
			$a=M('m_user');
			$arr7=$a->where("user_name='$username'")->find();
			$yue=$arr7['yixiaofei'];
			$yuemoney=$arr7['yuemoney'];
		//	$dingdanmoney=$arr7['dingdanmoney'];
			$arr8=$a->where("user_name='$username'")->find();
				
				$user_id=$arr8['user_id'];//die;echo 
				$b=M('goods');
				$nums=$b->where("user_id='$user_id' and fk=1")->count();
				//$arrt=$b->where("user_id='$user_id' and fk=1")->select();
				////print_r($arrt);die;
				//$amount='';
				//foreach($arrt as $k=>$v){
						//$amount+=$v['amount'];
				//}
				//$amount=$dingdanmoney+$huishoumoney;
				$sfzt=$arr8['sfzt'];
				if($sfzt=='1'){
					$kongxian='在线';
				}
				else if($sfzt=='3'){
					$kongxian='不在线';
				}
				$this->assign('sfzt',$sfzt);
				$this->assign('kongxian',$kongxian);
				$this->assign('yuemoney',$yuemoney);
				$this->assign('nums',$nums);
				$this->assign('yue',$yue);
				$this->display();
		
		}
		public function	shifuzhuangtai(){
			$id=I('get.id');//echodie;
			$username=$_COOKIE['username'];
			$sql=M('m_user');
			$arr1=$sql->where("user_name='$username'")->find();
			$user_id=$arr1['user_id'];
			if($id==1){
				$post['sfzt']=3;
			$mysql=M('m_user');
			$arr=$mysql->where("user_id='$user_id'")->save($post);
			if($arr){
				
			echo "<a href='javascript:void(0)'onclick='ko(3)'>不在线</a>";//die;
			}
			}
			
			if($id==3){
				$post['sfzt']=1;
				$mysql=M('m_user');
			$arr=$mysql->where("user_id='$user_id'")->save($post);
			if($arr){
			echo "<a href='javascript:void(0)'onclick='ko(1)'>在线</a>";//die;
			}
			
			}
	}

		public function yuehuankuan(){
			$id=I('get.id');
			$mysql=M('huankuan');
			$username=$_COOKIE['username'];
			$a=M('m_user');
			$arr7=$a->where("user_name='$username'")->find();
			$yuemoney=$arr7['yuemoney'];
			$arr=$mysql->where("id='$id'")->find();
			$amount=$arr['amount'];//$post['yuemoney']=($yuemoney-);
			$this->assign('yuemoney',$yuemoney);
			$this->assign('amount',$amount);
			$this->assign('id',$id);
			$this->display();
		}
		public function hk(){
		
		$id=I('post.id');//echo 	die;//
			$mysql=M('huankuan');
			$username=$_COOKIE['username'];
			$a=M('m_user');
			$arr7=$a->where("user_name='$username'")->find();
			$yuemoney=$arr7['yuemoney'];
			$user_id=$arr7['user_id'];
			$yixiaofei=$arr7['yixiaofei'];
			$arr=$mysql->where("id='$id'")->find();
			
			$post['yuemoney']=($yuemoney-$arr['amount']);//die;echo 
			$post['yixiaofei']=($yixiaofei-$arr['amount']);
			$arr1=$a->where("user_id='$user_id'")->save($post);
			if($arr1){
				$data['hk_zt']=2;	//echo	die;
				$data['hk_type']=1;
				$data['wc_time']=date('Y-m-d H:i:s', time());
				$arr9=$mysql->where("id='$id'")->save($data);
				if($arr9){
					//echo 1;die;
					header('location:'. __CONTROLLER__."/index");
				}
			}
		}
		public function peijianhuishou(){
			$username=$_COOKIE['username'];
			$a=M('m_user');
			$arr7=$a->where("user_name='$username'")->find();
			//print_r($arr7);die;
			$user_id=$arr7['user_id'];
			$mysql=M('huishou');
			$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->where("user_id='$user_id' and zt='1'")->select();
			//print_r($arr);die;
			$this->assign('arr',$arr);
				$this->display();
		
		}
		public function hqajax(){
			$mysql=M('huishou');
			$huishou_id=I('get.huishou_id');//die;echo 
			$post['zt']=2;
			$arru=$mysql->where("huishou_id='$huishou_id'")->save($post);
			if($arru){
			$username=$_COOKIE['username'];
			$a=M('m_user');
			$arr7=$a->where("user_name='$username'")->find();
			
			$user_id=$arr7['user_id'];
			
			$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->where("user_id='$user_id' and zt='1'")->select();
			//print_r($arr);die;
			$this->assign('arr',$arr);
			$this->display();
		}

	}
	public function huankuan(){
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username'")->find();
		$yixiaofei=$arr8['yixiaofei'];
		$this->assign('yixiaofei',$yixiaofei);
		$this->display();
	
	}
	public function quhuankuan(){
		 $money=I('post.money');
		$account_preg="/^[0-9]+$/";
		if($money<1){
		$this->error('非法操作');
		}
		if(!preg_match($account_preg,$money)){
		//	echo 1;die;
			$this->error('非法操作');
		}

		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username'")->find();
		$data['user_id']=$arr8['user_id'];
		$yixiaofei=$arr8['yixiaofei'];
		if(($yixiaofei-$money)<0){
			$this->error('超额');
		}
		$data['amount']=$money;
		$mysql=M('huankuan');
		$data['ddh']=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 6);
		$data['hk_zt']=1;
		$data['u_title']='还款';
		$datae=$data['xd_time']=time();
		$dat=$datae-(60*60*24);
		$arr=$mysql->add($data);
		if($arr){
				$arr2=$mysql->where("id='$arr'")->find();
				$ddh=$arr2['ddh'];
				$arr3=$mysql->where("(xd_time < '$dat') and (hk_zt=1)")->delete();
			
			header('location:'.__MODULE__."/Payy/huankuana/id/{$arr}/ddh/{$ddh}");
		}

	}
	
	public function tixian(){
			$username=$_COOKIE['username'];
			$a=M('m_user');
			$arr7=$a->where("user_name='$username'")->find();
			$user_id=$arr7['user_id'];
			$mysql=M('yinhang');
			$arr=$mysql->where("user_id='$user_id'")->select();
			//$huishoumoney=$arr7['huishoumoney'];
			$yuemoney=$arr7['yuemoney'];
			$arr8=$a->where("user_name='$username'")->find();
				
				$user_id=$arr8['user_id'];//die;echo 
			$b=M('goods');
				//$nums=$b->where("user_id='$user_id' and fk=1")->count();
				//$arrt=$b->where("user_id='$user_id' and fk=1")->select();
				//print_r($arrt);die;
				//$amount='';
			//	foreach($arrt as $k=>$v){
				//		$amount+=$v['amount'];
				//}
				//$amount=$dingdanmoney+$huishoumoney;
			$this->assign('yuemoney',$yuemoney);
			$this->assign('arr',$arr);
			$this->display();
	}
	public function yinhangka(){
		
		$this->display();
	}
	public function yinhangtj(){
		$username=$_COOKIE['username'];
			$a=M('m_user');
			$arr7=$a->where("user_name='$username'")->find();
			$user_id=$arr7['user_id'];
			
		$post['kahao']=$kahao=I('post.kahao');
		$account_preg="/^\d{16}$/";
		if(!preg_match($account_preg,$kahao)){
			$this->error('非法操作');
		}
		$post['xingming']=addslashes(I('post.xingming'));
		$post['user_id']=$user_id;
		$mysql=M('yinhang');
		$arr=$mysql->add($post);
			if($arr){
			header('location:'. __CONTROLLER__."/tixian");
			}else{
			$this->error('添加失败');
			}
	}
	public function tijiaoshenqing(){
		//print_r($_POST);die;
			$am=I('post.am');
			$post['amt']=$amt=I('post.amt');
			
		$account_preg="/^[0-9]+$/";
		if($amt<1){
		$this->error('非法操作');
		}
		if(!preg_match($account_preg,$amt)){
			$this->error('非法操作');
		}
		if($amt>$am){
				$this->error('超额');
			}
			$post['yinhang_id']=I('post.yinhang_id');
			$username=$_COOKIE['username'];
			$a=M('m_user');
			$arr7=$a->where("user_name='$username'")->find();
			$user_id=$arr7['user_id'];
			$yuemoney=$arr7['yuemoney'];
			$post['user_id']=$user_id;
			$post['zta']=1;
			$post['txsq_time']=time();
			$mysql=M('tixianshenqing');
			$arr=$mysql->add($post);
			if($arr){
				$data['yuemoney']=($yuemoney-$amt);
				$arr4=$a->where("user_id='$user_id'")->save($data);
				if($arr4){
				header('location:'. __CONTROLLER__."/tixianxinxi");
			}
			}
		//$account_preg="/^\d$/";
	//if(!preg_match($account_preg,$account)){
		//header("location:add.php");
	//}

	}
	public function tixianxinxi(){
		$mysql=M('tixianshenqing');
		$username=$_COOKIE['username'];
		$a=M('m_user');
		$arr7=$a->where("user_name='$username'")->find();
		$user_id=$arr7['user_id'];
		$arr2=$mysql->where("user_id='$user_id'")->select();
		foreach ($arr2 as $k=>$v){
			$tixianshenqing_id.=','.$v['tixianshenqing_id'];
		}
		$tixianshenqing_id=substr($tixianshenqing_id,1);
		$arr=$mysql->join("yinhang on tixianshenqing.yinhang_id=yinhang.yinhang_id")->join("m_user on tixianshenqing.user_id=m_user.user_id")->where("zta=1 and tixianshenqing_id in ($tixianshenqing_id)")->select();
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	}
	public function txxxajax(){
		$zta=I('get.zta');//die;echo 
		$mysql=M('tixianshenqing');
		$username=$_COOKIE['username'];
		$a=M('m_user');
		$arr7=$a->where("user_name='$username'")->find();
		$user_id=$arr7['user_id'];
		$arr2=$mysql->where("user_id='$user_id'")->select();
		foreach ($arr2 as $k=>$v){
			$tixianshenqing_id.=','.$v['tixianshenqing_id'];
		}
	$tixianshenqing_id=substr($tixianshenqing_id,1);//die;echo	
		$arr=$mysql->join("yinhang on tixianshenqing.yinhang_id=yinhang.yinhang_id")->join("m_user on tixianshenqing.user_id=m_user.user_id")->where("zta='$zta' and tixianshenqing_id in($tixianshenqing_id)")->select();
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	}
}
//public function huankuandingdan(){
		//$mysql=M('huankuan');
//}
?>