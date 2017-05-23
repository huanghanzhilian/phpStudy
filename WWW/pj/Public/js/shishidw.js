var data_id=document.getElementById("useridd").getAttribute("data_id");
var data_name=document.getElementById("useridd").getAttribute("data_name");

map = new AMap.Map('useridd', {
	resizeEnable: true
});

//定位开始
function hhcur(){
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
			showCircle: false,        //定位成功后用圆圈表示定位精度范围，默认：true
			panToLocation: true,     //定位成功后将定位到的位置作为地图中心点，默认：true
			zoomToAccuracy:true,     //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
		});
		map.addControl(geolocation);
		geolocation.getCurrentPosition();
		AMap.event.addListener(geolocation, 'complete',onComplete);//返回定位信息
		AMap.event.addListener(geolocation, 'error', onError);      //返回定位出错信息
	});
	//解析定位结果
	function onComplete(data) {
		var xiangshuse=data.position.getLng()+','+data.position.getLat();
		var nubtfg=quyujscgh(xiangshuse);
		//console.log(xiangshuse)
		if(nubtfg){
		    setTimeout('hhcur()',3000)
		}
		//return str;
		
	}
	
	//解析定位错误信息
	function onError(data) {
		console.log('定位失败')
	}
	
}
hhcur()
function quyujscgh(xiangshuse){
	var ref = new Wilddog("https://hjpyun123.wilddogio.com/users");  
	ref.child(data_id).set({
		"username": data_name,
		"location": xiangshuse,
		"id":data_id
	});
	return 1;
}