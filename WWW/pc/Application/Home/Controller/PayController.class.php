<?php

/**
 * ping ++ demo 支付后处理
 *
 * @author widuu <admin@widuu.com>
 */
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {
	public function index(){
		$out_trade_no = I('get.out_trade_no');//die;	echo 

			$sqlll=M('carts');
			$arr7=$sqlll->where("order_no='$out_trade_no'")->find();
			$id=$arr7['gid'];
			$iddd=$arr7['id'];//die;echo
			$car['stau']=1;
			$arr33=$sqlll->where("id='$iddd'")->save($car);
			if($arr33){
				$sql=M('goods');
				$post['fk']=1;
				$post['stau']=5;
				$post['fk_time']=date('Y-m-d H:i:s', time());
				$arr1=$sql->where("id='$id'")->find();
				$cangku_id=$arr1['cangku_id'];
				//$arr1['amount'];
				$datat['cpk_id']=$cppk_id=$arr1['cppk_id'];
				$user_id=$datat['user_id']=$user_id=$arr1['user_id'];
				$datat['goodid']=$arr1['ddh'];
				$datat['zt']=1;
						$userr=M('m_user');
						$arr13=$userr->where("user_id='$user_id'")->find();
				$arr=$sql->where("id='$id'")->save($post);
				if($arr){
				$my=M('cangku');
				$arr5=$my->where("cangku_id in($cangku_id)")->delete();
					if($arr5){
						if($cppk_id){
							$mysqll=M('huishou');
							$arr6=$mysqll->add($datat);
							if($arr6){
							   if(($arr1['ways_id']==2) || ($arr1['ways_id']==3)){
								 $yu['yuemoney']=($arr13['yuemoney']+($arr1['amount']-50));
								 $arr12=$userr->where("user_id='$user_id'")->save($yu);
									if($arr12){
										header('location:'. __MODULE__.'/Index/dingdan');
									}
								}else{
									$yu['yuemoney']=$arr13['yuemoney']+$arr1['amount'];
									$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									header('location:'. __MODULE__.'/Index/dingdan');
								}
								}
					
							}
						}else{
						
							if(($arr1['ways_id']==2)||($arr1['ways_id']==3)){
								$yu['yuemoney']=$arr13['yuemoney']+($arr1['amount']-50);
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									header('location:'. __MODULE__.'/Index/dingdan');
								}
						
							}else{
								$yu['yuemoney']=$arr13['yuemoney']+$arr1['amount'];
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
								header('location:'. __MODULE__.'/Index/dingdan');
								}
							}
						}
					}
				}
			}
		
	}
public function peijian(){
	//print_r($_GET);die;
			$out_trade_no = I('get.out_trade_no');
			$sqlll=M('cartss');
			$arr7=$sqlll->where("order_no='$out_trade_no'")->find();
			$id=$arr7['gid'];
			$iddd=$arr7['id'];
			$car['stau']=1;
			$arr33=$sqlll->where("id='$iddd'")->save($car);
			if($arr33){
				$mysql=M('dingdanhao');
			    $da['fkzt']=1;
			    $da['peijianzhifu_type']=1;
			    $arr1=$mysql->where("id='$id'")->save($da);
				if($arr1){	
					 header('location:'. __MODULE__.'/Gouwuche/peijiandingdan'); 
				}

			}
}
public function huankuana(){
	//print_r($_GET);die;
			$out_trade_no = I('get.out_trade_no');
			$sqlll=M('cartsss');
			$arr7=$sqlll->where("order_no='$out_trade_no'")->find();
			$id=$arr7['gid'];
			$iddd=$arr7['id'];
			$car['stau']=1;
			$arr33=$sqlll->where("id='$iddd'")->save($car);
			if($arr33){
				$mysql=M('huankuan');
				$arr=$mysql->where("id='$id'")->find();
				$user_id=$arr['user_id'];
				$amount=$arr['amount'];//echo 	die;//
					$post['hk_zt']=2;
					$post['wc_time']=time();
					$arr1=$mysql->where("id='$id'")->save($post);	
					if($arr1){
						$user=M('m_user');
						$arr3=$user->where("user_id='$user_id'")->find();
						
						$data['yixiaofei']=(($arr3['yixiaofei'])-$amount);
						$arr2=$user->where("user_id='$user_id'")->save($data);
						if($arr2){
						 header('location:'. __MODULE__.'/Grzx/index'); 
						}
					}	

			}
}


}