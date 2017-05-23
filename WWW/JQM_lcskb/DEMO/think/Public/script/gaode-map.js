

var map = new AMap.Map('container', {
	resizeEnable: true,
	zoom: 16,
});
AMap.plugin(['AMap.ToolBar'],
function() {
	map.addControl(new AMap.ToolBar());
});
var lnglatXY = [116.396574, 39.992706]; //已知点坐标
function regeocoder() { //逆地理编码
	var geocoder = new AMap.Geocoder({
		radius: 1000,
		extensions: "all"
	});
	geocoder.getAddress(lnglatXY, function(status, result) {
		if (status === 'complete' && result.info === 'OK') {
			//geocoder_CallBack(result);
		}
	});
	var marker = new AMap.Marker({ //加点
		map: map,
		position: lnglatXY
	});
	marker.setLabel({//label默认蓝框白底左上角显示，样式className为：amap-marker-label
        offset: new AMap.Pixel(-50, -80),//修改label相对于maker的位置
        content: "<div id='yanshu'>在您附近有12个维百士的工程师可为您上门服务哦~</div>"
    });
	map.setFitView();
}
regeocoder()

var widger=document.getElementById("widget-container")
var overlay=document.getElementById("overlay");
var closeds=document.getElementById("closed");
var service=document.getElementById("service");
var but_button=document.getElementById("but-button");
var dfghsa=document.getElementById("dfghsa");
var bonsdfg=document.getElementById("bonsdfg");
//console.log(closeds)



//对话框形状自动调整
function resize() {
	widger.style.left=(window.innerWidth-widger.offsetWidth)/2 + "px";
	widger.style.top=(window.innerHeight -widger.offsetHeight)/2 + "px";
	dfghsa.style.left=(window.innerWidth-dfghsa.offsetWidth)/2 + "px";
	dfghsa.style.top=(window.innerHeight -dfghsa.offsetHeight)/2 + "px";
}
//关闭
function close(){
	var widger=document.getElementById("widget-container")
	var overlay=document.getElementById("overlay")
	var dfghsa=document.getElementById("dfghsa")
	widger.style.display="none";
	dfghsa.style.display="none";
	overlay.style.display="none";
}
//打开
function open(){
	var widger=document.getElementById("widget-container")
	var overlay=document.getElementById("overlay")
	widger.style.display="block";
	overlay.style.display="block";
}
function open1(){
	var dfghsa=document.getElementById("dfghsa")
	var overlay=document.getElementById("overlay")
	dfghsa.style.display="block";
	overlay.style.display="block";
}

overlay.onclick=function(){
	close()
}
closeds.onclick=function(){
	close()
}
service.onclick=function(){
	open();
	resize();
}

bonsdfg.onclick=function(){
	close()
}

