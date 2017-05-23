<?php
// check if wap 
function check_wap(){
  // 先检查是否为wap代理，准确度高
  if(stristr($_SERVER['HTTP_VIA'],"wap")){
    return true;
  }
  // 检查浏览器是否接受 WML.
  elseif(strpos(strtoupper($_SERVER['HTTP_ACCEPT']),"VND.WAP.WML") > 0){
    return true;
  }
  //检查USER_AGENT
  elseif(preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera |Googlebot-Mobile|YahooSeeker\/M1A1-R2D2|android|iphone|ipod|mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])){
    return true;
  }
  else{
    return false;
  }
}
$agent = check_wap();
echo $agent;
?>