<?php
return array(
//数据库配置信息
'DB_TYPE' => 'mysql', // 数据库类型
'DB_HOST' => '127.0.0.1', // 服务器地址
'DB_NAME' => 'weibaishi', // 数据库名
'DB_USER' => 'root', // 用户名
'DB_PWD' => 'root', // 密码
'DB_PORT' => 3306, // 端口
'DB_PREFIX' => '', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符
'URL_MODEL' =>2,
'URL_HTML_SUFFIX' => 'html',
'URL_ROUTER_ON'   => true, //开启路由
'URL_ROUTE_RULES' => array( //定义路由规则     
'model/:model_id\d/:color_id\d'  => 'Home/Index/wenti',
'phone'  => 'Home/Index/phone',
'orders'  => 'Home/Index/ksxd',
'setup'  => 'Home/Index/chuangjian',
'submit'  => 'Home/Index/add_order',
'dingdan'  => 'Home/Index/dingdan',
//'type/:type\d'    => 'Index/phone',
),
	// 支付配置
// 支付配置
	'PING_CONFIG' => [
		'ping_api_id'  => 'app_LybXDOHyvLS4yPmH',    						 // ping++的APP id
		'ping_api_key' => 'sk_live_CO88mD8WjH04CCu1e1z1Wn1C',   			 // ping++的API KEY
		'success_url'  => 'http://weibaishi.com/index.php/home/pay/index', 	 // 成功返回处理结果的URL
		'cancel_url'   => 'http://weibaishi.com/index.php/home/pay/index',   // 支付取消回调地址

	],
	'PING_CONFIGG' => [
		'ping_api_id'  => 'app_LybXDOHyvLS4yPmH',    						 // ping++的APP id
		'ping_api_key' => 'sk_live_CO88mD8WjH04CCu1e1z1Wn1C',   			 // ping++的API KEY
		'success_url'  => 'http://weibaishi.com/index.php/home/pay/peijian', 	 // 成功返回处理结果的URL
		'cancel_url'   => 'http://weibaishi.com/index.php/home/pay/peijian',   // 支付取消回调地址

	],
	'PING_CONFIGGG' => [
		'ping_api_id'  => 'app_LybXDOHyvLS4yPmH',    						 // ping++的APP id
		'ping_api_key' => 'sk_live_CO88mD8WjH04CCu1e1z1Wn1C',   			 // ping++的API KEY
		'success_url'  => 'http://weibaishi.com/index.php/home/pay/huankuana', 	 // 成功返回处理结果的URL
		'cancel_url'   => 'http://weibaishi.com/index.php/home/pay/huankuana',   // 支付取消回调地址

	],
);
