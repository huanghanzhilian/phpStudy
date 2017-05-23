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
 //pii  是微信的
function pii($chanel='wx_pub' ,$good= array() , $user = array()){
	// 导入Ping ++ sdk
	Vendor("Pingpp.init");
	// 提取 Config 内的配置
	$ping_config = [
        'ping_api_id'  => 'app_LybXDOHyvLS4yPmH',                            // ping++的APP id
        'ping_api_key' => 'sk_live_CO88mD8WjH04CCu1e1z1Wn1C',                // ping++的API KEY
        'success_url'  => 'http://m.weibaishi.com/home/pay/index',   // 成功返回处理结果的URL
        'cancel_url'   => 'http://m.weibaishi.com/home/pay/index',   // 支付取消回调地址

    ];
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
            $extra = ['open_id' => $user['open_id']]; 	 // open_id 需要自己通过逻辑在公众号内获取用户的openid
            break;
        case 'wx_pub_qr' :
            $extra = ['product_id' => $good['id']];
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
        		'amount'    => $good['amount']*100, 		// 人民币为分,1元请直接输入100
        		'order_no'  => $good['order_no'], 		// 商户订单号，统一不超过20位
        		'currency'  => 'cny', 			 		// 人民币交易标识
        		'extra'     => ['open_id' =>$user['open_id']], 			 		// 特定渠道发起交易时需要的额外参数以及部分渠道支付成功返回的额外参数
        		'channel'   => 'wx_pub',				// 第三方支付渠道
         		'client_ip' => get_client_ip(),  		// 支付用户ip
         		'app' 		=> ['id' => $ping_config['ping_api_id']]
         ]);
      	return $ch;

    } catch (\Pingpp\Error\Base $e) {
        return $e->getHttpBody();    
    }
}
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
        		'amount'    => $good['amount']*100, 		// 人民币为分,1元请直接输入100
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
function ping($channel = "alipay_pc_direct",$good = array() , $user = array() ){
	// 导入Ping ++ sdk
	Vendor("Pingpp.init");
	// 提取 Config 内的配置
	$ping_configggg = C('PING_CONFIGGGG');
	// 申明支付参数数组
    $extra = [];
    // 转化为小写
    $channel = strtolower($channel);

    // 根据支付参数不同，给定不同的变量
    switch ($channel) {
    	case 'alipay_pc_direct' :
            $extra = ['success_url' => $ping_configggg['success_url']];
            break;
        case 'alipay_wap' :
            $extra = ['success_url' => $ping_configggg['success_url'], 'cancel_url' => $ping_configggg['cancel_url']];
            break;
        case 'upmp_wap' :
            $extra = ['result_url' => $ping_configggg['success_url'].'?code='];
            break;
        case 'bfb_wap' :
            $extra = ['result_url' => $ping_configggg['success_url'].'?code=', 'bfb_login' => true];
            break;
        case 'upacp_wap' :
            $extra = ['result_url' => $ping_configggg['success_url']];
            break;
        case 'upacp_pc' :
            $extra = ['result_url' => $ping_configggg['success_url']];
            break;
        case 'wx_pub' :
            $extra = ['open_id' => $user['openid']]; 	 // open_id 需要自己通过逻辑在公众号内获取用户的openid
            break;
        case 'wx_pub_qr' :
            $extra = ['product_id' => $good['u_id']];
            break;
        case 'jdpay_wap' :
            $extra = ['success_url' => $ping_configggg['success_url'], 'fail_url' =>  $ping_configggg['cancel_url']];
            break;
    }

    \Pingpp\Pingpp::setApiKey($ping_configggg['ping_api_key']);
    //var_dump($channel);exit();
    try {

        $ch = \Pingpp\Charge::create([
        		'subject'   => $good['u_title'],   		// 商品的标题
        		'body' 	    => $good['u_title'], 	// 商品的标题
        		'amount'    => $good['amount']*100, 		// 人民币为分,1元请直接输入100
        		'order_no'  => $good['order_no'], 		// 商户订单号，统一不超过20位
        		'currency'  => 'cny', 			 		// 人民币交易标识
        		'extra'     => $extra, 			 		// 特定渠道发起交易时需要的额外参数以及部分渠道支付成功返回的额外参数
        		'channel'   => $channel,				// 第三方支付渠道
         		'client_ip' => get_client_ip(),  		// 支付用户ip
         		'app' 		=> ['id' => $ping_configggg['ping_api_id']]
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
        		'amount'    => $good['amount']*100,// 人民币为分,1元请直接输入100
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
        		'amount'    => $good['amount']*100, 		// 人民币为分,1元请直接输入100
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
  function access_token($db) 
{

    $appid = 'wx5e99bbf914658fb6';
    $appsecret = '997d3a144a4570e90ee6bdca8d7e597a';
    $access_token = $ret['access_token'];
    $dateline = $ret['dateline'];
    $time = time();
    if(($time - $dateline) >= 7200) 
    {
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
        $ret_json = curl_get_contents($url);
        $ret = json_decode($ret_json);
        if($ret->access_token)
        {
            $db->query("UPDATE `wxch_config` SET `access_token` = '$ret->access_token',`dateline` = '$time' WHERE `id` =1;");
            return $ret->access_token;
        }
    }
    elseif(empty($access_token)) 
    {
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
        $ret_json = curl_get_contents($url);
        $ret = json_decode($ret_json);
        if($ret->access_token)
        {
            $db->query("UPDATE `wxch_config` SET `access_token` = '$ret->access_token',`dateline` = '$time' WHERE `id` =1;");
            return $ret->access_token;
        }
    }
    else 
    {
        return $access_token;
    }
}
function curl_get_contents($url) 
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $r = curl_exec($ch);
    curl_close($ch);
    return $r;
}

function curl_grab_page($url,$data,$proxy='',$proxystatus='',$ref_url='') 
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($proxystatus == 'true') 
    {
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
    }
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    if(!empty($ref_url))
    {
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_REFERER, $ref_url);
    }
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    ob_start();
    return curl_exec ($ch);
    ob_end_clean();
    curl_close ($ch);
    unset($ch);
}

    /**
     * 发送HTTP请求方法，目前只支持CURL发送请求
     * @param  string $url    请求URL
     * @param  array  $params 请求参数
     * @param  string $method 请求方法GET/POST
     * @return array  $data   响应数据
     */
    function http($url, $params, $method = 'POST', $header = [], $multi = false)
    {
        $opts = [
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => $header,
        ];

        /* 根据请求类型设置特定参数 */
        switch (strtoupper($method)) {
            case 'GET':
                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                break;
            case 'POST':
                //判断是否传输文件
                $params                   = $params;//$multi ? $params : http_build_query($params);
                $opts[CURLOPT_URL]        = $url;
                $opts[CURLOPT_POST]       = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            default:
                throw new \Exception('不支持的请求方式！');
        }
        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error) {
            throw new \Exception('请求发生错误：' . $error);
        }

        return $data;
    }

    function gettoken()
    {
        $appKey = 'wx5e99bbf914658fb6';
        $appSecret = '94d8c7fa27770e7c050e1685028ea81d';
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appKey.'&secret='.$appSecret;
        $result = json_decode(file_get_contents($url));
        $access_token = $result->access_token;        
        if($access_token){
            return $access_token;
        }else{
            return null;
        }
    }
function getnewtoken()
{
    $conf = M('config')->where(array('config_id'=>1))->find();//获取配置中访问推送消息模板令牌
    if($conf){
        if((time()-$conf['exprie']) >=7200){ //超过7200秒 要重新获取access_token然后更新
            $access_token = gettoken();
            M('config')->save(array(
                'access_token'=> $access_token,
                'exprie'=>time(),
                'date_add'=>time(),
            ));
            return $access_token;
        }elseif(empty($conf['access_token'])){ //如果access_token为空的话 会更新令牌
            $access_token = gettoken();
            M('config')->save(array(
                'access_token'=> $access_token,
                'exprie'=>time(),
                'date_add'=>time(),
            ));
            return $access_token;
        }else{ //都符号条件返回正常的令牌
            $access_token = $conf['access_token'];
            return $access_token;
        }
    }else{ //配置数据表没有的话 就插入配置
                $access_token = gettoken();
                M('config')->add(array(
                    'access_token'=> $access_token,
                    'exprie'=>time(),
                    'date_add'=>time(),
                    ));
                return $access_token;
    }
    return null;
}
function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}
function downloadImageFromWeixin($url){
		$ch =curl_init($url);
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch,CURLOPT_NONODY,0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$package=curl_exec($ch);
		$httpinfo= curl_getinfo($ch);
		curl_close($ch);
	 return array_merge(array('body'=>$package),array('header'=>$httpinfo));
}
function randomkeys($length)   
{   
   $pattern = '1234567890abcdefghijklmnopqrstuvwxyz   
               ABCDEFGHIJKLOMNOPQRSTUVWXYZ';  
    for($i=0;$i<$length;$i++)   
    {   
        $key .= $pattern{mt_rand(0,35)};    //生成php随机数   
    }   
    return $key;   
}   
function randomkey($length)   
{   
   $pattern = '1234567890';  
    for($i=0;$i<$length;$i++)   
    {   
        $key .= $pattern{mt_rand(0,9)};    //生成php随机数   
    }   
    return $key;   
}
function getname($exname){
        $dir = './Public/Uploads/';
           $i=1;
           if(!is_dir($dir)){
              mkdir($dir,0777);
           }
           while(true){
            if(!is_file($dir.$i.".".$exname)){
                $name=$i.".".$exname;
                break;
              }
             $i++;
           }
           return $dir.$name;
}
