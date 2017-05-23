<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Net\Weixin;
define("TOKEN", "weixin");
class DdguanliController extends Controller {
    public function index(){
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
		}
		}
		$this->display();
    }
	   public function scc(){
		   if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			//print_r($_FILES);die;
			$us_name=$yanzheng['us_name'];
			$id=I('post.id');
			$time=date('Y-m-d H:i:s', time());
			$mysql=M('goods');
			$arr=$mysql->where("id='$id'")->find();
			$ways_id=$arr['ways_id'];
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath  =      './';
			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件
			
			 $info   =   $upload->upload(); 
			 if(!$info) {      
				 $this->error($upload->getError());   
			 }else{
			 $p_count = count($info);
		     for($i=0;$i<$p_count;$i++){
					$new_info = $info[$i]['savepath'].$info[$i]['savename'];//全路径
					$image = new \Think\Image(); 
					$goods_img   = str_replace('./Public/', '', $new_info);//存到数据库中的原图片路径
					$post[]=array("gdhf_name"=>$us_name ,"gdhf_content"=>'',"goods_id"=>$id,"gdhf_time"=>$time,"gdhf_type"=>1,"img"=>$goods_img,);
				}

			$obj=M('gdhf');
			$re=$obj->addAll($post);
			if($re){
			header('location:'. __CONTROLLER__."/xiangqing/id/{$id}/ways_id/{$ways_id}");
			}
		}
		}
		}
	   }
	public function shouhou(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$mysql=M('shouhou');
		$arr=$mysql->join("goods on shouhou.goods_id=goods.id")->where("zt=0")->order("shouhou_id desc")->select();
		

		
			
			
		


		
		
		}
		
		}
		$this->assign('page',$show);
		$this->assign('arr',$arr);
		$this->display();
	}
public function fenpei(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	$shouhou_id=I('get.shouhou_id');
	$uu=M('shouhou');
	$arr5=$uu->where("shouhou_id='$shouhou_id'")->find();
	$id=$arr5['goods_id'];
	$sqll=M('m_user');
	//$arr=$sqll->where("sfzt in (1,2)")->select();
		$sql=M('goods');
		$arr1=$sql->where("id='$id'")->find();
			$ways_id=$arr1['ways_id'];
		if($arr1['wxzx_id']){
			$wxzx_id=$arr1['wxzx_id'];
			$sqll=M('m_user');
		
		$user1=$sqll->where("wxzx_id ='$wxzx_id' and sfzt=1")->select();
		
		$a='休息中';
		$user2=$sqll->where("wxzx_id ='$wxzx_id' and sfzt=2")->select();
		$b='工作中';
		$user3=$sqll->where("wxzx_id ='$wxzx_id' and sfzt=3")->select();
		$c='放假';
		}else if($arr1['jxzx_id']){
			$jxzx_id=$arr1['jxzx_id'];
				$sqll=M('m_user');
		$user1=$sqll->where("jxzx_id ='$jxzx_id' and sfzt=1")->select();
		$a='休息中';
		
		$user2=$sqll->where("jxzx_id ='$jxzx_id' and sfzt=2")->select();
		$b='工作中';
		$user3=$sqll->where("jxzx_id ='$jxzx_id' and sfzt=3")->select();
		$c='放假';
		}else if($arr1['smwx_id']){
			 $smwx_id=$arr1['smwx_id'];
			$sqll=M('m_user');
		$user1=$sqll->where("smwx_id ='$smwx_id' and sfzt=1")->select();
		$a='休息中';
		//print_r($user1);die;
		$user2=$sqll->where("smwx_id ='$smwx_id' and sfzt=2")->select();
		$b='工作中';
		$user3=$sqll->where("smwx_id ='$smwx_id' and sfzt=3")->select();
		$c='放假';
		}
		//print_r($user1);die;
		
		
		}
		
		}
		$this->assign('ways_id',$ways_id);
		
		$this->assign('arr1',$arr1);
		$this->assign('user3',$user3);
		$this->assign('user2',$user2);
		$this->assign('user1',$user1);
		
		$this->assign('r',$r);
		$this->assign('id',$id);
		$this->assign('a',$a);
		$this->assign('b',$b);
		$this->assign('c',$c);
	$this->assign('shouhou_id',$shouhou_id);
	//$this->assign('arr',$arr);
	$this->display();
	}
	public function fenpeiadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$id=I('post.id');
		$sql=M('goods');
		$data['shouhoua']=2;
		$arr1=$sql->where("id='$id'")->save($data);
		$post['usid']=I('post.user_id');
		$shouhou_id=I('post.shouhou_id');
		$post['zt']=1;
		$mysql=M('shouhou');
		$arr=$mysql->where("shouhou_id='$shouhou_id'")->save($post);
			header('location:'. __CONTROLLER__."/shouhou");
		
		}
		
		}
}
	public function shouhouaa(){
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
		if($zt==1){
		$zt='1,2';
		}
		$mysql=M('shouhou');
		$arr=$mysql->join("goods on shouhou.goods_id=goods.id")->where("zt in ($zt)")->order("shouhou_id desc")->select();
			
		
			
			
		
	
		}
		
		}
	
		$this->assign('arr',$arr);
		$this->display();
	}
	public function ywcsh(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		//echo 1;die;
		$mysql=M('shouhou');
		$count=$mysql->join("goods on shouhou.goods_id=goods.id")->where("zt='3'")->order("shouhou_id desc")->count();
			
		$Page= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)

			//$Page->setConfig('header',"共 %TOTAL_ROW% 条记录");
			$Page->setConfig('first',"首页");
			$Page->setConfig('last',"尾页");
			$Page->setConfig('prev',"上");
			$Page->setConfig('next',"下");
			$Page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");

			$show= $Page->show();// 分页显示输出

			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

		
			
			
		
		$arr=$mysql->join("goods on shouhou.goods_id=goods.id")->where("zt='3'")->order("shouhou_id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		//print_r($arr);die;
		}
		
		}
		$this->assign('page',$show);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function jixiu(){
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
		$ways_id=I('get.ways_id');//echo	die;
			if(I('get.stau')){
				$stau=I('get.stau');
			}else{
				$stau=0;
			}
			$mysql=M('goods');
			$arr1=$mysql->where("ways_id='$ways_id' and stau='$stau'")->select();
		foreach ($arr1 as $v=>$kk){
			$id.=','.$kk['id'];
		}
		$id=substr($id,1);
		if(!$id){
			$arr=$mysql
		->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql
		->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
	//	->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id in($id)")->order("id desc")->select();
		}
		}
		
		}
		//print_r($arr);
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function sc(){
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
		$sql=M('zt_time');
		$sqll=M('pingjia');
		$arr=$mysql->where("id='$id'")->find();
		$pingjiazt=$arr['pingjiazt'];
		$arr=$mysql->where("id='$id'")->delete();
		if($arr){
		$arr1=$sql->where("goods_id='$id'")->delete();
		if($arr1){
			if($pingjiazt==1){
				$arr2=$sqll->where("goods_id='$id'")->delete();
				if($arr2){
				header('location:'. __CONTROLLER__."/quxiaole");
				}
			}else{
				header('location:'. __CONTROLLER__."/quxiaole");
			}
		
		}
	}
	}
		}
		
		}
	public function shanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			//print_r($_GET);die;
		$id=I('get.id');
		$ways_id=I('get.ways_id');
		$mysql=M('goods');
		$sql=M('zt_time');
		$sqll=M('pingjia');
		$arr=$mysql->where("id='$id'")->find();
		$pingjiazt=$arr['pingjiazt'];
		
		$stau=$arr['stau'];
		if($stau==0){
			$lujing='dengdai';
		}else if($stau==1){
			$lujing='yizhipai';	
		}else if($stau==2){
			$lujing='yijiedan';	
		}else if($stau==3){
			$lujing='weixiuzhong';	
		}else if($stau==4){
			$lujing='daifukuan';	
		}else if($stau==5){
			$lujing='jiaoyiwancheng';	
		}
		$arr=$mysql->where("id='$id'")->delete();
		if($arr){
		$arr1=$sql->where("goods_id='$id'")->delete();
		if($arr1){
			if($pingjiazt==1){
				$arr2=$sqll->where("goods_id='$id'")->delete();
				if($arr2){
				header('location:'. __CONTROLLER__."/{$lujing}/ways_id/{$ways_id}");
				}
			}else{
				header('location:'. __CONTROLLER__."/{$lujing}/ways_id/{$ways_id}");
			}
		}else{
			header('location:'. __CONTROLLER__."/{$lujing}/ways_id/{$ways_id}");
		
		}
		}
	}
		}
		
		
		}
	public function shanchuu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			//print_r($_GET);die;
		$id=I('get.id');
		$ways_id=I('get.ways_id');
		$mysql=M('goods');
		$sql=M('zt_time');
		$sqll=M('pingjia');
		$arr=$mysql->where("id='$id'")->find();
		$pingjiazt=$arr['pingjiazt'];
		
		$stau=$arr['stau'];
		if($stau==0){
			$lujing='dengdai';
		}else if($stau==1){
			$lujing='yizhipai';	
		}else if($stau==2){
			$lujing='yijiedan';	
		}else if($stau==3){
			$lujing='weixiuzhong';	
		}else if($stau==4){
			$lujing='daifukuan';	
		}else if($stau==5){
			$lujing='jiaoyiwancheng';	
		}
		$arr=$mysql->where("id='$id'")->delete();
		if($arr){
		$arr1=$sql->where("goods_id='$id'")->delete();
		if($arr1){
			if($pingjiazt==1){
				$arr2=$sqll->where("goods_id='$id'")->delete();
				if($arr2){
				header('location:'. __CONTROLLER__."/quxiaole");
				}
			}else{
				header('location:'. __CONTROLLER__."/quxiaole");
			}
		}else{
			header('location:'. __CONTROLLER__."/quxiaole");
		
		}
		}
	}
		}
		
		
		}
		public function shanchuuu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			//print_r($_GET);die;
		$id=I('get.id');
		$ways_id=I('get.ways_id');
		$mysql=M('goods');
		$sql=M('zt_time');
		$sqll=M('pingjia');
		$arr=$mysql->where("id='$id'")->find();
		$pingjiazt=$arr['pingjiazt'];
		
		$stau=$arr['stau'];
		if($stau==0){
			$lujing='dengdai';
		}else if($stau==1){
			$lujing='yizhipai';	
		}else if($stau==2){
			$lujing='yijiedan';	
		}else if($stau==3){
			$lujing='weixiuzhong';	
		}else if($stau==4){
			$lujing='daifukuan';	
		}else if($stau==5){
			$lujing='jiaoyiwancheng';	
		}
		$arr=$mysql->where("id='$id'")->delete();
		if($arr){
		$arr1=$sql->where("goods_id='$id'")->delete();
		if($arr1){
			if($pingjiazt==1){
				$arr2=$sqll->where("goods_id='$id'")->delete();
				if($arr2){
				header('location:'. __CONTROLLER__."/shouhou");
				}
			}else{
				header('location:'. __CONTROLLER__."/shouhou");
			}
		}else{
			header('location:'. __CONTROLLER__."/shouhou");
		
		}
		}
	}
		}
		
		
		}
	public function quxiao(){
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
		$ways_id=I('post.ways_id');
		$id=I('post.id');
		$post['quxiaocontent']=I('post.quxiaocontent');
		$mysql=M('goods');
		$stau=$arr['stau'];
		if($stau==0){
			$lujing='dengdai';
		}else if($stau==1){
			$lujing='yizhipai';	
		}else if($stau==2){
			$lujing='yijiedan';	
		}else if($stau==3){
			$lujing='weixiuzhong';	
		}else if($stau==4){
			$lujing='daifukuan';	
		}else if($stau==5){
			$lujing='jiaoyiwancheng';	
		}
		$post['fk']=110;
		$post['stau']=10;
		$arr5=$mysql->where("id='$id'")->find();
		 $cangku_id=$arr5['cangku_id'];
		  $user_id=$arr5['user_id'];
		  $sqlsql=M('m_user');
		  $fdd['sfzt']=1;
		  $arre=$sqlsql->where("user_id='$user_id'")->save($fdd);
		
			
		$arr=$mysql->where("id='$id'")->save($post);
			if($arr){
				
				if($cangku_id){
				$pko=M('cangku');
				$lkk['zta']=0;
				$frt=$pko->where("cangku_id='$cangku_id'")->save($lkk);
				if($frt){
				header('location:'. __CONTROLLER__."/{$lujing}/ways_id/{$ways_id}");
				}
				}else{
				header('location:'. __CONTROLLER__."/{$lujing}/ways_id/{$ways_id}");
				}
				
		}
			
	
		}
		
		
		}
	}
	public function daodian(){
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
			 $ways_id=I('get.ways_id');//die;echo
			if(I('get.stau')){
				$stau=I('get.stau');
			}else{
				$stau=0;
			}
		$mysql=M('goods');	
		$arr1=$mysql->where("ways_id='$ways_id' and stau='$stau'")->select();
		//print_r($arr1);die;////
		foreach ($arr1 as $v=>$kk){
			$id.=','.$kk['id'];
		}
		$id=substr($id,1);
		if(!$id){
			$arr=$mysql
		->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql
		->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id in($id)")->order("id desc")->select();
		}
		}
		
		}
		//print_r($arr);die;
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
	}

	public function shangmen(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$ways_id=I('get.ways_id');
			if(I('get.stau')){
				$stau=I('get.stau');
			}else{
				$stau=0;
			}
			$mysql=M('goods');
			$arr1=$mysql
			->where("ways_id='$ways_id' and stau='$stau'")->select();
		//print_r($arr1);die;////
		foreach ($arr1 as $v=>$kk){
			$id.=','.$kk['id'];
		}
		$id=substr($id,1);
		if(!$id){
			$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
	//	->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
	//	->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id in($id)")->order("id desc")->select();
		}
		}
		
		}
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function wxuser(){
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
		$ways_id=I('get.ways_id');

		$id=$_GET['id'];
		$r=$_GET['r'];
		$sql=M('goods');
		$arr1=$sql->where("id='$id'")->find();
			
		if($arr1['wxzx_id']){
			$wxzx_id=$arr1['wxzx_id'];
			$sqll=M('m_user');
		
		$user1=$sqll->where("wxzx_id ='$wxzx_id' and sfzt=1")->select();
		$a='休息中';
		$user2=$sqll->where("wxzx_id ='$wxzx_id' and sfzt=2")->select();
		$b='工作中';
		$user3=$sqll->where("wxzx_id ='$wxzx_id' and sfzt=3")->select();
		$c='放假';
		}else if($arr1['jxzx_id']){
			$jxzx_id=$arr1['jxzx_id'];
				$sqll=M('m_user');
		$user1=$sqll->where("jxzx_id ='$jxzx_id' and sfzt=1")->select();
		$a='休息中';
		$user2=$sqll->where("jxzx_id ='$jxzx_id' and sfzt=2")->select();
		$b='工作中';
		$user3=$sqll->where("jxzx_id ='$jxzx_id' and sfzt=3")->select();
		$c='放假';
		}else if($arr1['smwx_id']){
			$smwx_id=$arr1['smwx_id'];
				$sqll=M('m_user');
		$user1=$sqll->where("smwx_id ='$smwx_id' and sfzt=1")->select();
		$a='休息中';
		$user2=$sqll->where("smwx_id ='$smwx_id' and sfzt=2")->select();
		$b='工作中';
		$user3=$sqll->where("smwx_id ='$smwx_id' and sfzt=3")->select();
		$c='放假';
		}
		$user_id=$arr1['user_id'];
		$user_id=$arr1['user_id'];
		$mysql=M('m_user');
		$arr=$mysql->where("user_id in($user_id)")->select();
		//print_r($arr);die;		// //
		}
		
		}
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->assign('user3',$user3);
		$this->assign('user2',$user2);
		$this->assign('user1',$user1);
		
		$this->assign('r',$r);
		$this->assign('id',$id);
		$this->assign('a',$a);
		$this->assign('b',$b);
		$this->assign('c',$c);
		
		$this->display();
	
	}
	public function save1(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$id=I('post.id');
		$dd=I('post.dd');
		////echo $id;die;
		$ways_id=I('post.ways_id');//echo	die;
		$user_id=$post['user_id']=I('post.user_id');
		$sqsq=M('m_user');
		$cf=$sqsq->where("user_id='$user_id'")->find();
		$customer_id=$cf['customer_id'];
		$sqll=M('wd_customer');
		$ww=$sqll->where("customer_id='$customer_id'")->find();
		 $openid=$ww['openid'];
		$post['stau']=1;
		$mysql=M('goods');
		$arrt=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")->join("maintenance_model on goods.model_id=maintenance_model.model_id")->where("id='$id'")->find();
		$dasj=$arrt['dasj'];
		$dasjc=$arrt['dasjc'];
		$dasjc=(date('Y-m-d H:00',$dasjc));
		$dasj=(date('Y-m-d H:00',$dasj));
		if($dasj){
			$dasj=$dasj.'至';
		}
		$ways_id=$arrt['ways_id'];
		$ddh=$arrt['ddh'];
		$u_name=$arrt['u_name'];
		$u_phone=$arrt['u_phone'];
		$shangmen=$arrt['shangmen'];
		$u_address=$arrt['u_address'];
		$u_note=$arrt['u_note'];
		$model_name=$arrt['model_name'];
		$question_id=$arrt['question_id'];
		$quest=M('maintenance_question');	
			$arrw=$quest->where("question_id in($question_id)")->select();
			$question_name='';
			foreach($arrw as $k=>$v){
				$question_name.=','.$v['question_name'];
			}
				$question_name=substr($question_name,1);
				$d=$model_name.'  '.$question_name;
			$access_token = getnewtoken();
			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			//echo $url;exit;
			$datatt['touser'] = $openid;
			$datatt['template_id'] = 'EB_2ZZziqqag5xzG1VMLmECmXcoCdoKhTR_4IjGEk_I';
			$datatt['url'] = 'http://m.weibaishi.com/Home/Shifu/shifu';
			$first =$ways_name.'    '.$dasj.$dasjc;
			$datatt['data'] = array(
				'first' => array('value'=>$first,'color'=>'#173177'),
				'keyword1' => array('value'=>$ddh,'color'=>'#173177'),
				'keyword2' => array('value'=>$u_name,'color'=>'#173177'),
				'keyword3' => array('value'=>$u_phone,'color'=>'#173177'),
				'keyword4' => array('value'=>$shangmen.$u_address,'color'=>'#173177'),
				'keyword5' => array('value'=>$u_note,'color'=>'#173177'),
				'remark' => array('value'=>$d,'color'=>'#173177'),
				);
			$post_msg = json_encode($datatt);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
		
		$arr=$mysql->where("id='$id'")->save($post);
			if($arr){
				$sql=M('zt_time');
				$data['po_time']=date('Y-m-d H:i:s', time());
				$arr1=$sql->where("goods_id='$id'")->save($data);
				if($arr1){
					//if($dd=1)
				header('location:'. __CONTROLLER__."/yizhipai/ways_id/{$ways_id}");
				}
			}else{
			  $this->error('修改失败');
			 }
	}
		}
		
		}
	public function quxiaole(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$mysql=M('goods');
		$arr1=$mysql->where("fk ='110' and (user_id > 0)")->select();
				$id='';
			foreach ($arr1 as $v=>$kk){
				$id.=','.$kk['id'];
			}
			$id=substr($id,1);
		

			$count= $mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
			->join("m_user on goods.user_id=m_user.user_id")
			->join("maintenance_model on goods.model_id=maintenance_model.model_id")
			->where("id in($id)")->count();// 查询满足要求的总记录数

			$Page= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)

			//$Page->setConfig('header',"共 %TOTAL_ROW% 条记录");
			$Page->setConfig('first',"首页");
			$Page->setConfig('last',"尾页");
			$Page->setConfig('prev',"上");
			$Page->setConfig('next',"下");
			$Page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");

			$show= $Page->show();// 分页显示输出

			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

		
			
			
		
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
			->join("m_user on goods.user_id=m_user.user_id")
			->join("maintenance_model on goods.model_id=maintenance_model.model_id")
			->where("id in($id)")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		
		
		}
		}
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('arr',$arr);
		$this->display();
	}
	public function jdhquxiao(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$mysql=M('goods');
		$arr1=$mysql->where("fk ='110' and user_id='0'")->select();
				$id='';
			foreach ($arr1 as $v=>$kk){
				$id.=','.$kk['id'];
			}
			$id=substr($id,1);
		$count=$mysql
			//->join("m_user on goods.user_id=m_user.user_id")
			->join("maintenance_model on goods.model_id=maintenance_model.model_id")
			->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
			->where("id in($id)")->count();

			$Page= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)

			$Page->setConfig('header',"共 %TOTAL_ROW% 条记录");
			$Page->setConfig('first',"首页");
			$Page->setConfig('last',"尾页");
			$Page->setConfig('prev',"上一页");
			$Page->setConfig('next',"下一页");
			$Page->setConfig('theme',"%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");

			$show= $Page->show();// 分页显示输出

			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

		
			
			
		
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
			//->join("m_user on goods.user_id=m_user.user_id")
			->join("maintenance_model on goods.model_id=maintenance_model.model_id")
			->where("id in($id)")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		}
		
		}
		$this->assign('page',$show);
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function quxiaodedingdan(){
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
		$mysql=M('goods');
		$arr1=$mysql->where("id='$id'")->find();
		$post['fk']=110;
		//$post['u_phone']=1;
		//$post['u_name']=$arr1['u_phone'];
		$arr=$mysql->where("id='$id'")->save($post);
		if($arr){
			header('location:'. __CONTROLLER__."/quxiaole"); 
		}else{
			  $this->error('取消失败');
			 }
		
			
		}
		}
	}
	public function dengdai(){

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
			$ways_id=I('get.ways_id');
			if(I('get.stau')){
				$stau=I('get.stau');
			}else{
				$stau=0;
			}
			//echo $ways_id;DIE;
			//echo $stau;die;
			$mysql=M('goods');
			$arr1=$mysql
			->where("ways_id='$ways_id' and stau='$stau'")->select();
		//print_r($arr1);die;////
		foreach ($arr1 as $v=>$kk){
			$id.=','.$kk['id'];
			//$ways_id=$kk['ways_id'];//die;echo 
		}
		$id=substr($id,1);
		if(!$id){
			$arr=$mysql
				//->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->order("id desc")->select();
		}else{
		$arr=$mysql
		//->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
	//	->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id in($id)")->order("id desc")->select();
		}
		}
		}
		//print_r($arr);die;
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
	public function yizhipai(){
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
			$ways_id=I('get.ways_id');//die;		echo//
			//$ways_id=I('post.ways_id');
			if(I('get.stau')){
				$stau=I('get.stau');
			}else{
				$stau=1;
			}
			$mysql=M('goods');
			$arr1=$mysql
			->where("ways_id='$ways_id' and stau='$stau'")->select();
		//print_r($arr1);die;////
		foreach ($arr1 as $v=>$kk){
			$id.=','.$kk['id'];
		}
		$id=substr($id,1);
		if(!$id){
			$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
	//	->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
	->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->order("id desc")->select();
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
		//print_r($arr);die;
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
public function yijiedan(){
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
			$ways_id=I('get.ways_id');
			if(I('get.stau')){
				$stau=I('get.stau');
			}else{
				$stau=2;
			}
			$mysql=M('goods');
			$arr1=$mysql
			->where("ways_id='$ways_id' and stau='$stau'")->select();
		//print_r($arr1);die;////
		foreach ($arr1 as $v=>$kk){
			$id.=','.$kk['id'];
		}
		$id=substr($id,1);
		if(!$id){
			//echo 1;die;
			$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		//->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->order("id desc")->select();
		}else{
			//echo 1;DIE;
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
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
public function weixiuzhong(){
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
			$ways_id=I('get.ways_id');
			if(I('get.stau')){
				$stau=I('get.stau');
			}else{
				$stau=3;
			}
			$mysql=M('goods');
			$arr1=$mysql
			->where("ways_id='$ways_id' and stau='$stau'")->select();
		//print_r($arr1);die;////
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
		->where("id='$id'")->order("id desc")->select();
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
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
public function daifukuan(){
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
			$ways_id=I('get.ways_id');
			if(I('get.stau')){
				$stau=I('get.stau');
			}else{
				$stau=4;
			}
			$mysql=M('goods');
			$arr1=$mysql
			->where("ways_id='$ways_id' and stau='$stau'")->select();
		//print_r($arr1);die;////
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
		->where("id='$id'")->order("id desc")->select();
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
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
public function gdhfadd(){
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
			
			$post['gdhf_name']=$us_name=$yanzheng['us_name'];
			$post['goods_id']=$id=I('post.id');
			$mysql=M('goods');
			$arr1=$mysql->where("id='$id'")->find();
			$ddh=$arr1['ddh'];
			$user_id=$arr1['user_id'];
			$post['gdhf_content']=$gdhf_content=I('post.gdhf_content');
			$post['gdhf_time']=$time=date('Y-m-d H:i:s', time());
			$post['gdhf_type']=1;
			$sql=M('gdhf');
			$arr=$sql->add($post);
			$rty=M('m_user');
			$arar8=$rty->where("user_id='$user_id'")->find();
			 $customer_id=$arar8['customer_id'];
			$sqll=M('wd_customer');
			$arr4=$sqll->where("customer_id='$customer_id'")->find();
		 $openid=$arr4['openid'];
		if($arr1['user_id']>0){
			$access_token = getnewtoken();
			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			//echo $url;exit;
			$datatt['touser'] = $openid;
			$datatt['template_id'] = 'mqXJ6k02Wm94RpODzKLiw3rXqskIx9togKoe0jhKDhs';
			$datatt['url'] = "http://m.weibaishi.com/Home/Shifu/daiwanchengxq/id/{$id}";
			$first ='工单备注';
			$datatt['data'] = array(
				'first' => array('value'=>$first,'color'=>'#173177'),
				'keyword1' => array('value'=>$us_name,'color'=>'#173177'),
				'keyword2' => array('value'=>$time,'color'=>'#173177'),
				'keyword3' => array('value'=>$gdhf_content,'color'=>'#173177'),
				'remark' => array('value'=>$ddh,'color'=>'#173177'),
				);
			$post_msg = json_encode($datatt);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
			}
			$my=M('gdhf');
			$arrg1=$my->where("goods_id='$id' and gdhf_type='1'")->select();
			$arrg2=$my->where("goods_id='$id' and gdhf_type='2'")->select();
			$arrg3=$my->where("goods_id='$id' and gdhf_type='3'")->select();
		
		}
		}
		$this->assign('arrg1',$arrg1);
		$this->assign('arrg2',$arrg2);
		$this->assign('arrg3',$arrg3);
		$this->display();
}
public function xiangqing(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	//print_r($_GET);die;
		$id=I('get.id');
		$hh=I('get.hh');
		if($hh==1){
			$hh=1;
		}else if($hh==2){
			$hh=2;
		}else if($hh==3){
			$hh=3;
		}else if($hh==4){
			$hh=4;
			$hdd='从新分配';
		}else if($hh==5){
			$hh=5;
			$hddd='恢复订单';
		}else if($hh==6){
			$hh=6;
			
		}else{
			$hh=0;	
	
		}
			$my=M('gdhf');
			$arrg1=$my->where("goods_id='$id' and gdhf_type='1'")->select();
			$arrg2=$my->where("goods_id='$id' and gdhf_type='2'")->select();
			$arrg3=$my->where("goods_id='$id' and gdhf_type='3'")->select();
		
			$shouhou_id=I('get.shouhou_id');
		$ways_id=I('get.ways_id');
		if($ways_id==1){
			$dizhi='shangmen';
		} if($ways_id==2){
			$dizhi='daodian';
		}
		if($ways_id==3){
			$dizhi='jixiu';
		}
		$mysql=M('goods');
		$et=$mysql->where("id='$id'")->find();
		$question_id=$et['question_id'];
		$plan_id=$et['plan_id'];
		$quest=M('maintenance_question');
		$question=$quest->where("question_id in ($question_id)")->select();
		$pla=M('maintenance_plan');
		$plan=$pla->where("plan_id in ($plan_id)")->select();
		//echo 1;DIE;
		if($et['user_id']==0){
			$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
	//	->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->find();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
	//	->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		//->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		//->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id='$id'")->find();
		}
		//echo $arr['dasj'];die;;*
			if($arr['dasj']){
			$dasj=date("Y-m-d H", $arr['dasj']);
			//$dasj=$da.':00';
			}
			if($arr['dasjc']){
			$dasjc=date("Y-m-d H",$arr['dasjc']);
			//$dasjc=$dajc.':00';
			}
			//echo $dasjc;die;
		if($hh==4 || $hh==2){
		
		}else{ 
		if($arr['gzt']==0 && ($arr['stau']==5 || $arr['stau']==6)){
			$gll='退货退款';
		}
		
		
		}
		if($arr['stau']==5 || $arr['stau']==6){
			$glll='申请售后';
		}
		$mysqllll=M('shouhou');
		$arrllll=$mysqllll->where("goods_id='$id'")->select();
		//print_r($arrllll);
		$sqlsql=M('carts');
		$eee=$sqlsql->where("gid='$id' and stau='1'")->find();
			$cc=M('jiance');
			$bb=M('chanpinku');	
			$xhjc_id=$arr['xhjc_id'];
			$cpk_id=$arr['cpk_namee'];//echo die;
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
		
		$sqlh=M('zt_time');
		$arr1=$sqlh->where("goods_id in ($id)")->find();
		if($arr['gzt']==1 ){
			$gf='申请通过';
		}else
		if($hh==2){
			$gff='分配';
		}else if($arr['stau']==0){
			$a='未指派';
			$b='dengdai';
		 $of='指派';
			$offf='取消';
		}else if($arr['stau']==1){
			$a='已指派';
			$b='yizhipai';
			$off='重新指派';
			$offf='取消';
		}else if($arr['stau']==2){
			$a='已接单';
			$b='yijiedan';
			$off='重新指派';
			$offf='取消';
		}else if($arr['stau']==3){
			$a='维修中';
			$b='weixiuzhong';
			$offf='取消';
		}else if($arr['stau']==4){
			$a='待付款';
			$b='daifukuan';
			$offf='取消';
		}else if($arr['stau']==5){
			$a='交易完成';
			$b='jiaoyiwancheng';
			
		}
		if($arr['fapiaoa']==1){
		}else if($arr['stau'] >= 5 && $arr['stau'] < 7  ){
		$shen='申请发票';
		}
		$rtuu=M("shouhou");
		if($shouhou_id){
		$ast=$rtuu->where("shouhou_id='$shouhou_id' or goods_id='$id'")->find();
		if($ast['usid'] >0){
		$ast=$rtuu->join("m_user on shouhou.usid=m_user.user_id")->where("shouhou_id='$shouhou_id' or goods_id='$id'")->select();
		}else{
		$ast=$rtuu->where("shouhou_id='$shouhou_id' or goods_id='$id'")->select();
		}
		}else{
		$ast=$mysqllll->where("goods_id='$id'")->select();
		
		}
		
		}
		}
		$this->assign('shouhou_id',$shouhou_id);
		$this->assign('shen',$shen);
		$this->assign('dasj',$dasj);
		$this->assign('dasjc',$dasjc);
		$this->assign('arrg1',$arrg1);
		$this->assign('arrg2',$arrg2);
		$this->assign('arrg3',$arrg3);
		$this->assign('glll',$glll);
		$this->assign('gll',$gll);
		$this->assign('gl',$gl);
		$this->assign('ast',$ast);
		$this->assign('hdd',$hdd);
		$this->assign('hddd',$hddd);
		$this->assign('arrllll',$arrllll);
		$this->assign('gf',$gf);
		$this->assign('gff',$gff);
		$this->assign('hh',$hh);
		$this->assign('of',$of);
		$this->assign('off',$off);
		$this->assign('offf',$offf);
		$this->assign('arr10',$arr10);
		$this->assign('arr8',$arr8);
		$this->assign('arr9',$arr9);
		$this->assign('b',$b);
		$this->assign('ways_id',$ways_id);
		$this->assign('dizhi',$dizhi);
		$this->assign('a',$a);	
		$this->assign('question',$question);
		$this->assign('plan',$plan);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->display();
}
public function admshouhou(){
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
		$mysql=M('goods');
		$arr=$mysql->where("id='$id'")->find();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function shouhouadd(){
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
		//print_r($_POST);die;
		$post['contentt']=I('post.contentt');
		$post['username']=I('post.username');
		$post['tell']=I('post.tell');
		$post['sh_time']=date('Y-m-d H:i:s', time());
		//$post['addre']=I('post.addre');
		$post['goods_id']=$id=I('post.id');
		$ddh=$post['dd']=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
		$mysql=M('shouhou');
		$sql=M('goods');
		$arr=$mysql->add($post);
		if($arr){
			$data['shouhoua']='1';
			$arr1=$sql->where("id='$id'")->save($data);
			header('location:'. __CONTROLLER__."/xiangqing/id/{$id}");
			
		}
	
	}
	}
	}
	public function thtk(){
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
		$mysql=M('goods');
		$post['gzt']=1;
		$arr=$mysql->where("id='$id'")->save($post);
		if($arr){
			 header('location:'. __CONTROLLER__."/xiangqing/id/{$id}");
		}
		}
		}
	}
public function jiaoyiwancheng(){
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
			$ways_id=I('get.ways_id');
			if(I('get.stau')){
				$stau=I('get.stau');
			}else{
				$stau='5,6';
			}
			$mysql=M('goods');
			$arr1=$mysql
			->where("ways_id='$ways_id' and stau in($stau)")->select();
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
		->where("id='$id'")->order("id desc")->select();
		}else{
		$count= $mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->order("id desc")->count();// 查询满足要求的总记录数

			$Page= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)

			//$Page->setConfig('header',"共 %TOTAL_ROW% 条记录");
			$Page->setConfig('first',"首页");
			$Page->setConfig('last',"尾页");
			$Page->setConfig('prev',"上");
			$Page->setConfig('next',"下");
			$Page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");

			$show= $Page->show();// 分页显示输出

			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

		
			
			
		
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();

		
		}
		}
		}
		$this->assign('page',$show);
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
public function cxfp(){
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
		$sql=M('goods');
		$arr1=$sql->where("id='$id'")->find();
		$user_id=$arr1['user_id'];
		$ways_id=$arr1['ways_id'];
		if($ways_id==1){
		$fs=$smwx_id=$arr1['smwx_id'];
		}else if($ways_id==2){
		$fs=$wxzx_id=$arr1['wxzx_id'];
		}else if($ways_id==3){
		$fs=$jxzx_id=$arr1['jxzx_id'];
		}
		if($ways_id==1){
			$dizhi='shangmen';
		} if($ways_id==2){
			$dizhi='daodian';
		}
		if($ways_id==3){
			$dizhi='jixiu';
		}
		//echo $dizhi;die;
		$mysql=M('m_user');
		
			if($arr1['wxzx_id']){
			$wxzx_id=$arr1['wxzx_id'];
			$sqll=M('m_user');
		
		$user1=$sqll->where("wxzx_id ='$wxzx_id' and sfzt=1")->select();
		$a='休息中';
		$user2=$sqll->where("wxzx_id ='$wxzx_id' and sfzt=2")->select();
		$b='工作中';
		$user3=$sqll->where("wxzx_id ='$wxzx_id' and sfzt=3")->select();
		$c='放假';
		}else if($arr1['jxzx_id']){
			$jxzx_id=$arr1['jxzx_id'];
				$sqll=M('m_user');
		$user1=$sqll->where("jxzx_id ='$jxzx_id' and sfzt=1")->select();
		$a='休息中';
		$user2=$sqll->where("jxzx_id ='$jxzx_id' and sfzt=2")->select();
		$b='工作中';
		$user3=$sqll->where("jxzx_id ='$jxzx_id' and sfzt=3")->select();
		$c='放假';
		}else if($arr1['smwx_id']){
			$smwx_id=$arr1['smwx_id'];
				$sqll=M('m_user');
		$user1=$sqll->where("smwx_id ='$smwx_id' and sfzt=1")->select();
		$a='休息中';
		$user2=$sqll->where("smwx_id ='$smwx_id' and sfzt=2")->select();
		$b='工作中';
		$user3=$sqll->where("smwx_id ='$smwx_id' and sfzt=3")->select();
		$c='放假';
		}
		
	
		}
		}
		$this->assign('arr1',$arr1);
		$this->assign('user3',$user3);
		$this->assign('user2',$user2);
		$this->assign('user1',$user1);
		
		$this->assign('r',$r);
		$this->assign('id',$id);
		$this->assign('a',$a);
		$this->assign('b',$b);
		$this->assign('c',$c);
		$this->assign('id',$id);
		$this->assign('dizhi',$dizhi);
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();

}
public function cxfpup(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	$user_id=I('post.user_id');
	$id=I('post.id');
	$sql=M('goods');
	$arr1=$sql->where("id='$id'")->find();
	$stau=$arr1['stau'];
	$user=$arr1['user_id'];
	if(!$stau==2){
		$this->error("此单已经开始服务了");
	}else{
		if($user_id==$user){
		$this->error("此人已在分配");
		}else{
	$mysql=M('goods');
	$post['user_id']=$user_id;
	$arr=$mysql->where("id='$id'")->save($post);
	if($arr){
		$this->success('分配成功!',__CONTROLLER__."/{$dizhi}",2);
	}
		}
	}
}
		}
		}

		public function tkshenhe(){
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
			$mysql=M('goods');
			$sql=M("m_user");
			$sqlll=M("cangku");
			$arr1=$mysql->where("id='$id'")->find();
			$cangku_id=$arr1['cangku_id'];
			$wxfy=$arr1['wxfy'];
			$ways_id=$arr1['ways_id'];
			$user_id=$arr1['user_id'];
			//echo 1;die;
			if($ways_id==1){
				if(!$wxfy){
					$amount=$arr1['amount'];
				}else{
				$amount=($arr1['amount']-($wxfy*0.3));
				
				}
				
			}else{
				if(!$wxfy){
					$amount=($arr1['amount']-30);
				}else{
				$amount=($arr1['amount']-($wxfy*0.3)-30);
				
				}
			}
			$arr2=$sql->where("user_id='$user_id'")->find();
			$pp['yuemoney']=($arr2['yuemoney']-$amount);
			$arr3=$sql->where("user_id='$user_id'")->save($pp);
			if($arr3){
				$dfg['fk']='110';
				$dfg['stau']='10';
				$dfg['gzt']=2;
				$arr7=$mysql->where("id='$id'")->save($dfg);
				if($arr7){
				$h=M('yue');
				$dat['user_id']=$user_id;
				$dat['yue_type']='售后退款';
				$dat['ddh']=$ddh=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
				$dat['jy_money']='-'.$amount;
				$dat['jy_time']=$time=date('Y-m-d H:i:s', time());
				$arrt=$h->add($dat);
				if($arrt){
				$post['zta']=0;
				if($cangku_id){
				$arr=$sqlll->where("cangku_id in($cangku_id)")->save($post);
				if($arr){
					header('location:'.__MODULE__.'/Caiwu/thtk');
					}
				}else{
				header('location:'.__MODULE__.'/Caiwu/thtk');
				}
				}
				
				
			
				}
		}
		}
		}
		}
		public function huifu(){
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
			$mysql=M('goods');
			$post['fk']=0;
			$post['stau']=0;
			$arr=$mysql->where("id='$id'")->save($post);
			if($arr){
				header('location:'.__CONTROLLER__.'/jdhquxiao');
			}
		}
		}
		}
		public function datechuli(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			
				$data['dasj']=I('get.mmb');
				$data['dasjc']=I('get.mmbc');
				$id=I('get.id');
				$mysql=M('goods');
				$arr1=$mysql->where("id='$id'")->save($data);
				if($arr1){
				$arr=$mysql->where("id='$id'")->find();
				$dasj=date("Y-m-d H", $arr['dasj']);
				$dasjc=date("Y-m-d H", $arr['dasj']);
				
				}
		}
		
		}
			$this->assign('dasjc',$dasjc);
			$this->assign('dasj',$dasj);
			$this->display();

		}
	public function fapiao(){
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
		$id=I('get.id');//die;echo 
		$mysql=M('goods');
		$arr=$mysql->where("id='$id'")->find();	
		 $amount=$arr['amount'];
		 }
		 }
		$this->assign('amount',$amount);
		$this->assign('id',$id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function fapiaoadd(){
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
		//print_r($_POST);die;
		$id=I('post.id');
		$post['user']=I('post.username');
		$post['fptt']=I('post.fptt');
		$post['dizhi']=I('post.dizhi');
		$mysql=M('goods');
		$arr=$mysql->where("id='$id'")->find();	
		$post['amount']=$arr['amount'];
		$ways_id=$arr['ways_id'];
		$post['goods_id']=$id;
		$sql=M('fp');
		$arr1=$sql->add($post);
		if($arr1){
			$data['fapiaoa']=1;
			$arr2=$mysql->where("id='$id'")->save($data);
			if($arr2){
			$this->success('申请成功!',__CONTROLLER__.'/jiaoyiwancheng/ways_id/{$ways_id}',1);
			}
		}
		
	}
	}
	}
	public function shifuweizhi(){
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

	public function ddr(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$ingdeb=I('get.ingdeb');
			$ingde=I('get.ingde');
			$yz=M('admin');
			$yanzheng=$yz->where("username='$username'")->find();
			 $user_id=$yanzheng['admin_id'];
			$mysql=M('weizhia');
			$arr=$mysql->where("user_id='$user_id'")->find();
			if($arr){
			$data['weizhi']=$ingdeb.','.$ingde;
			$arr=$mysql->where("user_id='$user_id'")->save($data);
			}else{
			$post['weizhi']=$ingdeb.','.$ingde;
			$post['user_id']=$user_id;
			$arr=$mysql->add($post);
			}
		
			echo $ingdeb.','.$ingde;
	}
	}
		}
		public function shifuweizhi_show(){
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
			$mysql=M('weizhia');
			$arr=$mysql->select();
			}
			}
			$this->assign('arr',$arr);
			$this->display();
		}
		public function ajax_data(){
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
			$mysql=M('weizhia');
			$arr=$mysql->select();
			}
			}
			$this->assign('arr',$arr);
			$this->display();
			
		}
	}

