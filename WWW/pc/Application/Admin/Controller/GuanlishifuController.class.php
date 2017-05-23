<?php
namespace Admin\Controller;
use Think\Controller;
class GuanlishifuController extends Controller {
	public function index(){
		$this->display();
	
	}
	public function tongguo(){
		$id=I('get.id');//echodie;
		$mysql=M('tixianshenqing');
		$post['zta']=2;
		$arr=$mysql->where("tixianshenqing_id='$id'")->save($post);
		if($arr){
			$arr1=$mysql->where("tixianshenqing_id='$id'")->find();
			$amt=$arr1['amt'];
			$username=$_COOKIE['username'];
			$a=M('m_user');
			$arr7=$a->where("user_name='$username'")->find();
			$yuemoney=$arr7['yuemoney'];
			$user_id=$arr7['user_id'];
			$data['yuemoney']=$yuemoney-$amt;
			$arr3=$a->where("user_id='$user_id'")->save($data);
			if($arr3){
			header('location:'.__CONTROLLER__.'/tixianguanli');
			}else{
			$this->error('失败');
		}
		
		}
	}
	public function tixianguanli(){
		$mysql=M('tixianshenqing');
		$arr=$mysql->join("yinhang on tixianshenqing.yinhang_id=yinhang.yinhang_id")->join("m_user on tixianshenqing.user_id=m_user.user_id")->where("zta=1")->select();
		
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function tixianajax(){
		$zta=I('get.zta');//die;echo 
		$mysql=M('tixianshenqing');
		$arr=$mysql->join("yinhang on tixianshenqing.yinhang_id=yinhang.yinhang_id")->join("m_user on tixianshenqing.user_id=m_user.user_id")->where("zta='$zta'")->select();
		
	//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	}
		public function shifudingdan(){
			$mysql=M('dingdanhao');
			$arr1=$mysql->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->where("fkzt=1")->select();
			if(!$arr1){
			$a='没有订单';
			}
			foreach ($arr1 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
			$this->assign('arr',$arr);
			$this->assign('a',$a);
			$this->display();
		}
		public function shenhetongguo(){
			$id=I('get.id');//echo die;
			$mysql=M('dingdanhao');
			$arr=$mysql->where("id='$id'")->find();
				$user_id=$arr['user_id'];
			//$sql=M('dingdanhao');
			$sqll=M('ddxxb');
			
			//$username=$_COOKIE['username'];
		//$sql=M('m_user');
		//$arr1=$sql->where("user_name='$username'")->find();
		//$user_id=$arr1['user_id'];//die;echo 
			//echo $user_id;die;
		$arr5=$sqll->where("use_id='$user_id' and dingdanhaoid='$id'")->select();
		$a=count($arr5);//die;/// echo	///
			$cpkid='';
				$nums='';
				$userid='';
				$modelidd='';
				$skma='';
			foreach ($arr5 as $k=>$v){
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
				
		
				for($i=0;$i<$a;$i++){
					$sk_m=$skm[$i];
					$cpk_id=$cpkid[$i]; 
					$dd_nums=$ddnums[$i];
					$use_id=$useid[$i];
					$md_id=$modelidd[$i];
					
				$c[]=array('cangku_name'=>$sk_m,'cpk_id'=>$cpk_id,'numss'=>$dd_nums,'user_id'=>$use_id,'mdid'=>$md_id);
				}
				//echo '1';die;
				$db=M('cangku');
				$ss=$db->addAll($c);
			if($ss){
				$slk=M('dingdanhao');
				$post['fkzt']=2;
				$arr7=$slk->where("id='$id'")->save($post);
				if($arr7){
				//$h=M('wccli');
			
				//$arrt=$h->where("wccl_id in($wcclid)")->delete();
				//if($arrt){
					
				header('location:'.__CONTROLLER__.'/shifudingdan');
				
				}
				
				//}
		}
}
		public function shenhea(){
			//echo $fkzt=I('get,fkzt');die;
			$mysql=M('dingdanhao');
			$arr1=$mysql->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->where("fkzt='2'")->select();
				//print_r($arr1);die;
			if(!$arr1){
			$a='没有订单';
			}
			foreach ($arr1 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
			$this->assign('arr',$arr);
			$this->assign('a',$a);
			$this->display();


}
public function shenheaa(){
			//echo $fkzt=I('get,fkzt');die;
			$mysql=M('dingdanhao');
			$arr1=$mysql->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->where("fkzt='1'")->select();
				//print_r($arr1);die;
			if(!$arr1){
			$a='没有订单';
			}
			foreach ($arr1 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
			$this->assign('arr',$arr);
			$this->assign('a',$a);
			$this->display();


}
}
?>