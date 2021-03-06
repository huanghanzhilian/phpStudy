<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
<title>编辑地址</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<!--<link rel="stylesheet" href="http://cache.amap.com/lbs/static/main1119.css"/>-->
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<!--<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=94ca4100199c2f2a8f33300cece2eba2"></script>-->


<style>
html, body {
	margin: 0;
	height: 100%;
	width: 100%;
}

#container {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	width: 100%;
	height: 55%;
	z-index:21111;
}



#show{ height:45%; width:100%; position:absolute; bottom:0px; background:#f8f8f8; overflow: auto; z-index:21121;}
.ffdf{width:100%; height:auto; padding-top:42px;}
.mar_top15{ height:45px;  border-bottom:1px solid #ddd; margin-left:40px; position:relative; padding:5px 0; line-height:22px; font-size:15px; color:#444;}


 
</style>
<body>
<div id='container'></div>
<div id="show">
    <div class="sxpd">
        <ul class="clearfix">
            <li class="onx" id="pdsa">全部</li>
            <li id="pdsa1">写字楼</li>
            <li id="pdsa2">小区</li>
            <li id="pdsa3">学校</li>
        </ul>
    </div>
    <div id="item_list" class="ffdf">
    
    </div>
</div>
<div id="tip">
    <span><b>北京</b></span>
    <div class="gjz">
        <i></i>
        
        <input type="text" id="keyword" name="keyword" value="" placeholder="查找小区/大厦/学校等" />
    </div>
    <em>取消</em>
</div>
<script type="text/javascript">

    /*var map, geolocation;
    //加载地图，调用浏览器定位服务
    map = new AMap.Map('container', {
       
    });
	map.setZoom(18);
	var items=[];
	var idd=[];
	var lng=[];
	var lat=[];
	
	
	
    map.plugin('AMap.Geolocation', function() {
        geolocation = new AMap.Geolocation({
			enableHighAccuracy: true,//是否使用高精度定位，默认:true
			timeout: 10000,          //超过10秒后停止定位，默认：无穷大
			maximumAge: 0,           //定位结果缓存0毫秒，默认：0
			convert: true,           //自动偏移坐标，偏移后的坐标为高德坐标，默认：true
			showButton: true,        //显示定位按钮，默认：true
			buttonPosition: 'LB',    //定位按钮停靠位置，默认：'LB'，左下角
			buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
			showMarker: true,        //定位成功后在定位到的位置显示点标记，默认：true
			showCircle: true,        //定位成功后用圆圈表示定位精度范围，默认：true
			panToLocation: true,     //定位成功后将定位到的位置作为地图中心点，默认：true
			zoomToAccuracy:true,     //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
			showButton:false
        });
        map.addControl(geolocation);
        geolocation.getCurrentPosition();
        AMap.event.addListener(geolocation, 'complete', onComplete);//返回定位信息
        AMap.event.addListener(geolocation, 'error', onError);      //返回定位出错信息
    });
	
	
	
    //解析定位结果
    function onComplete(data) {
        var str=['定位成功'];
        str.push('经度：' + data.position.getLng());
        str.push('纬度：' + data.position.getLat());
        str.push('精度：' + data.accuracy + ' 米');
        str.push('是否经过偏移：' + (data.isConverted ? '是' : '否'));
        document.getElementById('tip').innerHTML = str.join('<br>');
		
		map.setZoom(14);                  //设置地图缩放比
		
		map.plugin(['AMap.PlaceSearch'], function (){
		var pl = new AMap.PlaceSearch();
			pl.searchNearBy('',map.getCenter(),500);
			//pl.search('香山')
			AMap.event.addListener(pl,'complete',function(e){                
				console.log(e);
				
				var pois=e.poiList.pois;
				var n=pois.length>20?20:pois.length;
				for(var i=0;i<n;i++){
				    items.push(pois[i]['name']);
					idd.push(pois[i]['id']);
					lng.push(pois[i].location.lng);
					lat.push(pois[i].location.lat);
				}
					//console.log(items);
				    new Render(items).showUI();

			})
		});
		
		var Render=function(items){
        this.items=items;                                //获取的数组
		this.idd=idd; 
		this.lng=lng; 
		this.lat=lat; 
        this.list=document.getElementById('item_list');   //父容器
         		 
        };
        Render.prototype={
            _addItem:function(data,i){
				//console.log(this.idd[i]);
                var el=document.createElement('div');
                el.className='mar_top15 item_'+i;
                el.innerHTML=data;
				el.setAttribute("data-ID",this.idd[i]);
				el.setAttribute("data-lng",this.lng[i]);
				el.setAttribute("data-lat",this.lat[i]);
                this.list.appendChild(el);
                },
                showUI:function(items){
                    for(var i=0,n=(this.items.length>20?20:this.items.length);i<n;i++){
                        this._addItem(this.items[i],i+1);
                        }
                     $("#item_list>div").click(function(){
						  console.log($(this).html());
						  console.log($(this).attr('data-ID'));
						  console.log($(this).attr('data-lng'));
						  console.log($(this).attr('data-lat'));
					  })
                     
                    }
                 
                 
                };
	     
	     
	
    }
    //解析定位错误信息
    function onError(data) {
        document.getElementById('tip').innerHTML = '定位失败';
    }*/
	
</script>
<!--<script>
$(function(){
	$("#item_list>div").click(function(){
		console.log(1);
	})
})
</script>-->
</body>
</html>