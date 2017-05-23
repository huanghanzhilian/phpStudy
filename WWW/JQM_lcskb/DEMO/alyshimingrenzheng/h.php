<?php 
		$phone=$_GET['phone'];
		$host = "http://sms.market.alicloudapi.com";
		$path = "/singleSendSms";
		$method = "GET";
		$appcode = "da629d96ac3843c880e70b2e6e6d1b82";
		$headers = array();
		$num='1234';
		array_push($headers, "Authorization:APPCODE " . $appcode);
		include("Demo.php"); 
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
?>