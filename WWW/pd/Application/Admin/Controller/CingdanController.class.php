<?php
namespace Admin\Controller;
use Think\Controller;
class CingdanController extends Controller {
public function yanzheng(){
		file_get_contents('php://input');
		$sfphone=$_POST['sfphone'];
		$yz=M('sf_user','','connection');//师傅表
		$yanzheng=$yz->where("sf_phone='$sfphone'")->find();//师傅身份验证
		if(!$yanzheng){
			$sfzt = array('zt'=>'0');//验证失败
			echo  json_encode($sfzt);
		}else{
		$sfzt=$yanzheng['sfzt'];
		$sfzt = array('sfzt'=>$sfzt);
		echo  json_encode($sfzt);
	}
}
	public function sfzl(){
		file_get_contents('php://input');
		$sfphone=$_POST['sfphone'];
		
		$yz=M('sf_user','','connection');//师傅表
		$yanzheng=$yz->where("sf_phone='$sfphone'")->find();//师傅身份验证
		if(!$yanzheng){
			$sfzt = array('zt'=>'0');//验证失败
			echo  json_encode($sfzt);
		}else{
		$data['sf_username']=$_POST['sfusername'];
		$data['sfaddress']=$_POST['sfaddress'];
		$data['sfzt']=1;
		$sql=M('goods');
		$arr=$yz->where("sf_phone='$sfphone'")->save($data);
		if($arr){
		$arr1=$yz->where("sf_phone='$sfphone'")->find();
		$potp['sfuser_id']=$arr1['sf_id'];
		$potp['app_xdtime']=date('Y-m-d H:i:s', time());
		$potp['ddh']=$ddh=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 9);
		$potp['u_title']='押金';
		$potp['amount']='1000';
		$potp['typea']='1';
		$potp['app_fk']='0';
		$ar=$sql->add($potp);
		$sfzt=$arr1['sfzt'];
			$sfzt = array('sfzt'=>$sfzt,'ddh'=>$ddh);
			echo  json_encode($sfzt);
		
		}
	}
}
	public  function yzphone(){
		file_get_contents('php://input');
		$sfphone=$_POST['sfphone'];
		$yz=M('sf_user','','connection');//师傅表
		$yanzheng=$yz->where("sf_phone='$sfphone'")->find();
		if($yanzheng){
			$usrInfo = array('sfphone'=>$sfphone);
			echo  json_encode($usrInfo);
		}else{
			$data['sf_phone']=$sfphone;
			$arr1=$yz->add($data);
			$usrInfo = array('sfphone'=>$sfphone);
			echo  json_encode($usrInfo);
		}
	}
	public function yzm(){
			file_get_contents('php://input');
					$phone=$_POST['sfphone'];
					$num=randomkey(5);//生成5位数组验证码
					$usrInfo = array('yzm'=>$num);
					echo json_encode($usrInfo);
					
					$host = "http://sms.market.alicloudapi.com";
					$path = "/singleSendSms";
					$method = "GET";
					$appcode = "da629d96ac3843c880e70b2e6e6d1b82";
					$headers = array();
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
					//curl_setopt($curl, CURLOPT_HEADER, true);
					if (1 == strpos("$".$host, "https://"))
					{
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
					}
					var_dump(curl_exec($curl));
		
		
	}
}