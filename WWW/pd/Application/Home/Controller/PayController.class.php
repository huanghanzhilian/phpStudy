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
		header('location:'. __MODULE__.'/Index/dingdan');
		/*$out_trade_no = I('get.out_trade_no');//die;	echo 
			$sqlll=M('carts');
			$arr7=$sqlll->where("order_no='$out_trade_no'")->find();
			$id=$arr7['gid'];
			$iddd=$arr7['id'];
			$car['stau']=1;
			$arr33=$sqlll->where("id='$iddd'")->save($car);
			if($arr33){
				$sql=M('goods');
				$post['fk']=1;
				$post['stau']=5;
				$post['fk_time']=date('Y-m-d H:i:s', time());
				$arr1=$sql->where("id='$id'")->find();
				if($arr1['wxfy']){
				$wxfy=$arr1['wxfy']/2;
				}
				
				$cangku_id=$arr1['cangku_id'];
				$amount=$arr1['amount'];
				$datat['cpk_id']=$cppk_id=$arr1['cppk_id'];
				$user_id=$datat['user_id']=$user_id=$arr1['user_id'];
				$datat['goodid']=$ddh=$arr1['ddh'];
				$datat['zt']=1;
				$datat['time']=date('Y-m-d H:i:s', time());
				$datat['ddh']=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
						$userr=M('m_user');
						$arr13=$userr->where("user_id='$user_id'")->find();
				$arr=$sql->where("id='$id'")->save($post);
				if($arr){
					$h=M('yue');
					$dat['user_id']=$user_id;
					$dat['yue_type']='维修订单';
					$dat['ddh']=$ddh;
					if($arr1['ways_id']==1){
						$dat['jy_money']='+'.$amount;
					}else if($arr1['ways_id']==2 or $arr1['ways_id']==3){
						$amoun=$amount-50;
						$dat['jy_money']='+'.$amoun;
					}
					$dat['jy_time']=date('Y-m-d H:i:s', time());
					$arrt=$h->add($dat);
					if($arrt){
				$my=M('cangku');
				$arr5=$my->where("cangku_id in($cangku_id)")->delete();
					if($arr5){
						if($cppk_id){
							$mysqll=M('huishou');
							$arr6=$mysqll->add($datat);
							if($arr6){
							   if(($arr1['ways_id']==2) or ($arr1['ways_id']==3)){
								 $yu['yuemoney']=($arr13['yuemoney']+(($arr1['amount']-50)-$wxfy));
								 $arr12=$userr->where("user_id='$user_id'")->save($yu);
									if($arr12){
										header('location:'. __MODULE__.'/Index/dingdan');
									}
								}else{
									$yu['yuemoney']=$arr13['yuemoney']+($arr1['amount']-$wxfy);
									$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									header('location:'. __MODULE__.'/Index/dingdan');
								}
								}
					
							}
						}else{
						
							if(($arr1['ways_id']==2) or ($arr1['ways_id']==3)){
								$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-50)-$wxfy);
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									header('location:'. __MODULE__.'/Index/dingdan');
								}
						
							}else{
								$yu['yuemoney']=$arr13['yuemoney']+($arr1['amount']-$wxfy);
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
	}*/
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

public function maichua(){
	//echo 1;die;
		$out_trade_no = I('get.out_trade_no');
		$sqlll=M('cartssss');
		$arr7=$sqlll->where("order_no='$out_trade_no'")->find();
		$id=$arr7['gid'];
		$iddd=$arr7['id'];
		$car['stau']=1;
		$arr33=$sqlll->where("id='$iddd'")->save($car);
	if($arr33){
			$mysql=M('maichu');
			$ct['zt']=1;
			$ct['zhifutype']=1;
			$arr9=$mysql->where("id='$id'")->save($ct);
			if($arr9){
			$arr=$mysql->where("id='$id'")->find();
			$mai=$arr['mai'];
			$ddh=$arr['ddh'];
			$maifang=$arr['maifang'];
			$cangku_id=$arr['cangku_id'];
			$amount=$arr['amount'];
			$mysqll=M('m_user');
		$arr2=$mysqll->where("user_name='$maifang'")->find();
		$user_idmaifang=$arr2['user_id'];
		$arr3=$mysqll->where("user_name='$mai'")->find();
		$user_idmai=$arr3['user_id'];
		$yuemoney=$arr3['yuemoney'];
			$sql=M('cangku');
			$data['zta']=0;
			$data['user_id']=$user_idmaifang;
			$arr1=$sql->where("cangku_id='$cangku_id'")->save($data);
			if($arr1){
				$tv['yuemoney']=$yuemoney+$amount;
				$arr6=$mysqll->where("user_id='$user_idmai'")->save($tv);
				if($arr6){
					$h=M('yue');
					$dat['user_id']=$user_idmai;
					$dat['yue_type']='卖出配件';
					$dat['ddh']=$ddh;
					$dat['jy_money']='+'.$amount;
					$dat['jy_time']=date('Y-m-d H:i:s', time());
					$arrt=$h->add($dat);
					if($arrt){
						 header('location:'. __MODULE__.'/Gouwuche/maichu_list');
					}
				}
			}
	}
	}

}
}