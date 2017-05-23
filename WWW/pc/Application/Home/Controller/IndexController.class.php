<?php
namespace Home\Controller;
use Think\Controller;
require_once APP_PATH.'Home/Controller/UtilController.class.php';
class IndexController extends Controller {
	//首页加载
	public function index(){
		//用户导航加载
		require_once APP_PATH.'Common/Cf/my.php';
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
		$username=I('post.username');
		$tell=I('post.sc_name');
		$content=I('post.content');
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
						//array('name'=>'field_10169','value'=>$username),
						////array('name'=>'field_8104','value'=>$content),
						//array('name'=>'field_10175','value'=>$brand_name),
						//array('name'=>'field_10170','value'=>$tell),
						array('name'=>'field_10084','value'=>'快速下单'),
						//array('name'=>'field_10083','value'=>$contentt),
						
				),
					//'user'=>array('phone'=>$tell),
				
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
			//成功返回
		}
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
		$name=I('post.name');
		$tijfs=I('post.tijfs');
		$content=I('post.content');
		$type=I('post.type');
		$phone=I('post.phone');
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
			header('location:'. __CONTROLLER__."/index");
	}
	}
	//下单首页
	public function phone(){
		require_once APP_PATH.'Common/Cf/my.php';
		//维修类型
        $mysql=M('maintenance_type');
	    $arr6=$mysql->select();
		//品牌
	  	$ql=M('maintenance_brand');
		$arr3=$ql->select();
		//机型
		$mysql=M('maintenance_model');
		//颜色
		$db=M('maintenance_color');
		$arr=$mysql->where("brand_id='1'")->select();
		foreach($arr as $k=>$v){
			$a=$v['color_id'];
			$arr2=$db->where("color_id in($a)")->select();
			$arr[$k]['data']=$arr2;
		}
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
	public function shifu(){
		//师傅导航加载
		require_once APP_PATH.'Common/Cf/shifu.php';
		$username=$_COOKIE['username'];
		$sql=M('m_user');//维修人员表
		$arr1=$sql->where("user_name='$username'")->find();
		$w=$arr1['user_id'];
		$sfzt=$arr1['sfzt'];
		if($sfzt==1){//师傅在空闲状态
		$mysql=M('goods');
		//显示分配的订单以及可以抢的订单
		$arr=$mysql
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("(stau='1' and user_id='$w') or (ways_id='1' and stau='0')")->select();
		}
		$this->assign('arr',$arr);
		$this->assign('my',$my);
		$this->display();
	
		}
	public function daiwancheng(){//待完成的订单显示
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_id=$arr1['user_id'];
		$stau='2,3,4';//维修的状态一共有5个状态0-5
		$mysql=M('goods');
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("zt_time on goods.id=zt_time.goods_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("stau in($stau)and user_id ='$user_id'")->select();
		$this->assign('arr',$arr);
		$this->display();
	}
	public function yiwancheng(){//已完成的订单显示
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->select();
		foreach ($arr1 as $k=>$v){
			$w.=','.$v['user_id'];
		}
		$stau='5';
		$w=substr($w,1);
		$mysql=M('goods');
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("zt_time on goods.id=zt_time.goods_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("stau in($stau)and user_id ='$w'")->select();
		$this->assign('arr',$arr);
		$this->display();
	}
	public function daiwanchengxq(){//订单详情
		$id=I('get.id');
		$mysql=M('goods');
		$et=$mysql->where("id='$id'")->find();
		$question_id=$et['question_id'];
		$plan_id=$et['plan_id'];
		$quest=M('maintenance_question');
		//维修的问题
		$question=$quest->where("question_id in ($question_id)")->select();
		$pla=M('maintenance_plan');
		//解决方案
		$plan=$pla->where("plan_id in ($plan_id)")->select();
		$mysql=M('goods');
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id='$id'")->find();
			
			$fanwei=$arr['fanwei'];
			$nums=stripos($fanwei,',')+1;
			$fanwei=substr($fanwei,$nums);
		
			$bb=M('chanpinku');	
			$cc=M('jiance');
			$xhjc_id=$arr['xhjc_id'];
			$cppk_id=$cpk_id=$arr['cppk_id'];
			$xqjc_id=$arr['xqjc_id'];
			$cpk_namee=$arr['cpk_namee'];
			if($xqjc_id){
				//维修前的检测
			$arr8=$cc->where("jc_id in($xqjc_id)")->select();
			}
			if($xhjc_id){
				//维修后的检测
			$arr9=$cc->where("jc_id in($xhjc_id)")->select();
			}
			if($cpk_namee){
				//维修所用到的产品配件
			$arr10=$bb->where("cpk_id in ($cpk_namee)")->select();
			
			}
			$s=$arr['id'];
			$stau=$arr['stau'];
		//整个师傅维修过程及状态
		if($stau==2){
			$r='已接单';
			$b="开始服务";
			
		} else if($stau==3){//判断服务状态
		 if($cpk_namee){
			$r='服务中';
			$b="修后检测";
			}elseif($xqjc_id){
			$r='服务中';
			$b="产品添加";
			}else{
			$r='服务中';
			$b="修前检测";
			}	
		}else if($stau==4){
			$r='服务结束待付款';
		}
		$this->assign('plan',$plan);
		$this->assign('fanwei',$fanwei);
		$this->assign('question',$question);
		$this->assign('arr10',$arr10);
		$this->assign('arr8',$arr8);
		$this->assign('arr9',$arr9);
		$this->assign('b',$b);
		$this->assign('arr',$arr);
		$this->assign('r',$r);
		$this->display();
	
	}
	public function shifuxiangqing(){//抢单，接单的详情页面
		$id=I('get.id');
		$mysql=M('goods');
		$et=$mysql->where("id='$id'")->find();
		$question_id=$et['question_id'];
		$plan_id=$et['plan_id'];
		$quest=M('maintenance_question');
		$question=$quest->where("question_id in ($question_id)")->select();
		$pla=M('maintenance_plan');
		$plan=$pla->where("plan_id in ($plan_id)")->select();
		//echo 1;die;
		$mysql=M('goods');
		$arr=$mysql
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->where("id='$id'")->find();
		$cc=M('jiance');
			$bb=M('chanpinku');	
			$xhjc_id=$arr['xhjc_id'];
			$cpk_id=$arr['cppk_id'];
			$xqjc_id=$arr['xqjc_id'];
			if($xqjc_id){
			$arr8=$cc->where("jc_id in($xqjc_id)")->select();
			}
			if($xhjc_id){
			$arr9=$cc->where("jc_id in($xhjc_id)")->select();
			}
			if($cpk_id){
			$arr10=$bb->where("cpk_id in ($cpk_id)")->select();
			}
			//判别抢单还是接单
			if($arr['ways_id']==1){
				$v='抢单';
				$r='等待接单';
				$e='快抢啊';
			}else{
			$r='等待接单';
			$b="接单";
			$c="拒单";
			}
		$this->assign('arr10',$arr10);
		$this->assign('arr8',$arr8);
		$this->assign('arr9',$arr9);
		$this->assign('question',$question);
		$this->assign('plan',$plan);
		$this->assign('c',$c);
		$this->assign('b',$b);
		$this->assign('v',$v);
		$this->assign('e',$e);
		$this->assign('arr',$arr);
		$this->assign('r',$r);
		$this->display();
	}
	public function chanpin(){//维修过程需要产品配件，分类显示
		$id=I('get.id');
		$myysql=M('goods');
		$arr9=$myysql->where("id='$id'")->find();
		$model_id=$arr9['model_id'];
		$db=M('cangku');
		$username=$_COOKIE['username'];//获取当前的人
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_id=$arr1['user_id'];
		//师傅本人仓库的配件
		$arr6=$db->where("user_id='$user_id' ")->select();
		if(!$arr6){//是否仓库里有配件
		$this->error('没有产品请添加');
		}
		foreach ($arr6 as $v=>$k) {
		   $cpk_id.=','.$k['cpk_id'];//有哪些配件
		}
		$cpk_id=substr($cpk_id,1);
		$mysql=M('chanpinku');
		//可以回收的配件
		$arr11=$mysql->where("model_id='$model_id' and sf='y'")->select();
		
		$arr5=$mysql->where("cpk_id in($cpk_id)")->select();
		foreach ($arr5 as $v=>$k) {
		   $model_id.=','.$k['model_id'];
		}
		$model_id;
		$my=M('maintenance_model');
		//机型
		$arr3=$my->where("model_id in ($model_id)")->select();
		foreach ($arr3 as $v=>$k) {
		   $brand_id.=','.$k['brand_id'];
		}
		 $brand_id=substr($brand_id,1);
		$m=M('maintenance_brand');
		$arr9=$m->select();
		//品牌
		$arr4=$m->where("brand_id='$brand_id'")->select();	
		$arr=$mysql->where("cpk_id in($cpk_id) and model_id='$model_id'")->select();
		if($arr){
		$b="<input type='submit' value='确认'>";
		}
		foreach($arr as $k=>$v){
		  $cpk_id=$v['cpk_id'];
		  //师傅仓库的配件
		$arr2=$db->where("user_id='$user_id' and cpk_id in ($cpk_id)")->select();
			$arr[$k]['data']=$arr2;
		}
		foreach ($arr2 as $v=>$k) {
		   $numss.=','.$k['numss'];
		}
		$numss=substr($numss,1);
		$numss=array_sum(explode(',',$numss));
		$this->assign('b',$b);
		$this->assign('numss',$numss);
		$this->assign('id',$id);
		$this->assign('arr',$arr);
		$this->assign('arr11',$arr11);
		$this->display();
	}
	public function peijiana(){//师傅的仓库
		$db=M('cangku');
		$model_id=I('get.model_id');
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_id=$arr1['user_id'];
		$arr6=$db->where("user_id='$user_id'")->select();
		//$cpk_id='';
		foreach ($arr6 as $v=>$k) {
		   $cpk_id.=','.$k['cpk_id'];
		}
	$cpk_id=substr($cpk_id,1);
		$mysql=M('chanpinku');
		$my=M('maintenance_model');
		$arr3=$my->where("model_id in ($model_id)")->select();
		foreach ($arr3 as $v=>$k) {
		   $brand_id.=','.$k['brand_id'];
		}
			 $brand_id=substr($brand_id,1);
		$m=M('maintenance_brand');
		$arr4=$m->where("brand_id='$brand_id'")->select();	
		$arr=$mysql->where("cpk_id in($cpk_id) and model_id='$model_id'")->select();
		if($arr){
		
		$b="<input type='submit' value='确认'>";
		}
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
		$this->assign('numss',$numss);
		$this->assign('arr3',$arr3);
		$this->assign('arr',$arr);
		$this->assign('arr4',$arr4);
		$this->assign('b',$b);
		$this->display();
	}
	public function tjjj(){	//添加所需要的配件
		header("Content-type: text/html; charset=utf-8");
		$id=$_POST['id'];
		$cangku_id=$_POST['cangku_id'];
		$cppk_id=$_POST['cppk_id'];
		$cangku_id=implode(',',$cangku_id);
		$cppk_id=implode(',',$cppk_id);
		$my=M('cangku');
		$arr3=$my->where("cangku_id in($cangku_id)")->select();
			foreach ($arr3 as $k=>$v){
			 $cpk_id.=','.$v['cpk_id'];
			}
			$cpk_id=substr($cpk_id,1);
		$mysql=M('chanpinku');
		$arr=$mysql->where("cpk_id in ($cpk_id)")->select();
	if($cppk_id){//判别是否有回收的配件
		$arr4=$mysql->where("cpk_id in ($cppk_id)")->select();
			foreach ($arr4 as $k=>$vv){
			 $price+=$vv['cpk_price'];
			}
		foreach ($arr as $k=>$v){
			 $cpk_name.=','.$v['cpk_name'];
			
			 $post['amount']=$amount+=$v['cpp_price'];
		}
			$post['amount']=$post['amount']-$price;//配件的价格
			$post['amounttt']=$amount-$price;
			$post['cppk_id']=$cppk_id;//回收的配件
			$post['cangku_id']=$cangku_id;//用到仓库的配件
			$post['cpk_namee']=$cpk_id;//需要的配件
		}else{
			//没有回收的配件
			foreach ($arr as $k=>$v){
			 $cpk_name.=','.$v['cpk_name'];
			
			 $post['amount']=$amount+=$v['cpp_price'];
		}
			$post['amount']=$post['amount'];
			$post['amounttt']=$amount;
			$post['cpk_namee']=$cpk_id;
			$post['cangku_id']=$cangku_id;

		}
			$sql=M('goods');
			$arr1=$sql->where("id='$id'")->save($post);
			if($arr1){
				//跳转到下一个服务状态
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
			}else{
			  $this->error('修改失败');
			 }
	 
	}
	public function jcqq(){
		//修后检测的时间
			$id=$_GET['id'];
			$sql=M('zt_time');
			$data['ho_time']=date('Y-m-d H:i:s', time());
			$arr1=$sql->where("goods_id='$id'")->save($data);	
			if($arr1){
				 header('location:'. __CONTROLLER__."/xhjc/id/{$id}");
			}else{
			  $this->error('修改失败');
			 }
	}
public function jcq(){
	//维修前检测的时间
			$id=$_GET['id'];
			$dd=$_GET['dd'];
			$sql=M('zt_time');
			$data['qo_time']=date('Y-m-d H:i:s', time());
			$arr1=$sql->where("goods_id='$id'")->save($data);
			if($arr1){
				 header('location:'. __CONTROLLER__."/xqjc/id/{$id}");
			}else{
			  $this->error('修改失败');
			 }
	
	}
	public function xqjcc(){
		//检测内容
		header("Content-type: text/html; charset=utf-8");
		 $id=$_GET['id'];
		 $mysql=M('goods');
		 $arr=$mysql->where("id='$id'")->find();
		 $model_id=$arr['model_id'];
		 $sql=M('maintenance_model');
		 $arr1=$sql->where("model_id='$model_id'")->find();
		 $jc_id= $arr1['jc_id'];
		 $sq=M('jiance');
		 $arr2=$sq->where("jc_id in($jc_id)")->select();
		 $this->assign('arr2',$arr2);
		 $this->assign('id',$id);
		 $this->display();
		
		
	}
		//检测内容
	public function xqjc(){
		header("Content-type: text/html; charset=utf-8");
		 $id=$_GET['id'];
		 $mysql=M('goods');
		 $arr=$mysql->where("id='$id'")->find();
		 $model_id=$arr['model_id'];
		 $sql=M('maintenance_model');
		 $arr1=$sql->where("model_id='$model_id'")->find();
		 $jc_id= $arr1['jc_id'];
		 $sq=M('jiance');
		 $arr2=$sq->where("jc_id in(1,2,3,4,5,6,7,8,9,10,11)")->select();
		 $arr3=$sq->where("jc_id in(12,13,14,15,16,17,18,19,20,21,22)")->select();
		 $this->assign('arr3',$arr3);
		 $this->assign('arr2',$arr2);
		 $this->assign('id',$id);
		 $this->display();
		
		
	}
	public function tj(){
	//在订单添加检测内容
		header("Content-type: text/html; charset=utf-8");
		//print_r($_POST);die;
		 $id=$_POST['id'];
		 $jc_id=$_POST['jc_id'];
		 $post['xqjc_id']=$jc_id=implode(',',$jc_id);
		 $mysql=M('goods');
		 $arr=$mysql->where("id='$id'")->save($post);
		 if($arr){
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");;
			}else{
			  $this->error('修改失败');
			 }
		
	}
	public function tjj(){
		//修后检测的提交
		header("Content-type: text/html; charset=utf-8");
		 $id=$_POST['id'];
		 $jc_id=$_POST['jc_id'];
		 $post['xhjc_id']=$jc_id=implode(',',$jc_id);//echodie;
		 $post['stau']=4;
		 $mysql=M('goods');
		 $arr6=$mysql->where("id='$id'")->find();
		 $user_id=$arr6['user_id'];
		 $arr=$mysql->where("id='$id'")->save($post);
		 if($arr){
			$userr=M('m_user');
			$yu['sfzt']=1;
			$arr12=$userr->where("user_id='$user_id'")->save($yu);
			if($arr12){
			 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
			}
		 }
		
	}
	public function xhjc(){
		//修后检测的内容
		 $id=$_GET['id'];
		 $mysql=M('goods');
		 $arr=$mysql->where("id='$id'")->find();
		 $model_id=$arr['model_id'];
		 $sql=M('maintenance_model');
		 $arr1=$sql->where("model_id='$model_id'")->find();
		 $jc_id= $arr1['jc_id'];
		 $sq=M('jiance');
		 $arr2=$sq->where("jc_id in(1,2,3,4,5,6,7,8,9,10,11)")->select();
		 $arr3=$sq->where("jc_id in(12,13,14,15,16,17,18,19,20,21,22)")->select();
		 $this->assign('arr3',$arr3);
		 $this->assign('arr2',$arr2);
		 $this->assign('id',$id);
		 $this->display();
	
	}
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
	public function qiangdan(){
		//抢单
		$id=$_GET['id'];
		$stau=$_GET['stau'];
		$mysql=M('goods');
		$arr=$mysql->where("id='$id'")->find();
		if($arr['user_id']>0){
			$this->success('此单被抢走，下次快点啊!',__CONTROLLER__.'/daiwancheng',1);
		}
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_id=$arr1['user_id'];
		$post['stau']=2;
		$post['user_id']=$user_id;
		//修改抢单成功的状态
		$arr2=$mysql->where("id='$id'")->save($post);
		if($arr2){
		$sql=M('zt_time');
		$data['po_time']=date('Y-m-d H:i:s', time());//派单接单的时间
		$data['jo_time']=date('Y-m-d H:i:s', time());
		$arr7=$sql->where("goods_id='$id'")->save($data);
		if($arr7){
			 header('location:'. __CONTROLLER__."/daiwancheng");
		}
		}
		
	}
	public function jiedan(){
		//接单
		$id=$_GET['id'];
		$stau=$_GET['stau'];
		$mysql=M('goods');
		if($stau==1){
			$stau=2;
			$post['stau']=$stau;
			$sql=M('zt_time');
		 $data['jo_time']=date('Y-m-d H:i:s', time());//接单时间
		 $arr1=$sql->where("goods_id='$id'")->save($data);
			if($arr1){
			$mysql=M('goods');
				//修改刚接单后的状态
				$arr=$mysql->where("id='$id'")->save($post);
				if($arr){
					 header('location:'. __CONTROLLER__."/daiwancheng");
				}else{
				  $this->error('修改失败');
				 }
			
			}
		}else if($stau==2){
			//接单后的状态开始服务
			$stau=3;
			$post['stau']=$stau;
			$sql=M('zt_time');
			//服务开始时间
			$data['ko_time']=date('Y-m-d H:i:s', time());
			//更新时间状态
			$arr1=$sql->where("goods_id='$id'")->save($data);
			$user_name=$_COOKIE['username'];
				$userr=M('m_user');
				$datat['sfzt']=2;
				//更新服务状态
				$userr->where("user_name='$user_name'")->save($datat);
		}else if($stau==3){//服务中的状态,
			$stau=3;
			$post['stau']=$stau;
			$pp=M('goods');
			$po=$pp->where("id='$id'")->find();
		if($po['cpk_namee']){//判断是否添加了配件
			//修后检测的地址
				header('location:'. __CONTROLLER__."/jcqq/stau/{$stau}/id/{$id}");
			}else if($po['xqjc_id']){//判断是否修前检测过
				//添加维修需要的产品地址
				header('location:'. __CONTROLLER__."/chanpin/stau/{$stau}/id/{$id}");
			}else{
				//修前检测地址
				header('location:'. __CONTROLLER__."/jcq/stau/{$stau}/id/{$id}");
		}
		}else if($stau==4){
		
			 header('location:'. __MODULE__."/payy/index/id/{$id}"); 
		
		}
		
			$mysql=M('goods');
			//修改状态
			$arr=$mysql->where("id='$id'")->save($post);
			if($arr){
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
			}else{
			  $this->error('修改失败');
			 }
	}
	

	public function youhuiquan(){
		//优惠券
		$id=I('get.id');
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$w=$arr1['user_id'];
		$mysql=M('yhq');
		$arr=$mysql->where("user_id='$w'")->select();
		if(!$arr){
			$this->error('没有优惠券');
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
   public function tuichua(){
	   //师傅退出登录
           cookie('username',null);  //清空cookie
		   header('location:'. __CONTROLLER__.'/mima');   
   }
	public function membercentent(){
		//用户中心
		require_once APP_PATH.'Common/Cf/my.php';
		  $id=$_GET['id'];
		   $this->assign('my',$my);
		  $username=$_COOKIE['username'];
		  $this->assign('username',$username);
		  $this->display();
	
	}
	public function login(){//登陆
		//判断cookie是否为空
		if(!empty($_COOKIE['username'])){
			header('location:'. __CONTROLLER__.'/dingdan/');
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
			header('location:'. __CONTROLLER__.'/dingdan/');
		}
		
		 $this->display();
		
	}
	//短信验证码
	public function sendSms(){
	$phonee=I('get.phone');
	$num="";
    for($i=0;$i<4;$i++){
   $num .= rand(0,9);
    } 
	cookie('num',$num,60);
	cookie('phonee',$phonee,60);
	$url = 'http://sms.jiangukj.com/SendSms.aspx?';
	header("Content-type: text/html; charset=utf-8");
	$data = array('action' => 'code',
    'username' => 'bjjxsg',
    'userpass' => '7bi58n',
    'mobiles' => $phonee,
    'content' => $num,
    'codeid' => '4235',);
	$db = new UtilController();
	$result = $db->request($url, 'POST',$data);
	$this->display();
	}
	//师傅登陆口
	public function mima(){
		 $this->display();
	}
	
	public function chem(){
		//师傅登陆的验证
	$username=$_GET['username'];
	$pwd=$_GET['pwd'];
		$mysql=M('m_user');
		$re=$mysql->where("user_name='$username'")->find();
		if($re){
			if($re['pwd']==$pwd){
					cookie('username',$username);
			}else{
			echo "1";
			}
			}else{
			
			echo "2";
			}
		
		}
	

	public function ajaxp(){//品牌AJAX
		$id=$_GET['brand_id'];
		$mysql=M('maintenance_model');
		$db=M('maintenance_color');
		$arr=$mysql->where("brand_id='$id'")->select();
		foreach($arr as $k=>$v){
			$a=$v['color_id'];
			$arr2=$db->where("color_id in($a)")->select();
			$arr[$k]['data']=$arr2;
		}

		$this->assign('arr',$arr);
		$this->display();
	}
	public function wenti(){//问题列表
		header("Content-type: text/html; charset=utf-8");
		//print_r($_GET);die;
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
			$arr=$sql->where("questiontype_id in($y)")->select();
			foreach($arr as $k=>$v){
			$b=$v['questiontype_id'];
			$arr2=$db->where("questiontype_id in($b) and model_id='$model_id'")->select();
			$arr[$k]['data']=$arr2;
		}
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
		->where("question_id in ($question_id)")
		->select();
		//用户所有问题
		$strr = '';
			foreach($arr5 as $k=>$v){
			$strr .= ','.$v['question_name'];
		}
	$question_name=substr($strr,1);//die;echo	
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
		if(in_array('有拖影或残影', $question_name)){
				$f=',有拖影或残影';
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
		if(in_array('触摸不灵点击无反应', $question_name)){
				$j=',触摸不灵点击无反应';
		}

		
		$quest=$a.$b.$c.$d.$e.$f.$g.$h.$i.$j;//进行拼接 
		$question=substr($quest,1);//字符串处理
		//当解决方案"旧屏折价换屏"遇到"更换屏幕"则选择"更换屏幕";进行处理
		foreach ($arr5 as $key => $value) {
			$data[$key] = $value['plan_name'];
			}
			$keys = array_keys($data, '旧屏折价换屏');
			if(in_array('更换屏幕', $data) && in_array('旧屏折价换屏', $data)){
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
			$arr=$sqll->where("plan_id in ($t)")->select();
			//print_r($arr);die;
			foreach($arr as $k=>$v){
				$b=$v['plan_id'];
			$arr2=$dbb->where("plan_id in ($b)and question_id in($question_id)")->select();
			$arr[$k]['data']=$arr2;
		}
		$arr3=$sqll->where("plan_id in ($t)")->select();
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
			->where("question_id in($question_id)")->select();
		$strr = '';
			foreach($arr as $k=>$v){
			$strr .= ','.$v['question_name'];
		}
		$question_name=substr($strr,1);
		$sql=M('maintenance_plan');
		$arr3=$sql->where("plan_id in ($plan_id)")->select();
		//主要判断是否可以上门维修做处理
		$nums=$sql->where("plan_id in ($plan_id)")->count();
		foreach($arr3 as $k=>$v){
			 $money+=$v['money'];
			  $userr_id.=','.$v['userr_id'];
			};
		$userr_id=substr($userr_id,1);//die;echo
	
		$sqll=M('m_user');
		//邮寄
		$youji=$sqll->join("jxzx on m_user.jxzx_id=jxzx.jxzx_id")->where("user_id ='$userr_id'")->select();
		foreach($youji as $k=>$v){
			$jxzx_id.=','.$v['jxzx_id'];
		
			};
		$jxzx_id=substr($jxzx_id,1);//die;	echo
		
			$jx=M('jxzx');
			$youjia=$jx->where("jxzx_id in($jxzx_id)")->select();
			//print_r($youjia);die;
	
			
			$daodian=$sqll->join("wxzx on m_user.wxzx_id=wxzx.wxzx_id")->where("user_id ='$userr_id'")->select();	
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
		//订单详情
		//print_r($_GET);die;
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$w=$arr1['user_id'];
		$my=M('yhq');
		$arr2=$my->where("user_id='$w'")->select();
		$id=I('get.id');
		$mysql=M('goods');
		$et=$mysql->where("id='$id'")->find();
		$question_id=$et['question_id'];
		$plan_id=$et['plan_id'];
		$quest=M('maintenance_question');
		$question=$quest->where("question_id in ($question_id)")->select();
		$pla=M('maintenance_plan');
		$plan=$pla->where("plan_id in ($plan_id)")->select();
		//echo 1;die;
		if($et['user_id']==0){//未接单之前
			$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->where("id='$id'")->find();
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
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("m_user on goods.user_id=m_user.user_id")
			->where("id='$id'")->find();
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
		$this->assign('arr',$arr);
		$this->display();
	}
	public function quxiaodingdan(){//取消订单
		$id=I('post.id');
		  $mysql=M('goods');
		  $arr1=$mysql->where("id='$id'")->find();
		$post['fk']=110;//取消后改变状态和返回
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
			$this->display();
	
	}
	public function searchajax(){
			$sea=I('get.sea');
			$mysql=M('maintenance_model');
			$arr=$mysql->where("model_name like '%$sea%'")->order("pai_id")->select();
			$this->assign('arr',$arr);
			$this->display();
	
	}

	public function colorr(){
		 header("Content-type: text/html; charset=utf-8"); 
		 $model_id=I('get.model_id');//die;echo
		
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
		$arr=$mysql->select();
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function jixing(){
		$brand_id=I('get.brand_id');//die;echo 
		$mysql=M('maintenance_model');
		$arr1=$mysql->where("brand_id='$brand_id'")->select();
		//print_r($arr1);die;
		$this->assign('arr1',$arr1);
		$this->display();
	
	}
	public function jiejuefangan(){
		$model_id=I('get.model_id');
		$mysql=M('maintenance_plan');
		$arr2=$mysql->where("model_id='$model_id'")->select();
		$this->assign('arr2',$arr2);
		$this->display();
	
	
	}
	public function zhuangtai(){//订单状态的时间追踪
		$id=I('get.id');
		$sql=M('goods');
		$arr1=$sql->where("id='$id'")->find();
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
	}
	if($arr['ho_time']){
		$ho_timew='等待付款';
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
	}else if($arr['ho_time']){
		$ho_timew='等待付款';
		$ho_time=$arr['ho_time'];
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
	}else if($arr['ho_time']){
		$ho_timew='等待付款';
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
		 header("Content-type: text/html; charset=utf-8"); 
		//print_r($_POST);die; 
			$fanwei=I('post.fanwei');
			$dasj=$post['dasj']=I('post.dasj');
			$dasjc=$post['dasjc']=I('post.dasjc');
			$dasjc=(date('Y-m-d H',$dasjc));
			$dasjc=$dasjc.'至';
			$dasj=(date('Y-m-d H',$dasj));
			$post['fanwei']=$fanwei;
			$smwx=I('post.fanweia');
			if($smwx=='北京服务范围'){
				$smwx=1;
			}
			 $post['smwx_id']=$smwx;
			$model_id=I('post.model_id');
			$ways_id=I('post.ways_id');
				if(I('post.wxzx_id')){
					$post['wxzx_id']=I('post.wxzx_id');
					$codeid=4237;
				}
				$post['jxzx_id']=I('post.jxzx_id');
				
				
				 
			
			$post['ways_id']=$ways_id;
			$shill=I('post.shill');
			$ddh=$post['ddh']=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
			$u_phone=$post['u_phone']=$r=addslashes(I('post.u_phone','','trim'));
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
							$money+=$v['money'];
							}
							$money;
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
				
				$jk=M('zt_time');
				$data['goods_id']=$arr;
				$xo_time=$data['xo_time']=date('Y-m-d H:i:s', time());
		
		//$cont=$ddh....$xo_time.$u_note.
			$model=$model_name.$color_name;
			
			 $dizhi=$jxzx_name.$jxzx_n.$jxzx_phone.$jxzx_username.$wxzx_name.$wxzx_n.$wxzx_phone.$wxzx_time.$shangmen.$u_address;
			$content='<p>姓名:'.$u_name.'</p><p>电话:'.$r.'</p><P>机型:'.$model.'</p><p>问题:'.$question_name.'</p><p>方案:'.$plan_name.'</p><p>价格:'.$money.'</p><p>方式:'.$ways_name.'</p><P>地址:'.$dizhi.'</p><P>客户备注:'.$u_note.'</p><p>预约时间:'.$dasjc.$dasj.'</p>';
			
			//die;echo
				$gg=$jk->add($data);
				$ds=M('yonghuuser');
				$df=$ds->where("phone='$r'")->find();
			if(!$df){
				$po['phone']=$phone=$post['u_phone'];
				$po['yonghuname']=$post['u_name'];
					
				$dd=$ds->add($po);
				if($dd){
				$email=$r.'@163.com';
				$data = array(
					'email'=>$email,
					'phone'=>$r,
					'title'=>'手机维修',
					'comment'=>array('content'=>$content),
					'requester'=>array('email'=>$email,'name'=>$username),
					'custom_fields'=>array(
						//array('name'=>'field_10169','value'=>$u_name),
						//array('name'=>'field_10170','value'=>$r),
						array('name'=>'field_10084','value'=>'手机维修'),
						//array('name'=>'field_10175','value'=>$model),
						//array('name'=>'field_10171','value'=>$question_name),
						//array('name'=>'field_10172','value'=>$plan_name),
						//array('name'=>'field_10173','value'=>$money),
						//array('name'=>'field_10174','value'=>$ways_name),
						//
						//array('name'=>'field_10083','value'=>$dizhi),
						
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
				header('location:'. __CONTROLLER__."/dingdan.html");
					}
				}
				
	}else{
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
					//'user'=>array('phone'=>$tell),
				
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
				header('location:'. __CONTROLLER__."/dingdan.html");
					}
	}
				}else{
					$this->error('添加失败');
				}
	
	}
	
	public function denglu(){
		//用户登录
		$username=$_GET['u_phone'];
		$nums=$_GET['nums'];
		$phonee=$_COOKIE['phonee'];
		$num=$_COOKIE['num'];
		if($phonee==$username&&$num==$nums){
			$mysql=M("yonghuuser");
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
			$id=I('post.id');
			 $amountt=I('post.yhqprice');
			$mysql=M('goods');
			$arr=$mysql->where("id='$id'")->find();
			$post['amountt']=$amountt;
			$post['amount']=$arr['amounttt']-$amountt;
			$arr1=$mysql->where("id='$id'")->save($post);
			if($arr1){
				header('location:'. __CONTROLLER__."/xiangqing/id/{$id}"); 
			}else{
				$this->error('添加失败');
			}
	}
	
}