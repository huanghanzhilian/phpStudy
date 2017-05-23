<?php
namespace Home\Controller;
use Think\Controller;
class WxhbController extends Controller {
	//发红包
	public function send(){
		vendor('Hongbao.oauth2');
		$wxapi = new \Wxapi();
		$openid = 'oDyuPwj1qfpGvnTVHggaSYzhrBqk';
		$res = $wxapi->pay($openid);
		//var_dump($res);
	}
	public function qrcode()
  {
		$url="http://m.weibaishi.com/home/payy/index/ddh/2016082511400755569855";$level=3;$size=4;
       Vendor('phpqrcode.phpqrcode');
       $errorCorrectionLevel =intval($level) ;//容错级别 
       $matrixPointSize = intval($size);//生成图片大小 
       //生成二维码图片 
       $object = new \QRcode();
       $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);  
  }
}
