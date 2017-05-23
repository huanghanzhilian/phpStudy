<?php 

$curl = curl_init(); 
// 设置你需要抓取的URL 
curl_setopt($curl, CURLOPT_URL, 'http://api.t.sina.com.cn/short_url/shorten.json?source=3271760578&url_long=http://www.weibaishi.com/'); 
// 设置header 响应头是否输出
//curl_setopt($curl, CURLOPT_HEADER, 1); 
// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
// 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE
   curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0); 
// 运行cURL，请求网页 

$jsonarr = curl_exec($curl);

$r=json_decode($jsonarr,true);
// 关闭URL请求 
echo $r[0]['url_short'];die;
//curl_close($curl); 
// 显示获得的数据 
//print_r($data); 
?>