
	var chubv={};
	window.onload = function() {
		page();
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


		


		var btn=document.getElementById("btn");
		var a = document.getElementsByTagName("a");
		btn.onclick=function(){
			cunhup();
			ajaxsdf("a");
		}
		function cunhup(){
			var a = document.getElementsByTagName("a");
			for (var i = 0; i < a.length; i++) {
				// a[i].onclick = function(e) {
				// 	e.preventDefault();
				// 	ajaxs(this.getAttribute("data"))
				// }
				ajaxs(a[i].getAttribute("data"))
				//console.log(a[i])
			}
		}
		function ajaxs(pia) {
			var request = new XMLHttpRequest();
			request.open("POST", "demo2.php");
			var data = "pid="+pia;
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.send(data);
			request.onreadystatechange = function() {
				if (request.readyState === 4) {
					if (request.status === 200) {
						if(request.responseText){
							var jsonObj = JSON.parse(request.responseText)
							//移除
							var el=getdata(pia)[0].parentNode;
							el.parentNode.removeChild(el);
							geocoder(jsonObj.address,jsonObj.p_id);
						}
					} else {
						alert("发生错误：" + request.status);
					}
				}
			}
		}
	}



	function ajaxsdf(pia) {
		var request = new XMLHttpRequest();
		//request.open("POST", "think/index.php/home/index/t_list");
		if(pia=="a"){
			request.open("POST", "think/index.php/home/index/t_list");
		}else if(pia=="b"){
			request.open("POST", "think/index.php/home/index/g_list");
		}else if(pia=="c"){
			request.open("POST", "think/index.php/home/index/h_list");
		}
		//var data = "pid="+pia;
		//request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send();
		request.onreadystatechange = function() {
			if (request.readyState === 4) {
				if (request.status === 200) {
					var jsonObj = JSON.parse(request.responseText);
					var shugu=document.getElementById("shugu");
					shugu.parentNode.removeChild(shugu);
					// var w =shugu.childNodes;
					// var s =shugu.children;
					// for (var i = 0; i < shugu.children.length; i++) {
					// 	console.log(shugu.children.length)
					// 	shugu.removeChild(shugu.children[i])
					// };
					zichup(jsonObj,pia)
				} else {
					alert("发生错误：" + request.status);
				}
			}
		}
	}
	function zichup(jsonObj,pia){
		var fuhesd=document.getElementById("fuhesd")
		var conright=document.createElement("div");
		conright.id="shugu";
		fuhesd.appendChild(conright);
		for (var i = 0; i < jsonObj.length; i++) {
			resdpmsd(jsonObj[i],pia);
		};
	}
	//渲染符合dom
	function resdpmsd(dser,pia){
		var shugu=document.getElementById("shugu")
		var paginat = document.createElement("div");
		paginat.className="contain";
		if(pia=="a"){
			paginat.innerHTML="<div>"+dser.p_id+"</div>"+"<div>"+dser.goods_name+"</div>"+"<div>"+dser.goods_content+"</div>"+"<div class='buttons'><span onclick='pipei(this)'>下单</span>"+"<span onclick='buzuo(this)'>发送短信</span>"+"<span onclick='buffuhe(this)'>笔记</span></div>"
		}else if(pia=="b"){
			paginat.innerHTML="<div>"+dser.p_id+"</div>"+"<div>"+dser.goods_name+"</div>"+"<div>"+dser.goods_content+"</div>"+"<div class='buttons'><span onclick='pipei(this)'>取消</span>"
		}else if(pia=="c"){
			paginat.innerHTML="<div>"+dser.p_id+"</div>"+"<div>"+dser.goods_name+"</div>"+"<div>"+dser.goods_content+"</div>"+"<div class='buttons'><span onclick='pipei(this)'>填写单号</span>"+"<span onclick='buzuo(this)'>取消</span>"
		}
		shugu.appendChild(paginat);
		
	}
	function getdata(data) {
		var aEle = document.getElementsByTagName('*');
		var aResult = [];
		var len = aEle.length;
		for (var i = 0; i < len; i++) {
			if (aEle[i].getAttribute("data") ===data) {
				aResult.push(aEle[i]);
			}
		}
		return aResult;
	}
	//渲染dom
	function redcdpm(dser){
		var conright=document.getElementById("xuchuli")
		var paginat = document.createElement("div");
		paginat.className="contain";
		paginat.setAttribute("data",dser.p_id);
		paginat.innerHTML="<div>"+dser.p_id+"</div>"+"<div>"+dser.goods_name+"</div>"+"<div>"+dser.goods_content+"</div>"+"<div class='buttons'><span onclick='pipei(this)'>匹配sku</span>"+"<span onclick='buzuo(this)'>暂不做</span>"+"<span onclick='buffuhe(this)'>不符合</span></div>"
		conright.appendChild(paginat);
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
				//console.log(meici)
				//geocoder_CallBack(result);
				// return meici;
				pandu(meici,user_id)
			}
		});
	}
	//判断是否符合范围
	function pandu(data,user_id){
		datas=data.split(",");
		//var jk=[];
		var ck={};
		for (var i in chubv){
			if(chubv[i].contains(datas)){
				//console.log(user_id+"&&"+chubv[i].contains(data))
				ck["ins"]=1;
			}else{
				ck["ins"]=2;
			}
		}
		ck["lbs"]=data;
		ck["bianh"]=user_id;
		ajaxsfa(ck)
	}
	//最后ajax
	function ajaxsfa(pia) {
		var request = new XMLHttpRequest();
		request.open("POST", "think/index.php/home/index/cont");
		var data = "pid="+pia.bianh+"&jingweidu="+pia.lbs+"&dizhizt="+pia.ins;
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4) {
				if (request.status === 200) {
					var jsonObj = eval("("+request.responseText+")");
					//console.log(request.responseText)//document.getElementById("createResult").innerHTML = request.responseText;
					if(jsonObj){
						var dser={};
						dser.p_id=jsonObj.p_id;
						dser.sku_zt=jsonObj.sku_zt;
						dser.goods_card=jsonObj.goods_card;
						dser.goods_content=jsonObj.goods_content;
						dser.goods_name=jsonObj.goods_name;
					}
					redcdpm(dser)
				} else {
					alert("发生错误：" + request.status);
				}
			}
		}
	}
	//匹配sku
	function pipei(_this){
		var data =_this.parentNode.parentNode.getAttribute("data");
		var e = event || window.event;
		e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true;
		resize(data,_this)
	};
	//暂不做
	function buzuo(_this){
		var data =_this.parentNode.parentNode.getAttribute("data");
		piajaxs("buzuo",data);
	};
	//不符合
	function buffuhe(_this){
		var data =_this.parentNode.parentNode.getAttribute("data");
		piajaxs("buffuhe",data)
	};
	//匹配否sku ajax
	function piajaxs(zhut,pia) {
		var request = new XMLHttpRequest();
		if(zhut=="buzuo"){
			request.open("POST", "think/index.php/home/index/zhanbuzuo");
		}else if(zhut=="buffuhe"){
			request.open("POST", "think/index.php/home/index/bufuhe");
		}
		var data = "p_id="+pia;
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
	//匹配真sku ajax
	function zhenajaxs(pia,_this) {
		var request = new XMLHttpRequest();
		request.open("POST", "think/index.php/home/index/skui");
		var data = "p_id="+pia;
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4) {
				if (request.status === 200) {
					var jsonObj = eval("("+request.responseText+")");
					//console.log(jsonObj)
					xunsku(jsonObj,pia,_this);
				} else {
					alert("发生错误：" + request.status);
				}
			}
		}
	}
	//对话框形状自动调整
	function resize(data,_this) {
		var overlay= document.getElementById("attr-overlay")
		var content= document.getElementById("attr-content")
		overlay.style.display="block";
		content.style.display="block";
		content.style.left=(window.innerWidth-content.offsetWidth)/2 + "px";
		content.style.top=(window.innerHeight-content.offsetHeight)/2 + "px";
		content.addEventListener('click', function(e) {
			e = e || window.event;
			e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true;
		}, false);
		zhenajaxs(data,_this);
	}
	//点击页面空白处时
	function page(){
		document.addEventListener('click', function(e) {
			var overlay= document.getElementById("attr-overlay")
			var content= document.getElementById("attr-content")
			overlay.style.display = "none";
			content.style.display = "none";
			//移除
			// function getFirst(elem){
			//     for(var i=0,e;e=elem.childNodes[i++];){
			//         if(e.nodeType==1)
			//             return e;
			//     }
			// }
			for (var i = 0; i < content.children.length; i++) {
				content.removeChild(content.children[i])
			};
		}, false);
	}
	// 渲染选择sku
	function xunsku(data,pia,_this){
		var content= document.getElementById("attr-content");
		var title = document.createElement("div");
		title.innerHTML="匹配SKU";
		title.className="attr-content-title"
		var pagination = document.createElement("div");
		var ul = document.createElement("ul");
		ul.className="attr-content-con";
		pagination.appendChild(title);
		for (var i = 0; i < data.length; i++) {
			var btnspan = document.createElement("li");
			btnspan.innerHTML="<div class='left'>"+data[i].sku_name+"</div>"+"<div class='reft'>"+data[i].sku_money+"<span></span></div>";
			btnspan.setAttribute("data",data[i].sku_id)
			ul.appendChild(btnspan);
		};
		pagination.appendChild(ul);
		var button = document.createElement("button");
		button.className="attr-content-button"
		button.innerHTML="匹配";
		pagination.appendChild(button);
		content.appendChild(pagination);

		var li=pagination.getElementsByTagName("li");
		for (var i = 0; i < li.length; i++) {
			li[i].addEventListener('click', function(e) {
				e = e || window.event;
				yanse(this,button,pia,_this)
			}, false);
		};
	}
	function yanse(_this,button,pia,_dsa){
		var content= document.getElementById("attr-content");
		var li=content.getElementsByTagName("li");
		for (var i = 0; i < li.length; i++) {
			li[i].getElementsByTagName("span")[0].style.background="#fff";
		}
		_this.getElementsByTagName("span")[0].style.background="#5076e6";
		button.addEventListener('click', function(e) {
			e = e || window.event;
			e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true;
			var overlay= document.getElementById("attr-overlay")
			var content= document.getElementById("attr-content")
			overlay.style.display = "none";
			content.style.display = "none";
			for (var i = 0; i < content.children.length; i++) {
				content.removeChild(content.children[i])
			};
			pocku(pia,_this.getAttribute("data"),_dsa);
		}, false);
	}
	function pocku(pia,bih,_dsa){
		var request = new XMLHttpRequest();
		request.open("POST", "think/index.php/home/index/pipei");
		var data = "p_id="+pia+"&sku_id="+bih;
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4) {
				if (request.status === 200) {
					//console.log(request.responseText)
					xiaos(pia,_dsa)
				} else {
					alert("发生错误：" + request.status);
				}
			}
		}
	}
	function xiaos(pia,_dsa){
		var el=_dsa.parentNode.parentNode;
		console.log(el)
		el.parentNode.removeChild(el);
	}
