<?php
namespace Home\Controller;

use Think\Controller;
use Org\Net\Weixin;
//define your token
define("TOKEN", "weixin");

class OrderController extends Controller {
	private $access_token;

	public function wxlogin()
	{
		//配置 微信ID 跟密钥
		$config = array(
				'app_key'=>'wx5e99bbf914658fb6',
				'app_secret'=>'94d8c7fa27770e7c050e1685028ea81d',
				'callback'=>'http://weibaishi.com/home/order/wxlogin',
				);
		$wx = new Weixin($config);
		if(!isset($_GET['code'])){ //如果没有获取code那么说明第一次访问此接口
			$wx->login();
		}else{//回调 获取code值
			$code = $_GET['code'];
			$wx->getAccessToken($code);	
			$openid = $wx->getOpenId(); //获取当前用户的openid
			
			$info = M('wd_customer')->where(array('openid'=>$openid))->find();
			if($info){//查看用户用没有访问过，如果访问过就查找用户的customer_id ,并且跳转到表单
				session('user_id',$info['customer_id']);
				
				header('Location: http://weibaishi.com/home/index/index');
				
			}else{ //否则获取用户信息记录在wd_customer表中，并记录用户ID在会话中
				$userinfo = $wx->getOauthInfo();
				
				if($userinfo){ //能获取到用户信息就记录 否则重新跳转到这个地址继续获取openid
					$customer_id = M('wd_customer')->add(array(
						'username'=> $userinfo['nickname'],
						'avatar'=> $userinfo['headimgurl'],
						'openid'=> $userinfo['openid'],
						'date_add'=> time()
						));
					session('user_id',$wd_customer_id);
					
					header('Location: http://weibaishi.com/home/index/index');
				}else{
					header('Location: http://weibaishi.com/home/index/wxlogin');
				}
			}

			
		}

	}


	public function send()
	{	
		//$idda=I('get.id');//die;echo 
		
		$good=M('wd_customer');
		$arr=$good->where("customer_id='1'")->find();
		
		//$sql=M('m_user');
		//$arr3=$sql->where("user_id='3'")->find();
		 $openid =$arr['openid'];//die;echo
		$access_token = getnewtoken();
		if($openid){

			$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
			//echo $url;exit;
			$data['touser'] = $openid;
			$data['template_id'] = 'YGetVo9aiIZbCDevDvojdWzgMHLqn7AYbvrRy2Et8DI';
			$data['url'] = 'http://www.weibaishi.com';
			$first ='赶快去抢单啊。';
			$data['data'] = array(
				'first' => array('value'=>$first,'color'=>'#173177'),
				'track_number' => array('value'=>'123456789','color'=>'#173177'),
				'asp_name' => array('value'=>'北京','color'=>'#173177'),
				'asp_tel' => array('value'=>'666666','color'=>'#173177'),
				'remark' => array('value'=>'llllll','color'=>'#173177'),
				);
			$post_msg = json_encode($data);
			$ret_json = http($url, $post_msg);
			$ret = json_decode($ret_json);
			
			if($ret->errmsg != 'ok') 
			{
				$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
				$ret_json = curl_grab_page($url, $post_msg);
				echo $ret_json;

			}elseif($ret->errmsg == 'ok'){
				header('location:'. __MODULE__."/index/dingdan");
			}else{
				echo json_encode(array('msg'=>'发送消息失败','code'=>0));
			}
			
		}
	}

	public function index()
	{
		$this->display();
	}

	public function check()
	{
		$wechatObj = new wechatCallbackapiTest();
		$wechatObj->valid();
	}


	private function checkSignature()
	{
	    $signature = $_GET["signature"];
	    $timestamp = $_GET["timestamp"];
	    $nonce = $_GET["nonce"];
	        
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}


/**
  * wechat php test
  */



class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "Welcome to wechat world!";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>
