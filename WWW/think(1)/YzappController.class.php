<?php
namespace Home\Controller;
use Think\Controller;
require_once APP_PATH.'Home/Controller/UtilController.class.php';
class YzappController extends Controller {
	public function index(){
		$this->display();
	}
	public function chear(){
		$phone=$_GET['phone'];
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
	
	}
	public  function dingdanadd(){
		$data['khusername']=I('post.khusername');
		$data['khphone']=I('post.khphone');
		$data['wxmodel']=I('post.wxmodel');
		$data['wxcontent']=I('post.wxcontent');
		$data['khaddress']=I('post.khaddress');
		$mysql=M('app_goods');
		$arr=$mysql->add($data);
		if($arr){
		$this->success('添加成功!',__CONTROLLER__.'/index',1);
		}
	}
	public function yzm(){
		file_get_contents('php://input');
		$sfphone=$_POST['sfphone'];
		$num=randomkey(4);
		$usrInfo = array('yzm'=>$num);
		echo json_encode($usrInfo);
		$url = 'http://sms.jiangukj.com/SendSms.aspx?';
		$data = array('action' => 'code',
		'username' => 'bjjxsg',
		'userpass' => '7bi58n',
		'mobiles' => $sfphone,
		'content' => $num,
		'codeid' => '4235');
		$db = new UtilController();
		$result = $db->request($url, 'POST',$data);
		
		
	}
	public  function yzphone(){
		file_get_contents('php://input');
		$sfphone=$_POST['sfphone'];
		$mysql=M('app_sfuser');
		$arr=$mysql->where("sfphone='$sfphone'")->find();
		if($arr){
			$usrInfo = array('sfphone'=>$sfphone);
			echo  json_encode($usrInfo);
		}else{
			$data['sfphone']=$sfphone;
			$arr1=$mysql->add($data);
			$usrInfo = array('sfphone'=>$sfphone);
			echo  json_encode($usrInfo);
		}
	}

}

