<?php
namespace Admin\Controller;
use Think\Controller;
class GuanlishifuController extends Controller {
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
			$mysql=M('dingdanhao');
			$arr1=$mysql->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("fkzt=1")->select();
			//print_r($arr1);die;
			if(!$arr1){
			$a='没有订单';
			}
			foreach ($arr1 as $row) {
		    $arr[$row['ddh']][] = $row;
			}
		}
		}
			$this->assign('arr',$arr);
			$this->assign('a',$a);
			$this->display();
	}

	public function beizhu(){
			if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		require_once APP_PATH.'Common/Cf/shifu.php';
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
		header('location:'.__CONTROLLER__.'/login');
		}else{
		$post['content']=$content=I('post.content');
		$huishou_id=I('post.huishou_id');
		$mysql=M('huishou');
		$arr=$mysql->where("huishou_id='$huishou_id'")->save($post);
		if($arr){
		echo $content;
		}
		}
		}
	}
	
		public function shifutuihuo(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			header("Content-type: text/html; charset=utf-8"); 
			$mysql=M('cangku');
			//$arr2=$mysql->where("zt='0'")->select();
			
			//$tuihuo_id='';
			//foreach($arr2 as $k=>$v){
				//$tuihuo_id.=','.$v['tuihuo_id'];
		//	}
			$tuihuo_id=substr($tuihuo_id,1);//die;echo 
			$arr=$mysql->join("chanpinku on cangku.cpk_id=chanpinku.cpk_id")->join("tuihuo on cangku.cangku_id=tuihuo.cangku_id")->join("m_user on cangku.user_id=m_user.user_id")->where("zt='0'")->order("tuihuo_id desc")->select();
		//	print_r($arr);die;
			if($arr){
				$tg='审核通过';
				$btg='审核不通过';
				$ywc='已完成';
				$sb='失败';
			}
			}
			}
			$this->assign('tg',$tg);
			$this->assign('btg',$btg);
			$this->assign('ywc',$ywc);
			$this->assign('sb',$sb);
			$this->assign('arr',$arr);
			$this->display();
		
		}
		public function tuihuoajax(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			 $zt=I('get.zt');//die;echo 
			$mysql=M('tuihuo');
			//$arr2=$mysql->where("zt='$zt'")->select();
			
			//$tuihuo_id='';
			//foreach($arr2 as $k=>$v){
				//$tuihuo_id.=','.$v['tuihuo_id'];
		//	}
			// $tuihuo_id=substr($tuihuo_id,1);//echodie;//die;echo 
			$arr=$mysql->join("chanpinku on tuihuo.cpk_id=chanpinku.cpk_id")
				->where("zt='$zt'")->order("tuihuo_id desc")->select();
	//	print_r($arr);die;
		if($arr){
				$tg='审核通过';
				$btg='审核不通过';
				$ywc='已完成';
				$sb='失败';
			}
		}
				}
			$this->assign('tg',$tg);
			$this->assign('btg',$btg);
			$this->assign('ywc',$ywc);
			$this->assign('sb',$sb);
			$this->assign('arr',$arr);
			$this->display();
		
		}
		public function tuihuotg(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$tuihuo_id=I('get.tuihuo_id');
			$mysql=M('tuihuo');
			$arr=$mysql
			->join("chanpinku on tuihuo.cpk_id=chanpinku.cpk_id")
			->join("cangku on tuihuo.cangku_id=cangku.cangku_id")
			->where("tuihuo_id='$tuihuo_id'")->find();
			 $cpk_price=$arr['cpk_price'];
			 $ddxx_id=$arr['ddxx_id'];
			 $mm=M('dingdanhao');
			  $ddh=$arr['ddh'];
			 $user_id=$arr['user_id'];
			 $cangku_id=$arr['cangku_id'];
			 $sqll=M('m_user');
			 $arr1=$sqll->where("user_id='$user_id'")->find();
			 $yuemoney=$arr1['yuemoney'];
			 $post['yuemoney']=$yuemoney+$cpk_price;
			 $arr2=$sqll->where("user_id='$user_id'")->save($post);
			 
			 if($arr2){
			 $sqlll=M('tuihuo');
			 $data['zt']=1;
				$arr3=$sqlll->where("tuihuo_id='$tuihuo_id'")->save($data);
				if($arr3){
					$sqllll=M('cangku');
					$rt['zta']=4;
					$arr4=$sqllll->where("cangku_id='$cangku_id'")->save($rt);
					if($arr4){
					$h=M('yue');
					$dat['user_id']=$user_id;
					$dat['yue_type']='退货';
					$dat['ddh']=$ddh;
					$dat['jy_money']='+'.$cpk_price;
					$dat['jy_time']=date('Y-m-d H:i:s', time());
					$dat['czuser']=$yanzheng['user_username'];
					$arrt=$h->add($dat);
					if($arrt){
						header('location:'.__CONTROLLER__.'/shifutuihuo');
					}
					
					
				}

			}
		}
		}
		}
		}
	public function tuihuobtg(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$tuihuo_id=I('get.tuihuo_id');
			$mysql=M('tuihuo');
			$arr=$mysql
			->join("chanpinku on tuihuo.cpk_id=chanpinku.cpk_id")
			->join("cangku on tuihuo.cangku_id=cangku.cangku_id")
			->where("tuihuo_id='$tuihuo_id'")->find();
			$cangku_id=$arr['cangku_id'];
		 $sqlll=M('tuihuo');
			 $data['zt']=2;
				$arr3=$sqlll->where("tuihuo_id='$tuihuo_id'")->save($data);
				if($arr3){
					$sqllll=M('cangku');
					$post['zta']=7;
					$arr4=$sqllll->where("cangku_id='$cangku_id'")->save($post);
					if($arr4){
						header('location:'.__CONTROLLER__.'/shifutuihuo');
					
					}
				}
	
	}
		}
		}
	public function quxiaotuihuo(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$tuihuo_id=I('get.tuihuo_id');
			$mysql=M('tuihuo');
			$arr=$mysql
			->join("chanpinku on tuihuo.cpk_id=chanpinku.cpk_id")
			->join("cangku on tuihuo.cangku_id=cangku.cangku_id")
			->where("tuihuo_id='$tuihuo_id'")->find();
			$cangku_id=$arr['cangku_id'];
		 $sqlll=M('tuihuo');
				$arr3=$sqlll->where("tuihuo_id='$tuihuo_id'")->delete();
				if($arr3){
					$sqllll=M('cangku');
					$post['zta']=0;
					$arr4=$sqllll->where("cangku_id='$cangku_id'")->save($post);
					if($arr4){
						header('location:'.__CONTROLLER__.'/shifutuihuo');
					
					}
				}
	
	}
		}
	}
	public function balail_a(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$user_id=I('get.user_id');
		
		$a=M('m_user');
		
		$mysql=M('yue');
		$arr=$mysql->where("user_id='$user_id'")->order('yue_id desc')->select();
		}
		}
		$this->assign('arr',$arr);
				$this->display();
	}
		public function balail_b(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$user_id=I('get.user_id');
		
		$mysql=M('xinyong');
		$arr=$mysql->where("user_id='$user_id'")->order('xinyong_id desc')->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	
	}
	
public function shifugl(){

	if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__CONTROLLER__.'/login');
		}else{
			
	$mysql=M('m_user');
	
	$arr=$mysql->where("sfzt in(1,2,3)")->select();

		$mys=M('smwx');
			$sql=M('jxzx');
			$my=M('wxzx');
			//echo 1;die;
			$arr1=$mys->select();
			$arr2=$my->select();
			$arr3=$sql->select();
			

	}
		}
	$this->assign('arr3',$arr3);
	$this->assign('arr1',$arr1);
	$this->assign('arr2',$arr2);
	$this->assign('arr',$arr);
	$this->display();
		
}
		public function shifudingdan(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$mysql=M('dingdanhao');
			$arr1=$mysql->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("fkzt=1")->select();
			//print_r($arr1);die;
			if(!$arr1){
			$a='没有订单';
			}
			foreach ($arr1 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
		}
		}
			$this->assign('arr',$arr);
			$this->assign('a',$a);
			$this->display();
		}
		public function shenhetongguo(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$id=I('get.id');//echo die;
			$mysql=M('dingdanhao');
			$arr=$mysql->where("id='$id'")->find();
			$user_id=$arr['user_id'];
			$peijianzhifu_type=$arr['peijianzhifu_type'];
			$ddh=$arr['ddh'];
			$amount=$arr['amount'];
			$sqll=M('ddxxb');
			$arr5=$sqll->where("use_id='$user_id' and dingdanhaoid='$id'")->select();
			$a=count($arr5);//die;/// echo	///
				$cpkid='';
				$nums='';
				$userid='';
				$modelidd='';
				$skma='';
				$ddxx_id='';
			foreach ($arr5 as $k=>$v){
				$ddxxid.=','.$v['ddxx_id'];
				$skm.=','.$v['skm'];
				$cpkid.=','.$v['cpk_id'];
				$ddnums.=','.$v['dd_nums'];
				$useid.=','.$v['use_id'];
				$modelidd.=','.$v['modelidd'];
				//$wcclid.=','.$v['wccl_id'];
			}
			//$wcclid=substr($wcclid,1); 
				$skm=substr($skm,1);//echodie;
				$skm=explode(',',$skm);
				$cpkid=substr($cpkid,1);
				$cpkid=explode(',',$cpkid);
				 $ddnums=substr($ddnums,1);//die;echo
				$ddnums=explode(',',$ddnums);
				$useid=substr($useid,1);
				$useid=explode(',',$useid);
				 $modelidd=substr($modelidd,1);//die;echo
				$modelidd=explode(',',$modelidd);
				 $ddxxid=substr($ddxxid,1);//die;echo
				$ddxxid=explode(',',$ddxxid);
				
		
				for($i=0;$i<$a;$i++){
					$sk_m=$skm[$i];
					$cpk_id=$cpkid[$i]; 
					$dd_nums=$ddnums[$i];
					$use_id=$useid[$i];
					$md_id=$modelidd[$i];
					$ddxx_id=$ddxxid[$i];
					
				$c[]=array('cangku_name'=>$sk_m,'cpk_id'=>$cpk_id,'numss'=>$dd_nums,'user_id'=>$use_id,'mdid'=>$md_id,'ddxx_id'=>$ddxx_id);
				}
				//echo '1';die;
				$db=M('cangku');
				$ss=$db->addAll($c);
			if($ss){
				$slk=M('dingdanhao');
				$post['fkzt']=2;
				$arr7=$slk->where("id='$id'")->save($post);
			if($arr7){
				if($peijianzhifu_type==2){
					$h=M('yue');
					$data['user_id']=$user_id;
					$data['yue_type']='购买配件(公司)';
					$data['ddh']=$ddh;
					$data['jy_money']=-$amount;
					$data['jy_time']=date('Y-m-d H:i:s', time());
					$data['czuser']=$yanzheng['user_username'];
					$arrt=$h->add($data);
				}else if($peijianzhifu_type==3){
					$h=M('xinyong');
					$data['user_id']=$user_id;
					$data['xinyong_type']='购买配件(公司)';
					$data['ddh']=$ddh;
					$data['jy_money']=-$amount;
					$data['jy_time']=date('Y-m-d H:i:s', time());
					$data['czuser']=$yanzheng['user_username'];
					$arrt=$h->add($data);
				}
				header('location:'.__CONTROLLER__.'/index');
				}
				}
		}
		}
		}

		public function shenhebutongguo(){
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
				$mysql=M('dingdanhao');
				$arr=$mysql->where("id='$id'")->find();
				$user_id=$arr['user_id'];
				$ddh=$arr['ddh'];
				$amount=$arr['amount'];
				$sql=M('m_user');
				$arr2=$sql->where("user_id='$user_id'")->find();
				$arr2['yuemoney'];
				$arr2['yixiaofei'];
				if($arr['peijianzhifu_type']==3){
					$post['fkzt']=3;
					$arr1=$mysql->where("id='$id'")->save($post);
					if($arr1){
						$data['yixiaofei']=$arr2['yixiaofei']-$arr['amount'];
						$arr3=$sql->where("user_id='$user_id'")->save($data);
						if($arr3){
							$h=M('xinyong');
						$data['user_id']=$user_id;
						$data['xinyong_type']='审核未通过(配件)';
						$data['ddh']=$ddh;
						$data['jy_money']=+$amount;
						$data['jy_time']=date('Y-m-d H:i:s', time());
						$data['czuser']=$yanzheng['user_username'];
						$arrt=$h->add($data);
						if($arrt){
							header('location:'.__CONTROLLER__.'/index');
						}
						}
					}
				}else
				if($arr['peijianzhifu_type']==2){
					$post['fkzt']=3;
					$arr1=$mysql->where("id='$id'")->save($post);
					if($arr1){
						$data['yuemoney']=$arr2['yuemoney']+$arr['amount'];
						$arr3=$sql->where("user_id='$user_id'")->save($data);
						if($arr3){
							$h=M('yue');
						$data['user_id']=$user_id;
						$data['yue_type']='审核未通过(配件)';
						$data['ddh']=$ddh;
						$data['jy_money']=+$amount;
						$data['jy_time']=date('Y-m-d H:i:s', time());
						$data['czuser']=$yanzheng['user_username'];
						$arrt=$h->add($data);
						if($arrt){
							header('location:'.__CONTROLLER__.'/index');
							}
						}
					}
				}else
				if($arr['peijianzhifu_type']==1){
					$post['fkzt']=3;
					$arr1=$mysql->where("id='$id'")->save($post);
					if($arr1){
						$data['yuemoney']=$arr2['yuemoney']+$arr['amount'];
						$arr3=$sql->where("user_id='$user_id'")->save($data);
						if($arr3){
							$h=M('yue');
						$data['user_id']=$user_id;
						$data['yue_type']='审核未通过(配件)';
						$data['ddh']=$ddh;
						$data['jy_money']=+$amount;
						$data['jy_time']=date('Y-m-d H:i:s', time());
						$data['czuser']=$yanzheng['user_username'];
						$arrt=$h->add($data);
						if($arrt){
							header('location:'.__CONTROLLER__.'/index');
						}
						}
					}
				}

			}
			}
		}
		public function shenhea(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			//echo $fkzt=I('get,fkzt');die;
			$mysql=M('dingdanhao');
			$arr1=$mysql->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("fkzt='2'")->order("id desc")->select();
				//print_r($arr1);die;
			if(!$arr1){
			$a='没有订单';
			}
			foreach ($arr1 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
		}
		}
			$this->assign('arr',$arr);
			$this->assign('a',$a);
			$this->display();


}
public function shenheaa(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			//echo $fkzt=I('get,fkzt');die;
			$mysql=M('dingdanhao');
			$arr1=$mysql->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("fkzt='1'")->select();
				//print_r($arr1);die;
			if(!$arr1){
			$a='没有订单';
			}
			foreach ($arr1 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
		}
		}
			$this->assign('arr',$arr);
			$this->assign('a',$a);
			$this->display();


}

	
	public function huishou_a(){
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
		$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->join("m_user on huishou.user_id=m_user.user_id")->where("zt='2'")->order("huishou_id desc")->select();
		}
		}
		//$this->assign('arr',$arr);
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
					$dat['czuser']=$yanzheng['user_username'];
					$arrtg=$h->add($dat);
				if($arrtg){
				header('location:'.__CONTROLLER__.'/index');
				}
			}
			
			}
	}
	}
	}
	

	public function huishouajax(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$zt=I('get.zt');
			$mysql=M('huishou');
			$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->join("m_user on huishou.user_id=m_user.user_id")->where("zt='$zt'")->order("huishou_id desc")->select();
			if($zt==2){
				$a='确认回收';
				$b='不合格';
			}
			
			}
			}
			$this->assign('zt',$zt);
			//$this->assign('b',$b);
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
	/*public function buhege(){
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
	}*/

}
?>