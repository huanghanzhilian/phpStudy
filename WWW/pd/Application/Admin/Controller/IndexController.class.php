<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		//$us_name=$yanzheng['us_name'];
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
			if($username=='18511404833' or $username=='18701275059' or $username=='17717357179'){
			$laite='财务管理';
			}
		}
		}
		$this->assign('laite',$laite);
		$this->display();
    }
public function dingdan_list(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('admin');
		$yanzheng=$yz->where("username='$username'")->find();
		if(!$yanzheng){
			header('location:'.__MODULE__.'/Caiwu/login');
		}else{
		$sea=I('get.sea');
		$mysql=M('goods');
		//$sql=M('shouhou');
	$arr=$mysql
		->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("(ddh like '%$sea%') or(u_phone like '%$sea%') ")->select();
		if(!$arr){
		$arr=$r=$mysql
		->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		//->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("gdhf on goods.id=gdhf.goods_id")
		->where("(ddh like '%$sea%') or(u_phone like '%$sea%') or (gdhf_content like '%$sea%')")->select();
		
		}
		
		//print_r($arr);die;
		
		
		}
		}
			$this->assign('arr',$arr);
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
		$id=I('get.id');
		$mysql=M('goods');
		$et=$mysql->where("id='$id'")->find();
		$question_id=$et['question_id'];
		$plan_id=$et['plan_id'];
		$quest=M('maintenance_question');
		$question=$quest->where("question_id in ($question_id)")->select();
		$pla=M('maintenance_plan');
		$plan=$pla->where("plan_id in ($plan_id)")->select();
		if($et['user_id']==0){
			$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->find();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
	
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id='$id'")->find();
		}
			$cc=M('jiance');
			$bb=M('chanpinku');	
			$xhjc_id=$arr['xhjc_id'];
			$cpk_id=$arr['cppk_id'];//echo die;
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
		if($arr['stau']=0){
			$a='未指派';
			$b='dengdai';
		}else if($arr['stau']=1){
			$a='已指派';
			$b='yizhipai';
		}else if($arr['stau']=2){
			$a='已接单';
			$b='yijiedan';
		}else if($arr['stau']=3){
			$a='维修中';
			$b='weixiuzhong';
		}else if($arr['stau']=4){
			$a='待付款';
			$b='daifukuan';
		}else if($arr['stau']=5){
			$a='交易完成';
			$b='jiaoyiwancheng';
		}
		}
		}
		$this->assign('arr10',$arr10);
		$this->assign('arr8',$arr8);
		$this->assign('arr9',$arr9);
		$this->assign('b',$b);
		$this->assign('dizhi',$dizhi);
		$this->assign('a',$a);	
		$this->assign('question',$question);
		$this->assign('plan',$plan);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
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
		$mysql=M('m_user');
		$sfzt='1,2';
		$arr=$mysql->where("(smwx_id='$fs' or wxzx_id='$fs' or jxzx_id='$fs') and sfzt in($sfzt)")->select();
		//print_r($arr);die;
		}
		}
		$this->assign('id',$id);
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
		$this->success('分配成功!',__CONTROLLER__.'/index',2);
	}
		}
	}
}
}
}
}
