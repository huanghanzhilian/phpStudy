<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
   public function index(){
    $mysql=M('qizi');
	$arr=$mysql->where("dianpu=''")->select();
	$this->assign('arr',$arr);
	$this->display();
    }
	public function gengxin(){
		$p_id=$_POST['p_id'];
		$mysql=M('dingdan');
		$arr=$mysql->where("p_id='$p_id'")->find();
		echo  json_encode($arr);
	}
   public function sj(){
	   $data['qizi_color']=$_POST['qizi_color'];
	   $data['qizi_name']=$_POST['qizi_name'];
	   $data['dianpu']=$_POST['dianpu'];
	   $mysql=M('shangjia');
	   $arr=$mysql->add($data);
	   if($arr){
	   header('location:'. __CONTROLLER__."/index");
	   }
	
    }
public function cont(){
	$p_id= $_POST['pid'];
		 $up['dizhizt']=$_POST['dizhizt'];
			$mysql=M('dingdan');
			$arr=$mysql->where("p_id='$p_id'")->save($up);
		$sql=M('ding');
		$arr1=$mysql->where("p_id='$p_id'")->find();
		$shop_card=$arr1['shop_card'];
		$qibiao=$arr1['qibiao'];
		$so=M('qizi');
		$arr3=$so->where("dianpu='$shop_card' and qizi_color='$qibiao'")->find();
		$goods_name=$arr1['goods_name'];
		$goodid=$arr1['goods_card'];
		
		$arr2=$sql->where("goodid='$goodid'")->find();
			if($arr2){
				if($arr1['zt']=='1'){
				    if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $arr1['qibiao']==''){
					$ti['sku_id']=$arr2['sku_id'];
							$ti['sku_zt']='1';
							$ti['zt']='2';
							$sd=$mysql->where("p_id='$p_id'")->save($ti);
						
							echo '1';
					}else if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $arr3['qizi_name']=='下单'){
						$ti['sku_id']=$arr2['sku_id'];
							$ti['sku_zt']='1';
							$ti['qizi']='1';
							//$phone='17301205932';
							$ti['zt']='2';
							$sd=$mysql->where("p_id='$p_id'")->save($ti);

				
								echo '1';
							}else{
							$tf['zt']='2';
							$ti['qizi']='2';
							$sd=$mysql->where("p_id='$p_id'")->save($tf);
							echo '1';
					}
				}else if($arr1['zt']=='3'){
				 if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $arr3['qizi_name']=='下单'){
					$ti['sku_id']=$arr2['sku_id'];
					$ti['sku_zt']='1';
					$ti['zt']='4';
					$sd=$mysql->where("p_id='$p_id'")->save($ti);
					echo '1';
				}else if( $arr2['ding_zt']==1 && $arr1['dizhizt']==1&& $arr1['qibiao']==''){
					$tp['sku_zt']='1';
					$tp['zt']='4';
					$sd=$mysql->where("p_id='$p_id'")->save($tp);
					echo '1';
				}else{
						$tf['zt']='4';
						$sd=$mysql->where("p_id='$p_id'")->save($tf);
						echo '1';
				}
			
			}else{
				echo '1';
			
			}
	
			}else{
						//$sd=$mysql->where("p_id='$p_id'")->save($tf);
						$sqwo=$mysql->where("p_id='$p_id'")->find();
						echo json_encode($sqwo);		
			}
}

public  function pipei(){
		$sku_id=$_POST['sku_id'];
		$p_id=$_POST['p_id'];
		$mysql=M('dingdan');
		$arr1=$mysql->where("p_id='$p_id'")->find();
		$sql=M('ding');
		$gg['ding_name']=$arr1['goods_content'];
		$gg['goodid']=$arr1['goods_card'];
		$gg['sku_id']=$sku_id;
		$gg['ding_zt']='1';
		$adb=$sql->add($gg);
		echo '1';


}
public function zhanbuzuo(){
		$p_id=$_POST['p_id'];
		$mysql=M('dingdan');
		$arr1=$mysql->where("p_id='$p_id'")->find();
		$sql=M('ding');
		$gg['ding_name']=$arr1['goods_content'];
		$gg['goodid']=$arr1['goods_card'];
		$gg['ding_zt']='3';
		$adb=$sql->add($gg);
		echo '1';
}
public function bufuhe(){
		$p_id=$_POST['p_id'];
		$mysql=M('dingdan');
		$arr1=$mysql->where("p_id='$p_id'")->find();
		$sql=M('ding');
		$gg['ding_name']=$arr1['goods_content'];
		$gg['goodid']=$arr1['goods_card'];
		$gg['ding_zt']='2';
		$adb=$sql->add($gg);
		echo '1';
}
public function skui(){
	$mysql=M('sku');
	$arr=$mysql->select();
	 echo json_encode($arr);die;
}
public function t_list(){
	$mysql=M('dingdan');
	$arr=$mysql->where("dizhizt='1' and sku_zt='1' and (qizi='1' or qizi='2') ")->select();
		 echo json_encode($arr);
}

}