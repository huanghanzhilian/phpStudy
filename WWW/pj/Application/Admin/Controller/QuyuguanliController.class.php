<?php
namespace Admin\Controller;
use Think\Controller;
class QuyuguanliController extends Controller {
		
		public function index(){
			if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__CONTROLLER__.'/login');
		}else{
			$mysql=M('smwx');
			$sql=M('jxzx');
			$my=M('wxzx');
			$arr1=$sql->select();
			$arr=$mysql->select();
			$arr2=$my->select();
		}
		}
			$this->assign('arr1',$arr1);
			$this->assign('arr2',$arr2);
			$this->assign('arr',$arr);
			$this->display();
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
		
	public function qyshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__CONTROLLER__.'/login');
		}else{
			$smwx_id=I('get.smwx_id');
			$mysql=M('m_user');
			$arr=$mysql->where("smwx_id='$smwx_id'")->find();
			if($arr){
			$this->success('此分类下有子分类!',__CONTROLLER__.'/index',1);
			}else{
			$sql=M('smwx');
			$arr1=$sql->where("smwx_id='$smwx_id'")->delete();
			if($arr1){
			$this->success('删除成功!',__CONTROLLER__.'/index',1);
			}
		 }
		}
		}
	}
	public function jxshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__CONTROLLER__.'/login');
		}else{
			$jxzx_id=I('get.jxzx_id');
			$mysql=M('m_user');
			$arr=$mysql->where("jxzx_id='$jxzx_id'")->find();
			if($arr){
			$this->success('此分类下有子分类!',__CONTROLLER__.'/jixiugl',1);
			}else{
			$sql=M('jxzx');
			$arr1=$sql->where("jxzx_id='$jxzx_id'")->delete();
			if($arr1){
			$this->success('删除成功!',__CONTROLLER__.'/jixiugl',1);
			}
		 }
		}
		}
	}
		public function ddshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__CONTROLLER__.'/login');
		}else{
			$wxzx_id=I('get.wxzx_id');
			$mysql=M('m_user');
			$arr=$mysql->where("wxzx_id='$wxzx_id'")->find();
			if($arr){
			$this->success('此分类下有子分类!',__CONTROLLER__.'/daodiangl',1);
			}else{
			$sql=M('wxzx');
			$arr1=$sql->where("wxzx_id='$wxzx_id'")->delete();
			if($arr1){
			$this->success('删除成功!',__CONTROLLER__.'/daodiangl',1);
			}
		 }
		}
		}
	}
	public function map_gl_xg(){
		if(empty($_COOKIE['username'])){
			header('location:'.__CONTROLLER__.'/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__CONTROLLER__.'/login');
		}else{
			$smwx_id=I('get.smwx_id');
			$mysql=M('smwx');
			$arr=$mysql->where("smwx_id='$smwx_id'")->find();
		}
		}
			$this->assign('arr',$arr);
			$this->display();
		}
		public function map_gl(){
		
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
			$smwx_id=I('get.smwx_id');
			$jxzx_id=I('get.jxzx_id');
			$wxzx_id=I('get.wxzx_id');
	$mysql=M('m_user');
	if($smwx_id){
	$arr=$mysql->where("sfzt in(1,2,3) and smwx_id='$smwx_id'")->select();
	}
	if($jxzx_id){
	$arr=$mysql->where("sfzt in(1,2,3) and jxzx_id='$jxzx_id'")->select();
	}
	if($wxzx_id){
	$arr=$mysql->where("sfzt in(1,2,3) and wxzx_id='$wxzx_id'")->select();
	}
		$mys=M('smwx');
			$sql=M('jxzx');
			$my=M('wxzx');
			
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
public function shifuglz(){

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
public function fp(){
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
	$at=I('get.at');
	$post['smwx_id']=I('post.smwx_id');
	$post['jxzx_id']=I('post.jxzx_id');
	$post['wxzx_id']=I('post.wxzx_id');
	$user_id=I('post.user_id');
	$mysql=M('m_user');
	$arr=$mysql->where("user_id='$user_id'")->save($post);
	if($arr){
		if($at){
			$this->success('分配成功!',__CONTROLLER__."/shifuglz",1);
		}else{
			$this->success('分配成功!',__CONTROLLER__."/index",1);
		}
		
	}
	}
	}
}
public function lz(){
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
	$arr=$mysql->where("sfzt='4'")->select();

	}
	}
	$this->assign('arr',$arr);
	$this->display();
}
public function lizhi(){
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
	$mysql=M('m_user');
	$post['sfzt']=4;
	$arr=$mysql->where("user_id='$user_id'")->save($post);
	if($arr){
		header('location:'.__CONTROLLER__.'/shifugl');
	}
}
}
}
public function lizhiz(){
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
	$mysql=M('m_user');
	$post['sfzt']=4;
	$arr=$mysql->where("user_id='$user_id'")->save($post);
	if($arr){
		header('location:'.__CONTROLLER__.'/shifuglz');
	}
}
}
}
public function yuangong(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath  =      './';
			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
			 $info   =   $upload->upload(); 
			 if(!$info) {      
				 $this->error($upload->getError());   
			 }else{
			$new_info=$info['img']['savepath'].$info['img']['savename']; 
			$image = new \Think\Image();
			$post['img']=$_post['img']=str_replace("./Public/","",$new_info);
		//	print_r();die;
			$post['user_name']=I('post.user_name');
			$post['user_username']=I('post.user_username');

			$post['xyed']=I('post.xyed');
			$post['pwd']=I('post.pwd');
			$post['jxzx_id']=I('post.jxzx_id');;
			$post['smwx_id']=I('post.smwx_id');;
			$post['wxzx_id']=I('post.wxzx_id');;
			$post['sfzt']=1;
			$obj=M('m_user');
			$re=$obj->add($post);
			if($re){
				$this->success('添加成功!',__CONTROLLER__."/index",1);
			} else {    
				$this->error('添加失败');
			}
		}
	}
	}
	}
	public function jiangjin(){
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
		$at=I('get.at');
		$money=I('post.money');
		$content=I('post.content');
		$user_id=I('post.user_id');
		$mysql=M("m_user");
		$sql=M("wd_customer");
		$arr1=$mysql->where("user_id='$user_id'")->find();
		$customer_id=$arr1['customer_id'];
		$arr2=$sql->where("customer_id='$customer_id'")->find();
		$openid=$arr2['openid'];
		$pp['yuemoney']=($arr1['yuemoney']+$money);
		$arr=$mysql->where("user_id='$user_id'")->save($pp);
		if($arr){
		$h=M('yue');
		$dat['user_id']=$user_id;
		$dat['yue_type']='奖金';
		$dat['ddh']=$ddh=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
		$dat['jy_money']='+'.$money;
		$dat['jy_time']=$time=date('Y-m-d H:i:s', time());
		$arrt=$h->add($dat);
		if($arrt){
			$access_token = getnewtoken();
			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			$datatt['touser'] = $openid;
			$datatt['template_id'] = '5Q1Tw9g2HbglQAM3PEJpm7q7rNiAp-iXPWTJVqI6W68';
			$datatt['url'] = 'http://m.weibaishi.com/Home/Shifu/shifu';
			$firstd ='奖罚提醒';
			$datatt['data'] = array(
				'first' => array('value'=>$firstd,'color'=>'#173177'),
				'keyword1' => array('value'=>$money,'color'=>'#173177'),
				'keyword2' => array('value'=>'奖金','color'=>'#173177'),
				'keyword3' => array('value'=>$ddh,'color'=>'#173177'),
				'keyword4' => array('value'=>$time,'color'=>'#173177'),
				'remark' => array('value'=>$content,'color'=>'#173177'),
				);
			$post_msg = json_encode($datatt);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
			if($at){
			$this->success('发放成功!',__CONTROLLER__."/shifuglz",1);
			}else{
			$this->success('发放成功!',__CONTROLLER__."/shifugl",1);
			}
		}
		}
		}
	
	}
	}
	public function fakuan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	//	print_r($_POST);die;
		 $at=I('get.at');
		$money=I('post.money');
		$content=I('post.content');
		$user_id=I('post.user_id');
		$mysql=M("m_user");
		$sql=M("wd_customer");
		$arr1=$mysql->where("user_id='$user_id'")->find();
		$customer_id=$arr1['customer_id'];
		$arr2=$sql->where("customer_id='$customer_id'")->find();
		$openid=$arr2['openid'];
		$pp['yuemoney']=($arr1['yuemoney']-$money);
		$arr=$mysql->where("user_id='$user_id'")->save($pp);
		if($arr){
		$h=M('yue');
		$dat['user_id']=$user_id;
		$dat['yue_type']='罚款';
		$dat['ddh']=$ddh=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
		$dat['jy_money']='-'.$money;
		$dat['jy_time']=$time=date('Y-m-d H:i:s', time());
		$arrt=$h->add($dat);
		if($arrt){
			$access_token = getnewtoken();
			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			$datatt['touser'] = $openid;
			$datatt['template_id'] = 'kTAsQFORiEpDYcfPENK32_EiNG5RUsP746B3X1_ecMY';
			$datatt['url'] = 'http://m.weibaishi.com/Home/Shifu/shifu';
			$firstd ='奖罚提醒';
			$datatt['data'] = array(
				'first' => array('value'=>$ddh,'color'=>'#173177'),
				'keyword1' => array('value'=>$money,'color'=>'#173177'),
				'keyword2' => array('value'=>'罚款','color'=>'#173177'),
				'remark' => array('value'=>$content,'color'=>'#173177'),
				);
			$post_msg = json_encode($datatt);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
			if($at){
			$this->success('罚款成功!',__CONTROLLER__."/shifuglz",1);
			}else{
			$this->success('罚款成功!',__CONTROLLER__."/shifugl",1);
			}
			
		}
		}
		}
	
	}
	
	}
	public function tzed(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$xyed=I('post.xyed');
		$at=I('get.at');
		$user_id=I('post.user_id');
		$mysql=M("m_user");
		$post['xyed']=$xyed;
		$arr=$mysql->where("user_id='$user_id'")->save($post);
		if($arr){
			if($at){
			$this->success('更改成功!',__CONTROLLER__."/shifuglz",1);
			}else{
		 $this->success('更改成功!',__CONTROLLER__."/shifugl",1);
		 }
		}
		}
		}
	}
	public function yuangonghuifu(){
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
	$mysql=M('m_user');
	$post['sfzt']=1;
	$arr=$mysql->where("user_id='$user_id'")->save($post);
	if($arr){
		$this->success('恢复成功!',__CONTROLLER__."/shifugl",1);
	}
}
}
	
	}
	public function yuangonghuifuz(){
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
	$mysql=M('m_user');
	$post['sfzt']=1;
	$arr=$mysql->where("user_id='$user_id'")->save($post);
	if($arr){
		$this->success('恢复成功!',__CONTROLLER__."/shifuglz",1);
	}
}
}
	
	}
	public function xgztt(){
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
			$at=I('get.at');
			$sfzt=I('post.sfzt');
			$mysql=M('m_user');
			$post['sfzt']=$sfzt;
			$arr=$mysql->where("user_id='$user_id'")->save($post);
		if($arr){
				if($at){
			$this->success('修改成功!',__CONTROLLER__."/shifuglz",1);
			}else{
			$this->success('修改成功!',__CONTROLLER__."/shifugl",1);
			}
		}
		}
		}
	}
	public function phoneup(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$at=I('get.at');
			$user_id=I('post.user_id');
			$user_name=I('post.user_name');
			$mysql=M('m_user');
			$post['user_name']=$user_name;
			$arr=$mysql->where("user_id='$user_id'")->save($post);
		if($arr){
			if($at){
			$this->success('修改成功!',__CONTROLLER__."/shifuglz",1);
			}else{
			$this->success('修改成功!',__CONTROLLER__."/shifugl",1);
			}
		}
		}
		}
	}
	public function map_qygl(){
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
			$post['smwx_name']=I('post.city_name');
			$post['jingweidu']=I('post.jingweidu');
			$mysql=M('smwx');
			$arr=$mysql->add($post);
			if($arr){
			header('location:'.__CONTROLLER__.'/index');
			}
		}
		}
		
		}
		public function map_qyxg(){
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
		//	print_r($_POST);die;
			$smwx_id=I('post.smwx_id');
			$jingweidu=I('post.jingweidu');
			$mysql=M('smwx');
			$post['jingweidu']=$jingweidu;
			$arr=$mysql->where("smwx_id='$smwx_id'")->save($post);
			if($arr){
			$this->success('修改成功!',__CONTROLLER__."/index",1);
			}
	
		}
		}
		}
		public function map_gl_xq(){
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
		public function xiugaichengshi(){
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
			//print_r($_GET);die;
			$smwx_id=I('post.smwx_id');
			$smwx_name=I('post.smwx_name');
			$mysql=M('smwx');
			$post['smwx_name']=$smwx_name;
			$arr=$mysql->where("smwx_id='$smwx_id'")->save($post);
			if($arr){
				echo $smwx_name;
			}
			}
			}
		}
		public function jxzxtj(){
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
			$post['jxzx_name']=I('post.jxzx_name');
			$post['jxzx_n']=I('post.jxzx_n');
			$post['jxzx_username']=I('post.jxzx_username');
			$post['jxzx_phone']=I('post.jxzx_phone');
			$mysql=M('jxzx');

			$arr=$mysql->add($post);
			if($arr){
			$this->success('添加成功!',__CONTROLLER__."/jixiugl",1);
			}
			}
			}
		}
		public function wxzxtj(){
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
			$post['wxzx_name']=I('post.wxzx_name');
			$post['wxzx_n']=I('post.wxzx_n');
			$post['wxzx_username']=I('post.wxzx_username');
			$post['wxzx_phone']=I('post.wxzx_phone');
			$post['wxzx_time']="早9:00-晚8:00（全年无休）";
			$mysql=M('wxzx');

			$arr=$mysql->add($post);
			if($arr){
			$this->success('添加成功!',__CONTROLLER__."/daodiangl",1);
			}
		}
		}
		}

		public function jixiugl(){
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
			$mysql=M('smwx');
			$sql=M('jxzx');
			$my=M('wxzx');
			$arr=$sql->select();
			$arr1=$mysql->select();
			$arr2=$my->select();
			}
			}
			$this->assign('arr',$arr);
			$this->assign('arr1',$arr1);
			$this->assign('arr2',$arr2);
			$this->display();
		}
		public function daodiangl(){
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
				$mysql=M('smwx');
			$sql=M('jxzx');
			$my=M('wxzx');
			$arr1=$sql->select();
			$arr=$my->select();
			$arr2=$mysql->select();
			}
			}
			$this->assign('arr',$arr);
			$this->assign('arr1',$arr1);
			$this->assign('arr2',$arr2);
			$this->display();
		}
		public function xiugaijx(){
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
			$jxzx_id=I('post.jxzx_id');
			$jxzx_name=I('post.jxzx_name');
			$mysql=M('jxzx');
			$post['jxzx_name']=$jxzx_name;
			$arr=$mysql->where("jxzx_id='$jxzx_id'")->save($post);
			if($arr){
				echo $jxzx_name;
			}
			}
}
		}
		public function xiugaidd(){
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
			$wxzx_id=I('post.wxzx_id');
			$wxzx_name=I('post.wxzx_name');
			$mysql=M('wxzx');
			$post['wxzx_name']=$wxzx_name;
			$arr=$mysql->where("wxzx_id='$wxzx_id'")->save($post);
			if($arr){
				echo $wxzx_name;
			}
			}
	}
		}

}
?>