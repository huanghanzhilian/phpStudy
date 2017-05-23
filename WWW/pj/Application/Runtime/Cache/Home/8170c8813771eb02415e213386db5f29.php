<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title></title>
    <style>
           body,#mapContainer{
            margin:0;
            height:100%;
            width:100%;
            text-align: center;
            font-size:12px;
        }
        .panel{
            position: absolute;
            top:15px;
            right: 15px;
        }
        .qrcodetxt{
            background-color: #0D9BF2;
            padding: 6px;
            color: white;
        }
        .center{
            position: absolute;
            width: 100%;
            bottom: 24px;
        }
        .btmtip {
            cursor: pointer;
            border-radius: 5px;
            background-color: #0D9BF2;
            padding: 6px;
            width: 160px;
            color: white;
            margin: 0 auto;
        }
		
		#tip {
	background-color: #fff;
	padding-left: 10px;
	padding-right: 10px;
	position: absolute;
	font-size: 12px;
	right: 10px;
	top: 20px;
	border-radius: 3px;
	border: 1px solid #ccc;
	line-height: 30px;
	z-index:2000;
}
    </style>
    <link rel="stylesheet" href="http://cache.amap.com/lbs/static/main.css?v=1.0?v=1.0" />
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=d2cc2979e70a846f16cbfa5605c8be7d&plugin=AMap.ToolBar"></script>

</head>
<body>
    
    <div id="mapContainer" ></div>
    <div class='center'>
        <div id='bt' class="btmtip">点击去高德地图</div>
    </div>
</body>
</html>


<script>
        var sid = location.search.slice(1); 
		var sidjd= sid.split(",");
		console.log(sidjd);
		if(sid){
			kkoiuio()
		}
		
	function kkoiuio(){	
		var button = document.getElementById('bt');
		var map, geolocation;
		
		map = new AMap.Map("mapContainer");
		
		map.plugin('AMap.Geolocation', function() {
        geolocation = new AMap.Geolocation({
            enableHighAccuracy: true,//是否使用高精度定位，默认:true
            timeout: 10000,          //超过10秒后停止定位，默认：无穷大
            buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
            zoomToAccuracy: true,      //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
            buttonPosition:'RB',
			showButton:false,
			showCircle: false
        });
        map.addControl(geolocation);
        geolocation.getCurrentPosition();
        AMap.event.addListener(geolocation, 'complete', onComplete);//返回定位信息
        AMap.event.addListener(geolocation, 'error', onError);      //返回定位出错信息
    });
	
	var jwduu
    //解析定位结果
    function onComplete(data) {
        var str=['定位成功'];
        str.push('经度：' + data.position.getLng());
        str.push('纬度：' + data.position.getLat());
        str.push('精度：' + data.accuracy + ' 米');
        str.push('是否经过偏移：' + (data.isConverted ? '是' : '否'));
       <!-- document.getElementById('tip').innerHTML = str.join('<br>');-->
		//jwduu=data.position.lng+','+data.position.lat;
		jwduu=data.position.lng
		jwduun=data.position.lat;
		ooiuyt()
        //return jwduu;
    }
    //解析定位错误信息
    function onError(data) {
        document.getElementById('tip').innerHTML = '定位失败';
    }
	//console.log(jwduu);
	
	
	function ooiuyt(){
		AMap.plugin(["AMap.Transfer"], function() {
			var drivingOption = {
				map:map,
				city: '北京市',
				policy: AMap.TransferPolicy.LEAST_TIME
			};
			
			var transfer = new AMap.Transfer(drivingOption); //构造驾车导航类
			//根据起终点坐标规划驾车路线
			console.log(jwduu);
			var ppop=new AMap.LngLat(jwduu,jwduun)
			var ppopn=new AMap.LngLat(sidjd[0],sidjd[1])
			
			transfer.search(ppop, ppopn,function(status,result){
				
				button.onclick = function(){
					transfer.searchOnAMAP({
						origin:result.origin,
						destination:result.destination
					});
				} 
				 
			});
			
		});
		map.addControl(new AMap.ToolBar());
		if(AMap.UA.mobile){
			document.getElementById('bitmap').style.display='none';
			bt.style.fontSize = '16px';
		}else{
			bt.style.marginRight = '10px';
		}

	}
	
	}

</script>