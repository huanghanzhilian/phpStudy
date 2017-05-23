<?php
namespace Admin\Controller;
use Think\Controller;
class CaiwuController extends Controller {
	public function index(){
		if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		//$us_name=$yanzheng['us_name'];
		
		if($username=='18511404833' or $username=='18701275059' or $username=='17717357179'){
		
		$mysql=M('goods');
			$stau=4;
	
			$mysql=M('goods');
	$arr1=$mysql->where("fk='0' and stau='4'")->select();
		foreach ($arr1 as $v=>$kk){
			$id.=','.$kk['id'];
		}
		$id=substr($id,1);
	if(!$id){
			$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->select();
		
		}
		}else{
			header('location:'.__MODULE__.'/Index/index');
		}
		
		
		
		//$this->assign('ways_id',$ways_id);
		
		
		}
		$this->assign('arr',$arr);
		$this->display();
		
	}
public function yiqueren(){
			if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		require_once APP_PATH.'Common/Cf/shifu.php';
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if($username=='18511404833' or $username=='18701275059' or $username=='17717357179'){
		
		$mysql=M('goods');
			 $stau=I('get.stau');
		
		$mysql=M('goods');
		$arr1=$mysql->where(" stau='$stau'")->select();
		foreach ($arr1 as $v=>$kk){
			$id.=','.$kk['id'];
		}
		$id=substr($id,1);
	if(!$id){
			$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->order("id desc")->select();
		
		
		}
		}else{
		header('location:'.__MODULE__.'/Index/index');
		}
		}
		//$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
		}
		public function queren(){
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
			$my=M('cangku');
			$id=I('get.id');
				$sql=M('goods');
				$post['fk']=1;
				$post['stau']=5;
				$post['fk_time']=date('Y-m-d H:i:s', time());
				$arr1=$sql->where("id='$id'")->find();
				$am=$arr1['amount'];
				$yonghuwx_id=$arr1['yonghuwx_id'];
				$yq_id=$arr1['yq_id'];
			 $waysid=$arr1['ways_id'];
				if($am > 149 && $waysid==1){
				if(!$yq_id==''){
				$hjob=M('yaoqingma');
				$rtyu=$hjob->join("m_user on yaoqingma.yq_user_id=m_user.user_id")->join("wd_customer on m_user.customer_id=wd_customer.customer_id")->where("yq_id='$yq_id'")->find();
				$openid=$rtyu['openid'];
				vendor('Hongbao.oauth2');
				$wxapi = new \Wxapi();
				$res = $wxapi->pay($openid);
				}
				}
				if($yonghuwx_id){
				$hjob=M('yonghuwx');
				$rtyu=$hjob->where("yonghuwx_id='$yonghuwx_id'")->find();
				 $openid=$rtyu['openid'];
				vendor('Hongbao.oauth2');
				$wxapi = new \Wxapi();
				$res = $wxapi->pay($openid);
				}
				$yhq_id=$arr1['yhq_id'];
				$amountt=$arr1['amountt'];
				//echo 1;die;
				if($arr1['wxfy']){
				 $wxfy=$arr1['wxfy']*0.3;//die;echo
				}
					
				
			
				$cangku_id=$arr1['cangku_id'];
				$amount=$arr1['amount'];
				$datat['cpk_id']=$cppk_id=$arr1['cppk_id'];
				$datat['user_id']=$user_id=$arr1['user_id'];
				$datat['goodid']=$ddh=$arr1['ddh'];
				$datat['zt']=1;
				$datat['time']=date('Y-m-d H:i:s', time());
				$datat['ddh']=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
						$userr=M('m_user');
						$arr13=$userr->where("user_id='$user_id'")->find();
				$arr=$sql->where("id='$id'")->save($post);
				if($arr){
				
				$h=M('yue');
					$dat['user_id']=$user_id;
					$dat['yue_type']='维修订单(现金)';
					$dat['ddh']=$ddh;
			if($arr1['ways_id']==1){
					$amoun=$amount-$wxfy;
					$dat['jy_money']='+'.$amoun;
						}else if($arr1['ways_id']==2 || $arr1['ways_id']==3){
					$amoun=$amount-30-$wxfy;
						$dat['jy_money']='+'.$amoun;
						}
					$dat['jy_time']=date('Y-m-d H:i:s', time());
					$arrt=$h->add($dat);
				if($amountt){
						$h=M('yue');
						$dat['user_id']=$user_id;
						$dat['yue_type']='优惠金额';
						$dat['ddh']=$ddh;
						$dat['jy_money']='+'.$amountt;
						$dat['jy_time']=date('Y-m-d H:i:s', time());
						$arrt=$h->add($dat);
				}
				if($arrt){
				if($cangku_id){
				
				$rty['zta']=10;
				$arr5=$my->where("cangku_id in($cangku_id)")->save($rty);
					if($arr5){
						
						if($cppk_id){
							$mysqll=M('huishou');
							$arr6=$mysqll->add($datat);
							if($arr6){
							   if(($arr1['ways_id']==2) || ($arr1['ways_id']==3)){
								 $yu['yuemoney']=($arr13['yuemoney']+($arr1['amount']-30-$wxfy)+$amountt);
								 $arr12=$userr->where("user_id='$user_id'")->save($yu);
									if($arr12){
										if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
										if($sd){
								
										
										header('location:'. __CONTROLLER__.'/index');
								
									}
										
										
									}else{
									header('location:'. __CONTROLLER__.'/index');
									}
									}
								}else{
									$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-$wxfy)+$amountt);
									$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
										if($sd){
							
									
										header('location:'. __CONTROLLER__.'/index');
										
									}
									}else{
									header('location:'. __CONTROLLER__.'/index');
									}
								}
								}
					
							}
						}else{
						
							if(($arr1['ways_id']==2) || ($arr1['ways_id']==3)){
								
								$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-30-$wxfy)+$amountt);//echo die;
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
								if($sd){
									
								
										header('location:'. __CONTROLLER__.'/index');
						
									}
									}else{
									header('location:'. __CONTROLLER__.'/index');
									}
								}
						
							}else{
								$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-$wxfy)+$amountt);
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
								if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
										if($sd){
									
										header('location:'. __CONTROLLER__.'/index');
										
									}
									}else{
									header('location:'. __CONTROLLER__.'/index');
									}
								}
							}
						}
					}
						}else{
							$userr=M('m_user');
						if(($arr1['ways_id']==2) || ($arr1['ways_id']==3)){
							$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-30-$wxfy)+$amountt);
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
									if($sd){
									
										header('location:'. __CONTROLLER__.'/index');
										
									}
									}else{
									header('location:'. __CONTROLLER__.'/index');
									}
								}
						
							}else{
								$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-$wxfy)+$amountt);
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
								if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
										if($sd){
									
										header('location:'. __CONTROLLER__.'/index');
										
									}
									}else{
									header('location:'. __CONTROLLER__.'/index');
									}
								}
							}
						
						
						
						
						}
					}
				}
			}
		}
		}
	public function youhuia(){
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
		$id=I('get.id');
		}
		}
		$this->assign('arr',$arr);
		$this->assign('id',$id);
		$this->display();
   
	}
	public function yhadd(){
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
		$id=I('post.id');
		$money=I('post.money');
		$mysql=M('goods');
		$arr=$mysql->where("id='$id'")->find();
		$amountt=$arr['amountt'];
		$amount=$arr['amount'];
		$post['amountt']=$amountt+$money;
		$post['amount']=$amount-$money;
			$arr1=$mysql->where("id='$id'")->save($post);
			if($arr1){
				$this->success('更新成功!',__CONTROLLER__."/index",1);	
			}
			}
			}
	}
public function chem(){
		//师傅登陆的验证
 $pwd=I('get.pwd');//die;	echo
	$username=I('get.username');
		if(!$username){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$mysql=M('admin');
		$re=$mysql->where("username='$username'")->find();
		if($re){
			if($re['pwd']===$pwd){
					cookie('username',$username);
			}else{
			echo "1";
			}
			}else{
			echo "2";
			}
	}

		}
		public function tuichua(){
	   //师傅退出登录
           cookie('username',null);  //清空cookie
		   header('location:'. __CONTROLLER__.'/login');   
   }
   public function thtk(){
	if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if($username=='18511404833' or $username=='18701275059' or $username=='17717357179'){
		
			$mysql=M('goods');
			$stau=4;
	
			$mysql=M('goods');
	$arr1=$mysql->where("gzt='1'")->select();
		foreach ($arr1 as $v=>$kk){
			$id.=','.$kk['id'];
		}
		$id=substr($id,1);
	if(!$id){
		$arr=$mysql
		->where("id='$id'")->find();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->select();
		}
		}else{
			header('location:'.__MODULE__.'/Index/index');
		}
		}
		//$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
   
   }
      public function yqr(){
	if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$mysql=M('goods');
			$gzt=I('get.gzt');
	
			$mysql=M('goods');
	$arr1=$mysql->where("gzt='$gzt'")->select();
		foreach ($arr1 as $v=>$kk){
			$id.=','.$kk['id'];
		}
		$id=substr($id,1);
	if(!$id){
		$arr=$mysql
		->where("id='$id'")->find();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->order("id desc")->select();
		}
		}
		}
		//$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
   
   }
	
   public function tixianguanli(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if($username=='18511404833' or $username=='18701275059' or $username=='17717357179'){
			$mysql=M('tixianshenqing');
		$arr=$mysql->join("yinhang on tixianshenqing.yinhang_id=yinhang.yinhang_id")->join("m_user on tixianshenqing.user_id=m_user.user_id")->where("zta=1")->select();
		}else{
		header('location:'.__MODULE__.'/Index/index');
		}
		}
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function tixianajax(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$zta=I('get.zta');//die;echo 
		$mysql=M('tixianshenqing');
		$arr=$mysql->join("yinhang on tixianshenqing.yinhang_id=yinhang.yinhang_id")->join("m_user on tixianshenqing.user_id=m_user.user_id")->where("zta='$zta'")->order("tixianshenqing_id desc")->select();
		
	//print_r($arr);die;
	}
	}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function tongguo(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$id=I('get.id');//echodie;
		$mysql=M('tixianshenqing');
		$post['zta']=2;
		$post['wc_time']=date('Y-m-d H:i:s', time());
		$arr1=$mysql->where("tixianshenqing_id='$id'")->find();
		$data['jy_time']=date('Y-m-d H:i:s', time());
		$data['ddh']=$arr1['ddh'];
		$data['user_id']=$arr1['user_id'];
		$data['jy_money']=-$arr1['amt'];
		$data['yue_type']='提现';
		$arr=$mysql->where("tixianshenqing_id='$id'")->save($post);
		if($arr){
			$sql=M('yue');
			$arr4=$sql->add($data);
			if($arr4){
			header('location:'.__CONTROLLER__.'/tixianguanli');
			}
		}else{
			$this->error('失败');
		}
	}
	}
	}
	public function jujue(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$id=I('get.id');//echodie;
		$mysql=M('tixianshenqing');
		$arr3=$mysql->where("tixianshenqing_id='$id'")->find();
				$amt=$arr3['amt'];
				$user_id=$arr3['user_id'];
				$sql=M('m_user');
				$arr6=$sql->where("user_id='$user_id'")->find();
				$data['yuemoney']=($arr6['yuemoney']+$amt);
			$post['zta']=3;
			$arr=$mysql->where("tixianshenqing_id='$id'")->save($post);
		if($arr){
			
			$arr5=$sql->where("user_id='$user_id'")->save($data);
			if($arr5){
			header('location:'.__CONTROLLER__.'/tixianguanli');
		
		}else{
			$this->error('失败');
		}
		}
		}
		}
			
		}
	public function fapiaoind(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if($username=='18511404833' or $username=='18701275059' or $username=='17717357179'){
			$mysql=M('fp');
		$arr=$mysql->join("goods on fp.goods_id=goods.id")->where("zt='0'")->select();
		}else{
		
		header('location:'.__MODULE__.'/Index/index');
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
				$this->success('已成功!',__CONTROLLER__.'/fapiaoind',1);
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
			$zt=I("get.zt");
		$mysql=M('fp');
		$arr=$mysql->join("goods on fp.goods_id=goods.id")->where("zt='$zt'")->order("fp_id desc")->select();
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
			$this->success('删除成功!',__CONTROLLER__.'/fapiaoind',1);
			 }
	}
		}
		}
public function youhuiind(){
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
			header('location:'. __CONTROLLER__.'/fapiaoind/');
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
			header('location:'. __CONTROLLER__.'/fapiaoind/');
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
public function thtkquxiao(){
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
			$mysql=M('goods');
			$post['gzt']=0;
			$arr=$mysql->where("id='$id'")->save($post);
			if($arr){
			header('location:'. __CONTROLLER__.'/thtk/');
			}

		}
		}
}
}