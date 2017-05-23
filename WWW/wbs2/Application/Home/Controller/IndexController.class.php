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
	$up['jingweidu']=$jingweidu=$_POST['jingweidu'];
	$up['dizhizt']=$dizhizt$_POST['dizhizt'];
	$p_id=$_POST['p_id'];
	$mysql=M('dingdan');
	$arr=$mysql->where("p_id='$p_id'")->save($up);
	if($arr){
		$sql=M('ding');
		$arr1=$mysql->where("p_id='$p_id'")->find();
		$shop_card=$arr1['shop_card'];
		$qibiao=$arr1['qibiao'];
		$so=M('qizi');
		$arr3=$so->where("dianpu='$shop_card' and qizi_coloe='$qibiao'")->find();
		$goods_name=$arr1['goods_name'];
		$goodid=$arr1['goods_card'];
		$arr2=$sql->where("ding_name='$goods_name' and goodid='$goodid'")->find();
			if($arr2){
				if($arr1['zt']=='1'){
				    if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $arr1['qibiao']==''){
					$ti['sku_id']=$arr2['sku_id'];
							$ti['sku_zt']='1';
							$phone='17301205932';
							$ti['zt']='2';
							$sd=$mysql->where("p_id='$p_id'")->save($ti);
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
					
						'1';
					
			
					}else if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $arr3['qizi_name']=='下单'){
							$mymy=M('goods');
							$po['good_name']=$arr1['good_name'];;
							$po['user_name']=$arr1['username'];
							$po['phone']=$arr1['phone'];
							$po['sku_id']=$arr1['sku_id'];
							$po['address']=$arr1['address'];
							$po['jingweidu']=$arr1['jingweidu'];
							$po['p_id']=$arr1['p_id'];
							$dss=$mymy->add($po);
							if($dss){
								$fg['ztt']=1;
								$ast=$mysql->where("p_id='$p_id'")->save($fg);
								'1';
							}
									
					}else{
							$tf['zt']='2';
							$sd=$mysql->where("p_id='$p_id'")->save($tf);
								'1';				
					}
				}else if($arr1['zt']=='3'){
				 if($arr2['ding_zt']==1 && $arr1['dizhizt']==1){
					$ti['sku_id']=$arr2['sku_id'];
					$ti['sku_zt']='1';
					$ti['zt']='4';
					$sd=$mysql->where("p_id='$p_id'")->save($ti);
					'1';
				}
			
			}
	}else{
	
	'1';
	}
}
}
public  function skuu(){
		$ding_zt=$_GET['ding_zt'];
		$sku_id=$_GET['sku_id'];
		$p_id=$_GET['p_id'];
		$mysql=M('dingdan');
		$arr1=$mysql->where("p_id='$p_id'")->find();
		$good_card=$arr1['good_card'];
		$shop_card=$arr1['shop_card'];
		$qibiao=$arr1['qibiao'];
		$sql=M('ding');
		$gg['ding_name']=$arr1['goods_content'];
		$gg['goodid']=$goodid=$arr1['goods_card'];
		$gg['sku_id']=$arr1['sku_id'];
		$gg['ding_zt']=$ding_zt;
		$adb=$sql->add($gg);
		$so=M('qizi');
		$arr3=$so->where("dianpu='$shop_card' and qizi_coloe='$qibiao'")->find();
		$goods_name=$arr1['goods_name'];
		$arr2=$sql->where("ding_name='$goods_name' and goodid='$goodid'")->find();
			if($arr2){
				if($arr1['zt']=='1'){
				    if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $arr1['qibiao']==''){
					$ti['sku_id']=$arr2['sku_id'];
							$ti['sku_zt']='1';
							$phone='17301205932';
							$ti['zt']='2';
							$sd=$mysql->where("p_id='$p_id'")->save($ti);
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
					
						'1';
					
			
					}else if($arr2['ding_zt']==1 && $arr1['dizhizt']==1 && $arr3['qizi_name']=='下单'){
							$mymy=M('goods');
							$po['good_name']=$arr1['good_name'];;
							$po['user_name']=$arr1['username'];
							$po['phone']=$arr1['phone'];
							$po['sku_id']=$arr1['sku_id'];
							$po['address']=$arr1['address'];
							$po['jingweidu']=$arr1['jingweidu'];
							$po['p_id']=$arr1['p_id'];
							$dss=$mymy->add($po);
							if($dss){
								$fg['ztt']=1;
								$ast=$mysql->where("p_id='$p_id'")->save($fg);
								'1';
							}
									
					}else{
							$tf['zt']='2';
							$sd=$mysql->where("p_id='$p_id'")->save($tf);
								'1';				
					}
				}
}
}
