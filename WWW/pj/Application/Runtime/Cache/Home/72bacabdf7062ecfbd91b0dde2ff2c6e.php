<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-手机维修-服务范围</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=94ca4100199c2f2a8f33300cece2eba2&plugin=AMap.CitySearch"></script>
<script>
$(function() {   		
	
	var lkj=$(document).height();
	var cdkd=lkj-240;
	
	$(".conerty").height(cdkd);
	
	var map, geolocation;
	//加载地图，调用浏览器定位服务
	map = new AMap.Map('conerty', {
	    resizeEnable: true
	});
	map.setZoom(9);
	map.setCenter()
	
	map.plugin(["AMap.Scale"],function(){                         //加载插件
		var scale = new AMap.Scale();                             //new对象
		map.addControl(scale);                                    //插入对象
	});
	
	//多边形
	var polygonArr = new Array();//多边形覆盖物节点坐标数组
	polygonArr.push([116.103917,40.002339]);
	polygonArr.push([116.090184,40.014961]);
	polygonArr.push([116.094304,39.981296]);
	polygonArr.push([116.139622,39.882309]);
	polygonArr.push([116.103917,39.70504]);
	
	polygonArr.push([116.316777,39.694474]);
	polygonArr.push([116.331883,39.698701]);
	polygonArr.push([116.480199,39.729336]);
	
	polygonArr.push([116.675206,39.827489]);
	polygonArr.push([116.708165,39.933927]);
	polygonArr.push([116.699925,39.997079]);
	polygonArr.push([116.627141,40.093798]);
	polygonArr.push([116.548863,40.145256]);
	polygonArr.push([116.428013,40.156802]);
	polygonArr.push([116.259099,40.168347]);
	polygonArr.push([116.154729,40.129508]);
	polygonArr.push([116.142369,40.074886]);
	polygonArr.push([116.106663,40.032839]);
	var  polygon = new AMap.Polygon({
		path: polygonArr,//设置多边形边界路径
		strokeColor: "#FF33FF", //线颜色
		strokeOpacity: 0.2, //线透明度
		strokeWeight: 2,    //线宽
		fillColor: "#1791fc", //填充色
		fillOpacity: 0.1//填充透明度
	});
	polygon.setMap(map);
	
	
	//获取用户所在城市信息
    function showCityInfo() {
		//实例化城市查询类
		var citysearch = new AMap.CitySearch();
		//自动获取用户IP，返回当前城市
		citysearch.getLocalCity(function(status, result) {
			if (status === 'complete' && result.info === 'OK') {
				if (result && result.city && result.bounds) {
					var cityinfo = result.city;
					var citybounds = result.bounds;
					document.getElementById('xf_l').innerHTML = cityinfo;
					//地图显示当前城市
					map.setBounds(citybounds);
				}
			} else {
				document.getElementById('xf_l').innerHTML = result.info;
			}
		});
	}
	showCityInfo() 
		
});
    
	
	
	
	
</script>
<style>

</style>
</head>

<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>服务范围</h1>
    
</div><!--头-->
<div class="content">
    <div class="content_con" style=" padding-bottom:0px;">
        <div class="fw_banner_nn">
            <div class="fw_banner_1">
                <span class="xf_l" id="xf_l"></span>
                <img src="../../../../Public/img/images/fw_banner_1_034.png">
            </div>
            <div class="fw_banner_2">
                <h2>具体服务范围</h2>
            </div>
            <div class="fw_banner_2 fw_banner_2c">
                <strong>五环内全境，五环外以地图为准</strong>
            </div>
            <div class="conerty" id="conerty">
            
            </div>
        </div>
    </div>
</div>
</body>
</html>