<?php
namespace Admin\Controller;
use Think\Controller;
class HuishouController extends Controller {
	public function index(){
		$mysql=M('huishou');
		$arr=$mysql->join("chanpinku on huishou.cpk_id=chanpinku.cpk_id")->where("zt='2'")->select();
		$this->assign('arr',$arr);
		$this->display();	
	}
	public function querenhuishou(){
			$huishou_id=I('get.huishou_id');
			$mysql=M('huishou');
			$arr=$mysql->where("huishou_id='$huishou_id'")->find();
			$post['cpk_id']=$cpk_id=$arr['cpk_id'];
			$post['user_id']=$user_id=$arr['user_id'];
			$post['goodsdanhao']=$arr['goodid'];
			$dnf=M('chanpinku');
			$arr4=$dnf->where("cpk_id='$cpk_id'")->find();
			$cpk_price=$arr4['cpk_price'];
			$sql=M('yihuishou');
			$arr1=$sql->add($post);
			if($arr1){
				$my=M('m_user');
				$arr2=$my->where("user_id='$user_id'")->find();
				$data['yuemoney']=($arr2['yuemoney']+$cpk_price);//die;echo
					
				$ddd=$my->where("user_id='$user_id'")->save($data);
				if($ddd){
					//echo 1;die;
				$arrt=$mysql->where("huishou_id='$huishou_id'")->delete();
				if($arrt){
				header('location:'.__CONTROLLER__.'/index');
			}else{
				$this->error('操作失败');
			}
			}else{
				echo 1;die;
					$this->error('操作失败');
			}
			}
	
	}
	public function yihuishou(){
			$mysql=M('yihuishou');
			$arr=$mysql->join("chanpinku on yihuishou.cpk_id=chanpinku.cpk_id")->select();
			$this->assign('arr',$arr);
			$this->display();
	}

}
?>