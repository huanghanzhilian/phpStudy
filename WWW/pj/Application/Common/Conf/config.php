<?php
return array(
//数据库配置信息
'DB_TYPE' => 'mysql', // 数据库类型
'DB_HOST' => '101.200.219.26', // 服务器地址
'DB_NAME' => 'world', // 数据库名
'DB_USER' => 'root', // 用户名
'DB_PWD' => 'nihao', // 密码
'DB_PORT' => 3306, // 端口
'DB_PREFIX' => '', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符
'URL_MODEL' =>2,
'URL_HTML_SUFFIX' => 'html',
'URL_ROUTER_ON'   => true, //开启路由
'TOKEN_ON'=>true,  // 是否开启令牌验证
'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true

'URL_ROUTE_RULES' => array( //定义路由规则 
'model/:model_id\d/:color_id\d'  => 'Home/Index/wenti',
'phone'  => 'Home/Index/phone',
'orders'  => 'Home/Index/ksxd',
'price'  => 'Home/Index/price',
'complaints'  => 'Home/Index/tousu',
'service'  => 'Home/Index/service',
'process'  => 'Home/Index/weixiulc',
'setup'  => 'Home/Index/chuangjian',
'order'  => 'Home/Index/dingdan',
'inquiries'  => 'Home/Index/login',
'search'  => 'Home/Index/search',
'membercentent'  => 'Home/Index/membercentent',
'anarchy/:id\d'  => 'Home/Index/zhuangtai',
'details/:id\d'  => 'Home/Index/xiangqing',
//'dingdan'  => 'Home/Index/dingdan',

),
	// 支付配置
// 支付配置
	'PING_CONFIG' => [
		'ping_api_id'  => 'app_LybXDOHyvLS4yPmH',    						 // ping++的APP id
		'ping_api_key' => 'sk_live_CO88mD8WjH04CCu1e1z1Wn1C',   			 // ping++的API KEY
		'success_url'  => 'http://m.weibaishi.com/home/pay/index', 	 // 成功返回处理结果的URL
		'cancel_url'   => 'http://m.weibaishi.com/home/pay/index',   // 支付取消回调地址

	],
	'PING_CONFIGG' => [
		'ping_api_id'  => 'app_LybXDOHyvLS4yPmH',    						 // ping++的APP id
		'ping_api_key' => 'sk_live_CO88mD8WjH04CCu1e1z1Wn1C',   			 // ping++的API KEY
		'success_url'  => 'http://m.weibaishi.com/home/pay/peijian', 	 // 成功返回处理结果的URL
		'cancel_url'   => 'http://m.weibaishi.com/home/pay/peijian',   // 支付取消回调地址

	],
	'PING_CONFIGGG' => [
		'ping_api_id'  => 'app_LybXDOHyvLS4yPmH',    						 // ping++的APP id
		'ping_api_key' => 'sk_live_CO88mD8WjH04CCu1e1z1Wn1C',   			 // ping++的API KEY
		'success_url'  => 'http://m.weibaishi.com/home/pay/huankuana', 	 // 成功返回处理结果的URL
		'cancel_url'   => 'http://m.weibaishi.com/home/pay/huankuana',   // 支付取消回调地址

	],
	'PING_CONFIGGGG' => [
		'ping_api_id'  => 'app_LybXDOHyvLS4yPmH',    						 // ping++的APP id
		'ping_api_key' => 'sk_live_CO88mD8WjH04CCu1e1z1Wn1C',   			 // ping++的API KEY
		'success_url'  => 'http://m.weibaishi.com/home/pay/maichua', 	 // 成功返回处理结果的URL
		'cancel_url'   => 'http://m.weibaishi.com/home/pay/maichua',   // 支付取消回调地址

	],
);
