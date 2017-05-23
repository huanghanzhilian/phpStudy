<?php
namespace Home\Controller;
use Think\Controller;
use Org\Net\Weixin;
use Org\Net\wxhongbao\Wxapi;
define("TOKEN", "weixin");
require_once APP_PATH.'Home/Controller/UtilController.class.php';
class IndexController extends Controller {

	//首页加载
	public function index(){
		//用户导航加载
		require_once APP_PATH.'Common/Cf/my.php';
		$mysql=M('goods');
		$tie=time();
		$teday= $tie-(60*60*24*15);
		$timm=date('Y-m-d H:i:s',$teday);
		$pt['pingjiazt']=1;
		$pt['stau']=6;
		$arrp=$mysql->where(" (fk_time < '$timm') and (stau='5')")->save($pt);
		$sql=M('pingjia');
		$arr=$sql->join("goods on pingjia.goods_id=goods.id")->join("m_user on pingjia.user_id=m_user.user_id")->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")->order('pingjia_id desc')->limit(3)->select();
		//if($arr){
		//print_r($arr);die;
		//}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function ff(){
		$mysql=M('goods');
		$tie=time();
		 $teday= $tie-(60*60*24*15);
		 $timm=date('Y-m-d H:i:s',$teday);
		$pt['pingjiazt']=1;
		$pt['stau']=6;
		$arrp=$mysql->where(" (fk_time < '$timm') and (stau='5')")->save($pt);
		echo 'ok';die;
	}
	public function shouhou(){
		$id=I('get.id');
		$mysql=M('goods');
		$arr=$mysql->where("id='$id'")->find();
		$this->assign('arr',$arr);
		$this->display();
	}
	public function shouhouadd(){
		//print_r($_POST);die;
		$post['contentt']=I('post.contentt');
		$post['username']=I('post.username');
		$post['tell']=I('post.tell');
		$post['addres']=I('post.addres');
		$post['addre']=I('post.addre');
		$post['goods_id']=$id=I('post.id');
		$ddh=$post['dd']=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
		$mysql=M('shouhou');
		$sql=M('goods');
		$arr=$mysql->add($post);
		if($arr){
			$data['shouhoua']='1';
			$arr1=$sql->where("id='$id'")->save($data);
			if($arr1){
			header('location:'. __CONTROLLER__."/dingdan");
			}
		}
	
	}
	public function wwxxcc1(){
	
	 $access_token = getnewtoken();
	// $url = $access_token;
	$url='https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$access_token.'&type=jsapi';
	$this->assign('access_token',$url);
	$this->display();
	}
	public function padd(){
		//print_r($_POST);die;
		$pingjia_1=$_POST['pingjia_1'];
		$pingjia_2=$_POST['pingjia_2'];
		$pingjia_3=$_POST['pingjia_3'];
		$pingjia_4=$_POST['pingjia_4'];
		$post['pingjiacontent']=$_POST['pingjiacontent'];
		$post['goods_id']=$goods_id=$goods_id=$_POST['goods_id'];
		$sqll=M('pingjia');
		$arrr=$sqll->where("goods_id='$goods_id'")->find();
	 $good=M('goods');
	 $goods=$good->where("id='$goods_id'")->find();
	 $question_id=$goods['question_id'];
	 $ddh=$goods['ddh'];
		if($arrr){
			 header('location:'. __CONTROLLER__."/dingdan");
		}else{
		$quest=M('maintenance_question');
		$ast=$quest->where("question_id in($question_id)")->select();
			$question_name = '';
			foreach($ast as $k=>$v){
			$question_name .= ','.$v['question_name'];
		}
		$post['wenti']=substr($question_name,1);//die;echo	
		$post['user_id']=$user_id=$_POST['user_id'];
		$post['time']=date('Y-m-d H:i:s', time());
		$post['pjx']=$_POST['pingjia_l'];
		if($post['pjx']==4){
			$mys=M('m_user');
			$lis=$mys->where("user_id='$user_id'")->find();
			$post['yuemoney']=$amount=$lis['yuemoney']+5;
			$asd=$mys->where("user_id='$user_id'")->save($post);
			if($asd){
				$h=M('yue');
					$dat['user_id']=$user_id;
					$dat['yue_type']='好评奖励';
					$dat['ddh']=$ddh;
					$dat['jy_money']='+'.'5';
					$dat['jy_time']=date('Y-m-d H:i:s', time());
					$arrt=$h->add($dat);
			}
		}
		$pingjiaa=$pingjia_1.','.$pingjia_2;
		
		if($pingjia_3){
			$pingjiaa=$pingjia_1.','.$pingjia_2.','.$pingjia_3;
		}
		if($pingjia_4){
			$pingjiaa=$pingjia_1.','.$pingjia_2.','.$pingjia_3.','.$pingjia_4;
		}
		$post['pingjiaa']=$pingjiaa;
		$post['k_userid']=$_POST['k_userid'];//die;echo
		$mysql=M('pingjia');
		$aaa=$mysql->add($post);
		if($aaa){
			$sqll=M('goods');
			$data['pingjiazt']=1;
			$data['stau']=6;
			$arrt=$sqll->where("id='$goods_id'")->save($data);
			if($arrt){
			 header('location:'. __CONTROLLER__."/dingdan");
			}
		}
	
	}
	}

public function pingjia_show(){	
	$msql=M('pingjia');
		$arr9=$msql->join("goods on pingjia.goods_id=goods.id")->join("yonghuuser on pingjia.k_userid=yonghuuser.k_userid")->join("maintenance_model on goods.model_id=maintenance_model.model_id")->join("m_user on pingjia.user_id=m_user.user_id")->order("pingjia_id desc")->select();
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
	public function fapiao(){
		$id=I('get.id');//die;echo 
		$mysql=M('goods');
		$arr=$mysql->where("id='$id'")->find();	
		 $amount=$arr['amount'];
		$this->assign('amount',$amount);
		$this->assign('id',$id);
		$this->display();
	}
	public function fapiaoadd(){
		$id=I('post.id');
		$post['user']=I('post.username');
		$post['fptt']=I('post.fptt');
		$post['dizhi']=I('post.dizhi');
		$mysql=M('goods');
		$arr=$mysql->where("id='$id'")->find();	
		$post['amount']=$arr['amount'];
		$post['goods_id']=$id;
		$sql=M('fp');
		$arr1=$sql->add($post);
		if($arr1){
			$data['fapiaoa']=1;
			$arr2=$mysql->where("id='$id'")->save($data);
			if($arr2){
			$this->success('申请成功!',__CONTROLLER__.'/dingdan',1);
			}
		}
		
	}
		public function weixiulc(){
		//用户导航加载
		$this->display();
		}
	//快速下单
	public function ksxd(){
		$mysql=M('maintenance_brand');
		$arr=$mysql->select();
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function ksxdjx(){
		 $brand_id=I('get.brand_id');//die;echo
		$mysql=M('maintenance_model');
		$arr1=$mysql->where("brand_id='$brand_id'")->select();
		//print_r($arr1);die;
		$this->assign('arr1',$arr1);
		$this->display();
	
	}
	public function ksxdadd(){//快速下单的订单提交
	
		header("Content-type: text/html; charset=utf-8"); 
		//print_r($_POST);die;
		$username=addslashes(I('post.username'));
		$tell=I('post.sc_name');
		$tel_preg="/^1[3,5,7,8]\d{9}$/";
			if(!preg_match($tel_preg,$tell)){
				$this->error('非法操作');
			}
		$content=addslashes(I('post.content'));
		$model_name=I('post.pinbb_c');
		$type=I('post.pinbb');
		$cont='<p>快速下单</p><p>姓名:'.$username.'</p><p>电话:'.$tell.'</p><p>机型:'.$model_name.'</p><p>备注:'.$content.'</p>';
				//处理逸创必要的字段
				$email=$tell.'@163.com';
				$data = array(
					'email'=>$email,
					'phone'=>$tell,
					'title'=>'快速下单',
					'comment'=>array('content'=>$cont),
					'requester'=>array('email'=>$email,'name'=>$username),
					'custom_fields'=>array(
						array('name'=>'field_10084','value'=>'快速下单'),
				),
		
				
				);
			//调取逸创方法
		require_once APP_PATH.'Common/Util/Kf/Client.php';
		//必要的账号密码HTTPS
		$config = array(
			'domain'=>'weibaishi.kf5.com',
			'email'=>'61638325@qq.com',
			'token'=>'b493fa8d928e689664453fede7b134',
			'password'=>'nihao123',
		);
		//权限
		$client = new \Client($config['domain'], $config['email']);
		$client->setAuth('token', $config['token']);
		$result = $client->tickets()->create($data);
		if($result ){
			$url = 'http://sms.jiangukj.com/SendSms.aspx?';
				header("Content-type: text/html; charset=utf-8");
				$data = array('action' => 'code',
				'username' => 'bjjxsg',
				'userpass' => '7bi58n',
				'mobiles' => $tell,
				'content' => $model_name,
				'codeid' =>'4244',
				);
				$db = new UtilController();
				$result = $db->request($url, 'POST',$data);
			 header('location:'. __CONTROLLER__."/index");
			//成功返回shifu
		}
	}
	public function pingjia(){
		$id=I('get.id');
		$mysql=M('goods');
		//$tie=time();
		//$teday= $tie-(60*60*24*15);
		//$timm=date('Y-m-d H:i:s',$teda);
	//	$pt['pingjiazt']=1;
	//	$pt['stau']=6;
	//$arrp=$mysql->where(" (fk_time < $timm) and (stau='5')")->save($pt);
		$arr10=$mysql->join("maintenance_model on				goods.model_id=maintenance_model.model_id")->where("id='$id'")->find();
		  $ways_id=$arr10['ways_id'];//die;echo
		   $user_id=$arr10['user_id'];
			$modelname=$arr10['model_name'];
			$mkl=M('m_user');
			$arrct=$mkl->where("user_id='$user_id'")->find();
			$user_username=$arrct['user_username']; 
			$img=$arrct['img'];//die;echo 
			$u_phone=$arr10['u_phone'];//die;echo  
			$question_id=$arr10['question_id'];
			$qll=M('maintenance_model');
			$model_id=$arr10['model_id'];
			$model_name=$qll->where("model_id in ($model_id)")->select();	
			$ql=M('maintenance_question');
			$question_name=$ql->where("question_id in ($question_id)")->select();
		  $sqsq=M('yonghuuser');
		  $arrt=$sqsq->where("phone='$u_phone'")->find();
		 $k_userid= $arrt['k_userid'];//die;	echo 
		if($ways_id==1){
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
		
		
		
		
		}
		
		if($ways_id==3){
			$mysql=M('ping');
		$db=M('pingjiacontent');
		$arr=$mysql->where("ping_id in(5)")->select();
			foreach($arr as $k=>$v){
				$a=$v['ping_id'];
				$ar=$db->where("ping_id in(5)")->select();
				$arr[$k]['data']=$ar;
			}
			$arr1=$mysql->where("ping_id in(6)")->select();
			foreach($arr1 as $k=>$v){
				$a=$v['ping_id'];
				$ar1=$db->where("ping_id in(6)")->select();
				$arr1[$k]['data']=$ar1;
			}
			$arr2=$mysql->where("ping_id in(7)")->select();
			foreach($arr2 as $k=>$v){
				$a=$v['ping_id'];
				$ar2=$db->where("ping_id in(7)")->select();
				$arr2[$k]['data']=$ar2;
			}

		
		}
		if($ways_id==2){
			$mysql=M('ping');
		$db=M('pingjiacontent');
		$arr=$mysql->where("ping_id='1'")->select();
			foreach($arr as $k=>$v){
				$a=$v['ping_id'];
				$ar=$db->where("ping_id='1'")->select();
				$arr[$k]['data']=$ar;
			}
			
			$arr1=$mysql->where("ping_id='3'")->select();
			foreach($arr1 as $k=>$v){
				$a=$v['ping_id'];
				$ar1=$db->where("ping_id='3'")->select();
				$arr1[$k]['data']=$ar1;
			}
		
		}
		$this->assign('modelname',$modelname);
		$this->assign('avatar',$img);
		$this->assign('model_name',$model_name);
		$this->assign('user_username',$user_username);
		$this->assign('question_name',$question_name);
		$this->assign('k_userid',$k_userid);
		$this->assign('user_id',$user_id);
		$this->assign('ways_id',$ways_id);
		$this->assign('id',$id);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->assign('arr2',$arr2);
		$this->assign('arr3',$arr3);
		$this->display();
	}
	public function tousu(){
		$this->display();
	}
	public function fankui(){
		 $id=I('get.id');//die;echo
		$this->display();
	}
	public function tousuadd(){
			header("Content-type: text/html; charset=utf-8"); 
		//print_r($_POST);die;
		$name=addslashes(I('post.name'));
		$tijfs=I('post.tijfs');//addslashes()
		$content=addslashes(I('post.content'));
		$type=I('post.type');
		$phone=I('post.phone');
		$tel_preg="/^1[3,5,7,8]\d{9}$/";
			if(!preg_match($tel_preg,$phone)){
				$this->error('非法操作');
			}
		$cont='<p>'.$tijfs.'</p><p>'.$type.':'.$phone.'</p><p>内容:'.$content.'</p><p>投诉人:'.$name.'</p>';
			$email='123456@163.com';
				$data = array(
					'email'=>$email,
					//'phone'=>$tell,
					'title'=>$tijfs,
					'comment'=>array('content'=>$cont),
					//'requester'=>array('email'=>$email,'name'=>$username),
					'custom_fields'=>array(
						//array('name'=>'field_10169','value'=>$username),
						////array('name'=>'field_8104','value'=>$content),
						//array('name'=>'field_10175','value'=>$brand_name),
						//array('name'=>'field_10170','value'=>$tell),
						array('name'=>'field_10084','value'=>$tijfs),
						//array('name'=>'field_10083','value'=>$contentt),
						
				),
				
				);
			//调取逸创方法
		require_once APP_PATH.'Common/Util/Kf/Client.php';
		//必要的账号密码HTTPS
		$config = array(
			'domain'=>'weibaishi.kf5.com',
			'email'=>'61638325@qq.com',
			'token'=>'b493fa8d928e689664453fede7b134',
			'password'=>'nihao123',
		);
		//权限
		$client = new \Client($config['domain'], $config['email']);
		$client->setAuth('token', $config['token']);
		$result = $client->tickets()->create($data);
		if($result ){
			header("location:http://m.weibaishi.com/");
	}
	}
	//下单首页
	public function phone(){
		require_once APP_PATH.'Common/Cf/my.php';
		//维修类型
		$id=I('post.id');
		if($id){
		$id=I('post.id');
		$tu=1;
		}
        $mysql=M('maintenance_type');
	    $arr6=$mysql->select();
		//品牌
	  	$ql=M('maintenance_brand');
		$arr3=$ql->where("brand_zt='0'")->select();
		//print_r($arr3);die;
		//机型
		$mysql=M('maintenance_model');
		//颜色
		$db=M('maintenance_color');
		$arr=$mysql->where("brand_id='1' and model_zt='0'")->order("pai_id")->select();
		foreach($arr as $k=>$v){
			$a=$v['color_id'];
			$arr2=$db->where("color_id in($a) and color_zt='0'")->select();
			$arr[$k]['data']=$arr2;
		} 
		 $this->assign('tu',$tu);
		 $this->assign('id',$id);
		 $this->assign('arr',$arr);
		 $this->assign('arr3',$arr3);
		 $this->assign('my',$my);
		 $this->assign('arr6',$arr6);
		 $this->display();
    }
	public function dlzt(){
	require_once APP_PATH.'Common/Cf/my.php';
	
	}
	//通过AJAX调取的地图
	public function locaddr(){
			$id=I('get,id');
			 $this->display();
		}
	//维修师傅的订单首页

	public function tuidan(){
		//拒单
		$id=$_GET['id'];
		$stau=$_GET['stau'];
		$data['stau']=0;
		$data['user_id']=0;
		$sql=M('goods');
		$arr1=$sql->where("id='$id'")->save($data);
		if($arr1){
				 header('location:'. __CONTROLLER__."/hddzt/stau/1");
			}
	}

	

	public function youhuiquan(){
		//优惠券
		$id=I('get.id');
		$username=$_COOKIE['username'];
		$sqlsw=M('yhq');
		$sqlw=M('yonghuuser');
		$arr21=$sqlw->where("phone='$username'")->find();
		$k_userid=$arr21['k_userid'];
		
		$arr=$sqlsw->where("k_userid='$k_userid' and zt='0'")->find();
		if($arr){
		$arr=$sqlsw->where("k_userid='$k_userid' and zt='0'")->select();
		}
		$this->assign('id',$id);
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function youhuiquan_show(){
		$username=$_COOKIE['username'];
		$sqlsw=M('yhq');
		$sqlw=M('yonghuuser');
		$arr21=$sqlw->where("phone='$username'")->find();
		$k_userid=$arr21['k_userid'];
		
		$arr=$sqlsw->where("k_userid='$k_userid' and zt='0'")->find();
		if($arr){
		$arr=$sqlsw->where("k_userid='$k_userid' and zt='0'")->select();
		}
		$this->assign('id',$id);
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function tuichu(){
		//用户退出登录
           cookie('username',null);  //清空cookie
		   header('location:'. __CONTROLLER__.'/index');   
   }
  
	public function membercentent(){
		//用户中心
		require_once APP_PATH.'Common/Cf/my.php';
		  $id=$_GET['id'];
		//  $this->assign('my',$my);
		  $username=$_COOKIE['username'];
		 if($username){
		   $mysql=M('yonghuuser');
		  $arr=$mysql->where("phone='$username'")->find();
				$yonghu_ma=$arr['yonghu_ma'];
				$k_userid=$arr['k_userid'];
				 $wx_id=$arr['wx_id'];//die;echo
		  if($wx_id){
		  		$fff=M('wx');
					$sdf=$fff->where("wx_id='$wx_id'")->find();
					 $avatar=$sdf['avatar'];
					 $wxusername=$sdf['username'];
					 
					if($yonghu_ma){
					$lianjiea='activ_rule_shouzhuc_e';
					}else{
					$lianjiea='lnv_polite';
					}
				}else{
				$yanz='微信认证';
				$lianjiea='lnv_polite';
				}
		 }else{
		  $denglu='请登录';
		 $lianjiea='lnv_polite';
		 
		 }
		  
				$this->assign('lianjiea',$lianjiea);
				$this->assign('avatar',$avatar);
				$this->assign('yanz',$yanz);
				$this->assign('wxusername',$wxusername);
				$this->assign('denglu',$denglu);
				$this->assign('username',$username);
				$this->display();
	
	}
	public function lnv_polite(){

		$this->display();
	}
	public function activ_rule_shouzhuc_e(){
			$yonghuwx_id=I('get.yonghuwx_id');
			$mysql=M('yonghuwx');
			$arr=$mysql->where("yonghuwx_id='$yonghuwx_id'")->find();
			$this->assign('arr',$arr);
			$this->assign('yonghuwx_id',$yonghuwx_id);
			$this->display();
	}
	public function shouzhuc_share(){
			$yonghuwx_id=I('get.yonghuwx_id');
			$mysql=M('yonghuwx');
			$arr=$mysql->where("yonghuwx_id='$yonghuwx_id'")->find();
			$this->assign('arr',$arr);
			$this->assign('yonghuwx_id',$yonghuwx_id);
			$this->display();
	}
	public function login(){//登陆
		//判断cookie是否为空
		if(!empty($_COOKIE['username'])){
			header("location:http://m.weibaishi.com/order");
		}
		$user_name=$_COOKIE['username'];
		 $id=$_GET['id'];
		 //数据库里是否有此用户
		 $mysql=M('yonghuuser');
			$arr=$mysql->where("phone='$id'")->find();
			$username=$arr['phone'];
		if($username){
			//直接跳转
			cookie('username',$username);
			header("location:http://m.weibaishi.com/order");
		}
		
		 $this->display();
		
	}
	//短信验证码
public function sendSms(){
	$phonee=I('get.phone');
	$num=randomkey(4);
	$mysql=M('yonghuuser');
	$arr=$mysql->where("phone='$phonee'")->find();
	$k_userid=$arr['k_userid'];
	if(!$arr){
		$this->success('您还没有订单!请直接下单',__CONTROLLER__.'/index',3);
	}else{
		$post['yzm']=$num;
		$arr1=$mysql->where("k_userid='$k_userid'")->save($post);
		if($arr1){
	$url = 'http://sms.jiangukj.com/SendSms.aspx?';
	header("Content-type: text/html; charset=utf-8");
	$data = array('action' => 'code',
    'username' => 'bjjxsg',
    'userpass' => '7bi58n',
    'mobiles' => $phonee,
    'content' => $num,
    'codeid' => '4235');
	$db = new UtilController();
	$result = $db->request($url, 'POST',$data);
		}
	//$this->display();		
	}
}
	//师傅登陆口
	
	

	public function ajaxp(){//品牌AJAX
		$brand_id=$_GET['brand_id'];
		$id=$_GET['id'];
		if($gid){
		 $id=$_GET['id'];
		$tu='1';
		}
		$mysql=M('maintenance_model');
		$db=M('maintenance_color');
		$arr=$mysql->where("brand_id='$brand_id' and model_zt='0' ")->order("pai_id")->select();
		
		foreach($arr as $k=>$v){
			$a=$v['color_id'];
			$arr2=$db->where("color_id in($a) and color_zt='0'")->select();
			$arr[$k]['data']=$arr2;
		}
		//print_r($arr);die;
		$this->assign('tu',$tu);
		$this->assign('id',$id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function wenti(){//问题列表
		
		header("Content-type: text/html; charset=utf-8");
		//print_r($_GET);die;
			 $gid=$_GET['id'];
			 if($gid){
			 $id=$_GET['id'];
			 $tu='1';
			 }
			$model_id=$_GET['model_id'];
			$color_id=$_GET['color_id'];
			$m=M('maintenance_color');
			$a=$m->where("color_id='$color_id'")->find();
			$color_name=$a['color_name'];
			$mysql=M('maintenance_model');
			$art=$mysql->where("model_id='$model_id'")->find();
			$model_name=$art['model_name'];
			$ar=$mysql->where("model_id='$model_id'")->select();
				foreach ($ar as $h=>$t){
					 $y=$t['questiontype_id'];
				}
			$sql=M('maintenance_questiontype');
			$db=M('maintenance_question');
			$arr=$sql->where("questiontype_id in($y) and questiontype_zt='0'")->order("type_pai")->select();
			foreach($arr as $k=>$v){
			$b=$v['questiontype_id'];
			$arr2=$db->where("questiontype_id in($b) and model_id='$model_id' and question_zt='0'")->order("question_pai")->select();
			$arr[$k]['data']=$arr2;
		}
		$this->assign('id',$id);
		$this->assign('tu',$tu);
		$this->assign('model_name',$model_name);
		$this->assign('color_name',$color_name);
		$this->assign('color_id',$color_id);
		$this->assign('model_id',$model_id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function mbr(){//问题解决方案的归类
		header("Content-type: text/html; charset=utf-8");
		//print_r($_GET);die;
		$model_id=$_GET['model_id'];
		$color_id=$_GET['color_id'];
		$id=$_GET['id'];
		if($id){
		$id=$_GET['id'];
		}
		$th=M('maintenance_color');
		$arr9=$th->where("color_id='$color_id'")->find();
		$color_name=$arr9['color_name'];//颜色
		$db=M('maintenance_model');
		$arr1=$db->where("model_id='$model_id'")->find();
		 $model_name=$arr1['model_name'];
		$question_id=$_GET['question_id'];//die;echo	
		$mysql=M('maintenance_question');
		/**/$arr5=$mysql
			->join('maintenance_questiontype on maintenance_question.questiontype_id=maintenance_questiontype.questiontype_id')
		->join('maintenance_plan on maintenance_question.plan_id=maintenance_plan.plan_id')
		->join('maintenance_instructions on maintenance_plan.instructions_id=maintenance_instructions.instructions_id')
		->where("question_id in ($question_id) ")
		->select();
		//print_r($arr5);die;
		//用户所有问题
		$strr = '';
			foreach($arr5 as $k=>$v){
			$strr .= ','.$v['question_name'];
		}
		 $question_name=substr($strr,1);	
		//判断这些问题是否存在用户选择的问题
		$question_name=explode(',',$question_name);//print_r(die;
		if(in_array('内屏碎（图像不正常）', $question_name)){
				 $a=',内屏碎（图像不正常）';
		}
		if(in_array('外屏碎（图像正常）', $question_name)){
				$b=',外屏碎（图像正常）';
		}
		if(in_array("屏幕进灰", $question_name)){
				$c=',屏幕进灰';
		}
		if(in_array("屏幕闪烁", $question_name)){
			$d=',屏幕闪烁';//die;echo	
		}
		if(in_array('屏幕有横竖线', $question_name)){
				$e=',屏幕有横竖线';
		}
		
		if(in_array('白屏/黑屏', $question_name)){
				$g=',白屏/黑屏';
		}
		if(in_array('漏光/坏点/花屏', $question_name)){
				$h=',漏光/坏点/花屏';
		}
		if(in_array('屏幕背光', $question_name)){
				$i=',屏幕背光';
		}
		if(in_array('触摸不灵点击无反应/跳屏', $question_name)){
				$j=',触摸不灵点击无反应/跳屏';
		}
		if(in_array('黑屏（图像不显示）', $question_name)){
				$r=',黑屏（图像不显示）';
		}
		if(in_array('屏幕进灰/开胶', $question_name)){
				 $l=',屏幕进灰/开胶';
		}
		if(in_array('屏幕开胶', $question_name)){
				 $m=',屏幕开胶';
		}
		if(in_array('指纹功能失灵', $question_name)){
				 $n=',指纹功能失灵';
		}
		if(in_array('触摸按键失灵', $question_name)){
				 $o=',触摸按键失灵';
		}
		if(in_array('Home键失灵', $question_name)){
				 $p=',Home键失灵';
		}
		if(in_array('边框受损', $question_name)){
				 $q=',边框受损';
		}
		if(in_array('充电接口问题', $question_name)){
				 $s=',充电接口问题';
		}
		if(in_array('麦克风失灵', $question_name)){
				 $t=',麦克风失灵';
		}
		
		

		
		 $quest=$a.$b.$c.$d.$e.$g.$h.$i.$j.$r.$l.$m.$n.$o.$p.$q.$s.$t;
		$question=substr($quest,1);//字符串处理
		//当解决方案"更换屏幕，旧屏回收"遇到"更换屏幕"则选择"更换屏幕";进行处理
		foreach ($arr5 as $key => $value) {
			$data[$key] = $value['plan_name'];
			}
			$keys = array_keys($data, '更换屏幕，旧屏回收');
			if(in_array('更换屏幕', $data) && in_array('更换屏幕，旧屏回收', $data)){
				foreach ($keys as $k => $v) {
					unset($arr5[$v]);
				}
			}
		
		$str = '';
			foreach($arr5 as $k=>$v){
			$str .= ','.$v['plan_id'];
			
		}
		$t=substr($str,1);//die;	echo	
		$sqll=M('maintenance_plan');
	
		$dbb=M('maintenance_question');
			$arr=$sqll
				
				->join('maintenance_instructions on maintenance_plan.instructions_id=maintenance_instructions.instructions_id')->where("plan_id in ($t) ")->select();
			//print_r($arr);die;
			foreach($arr as $k=>$v){
				$b=$v['plan_id'];
			$arr2=$dbb->where("plan_id in ($b)and question_id in($question_id)  ")->select();
			$arr[$k]['data']=$arr2;
		}
		$arr3=$sqll->where("plan_id in ($t) ")->select();
		//预估价格
		foreach($arr3 as $k=>$vv){
			 $money.=','.$vv['money'];
			};
		 $money=substr($money,1);
		  //当问题中有待检测那么就是待检测 则不显示价格
		if(strstr($money,"待检测")){
			$money='待检测';	
		}else{
		
			
			$money=array_sum(explode(',',$money));
			
		}
		if($id){
		$lianjie='http://m.weibaishi.com/home/Index/xiugaimodel';
		$queren='确认修改';
		}else{
		$lianjie='http://m.weibaishi.com/setup';
		$queren='确认报修';
		}
		$this->assign('queren',$queren);
		$this->assign('lianjie',$lianjie);
		$this->assign('id',$id);
		$this->assign('question',$question);
		$this->assign('arr',$arr);
		$this->assign('color_id',$color_id);
		$this->assign('t',$t);
		$this->assign('model_id',$model_id);
		$this->assign('color_name',$color_name);
		$this->assign('question_name',$question_name);
		$this->assign('question_id',$question_id);//
		//$this->assign('arr3',$arr3);
		$this->assign('money',$money);
		$this->assign('model_name',$model_name);
		$this->display();
	}
	public function xiugaimodel(){
			//print_r($_POST);die;
			$id=$_POST['id'];
			$model_id=$_POST['model_id'];
			$sql=M('maintenance_model');
			$arr2=$sql->where("model_id='$model_id'")->find();
			$model_name=$arr2['model_name'];

			$plan_id=$_POST['plan_id'];
			$color_id=$_POST['color_id'];
			$question_id=$_POST['question_id'];
			$data['u_title']='维修:'.$model_name;
			$data['model_id']=$model_id;
			$data['plan_id']=$plan_id;
			$data['color_id']=$color_id;
			$data['question_id']=$question_id;
			$mysql=M('goods');
			$arr=$mysql->where("id='$id'")->save($data);
			if($arr){
				header('location:'.__MODULE__.'/Shifu/daiwancheng');
			}
	}

	public function chuangjian(){//创建订单的页面
		
	require_once APP_PATH.'Common/Cf/my.php';
		header("Content-type: text/html; charset=utf-8");
			$model_id=$_POST['model_id'];//机型
			$ways=$_POST['ways'];//维修方式
		    $plan_id=$_POST['plan_id'];//解决方案
		    $color_id=$_POST['color_id'];//颜色
		    $color_name=$_POST['color_name'];
			$question_id=$_POST['question_id'];//问题
			$model_name=$_POST['model_name'];
			$mysql=M('maintenance_question');
			$arr=$mysql
			->join('maintenance_questiontype on maintenance_question.questiontype_id=maintenance_questiontype.questiontype_id')
			->join('maintenance_plan on maintenance_question.plan_id=maintenance_plan.plan_id')
			->where("question_id in($question_id) and question_zt='0'")->select();
		//	
		$strr = '';
			foreach($arr as $k=>$v){
			$strr .= ','.$v['question_name'];
		}
		$question_name=substr($strr,1);
		$sql=M('maintenance_plan');
		$arr3=$sql->join('maintenance_instructions on maintenance_plan.instructions_id=maintenance_instructions.instructions_id')->where("plan_id in ($plan_id) and plan_zt='0'")->select();
	//print_r($arr3);die;
		//主要判断是否可以上门维修做处理
		 $nums=$sql->where("plan_id in ($plan_id) and plan_zt='0'")->count();
		
		foreach($arr3 as $k=>$v){
			 $money+=$v['money'];
			  $userr_id.=','.$v['userr_id'];
			};
		 $userr_id=substr($userr_id,1);
	
		$sqll=M('m_user');
		//邮寄
		$usera=$sqll->select();
		foreach($usera as $k=>$v){
			$user_id.=','.$v['user_id'];
		
			};
		$user_id=substr($user_id,1);//die;	echo
		$youji=$sqll->join("jxzx on m_user.jxzx_id=jxzx.jxzx_id")->where("user_id in ($user_id)")->select();
	//	print_r($youji);die;	
		foreach($youji as $k=>$v){
			$jxzx_id.=','.$v['jxzx_id'];
		};
		$jxzx_id=substr($jxzx_id,1);//die;	echo
		
			$jx=M('jxzx');
			$youjia=$jx->where("jxzx_id in($jxzx_id)")->select();
			//print_r($youjia);die;
	
			
			$daodian=$sqll->join("wxzx on m_user.wxzx_id=wxzx.wxzx_id")->select();
			//print_r($daodian);die;
			foreach($daodian as $k=>$v){
			$wxzx_id.=','.$v['wxzx_id'];
			};	
			$wxzx_id=substr($wxzx_id,1);
			$wx=M('wxzx');
			$daodiana=$wx->where("wxzx_id in($wxzx_id)")->select();
		
	
	
		
		$ways='';
		foreach($arr3 as $k=>$v){
			$ways.=','.$v['ways_id'];
			};
			$ways=substr($ways,1);
			$wayss=substr_count($ways,'1');//die;echo
			
		if($wayss==$nums){
			//echo 1;die;
			$ways2='到店维修';
			$ways3='邮寄维修';
			$ways1='上门维修';
		}else{
			//echo 2;die;
			$ways2='到店维修';
			$ways3='邮寄维修';
		}
		$this->assign('youjia',$youjia);
		$this->assign('daodiana',$daodiana);
		$this->assign('color_id',$color_id);
		$this->assign('plan_id',$plan_id);
		$this->assign('question_id',$question_id);
		$this->assign('ways1',$ways1);
		$this->assign('ways2',$ways2);
		$this->assign('ways3',$ways3);
		$this->assign('model_id',$model_id);
		$this->assign('color_name',$color_name);
		$this->assign('question_name',$question_name);
		$this->assign('money',$money);
		$this->assign('arr3',$arr3);
		$this->assign('model_name',$model_name);
		$this->assign('my',$my);
		$this->display();
	}
	public function shangmen(){
		//上门维修
		$ways_id=1;
		$sqq=M('city');
		//echo $ways_id;die;//
		$arr4=$sqq->where("parent_id=1")->select();
		//print_r($arr4);die;
	//	$mysql=M('wxzx');
		//$arr=$mysql->where("ways_id='$ways_id'")->select();
		//print_r($arr);die;//
		$this->assign('arr4',$arr4);
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
	
	}
	
	public function xiangqing(){
		header("Content-type: text/html; charset=utf-8");
		//订单详情
		//print_r($_GET);die;
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$w=$arr1['user_id'];	
		$id=I('get.id');
		$mysql=M('goods');
		$et=$mysql->where("id='$id' and u_phone='$username'")->find();
		if(!$et){
			$this->error("非法操作");
		}
		$question_id=$et['question_id'];
		$plan_id=$et['plan_id'];
		$quest=M('maintenance_question');
		$question=$quest->where("question_id in ($question_id)")->select();
		$pla=M('maintenance_plan');
		$plan=$pla->where("plan_id in ($plan_id)")->select();
		//echo 1;die;
		if($et['user_id']==0){//未接单之前
			$arr19=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->where("id='$id'")->find();
			$arr=$mysql->where("id='$id'")->find();
			if($arr['dasj']){
			$dasj=date("Y-m-d H", $arr['dasj']);
			}
			if($arr['dasjc']){
			$dasjc=date("Y-m-d H",$arr['dasjc']);
			}
			if($arr['wxzx_id']){
				$wxzx_id=$arr['wxzx_id'];
				$wx=M('wxzx');
				$a1=$wx->where("wxzx_id='$wxzx_id'")->find();
					$wxzx_n=$a1['wxzx_n'];
					$wxzx_name=$a1['wxzx_name'];
					$wxzx_phone=$a1['wxzx_phone'];
					$wxzx_time=$a1['wxzx_time'];
					//$wxzx_name=$a1['wxzx_name'];
			}
			if($arr['jxzx_id']){
				$jxzx_id=$arr['jxzx_id'];
				$wx=M('jxzx');
				$a1=$wx->where("jxzx_id='$jxzx_id'")->find();
					$jxzx_n=$a1['jxzx_n'];
					$jxzx_name=$a1['jxzx_name'];
					$jxzx_phone=$a1['jxzx_phone'];
					$jxzx_username=$a1['jxzx_username'];

			}
			if($arr['smwx_id']){
				$smwx_id=$arr['smwx_id'];
					$wx=M('smwx');
				$a1=$wx->where("smwx_id='$smwx_id'")->find();
				$smwx_name=$a1['smwx_name'];
			}
		$stau=$arr['stau'];
		$fk=$arr['fk'];
		if(($fk==110)){//可以进行取消订单
			$a='订单已取消';
		}else if($stau==0&&($fk==0)){
		$s="取消订单";
		}
		}else{
			$arr19=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("m_user on goods.user_id=m_user.user_id")
			->where("id='$id'")->find();
		$arr=$mysql
->where("id='$id'")->find();
		//print_r($arr);die;
		if($arr['dasj']){
			$dasj=date("Y-m-d H", $arr['dasj']);
			}//die;echo
			if($arr['dasjc']){
			$dasjc=date("Y-m-d H",$arr['dasjc']);
			}
			if($arr['wxzx_id']){
				$wxzx_id=$arr['wxzx_id'];
				$wx=M('wxzx');
				$a1=$wx->where("wxzx_id='$wxzx_id'")->find();
					$wxzx_n=$a1['wxzx_n'];
					$wxzx_name=$a1['wxzx_name'];
					$wxzx_phone=$a1['wxzx_phone'];
					$wxzx_time=$a1['wxzx_time'];
					//$wxzx_name=$a1['wxzx_name'];
			}
			if($arr['jxzx_id']){
				$jxzx_id=$arr['jxzx_id'];
				$wx=M('jxzx');
				$a1=$wx->where("jxzx_id='$jxzx_id'")->find();
					$jxzx_n=$a1['jxzx_n'];
					$jxzx_name=$a1['jxzx_name'];
					$jxzx_phone=$a1['jxzx_phone'];
					$jxzx_username=$a1['jxzx_username'];

			}
			if($arr['smwx_id']){
				$smwx_id=$arr['smwx_id'];
				$wx=M('smwx');
				$a1=$wx->where("smwx_id='$smwx_id'")->find();
				$smwx_name=$a1['smwx_name'];
			}
			$cc=M('jiance');
			$bb=M('chanpinku');	
			$xhjc_id=$arr['xhjc_id'];
			$cpk_id=$arr['cppk_id'];//echo die;
			$xqjc_id=$arr['xqjc_id'];
			$cpk_namee=$arr['cpk_namee'];
			if($xqjc_id){
			$arr8=$cc->where("jc_id in($xqjc_id)")->select();
			}
			if($xhjc_id){
			$arr9=$cc->where("jc_id in($xhjc_id)")->select();
			}
			if($cpk_namee){
			$arr10=$bb->where("cpk_id in ($cpk_namee)")->select();
			}
		$stau=$arr['stau'];
		$fk=$arr['fk'];
		//处理订单状态
		if(($fk==110)){
			$a='订单已取消';
		}else if(($stau==0)&&($fk==0)){
				$s="取消订单";
		}else if(($arr['amounttt'])&& $fk==0){
			$gg='去付款';
			$yh="优惠券";
		}else if(($fk==1)){
			$ch='交易完成';
		}
		
		
		}

		//echo $jxzx_n.$wxzx_n;die;
		$this->assign('dasjc',$dasjc);
		$this->assign('dasj',$dasj);
		$this->assign('smwx_name',$smwx_name);
		$this->assign('jxzx_n',$jxzx_n);
		$this->assign('jxzx_name',$jxzx_name);
		$this->assign('jxzx_phone',$jxzx_phone);
		$this->assign('jxzx_username',$jxzx_username);
		$this->assign('wxzx_n',$wxzx_n);
		$this->assign('wxzx_name',$wxzx_name);
		$this->assign('wxzx_phone',$wxzx_phone);
		$this->assign('wxzx_time',$wxzx_time);
		$this->assign('arr10',$arr10);
		$this->assign('arr8',$arr8);
		$this->assign('arr9',$arr9);
		$this->assign('question',$question);
		$this->assign('plan',$plan);
		$this->assign('gg',$gg);
		$this->assign('ch',$ch);
		$this->assign('yh',$yh);
		$this->assign('s',$s);
		$this->assign('a',$a);
		$this->assign('arr2',$arr2);
		$this->assign('arr19',$arr19);
		$this->display();
	}
	public function quxiaodingdan(){//取消订单
		$id=I('post.id');
		  $mysql=M('goods');
		  $arr1=$mysql->where("id='$id'")->find();
		$post['fk']=110;
		$post['stau']=10;//取消后改变状态和返回
		$arr=$mysql->where("id='$id'")->save($post);
		if($arr){
			$sql=M('zt_time');
			$datat['qx_time']=date('Y-m-d H:i:s', time());
			$arr1=$sql->where("goods_id='$id'")->save($datat);
			if($arr1){
				header('location:'. __CONTROLLER__."/dingdan");
			}
		}else{
			  $this->error('取消失败');
			 }
	
	}
	public function search(){
		$story=$_COOKIE['story'];
		$this->assign('story',$story);
		$this->display();
	}
	public function searchajax_a(){
			$sea=I('get.sea');
			$mysql=M('maintenance_model');
			$arr=$mysql->where("model_name like '%$sea%'")->order("pai_id")->select();
			$this->assign('arr',$arr);
		//	print_r($arr);die;
			$this->display();
	
	}
	public function searchajax(){
	 $sea=I('get.sea');
	 $mysql=M('maintenance_model');
		$arr=$mysql
		//->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		//->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		//->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		//->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("model_name like '%$sea%'")->select();
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	
	}

	public function colorr(){
		 header("Content-type: text/html; charset=utf-8"); 
		 $model_id=I('get.model_id');
		
		$mysql=M('maintenance_model');
		$arr=$mysql->where("model_id='$model_id'")->find();
		$model_name=$arr['model_name'];//die;echo
		//cookie('story',null);
		$model=$_COOKIE['story'];
		if((strpos($model,$model_name)) === false){
			if($model==''){
				$model=$model_name;
				cookie('story',$model);
			}else{
			$model=$model.','.$model_name;
			cookie('story',$model);
		
			}
				
		}	
		//print_r($_COOKIE['story']);die;
		$color_id=$arr['color_id'];//die;echo
		$sql=M('maintenance_color');
		$arr1=$sql->where("color_id in($color_id)")->select();
		//print_r($arr1);die;
		$this->assign('arr1',$arr1);
		$this->assign('model_id',$model_id);
		$this->display();
	
	}
	public function price(){
		$mysql=M('maintenance_brand');
		$arr=$mysql->where("brand_zt='0'")->select();
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function jixing(){
		$brand_id=I('get.brand_id');
		$mysql=M('maintenance_model');

		$arr1=$mysql->where("brand_id='$brand_id' and model_zt='0'")->select();
		//print_r($arr1);die;
		$this->assign('arr1',$arr1);
		$this->display();
	
	}
	public function jiejuefangan(){
		$model_id=I('get.model_id');
		$mysql=M('maintenance_plan');
		$arr2=$mysql->where("model_id='$model_id' and plan_zt='0'")->select();
		$this->assign('arr2',$arr2);
		$this->display();
	
	
	}
	public function zhuangtai(){//订单状态的时间追踪
		$id=I('get.id');
		$username=$_COOKIE['username'];
		$sqlsw=M('yhq');
		$sqlw=M('yonghuuser');
		$arr21=$sqlw->where("phone='$username'")->find();
		$k_userid=$arr21['k_userid'];
		$arrdd=$sqlsw->where("k_userid='$k_userid'")->find();
		$sql=M('goods');
		$arr1=$sql->where("id='$id' and u_phone='$username'")->find();
		$amountt=$arr1['amountt'];
		$amount=$arr1['amount'];
		if(!$arr1){
			$this->error('非法操作');
		}
		$fk=$arr1['fk'];
		//echo $arr1['ways_id'];DIE;
		$mysql=M('zt_time');
		$arr=$mysql->where("goods_id='$id'")->find();
	if($arr1['ways_id']==1){//上门状态
	if($fk==110){
		$l='订单已取消';
		$lx='您的订单已取消,如有疑问请致电 4008-030-603';
		$qx_time=$arr['qx_time'];
	}else if(($arr1['stau']==0)&&($fk==0)){
		$s='取消订单';
	}else if($arr1['fk_time']){
		$fk_timew='付款成功';
		$fk_time=$arr1['fk_time'];//echodie;
		$a='交易完成';
	}else
	if($arr1['stau']==4){
		$ho_timew='等待付款';
		if($arrdd){
		$youhui='您有优惠券可用';
		}
		$ho_time=$arr['ho_time'];
		$ho_timex='维修已完成，请您尽快确认支付';
		$gg='去付款';
	}
	if($arr['xo_time']){
		$xo_timew='下单成功';
		$xo_time=$arr['xo_time'];
		$xo_timex='您的订单已提交成功,请耐心等待工程师确认';
	}  if($arr['jo_time']){
		$jo_timew='已接单';
		$jo_time=$arr['jo_time'];
		$jo_timex='工程师已成功接单,请等待工程师上门';
	}if($arr['ko_time']){
		$ko_timew='维修中';
		$ko_time=$arr['ko_time'];
		$ko_timex='订单开始维修,请您耐心等待';
	}
	
	
	}
	if($arr1['ways_id']==2){//到店状态
	if($fk==110){
		$l='订单已取消';
		$lx='您的订单已取消,如有疑问请致电 4008-030-603';
		$qx_time=$arr['qx_time'];
	}else if(($arr1['stau']==0)&&($fk==0)){
		$s='取消订单';
	}else if($arr1['fk_time']){
		$fk_timew='付款成功';
		$fk_time=$arr1['fk_time'];//echodie;
		$a='交易完成';
	}else if($arr1['stau']==4){
		$ho_timew='等待付款';
		$ho_time=$arr['ho_time'];
			if($arrdd){
		$youhui='您有优惠券可用';
		}
		$ho_timex='维修已完成，请您尽快确认支付';
		$gg='去付款';
	}
	
	if($arr['xo_time']){
		$xo_timew='下单成功';
		$xo_time=$arr['xo_time'];
		$xo_timex='您的订单已提交成功,请您按地址前往实体店维修';
	} if($arr['po_time']){
		$po_timew='已指派';
		$po_time=$arr['po_time'];
		$po_timex='已为您分配工程师';
	}  if($arr['jo_time']){
		$jo_timew='已接单';
		$jo_time=$arr['jo_time'];
		$jo_timex='工程师已成功接单';
	}if($arr['ko_time']){
		$ko_timew='维修中';
		$ko_time=$arr['ko_time'];
		$ko_timex='订单开始维修,请您耐心等待';
	}
	
	}
	if($arr1['ways_id']==3){//邮寄状态
	
	if($fk==110){
		$l='订单已取消';
		$lx='您的订单已取消,如有疑问请致电 4008-030-603';
		 $qx_time=$arr['qx_time'];
		//echo 1;DIE;
	}
	else if(($arr1['stau']==0)&&($fk==0)){
		$s='取消订单';
	}else if($arr1['fk_time']){
		$fk_timew='付款成功';
		$fk_time=$arr1['fk_time'];//echodie;
		$a='交易完成';
	}else if($arr1['stau']==4){
		$ho_timew='等待付款';
		if($arrdd){
		$youhui='您有优惠券可用';
		}
		$ho_time=$arr['ho_time'];
		$ho_timex='维修已完成，请您尽快确认支付';
		$gg='去付款';
	}
	if($arr['xo_time']){
		$xo_timew='下单成功';
		$xo_time=$arr['xo_time'];
		$xo_timex='您的订单已提交成功,请尽快用顺丰寄出';
	}if($arr['po_time']){
		$po_timew='已收件';
		$po_time=$arr['po_time'];
		$po_timex='您的快递已签收,即将为您分配工程师';
	} if($arr['jo_time']){
		$jo_timew='已接单';
		$jo_time=$arr['jo_time'];
		$jo_timex='工程师已成功接单';
	} if($arr['ko_time']){
		$ko_timew='维修中';
		$ko_time=$arr['ko_time'];
		$ko_timex='订单开始维修,请您耐心等待';
	}
	
	
	}	
		$this->assign('amountt',$amountt);
		$this->assign('amount',$amount);
		$this->assign('youhui',$youhui);
		$this->assign('s',$s);
		$this->assign('lx',$lx);
		$this->assign('l',$l);
		$this->assign('a',$a);
		$this->assign('qx_time',$qx_time);
		$this->assign('po_timex',$po_timex);
		$this->assign('ho_timex',$ho_timex);
		$this->assign('ko_timex',$ko_timex);
		$this->assign('jo_timex',$jo_timex);
		$this->assign('xo_timex',$xo_timex);
		$this->assign('fk_timew',$fk_timew);
		$this->assign('fk_time',$fk_time);
		$this->assign('xo_time',$xo_time);
		$this->assign('po_time',$po_time);
		$this->assign('jo_time',$jo_time);
		$this->assign('ko_time',$ko_time);
		$this->assign('ho_time',$ho_time);
		$this->assign('xo_timew',$xo_timew);
		$this->assign('po_timew',$po_timew);
		$this->assign('jo_timew',$jo_timew);
		$this->assign('ko_timew',$ko_timew);
		$this->assign('qo_timew',$qo_timew);
		$this->assign('ho_timew',$ho_timew);
		$this->assign('gg',$gg);
		$this->assign('id',$id);//
		$this->assign('arr1',$arr1);
		$this->display();
	
	}
	public function youji(){//邮寄
		$ways_id=I('get.id');
		$sqq=M('city');
	
	$arr4=$sqq->where("parent_id=1")->select();
		$this->assign('arr4',$arr4);
		//$this->assign('arr',$arr);
		$this->assign('ways_id',$ways_id);
		$this->display();
	}
	public function daodian(){//到店
	$ways_id=I('get.id');
		$this->display();
	}
	public function shi(){//城市列表
		$id=I('get.id');
		$ways_id=I('get.ways_id');
		//echo $id;die;
		$sqq=M('city');
		$arr=$sqq->where("parent_id='$id'")->select();
		$this->assign('arr',$arr);
		$this->assign('ways_id',$ways_id);
		$this->display();
	}
	public function qu(){//区的列表
		$id=I('get.id');
		$ways_id=I('get.ways_id');
		//echo $id;die;
		$sqq=M('city');
		$arr=$sqq->where("parent_id='$id'")->select();
		//print_r($arr);
		$this->assign('arr',$arr);
		$this->assign('ways_id',$ways_id);
		$this->display();
	}
	public function  dizhia(){//地址
		$ways_id=I('get.ways_id');
			//$m=M('wxzx');
	//$arr9=$m->where("ways_id='3'")->select();
		$t='详细地址';
	$this->assign('t',$t);
	$this->display();
	}
	public function add_order(){//订单提交	
			$fanwei=I('post.fanwei');
			$nums=stripos($fanwei,',')+1;
			$fanwei=substr($fanwei,$nums);
			$dasj=$post['dasj']=I('post.dasj');//die;//	echo 
			$dasjc=$post['dasjc']=I('post.dasjc');
			$time=(date('Y-m-d H',time()));//die;echo 
			
			$dasjc=(date('Y-m-d H:00',$dasjc));
			
			$dasj=(date('Y-m-d H:00',$dasj));
			if($dasj){
			$dasj=$dasj.'至';
			}
			$post['fanwei']=$fanwei;
			$smwx=I('post.fanweia');
			if($smwx=='北京服务范围'){
				$smwx=1;
			}
			 $post['smwx_id']=$smwx;
			$model_id=I('post.model_id');
			$ways_id=I('post.ways_id');
			$youhui=I('post.youhui');
			$nu=strlen($youhui);
			if($nu=='6'){
					$fvf=M('yaoqingma');
					$cdv=$fvf->where("yq_name='$youhui'")->find();
					if($cdv){
						$yq_id=$cdv['yq_id'];
					}
			}else if($nu=='8'){
				$fvf=M('yonghuwx');
				$cdv=$fvf->where("yonghu_ma='$youhui'")->find();
				if($cdv){
				$yonghuwx_id=$cdv['yonghuwx_id'];//die;echo 
				}
			}
				if(I('post.wxzx_id')){
					$post['wxzx_id']=I('post.wxzx_id');
					$codeid=4237;
				}
				$post['jxzx_id']=I('post.jxzx_id');
				$dianhua=I('post.dianhua');
			$post['ways_id']=$ways_id;
			$shill=I('post.shill');
			$ddh=$post['ddh']=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
			$u_phone=$post['u_phone']=$r=I('post.u_phone','','trim');
			$tel_preg="/^1[3,5,7,8,4]\d{9}$/";
			if(!preg_match($tel_preg,$u_phone)){
				$this->error('非法操作');
			}
			//$post['u_title']=I('post.u_title','','trim');
			$post['amountd']=I('post.amountd','','trim');
			$u_name=$post['u_name']=addslashes(I('post.u_name','','trim'));
			//$post['content']=I('post.content','','trim');
			$plan_id=$post['plan_id']=I('post.plan_id','','trim');
			$question_id=$post['question_id']=I('post.question_id');
			$color_id=$post['color_id']=I('post.color_id');
			$erp=M('maintenance_ways');
			$arrt=$erp->where("ways_id='$ways_id'")->select();
					//print_r($arrt);die;
				foreach ($arrt as $k){
				$post['ways_name']=$k['ways_name'];//	echo die;;
				}		
			$u_note=$post['u_note']=addslashes(I('post.u_note','','trim'));
			$address=addslashes(I('post.address'));
			//$address=addslashes(I('post.address'));//=
			if($ways_id==3){
			$u_address=$post['u_address']=$shill.','.$address;
			$codeid=4236;
			}
			
			if($ways_id==1){
				$shangmen=$post['shangmen']=$shill.','.$address;
				$codeid=4238;
			}
			   $post['fk']=0;
			   $post['stau']=0;
			   $post['user_id']=0;
			   $post['warranty']=I('post.warranty');
			   $post['u_title']=I('post.u_title'); 
			   $model_id=$post['model_id']=I('post.model_id');  //
				$mysql=M('goods');
				$arr=$mysql->add($post);
			 $llk=M('m_user');
			 $wei=$llk->where("user_name='$dianhua'")->find();
			 $user_id=$wei['user_id'];
			 $customer_id=$wei['customer_id'];
				$sl=M('zt_time');
				$data['goods_id']=$arr;
				$xo_time=$data['xo_time']=date('Y-m-d H:i:s', time());
				$gg=$sl->add($data);
			 if($wei){
				$cst['user_id']=$user_id;
				$cst['stau']=1;
				$xsdc=$mysql->where("id='$arr'")->save($cst);
				if($xsdc){
				
				$da['po_time']=date('Y-m-d H:i:s', time());
				
				$ar1=$sl->where("goods_id='$arr'")->save($da);
				$sqllp=M('wd_customer');
		$ww=$sqllp->where("customer_id='$customer_id'")->find();
		 $openid=$ww['openid'];
		$post['stau']=1;
		$arrt=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")->join("maintenance_model on goods.model_id=maintenance_model.model_id")->where("id='$arr'")->find();
		
		$shijian=$sl->where("goods_id='$arr'")->find();
		 $xo_time=$shijian['xo_time'];
		 $ddha=$shijian['ddh'];
		$dasjj=$arrt['dasj'];
		$dasjjc=$arrt['dasjc'];
		$dasjjc=(date('Y-m-d H:00',$dasjjc));
		$dasjj=(date('Y-m-d H:00',$dasjj));
		if($dasjj){
			$dasjj=$dasjj.'至';
		}
		$ways_idd=$arrt['ways_id'];
		$ways_named=$arrt['ways_name'];
		$ddhd=$arrt['ddh'];
		$u_named=$arrt['u_name'];
		$u_phoned=$arrt['u_phone'];
		$shangmend=$arrt['shangmen'];
		$u_addressd=$arrt['u_address'];
		$u_noted=$arrt['u_note'];
		$model_named=$arrt['model_name'];
		$question_idd=$arrt['question_id'];
		$quest=M('maintenance_question');	
			$arrw=$quest->where("question_id in($question_idd)")->select();
			$question_named='';
			foreach($arrw as $k=>$v){
				$question_named.=','.$v['question_name'];
			}
				$question_named=substr($question_named,1);
				 $dd=$model_named.'  '.$question_named;
			$access_token = getnewtoken();
			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			$ways_named=$ways_named.'  '.$dasjj.' '.$dasjjc;
			$datatt['touser'] = $openid;
			$datatt['template_id'] = 'hqUidiUNHcjFCtUIO1C8_vYZWwh8uVuhFX-Kka3Syo4';
			$datatt['url'] = 'http://m.weibaishi.com/Home/Shifu/shifu';
			$firstd ='老客户订单，指定给您需要处理。';
			$datatt['data'] = array(
				'first' => array('value'=>$firstd,'color'=>'#173177'),
				'keyword1' => array('value'=>$ddhd,'color'=>'#173177'),
				'keyword2' => array('value'=>$ways_named,'color'=>'#173177'),
				'keyword3' => array('value'=>$xo_time,'color'=>'#173177'),
				'keyword4' => array('value'=>$u_named,'color'=>'#173177'),
				'keyword5' => array('value'=>$shangmend.$u_addressd,'color'=>'#173177'),
				'remark' => array('value'=>$dd,'color'=>'#173177'),
				);
			$post_msg = json_encode($datatt);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
				}
			 }
			if($arr){
				//短信触发
				$duan=M('maintenance_model');
				$cdf=$duan->where("model_id='$model_id'")->find();
				$model_name=$cdf['model_name'];
				$url = 'http://sms.jiangukj.com/SendSms.aspx?';
				header("Content-type: text/html; charset=utf-8");
				$data = array('action' => 'code',
				'username' => 'bjjxsg',
				'userpass' => '7bi58n',
				'mobiles' => $u_phone,
				'content' => $model_name,
				'codeid' =>$codeid,
				);
				$db = new UtilController();
				$result = $db->request($url, 'POST',$data);
				//为了接入逸创做准备信息
				//$goodl=M('wd_customer');
				//$all=$goodl->where("customer_id='1'")->find();
	
			//elseif($ret->errmsg == 'ok'){
			//	header('location:'. __MODULE__."/index/dingdan");
			//}else{
			///	echo json_encode(array('msg'=>'发送消息失败','code'=>0));
			//}
			
		}

			
				$yc1=M('maintenance_plan');
					$a1=$yc1->where("plan_id in($plan_id)")->select();
						$money='';
						foreach($a1 as $k=>$v){
							$plan_name.=','.$v['plan_name'];
							$money.=','.$v['money'];
						}
						$money=substr($money,1);
					if(!(strpos($money,'需检测') === false)){
							$money='需检测';
						}else{
							foreach($a1 as $k=>$v){
							$mone+=$v['money'];
							}
							$mone;
						}
						$plan_name=substr($plan_name,1);
				$yc2=M('maintenance_question');
					$a2=$yc2->where("question_id in($question_id)")->select();
						foreach($a2 as $k=>$v){
							$question_name.=','.$v['question_name'];
						}
						$question_name=substr($question_name,1);
						$yc3=M('goods');
					$a3=$yc3->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
				->join("maintenance_model on goods.model_id=maintenance_model.model_id")
				->join("maintenance_color on goods.color_id=maintenance_color.color_id")
				->where("id='$arr'")->find();
					$ddh=$a3['ddh'];
						if($a3['jxzx_id']){
							$jxzx_id=$a3['jxzx_id'];
						$c=M('jxzx');
						$bb=$c->where("jxzx_id='$jxzx_id'")->find();
							$jxzx_name=$bb['jxzx_name'];
							$jxzx_n=$bb['jxzx_n'];
							$jxzx_phone=$bb['jxzx_phone'];
							$jxzx_username=$bb['jxzx_username'];
					
						}
						if($a3['wxzx_id']){
							$wxzx_id=$a3['wxzx_id'];
						$d=M('wxzx');
						$ee=$d->where("wxzx_id='$wxzx_id'")->find();
							$wxzx_name=$ee['wxzx_name'];
							$wxzx_n=$ee['wxzx_n'];
							$wxzx_phone=$ee['wxzx_phone'];
							$wxzx_time=$ee['wxzx_time'];
						}
						
				$color_name=$a3['color_name'];
				$model_name=$a3['model_name'];
				$ways_name=$a3['ways_name'];
				
				//die;echo
		
			$model=$model_name.$color_name;
			
			 $dizhi=$jxzx_name.$jxzx_n.$jxzx_phone.$jxzx_username.$wxzx_name.$wxzx_n.$wxzx_phone.$wxzx_time.$shangmen.$u_address;
			$content='<P>手机维修</p><p>姓名:'.$u_name.'</p><p>电话:'.$r.'</p><P>机型:'.$model.'</p><p>问题:'.$question_name.'</p><p>方案:'.$plan_name.'</p><p>价格:'.$mone.'</p><p>方式:'.$ways_name.'</p><P>地址:'.$dizhi.'</p><P>客户备注:'.$u_note.'</p><p>预约时间:'.$dasj.$dasjc.'</p>';
			$d=$model.'  '.$question_name;
			
					//微信推送消息

				$sqlll=M('m_user');
				$dgg=$sqlll->where("sfzt='1'")->select();
				$userid='';
					foreach ($dgg as $k=>$v){
						$userid.=','.$v['user_id'];
					}
					$userid=substr($userid,1);
		$arrlll=$sqlll->join("wd_customer on m_user.customer_id=wd_customer.customer_id")->where("user_id in($userid)")->select();
		$a=count($arrlll);
			$openid='';
		 foreach ($arrlll as $kk=>$vv){
			$openid.=','.$vv['openid'];	
		 }
		 $openid=substr($openid,1);
		$openid=explode(',',$openid);//die;print_r( )
		 $access_token = getnewtoken();
			
		if($ways_id==1 &&(!$dianhua)){
		for($i=0;$i<$a;$i++){
			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			//echo $url;exit;
			$datatt['touser'] = $openid[$i];
			$datatt['template_id'] = 'EB_2ZZziqqag5xzG1VMLmECmXcoCdoKhTR_4IjGEk_I';
			$datatt['url'] = 'http://m.weibaishi.com/Home/Shifu/shifu';
			$first =$ways_name.'    '.$dasj.$dasjc;
			$datatt['data'] = array(
				'first' => array('value'=>$first,'color'=>'#173177'),
				'keyword1' => array('value'=>$ddh,'color'=>'#173177'),
				'keyword2' => array('value'=>$u_name,'color'=>'#173177'),
				'keyword3' => array('value'=>$r,'color'=>'#173177'),
				'keyword4' => array('value'=>$shangmen.$u_address,'color'=>'#173177'),
				'keyword5' => array('value'=>$u_note,'color'=>'#173177'),
				'remark' => array('value'=>$d,'color'=>'#173177'),
				);
			$post_msg = json_encode($datatt);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
		
			if($ret->errmsg != 'ok') 
			{
				$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
				$ret_json = curl_grab_page($url, $post_msg);
				echo $ret_json;

			}
			}
		}
				$ds=M('yonghuuser');
				$df=$ds->where("phone='$r'")->find();
				$k_userid=$df['k_userid'];
			if(!$df){
				$po['phone']=$phone=$post['u_phone'];
				$po['yonghuname']=$post['u_name'];
					
				$dd=$ds->add($po);
				if($dd){
				if($yq_id){
				$yqm=M('yaoqingma');
				$sdd=$yqm->where("yq_id='$yq_id'")->find();
				$lk['yhqprice']=$sdd['yq_price'];
				$yq_user_id=$sdd['yq_user_id'];
				$lk['yq_id']=$yq_id=$sdd['yq_id'];
				$lk['k_userid']=$dd;
				$lk['ma']=randomkeys(16); 
				$slos=M('yhq');
				$cdn=$slos->add($lk);
				if($cdn){
				$hjob=M('yaoqingma');
				$rtyu=$hjob->join("m_user on yaoqingma.yq_user_id=m_user.user_id")->join("wd_customer on m_user.customer_id=wd_customer.customer_id")->where("yq_id='$yq_id'")->find();
				$opid=$rtyu['openid'];
			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			$datatt['touser'] = $opid;
			$datatt['template_id'] = 'PZmbvEASyFYanaS94QJif3H5f9hfvdgxudhe8rEYeig';
			$datatt['url'] = 'http://m.weibaishi.com/Home/Shifu/shifu';
			$first ='您推荐的客户，已经预约成功，交易完成后会有现金红包奖励';
			$datatt['data'] = array(
				'first' => array('value'=>$first,'color'=>'#173177'),
				'keyword1' => array('value'=>$u_name,'color'=>'#173177'),
				'keyword2' => array('value'=>$r,'color'=>'#173177'),
				'keyword3' => array('value'=>$xo_time,'color'=>'#173177'),
				'keyword4' => array('value'=>$d,'color'=>'#173177'),
				'remark' => array('value'=>$u_note,'color'=>'#173177'),
				);
			$post_msg = json_encode($datatt);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
				
					$gjkk['yq_id']=$yq_id;
				$jjL=$mysql->where("id='$arr'")->save($gjkk);
				}
				}else if($yonghuwx_id){
				$yqm=M('yonghuwx');
				$sdd=$yqm->where("yonghuwx_id='$yonghuwx_id'")->find();
				$openid=$sdd['openid'];
				$lk['yhqprice']=$sdd['yonghu_price'];
				//$yq_user_id=$sdd['yq_user_id'];
				$lk['yonghuwx_id']=$yonghuwx_id=$sdd['yonghuwx_id'];
				$lk['k_userid']=$dd;
				$lk['ma']=randomkeys(16); 
				$slos=M('yhq');
				$cdn=$slos->add($lk);
			$access_token = getnewtoken();
			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			$ways_named=$ways_named.'  '.$dasjj.' '.$dasjjc;
			$datatt['touser'] = $openid;
			$datatt['template_id'] = 'M_CkufutnrCYya_7WBXXm7i8BEv7Qqts0XL7-PQBwjM';
			$datatt['url'] = 'http://m.weibaishi.com';
			$firstd ='您推荐的客户，已经预约成功，交易完成后会有现金红包奖励';
			$datatt['data'] = array(
				'first' => array('value'=>$firstd,'color'=>'#173177'),
				'keyword1' => array('value'=>'邀请有礼','color'=>'#173177'),
				'keyword2' => array('value'=>'30元','color'=>'#173177'),
				'keyword3' => array('value'=>$xo_time,'color'=>'#173177'),
				'keyword4' => array('value'=>$dddha,'color'=>'#173177'),
				'remark' => array('value'=>'恭喜您','color'=>'#173177'),
				);
			$post_msg = json_encode($datatt);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
				if($cdn){
			
				
					$gjkk['yonghuwx_id']=$yonghuwx_id;
				$jjL=$mysql->where("id='$arr'")->save($gjkk);
				}
				}
				
				
				$email=$r.'@111.com';
				$data = array(
					'email'=>$email,
					'phone'=>$r,
					'title'=>'手机维修',
					'comment'=>array('content'=>$content),
					'requester'=>array('email'=>$email,'name'=>$username),
					'custom_fields'=>array(
						array('name'=>'field_10084','value'=>'手机维修'),	
				),
				
				);
					//调取逸创方法
					require_once APP_PATH.'Common/Util/Kf/Client.php';
					//必要的账号密码HTTPS
					$config = array(
						'domain'=>'weibaishi.kf5.com',
						'email'=>'61638325@qq.com',
						'token'=>'b493fa8d928e689664453fede7b134',
						'password'=>'nihao123',
					);
					//权限
					$client = new \Client($config['domain'], $config['email']);
					$client->setAuth('token', $config['token']);
					$result = $client->tickets()->create($data);
					if($result){
						cookie('username',$r);
					if($dasjc){
					
						header("location:http://m.weibaishi.com/order");
					}
				
					}
				}
				
	}else{
			if($yq_id){
				$yqm=M('yaoqingma');
				$sdd=$yqm->where("yq_id='$yq_id'")->find();
				$lk['yhqprice']=$sdd['yq_price'];
				$yq_user_id=$sdd['yq_user_id'];
				$lk['yq_id']=$yq_id=$sdd['yq_id'];
				$lk['k_userid']=$k_userid;
				$lk['ma']=randomkeys(16); 
				$slos=M('yhq');
				$cdn=$slos->add($lk);
				if($cdn){
				$hjob=M('yaoqingma');
				$rtyu=$hjob->join("m_user on yaoqingma.yq_user_id=m_user.user_id")->join("wd_customer on m_user.customer_id=wd_customer.customer_id")->where("yq_id='$yq_id'")->find();
				$opid=$rtyu['openid'];
			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			$datatt['touser'] = $opid;
			$datatt['template_id'] = 'M_CkufutnrCYya_7WBXXm7i8BEv7Qqts0XL7-PQBwjM';
			$datatt['url'] = 'http://m.weibaishi.com';
			$firstd ='您推荐的客户，已经预约成功，交易完成后会有现金红包奖励';
			$datatt['data'] = array(
				'first' => array('value'=>$firstd,'color'=>'#173177'),
				'keyword1' => array('value'=>'邀请有礼','color'=>'#173177'),
				'keyword2' => array('value'=>'30','color'=>'#173177'),
				'keyword3' => array('value'=>$xo_time,'color'=>'#173177'),
				'keyword4' => array('value'=>$dddha,'color'=>'#173177'),
				'remark' => array('value'=>'恭喜您','color'=>'#173177'),
				);
			$post_msg = json_encode($datatt);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
				
					$gjkk['yq_id']=$yq_id;
				$jjL=$mysql->where("id='$arr'")->save($gjkk);
				}
				}else if($yonghuwx_id){
					$ds=M('yonghuuser');
					$df=$ds->where("phone='$r'")->find();
				$k_userid=$df['k_userid'];
						$yqm=M('yonghuwx');

				$sdd=$yqm->where("yonghuwx_id='$yonghuwx_id'")->find();
				$lk['yhqprice']=$sdd['yonghu_price'];
				$openid=$sdd['openid'];
				//$yq_user_id=$sdd['yq_user_id'];
				$lk['yonghuwx_id']=$yonghuwx_id=$sdd['yonghuwx_id'];
				$lk['k_userid']=$k_userid;
				$lk['ma']=randomkeys(16); 
				$slos=M('yhq');
				$cdn=$slos->add($lk);
			
				if($cdn){
						$access_token = getnewtoken();
			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			$ways_named=$ways_named.'  '.$dasjj.' '.$dasjjc;
			$datatt['touser'] = $openid;
			$datatt['template_id'] = 'M_CkufutnrCYya_7WBXXm7i8BEv7Qqts0XL7-PQBwjM';
			$datatt['url'] = 'http://m.weibaishi.com';
			$firstd ='您推荐的客户，已经预约成功，交易完成后会有现金红包奖励';
			$datatt['data'] = array(
				'first' => array('value'=>$firstd,'color'=>'#173177'),
				'keyword1' => array('value'=>'邀请有礼','color'=>'#173177'),
				'keyword2' => array('value'=>'30元','color'=>'#173177'),
				'keyword3' => array('value'=>$xo_time,'color'=>'#173177'),
				'keyword4' => array('value'=>$dddha,'color'=>'#173177'),
				'remark' => array('value'=>'恭喜您','color'=>'#173177'),
				);
			$post_msg = json_encode($datatt);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
				
					$gjkk['yonghuwx_id']=$yonghuwx_id;
				$jjL=$mysql->where("id='$arr'")->save($gjkk);
				}
				
				}
			$email=$r.'@163.com';
				$data = array(
					'email'=>$email,
					'phone'=>$tell,
					'title'=>'手机维修',
					'comment'=>array('content'=>$content),
					'requester'=>array('email'=>$email,'name'=>$username),
					'custom_fields'=>array(
						array('name'=>'field_10169','value'=>$u_name),
						array('name'=>'field_10170','value'=>$r),
						array('name'=>'field_10084','value'=>'手机维修'),
						array('name'=>'field_10175','value'=>$model),
						array('name'=>'field_10171','value'=>$question_name),
						array('name'=>'field_10172','value'=>$plan_name),
						array('name'=>'field_10173','value'=>$money),
						array('name'=>'field_10174','value'=>$ways_name),
						
						array('name'=>'field_10083','value'=>$dizhi),
						
				),
				
				);
					//调取逸创方法
					require_once APP_PATH.'Common/Util/Kf/Client.php';
					//必要的账号密码HTTPS
					$config = array(
						'domain'=>'weibaishi.kf5.com',
						'email'=>'61638325@qq.com',
						'token'=>'b493fa8d928e689664453fede7b134',
						'password'=>'nihao123',
					);
					//权限
					$client = new \Client($config['domain'], $config['email']);
					$client->setAuth('token', $config['token']);
					$result = $client->tickets()->create($data);
					if($result){
				cookie('username',$r);
						header("location:http://m.weibaishi.com/order");
					
					}
	}
				
	}
	
	public function denglu(){
		//用户登录
		$mysql=M("yonghuuser");
		$username=$_GET['u_phone'];
		$nums=$_GET['nums'];
		$arr1=$mysql->where("phone='$username'")->find();
		$phonee=$arr1['phone'];
		$num=$arr1['yzm'];
		if($phonee==$username && $num==$nums){
			
			$arr=$mysql->where("phone='$phone'")->find();
			if($arr){
				cookie('username',$username);
			}else{
				cookie('username',$username);
				$post['phone']=$phone;
				$mysql->add($post);
			}
		}else{
			echo "2";
		}
	}
	public function dingdan(){//用户订单页面
	
		header("Content-type: text/html; charset=utf-8"); 
	 	$username=$_COOKIE['username'];
		require_once APP_PATH.'Common/Cf/my.php';
		$mysql=M("goods");
		$arr=$mysql
			->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("zt_time on goods.id=zt_time.goods_id")
		->where("u_phone='$username'")->order('id desc')->select();
		//print_r($arr);die;
		$c='详情';
		$this->assign('h',$h);
		$this->assign('c',$c);
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->display();
	}

	public function fuku(){
			$fk=I('get.fk');
		$username=$_COOKIE['username'];
		require_once APP_PATH.'Common/Cf/my.php';
			$mysql=M("goods");
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("u_phone='$username' and fk='1'")->select();
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->display();
	}

	//微信红包

	public function hongbao(){
		$openid='oDyuPwj1qfpGvnTVHggaSYzhrBqk';
		$url = "https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack";
           
            $mch_billno = '1316066901' . date ( "YmdHis", time () ) . rand ( 1000, 9999 );      //商户订单号
            $mch_id = '1316066901';                         //微信支付分配的商户号
            $wxappid = 'wx5e99bbf914658fb6';        //公众账号appid
            $send_name = "维百士";                          //商户名称
            $re_openid = "oDyuPwj1qfpGvnTVHggaSYzhrBqk";         //用户openid
            $total_amount = "1";                              // 付款金额，单位分
            $total_num = 1;                                          //红包发放总人数
            $wishing = "恭喜发财，哈哈哈";                             //红包祝福语
            $client_ip = "101.200.219.26";                //Ip地址
            $act_name = "关注有礼";                         //活动名称
            $remark = "测试";                                      //备注
            $apikey = "weibaishishoujifuwuhx15811207510";   // key 商户后台设置的  微信商户平台(pay.weixin.qq.com)-->账户设置-->API安全-->密钥设置
            $nonce_str =  md5(rand());                                  //随机字符串，不长于32位
            $m_arr = array (
                    'mch_billno' => $mch_billno,
                    'mch_id' => $mch_id,
                    'wxappid' => $wxappid,
                    'send_name' => $send_name,
                    're_openid' => $re_openid,
                    'total_amount' => $total_amount,
                    'total_num' => $total_num,
                    'wishing' => $wishing,
                    'client_ip' => $client_ip,
                    'act_name' => $act_name,
                    'remark' => $remark,
                    'nonce_str'=> $nonce_str
            );
            array_filter ( $m_arr ); // 清空参数为空的数组元素
            ksort ( $m_arr ); // 按照参数名ASCII码从小到大排序
            
            $stringA = "";
            foreach ( $m_arr as $key => $row ) {
                $stringA .= "&" . $key . '=' . $row;
            }
            $stringA = substr ( $stringA, 1 );
            // 拼接API密钥：
            $stringSignTemp = $stringA."&key=" . $apikey;
            $sign = strtoupper ( md5 ( $stringSignTemp ) );         //签名
       
            $textTpl = '<xml>
                        <sign><![CDATA[%s]]></sign>
                        <mch_billno><![CDATA[%s]]></mch_billno>
                        <mch_id><![CDATA[%s]]></mch_id>
                        <wxappid><![CDATA[%s]]></wxappid>
                        <send_name><![CDATA[%s]]></send_name>
                        <re_openid><![CDATA[%s]]></re_openid>
                        <total_amount><![CDATA[%s]]></total_amount>
                        <total_num><![CDATA[%s]]></total_num>
                        <wishing><![CDATA[%s]]></wishing>
                        <client_ip><![CDATA[%s]]></client_ip>
                        <act_name><![CDATA[%s]]></act_name>
                        <remark><![CDATA[%s]]></remark>
                        <nonce_str><![CDATA[%s]]></nonce_str>
                        </xml>';
            // print_r($textTpl);die;
     $resultStr = sprintf($textTpl, $sign, $mch_billno, $mch_id, $wxappid, $send_name,$re_openid,$total_amount,$total_num,$wishing,$client_ip,$act_name,$remark,$nonce_str);
     
      $info = $this->curl_post_ssl($url, $resultStr);
      //print_r($info);die;
	}

	/// 微信红包调用的方法
	function curl_post_ssl($url, $vars, $second=30,$aHeader=array())
{
    $ch = curl_init();
    //超时时间
    curl_setopt($ch,CURLOPT_TIMEOUT,$second);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    //这里设置代理，如果有的话
    //curl_setopt($ch,CURLOPT_PROXY, '10.206.30.98');
    //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
   
    //以下两种方式需选择一种
   
    //第一种方法，cert 与 key 分别属于两个.pem文件
    //默认格式为PEM，可以注释
    curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
    curl_setopt($ch,CURLOPT_SSLCERT,getcwd().'/cj/apiclient_cert.pem');
    // 默认格式为PEM，可以注释
    curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
    curl_setopt($ch,CURLOPT_SSLKEY,getcwd().'/cj/apiclient_key.pem');
   
    //第二种方式，两个文件合成一个.pem文件
    //curl_setopt($ch,CURLOPT_SSLCERT,getcwd().'/all.pem');
 
    if( count($aHeader) >= 1 ){
        curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
    }
 
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$vars);
    $data = curl_exec($ch);
    if($data){
        curl_close($ch);
        return $data;
    }
    else {
        $error = curl_errno($ch);
        echo "call faild, errorCode:$error\n";
        curl_close($ch);
        return false;
    }
}




	public function lists(){
		header("Content-type: text/html; charset=utf-8");
      require_once APP_PATH.'Common/Util/Kf/Client.php';
		$config = array(
			'domain'=>'weibaishi.kf5.com',
			'email'=>'61638325@qq.com',
			'token'=>'b493fa8d928e689664453fede7b134',
			'password'=>'nihao123',
		);
		$client = new \Client($config['domain'], $config['email']);
		$client->setAuth('token', $config['token']);
			//	$page = 1; $perpage = 20;
			// $data = $client->tickets()->findAll(1,10);
			$oredr=2780;
		$ticket = $client->tickets()->find("$oredr");
			 //$data = $client->fields()->find('7961');
			//$data = $client->fields()->findAll('active');
		//遍历然后把空值去掉
		foreach ($ticket as $key => $val) {
			$array = array();
		foreach ($val['custom_fields'] as $k => $value){
			if(!empty($value['value'])) {
				$array[] = $value;
			}
		}
		//print_r($array);die;
		//$g=json_encode($array);
	}
		/*把
            [name] => field_7957
            [value]=>到店维修
			转换成
			field_7957 => 到店维修*/
			$result = array();
		foreach($array as $value) {
			$result[$value['name']] = $value['value'];
		};
		 $this->array = $array;
		 $this->assign('oredr',$oredr);
		 $this->assign('result',$result);
		 $this->display(); 
	}
	public function youhuijiage(){
	header("Content-type: text/html; charset=utf-8");
			$id=I('get.id');
			$post['yhq_id']=$yhq_id=I('get.yhq_id');
			$sqll=M('yhq');
			$arr2=$sqll->where("yhq_id='$yhq_id'")->find();
			 $amountt=$arr2['yhqprice'];
			$mysql=M('goods');
			$arr=$mysql->where("id='$id'")->find();
			$post['amountt']=$amountt;
			$post['amount']=$arr['amounttt']-$amountt;
			$arr1=$mysql->where("id='$id'")->save($post);
			if($arr1){
				header('location:'. __CONTROLLER__."/zhuangtai/id/{$id}"); 
			}else{
				$this->error('添加失败');
			}
	}
		
private $access_token;
	public function wxlogin()
	{
		//配置 微信ID 跟密钥
		$config = array(
				'app_key'=>'wx5e99bbf914658fb6',
				'app_secret'=>'94d8c7fa27770e7c050e1685028ea81d',
				'callback'=>'http://m.weibaishi.com/home/index/wxlogin',
				);
		$wx = new Weixin($config);
		if(!isset($_GET['code'])){ //如果没有获取code那么说明第一次访问此接口
			$wx->login();
		}else{//回调 获取code值
			$code = $_GET['code'];
			$wx->getAccessToken($code);	
			$openid = $wx->getOpenId(); //获取当前用户的openid
			
			$info = M('wd_customer')->where(array('openid'=>$openid))->find();
			if($info){//查看用户用没有访问过，如果访问过就查找用户的customer_id ,并且跳转到表单
				session('user_id',$info['customer_id']);
				
				header('Location: http://m.weibaishi.com/home/Shifu/my_wode');
				
			}else{ //否则获取用户信息记录在wd_customer表中，并记录用户ID在会话中
				$userinfo = $wx->getOauthInfo();
				//print_r($userinfo);die;
				if($userinfo){ //能获取到用户信息就记录 否则重新跳转到这个地址继续获取openid
					$customer_id = M('wd_customer')->add(array(
						'username'=> $userinfo['nickname'],
						'avatar'=> $userinfo['headimgurl'],
						'openid'=> $userinfo['openid'],
						'date_add'=> time()
						));
					session('user_id',$wd_customer_id);
				if($customer_id){
					$username=$_COOKIE['username'];
					if($username){
					$sql=M('m_user');
					$arr4=$sql->where("user_name='$username'")->find();
					if($arr4){
					$post['customer_id']=$customer_id;
					$arr=$sql->where("user_name='$username'")->save($post);
					if($arr){
						header('Location: http://m.weibaishi.com/Home/Shifu/index');
					}
					}else{
						$this->error('您没有权限验证');
					}
					}else{
					
						$this->error('请登陆，然后再验证');
					}
				}else{
					header('Location: http://m.weibaishi.com/home/index/wxlogin');
				}
			}

			
		}

	}
	}
	public function wx()
	{
		//配置 微信ID 跟密钥
		$config = array(
				'app_key'=>'wx5e99bbf914658fb6',
				'app_secret'=>'94d8c7fa27770e7c050e1685028ea81d',
				'callback'=>'http://m.weibaishi.com/home/index/wx',
				);
		$wx = new Weixin($config);
		if(!isset($_GET['code'])){ //如果没有获取code那么说明第一次访问此接口
			$wx->login();
		}else{//回调 获取code值
			$code = $_GET['code'];
			$wx->getAccessToken($code);	
			$openid = $wx->getOpenId(); //获取当前用户的openid
			
			$info = M('wx')->where(array('openid'=>$openid))->find();
			if($info){//查看用户用没有访问过，如果访问过就查找用户的customer_id ,并且跳转到表单
				session('user_id',$info['wx_id']);
				
				header('Location: http://m.weibaishi.com/Home/Index/membercentent');
				
			}else{ //否则获取用户信息记录在wd_customer表中，并记录用户ID在会话中
				$userinfo = $wx->getOauthInfo();
				//print_r($userinfo);die;
				if($userinfo){ //能获取到用户信息就记录 否则重新跳转到这个地址继续获取openid
					$wx_id = M('wx')->add(array(
						'username'=> $userinfo['nickname'],
						'avatar'=> $userinfo['headimgurl'],
						'openid'=> $userinfo['openid'],
						'date_add'=> time()
						));
					session('user_id',$wx_id);
				if($wx_id){
					$username=$_COOKIE['username'];
					if($username){
					$sql=M('yonghuuser');
					$post['wx_id']=$wx_id;
					$arr=$sql->where("phone='$username'")->save($post);
					if($arr){
						header('Location: http://m.weibaishi.com/Home/Index/membercentent');
					}
					}else{
					
						$this->error('请登陆，然后再验证');
					}
				}else{
					header('Location: http://m.weibaishi.com/home/index/wx');
				}
			}

			
		}

	}
	}

public function yhwx()
	{
		//配置 微信ID 跟密钥
		$config = array(
				'app_key'=>'wx5e99bbf914658fb6',
				'app_secret'=>'94d8c7fa27770e7c050e1685028ea81d',
				'callback'=>'http://m.weibaishi.com/home/index/yhwx',
				);
		$wx = new Weixin($config);
		if(!isset($_GET['code'])){ //如果没有获取code那么说明第一次访问此接口
			$wx->login();
		}else{//回调 获取code值
			$code = $_GET['code'];
			$wx->getAccessToken($code);	
			$openid = $wx->getOpenId(); //获取当前用户的openid
			
			$info = M('yonghuwx')->where(array('openid'=>$openid))->find();
			$yonghuwx_id=$info['yonghuwx_id'];
			if($info['yonghu_ma']){//查看用户用没有访问过，如果访问过就查找用户的customer_id ,并且跳转到表单
				session('user_id',$info['yonghuwx_id']);
				$yonghuwx_id=$info['yonghuwx_id'];
				header("Location: http://m.weibaishi.com/home/index/activ_rule_shouzhuc_e/yonghuwx_id/{$yonghuwx_id}");
				
			}else{ //否则获取用户信息记录在wd_customer表中，并记录用户ID在会话中
				$userinfo = $wx->getOauthInfo();
				
				if($userinfo){ //能获取到用户信息就记录 否则重新跳转到这个地址继续获取openid
					$yonghuwx_id = M('yonghuwx')->add(array(
						'username'=> $userinfo['nickname'],
						'avatar'=> $userinfo['headimgurl'],
						'openid'=> $userinfo['openid'],
						'date_add'=> time()
						));
					session('user_id',$yonghuwx_id);
					$num=randomkey(8);
					if($yonghuwx_id){
						$mysql=M('yonghuwx');
						$post['yonghu_ma']=$num;
						$post['yonghu_price']=20;
						$arrt=$mysql->where("yonghuwx_id='$yonghuwx_id'")->save($post);
						if($arrt){
						header("Location: http://m.weibaishi.com/home/index/activ_rule_shouzhuc_e/yonghuwx_id/{$yonghuwx_id}");
						}
					}
					
				}else{
					header('Location: http://m.weibaishi.com/home/index/yhwx');
				}
			}

			
		}

	}
	//public function show()
	//{
		//$userlist = M('wd_customer')->select();
		//$this->assign('userlist',$userlist);
		//$this->display();
	//}

public function tt(){
	//header("Content-type: text/html; charset=utf-8");
	$ticket="gQEO8ToAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL21qbFRhU2ZtQ1Fod1pTMzRVeFhMAAIEmuKWVwMEAAAAAA%3D%3D";
	$url="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=gQEO8ToAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL21qbFRhU2ZtQ1Fod1pTMzRVeFhMAAIEmuKWVwMEAAAAAA%3D%3D";
	
}
public function menu(){
		$access_token = getnewtoken();
		$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;

$output = https_request($url);
$jsoninfo = json_decode($output, true);

$access_token = $jsoninfo["access_token"];
//print_r($access_token);die;
$jsonmenu = '{
		
      "button":[
	 
	{
		"name":"快速报修",
		"type":"view",
         "url":"http://m.weibaishi.com/"

	},
		{
            "name":"客服/咨询",
           "sub_button":[
		    {
			"type":"view",
			"name":"客服报修",
			"url":"http://m.weibaishi.com/home/index/ksxd/"
			},
            
			{
               "type":"view",
               "name":"客服咨询",
               "url":"https://weibaishi.kf5.com/kchat/19026?from=%E5%9C%A8%E7%BA%BF%E6%94%AF%E6%8C%81&group=22684"
            }
          
	]
	},

       {
            "name":"更多",
           "sub_button":[
            {
               "type":"view",
               "name":"邀请有礼",
               "url":"http://m.weibaishi.com/home/index/lnv_polite"
            },
            {
               "type":"view",
               "name":"查询订单",
               "url":"http://m.weibaishi.com/inquiries"
            },
            {
                "type":"view",
                "name":"价目查询",
                "url":"http://m.weibaishi.com/Home/Index/price"
            },
            {
                "type":"view",
                "name":"服务范围",
                "url":"http://m.weibaishi.com/Home/Index/service"
				
            },
            {
                "type":"view",
                "name":"员工入口",
                "url":"http://m.weibaishi.com/home/shifu/index"
            }
            ]
      

       },
     ]
 }';
$result = https_request($url, $jsonmenu);
var_dump($result);
}
	
	public function check()
	{	
		
		define("TOKEN", "weixin");
		$wechatObj = new wechatCallbackapiTest();
		$wechatObj->responseMsg();

	}


	


}



class wechatCallbackapiTest
{

	public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

   public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
				//通过SimpleXMLElement进行xml解析
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
				//手机端
                $fromUsername = $postObj->FromUserName;
				//微信公众平台
                $toUsername = $postObj->ToUserName;
				//接受用户发送的关键词
                $keyword = trim($postObj->Content);
				//接受用户消息的类型
				$msgType=$postObj->MsgType;
				//定义用户发送的经纬度信息
				$latitude=$postObj->Location_X;
				$longitude=$postObj->Location_Y;
				//时间戳
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				$musicTpl="<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Music>
							<Title><![CDATA[%s]]></Title>
							<Description><![CDATA[%s]]></Description>
							<MusicUrl><![CDATA[%s]]></MusicUrl>
							<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
							</Music>
							</xml>";
				$newsTpl="<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<ArticleCount>%s</ArticleCount>
						%s
						</xml>";
				if($msgType=='text'){
				if(!empty( $keyword ))
                {
					$str1='坏';
					$str2='屏';
					$str3='碎';
					$str4='进水';
					$str5='手机';
					$str6='触摸';
					$str7='开机';
					$str8='关机';
					$str9='电池';
					$str10='感应';
					$str11='摄像头';
					$str12='信号';
					$str13='内存';
					$str14='修';
				if($msgType=='小维是谁'){
              		$msgType = "text";
                	$contentStr = "就不告诉你";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
				
				}
			 if($keyword=="音乐"){
						$msgType='music';
						$title='那些年';
						$desc="那些年啊";
						$url='http://weibaishi.com/weixin/music.mp3';
						$hqurl='http://weibaishi.com/weixin/music.mp3';
						$resultStr = sprintf($musicTpl,$fromUsername,$toUsername,$time,$msgType,$title,$desc,$url,$hqurl);
						echo $resultStr;
				} /*if($keyword=='图文'){
						$msgType='news';
						$count=4;
						$str='<Articles>';
						for($i=1; $i<=$count; $i++){
							$str.="<item>
								<Title><![CDATA[维百士{$i}]]></Title> 
								<Description><![CDATA[维百士手机维修]]></Description>
								<PicUrl><![CDATA[http://weibaishi.com/weixin/images/{$i}.jpg]]></PicUrl>
								<Url><![CDATA[http://m.weibaishi.com]]></Url>
								</item>";
						}
						$str.='</Articles>';
						$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, $msgType,$count,$str);
						echo $resultStr;
				}*/ if((!(strpos($keyword,$str1)) === false) || (!(strpos($keyword,$str2)) === false)|| (!(strpos($keyword,$str3)) === false) || (!(strpos($keyword,$str4)) === false) || (!(strpos($keyword,$str5)) === false) || (!(strpos($keyword,$str6)) === false) || (!(strpos($keyword,$str7)) === false) || (!(strpos($keyword,$str8)) === false) || (!(strpos($keyword,$str9)) === false) || (!(strpos($keyword,$str10)) === false) || (!(strpos($keyword,$str11)) === false) || (!(strpos($keyword,$str12)) === false) || (!(strpos($keyword,$str13)) === false) || (!(strpos($keyword,$str14)) === false)){
					$msgType = "text";
                	$contentStr = "欢迎来到维百士维修中心,希望给您带来不一样的体验，快打开下面链接吧\n http://m.weibaishi.com/";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
				}
				else{
					$msgType='text';
              		$url="http://www.tuling123.com/openapi/api?key=e27df7c1281ba93c9bf1df8b555adf48&info={$keyword}";
					$str=file_get_contents($url);
					$json=json_decode($str);
					$contentStr = $json->text;
					$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
					echo $resultStr;
				}
				}else{
                	echo "Input something...";
                }
		
				}else if($msgType=='image'){
              		$msgType = "text";
                	$contentStr = "您的图片真漂亮";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
				
				}else if($msgType=='voice'){
					$msgType = "text";
                	$contentStr = "您能再大点声吗？小蜜听不见";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
				
				}else if($msgType=='video'){
					$msgType = "text";
                	$contentStr = "我的大片比你还多1000个呢，听说有个叫维百士维修手机的现在也在拍片片\n  http://weibaishi.com/";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
			
				}else if($msgType=='shortvideo'){
					$msgType = "text";
                	$contentStr = "我的小片比你还多1000个呢听说有个叫维百士维修手机的现在也在拍片片\n  http://weibaishi.com/";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
				
				}else if($msgType=='link'){
					$msgType = "text";
                	$contentStr = "您的链接是通向彼岸吗？听说那里有三色花";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
				
				}else if($msgType=='location'){
					$msgType = "text";
                	$contentStr = "您获取的是地理位置信息，您的位置:经度{$longitude}，纬度{$latitude}";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
				
				}

        }else {
        	echo "";
        	exit;
        }
    }
	private function checkSignature()
	{
		if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

}
