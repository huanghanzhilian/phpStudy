<?php
namespace Home\Controller;
use Think\Controller;
class GouwucheController extends Controller {
	public function tianjiacm(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		require_once APP_PATH.'Common/Cf/shifu.php';
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$model_id=I('get.model_id');
		$mysql=M('maintenance_brand');
		$arr=$mysql->select();
		$sql=M('maintenance_model');
		$arr1=$sql->where("brand_id='1'")->select();
		$gh=M('chanpinku');
		$arr2=$gh->where("model_id='$model_id' and sf='n'")->select();
		$s=M('m_user');
		$arr8=$s->where("user_name='$username' and sfzt in(1,2,3)")->find();
	
		$user_id=$arr8['user_id'];//die;ech
		$gw=M('gouwuche');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				if($arr4){
				foreach ($arr4 as $k=>$v){
						$nums.=','.$v['nums'];
				}
				if($nums){
				$nums=substr($nums,1);
				$nums=array_sum(explode(',',$nums));
				}
				}
		}
		}
		$this->assign('nums',$nums);
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->assign('arr2',$arr2);
		$this->display();
	}


	public function peijianshanchu(){
		 $id=I('get.id');
		$mysql=M('dingdanhao');
		$sql=M('ddxxb');
		$fkzt=I('get.fkzt');
		$arr=$mysql->where("id='$id'")->delete();
		if($arr){
			$arr1=$sql->where("dingdanhaoid='$id'")->delete();
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$my=M('dingdanhao');
		$arru=$my->where("fkzt='$fkzt' and user_id='$user_id'")->find();
		if(!$arru){
			$arro=$my->where("fkzt='$fkzt' and user_id='$user_id'")->find();			

		}else{
		$arro=$my->where("fkzt='$fkzt' and user_id='$user_id'")->select();
		foreach ($arro as $k=>$v){
			$id.=','.$v['id'];
		}
	
		$id=substr($id,1);//die;echo 
		if(!$id){
		$arr6=$my->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id='$id' ")->select();
		$arr9=$my->where("id in($id)")->select();
			if($arr9){
			$nums1=count($arr9);
			}else{
			$nums1=0;			
			}
		$arr7=$my->where("id in($id) and fkzt='1'")->select();
		if($arr7){
			$nums2=count($arr7);
		}else{
			$nums2=0;			
		}
		$arr8=$my->where("id in($id) and fkzt='2'")->select();
		if($arr8){
			$nums3=count($arr8);
		}else{
			$nums3=0;			
		}
		}else{
		$arr6=$my->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			//->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
			->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id in($id)")->select();
			
				$arr9=$my->where("id in($id) and fkzt='0'")->select();
			if($arr9){
			$nums1=count($arr9);
			}else{
			$nums1=0;			
			}
		$arr7=$my->where("id in($id) and fkzt='1'")->select();
		if($arr7){
			$nums2=count($arr7);
		}else{
			$nums2=0;			
		}
		$arr8=$my->where("id in($id) and fkzt='2'")->select();
		if($arr8){
			$nums3=count($arr8);
		}else{
			$nums3=0;			
		}
		
		
		}
		foreach ($arr6 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
		
		if($fkzt==0){
			$name='未付款';
			$shanchu='删除';
		}else if($fkzt==1){
			$name='已付款';
		}else if($fkzt==2){
			$name='已完成';
		}
		}
		}
		}
		$this->assign('shanchu',$shanchu);
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('name',$name);
		$this->assign('arr',$arr);
		$this->display();
		
		

	
	}
	public function my_evaluate(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$a=M('m_user');
		$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr7['user_id'];
		$user_username=$arr7['user_username'];
		 $img=$arr7['img'];//die;echo

		$sqlp=M('goods');
				$ar=$sqlp->where("user_id='$user_id'")->count();
				$art=$sqlp->where("user_id='$user_id' and fk='1'")->count();
				$lv=($art/$ar)*100;
				$cttt=M('pingjia');
				$pingjianums=$cttt->where("user_id='$user_id'")->count();
			$ping=$cttt->where("user_id='$user_id'")->select();
						$pjx='';
				foreach ($ping as  $k=>$n){
						$pjx+=$n['pjx']+1;
				}
					 $pjx;//die;echo 
				if(!$ping){
				$xingji='0.00';//die;	echo 
				}else{
					
				$xingji=($pjx/$pingjianums);
				}
		$msql=M('pingjia');
		$arr12=$msql->where("user_id='$user_id'")->find();
		if(!$arr12){
			$arr1=$msql->where("user_id='$user_id'")->find();
			
		}else{
		$arr1=$msql->where("user_id='$user_id'")->select();
		$pingjia_id='';
		foreach ($arr1 as $k=>$v){
			$pingjia_id.=','.$v['pingjia_id'];
		}
		$pingjia_id=substr($pingjia_id,1);

		$arr10=$msql->where("pingjia_id in ($pingjia_id)")->find();
		if(!$arr10){
		$arr10=$msql->where("pingjia_id in ($pingjia_id)")->find();
		}else{
		$arr9=$msql->join("goods on pingjia.goods_id=goods.id")->join("yonghuuser on pingjia.k_userid=yonghuuser.k_userid")->join("maintenance_model on goods.model_id=maintenance_model.model_id")->where("pingjia_id in ($pingjia_id)")->order("pingjia_id desc")->select();
		//print_r($arr9);die;
		$mysql=M('ping');
		$db=M('pingjiacontent');
		$arr=$mysql->where("ping_id='1'")->select();
			foreach($arr as $k=>$v){
				$a=$v['ping_id'];
				$ar=$db->where("ping_id='1'")->select();
				$arr[$k]['data']=$ar;
			}
		$arr1=$mysql->where("ping_id='2'")->select();
			foreach($arr1 as $k=>$v){
				$a=$v['ping_id'];
				$ar1=$db->where("ping_id='2'")->select();
				$arr1[$k]['data']=$ar1;
			}
		$arr2=$mysql->where("ping_id='3'")->select();
			foreach($arr2 as $k=>$v){
				$a=$v['ping_id'];
				$ar2=$db->where("ping_id='3'")->select();
				$arr2[$k]['data']=$ar2;
			}
		$arr3=$mysql->where("ping_id='4'")->select();
			foreach($arr3 as $k=>$v){
				$a=$v['ping_id'];
				$ar3=$db->where("ping_id='4'")->select();
				$arr3[$k]['data']=$ar3;
			}
			
			
			
			$arr4=$mysql->where("ping_id='5'")->select();
			foreach($arr3 as $k=>$v){
				$a=$v['ping_id'];
				$ar4=$db->where("ping_id='5'")->select();
				$arr4[$k]['data']=$ar4;
			}
			
			$arr5=$mysql->where("ping_id='6'")->select();
			foreach($arr5 as $k=>$v){
				$a=$v['ping_id'];
				$ar5=$db->where("ping_id='6'")->select();
				$arr5[$k]['data']=$ar5;
			}
			
			$arr6=$mysql->where("ping_id='7'")->select();
			foreach($arr6 as $k=>$v){
				$a=$v['ping_id'];
				$ar6=$db->where("ping_id='7'")->select();
				$arr6[$k]['data']=$ar6;
			}//print_r($arr6);die;
		}
		}
		}
		}
		$this->assign('avatar',$img);
		$this->assign('lv',$lv);
		$this->assign('xingji',$xingji);
		$this->assign('arr6',$arr6);
		$this->assign('arr5',$arr5);
		$this->assign('arr4',$arr4);
		$this->assign('arr3',$arr3);
		$this->assign('arr2',$arr2);
		$this->assign('arr1',$arr1);
		$this->assign('arr',$arr);
		$this->assign('arr9',$arr9);
		$this->assign('user_username',$user_username);
		$this->display();
	}
	
	public function my_wallet(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			$a=M('m_user');
			$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$yue=$arr7['yixiaofei'];
			$yuemoney=$arr7['yuemoney'];
			$arr8=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
				$customer_id=$arr8['customer_id'];
				$user_username=$arr8['user_username'];
				$xyed=$arr8['xyed'];
				if($customer_id){
					$fff=M('wd_customer');
					$sdf=$fff->where("customer_id='$customer_id'")->find();
					$avatar=$sdf['avatar'];
					$wxusername=$sdf['username'];
				}else{
					$yanz='微信认证';
				}
				$user_id=$arr8['user_id'];
				$b=M('goods');
				$nums=$b->where("user_id='$user_id' and fk=1")->count();
				$sfzt=$arr8['sfzt'];
				if($sfzt=='1'){
					$kongxian='在线';
				}
				else if($sfzt=='3'){
					$kongxian='不在线';
				}
		}
		}
				$this->assign('wxusername',$wxusername);
				$this->assign('user_username',$user_username);
				$this->assign('username',$username);
				$this->assign('avatar',$avatar);
				$this->assign('xyed',$xyed);
				$this->assign('sfzt',$sfzt);
				$this->assign('kongxian',$kongxian);
				$this->assign('yuemoney',$yuemoney);
				$this->assign('nums',$nums);
				$this->assign('yue',$yue);
				$this->display();
		
		
	}
	public function yuer_tixian(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			$a=M('m_user');
			$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$yuemoney=$arr7['yuemoney'];
			$user_id=$arr7['user_id'];
			$user_username=$arr7['user_username'];
			$mysql=M('yinhang');
			$arr=$mysql->where("user_id='$user_id'")->select();
		}
			
			}
				$this->assign('arr',$arr);
				$this->assign('yuemoney',$yuemoney);
				$this->assign('user_username',$user_username);
				$this->display();
	}
	public function tijiaoshenqing(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
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
			$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$arr7['user_id'];
			$yuemoney=$arr7['yuemoney'];
			$post['user_id']=$user_id;
			$post['zta']=1;
			$post['txsq_time']=date('Y-m-d H:i:s', time());
			$mysql=M('tixianshenqing');
			$post['ddh']=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 7);
			$yzddh=$mysql->where("ddh='$ddh'")->find();
		  if($yzddh){
	$data['ddh']=$ddh=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 7);
			
			}
			
			$arr=$mysql->add($post);
			if($arr){
				$data['yuemoney']=($yuemoney-$amt);
				$arr4=$a->where("user_id='$user_id'")->save($data);
				if($arr4){
				header('location:'. __CONTROLLER__."/tixianxinxi");
			}
			}
		}
		}
	}
	public function balail_a(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$a=M('m_user');
		$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr7['user_id'];
		$mysql=M('yue');
		$arr=$mysql->where("user_id='$user_id'")->order('yue_id desc')->select();
		}
		}
		$this->assign('arr',$arr);
				$this->display();
	}
	public function quhuankuan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
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
		$arr8=$s->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$data['user_id']=$arr8['user_id'];
		$yixiaofei=$arr8['yixiaofei'];
		if(($yixiaofei-$money)<0){
			$this->error('超额');
		}
		$data['amount']=$money;
		$mysql=M('huankuan');
		
		$ddh=$data['ddh']=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 6);
		$yzddh=$mysql->where("ddh='$ddh'")->find();
		  if($yzddh){
		$data['ddh']=$ddh=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 7);
		}
		$data['hk_zt']=1;
		$data['u_title']='还款';
		$datae=$data['xd_time']=time();
		$dat=$datae-(60*60*24);
		$arr=$mysql->add($data);
		if($arr){
				$arr2=$mysql->where("id='$arr'")->find();
				$ddh=$arr2['ddh'];
				$arr3=$mysql->where("(xd_time < '$dat') and (hk_zt=1)")->delete();
			
			header('location:'.__MODULE__."/Payy/huankuana/ddh/{$ddh}");
		}
		}
	}
	}
	public function huankuan_tixian(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			$a=M('m_user');
			$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$yuemoney=$arr7['yuemoney'];
			$yixiaofei=$arr7['yixiaofei'];
			$user_id=$arr7['user_id'];
			$user_username=$arr7['user_username'];
			$mysql=M('yinhang');
			$arr=$mysql->where("user_id='$user_id'")->select();
			}
			
			}
				$this->assign('arr',$arr);
				$this->assign('yuemoney',$yuemoney);
				$this->assign('user_username',$user_username);
				$this->assign('yixiaofei',$yixiaofei);
				$this->display();
	
	}
	public function tixianxinxi(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$mysql=M('tixianshenqing');
		$username=$_COOKIE['username'];
		$a=M('m_user');
		$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr7['user_id'];
		$user_username=$arr7['user_username'];
		$arr2=$mysql->where("user_id='$user_id'")->select();
		if(!$arr2){
		$this->error('没有内容');
		}else{
		foreach ($arr2 as $k=>$v){
			$tixianshenqing_id.=','.$v['tixianshenqing_id'];
		}
		$tixianshenqing_id=substr($tixianshenqing_id,1);
		$arr=$mysql->join("yinhang on tixianshenqing.yinhang_id=yinhang.yinhang_id")->join("m_user on tixianshenqing.user_id=m_user.user_id")->where("zta in(1,2,3) and tixianshenqing_id in ($tixianshenqing_id)")->order('tixianshenqing_id desc')->select();
		//print_r($arr);die;
		}
		}
		}
		$this->assign('user_username',$user_username);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function yinhangtj(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			$a=M('m_user');
			$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$arr7['user_id'];
			$user_username=$arr7['user_username'];
			
		$post['kahao']=$kahao=I('post.kahao');
		$account_preg="/^(\d{16}|\d{19})$/";
		if(!preg_match($account_preg,$kahao)){
			$this->error('非法操作');
		}
		$post['yinhang_name']=addslashes(I('post.yinhang_name'));
		$post['user_id']=$user_id;
		$post['user_username']=$user_username;
		$mysql=M('yinhang');
		$arr=$mysql->add($post);
			if($arr){
			header('location:'. __CONTROLLER__."/yuer_tixian");
			}else{
			$this->error('添加失败');
			}
	}
	}
	}
	public function huishoudd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{//die;echo 
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		  $user_id=$arr1['user_id'];//die;echo
		$mysql=M('huishou');
		$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->where("user_id='$user_id' and zt='2'")->order('huishou_id desc')->select();
		$arr2=$mysql->where("user_id='$user_id' and zt='2'")->select();
		if($arr2){
			$nums1=count($arr2);
		}else{
			$nums1=0;
		}
		$arr3=$mysql->where("user_id='$user_id' and zt='3'")->select();
		if($arr3){
			$nums2=count($arr3);
		}else{
			$nums2=0;
		}
		$arr4=$mysql->where("user_id='$user_id' and zt='4'")->select();
		if($arr4){
			$nums3=count($arr4);
		}else{
			$nums3=0;
		}
		}
		}
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function huishoudd_a(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		  $user_id=$arr1['user_id'];//die;echo
		$mysql=M('huishou');
		$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->where("user_id='$user_id' and zt='2'")->order('huishou_id desc')->select();
		$arr2=$mysql->where("user_id='$user_id' and zt='2'")->select();
		if($arr2){
			$nums1=count($arr2);
		}
		$arr3=$mysql->where("user_id='$user_id' and zt='3'")->select();
		if($arr3){
			$nums2=count($arr3);
		}
		$arr4=$mysql->where("user_id='$user_id' and zt='4'")->select();
		if($arr4){
			$nums3=count($arr4);
		}
		}
		}
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function huishoudd_b(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		  $user_id=$arr1['user_id'];//die;echo
		$mysql=M('huishou');
		$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->where("user_id='$user_id' and zt='3'")->order('huishou_id desc')->select();
		$arr2=$mysql->where("user_id='$user_id' and zt='2'")->select();
		if($arr2){
			$nums1=count($arr2);
		}
		$arr3=$mysql->where("user_id='$user_id' and zt='3'")->select();
		if($arr3){
			$nums2=count($arr3);
		}
		$arr4=$mysql->where("user_id='$user_id' and zt='4'")->select();
		if($arr4){
			$nums3=count($arr4);
		}
		}
		}
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function huishoudd_c(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		  $user_id=$arr1['user_id'];//die;echo
		$mysql=M('huishou');
		$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->where("user_id='$user_id' and zt='4'")->order('huishou_id desc')->select();
		$arr2=$mysql->where("user_id='$user_id' and zt='2'")->select();
		if($arr2){
			$nums1=count($arr2);
		}
		$arr3=$mysql->where("user_id='$user_id' and zt='3'")->select();
		if($arr3){
			$nums2=count($arr3);
		}
		$arr4=$mysql->where("user_id='$user_id' and zt='4'")->select();
		if($arr4){
			$nums3=count($arr4);
		}
		}
		}
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function rciwse(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			$a=M('m_user');
			$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			//print_r($arr7);die;
			$user_id=$arr7['user_id'];
			$mysql=M('huishou');
			$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->where("user_id='$user_id' and zt='1'")->select();
			}
			}
			$this->assign('arr',$arr);
				$this->display();

		}
	public function hqajax(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
			$mysql=M('huishou');
			$huishou_id=I('post.huishou_id');//die;	echo 
			$post['zt']=2;
			$arru=$mysql->where("huishou_id='$huishou_id'")->save($post);
			//echo 1;die;
			if($arru){

			header("location:http://m.weibaishi.com/Home/Gouwuche/huishoudd");
			}
			}
			}

	}
	public function goumaichanpin(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		require_once APP_PATH.'Common/Cf/shifu.php';
		$mysql=M('maintenance_brand');
		
		$arr=$mysql->where("brand_zt='0'")->select();
		$sql=M('maintenance_model');
		$arr1=$sql->where("brand_id='1' and model_zt='0'")->select();
		$gh=M('chanpinku');
		$arr2=$gh->where("model_id=1 and sf='n' and cpk_zt='0'")->select();
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username' and sfzt in(1,2,3)")->find();
	
		$user_id=$arr8['user_id'];//die;ech
		$gw=M('gouwuche');
		$arr4=$gw->where("user_id in ($user_id)")->select();
		//print_r();die;
				if($arr4){
				foreach ($arr4 as $k=>$v){
						$nums.=','.$v['nums'];
				}
				if($nums){
				$nums=substr($nums,1);
				$nums=array_sum(explode(',',$nums));
				}
				}
				if(!$arr4){
					$nums=0;
				}
		}
		}
		$this->assign('nums',$nums);
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->assign('arr2',$arr2);
		$this->display();
	
	}
	public function yuefk(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$id=I('get.id');
		if($id){
			$t=0;
			$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr8['user_id'];
		$yuemoney=$arr8['yuemoney'];//die;echo 
		$mysql=M('dingdanhao');
		$arr=$mysql->where("id='$id'")->find();
		}
		$dd=I('get.dd');
			if($dd){
				$t=1;
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr8['user_id'];
		$yuemoney=$arr8['yuemoney'];//die;echo 
		$mysql=M('maichu');
		$arr=$mysql->where("id='$dd'")->find();
			
			}
		}
		}
		$this->assign('yuemoney',$yuemoney);
		$this->assign('t',$t);
		$this->assign('arr',$arr);
		$this->display();
	
	}
public function maichuyuequfukuan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$id=I('get.id');
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr8['user_id'];
		$yuemoney=$arr8['yuemoney'];//die;	echo 
		$mysql=M('maichu');
		$arr=$mysql->where("id='$id'")->find();
		 $amount=$arr['amount'];
		 $ddh=$arr['ddh'];
		$mai=$arr['mai'];
		$maifang=$arr['maifang'];
		$cangku_id=$arr['cangku_id'];
		$arr5=$s->where("user_name='$mai'")->find();
		$arr11=$s->where("user_name='$maifang'")->find();
		$user_idmaifang=$arr11['user_id'];
		$user_idmai=$arr5['user_id'];
		$yuemoneymai=$arr5['yuemoney'];
			if(($yuemoney-$amount)<0){
				$this->error('余额不足');
			}else{
			$post['yuemoney']=$yuemoney-$amount;
		$ar=$s->where("user_id='$user_id'")->save($post);
		if($ar){
			$mc['yuemoney']=$yuemoneymai+$amount;
			$arrmai=$s->where("user_id='$user_idmai'")->save($mc);
			if($arrmai){
			$ry=M('cangku');
			$gh['user_id']=$user_idmaifang;
			$gh['zta']=0;
			$arr90=$ry->where("cangku_id='$cangku_id'")->save($gh);
			if($arr90){
			$data['zt']=1;
			$data['zhifutype']=2;
			$aa=$mysql->where("id='$id'")->save($data);
				if($aa){
					$h=M('yue');
					$data['user_id']=$user_idmaifang;
					$data['yue_type']='购买配件(师傅)';
					$data['ddh']=$ddh;
					$data['jy_money']=-$amount;
					$data['jy_time']=date('Y-m-d H:i:s', time());
				$arrt=$h->add($data);
				if($arrt){
					$h=M('yue');
					$dat['user_id']=$user_idmai;
					$dat['yue_type']='卖出配件(师傅)';
					$dat['ddh']=$ddh;
					$dat['jy_money']='+'.$amount;
					$dat['jy_time']=date('Y-m-d H:i:s', time());
				$arrtt=$h->add($dat);
				if($arrtt){
			header('location:'.__CONTROLLER__.'/maichu_list');
			}
			}
		}
		}
		}
	}
	}
	}
	}
	}
	public function balail_b(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$a=M('m_user');
		$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr7['user_id'];
		$mysql=M('xinyong');
		$arr=$mysql->where("user_id='$user_id'")->order('xinyong_id desc')->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function yuequfukuan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$id=I('get.id');
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$s=M('m_user');
		$arr8=$s->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr8['user_id'];
		$yuemoney=$arr8['yuemoney'];
		$mysql=M('dingdanhao');
		$arr=$mysql->where("id='$id'")->find();
		$amount=$arr['amount'];
			if(($yuemoney-$amount)<0){
				$this->error('余额不足');
			}else{
			$post['yuemoney']=$yuemoney-$amount;
		$ar=$s->where("user_id='$user_id'")->save($post);
		
		if($ar){
			$data['fkzt']=1;
			$data['peijianzhifu_type']=2;
			$aa=$mysql->where("id='$id'")->save($data);
		if($aa){
			header('location:'.__CONTROLLER__.'/peijiandingdan');
			}
		}
	}
	}
	}
	}
	public function yuehuankuan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		 $id=I('get.id');	//die;//	echo
			$mysql=M('huankuan');
			$username=$_COOKIE['username'];
			$arr=$mysql->where("id='$id'")->find();
			$amo=$arr['amount'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
			$a=M('m_user');
			$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$yuem=($arr7['yuemoney']-$amo);
			if($yuem < 0 ){
				$this->error('余额不足');
			}else{
			$user_id=$arr7['user_id'];
			$yixiaofei=$arr7['yixiaofei'];
			$arr=$mysql->where("id='$id'")->find();
			$amount=$arr['amount'];
			$ddh=$arr['ddh'];
		$post['yuemoney']=$yuem;
			$post['yixiaofei']=($yixiaofei-$arr['amount']);
			$arr1=$a->where("user_id='$user_id'")->save($post);
			if($arr1){
				$data['hk_zt']=2;
				$data['hk_type']=1;
				$data['wc_time']=date('Y-m-d H:i:s', time());
				$arr9=$mysql->where("id='$id'")->save($data);
				if($arr9){
					$g=M('xinyong');
					$dat['user_id']=$user_id;
					$dat['xinyong_type']='还款';
					$dat['ddh']=$ddh;
					$dat['jy_money']='+'.$amount;
					$dat['jy_time']=date('Y-m-d H:i:s', time());
					$arrt=$g->add($dat);
					if($arrt){
						$h=M('yue');
					$dataa['user_id']=$user_id;
					$dataa['yue_type']='信用还款';
					$dataa['ddh']=$ddh;
					$dataa['jy_money']=-$amount;
					$dataa['jy_time']=date('Y-m-d H:i:s', time());
					$arrtt=$h->add($dataa);
						if($arrtt){
					header('location:'. __MODULE__."/Shifu/index");
						}
					}
				}
			}
		}
		}
		}
	}
	public function branda(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		require_once APP_PATH.'Common/Cf/shifu.php';
		$brand_id=I('get.brand_id');//die;echo
		$mysql=M('maintenance_brand');
		$arr=$mysql->select();
		$sql=M('maintenance_model');
		$arr1=$sql->where("brand_id='$brand_id' and model_zt='0'")->select();
		$arr7=$sql->where("brand_id='$brand_id'")->find();
			$model_id=$arr7['model_id'];
		$sele=M('chanpinku');
		$arr2=$sele->where("model_id='$model_id' and sf='n' and cpk_zt='0'")->select();
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username' and sfzt in(1,2,3)")->find();
	
		$user_id=$arr8['user_id'];//die;ech
		$gw=M('gouwuche');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				if($arr4){
				foreach ($arr4 as $k=>$v){
						$nums.=','.$v['nums'];
				}
				if($nums){
				$nums=substr($nums,1);
				$nums=array_sum(explode(',',$nums));
				}
				}
		}
		}
		$this->assign('nums',$nums);
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->assign('arr2',$arr2);
		$this->display();
	
	}
	public function chanpinajax(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		require_once APP_PATH.'Common/Cf/shifu.php';
		$model_id=I('get.model_id');
		$mysql=M('maintenance_brand');
		$arr=$mysql->select();
		$sql=M('maintenance_model');
		$arr1=$sql->where("brand_id='1' model_zt='0'")->select();
		$gh=M('chanpinku');
		$arr2=$gh->where("model_id='$model_id' and sf='n' and plan_zt='0'")->select();
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username' and sfzt in(1,2,3)")->find();
	
		$user_id=$arr8['user_id'];//die;ech
		$gw=M('gouwuche');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				if($arr4){
				foreach ($arr4 as $k=>$v){
						$nums.=','.$v['nums'];
				}
				if($nums){
				$nums=substr($nums,1);
				$nums=array_sum(explode(',',$nums));
				}
				}
				}
		}
		$this->assign('nums',$nums);
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->assign('arr2',$arr2);
		$this->display();
	
	}
	public function chanpinkuajax(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$model_id=I('get.model_id');
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sqll=M('m_user');
		$ar=$sqll->where("user_name='$username' and sfzt in(1,2,3)")->find();
		
			$gh=M('chanpinku');
			$arr2=$gh->where("model_id='$model_id' and sf='n' and cpk_zt='0'")->select();
			}
		}
		$this->assign('arr2',$arr2);
		$this->assign('arr3',$arr3);
		$this->display();
		
	}
	public function gwc(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		 $id=I('get.id');//echo//
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
	
		$user_id=$arr1['user_id'];//die;echo	
	
		$mysql=M('gouwuchea');
		$sqll=M('gouwuche');
		$arr=$mysql->where("cpk_id='$id' and user_id='$user_id'")->find();
		$us=M('chanpinku');
			$arr5=$us->where("cpk_id='$id'")->find();
		if($arr){
				$data['nums']=$arr['nums']+1;//die;	echo
				$data['gw_price']=$arr5['cpk_price']*$data['nums'];
				$r=$mysql->where("cpk_id='$id'")->save($data);
				if($r){
					$pos['gw_price']=$arr5['cpk_price'];
					$pos['gw_pricee']=$arr5['cpk_price'];
					$pos['modelid']=$arr5['model_id'];
					$pos['cpk_id']=$id;//die;echo
					$pos['user_id']=$user_id;
					$pos['nums']=1;
				for ($i = 1; $i <= 8; $i++) {
				 $rt.=(chr(rand(97, 122)));
				}
				$pos['skma']=$rt;
				$sqll->add($pos);
				
				}
		}else{
				$post['gw_price']=$arr5['cpk_price'];
				$post['gw_pricee']=$arr5['cpk_price'];
				$post['modelid']=$arr5['model_id'];
				$post['cpk_id']=$id;//die;echo
				$post['user_id']=$user_id;
				$post['nums']=1;
				for ($i = 1; $i <= 8; $i++) {
				 $rt.=(chr(rand(97, 122)));
				}
				$post['skma']=$rt;
				$t=$mysql->add($post);
				if($t){
				$postt['gw_price']=$arr5['cpk_price'];
				$postt['gw_pricee']=$arr5['cpk_price'];
				$postt['modelid']=$arr5['model_id'];
				$postt['cpk_id']=$id;//die;echo
				$postt['user_id']=$user_id;
				$postt['nums']=1;
				for ($i = 1; $i <= 8; $i++) {
				 $rt.=(chr(rand(97, 122)));
				}
				$postt['skma']=$rt;
				$sqll->add($postt);
				}
			
		}
		$gw=M('gouwuchea');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				foreach ($arr4 as $k=>$v){
						$nums.=','.$v['nums'];
				}
				$nums=substr($nums,1);
				$nums=array_sum(explode(',',$nums));
				echo $nums;
		}
		}
}
public function gouwuche(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
				require_once APP_PATH.'Common/Cf/shifu.php';
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$db=M('m_user');
		$arr=$db->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr['user_id'];
		$mysql=M('gouwuchea');
		$arr1=$mysql->join('chanpinku on gouwuchea.cpk_id=chanpinku.cpk_id')->where("user_id ='$user_id' ")->select();
		$gw=M('gouwuchea');
		$arr4=$gw->where("user_id='$user_id'")->select();
				
				foreach ($arr4 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				
				$gw_price=substr($gw_price,1);
				if($gw_price){
				$price=array_sum(explode(',',$gw_price));
				$zjg='总价格:';
				$qr='去结算';
				}
				if($price==''){
					$price=0;
				}
				$num='';
				foreach ($arr4 as $k=>$v){
						$num.=','.$v['nums'];
				}
				$num=substr($num,1);//die;echo 
				$num=array_sum(explode(',',$num));
				if($num==''){
					$num=0;
				}
			}
		}
		$this->assign('zjg',$zjg);
		$this->assign('qr',$qr);
		$this->assign('nums',$num);		
		$this->assign('price',$price);
		$this->assign('my',$my);
		$this->assign('arr1',$arr1);
		$this->display();
		
}
public function jia_number(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$id=I('get.id');
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$db=M('m_user');
		$arr=$db->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr['user_id'];
		$mysql=M('gouwuchea');
		$sqll=M('gouwuche');
		$tt=$mysql->where("gw_id='$id' and user_id='$user_id'")->find();
		$cpk_id=$tt['cpk_id'];
		$us=M('chanpinku');
		$arr5=$us->where("cpk_id='$cpk_id'")->find();
				//print_r($arr5);die;
				$postt['gw_price']=$arr5['cpk_price'];
				$postt['gw_pricee']=$arr5['cpk_price'];
				$postt['modelid']=$arr5['model_id'];
				$postt['cpk_id']=$cpk_id;//die;echo
				$postt['user_id']=$user_id;
				$postt['nums']=1;
				for ($i = 1; $i <= 8; $i++) {
				 $rt.=(chr(rand(97, 122)));
				}
				$postt['skma']=$rt;
				$f=$sqll->add($postt);
		if($f){
		$arr1=$mysql->where("gw_id ='$id' and user_id='$user_id'")->find();
		$post['nums']=$nums=$arr1['nums']+1;
	    $post['gw_price']=$nums*$arr1['gw_pricee'];
		$mysql->where("gw_id='$id' and user_id='$user_id'")->save($post);
		$arr4=$mysql->where("user_id='$user_id'")->select();
				foreach ($arr4 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				$gw_price=substr($gw_price,1);
				$price=array_sum(explode(',',$gw_price));
			$number_price['price']=$price;
			$number_price['nums']=$nums;

				if($arr4){
				foreach ($arr4 as $k=>$v){
						$gwnums.=','.$v['nums'];
				}
			
				$gwnums=substr($gwnums,1);
				$gwnums=array_sum(explode(',',$gwnums));
				}
		
		$number_price['gwnums']=$gwnums;
		$data = array(
			'gwnums'=>$number_price['gwnums'],
            'price'=>$number_price['price'],
            'nums'=>$number_price['nums'],
            );
				//print_r($data);die;
			echo json_encode($data);
		}
		}
		}
}
public function jian_number(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$id=I('get.id');//die;echo 
		$mysql=M('gouwuchea');
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$db=M('m_user');
		$arr=$db->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr['user_id'];
		$arr1=$mysql->where("gw_id ='$id' and user_id='$user_id'")->find();
		$nums=$post['nums']=$arr1['nums']-1;
		if($nums<=0){
			$nums=$post['nums']=1;
		}else{
	    $post['gw_price']=$nums*$arr1['gw_pricee'];
		$cpkid=$arr1['cpk_id'];
		$mysqll=M('gouwuche');
		$ff=$mysqll->where("cpk_id='$cpkid' and user_id='$user_id'")->find();
		$hhid=$ff['gw_id'];
		$rt=$mysqll->where("gw_id='$hhid' and user_id='$user_id'")->delete();
			if($rt){
		$g=$mysql->where("gw_id='$id'")->save($post);
			$arr4=$mysql->where("user_id='$user_id'")->select();
				foreach ($arr4 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				
				$gw_price=substr($gw_price,1);
				$price=array_sum(explode(',',$gw_price));
			$number_price['price']=$price;
			$number_price['nums']=$nums;
			
		
				if($arr4){
				foreach ($arr4 as $k=>$v){
						$gwnums.=','.$v['nums'];
				}
				
				$gwnums=substr($gwnums,1);
				$gwnums=array_sum(explode(',',$gwnums));
				}
		$number_price['gwnums']=$gwnums;
		$data = array(
			'gwnums'=>$number_price['gwnums'],
            'price'=>$number_price['price'],
            'nums'=>$number_price['nums'],
            );

			echo json_encode($data);
		
			}	
		}
		}
	}
	}
	public function gouwucheajax(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$db=M('m_user');
		$arr=$db->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr['user_id'];
		 $id=I('get.id');
		$mysql=M('gouwuchea');
		$sql=M('gouwuche');
		$arr2=$mysql->where("gw_id='$id'")->find();
			$cpk_id=$arr2['cpk_id'];
		$arr3=$sql->where("cpk_id='$cpk_id' and user_id='$user_id'")->delete();
		if($arr3){
		$arr5=$mysql->where("gw_id='$id' and user_id='$user_id'")->delete();
		if($arr5){
		
		$mysql=M('gouwuchea');
		$arr1=$mysql->join('chanpinku on gouwuchea.cpk_id=chanpinku.cpk_id')->where("user_id ='$user_id'")->select();
		$gw=M('gouwuchea');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				foreach ($arr4 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				$gw_price=substr($gw_price,1);
				
				if($gw_price){
				$price=array_sum(explode(',',$gw_price));
				$zjg='总价格:';
				$qr='去结算';
				}
		}
		}
		}
		}
		$this->assign('zjg',$zjg);
		$this->assign('qr',$qr);
		$this->assign('price',$price);
		$this->assign('arr1',$arr1);
		$this->display();
	}
	public function querendingdan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$mysql=M('peijianfangshi');
		$arr=$mysql->select();
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_username=$arr1['user_username'];

		$user_id=$arr1['user_id'];
		$ways1='上门';
		$ways2='自取';
		$ways3='邮寄';
		//$ways_id=I('get.id');
		$sqq=M('city');
		//echo $ways_id;die;//
		$arr4=$sqq->where("parent_id=1")->select();
		//print_r($arr4);die;
		$mysqll=M('jxzx');
		$arr5=$mysqll->select();
		//print_r($arr);die;//
		$my=M('gouwuche');
		$arr6=$my->join('chanpinku on gouwuche.cpk_id=chanpinku.cpk_id')->where("user_id ='$user_id'")->select();
			
		foreach ($arr6 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				$gw_price=substr($gw_price,1);
				$price=array_sum(explode(',',$gw_price));
				}
		}
	
		$this->assign('arr',$arr);
		$this->assign('arr2',$arr2);
		$this->assign('price',$price);
		$this->assign('arr4',$arr4);
		$this->assign('arr5',$arr5);
		$this->assign('arr6',$arr6);
		$this->assign('username',$username);
		$this->assign('user_username',$user_username);
		$this->assign('ways1',$ways1);
		$this->assign('ways2',$ways2);
		$this->assign('ways3',$ways3);
		$this->display();
	}
	public function peijian_xiangq(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			 $id=I('get.id');//die;echo
			$mysql=M('ddxxb');
			$arr1=$mysql
				->where("dingdanhaoid='$id'")->select();
			//print_r($arr1);die;
			$ddxx_id='';
			foreach ($arr1 as $k=>$v){
				$ddxx_id.=','.$v['ddxx_id'];
			}
			$ddxx_id=substr($ddxx_id,1);//die;echo 
			
			$arr=$mysql
				->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->where("ddxx_id in($ddxx_id)")->select();
			$sql=M('dingdanhao');
			$arr2=$sql->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id='$id'")->find();
			$fkzt=$arr2['fkzt'];
				if($fkzt==0){
				$qfk='去付款';
				}
				
		}
		}
		$this->assign('qfk',$qfk);
		$this->assign('arr2',$arr2);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function youji(){
		$ways_id=I('get.id');
		$sqq=M('city');
		//echo $ways_id;die;//
	$arr4=$sqq->where("parent_id=1")->select();
	//print_r($arr4);die;
	$mysql=M('jxzx');
	$arr=$mysql->select();
		//print_r($arr);die;//
		$this->assign('arr4',$arr4);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function shi(){
		$id=I('get.id');
		//echo $id;die;
		$sqq=M('city');
		$arr=$sqq->where("parent_id='$id'")->select();
		$this->assign('arr',$arr);
		$this->display();
	}
	public function qu(){
		$id=I('get.id');
		//echo $id;die;
		$sqq=M('city');
		$arr=$sqq->where("parent_id='$id'")->select();
		//print_r($arr);
		$this->assign('arr',$arr);
		$this->display();
	}
public function daodian(){
	$ways_id=I('get.id');
	$mysql=M('wxzx');
	$arr=$mysql->select();
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	}
	public function shangmen(){
		$ways_id=I('get.id');
		$sqq=M('city');
		//echo $ways_id;die;//
		$arr4=$sqq->where("parent_id=1")->select();
		//print_r($arr4);die;
		//$mysql=M('wxzx');
	//	$arr=$mysql->where("ways_id='$ways_id'")->select();
		//print_r($arr);die;//
		$this->assign('arr4',$arr4);
		//$this->assign('arr',$arr);
		$this->display();
	
	}
	public function addorder(){
		//if (!$User->autoCheckToken($_POST)){ // 令牌验证错误 
		//	$this->error('不可以重复提交');
		
		//}
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
			//print_r($_POST);die;
			$sheng=I('post.sheng');
			$shi=I('post.shi');
			$qu=I('post.qu');
			$ways_id=I('post.ways_id');
			$mysql=M('city');
			$r=$sheng.','.$shi.','.$qu;
			if($qu){
			$arr1=$mysql->where("region_id in($r)")->select();
			//print_r($arr1);die;//
			$ss='';
			foreach ($arr1 as $k=>$v){
				$ss.=','.$v['region_name'];
			}
			$ss=substr($ss,1);
			}
			$data['note']=I('post.u_note','','trim');
			$data['ways_id']=$ways_id=I('post.ways_id','','trim');
			if($ways_id==1){
				$data['smwx_id']=1;
			}
			$data['jxzx_id']=I('post.jxzx_id');
			//$data['smzx_id']=I('post.wxzx_id','','trim');
			$address=I('post.address');//=
			if($address){
			$data['shangmendizhi']=$ss.','.$address;
			
			}
			//echo 1;die;
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$my=M('gouwuche');
		$mysql=M('dingdanhao');
		
		$arr6=$my->join('chanpinku on gouwuche.cpk_id=chanpinku.cpk_id')->where("user_id ='$user_id'")->select();
		
		$a=count($arr6);
		
		$data['ddh']=$ddh=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 7);
		$yzddh=$mysql->where("ddh='$ddh'")->find();
		  if($yzddh){
	$data['ddh']=$ddh=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 7);
			
			}
	
			
		foreach ($arr6 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				$gw_price=substr($gw_price,1);
				$price=array_sum(explode(',',$gw_price));//die;echo
		$data['xd_time']=date('Y-m-d H:i:s', time());
		$data['amount']=$price;
		$data['u_title']='手机配件';
		$data['fkzt']=0;
		$data['user_id']=$user_id;
		
		$arr2=$mysql->add($data);
		//echo 2;die;
		if($arr2){
			$my=M('gouwuche');
			$arr6=$my->where("user_id ='$user_id'")->select();
		 ///echodie;echodie;/
			foreach ($arr6 as $k=>$v){
				$cpkid.=','.$v['cpk_id'];//echo 	dIE;
				$useid.=','.$v['user_id'];
				$nums.=','.$v['nums'];
				$zprice.=','.$v['gw_price'];
				$dprice.=','.$v['gw_pricee'];
				//
				$modelid.=','.$v['modelid'];
				$skma.=','.$v['skma'];
				//$gwid.=','.$v['gw_id'];
			}
			//echo '2';die;	ECHODIE;	
				$cpkid=substr($cpkid,1);
				$cpkid=explode(',',$cpkid);
				
				 $useid=substr($useid,1);
				$useid=explode(',',$useid);
				
				 $nums=substr($nums,1);
				$nums=explode(',',$nums);
				
				 $zprice=substr($zprice,1);//die;echo 
				$zprice=explode(',',$zprice);
				
				$dprice=substr($dprice,1);	//echo 
				$dprice=explode(',',$dprice);

				$modelid=substr($modelid,1);
				$modelid=explode(',',$modelid);
				 $skma=substr($skma,1);
				$skma=explode(',',$skma);
				 $a=count($arr6);
				for($i=0;$i<$a;$i++){
				$cpk_id=$cpkid[$i];//DIE;ECHO 	
					$use_id=$useid[$i];
					 $n_ums=$nums[$i];
					$z_price=$zprice[$i];
					 $dp_rice=$dprice[$i];
					$model_id=$modelid[$i];
					$sk_ma=$skma[$i];
$ee[]=array('cpk_id'=>$cpk_id,'use_id'=>$use_id,'dd_nums'=>$n_ums,'z_price'=>$z_price,'d_price'=>$dp_rice,'modelidd'=>$model_id,'skm'=>$sk_ma,'dingdanhaoid'=>$arr2,);
				}
				
				$db=M('ddxxb');
				$db->addAll($ee);
				if($db){
				//	echo 3;die;
				$my=M('gouwuche');
							$ass=$my->join('chanpinku on gouwuche.cpk_id=chanpinku.cpk_id')->where("user_id ='$user_id'")->select();
							foreach ($ass as $k=>$v){
								$gw_id.=','.$v['gw_id'];
								
								
							}
									$gw_id=substr($gw_id,1);
									
						$myy=M('gouwuchea');
						$ghj=$myy->where("user_id='$user_id'")->select();
						foreach ($ghj as $k=>$v){
								$gww_id.=','.$v['gw_id'];
								
							}
							$gww_id=substr($gww_id,1);
							//	echo 4;die;
							$dd=$myy->where("gw_id in($gww_id)")->delete();
						if($dd){
							
						$rf=$my->where("gw_id in($gw_id)")->delete();
					if($rf){
						//
						$mysql=M('dingdanhao');
						$sd=$mysql->where("id='$arr2'")->find();
						$ddh=$sd['ddh'];
						header('location:'.__MODULE__."/Payy/peijian/ddh/{$ddh}");
						}
			
						
					
				 }
	}
	}
	}
	}
	}
	public function peijiandingdan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		require_once APP_PATH.'Common/Cf/shifu.php';
		
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$myy=M('dingdanhao');
		$arr9=$myy->where("user_id ='$user_id'")->find();
		if(!$arr9){
			$arr5=$myy->where("user_id ='$user_id'")->find();
		}else{
		$arr5=$myy->where("user_id ='$user_id'")->select();
		foreach ($arr5 as $k=>$v){
			$id.=','.$v['id'];
		}
		$id=substr($id,1);
			$arr9=$myy->where("id in($id) and fkzt=0")->select();
		if($arr9){
			$nums1=count($arr9);
		}else{
			$nums1=0;
		}
		$arr7=$myy->where("id in($id) and fkzt='1'")->select();
		if($arr7){
			$nums2=count($arr7);
		}else{
			$nums2=0;
		}
		$arr8=$myy->where("id in($id) and fkzt='2'")->select();
		if($arr8){
			$nums3=count($arr8);
		}else{
			$nums3=0;
		}
		if(!$id){
			$arr6=$myy->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			//	->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
				->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id='$id'")->select();
		http://m.weibaishi.com/Admin/index/index
		}else{
		$arr6=$myy->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			//->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
			->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id in($id) and fkzt=0")->select();
			
		}
		$arr9=$myy->where("id in($id) and fkzt=0")->select();
		if($arr9){
			$nums1=count($arr9);
		}else{
			$nums1=0;
		}
		$arr7=$myy->where("id in($id) and fkzt='1'")->select();
		if($arr7){
			$nums2=count($arr7);
		}else{
			$nums2=0;
		}
		$arr8=$myy->where("id in($id) and fkzt='2'")->select();
		if($arr8){
			$nums3=count($arr8);
		}else{
			$nums3=0;
		}
		
		foreach ($arr6 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
		}
		}
		}
			
		$shanchu='删除';
		$this->assign('shanchu',$shanchu);
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function xinyongedu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			//print_r($_GET);die;
		 $id=I('get.id');
		 if($id){
		 $t=0;
		 $username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$xyed=$arr1['xyed']-$arr1['yixiaofei'];
		

		$mysql=M('dingdanhao');
		$arr=$mysql->where("id='$id'")->find();
		 }
		 $dd=I('get.dd');
		 if($dd){
			$t=1;
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$xyed=$arr1['xyed']-$arr1['yixiaofei'];
		

		$mysql=M('maichu');
		$arr=$mysql->where("id='$dd'")->find();
		 }
		
		}
		}
		$this->assign('arr',$arr);
		$this->assign('t',$t);
		$this->assign('xyed',$xyed);
		$this->display();
	}
	public function maichufukuan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$id=I('get.id');//die;	echo
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$xyed=$arr1['xyed'];
		$mysql=M('maichu');
		$arr=$mysql->where("id='$id'")->find();
		$mai=$arr['mai'];
		$ddh=$arr['ddh'];
		$amount=$arr['amount'];
		$maifang=$arr['maifang'];
		$cangku_id=$arr['cangku_id'];
		$arr6=$sql->where("user_name='$maifang'")->find();
		$user_idmaifang=$arr6['user_id'];
		$arr5=$sql->where("user_name='$mai'")->find();
		$user_idmai=$arr5['user_id'];
		$yuemoney=$arr5['yuemoney'];
		$post['yixiaofei']=$arr['amount']+$arr1['yixiaofei'];//die;	echo 
		if($xyed-$post['yixiaofei']<0){
			$this->error('余额不足');
		}
		$ar=$sql->where("user_id='$user_id'")->save($post);
		if($ar){
			$data['zt']=1;
			$data['zhifutype']=3;
			$aa=$mysql->where("id='$id'")->save($data);
		if($aa){
			$rt['yuemoney']=$yuemoney+$arr['amount'];
			$arrt=$sql->where("user_id='$user_idmai'")->save($rt);
			if($arrt){
				$ct=M('cangku');
				$crr['user_id']=$user_idmaifang;
				$crr['zta']=0;
				$arr77=$ct->where("cangku_id='$cangku_id'")->save($crr);
				if($arr77){
					$h=M('xinyong');
					$da['user_id']=$user_idmaifang;
					$da['xinyong_type']='购买配件(师傅)';
					$da['ddh']=$ddh;
					$da['jy_money']=-$amount;
					$da['jy_time']=date('Y-m-d H:i:s', time());
					$at=$h->add($da);
						if($at){
					$hd=M('yue');
					$dad['user_id']=$user_idmai;
					$dad['yue_type']='卖出配件(师傅)';
					$dad['ddh']=$ddh;
					$dad['jy_money']='+'.$amount;
					$dad['jy_time']=date('Y-m-d H:i:s', time());
					$atd=$hd->add($dad);
					if($atd){
					header('location:'.__CONTROLLER__.'/maichu_list');
					}
				}
			}
			}
		}
		}
		}
		}
}
	public function fukuan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$id=I('get.id');//die;	echo
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$xyed=$arr1['xyed'];
		$mysql=M('dingdanhao');
		$arr=$mysql->where("id='$id'")->find();
		$post['yixiaofei']=$arr['amount']+$arr1['yixiaofei'];//die;	echo 
		if($xyed-$post['yixiaofei']<0){
			$this->error('余额不足');
		}
		$ar=$sql->where("user_id='$user_id'")->save($post);
		//echo '1';die;
		if($ar){
			//echo $id;die;
			$data['fkzt']=1;
			$data['peijianzhifu_type']=3;
			$aa=$mysql->where("id='$id'")->save($data);
		if($aa){
	
			header('location:'.__CONTROLLER__.'/peijiandingdan');
			}
		}
		}
		}
}

public function wfk(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$fkzt=I('get.fkzt');
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$my=M('dingdanhao');
		$arru=$my->where("fkzt='$fkzt' and user_id='$user_id'")->find();
		if(!$arru){
			$arro=$my->where("fkzt='$fkzt' and user_id='$user_id'")->find();			

		}else{
		$arro=$my->where("fkzt='$fkzt' and user_id='$user_id'")->select();
		foreach ($arro as $k=>$v){
			$id.=','.$v['id'];
		}
	
		$id=substr($id,1);//die;echo 
		if(!$id){
		$arr6=$my->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id='$id' ")->select();
		$arr9=$my->where("id in($id)")->select();
			if($arr9){
			$nums1=count($arr9);
			}else{
			$nums1=0;			
			}
		$arr7=$my->where("id in($id) and fkzt='1'")->select();
		if($arr7){
			$nums2=count($arr7);
		}else{
			$nums2=0;			
		}
		$arr8=$my->where("id in($id) and fkzt='2'")->select();
		if($arr8){
			$nums3=count($arr8);
		}else{
			$nums3=0;			
		}
		}else{
		$arr6=$my->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			//->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
			->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id in($id)")->select();
			
				$arr9=$my->where("id in($id) and fkzt='0'")->select();
			if($arr9){
			$nums1=count($arr9);
			}else{
			$nums1=0;			
			}
		$arr7=$my->where("id in($id) and fkzt='1'")->select();
		if($arr7){
			$nums2=count($arr7);
		}else{
			$nums2=0;			
		}
		$arr8=$my->where("id in($id) and fkzt='2'")->select();
		if($arr8){
			$nums3=count($arr8);
		}else{
			$nums3=0;			
		}
		
		
		}
		foreach ($arr6 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
		
		if($fkzt==0){
			$name='未付款';
			$shanchu='删除';
		}else if($fkzt==1){
			$name='已付款';
		}else if($fkzt==2){
			$name='已完成';
		}
		}
		}
		}
		//print_r($arr6);die;
		$this->assign('shanchu',$shanchu);
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('name',$name);
		$this->assign('arr',$arr);
		$this->display();
	}
	
	
	public function cangkua(){
		header("Content-type: text/html; charset=utf-8");
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$db=M('cangku');
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$arr33=$db->where("user_id='$user_id' and zta='0'")->find();
		if(!$arr33){
			$arr6=$db->where("user_id='$user_id' and zta='0'")->find();
		}else{
			$arr6=$db->where("user_id='$user_id'  and zta='0'")->select();
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
	public function changk_xq(){
		
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$cpk_id=I('get.cpk_id');//die;echo 
		$db=M('cangku');
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$arr6=$db->where("user_id='$user_id' and zta='0'")->select();
		if(!$arr6){
			$this->error('没有产品请购买');
		}
		$mysql=M('chanpinku');
		
		$arr5=$db->where("user_id='$user_id' and cpk_id in ($cpk_id) and zta='0'")->select();
			 $cangku_id='';
		foreach($arr5 as $k=>$v){
		  $cangku_id.=','.$v['cangku_id'];
		
		}
	 $cangku_id=substr($cangku_id,1);//die;echo 	
		 $arr10=$db->join("chanpinku on cangku.cpk_id=chanpinku.cpk_id")->where("cangku_id in($cangku_id) and zta='0'")->select();
		}
		}
		//print_r($arr10);die;
		$this->assign('arr10',$arr10);
		$this->display();
	
	}
	
	public function maichu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8"); 
		$cangku_id=I('cangku_id');	//die;echo 	
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$mysql=M('cangku');
		$arr=$mysql->join("chanpinku on cangku.cpk_id=chanpinku.cpk_id")->where("cangku_id='$cangku_id'")->find();
		//print_r($arr);die;
		$cpk_name=$arr['cpk_name'];
		$cangku_name=$arr['cangku_name'];
		$cpk_price=$arr['cpk_price'];
		$cpk_id=$arr['cpk_id'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_name=$arr1['user_name'];
		$user_id=$arr1['user_id'];
		}
		}
		$this->assign('user_name',$user_name);
		$this->assign('user_id',$user_id);
		$this->assign('cpk_name',$cpk_name);
		$this->assign('cangku_name',$cangku_name);
		$this->assign('cpk_price',$cpk_price);
		$this->assign('cpk_id',$cpk_id);
		$this->assign('cangku_id',$cangku_id);
		$this->display();	
	}
	public function maichu_list(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		 $zt=I('get.zt');///die;echo
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		 $user_id=$arr1['user_id'];//die;echo
		$mysql=M('maichu');
		$arr=$mysql->join("chanpinku on maichu.cpk_id=chanpinku.cpk_id")->where("mai='$username' and zt='0'")->order('id desc')->select();
		//print_r($arr);die;
		if($arr){
			$nums1=$mysql->where("mai='$username' and zt='0'")->count();
		}else{
		$nums1=0;
		}
		$arr1=$mysql->where("mai='$username' and zt='1'")->select();
		if($arr1){
		$nums2=$mysql->where("mai='$username' and zt='1'")->count();
			}else{
		$nums2=0;
		}
		$arr3=$mysql->where("maifang='$username' and zt in(0,1)")->count();
			if($arr3){
		 $nums3=$mysql->where("maifang='$username' and zt in(0,1)")->count();
			}else{
			$nums3=0;
		}
		}
		}
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function maichuadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$tell=I('post.tell');//die;echo 
		$sqll=M('m_user');
		$arr67=$sqll->where("user_name='$tell'")->find();
		if(!$arr67){
			$this->error('无效买家');
		}else{
			$post['maifang']=$tell;
		$post['cpk_id']=I('post.cpk_id');
		$post['amount']=I('post.amount');
		$post['mai']=I('post.user_name');
		$post['cangku_name']=I('post.cangku_name');//die;echo
		$post['cangku_id']=$cangku_id=I('post.cangku_id');
		$user_idmai=I('post.user_id');
		$ddh=$post['ddh']=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
		$mysql=M('maichu');
		$yzddh=$mysql->where("ddh='$ddh'")->find();
		  if($yzddh){
	$post['ddh']=$ddh=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 7);
			
			}
		$post['time']=date('Y-m-d H',time());
		$post['zt']=0;
		$post['u_title']='购买配件';
		
		$sqll=M('m_user');
		$arr2=$sqll->where("user_name='$tell'")->find();
		$user_id=$arr2['user_id'];
		$arr=$mysql->add($post);
		if($arr){
			$sql=M('cangku');
			$data['zta']=5;
			$arr1=$sql->where("cangku_id='$cangku_id'")->save($data);
			if($arr1){
			header('location:'.__CONTROLLER__.'/maichu_list');
		}
		}
		}
	}
	}
	}
	public function maichu_a(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		 $zt=I('get.zt');//die;echo
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		 $user_id=$arr1['user_id'];//die;echo
		$mysql=M('maichu');
		$arr=$mysql->join("chanpinku on maichu.cpk_id=chanpinku.cpk_id")->where("mai='$username' and zt='0'")->order('id desc')->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function maichu_b(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{//die;echo 
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		 $user_id=$arr1['user_id'];//die;echo
		$mysql=M('maichu');
		$arr=$mysql->join("chanpinku on maichu.cpk_id=chanpinku.cpk_id")->where(" mai='$username' and zt ='1'")->order('id desc')->select();
		//print_r($arr);die;
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function maichu_c(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		 $user_id=$arr1['user_id'];//die;echo
		$mysql=M('maichu');
		//$zt=;
		$arr=$mysql->join("chanpinku on maichu.cpk_id=chanpinku.cpk_id")->where("maifang='$username' and zt in(0,1)")->order('id desc')->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function quxiaomaichu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			$id=I('get.id');
			$cangku_id=I('get.cangku_id');

			$mysql=M('maichu');
			$sql=M('cangku');
			$post['zta']=0;
			$arr=$sql->where("cangku_id='$cangku_id'")->save($post);
			if($arr){
				$arr1=$mysql->where("id='$id'")->delete();
				if($arr1){
					header('location:'.__CONTROLLER__.'/maichu_list');
				}
			}
		}
		}
	}
	public function tuihuo(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$cangku_id=I('post.cangku_id');
		$mysql=M('cangku');
		$arr=$mysql->where("cangku_id='$cangku_id'")->find();
		$post['cpk_id']=$arr['cpk_id'];//dieecho 
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$user_username=$arr1['user_username'];
		$sqll=M('tuihuo');
		$ddh=$post['ddh']=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
		$yzddh=$sqll->where("ddh='$ddh'")->find();
		  if($yzddh){
		$post['ddh']=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 7);
			
			}
		$post['time']=date('Y-m-d H',time());
		$post['cangku_id']=$cangku_id;
		$post['tuihuouser']=$username;
		$post['username']=$user_username;
		$post['zt']=0;
		
		$arru=$sqll->add($post);
		if($arru){
			$fg['zta']=1;
			$arry=$mysql->where("cangku_id='$cangku_id'")->save($fg);
			if($arry){
			header('location:'.__CONTROLLER__.'/tuihuo_list');
		}
		}
		}
		}
	}
	public function tuihuoshanchu(){
			$id=I('get.id');//die;echo 
			$mysql=M('tuihuo');
			$arr=$mysql->where("tuihuo_id='$id'")->find();
			$cangku_id=$arr['cangku_id'];//die;echo 
			$sql=M('cangku');
			$post['zta']=0;
			$arr1=$sql->where("cangku_id='$cangku_id'")->save($post);
			if($arr1){
			$arr2=$mysql->where("tuihuo_id='$id'")->delete();
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		 $user_id=$arr1['user_id'];//die;echo
		$mysql=M('tuihuo');
		$arr=$mysql->join("chanpinku on tuihuo.cpk_id=chanpinku.cpk_id")->where("tuihuouser='$username' and zt='0'")->order('tuihuo_id desc')->select();
		$arr5=$mysql->where("tuihuouser='$username' and zt='0'")->select();
		if($arr5){
		$nums1=count($arr5);
		}else{
		$nums1=0;
		}
		$arr6=$mysql->where("tuihuouser='$username' and zt='1'")->select();
		if($arr6){
		$nums2=count($arr6);
		}else{
		$nums2=0;
		}
		$arr7=$mysql->where("tuihuouser='$username' and zt='2'")->select();
		if($arr7){
		$nums3=count($arr7);
		}else{
		$nums3=0;
		}
		}
		}
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('arr',$arr);
		$this->display();
			
	
	}
	public function tuihuo_list(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		 $user_id=$arr1['user_id'];//die;echo
		$mysql=M('tuihuo');
		$arr=$mysql->join("chanpinku on tuihuo.cpk_id=chanpinku.cpk_id")->where("tuihuouser='$username' and zt='0'")->order('tuihuo_id desc')->select();
		$arr5=$mysql->where("tuihuouser='$username' and zt='0'")->select();
		if($arr5){
		$nums1=count($arr5);
		}else{
		$nums1=0;
		}
		$arr6=$mysql->where("tuihuouser='$username' and zt='1'")->select();
		if($arr6){
		$nums2=count($arr6);
		}else{
		$nums2=0;
		}
		$arr7=$mysql->where("tuihuouser='$username' and zt='2'")->select();
		if($arr7){
		$nums3=count($arr7);
		}else{
		$nums3=0;
		}
		}
		}
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function tui_a(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{ 
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		 $user_id=$arr1['user_id'];//die;echo
		$mysql=M('tuihuo');
		$arr=$mysql->join("chanpinku on tuihuo.cpk_id=chanpinku.cpk_id")->where("tuihuouser='$username' and zt='0'")->order('tuihuo_id desc')->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function tui_b(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		 $user_id=$arr1['user_id'];//die;echo
		$mysql=M('tuihuo');
		$arr=$mysql->join("chanpinku on tuihuo.cpk_id=chanpinku.cpk_id")->where("tuihuouser='$username' and zt='1'")->order('tuihuo_id desc')->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function tui_c(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		 $user_id=$arr1['user_id'];//die;echo
		$mysql=M('tuihuo');
		$arr=$mysql->join("chanpinku on tuihuo.cpk_id=chanpinku.cpk_id")->where("tuihuouser='$username' and zt='2'")->order('tuihuo_id desc')->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function baosunadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$cangku_id=I('cangku_id');//die;echo //
		 $mysql=M('cangku');
		 $post['time']=date('Y-m-d H',time());
		 $post['zta']=15;
		 $arr=$mysql->where("cangku_id='$cangku_id'")->save($post);
		 if($arr){
			header('location:'.__CONTROLLER__.'/baosun');
		 }
	}
	}
	}
	public function baosun(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		 $mysql=M('cangku');
		 $arr=$mysql->join("chanpinku on cangku.cpk_id=chanpinku.cpk_id")->where("zta='15' and user_id='$user_id'")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function pingpai(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		  $brandid=I('get.brand_id');//die;echo 
		$db=M('cangku');
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$arr6=$db->where("user_id='$user_id' and zta='0'")->select();
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
	public function quan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$model_id=I('get.model_id');
		$db=M('cangku');
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$arr6=$db->where("user_id='$user_id'")->select();
		//print_r($arr6);die;
		}
		}
		$this->assign('arr4',$arr4);
		$this->display();

	}
	public function peijian(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$db=M('cangku');
		$model_id=I('get.model_id');
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$arr6=$db->where("user_id='$user_id'")->select();
		//$cpk_id='';
		foreach ($arr6 as $v=>$k) {
		   $cpk_id.=','.$k['cpk_id'];
		}
	$cpk_id=substr($cpk_id,1);//echo 	echo	die;die;
		$mysql=M('chanpinku');
		$my=M('maintenance_model');
		$arr3=$my->where("model_id in ($model_id)")->select();
		//print_r($arr3);die;
		
		foreach ($arr3 as $v=>$k) {
		   $brand_id.=','.$k['brand_id'];
		}
			 $brand_id=substr($brand_id,1);
		$m=M('maintenance_brand');
		$arr4=$m->where("brand_id='$brand_id'")->select();	
		$arr=$mysql->where("cpk_id in($cpk_id) and model_id='$model_id'")->select();
		foreach($arr as $k=>$v){
		  $cpk_id=$v['cpk_id'];
		$arr2=$db->where("user_id='$user_id' and cpk_id in ($cpk_id)")->select();
			$arr[$k]['data']=$arr2;
		}
		foreach ($arr2 as $v=>$k) {
		   $numss.=','.$k['numss'];
		}
		
		$numss=substr($numss,1);
		$numss=array_sum(explode(',',$numss));
		}
		}
		$this->assign('numss',$numss);
		$this->assign('arr3',$arr3);
		$this->assign('arr',$arr);
		$this->assign('arr4',$arr4);
		$this->display();
	

}
}
?>