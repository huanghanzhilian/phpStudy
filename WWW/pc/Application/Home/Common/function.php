<?php

/**
 * Ping++ 支付函数
 *
 * @param  $channel <string>  支付方式类型
 * @param  $goods   <array>   必须包含[title,order_no,amount,description,id]
 * @param  $user    <array>   必须包含[openid]  微信公众号内获取
 * <code>
 * pay('alipay_pc_direct',[
 *	'title' => 'test','description'=>'description','amount' => 10,'id'=>1,'order_no'=>'xxxxxxx'
 *  ],[]);
 * </code>
 * @author widuu <admin@widuu.com>
 */
function ping_p($channel = "alipay_pc_direct",$good = array() , $user = array() ){
	// 导入Ping ++ sdk
	Vendor("Pingpp.init");
	// 提取 Config 内的配置
	$ping_configg = C('PING_CONFIGG');
	// 申明支付参数数组
    $extra = [];
    // 转化为小写
    $channel = strtolower($channel);

    // 根据支付参数不同，给定不同的变量
    switch ($channel) {
    	case 'alipay_pc_direct' :
            $extra = ['success_url' => $ping_configg['success_url']];
            break;
        case 'alipay_wap' :
            $extra = ['success_url' => $ping_configg['success_url'], 'cancel_url' => $ping_configg['cancel_url']];
            break;
        case 'upmp_wap' :
            $extra = ['result_url' => $ping_configg['success_url'].'?code='];
            break;
        case 'bfb_wap' :
            $extra = ['result_url' => $ping_configg['success_url'].'?code=', 'bfb_login' => true];
            break;
        case 'upacp_wap' :
            $extra = ['result_url' => $ping_configg['success_url']];
            break;
        case 'upacp_pc' :
            $extra = ['result_url' => $ping_configg['success_url']];
            break;
        case 'wx_pub' :
            $extra = ['open_id' => $user['openid']]; 	 // open_id 需要自己通过逻辑在公众号内获取用户的openid
            break;
        case 'wx_pub_qr' :
            $extra = ['product_id' => $good['u_id']];
            break;
        case 'jdpay_wap' :
            $extra = ['success_url' => $ping_configg['success_url'], 'fail_url' =>  $ping_configg['cancel_url']];
            break;
    }

    \Pingpp\Pingpp::setApiKey($ping_configg['ping_api_key']);
    //var_dump($channel);exit();
    try {

        $ch = \Pingpp\Charge::create([
        		'subject'   => $good['u_title'],   		// 商品的标题
        		'body' 	    => $good['u_title'], 	// 商品的标题
        		'amount'    => $good['amount'], 		// 人民币为分,1元请直接输入100
        		'order_no'  => $good['order_no'], 		// 商户订单号，统一不超过20位
        		'currency'  => 'cny', 			 		// 人民币交易标识
        		'extra'     => $extra, 			 		// 特定渠道发起交易时需要的额外参数以及部分渠道支付成功返回的额外参数
        		'channel'   => $channel,				// 第三方支付渠道
         		'client_ip' => get_client_ip(),  		// 支付用户ip
         		'app' 		=> ['id' => $ping_configg['ping_api_id']]
         ]);
      	return $ch;

    } catch (\Pingpp\Error\Base $e) {
        return $e->getHttpBody();    
    }
}
function ping_pay($channel = "alipay_pc_direct",$good = array() , $user = array() ){
	// 导入Ping ++ sdk
	Vendor("Pingpp.init");
	// 提取 Config 内的配置
	$ping_config = C('PING_CONFIG');
	// 申明支付参数数组
    $extra = [];
    // 转化为小写
    $channel = strtolower($channel);

    // 根据支付参数不同，给定不同的变量
    switch ($channel) {
    	case 'alipay_pc_direct' :
            $extra = ['success_url' => $ping_config['success_url']];
            break;
        case 'alipay_wap' :
            $extra = ['success_url' => $ping_config['success_url'], 'cancel_url' => $ping_config['cancel_url']];
            break;
        case 'upmp_wap' :
            $extra = ['result_url' => $ping_config['success_url'].'?code='];
            break;
        case 'bfb_wap' :
            $extra = ['result_url' => $ping_config['success_url'].'?code=', 'bfb_login' => true];
            break;
        case 'upacp_wap' :
            $extra = ['result_url' => $ping_config['success_url']];
            break;
        case 'upacp_pc' :
            $extra = ['result_url' => $ping_config['success_url']];
            break;
        case 'wx_pub' :
            $extra = ['open_id' => $user['openid']]; 	 // open_id 需要自己通过逻辑在公众号内获取用户的openid
            break;
        case 'wx_pub_qr' :
            $extra = ['product_id' => $good['u_id']];
            break;
        case 'jdpay_wap' :
            $extra = ['success_url' => $ping_config['success_url'], 'fail_url' =>  $ping_config['cancel_url']];
            break;
    }

    \Pingpp\Pingpp::setApiKey($ping_config['ping_api_key']);
    //var_dump($channel);exit();
    try {

        $ch = \Pingpp\Charge::create([
        		'subject'   => $good['u_title'],   		// 商品的标题
        		'body' 	    => $good['u_title'], 	// 商品的标题
        		'amount'    => $good['amount'], 		// 人民币为分,1元请直接输入100
        		'order_no'  => $good['order_no'], 		// 商户订单号，统一不超过20位
        		'currency'  => 'cny', 			 		// 人民币交易标识
        		'extra'     => $extra, 			 		// 特定渠道发起交易时需要的额外参数以及部分渠道支付成功返回的额外参数
        		'channel'   => $channel,				// 第三方支付渠道
         		'client_ip' => get_client_ip(),  		// 支付用户ip
         		'app' 		=> ['id' => $ping_config['ping_api_id']]
         ]);
      	return $ch;

    } catch (\Pingpp\Error\Base $e) {
        return $e->getHttpBody();    
    }
}
function ping_pa($channel = "alipay_pc_direct",$good = array() , $user = array() ){
	// 导入Ping ++ sdk
	Vendor("Pingpp.init");
	// 提取 Config 内的配置
	$ping_configgg = C('PING_CONFIGGG');
	// 申明支付参数数组
    $extra = [];
    // 转化为小写
    $channel = strtolower($channel);

    // 根据支付参数不同，给定不同的变量
    switch ($channel) {
    	case 'alipay_pc_direct' :
            $extra = ['success_url' => $ping_configgg['success_url']];
            break;
        case 'alipay_wap' :
            $extra = ['success_url' => $ping_configgg['success_url'], 'cancel_url' => $ping_configgg['cancel_url']];
            break;
        case 'upmp_wap' :
            $extra = ['result_url' => $ping_configgg['success_url'].'?code='];
            break;
        case 'bfb_wap' :
            $extra = ['result_url' => $ping_configgg['success_url'].'?code=', 'bfb_login' => true];
            break;
        case 'upacp_wap' :
            $extra = ['result_url' => $ping_configgg['success_url']];
            break;
        case 'upacp_pc' :
            $extra = ['result_url' => $ping_configgg['success_url']];
            break;
        case 'wx_pub' :
            $extra = ['open_id' => $user['openid']]; 	 // open_id 需要自己通过逻辑在公众号内获取用户的openid
            break;
        case 'wx_pub_qr' :
            $extra = ['product_id' => $good['u_id']];
            break;
        case 'jdpay_wap' :
            $extra = ['success_url' => $ping_configgg['success_url'], 'fail_url' =>  $ping_configgg['cancel_url']];
            break;
    }

    \Pingpp\Pingpp::setApiKey($ping_configgg['ping_api_key']);
    //var_dump($channel);exit();
    try {

        $ch = \Pingpp\Charge::create([
        		'subject'   => $good['u_title'],   		// 商品的标题
        		'body' 	    => $good['u_title'], 	// 商品的标题
        		'amount'    => $good['amount'], 		// 人民币为分,1元请直接输入100
        		'order_no'  => $good['order_no'], 		// 商户订单号，统一不超过20位
        		'currency'  => 'cny', 			 		// 人民币交易标识
        		'extra'     => $extra, 			 		// 特定渠道发起交易时需要的额外参数以及部分渠道支付成功返回的额外参数
        		'channel'   => $channel,				// 第三方支付渠道
         		'client_ip' => get_client_ip(),  		// 支付用户ip
         		'app' 		=> ['id' => $ping_configgg['ping_api_id']]
         ]);
      	return $ch;

    } catch (\Pingpp\Error\Base $e) {
        return $e->getHttpBody();    
    }
}
function ping_weixin($channel = "wx_pub",$good = array() , $user = array() ){
	// 导入Ping ++ sdk
	Vendor("Pingpp.init");
	// 提取 Config 内的配置
	$ping_configgg = C('PING_CONFIGGG');
	// 申明支付参数数组
    $extra = [];
    // 转化为小写
    $channel = strtolower($channel);

    // 根据支付参数不同，给定不同的变量
    switch ($channel) {
    	case 'alipay_pc_direct' :
            $extra = ['success_url' => $ping_configgg['success_url']];
            break;
        case 'alipay_wap' :
            $extra = ['success_url' => $ping_configgg['success_url'], 'cancel_url' => $ping_configgg['cancel_url']];
            break;
        case 'upmp_wap' :
            $extra = ['result_url' => $ping_configgg['success_url'].'?code='];
            break;
        case 'bfb_wap' :
            $extra = ['result_url' => $ping_configgg['success_url'].'?code=', 'bfb_login' => true];
            break;
        case 'upacp_wap' :
            $extra = ['result_url' => $ping_configgg['success_url']];
            break;
        case 'upacp_pc' :
            $extra = ['result_url' => $ping_configgg['success_url']];
            break;
        case 'wx_pub' :
            $extra = ['open_id' => $user['openid']]; 	 // open_id 需要自己通过逻辑在公众号内获取用户的openid
            break;
        case 'wx_pub_qr' :
            $extra = ['product_id' => $good['u_id']];
            break;
        case 'jdpay_wap' :
            $extra = ['success_url' => $ping_configgg['success_url'], 'fail_url' =>  $ping_configgg['cancel_url']];
            break;
    }

    \Pingpp\Pingpp::setApiKey($ping_configgg['ping_api_key']);
    //var_dump($channel);exit();
    try {

        $ch = \Pingpp\Charge::create([
        		'subject'   => $good['u_title'],   		// 商品的标题
        		'body' 	    => $good['u_title'], 	// 商品的标题
        		'amount'    => $good['amount'], 		// 人民币为分,1元请直接输入100
        		'order_no'  => $good['order_no'], 		// 商户订单号，统一不超过20位
        		'currency'  => 'cny', 			 		// 人民币交易标识
        		'extra'     => $extra, 			 		// 特定渠道发起交易时需要的额外参数以及部分渠道支付成功返回的额外参数
        		'channel'   => $channel,				// 第三方支付渠道
         		'client_ip' => get_client_ip(),  		// 支付用户ip
         		'app' 		=> ['id' => $ping_configgg['ping_api_id']]
         ]);
      	return $ch;

    } catch (\Pingpp\Error\Base $e) {
        return $e->getHttpBody();    
    }
}


