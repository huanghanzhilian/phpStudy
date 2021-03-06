<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		.list{ border-bottom: 1px solid #ccc; padding: 10px 0; }
		button{ width: 100px; height: 50px; position: fixed;right: 20px; top: 20px; }
		#container{height: 500px; width: 100%;}
	</style>
	<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=d2cc2979e70a846f16cbfa5605c8be7d&plugin=AMap.Geocoder"></script>
</head>
<body>
	<div id='container'></div>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><div class="list">
			<div class="name">
				<?php echo ($kk["username"]); ?>
			</div>
			<div class="tel">
				<?php echo ($kk["phone"]); ?>
			</div>
			<div class="address" data="<?php echo ($kk["p_id"]); ?>">
				<?php echo ($kk["address"]); ?>
			</div>

		</div><?php endforeach; endif; ?>
	<button id="btn">转化</button>
	<script type="text/javascript">
		var map = new AMap.Map('container', {
			resizeEnable: true,
			zoom: 11,
			center: [116.397428, 39.90923]

		});

		//多边形
		var polyg={
			hn:[
				[113.875683, 36.227651],
				[112.996777, 35.264676],
				[111.151074, 34.905072],
				[110.052441, 34.61625],
				[112.557324, 32.381114],
				[114.622753, 31.748014],
				[115.765331, 31.673245],
				[116.116894, 32.418218],
				[115.106152, 33.08348],
				[115.545605, 33.8168],
				[116.512402, 33.88979],
				[116.600292, 34.652408],
				[115.062206, 34.977119],
				[115.413769, 35.479676],
				[115.58955, 36.12123],
				[114.534863, 36.085724],
				[114.271191, 36.156719]
			],
			hb:[
				[114.468843,41.949389],
				[113.897554,40.828472],
				[114.380952,39.552881],
				[113.589936,37.872804],
				[113.809663,36.295325],
				[115.303804,36.082523],
				[117.852632,37.768662],
				[116.622163,38.769192],
				[116.314546,39.451156],
				[115.347749,39.383257],
				[115.43564,40.260779],
				[116.18271,40.928153],
				[117.105561,40.928153],
				[117.764741,40.260779],
				[118.379976,39.21322],
				[119.786226,39.95829],
				[119.390718,40.761935],
				[119.127046,41.457249],
				[118.379976,42.112598],
				[118.028413,42.632048],
				[116.138765,42.07999],
				[115.611421,41.654557],
				[114.908296,42.07999]
			],
			bj:[
				[116.280145,40.140821],
				[116.229161,40.133734],
				[116.21148,40.117918],
				[116.196545,40.106299],
				[116.165989,40.060724],
				[116.150368,40.038123],
				[116.142987,40.009203],
				[116.13818,39.971851],
				[116.093977,39.934743],
				[116.159123,39.925792],
				[116.169079,39.886024],
				[116.156376,39.839379],
				[116.140369,39.824186],
				[116.144231,39.820314],
				[116.151398,39.811298],
				[116.13818,39.789538],
				[116.126507,39.751011],
				[116.183155,39.703746],
				[116.237057,39.70401],
				[116.277913,39.739132],
				[116.321772,39.680135],
				[116.383656,39.730155],
				[116.436184,39.738868],
				[116.541241,39.758401],
				[116.586903,39.783206],
				[116.624325,39.812222],
				[116.64235,39.852296],
				[116.714018,39.818551],
				[116.730755,39.841225],
				[116.709201,39.913419],
				[116.709024,39.917913],
				[116.693311,39.921287],
				[116.757578,39.958366],
				[116.762277,39.978527],
				[116.674965,39.96922],
				[116.664494,39.998683],
				[116.656855,40.020246],
				[116.643723,40.041802],
				[116.695093,40.101802],
				[116.696509,40.108596],
				[116.59437,40.109974],
				[116.558922,40.124547],
				[116.523474,40.134391],
				[116.492146,40.137934],
				[116.448458,40.146464],
				[116.400651,40.145545],
				[116.385159,40.165947],
				[116.374151,40.166898],
				[116.364173,40.163126],
				[116.308598,40.206797],
				[116.288042,40.208108]
			]
		}
		var chubv={};
		for (var i in polyg) {
			chubv[i] = new AMap.Polygon({
				path: polyg[i], //设置多边形边界路径
				strokeColor: "#FF33FF", //线颜色
				strokeOpacity: 0.2, //线透明度
				strokeWeight: 3, //线宽
				fillColor: "#1791fc", //填充色
				fillOpacity: 0.35 //填充透明度
			});
			chubv[i].setMap(map);
			chubv[i].setExtData(i);
		}
		
		function pandu(data,user_id){
			datas=data.split(",");
			//var jk=[];
			var ck={};
			for (var i in chubv){
				if(chubv[i].contains(datas)){
					//console.log(user_id+"&&"+chubv[i].contains(data))
					ck["ins"]=chubv[i].contains(datas);
				}else{
					ck["ins"]=chubv[i].contains(datas);
				}
			}
			ck["lbs"]=data;
			ck["bianh"]=user_id;
			transm(ck)
			//jk.push(ck)/*(data,user_id)*/
		}
		function transm(ck){
			console.log(ck)
		}

		var btn=document.getElementById("btn");
		var div = document.getElementsByTagName("div");
		var address=[];
		for (var i = 0; i < div.length; i++) {
			if(div[i].className=="address"){
				address.push(div[i]);
			}
		}

		btn.onclick=function(){
			cunhup()
		}
		function cunhup(){
			for (var i = 0; i < address.length; i++) {
				var uio=geocoder(trim(address[i].innerHTML),address[i].getAttribute("data"));
			}
			function trim(str){
			    return str.replace(/^(\s|\u00A0)+/,'').replace(/(\s|\u00A0)+$/,'');
			}
		}
		//获取经纬度
		function geocoder(data,user_id) {
			var geocoder = new AMap.Geocoder({
				radius: 1000 //范围，默认：500
			});
			//地理编码,返回地理编码结果
			geocoder.getLocation(data, function(status, result) {
				if (status === 'complete' && result.info === 'OK') {
					var meici=result.geocodes[0].location.lng+','+result.geocodes[0].location.lat;
					//pandu(meici)
					//console.log(meici+'///'+meici)
					//geocoder_CallBack(result);
					// return meici;
					pandu(meici,user_id)
				}
			});
		}

		function ajaxs(pia) {
			var request = new XMLHttpRequest();
			request.open("POST", "vv.php");
			var data = "pid="+pia;
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.send(data);
			request.onreadystatechange = function() {
				if (request.readyState === 4) {
					if (request.status === 200) {
						console.log(request.responseText)//document.getElementById("createResult").innerHTML = request.responseText;
					} else {
						alert("发生错误：" + request.status);
					}
				}
			}
		}
	</script>
</body>
</html>