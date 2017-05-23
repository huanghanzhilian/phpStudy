<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
  public function ty(){
	  header("Content-type: text/html; charset=utf-8"); 
		
		$order_number='2985809439031406';
		$mysql=M('dingdan');
		$sql=M('goods');//echo 1;exit;
		$arr1=$sql->where("dingdanhao='$order_number'")->find();
		$arr=$mysql->where("order_number='$order_number'")->find();
		if($arr['ztt']=='1' or $arr['ztt']=='2'){
		$rt='1';
		}else{
		$rt='2';
		}
		$swq=M('sku');
		$sku_id=$arr['sku_id'];
		$arr2=$swq->where("sku_id='$sku_id'")->find();
		$sku_money=$arr2['sku_money'];
		$this->assign('arr',$arr);
		$this->assign('rt',$rt);
		$this->assign('sku_money',$sku_money);
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
		$phone=$arr1['phone'];
		$qibiao=$arr1['qibiao'];
		$order_number=$arr1['order_number'];
		$so=M('qizi');
		$arr3=$so->where("dianpu='$shop_card' and qizi_color='$qibiao'")->find();
		if(!$arr3){
		$qizi_name='空';
		}else{
		$qizi_name=$arr3['qizi_name'];
		}
		//require_once APP_PATH.'Common/Cg/ini.php';
		//$rando="__CONTROLLER__/order_number/{$order_number}";
		//$url=$output[0];
		
		$goods_content=$arr1['goods_content'];
		$goodid=$arr1['goods_card'];
		$sku_name=$arr1['sku_name'];
		$arr2=$sql->where("(goodid='$goodid' and sk_name='$sku_name' and ding_name='$goods_content') or (goodid='$goodid' and sk_name='' and ding_name='')")->find();
			if($arr2){
				if($arr1['zt']=='1'){
				    if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $qizi_name=='下单'){
						
					$host = "http://sms.market.alicloudapi.com";
					$path = "/singleSendSms";
					$method = "GET";
					$appcode = "da629d96ac3843c880e70b2e6e6d1b82";
					$headers = array();
					$num=randomkey(5);
					array_push($headers, "Authorization:APPCODE " . $appcode);
					Vendor("alyshimingrenzheng.Demo");
					$name= "{'name':'$num'}";
					$querys = "ParamString=$name&RecNum=$phone&SignName=维百士&TemplateCode=SMS_44720020";
					$bodys = "";
					$url = $host . $path . "?" . $querys;

					$curl = curl_init();
					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($curl, CURLOPT_FAILONERROR, false);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($curl, CURLOPT_HEADER, true);
					if (1 == strpos("$".$host, "https://"))
					{
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
					}
					var_dump(curl_exec($curl));
					

						$ti['sku_id']=$arr2['sku_id'];
							$ti['sku_zt']='1';
							$ti['qizi']='1';
							$ti['zt']='2';
							$ti['ztt']='1';
							$ti['duanxin']='2';
							$sd=$mysql->where("p_id='$p_id'")->save($ti);
							
					if($arr1['order_state']=='卖家已发货'){
						$arr5=$mysql->where("p_id='$p_id'")->find();
						$sqlll=M('goods');
						$yu['goods_name']=$arr5['goods_content'];
						$yu['dingdanhao']=$arr5['order_number'];
						$yu['user_name']=$arr5['username'];
						$yu['phone']=$arr5['phone'];
						$yu['sku_id']=$arr5['sku_id'];
						$yu['address']=$arr5['address'];
						$yu['p_id']=$arr5['p_id'];
						$arrt=$sqlll->add($yu);
						$ti['ztt']='2';
						$sd=$mysql->where("p_id='$p_id'")->save($ti);
					}else if($arr1['order_state']=='买家已付款'){
					
					
					}
				
								echo '1';




				
					}else if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $qizi_name=='空'){
								$host = "http://sms.market.alicloudapi.com";
								$path = "/singleSendSms";
								$method = "GET";
								$appcode = "da629d96ac3843c880e70b2e6e6d1b82";
								$headers = array();
								$num=randomkey(5);
								array_push($headers, "Authorization:APPCODE " . $appcode);
								Vendor("alyshimingrenzheng.Demo");
								$name= "{'name':'$num'}";
								$querys = "ParamString=$name&RecNum=$phone&SignName=维百士&TemplateCode=SMS_34335158";
								$bodys = "";
								$url = $host . $path . "?" . $querys;

								$curl = curl_init();
								curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
								curl_setopt($curl, CURLOPT_URL, $url);
								curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
								curl_setopt($curl, CURLOPT_FAILONERROR, false);
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($curl, CURLOPT_HEADER, true);
								if (1 == strpos("$".$host, "https://"))
								{
									curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
									curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
								}
						var_dump(curl_exec($curl));
							
							$ti['sku_id']=$arr2['sku_id'];
							$ti['sku_zt']='1';
							$ti['zt']='2';
							$ti['ztt']='5';
							$ti['duanxin']='1';
							$sd=$mysql->where("p_id='$p_id'")->save($ti);
							
							echo '1';
							}else{
							$tf['zt']='2';
							$tf['qizi']='2';
							$sd=$mysql->where("p_id='$p_id'")->save($tf);
							echo '1';
					}
				}else if($arr1['zt']=='3'){
					//echo 111;exit;
					if($arr1['ztt']=='2'){
						echo '1';
					}else{
				 if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $arr3['qizi_name']=='下单'){
					 $sdd=$mysql->where("p_id='$p_id'")->find();
					 if($sdd['duanxin']=='2'){
							
					
					}else{
						$host = "http://sms.market.alicloudapi.com";
						$path = "/singleSendSms";
						$method = "GET";
						$appcode = "da629d96ac3843c880e70b2e6e6d1b82";
						$headers = array();
						$num=randomkey(5);
						array_push($headers, "Authorization:APPCODE " . $appcode);
						Vendor("alyshimingrenzheng.Demo");
						$name= "{'name':'$num'}";
						$querys = "ParamString=$name&RecNum=$phone&SignName=维百士&TemplateCode=SMS_44720020";
						$bodys = "";
						$url = $host . $path . "?" . $querys;

						$curl = curl_init();
						curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
						curl_setopt($curl, CURLOPT_URL, $url);
						curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($curl, CURLOPT_FAILONERROR, false);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($curl, CURLOPT_HEADER, true);
						if (1 == strpos("$".$host, "https://"))
						{
							curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
						}
						var_dump(curl_exec($curl));
						echo 1;
					}
					$ti['sku_id']=$arr2['sku_id'];
					$ti['sku_zt']='1';
					$ti['zt']='4';
					$ti['ztt']='1';
					$ti['duanxin']='2';
					$sd=$mysql->where("p_id='$p_id'")->save($ti);
					
					
					if($arr1['order_state']=='卖家已发货'){
						$arr5=$mysql->where("p_id='$p_id'")->find();
						$sqlll=M('goods');
						$yu['goods_name']=$arr5['goods_content'];
						$yu['dingdanhao']=$arr5['order_number'];
						$yu['user_name']=$arr5['username'];
						$yu['phone']=$arr5['phone'];
						$yu['sku_id']=$arr5['sku_id'];
						$yu['address']=$arr5['address'];
						$yu['p_id']=$arr5['p_id'];
						$arrt=$sqlll->add($yu);
						$ti['ztt']='2';
						$sd=$mysql->where("p_id='$p_id'")->save($ti);
					}
					echo '1';
				}else if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $qizi_name=='空'){
					 $sdd=$mysql->where("p_id='$p_id'")->find();
					 if($sdd['xd_zt']=='1' or $sdd['xd_zt']=='2' or $sdd['xd_zt']=='3'){
						if($arr1['order_state']=='卖家已发货'){
						$arr5=$mysql->where("p_id='$p_id'")->find();
						$sqlll=M('goods');
						$yu['goods_name']=$arr5['goods_content'];
						$yu['dingdanhao']=$arr5['order_number'];
						$yu['user_name']=$arr5['username'];
						$yu['phone']=$arr5['phone'];
						$yu['sku_id']=$arr5['sku_id'];
						$yu['address']=$arr5['address'];
						$yu['p_id']=$arr5['p_id'];
						$arrt=$sqlll->add($yu);
						$ti['ztt']='2';
						$ti['zt']='4';
						$sd=$mysql->where("p_id='$p_id'")->save($ti);
					}
					 
					 }else{
					 if($sdd['duanxin']=='1'){
					
					}else{
						$host = "http://sms.market.alicloudapi.com";
						$path = "/singleSendSms";
						$method = "GET";
						$appcode = "da629d96ac3843c880e70b2e6e6d1b82";
						$headers = array();
						$num=randomkey(5);
						array_push($headers, "Authorization:APPCODE " . $appcode);
						Vendor("alyshimingrenzheng.Demo");
						$name= "{'name':'$num'}";
						$querys = "ParamString=$name&RecNum=$phone&SignName=维百士&TemplateCode=SMS_34335158";
						$bodys = "";
						$url = $host . $path . "?" . $querys;

						$curl = curl_init();
						curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
						curl_setopt($curl, CURLOPT_URL, $url);
						curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($curl, CURLOPT_FAILONERROR, false);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($curl, CURLOPT_HEADER, true);
						if (1 == strpos("$".$host, "https://"))
						{
							curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
						}
						var_dump(curl_exec($curl));
						echo 1;
					}

					$tp['sku_zt']='1';
					$tp['zt']='4';
					$tp['ztt']='5';
					$tp['duanxin']='1';
					$sd=$mysql->where("p_id='$p_id'")->save($tp);
					 }
					echo '1';
				}else{
						$tf['zt']='4';
						$tf['ztt']='';
						$sd=$mysql->where("p_id='$p_id'")->save($tf);
						echo '1';
				}
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
		$gg['ding_name']=$goods_content=$arr1['goods_content'];
		$gg['goodid']=$goodid=$arr1['goods_card'];
		$gg['sk_name']=$sku_name=$arr1['sku_name'];
		$gg['sku_id']=$sku_id;
		$gg['ding_zt']='1';
		$arr3=$sql->where("goodid='$goodid' and sk_name='$sku_name' and ding_name='$goods_content'")->find();
		if($arr3){
			echo '1';
		}else{
		$arr2=$sql->where("goodid='$goodid' and sk_name='$sku_name'")->find();
		if($arr2){
			if($arr2['ding_name']==$goods_content){
				//echo 111;exit;
				echo '1';
			}else{
				//exit;
			$a['ding_name']=$goods_content;
			$a['ding_zt']='1';
			$a['sku_id']=$sku_id;
				$adb=$sql->where("sk_name='$sku_name'")->save($a);
				echo '1';
			}
		}else{
			
				$adb=$sql->add($gg);
				echo '1';
		}
		echo '1';

		}
}
public function zhanbuzuo(){
		$p_id=$_POST['p_id'];
		$mysql=M('dingdan');
		$arr1=$mysql->where("p_id='$p_id'")->find();
		$sql=M('ding');
		$gg['ding_name']=$goods_content=$arr1['goods_content'];
		$gg['goodid']=$goodid=$arr1['goods_card'];
		$gg['sk_name']=$sku_name=$arr1['sku_name'];
		$gg['ding_zt']='3';
		$arr3=$sql->where("goodid='$goodid' and sk_name='$sku_name' and ding_name='$goods_content'")->find();
		if($arr3){
		echo '1';
		}else{
		$arr2=$sql->where("goodid='$goodid' and sk_name='$sku_name'")->find();
		if($arr2){
			if($arr2['ding_name']==$goods_content){
			echo '1';
			}else{
				//echo 222;exit;
			$a['ding_name']=$goods_content;
			$a['ding_zt']='3';
			$a['sku_id']='';
				$adb=$sql->where("sk_name='$sku_name'")->save($a);
				echo '1';
			}
		}else{
			
				$adb=$sql->add($gg);
				echo '1';
		
		}
		echo '1';
}
}
public function bufuhe(){
		$p_id=$_POST['p_id'];
		$mysql=M('dingdan');
		$arr1=$mysql->where("p_id='$p_id'")->find();
		$sql=M('ding');
		$gg['ding_name']=$goods_content=$arr1['goods_content'];
		$gg['goodid']=$goodid=$arr1['goods_card'];
		$gg['sk_name']=$sku_name=$arr1['sku_name'];
		$gg['ding_zt']='2';
			$arr3=$sql->where("goodid='$goodid' and sk_name='$sku_name' and ding_name='$goods_content'")->find();
			if($arr3){
			echo '1';
			}else{
			$arr2=$sql->where("goodid='$goodid' and sk_name='$sku_name'")->find();
		if($arr2){
			if($arr2['ding_name']==$goods_content){
			//	echo '1';
			}else{
			$a['ding_name']=$goods_content;
			$a['ding_zt']='2';
			$a['sku_id']='';
				$adb=$sql->where("sk_name='$sku_name'")->save($a);
			}
		}else{
			
				$adb=$sql->add($gg);
		
		}
		echo '1';
}
}
public function skui(){
	$mysql=M('sku');
	$arr=$mysql->select();
	 echo json_encode($arr);die;
}
public function t_list(){
	$mysql=M('dingdan');
	$arr=$mysql->where("ztt='5'")->select();
		 echo json_encode($arr);
}
public function g_list(){
	$mysql=M('dingdan');
	$arr=$mysql->where("ztt='1'")->select();
		 echo json_encode($arr);
}
public function h_list(){
	$mysql=M('dingdan');
	$arr=$mysql->where("ztt='2'")->select();
		 echo json_encode($arr);
}
public function order(){
	$mysql=M('goods');
	$arr=$mysql->where("wuliu='0'")->select();
		 echo json_encode($arr);
}

public function xiadan(){
	$p_id=$_POST['p_id'];
	$mysql=M('dingdan');
	$arr=$mysql->where("p_id='$p_id'")->find();
	$order_number=$arr['order_number'];
	if($arr['order_state']=='卖家已发货'){
		$sqlll=M('goods');
		$arr5=$sqlll->where("dingdanhao='$order_number'")->find();
		if($arr5){
			echo 1;
		}else{
		$yu['goods_content']=$arr['goods_content'];
		$yu['dingdanhao']=$order_number;
		$yu['user_name']=$arr['username'];
		$yu['phone']=$arr['phone'];
		$yu['sku_id']=$arr['sku_id'];
		$yu['address']=$arr['address'];
		$yu['p_id']=$arr['p_id'];
		$arrt=$sqlll->add($yu);
		$ti['ztt']='2';
		$ti['xd_zt']='1';
		$sd=$mysql->where("p_id='$p_id'")->save($ti);
		}
		echo 1;
	}else if($arr['order_state']=='买家已付款'){
		$ti['ztt']='1';
		$ti['xd_zt']='1';
		$sd=$mysql->where("p_id='$p_id'")->save($ti);
		echo 1;
	}
	

}
public  function biji(){
	$p_id=$_POST['p_id'];
	$content=$_POST['content'];
	$mysql=M('dingdan');
	$ti['content']=$content;
	$sd=$mysql->where("p_id='$p_id'")->save($ti);
	echo 1;
}


public function khxd(){
 $order_number=$_POST['order_number'];
	$mysql=M('dingdan');
	$arr=$mysql->where("order_number='$order_number'")->find();
	$yu['p_id']=$p_id=$arr['p_id'];
	if($arr['order_state']=='卖家已发货'){
		$sqlll=M('goods');
		$arr5=$sqlll->where("dingdanhao='$order_number'")->find();
		if($arr5){
			echo 1;
		}else{
		
		$yu['goods_content']=$arr['goods_content'];
		$yu['dingdanhao']=$arr['order_number'];
		$yu['user_name']=$arr['username'];
		$yu['phone']=$arr['phone'];
		$yu['sku_id']=$arr['sku_id'];
		$yu['address']=$arr['address'];
		
		$arrt=$sqlll->save($yu);
		$ti['ztt']='2';
		$sd=$mysql->where("p_id='$p_id'")->save($ti);
		}
		echo 1;
	}else if($arr['order_state']=='买家已付款'){
		$ti['ztt']='1';
		$sd=$mysql->where("p_id='$p_id'")->save($ti);
		echo 1;
	}

}
public function chem(){
		//师傅登陆的验证
	
		 $user_name=$_GET['username'];
		$mysql=M('shou');
		$re=$mysql->where("shou_name='$user_name'")->find();
		if($re){
			cookie('us_name',$user_name,3600*24*100);
			echo "1";
		}else{
			echo "2";
		}
	}
public  function qz(){
	$di_anpu=$_COOKIE['us_name'];
	$mysql=M('qizi');
	$arr=$mysql->where("dianpu='$di_anpu'")->select();
	$this->assign('arr',$arr);
	$this->display();

}
public function qztj(){
	 $qizi_color=$_POST['qizi_color'];
	$qizi_name=$_POST['qizi_name'];
	 $numss=substr($qizi_name,7);
	$mysql=M('qizi');
	$mode=explode(',',$qizi_name);
	$model=explode(',',$qizi_color);
	$di_anpu=$_COOKIE['us_name'];
	$arr3=$mysql->where("dianpu='$di_anpu'")->find();
	if($arr3){
		$arr5=$mysql->where("dianpu='$di_anpu'")->delete();
		if($arr5){
			$a=2;
	for($i=0;$i<$a;$i++){
		$qiziname=$model[$i];
		$qizicolor=$mode[$i];	
			
$ee[]=array('qizi_name'=>$qiziname,'qizi_color'=>$qizicolor,'dianpu'=>$di_anpu);
		}
				$ar=$mysql->addAll($ee);
			
	echo 1;
		}
	}else{
	
	
	$a=2;
	for($i=0;$i<$a;$i++){
		$qizicolor=$mode[$i];//DIE;ECHO 	
		$qiziname=$model[$i];	
$ee[]=array('qizi_name'=>$qiziname,'qizi_color'=>$qizicolor,'dianpu'=>$di_anpu);
		}
				$ar=$mysql->addAll($ee);
			
	echo 1;
}
}
 public function tuichua(){
	   //师傅退出登录
           cookie('us_name',null);  //清空cookie
		   header('location:'. __CONTROLLER__.'/login');   
   }
 
public  function xuchuli(){
	$mysql=M('dingdan');
	$arr=$mysql->where("sku_zt='0'")->select();
	echo json_encode($arr);

}
public  function quanbu(){
	$mysql=M('dingdan');
	$arr=$mysql->select();
	echo json_encode($arr);

}
public  function xiangqing(){
	$p_id=$_POST['p_id'];
	$mysql=M('dingdan');
	$arr=$mysql->where("p_id='$p_id'")->select();
	echo json_encode($arr);

}
public  function beizhu(){
	$p_id=$_POST['p_id'];
	$tu['beizhu']=$_POST['beizhu'];
	$mysql=M('dingdan');
	$arr=$mysql->where("p_id='$p_id'")->save($tu);
	echo json_encode($arr);
}
public function order1(){
  $mysql=M('goods');
  $arr=$mysql->where("!wuliu='0'")->select();
     echo json_encode($arr);
}
public function order2(){
  $mysql=M('goods');
  $arr=$mysql->where("!wuliu='111'")->select();
     echo json_encode($arr);
}

}