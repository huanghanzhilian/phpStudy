<?php
namespace Admin\Controller;
use Think\Controller;
class DdguanliController extends Controller {
    public function index(){
		$this->display();
    }
	public function jixiu(){
	header("Content-type: text/html; charset=utf-8");
			$ways_id=I('get.ways_id');
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
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql
		->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id in($id)")->select();
		}
		//print_r($arr);
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function daodian(){
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
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql
		->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id in($id)")->select();
		}
		//print_r($arr);die;
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
	}

	public function shangmen(){
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
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id in($id)")->select();
		}
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function wxuser(){
		header("Content-type: text/html; charset=utf-8");
		//print_r($_GET);die;echo 	die;
		$ways_id=I('get.ways_id');
		$wxzx_id=I('get.wxzx_id');
		$id=$_GET['id'];
		$r=$_GET['r'];
		$sql=M('goods');
		$arr1=$sql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")->where("id='$id'")->find();
		//print_r($arr1);DIE;echodie; 
		$user_id=$arr1['user_id'];
		$mysql=M('m_user');
		$arr=$mysql->where("user_id in($user_id)")->select();
		//print_r($arr);die;		// //
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->assign('r',$r);
		$this->assign('id',$id);
		$this->display();
	
	}
	public function save1(){
		//print_r($_POST);die;
		$id=I('post.id');
		////echo $id;die;
		$ways_id=I('post.ways_id');
		$post['user_id']=I('post.user_id');
		$post['stau']=1;
		$mysql=M('goods');
		$arr=$mysql->where("id='$id'")->save($post);
			if($arr){
				$sql=M('zt_time');
				$data['po_time']=date('Y-m-d H:i:s', time());
				$arr1=$sql->where("goods_id='$id'")->save($data);
				if($arr1){
				header('location:'. __CONTROLLER__."/yizhipai/ways_id/{$ways_id}");
				}
			}else{
			  $this->error('修改失败');
			 }
	}
	public function quxiaole(){
		$mysql=M('goods');
		
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")->where("fk ='110'")->select();
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	
	}/**/
	public function quxiaodedingdan(){	
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
	public function dengdai(){
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
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql
		//->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id in($id)")->select();
		}
		//print_r($arr);die;
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
	public function yizhipai(){
		header("Content-type: text/html; charset=utf-8");
			$ways_id=I('get.ways_id');
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
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->select();
		}
		//print_r($arr);die;
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
public function yijiedan(){
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
		if(!$id){
			$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->select();
		}
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
public function weixiuzhong(){
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
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->select();
		}
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
public function daifukuan(){
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
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->select();
		}
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}
public function xiangqing(){
	//print_r($_GET);die;
		$id=I('get.id');
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
		if($et['user_id']==0){
			$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->find();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
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
public function jiaoyiwancheng(){
		header("Content-type: text/html; charset=utf-8");
			$ways_id=I('get.ways_id');
			if(I('get.stau')){
				$stau=I('get.stau');
			}else{
				$stau=5;
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
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("id='$id'")->select();
		}else{
		$arr=$mysql->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("wxzx on goods.wxzx_id=wxzx.wxzx_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("m_user on goods.user_id=m_user.user_id")
		->where("id in($id)")->select();
		}
		//print_r($arr);die;
		$this->assign('ways_id',$ways_id);
		$this->assign('arr',$arr);
		$this->display();
}

}
