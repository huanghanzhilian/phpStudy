<?php
namespace Admin\Controller;
use Think\Controller;
class ShangpinController extends Controller {
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

		}
		}
		$this->display();
	}
	public function tupian(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$questiontype_id=I('get.questiontype_id');
		}
		
		}
		$this->assign('questiontype_id',$questiontype_id);
		$this->display();
	}
	public function wtku(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$brand_id=I('get.brand_id');
		$mysql=M('maintenance_questiontype');
		$arr=$mysql->where("questiontype_zt='0'")->order("type_pai")->select();
		}
		
		}
		$this->assign('arr',$arr);
		$this->assign('brand_id',$brand_id);
		$this->display();
	}
public function wtkuhs(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$brand_id=I('get.brand_id');
		$mysql=M('maintenance_questiontype');
		$arr=$mysql->where("questiontype_zt='1'")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->assign('brand_id',$brand_id);
		$this->display();
	}
	public function upadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		 $questiontype_id=I('post.questiontype_id');
		$brand=I('post.brand');
		$obj=M('maintenance_questiontype');
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath  =      './';
			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
			 $info   =   $upload->upload(); 
			 if(!$info) {      
				 $this->error($upload->getError());   
			 }else{
			$new_info=$info['imgg']['savepath'].$info['imgg']['savename']; 
			$image = new \Think\Image();
			
			
			$_POST['imgg']=str_replace("./Public/","",$new_info);
			
			$re=$obj->where("questiontype_id='$questiontype_id'")->save($_POST);
			if($re){
				header('location:'.__CONTROLLER__.'/wtku/brand_id/{$brand_id}');
			} else {    
				$this->error('添加失败');
			}
		}
	
	}
	}
	}
	public function upaddd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$questiontype_id=I('post.questiontype_id');
		$brand=I('post.brand');
		$obj=M('maintenance_questiontype');
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath  =      './';
			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
			 $info   =   $upload->upload(); 
			 if(!$info) {      
				 $this->error($upload->getError());   
			 }else{
			$new_info=$info['imgg']['savepath'].$info['imgg']['savename']; 
			$image = new \Think\Image();
			
			
			$_POST['imggg']=str_replace("./Public/","",$new_info);
			
			$re=$obj->where("questiontype_id='$questiontype_id'")->save($_POST);
			if($re){
				header('location:'.__CONTROLLER__.'/wtku/brand_id/{$brand_id}');
			} else {    
				$this->error('添加失败');
			}
		}
	
	}
	}
	}

	public function chanpinku(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$mysql=M('maintenance_type');
		$arr=$mysql->select();
		}
		}
		$this->assign('arr',$arr);
		$this->display();
	}
	public function typeup(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$type_name=I('post.type_name');
		$post['type_name']=$type_name;
		$mysql=M('maintenance_type');
		$arr1=$mysql->where("type_name='$type_name'")->find();
		if($arr1){
			$this->success("此分类已存在!");
		}else{
		$arr=$mysql->add($post);
		if($arr){
			header('location:'.__CONTROLLER__.'/chanpinku');
		}
		}
	}
	}
	}
	public function typeshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$type_id=I('get.type_id');
		$sql=M('maintenance_brand');
		$arr1=$sql->where("type_id='$type_id'")->select();
		if($arr1){
			$this->success('此分类下有子分类!',__CONTROLLER__.'/chanpinku',1);
		}else{
		$mysql=M('maintenance_type');
		$arr=$mysql->where("type_id='$type_id'")->delete();
		if($arr){
			header('location:'.__CONTROLLER__.'/chanpinku');
		}
		}
	}
	}
	}
	public function brand(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		 $type_id=I('get.type_id');
		$sql=M('maintenance_brand');
		$arr=$sql->where("type_id='$type_id' and brand_zt='0'")->order("pai")->select();
		}
		}
		$this->assign('type_id',$type_id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function brandhs(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		 $type_id=I('get.type_id');
		$sql=M('maintenance_brand');
		$arr=$sql->where("type_id='$type_id' and brand_zt='1'")->order("pai")->select();
		}
		}
		$this->assign('type_id',$type_id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function brandhuifu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$brand_id=I('get.brand_id');
		$type_id=I('get.type_id');
		$mysql=M('maintenance_brand');
		$st["brand_zt"]=0;
		$arr=$mysql->where("brand_id='$brand_id'")->save($st);
		if($arr){
			$this->success('恢复成功!',__CONTROLLER__."/brand/type_id/{$type_id}",1);
			//header('location:'.__CONTROLLER__."/brand/type_id/{$type_id}");
		}
	}
	}
	}

		public function brandup(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$brand_name=I('post.brand_name');
		$type_id=I('post.type_id');
		$post['brand_name']=$brand_name;
		$post['type_id']=$type_id;
		$mysql=M('maintenance_brand');
		$arr1=$mysql->where("brand_name='$brand_name'")->find();
		if($arr1){
			$this->error("此品牌已存在!");
		}else{
		$arr=$mysql->add($post);
		if($arr){
			$dd['pai']=$arr;
			$arr2=$mysql->where("brand_id='$arr'")->save($dd);
			if($arr2){
			header('location:'.__CONTROLLER__."/brand/type_id/{$type_id}");
		}
		}
		}
	}
	}
	}
	public function brandshanchu(){
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
		$brand_id=I('get.brand_id');
		$sql=M('maintenance_model');
		$arr1=$sql->where("brand_id='$brand_id' and model_zt='0'")->find();
		$my=M('maintenance_brand');
		$arr2=$my->where("brand_id='$brand_id' and brand_zt='0'")->find();
		 $type_id=$arr2['type_id'];
		if($arr1){
			$this->error('此分类下有子分类!');
		}else{
		$mysql=M('maintenance_brand');
		$st["brand_zt"]=1;
		$arr=$mysql->where("brand_id='$brand_id'")->save($st);
		if($arr){
			header('location:'.__CONTROLLER__."/brand/type_id/{$type_id}");
		}
		}
		}
	}
	}
	public function model(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		 $brand_id=I('get.brand_id');
		$sql=M('maintenance_model');
		$myysql=M('maintenance_brand');
		$my=M('maintenance_questiontype');
		$arr4=$my->where("questiontype_zt='0'")->select();
		$arr3=$myysql->where("brand_id='$brand_id' and brand_zt='0'")->find();
		$type_id=$arr3['type_id'];
		$brand_name=$arr3['brand_name'];
		$sqll=M('maintenance_color');
		$arr2=$sqll->select();
		$arr=$sql->where("brand_id='$brand_id' and model_zt='0'")->order("pai_id")->select();
		}
		}
		$this->assign('arr5',$arr5);
		$this->assign('brand_name',$brand_name);
		$this->assign('arr4',$arr4);
		$this->assign('brand_id',$brand_id);
		$this->assign('arr2',$arr2);
		$this->assign('type_id',$type_id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function modelhs(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$brand_id=I('get.brand_id');
		$sql=M('maintenance_model');
		$myysql=M('maintenance_brand');
		$my=M('maintenance_questiontype');
		//$arr4=$my->where("questiontype_zt='1'")->select();
		$arr3=$myysql->where("brand_id='$brand_id' and brand_zt='1'")->find();
		$type_id=$arr3['type_id'];
		$sqll=M('maintenance_color');
		$arr2=$sqll->select();
		$arr=$sql->where("brand_id='$brand_id' and model_zt='1'")->order("pai_id")->select();
		if(!$arr){
		$arr=$sql->where("brand_id='$brand_id' and model_zt='1'")->order("pai_id")->find();
		}
		}
		}
		$this->assign('arr5',$arr5);
		$this->assign('arr4',$arr4);
		$this->assign('brand_id',$brand_id);
		$this->assign('arr2',$arr2);
		$this->assign('type_id',$type_id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function  modelup(){
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
		$post['model_name']=$model_name=I('post.model_name');
		$post['pai_id']=I('post.pai_id');
		$post['brand_id']=$brand_id=I('post.brand_id');
		$color_id=I('post.color_id');
		$questiontype_id=I('post.questiontype_id');
		$mysql=M('maintenance_model');
		$arr2=$mysql->where("model_name='$model_name'")->find();
		if($arr2){
		$this->success('此机型已存在!',__CONTROLLER__."/model/brand_id/{$brand_id}",1);
		}else{
	
		$post['color_id']=implode(',',$color_id);
		$post['questiontype_id']=implode(',',$questiontype_id);
		
		$arr=$mysql->add($post);
		if($arr){
			$data['pai_id']=$arr;
			$arr1=$mysql->where("model_id='$arr'")->save($data);
			if($arr1){
			$this->success('添加成功!',__CONTROLLER__."/model/brand_id/{$brand_id}",1);
		}
		}
	}
	}
	}
	}
	public function coloradd(){
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
		$post['color_name']=$color_name=I('post.color_name');
		$brand_id=I('post.brand_id');
		$sqll=M('maintenance_color');
		$arr2=$sqll->where("color_name='$color_name'")->find();
		if($arr2){
		$this->success('此颜色已存在!',__CONTROLLER__."/ysku/brand_id/{$brand_id}",1);
		}else{
			$arr=$sqll->add($post);
			if($arr){
				$this->success('添加成功!',__CONTROLLER__."/ysku/brand_id/{$brand_id}",1);
			}
		}
	}
	}
	}
	public function ysku(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	$brand_id=I('get.brand_id');
	 $sqll=M('maintenance_color');
	 $arr=$sqll->where("color_zt='0'")->select();
	 }
	 }
	$this->assign('brand_id',$brand_id);
	$this->assign('arr',$arr);
	$this->display();
	}
public function yskuhs(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	$brand_id=I('get.brand_id');
	 $sqll=M('maintenance_color');
	 $arr=$sqll->where("color_zt='1'")->select();
	}
	}
	$this->assign('brand_id',$brand_id);
	$this->assign('arr',$arr);
	$this->display();
	}
public function faku(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	$brand_id=I('get.brand_id');
	 $sqll=M('jiejue');
	 $arr=$sqll->select();
	 }
	 }
	$this->assign('brand_id',$brand_id);
	$this->assign('arr',$arr);
	$this->display();
	}
	public function smku(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	$brand_id=I('get.brand_id');
	 $sqll=M('maintenance_instructions');
	 $arr=$sqll->select();
		}
		}
	$this->assign('brand_id',$brand_id);
	$this->assign('arr',$arr);
	$this->display();
	}
	public function shuomingadd(){
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
		$instructions_name=I('post.instructions_name');
		$brand_id=I('post.brand_id');
		$post['instructions_name']=$instructions_name;
		$sqll=M('maintenance_instructions');
		$arr=$sqll->add($post);
		if($arr){
			$this->success('添加成功!',__CONTROLLER__."/smku/brand_id/{$brand_id}",1);
		}
		
	}
		}
		}
	public function shuomingshanchua(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$instructions_id=I('get.instructions_id');
		$brand_id=I('get.brand_id');
		$sqll=M('maintenance_instructions');
		$st['i_zt']=1;
		$arr=$sqll->where("instructions_id='$instructions_id'")->save($st);
		if($arr){
			$this->success('删除成功!',__CONTROLLER__."/smku/brand_id/{$brand_id}",1);	
		}
		
	}
		}
		}
	public function jiejueadd(){
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
		$jiejue_name=I('post.jiejue_name');
		$brand_id=I('post.brand_id');
		$post['jiejue_name']=$jiejue_name;
		$sqll=M('jiejue');
		$arr=$sqll->add($post);
		if($arr){
			$this->success('添加成功!',__CONTROLLER__."/faku/brand_id/{$brand_id}",1);
		}
		
	}
		}
		}
	public function dawenti(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	 $brand_id=I('get.brand_id');
		}
		}
		$this->assign('brand_id',$brand_id);
		$this->display();
	}
	public function jiejueshanchua(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$jiejue_id=I('get.jiejue_id');
		$brand_id=I('get.brand_id');
		$sqll=M('jiejue');
		$arr=$sqll->where("jiejue_id='$jiejue_id'")->delete();
		if($arr){
			$this->success('删除成功!',__CONTROLLER__."/faku/brand_id/{$brand_id}",1);	
		}
		}
		}
	}
	public function ysshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$color_id=I('get.color_id');
		$brand_id=I('get.brand_id');
		$sqll=M('maintenance_color');
		$st['color_zt']=1;
		$arr=$sqll->where("color_id='$color_id'")->save($st);
		if($arr){
			$this->success('删除成功!',__CONTROLLER__."/ysku/brand_id/{$brand_id}",1);	
		}
		
	}
		}
		}
	public function colorhuifu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$color_id=I('get.color_id');
		$brand_id=I('get.brand_id');
		$sqll=M('maintenance_color');
		$st['color_zt']=0;
		$arr=$sqll->where("color_id='$color_id'")->save($st);
		if($arr){
			$this->success('恢复成功!',__CONTROLLER__."/ysku/brand_id/{$brand_id}",1);	
		}
		}
		}
	}
	public function wtshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$brand_id=I('get.brand_id');
		$questiontype_id=I('get.questiontype_id');
		$sqll=M('maintenance_questiontype');
		$st['questiontype_zt']=1;
		$arr=$sqll->where("questiontype_id='$questiontype_id'")->save($st);
		if($arr){
			$this->success('删除成功!',__CONTROLLER__."/wtku/brand_id/{$brand_id}",1);	
		}
		}
		}
		
	}
	public function questiontypehuifu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$brand_id=I('get.brand_id');
		$questiontype_id=I('get.questiontype_id');
		$sqll=M('maintenance_questiontype');
		$st['questiontype_zt']=0;
		$arr=$sqll->where("questiontype_id='$questiontype_id'")->save($st);
		if($arr){
			$this->success('恢复成功!',__CONTROLLER__."/wtku/brand_id/{$brand_id}",1);	
		}
		}
		}
		
	}
	public function xwtshanchu(){
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
		$brand_id=I('get.brand_id');
		$xwt_id=I('get.xwt_id');
		$xwt_id=I('get.xwt_id');
		$questiontype_id=I('get.questiontype_id');
		$sqll=M('xwt');
		$arr=$sqll->where("xwt_id='$xwt_id'")->delete();
		if($arr){
			$this->success('删除成功!',__CONTROLLER__."/xwt/brand_id/{$brand_id}/questiontype_id/{$questiontype_id}",1);	
		}
		}
		}
	}
	public function xwt(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$questiontype_id=I('get.questiontype_id');
		$brand_id=I('get.brand_id');
		$sqll=M('xwt');
		$arr=$sqll->where("questiontype_id='$questiontype_id'")->select();
		}
		}
		$this->assign('brand_id',$brand_id);
		$this->assign('questiontype_id',$questiontype_id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function xwtadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$questiontype_id=I('post.questiontype_id');
		$xwt_name=I('post.xwt_name');
		$post['questiontype_id']=$questiontype_id;
		$post['xwt_name']=$xwt_name;
		$brand_id=I('post.brand_id');
		$sqll=M('xwt');
		$arr=$sqll->add($post);
		if($arr){
			$this->success('添加成功!',__CONTROLLER__."/xwt/brand_id/{$brand_id}/questiontype_id/{$questiontype_id}",1);
		}
		}
		}
	}
	public function questiontypeadd(){
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
		$post['questiontype_name']=$questiontype_name=I('post.questiontype_name');
		  $brand_id=I('post.brand_id');
		$sqll=M('maintenance_questiontype');
			$arr=$sqll->add($post);
			if($arr){
				$this->success('添加成功!',__CONTROLLER__."/wtku/brand_id/{$brand_id}",1);
			}
		}
		}
		
	}
	public function colorshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$color_id=I('get.color_id');
		$brand_id=I('get.brand_id');
		$mysql=M('maintenance_color');
		$st['color_zt']=1;
		$arr=$mysql->where("color_id='$color_id'")->save($st);
		if($arr){
			$this->success('删除成功!',__CONTROLLER__."/model/brand_id/{$brand_id}",1);
			
		}
		}
		}
	}
	public function questiontypeshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$questiontype_id=I('get.questiontype_id');
		$brand_id=I('get.brand_id');
		$mysql=M('maintenance_questiontype');
		$sql=M('maintenance_question');
		$arr1=$sql->where("questiontype_id='$questiontype_id'")->find();
		if($arr1){
			$this->success('此分类下有子分类!',__CONTROLLER__.'/model/brand_id/{$brand_id}',1);
		}else{
		$st['questiontype_zt']=1;
		$arr=$mysql->where("questiontype_id='$questiontype_id'")->save($st);
		if($arr){
			$this->success('删除成功!',__CONTROLLER__."/model/brand_id/{$brand_id}",1);
		}
	}
	}
		}
		}
	public function modelshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$mysql=M('maintenance_model');
		$sql=M('maintenance_question');
		$st['model_zt']=1;
		$arr=$mysql->where("model_id='$model_id'")->save($st);
		if($arr){
			$stt['question_zt']=1;
			$arr1=$sql->where("model_id='$model_id'")->save($stt);
		
			$this->success('删除成功!',__CONTROLLER__."/model/brand_id/{$brand_id}",1);
			
		}
		}
		}
	}
	public function modelhuifu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$mysql=M('maintenance_model');
		$sql=M('maintenance_question');
		$st['model_zt']=0;
		$arr=$mysql->where("model_id='$model_id'")->save($st);
		if($arr){
			$this->success('恢复成功!',__CONTROLLER__."/model/brand_id/{$brand_id}",1);
			
		}
		}
		}
	}
		public function yanse(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			$model_id=I('get.model_id');
			$brand_id=I('get.brand_id');
			$mysql=M('maintenance_color');
			$sql=M('maintenance_model');
			$arr1=$sql->where("model_id='$model_id' and model_zt='0'")->find();
			$color_id=$arr1['color_id'];
			$model_name=$arr1['model_name'];
			if($color_id){
			$arr=$mysql->where("color_id in($color_id) and color_zt='0'")->select();
			}else{
			$arr=$mysql->where("color_id='$color_id'")->find();
			}
			$arr2=$mysql->select();
		}
		}
			$this->assign('brand_id',$brand_id);
			$this->assign('model_name',$model_name);
			$this->assign('model_id',$model_id);
			$this->assign('arr',$arr);
			$this->assign('arr2',$arr2);
			$this->display();
		}
	public function xiaowenti(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$mysql=M('maintenance_model');
		$arr1=$mysql->where("model_id='$model_id' and model_zt='0'")->find();
		$questiontype_id=$arr1['questiontype_id'];
		$model_name=$arr1['model_name'];
		$sql=M('maintenance_questiontype');
		if($questiontype_id){
		$arr=$sql->where("questiontype_id in($questiontype_id) and questiontype_zt='0'")->select();
		}else{
		
		$arr=$sql->where("questiontype_id='$questiontype_id'")->find();
		}
		$arr1=$sql->select();
		}
		}
		$this->assign('model_name',$model_name);
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->display();

	}
	public function questadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	$questiontype_id=I('post.questiontype_id');
	$model_id=I('post.model_id');
	$brand_id=I('post.brand_id');
	$post['questiontype_id']=implode(',',$questiontype_id);
	$mysql=M('maintenance_model');
	$arr=$mysql->where("model_id='$model_id'")->save($post);
	if($arr){
		$this->success('修改成功!',__CONTROLLER__."/xiaowenti/model_id/{$model_id}/brand_id/{$brand_id}",1);
			
	}
	}
		}
		}
public function yanseadd(){
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
	$color_id=I('post.color_id');
	$model_id=I('post.model_id');
	$brand_id=I('post.brand_id');
	$post['color_id']=$color_id=implode(',',$color_id);
	$mysql=M('maintenance_model');
	$arr1=$mysql->where("model_id='$model_id'")->find();
	if($arr1['color_id']==$color_id){
		$this->error("不要重复添加");
	}else{
	$arr=$mysql->where("model_id='$model_id'")->save($post);
	if($arr){
		$this->success('修改成功!',__CONTROLLER__."/yanse/model_id/{$model_id}/brand_id/{$brand_id}",1);
			
	}
	}
}
		}
		}
public function question_upp(){
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
		$question_name=I('post.question_name');
		$model_id=I('post.model_id');
		$question_id=I('post.question_id');
		$questiontype_id=I('post.questiontype_id');
		$brand_id=I('post.brand_id');
		$mysql=M('maintenance_question');
		$post['question_name']=$question_name;
		$arr=$mysql->where("question_id='$question_id'")->save($post);
if($arr){
$this->success('更改成功!',__CONTROLLER__."/question/model_id/{$model_id}/brand_id/{$brand_id}/questiontype_id/{$questiontype_id}",1);
		}
	}
		}
		}
	public function question(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	//	print_r($_GET);die;
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$questiontype_id=I('get.questiontype_id');
		$mysqlll=M('maintenance_model');
		$arr1ll=$mysqlll->where("model_id='$model_id' and model_zt='0'")->find();
	
		$model_name=$arr1ll['model_name'];
		
		$mysql=M('maintenance_question');
		$sql=M('xwt');
		$arr5=$sql->where("questiontype_id='$questiontype_id'")->select();
		$arr3=$mysql->where("questiontype_id in($questiontype_id) and model_id='$model_id' and question_zt='0'")->select();
		$questionid='';
			foreach ($arr3 as $v=>$kk){
			$questionid.=','.$kk['question_id'];
		}
		$question_id=substr($questionid,1);
		if(!$question_id){
		$arr=$mysql->join("maintenance_plan on maintenance_question.plan_id=maintenance_plan.plan_id")->where("question_id='$question_id'")->find();
		}else{
$arr=$mysql->join("maintenance_plan on maintenance_question.plan_id=maintenance_plan.plan_id")->where("question_id in($question_id) and question_zt='0'")->order("question_pai")->select();
		}
		}
		}
		$this->assign('brand_id',$brand_id);
		$this->assign('model_name',$model_name);
		$this->assign('model_id',$model_id);
		$this->assign('questiontype_id',$questiontype_id);
		$this->assign('arr',$arr);
		$this->assign('arr5',$arr5);
		$this->display();

	}
		public function questionpai(){
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
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$questiontype_id=I('get.questiontype_id');
		$question_id=I('get.question_id');
		 $questionid=I('get.questionid');
		$mysql=M('maintenance_question');
		
	
		
		$arr1=$mysql->where("question_id='$question_id'")->find();
		 $pai1=$arr1['question_pai'];
		$arr2=$mysql->where("question_id='$questionid'")->find();
		$pai2=$arr2['question_pai'];
		 $post['question_pai']=$pai1;
		 $data['question_pai']=$pai2;
		$arr7=$mysql->where("question_id='$questionid'")->save($post);
		$arr4=$mysql->where("question_id='$question_id'")->save($data);
		
		$sql=M('xwt');
		$arr5=$sql->where("questiontype_id='$questiontype_id'")->select();
		$arr3=$mysql->where("questiontype_id in($questiontype_id) and model_id='$model_id' and question_zt='0'")->select();
		$questionid='';
			foreach ($arr3 as $v=>$kk){
			$questionid.=','.$kk['question_id'];
		}
		$question_id=substr($questionid,1);
		if(!$question_id){
		$arr=$mysql->join("maintenance_plan on maintenance_question.plan_id=maintenance_plan.plan_id")->where("question_id='$question_id'")->find();
		}else{
$arr=$mysql->join("maintenance_plan on maintenance_question.plan_id=maintenance_plan.plan_id")->where("question_id in($question_id) and question_zt='0'")->order("question_pai")->select();
		}
		}
		}
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->assign('questiontype_id',$questiontype_id);
		$this->assign('arr',$arr);
		$this->assign('arr5',$arr5);
		$this->display();

	}
		public function questionhs(){
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
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$questiontype_id=I('get.questiontype_id');
		
		
		$mysql=M('maintenance_question');
		$sql=M('xwt');
		$arr5=$sql->where("questiontype_id='$questiontype_id'")->select();
		$arr3=$mysql->where("questiontype_id in($questiontype_id) and model_id='$model_id' and question_zt='1'")->select();
		$questionid='';
			foreach ($arr3 as $v=>$kk){
			$questionid.=','.$kk['question_id'];
		}
		$question_id=substr($questionid,1);
		if(!$question_id){
		$arr=$mysql->join("maintenance_plan on maintenance_question.plan_id=maintenance_plan.plan_id")->where("question_id='$question_id'")->find();
		}else{
$arr=$mysql->join("maintenance_plan on maintenance_question.plan_id=maintenance_plan.plan_id")->where("question_id in($question_id) and question_zt='1'")->select();
		}
		}
		}
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->assign('questiontype_id',$questiontype_id);
		$this->assign('arr',$arr);
		$this->assign('arr5',$arr5);
		$this->display();

	}
	public function ghjiejuefangan (){
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
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$questiontype_id=I('get.questiontype_id');
		$question_id=I('get.question_id');
		$mysql=M('maintenance_plan');
		$mysqlll=M('maintenance_model');
		$arr1ll=$mysqlll->where("model_id='$model_id' and model_zt='0'")->find();
	
		$model_name=$arr1ll['model_name'];
		$arr=$mysql->where("model_id='$model_id' and plan_zt='0'")->select();
		}
		}
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->assign('model_name',$model_name);
		$this->assign('questiontype_id',$questiontype_id);
		$this->assign('arr',$arr);
		$this->assign('question_id',$question_id);
		$this->display();
	
	}
	public function colorup(){
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
		$color_name=I('post.color_name');
		$color_id=I('post.color_id');
		$brand_id=I('post.brand_id');
		$mysql=M('maintenance_color');
		$post['color_name']=$color_name;
		$arr=$mysql->where("color_id='$color_id'")->save($post);
		if($arr){
			$this->success('更改成功!',__CONTROLLER__."/ysku/brand_id/{$brand_id}",1);
		}
	}
		}
		}
	public function planup(){
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
		$jiejue_name=I('post.jiejue_name');
		$jiejue_id=I('post.jiejue_id');
		$brand_id=I('post.brand_id');
		$mysql=M('jiejue');
		$post['jiejue_name']=$jiejue_name;
		$arr=$mysql->where("jiejue_id='$jiejue_id'")->save($post);
		if($arr){
			$this->success('更改成功!',__CONTROLLER__."/faku/brand_id/{$brand_id}",1);
		}
	}
		}
		}
	public function questionup(){
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
		$xwt_name=I('post.xwt_name');
		$questiontype_id=I('post.questiontype_id');
		$xwt_id=I('post.xwt_id');
		$brand_id=I('post.brand_id');
		$mysql=M('xwt');
		$post['xwt_name']=$xwt_name;
		$arr=$mysql->where("xwt_id='$xwt_id'")->save($post);
		if($arr){
			$this->success('更改成功!',__CONTROLLER__."/xwt/brand_id/{$brand_id}/questiontype_id/{$questiontype_id}/",1);
		}
	}
		}
		}
	public function brand_upp(){
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
		$brand_name=I('post.brand_name');
		$type_id=I('post.type_id');;
		$brand_id=I('post.brand_id');
		$mysql=M('maintenance_brand');
		$post['brand_name']=$brand_name;
		$arr=$mysql->where("brand_id='$brand_id'")->save($post);
		if($arr){
			$this->success('更改成功!',__CONTROLLER__."/brand/type_id/{$type_id}",1);
		}
	}
		}
		}
	
	public function model_nameup(){
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
		$model_name=I('post.model_name');
		$brand_id=I('post.brand_id');
		$model_id=I('post.model_id');
		//$brand_id=I('post.brand_id');
		$mysql=M('maintenance_model');
		$post['model_name']=$model_name;
		$arr=$mysql->where("model_id='$model_id'")->save($post);
		if($arr){
			$this->success('更改成功!',__CONTROLLER__."/model/brand_id/{$brand_id}/",1);
		}
	}
		}
		}
	public function questiontypeup(){
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
		$questiontype_name=I('post.questiontype_name');
		$questiontype_id=I('post.questiontype_id');
		$brand_id=I('post.brand_id');
		$mysql=M('maintenance_questiontype');
		$post['questiontype_name']=$questiontype_name;
		$arr=$mysql->where("questiontype_id='$questiontype_id'")->save($post);
		if($arr){
			$this->success('更改成功!',__CONTROLLER__."/wtku/brand_id/{$brand_id}",1);
		}
	}
		}
		}
	public function instructionsup(){
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
		$instructions_name=I('post.instructions_name');
		$instructions_id=I('post.instructions_id');
		$brand_id=I('post.brand_id');
		$mysql=M('maintenance_instructions');
		$post['instructions_name']=$instructions_name;
		$arr=$mysql->where("instructions_id='$instructions_id'")->save($post);
		if($arr){
			$this->success('更改成功!',__CONTROLLER__."/smku/brand_id/{$brand_id}",1);
		}
	}
		}
		}
	public function ghjjfa(){
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
		$questiontype_id=I('post.questiontype_id');
		$model_id=I('post.model_id');
		$brand_id=I('post.brand_id');
		$plan_id=I('post.plan_id');
		$question_id=I('post.question_id');
		$mysql=M('maintenance_question');
		$post['plan_id']=$plan_id;
		$arr=$mysql->where("question_id='$question_id'")->save($post);
		if($arr){
			$this->success('更改成功!',__CONTROLLER__."/question/model_id/{$model_id}/brand_id/{$brand_id}/questiontype_id/{$questiontype_id}/question_id/{$question_id}",1);
		}
	}
		}
		}
	public function xiaoshanchu(){
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
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$question_id=I('get.question_id');
		$questiontype_id=I('get.questiontype_id');
		$mysql=M('maintenance_question');
		$sql=M('maintenance_plan');
		$arr1=$mysql->where("question_id='$question_id'")->find();
		$plan_id=$arr1['plan_id'];
		$st['question_zt']=1;
		$arr=$mysql->where("question_id='$question_id'")->save($st);
		if($arr){
			$this->success('删除成功!',__CONTROLLER__."/question/model_id/{$model_id}/brand_id/{$brand_id}/questiontype_id/{$questiontype_id}",1);
			
		}
		}
		}
	}
	public function questionhuifu(){
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
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$question_id=I('get.question_id');
		$questiontype_id=I('get.questiontype_id');
		$mysql=M('maintenance_question');
		$sql=M('maintenance_plan');
		$arr1=$mysql->where("question_id='$question_id'")->find();
		$plan_id=$arr1['plan_id'];
		$st['question_zt']=0;
		$arr=$mysql->where("question_id='$question_id'")->save($st);
		if($arr){
			$this->success('恢复成功!',__CONTROLLER__."/question/model_id/{$model_id}/brand_id/{$brand_id}/questiontype_id/{$questiontype_id}",1);
		}
		}
			
		}
	}
	public function jiejuefangan(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$questiontype_id=I('get.questiontype_id');
		$question_id=I('get.question_id');
		$mysql=M('maintenance_question');
		$arr2=$mysql->where("question_id='$question_id'")->find();
		$sql=M('maintenance_plan');
		$plan_id=$arr2['plan_id'];
		if($plan_id){
			$lianjie='planxiugai';
			$zt='确认修改';
		}else{

		$lianjie='planadd';
		$zt='确认添加';
		}
		
		$sqll=M('maintenance_instructions');
		$arr=$sql->where("plan_id='$plan_id'")->find();
		$arr6=$sql->where("model_id='$model_id'")->select();
		
		$arr5=$sqll->select();
		}
		}
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->assign('questiontype_id',$questiontype_id);
		$this->assign('question_id',$question_id);
		$this->assign('arr5',$arr5);
		$this->assign('zt',$zt);
		$this->assign('arr',$arr);
		$this->assign('arr6',$arr6);
		$this->assign('lianjie',$lianjie);
		$this->display();
	}
	public function padd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		///print_r($_POST);die;
		 $post['model_id']=$model_id=I('post.model_id');
		 $brand_id=I('post.brand_id');
		 $plan_id=I('post.plan_id');
		 $post['instructions_id']=I('post.instructions_id');
		 $post['question_id']=I('post.question_id');
		 $mysql=M('maintenance_question');
			$data['plan_id']=$plan_id;
			$arr1=$mysql->where("question_id='$question_id'")->save($data);
			if($arr1){
			$this->success('添加成功!',__CONTROLLER__."/question/model_id/{$model_id}/brand_id/{$brand_id}",1);
			}	
	}
		}
		}
	public function fangan(){
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
		 $model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$mysqlll=M('maintenance_model');
		$arr1ll=$mysqlll->where("model_id='$model_id' and model_zt='0'")->find();
	
		$model_name=$arr1ll['model_name'];
		$sql=M('maintenance_plan');
			$sqlll=M('jiejue');
		$arr6=$sqlll->select();
		$sqll=M('maintenance_instructions');
		$arr3=$sql->where("model_id='$model_id' and plan_zt='0'")->select();
		$plan_id='';
			foreach ($arr3 as $v=>$kk){
			$plan_id.=','.$kk['plan_id'];
		}
		 $plan_id=substr($plan_id,1);
		if($plan_id){
		$arr=$sql->join("maintenance_instructions on maintenance_plan.instructions_id=maintenance_instructions.instructions_id")->where("plan_id in($plan_id) and plan_zt='0'")->select();
		}else{
		$arr=$sql->where("plan_id='$plan_id'")->find();
		
		}
		$arr5=$sqll->select();
		}
		}
		$this->assign('arr',$arr);
		
		$this->assign('brand_id',$brand_id);
		$this->assign('model_name',$model_name);
		$this->assign('arr5',$arr5);
		$this->assign('arr6',$arr6);
		$this->assign('model_id',$model_id);
		$this->display();
	
	}
	public function fanganhs(){
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
		 $model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$sql=M('maintenance_plan');
			$sqlll=M('jiejue');
		$arr6=$sqlll->select();
		$sqll=M('maintenance_instructions');
		$arr3=$sql->where("model_id='$model_id' and plan_zt='1'")->select();
		$plan_id='';
			foreach ($arr3 as $v=>$kk){
			$plan_id.=','.$kk['plan_id'];
		}
		 $plan_id=substr($plan_id,1);
		if($plan_id){
		$arr=$sql->join("maintenance_instructions on maintenance_plan.instructions_id=maintenance_instructions.instructions_id")->where("plan_id in($plan_id) and plan_zt='1'")->select();
		}else{
		$arr=$sql->where("plan_id='$plan_id'")->find();
		
		}
		$arr5=$sqll->select();
		}
		}
		$this->assign('arr',$arr);
		
		$this->assign('brand_id',$brand_id);
		$this->assign('arr5',$arr5);
		$this->assign('arr6',$arr6);
		$this->assign('model_id',$model_id);
		$this->display();
	
	}
	public function jiejueaddd(){
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
		 $model_id=I('post.model_id');
		// $questiontype_id=I('post.questiontype_id');
		 $brand_id=I('post.brand_id');
		 $jiejue_name=I('post.jiejue_name');
		$a=count($jiejue_name);
		
		$mysql=M('maintenance_plan');
		for($i=0;$i<$a;$i++){
			$jiejuename=$jiejue_name[$i];//DIE;ECHO 	
		
			$model_id=$model_id;
			
		$post[]=array('plan_name'=>$jiejuename,'model_id'=>$model_id);
				}
				
		
			$arr=$mysql->addAll($post);
		if($arr){
			$this->success('添加成功!',__CONTROLLER__."/fangan/model_id/{$model_id}/brand_id/{$brand_id}",1);
			
		}
		
		//$arr->
		}
		}
	
	}
	public function jiejueshanchu(){
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
		 $model_id=I('get.model_id');
		 $brand_id=I('get.brand_id');
		 $plan_id=I('get.plan_id');
		 $sql=M('maintenance_plan');
		 $st['plan_zt']=1;
		 $arr=$sql->where("plan_id='$plan_id'")->save($st);
		 if($arr){
			$this->success('删除成功!',__CONTROLLER__."/fangan/model_id/{$model_id}/brand_id/{$brand_id}",1);
			}	
		}
		}
	}
	public function planhuifu(){
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
		 $model_id=I('get.model_id');
		 $brand_id=I('get.brand_id');
		 $plan_id=I('get.plan_id');
		 $sql=M('maintenance_plan');
		 $st['plan_zt']=0;
		 $arr=$sql->where("plan_id='$plan_id'")->save($st);
		 if($arr){
			$this->success('恢复成功!',__CONTROLLER__."/fangan/model_id/{$model_id}/brand_id/{$brand_id}",1);
			}	
		}
		}
	}
	public function fanganxiugai(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
	//	print_r($_GET);die;
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$plan_id=I('get.plan_id');
	
		$sqll=M('maintenance_instructions');
		$sql=M('maintenance_plan');
		$arr=$sql->where("plan_id='$plan_id'")->find();
		
		
		$arr5=$sqll->select();
		}
		}
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->assign('questiontype_id',$questiontype_id);
		$this->assign('question_id',$question_id);
		$this->assign('arr5',$arr5);
		$this->assign('zt',$zt);
		$this->assign('arr',$arr);
		$this->assign('arr6',$arr6);
		$this->assign('lianjie',$lianjie);
		$this->display();
	}
	public function fananxiugaiadd(){
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
		 $post['model_id']=$model_id=I('post.model_id');
		 $brand_id=I('post.brand_id');
		 $questiontype_id=I('post.questiontype_id');
		 $question_id=I('post.question_id');
		 $plan_id=I('post.plan_id');
		 $post['plan_name']=I('post.plan_name');
		 $post['ways_id']=I('post.ways_id');
		 $post['money']=I('post.money');
		 $post['m_time']=I('post.m_time');
		 $post['warranty_name']=I('post.warranty_name');
		 $post['instructions_id']=I('post.instructions_id');
		// $post['ways_id']='1,2,3';
		 $sqll=M('maintenance_plan');
		 $arr=$sqll->where("plan_id='$plan_id'")->save($post);
		if($arr){
			$this->success('修改成功!',__CONTROLLER__."/fangan/model_id/{$model_id}/brand_id/{$brand_id}",1);
			
		}	
	}
		}
		}
	
	public function planadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		 $post['model_id']=$model_id=I('post.model_id');
		 $brand_id=I('post.brand_id');
		  $plan_id=I('post.plan_id');
		 $post['plan_name']=I('post.plan_name');
		 $post['money']=I('post.money');
		 $post['m_time']=I('post.m_time');
		 $post['warranty_name']=I('post.warranty_name');
		 $post['instructions_id']=I('post.instructions_id');
		 $post['ways_id']='1,2,3';
		 $sqll=M('maintenance_plan');
		 $mysql=M('maintenance_question');
		 $arr=$sqll->add($post);
		if($arr){
			
			$this->success('添加成功!',__CONTROLLER__."/fangan/model_id/{$model_id}/brand_id/{$brand_id}",1);
		}	
	}
		}
		}
	public function questtadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		print_r($_POST);exit;
		$model_id=I('post.model_id');
		$brand_id=I('post.brand_id');
		$questiontype_id=I('post.questiontype_id');
		$question_name=I('post.question_name');
		//print_r($question_name);exit;
		$question_id=I('post.question_id');
		$a=count($question_name);
		$mysql=M('maintenance_question');
		for($i=0;$i<$a;$i++){
			$questionname=$question_name[$i];//DIE;ECHO 	
			$modelid=$model_id;
			$questiontypeid=$questiontype_id;
			$plan_id='4487';
			$questionpai=$question_id[$i];
		$post[]=array('question_name'=>$questionname,'model_id'=>$modelid,'questiontype_id'=>$questiontypeid,'plan_id'=>$plan_id,'question_pai'=>$questionpai);
				}
				
		
		$arr=$mysql->addAll($post);
		
		//for($i=0;$i<$num;$i++){
		//	$questionpai=$tt[$i];
		//	$questionid=$ss[$i];
		//	$data[]=array('question_pai'=>$questionpai);
			
		//	}
		//	$arr1=$mysql->where("question_id='$questionid'")->save($data);
		if($arr){
			$this->success('添加成功!',__CONTROLLER__."/question/model_id/{$model_id}/brand_id/{$brand_id}/questiontype_id/{$questiontype_id}",1);
			
		}
		
		}
		}
	}
	public function qtypeshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$questiontype_id=I('get.questiontype_id');
		$mysql=M('maintenance_questiontype');
		$st['questiontype_zt']=1;
		$arr=$mysql->where("questiontype_id='$questiontype_id'")->save($st);
		if($arr){
			$this->success('删除成功!',__CONTROLLER__."/question/model_id/{$model_id}/brand_id/{$brand_id}",1);
			
		}
		}
		}
	}
	public function chanpinkua(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$mysql=M('chanpinku');
		$mysqlll=M('maintenance_model');
		$arr1ll=$mysqlll->where("model_id='$model_id' and model_zt='0'")->find();
	
		$model_name=$arr1ll['model_name'];
		$arr=$mysql->where("model_id='$model_id' and cpk_zt='0'")->order("cpk_pai")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->assign('model_name',$model_name);
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->display();
	}
	public function chanpinkupai(){
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
		$model_id=I('get.model_id');
		 $brand_id=I('get.brand_id');
		 $cpk_id=I('get.cpk_id');
		$cpkid=I('get.cpkid');
		$mysql=M('chanpinku');
		$arr1=$mysql->where("cpk_id='$cpk_id'")->find();
		 $pai1=$arr1['cpk_pai'];
		$arr2=$mysql->where("cpk_id='$cpkid'")->find();
		$pai2=$arr2['cpk_pai'];
		
		 $post['cpk_pai']=$pai1;
		 $data['cpk_pai']=$pai2;
		$arr3=$mysql->where("cpk_id='$cpkid'")->save($post);
		$arr4=$mysql->where("cpk_id='$cpk_id'")->save($data);
		$mysqlll=M('maintenance_model');
		$arr1ll=$mysqlll->where("model_id='$model_id' and model_zt='0'")->find();
		$model_name=$arr1ll['model_name'];
		$arr=$mysql->where("model_id='$model_id' and cpk_zt='0'")->order("cpk_pai")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->assign('model_name',$model_name);
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->display();
	}
	public function chanpinhs(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$mysql=M('chanpinku');
		$arr=$mysql->where("model_id='$model_id' and cpk_zt='1'")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->display();
	}
	public function chanpinup(){
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
		$brand_id=I('post.brand_id');
		$post['model_id']=$model_id=I('post.model_id');
		$post['cpk_name']=I('post.cpk_name');
		$post['cpp_price']=I('post.cpp_price');
		$post['cpk_price']=I('post.cpk_price');
		$post['sf']=I('post.sf');
		$mysql=M('chanpinku');
		$arr=$mysql->add($post);
		if($arr){
			$data['cpk_pai']=$arr;
			$arr1=$mysql->where("cpk_id='$arr'")->save($data);
			if($arr1){
			$this->success('添加成功!',__CONTROLLER__."/chanpinkua/model_id/{$model_id}/brand_id/{$brand_id}",1);
			}
		}
	}
		}
		}
	public function chanpinshanchu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$cpk_id=I('get.cpk_id');
		$mysql=M('chanpinku');
		$st['cpk_zt']=1;
		$arr=$mysql->where("cpk_id='$cpk_id'")->save($st);
		if($arr){
			$this->success('删除成功!',__CONTROLLER__."/chanpinkua/model_id/{$model_id}/brand_id/{$brand_id}",1);
			
		}
	}
		}
		}
	public function chanpinhuifu(){
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
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$cpk_id=I('get.cpk_id');
		$mysql=M('chanpinku');
		$st['cpk_zt']=0;
		$arr=$mysql->where("cpk_id='$cpk_id'")->save($st);
		if($arr){
			$this->success('恢复成功!',__CONTROLLER__."/chanpinkua/model_id/{$model_id}/brand_id/{$brand_id}",1);
			
		}
		}
		}
	}
	public function chanpinxiugai(){
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
		$mysql=M('chanpinku');
		$arr=$mysql->where("cpk_id='$cpk_id'")->find();
		$model_id=$arr['model_id'];
		$sql=M('maintenance_model');
		$arr1=$sql->where("model_id='$model_id'")->find();
		$brand_id=$arr1['brand_id'];
		}
		}
		$this->assign('arr',$arr);
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->display();
	}
	public function chanpinupp(){
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
		$brand_id=I('post.brand_id');
		$cpk_id=I('post.cpk_id');
		$post['model_id']=$model_id=I('post.model_id');
		$post['cpk_name']=I('post.cpk_name');
		$post['cpp_price']=I('post.cpp_price');
		$post['cpk_price']=I('post.cpk_price');
		$post['sf']=I('post.sf');
			$mysql=M('chanpinku');
		$arr=$mysql->where("cpk_id='$cpk_id'")->save($post);
		if($arr){
			$this->success('修改成功!',__CONTROLLER__."/chanpinkua/model_id/{$model_id}/brand_id/{$brand_id}",1);
		}
		}
		}
	}
	public function paixu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$model_id=I('get.model_id');
		$brand_id=I('get.brand_id');
		$sql=M('maintenance_model');
		$arr=$sql->where("brand_id='$brand_id'")->order("pai_id")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->display();
		
	}
	public function pai(){
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
		$brand_id=I('get.brand_id');
		$model_id=I('get.model_id');
		$modelid=I('get.modelid');
		$mysql=M('maintenance_model');
		$arr1=$mysql->where("model_id='$model_id'")->find();
		 $pai_id1=$arr1['pai_id'];
		$arr2=$mysql->where("model_id='$modelid'")->find();
		$pai_id2=$arr2['pai_id'];
		$post['pai_id']=$pai_id2;
		$data['pai_id']=$pai_id1;
		$arr3=$mysql->where("model_id='$model_id'")->save($post);
		$$arr4=$mysql->where("model_id='$modelid'")->save($data);
		$arr=$mysql->where("brand_id='$brand_id'")->order("pai_id")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->display();

	}
	public function brandpai(){
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
		$pai_id=I('get.brand_id');
		 $type_id=I('get.type_id');
		 $paiid=I('get.brandid');
		$sql=M('maintenance_type');
		$mysql=M('maintenance_brand');
		$arr1=$mysql->where("pai='$pai_id'")->find();
		 $brand_id1=$arr1['brand_id'];
		$arr2=$mysql->where("pai='$paiid'")->find();
		$brand_id2=$arr2['brand_id'];
		 $post['pai']=$pai_id;
		 $data['pai']=$paiid;
		$arr3=$mysql->where("brand_id='$brand_id2'")->save($post);
		$$arr4=$mysql->where("brand_id='$brand_id1'")->save($data);
		$arr=$mysql->where("type_id='$type_id' and brand_zt='0'")->order("pai")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->assign('brand_id',$brand_id);
		$this->assign('model_id',$model_id);
		$this->assign('type_id',$type_id);
		$this->display();

	}

public function questiontypepai(){
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
		$questiontype_id=I('get.model_id');
		 $brand_id=I('get.brand_id');
		 $questiontypeid=I('get.modelid');
	//	$sql=M('maintenance_type');
		$mysql=M('maintenance_questiontype');
		$arr1=$mysql->where("questiontype_id='$questiontype_id'")->find();
		 $pai1=$arr1['type_pai'];
		$arr2=$mysql->where("questiontype_id='$questiontypeid'")->find();
		$pai2=$arr2['type_pai'];
		 $post['type_pai']=$pai1;
		 $data['type_pai']=$pai2;
		$arr3=$mysql->where("questiontype_id='$questiontypeid'")->save($post);
		$arr4=$mysql->where("questiontype_id='$questiontype_id'")->save($data);
		$arr=$mysql->where("questiontype_zt='0'")->order("type_pai")->select();
		}
		}
		$this->assign('arr',$arr);
		$this->assign('brand_id',$brand_id);
		$this->display();

	}
	public function bztj(){
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
		$cpk_content=I('post.cpk_content');
		$cpk_id=I('post.cpk_id');
		$mysql=M('chanpinku');
		$post['cpk_content']=$cpk_content;
		$arr=$mysql->where("cpk_id='$cpk_id'")->save($post);
		if($arr){
		echo $cpk_content;
		}
		}
		}
	
	}
}

?>