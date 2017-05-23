window.onload = function() {
	tab();
	// for (var i = 0; i < Things.length; i++) {
	// 	Things[i]
	// }
	cureds("/Admin/Aingdan/xuchuli");
	var overlay= document.getElementById("attr-overlay");
	var closed=document.getElementById("closed");
	
	overlay.onclick=function(){
		close()
	}
	closed.onclick=function(){
		close()
	}

}
var ws = new WebSocket("ws://101.200.219.26:2346");

ws.onopen = function() {
	console.log('已连接上');
};

ws.onmessage = function(e) {
	var data = JSON.parse(e.data);
	if(data.weiwc){
		xoanshuas(data.weiwc)
	}
}
function xoanshuas(er){
	var mains= $r("#yuyaonh")[0];
	var prompt=$r("#yuyaonh").find("span")[0];
	//console.log(er)
	prompt.innerHTML=er;
}
// ws.onclose = function() {
// 	// 关闭 websocket
// 	alert("连接已关闭...");
// };

// function sendMessage(er) {
// 	var type='{"weiwc":"'+er+'"}';
// 	ws.send(type);
// }




function tab() {
	var tab = document.getElementById("tabs");
	var tab_li = tab.getElementsByTagName("li");
	for (var i = 0; i < tab_li.length; i++) {
		! function(i) {
			tab_li[i].onclick = function() {
				events(i, this.getAttribute("data_type"),this);
			}
		}(i)
	}
}

function events(index, _this,_obj) {
	var tab = document.getElementById("tabs");
	var tab_li = tab.getElementsByTagName("li");
	for (var i = 0; i < tab_li.length; i++) {
		tab_li[i].className = "";
	}
	tab_li[index].className = "active";

	switch (_this) {
		case "chuli":
			cureds("http://m.weibaishi.com/Admin/Aingdan/xuchuli",_obj);
			break;
		case "daixia":
			daixias();
			break;
		case "quanbhu":
			quanbuwe1("http://m.weibaishi.com/Admin/Aingdan/quanbu")
			break;
		case "yixia":
			yixiadanfn();
			break;
		case "daijie":
			daijieajax("http://m.weibaishi.com/Admin/Aingdan/order2")
			break;
		case "quanbu2":
			alert("未开通")
			//cureds("http://www.huanghanlian.com/data_location/list.json")
			break;
		default:
			console.log('case都不是的执行');
	}

}

function cureds(url,_obj) {

	// if(_obj){
	// 	_obj.getElementsByTagName("span")[0].innerHTML="";
	// }
	var dege = ["序号", "货品名称", "颜色", "客户姓名", "客户电话", "订单编号"]
	var request = new XMLHttpRequest();
	request.open("GET", url, true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				var data = JSON.parse(request.responseText);
				var main_center = document.getElementById("main-center")
				main_center.innerHTML = '<table  class="table" cellspacing="0" cellpadding="0">\
		            <thead></thead>\
		            <tbody></tbody>\
		        </table>';
				var thead = document.getElementsByTagName('thead');
				var chser = document.createElement("tr");
				thead[0].appendChild(chser);
				var tbody = document.getElementsByTagName('tbody');
				for (var i = 0; i < dege.length; i++) {
					var chsers = document.createElement("th");
					chsers.innerHTML = dege[i];
					chser.appendChild(chsers);
					//console.log(dege[i])
				};
				//console.log(data)
				for (var i = 0; i < data.length; i++) {
					var chsera = document.createElement("tr");
					var chserac = document.createElement("tr");
					chsera.innerHTML = '<td>' + (i + 1) + '</td>\
		        	<td>' + data[i].goods_name+'</td>\
					<td>' + data[i].goods_content + '</td>\
					<td>' + data[i].username + '</td>\
					<td>' + data[i].phone + '</td>\
					<td>' + data[i].goods_card + '</td>';
					chserac.innerHTML='<tr>\
					<td colspan="8">\
					<div class="anniu-center">\
						<div class="anniu fl">\
								<span onclick="pipeisd('+data[i].p_id+',this)">匹配SKU</span>\
								<span onclick="buzuo('+data[i].p_id+',this)">暂不做</span>\
								<span onclick="buffuhe('+data[i].p_id+',this)">不符合</span>\
						</div>\
						<div class="anniu_hu fr">\
								<span onclick="xiangqo('+data[i].p_id+',this)">订单详情</span>\
						</div>\
					</div>\
					</td>\
					</tr>'
					tbody[0].appendChild(chsera);
					tbody[0].appendChild(chserac);
				};

			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}

function xiangqo(p_id,_this){
	qhuresize(p_id,_this)
}
//详情对话框形状自动调整
function qhuresize(data,_this) {
	var overlay= document.getElementById("attr-overlay")
	var content= document.getElementById("attr-content")
	var widget_title=document.getElementById("widget-title");
	widget_title.innerHTML="详情"
	overlay.style.display="block";
	content.style.display="block";
	content.style.left=(window.innerWidth-content.offsetWidth)/2 + "px";
	content.style.top=(window.innerHeight-content.offsetHeight)/2 + "px";
	content.addEventListener('click', function(e) {
		e = e || window.event;
		e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true;
	}, false);
	xqajaxs(data,_this);    //
}


function xqajaxs(pia,_this) {
	var request = new XMLHttpRequest();
	request.open("POST", "http://m.weibaishi.com/Admin/Aingdan/xiangqing");
	var data = "p_id="+pia;
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				var data = JSON.parse(request.responseText);
				xiangqx(data,pia,_this);
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}
// 渲染选择sku
function xiangqx(data,pia,_this){
	var content= document.getElementById("attr-content");
	var content_sd= document.getElementById("content_sd");
	var ul = document.createElement("ul");
	ul.className="attr-content-con";
	var dasd=data[0];
	//console.log(dasd)

	// for (var dw in dasd) {
	// 	var btnspan = document.createElement("li");
	// 	btnspan.className="xianghujg";
	// 	if(dasd[dw]!=null){
	// 		btnspan.innerHTML=dasd[dw];
	// 		ul.appendChild(btnspan);
	// 		//console.log(dasd[dw])
	// 	}
	// }

	ul.innerHTML = '<li class="xghujg">订单序号：'+dasd.p_id+'</li>\
					<li class="xghujg">下单时间：'+dasd.order_time+'</li>\
					<li class="xghujg">订单编号：'+dasd.order_number+'</li>\
					<li class="xghujg">订单状态：'+dasd.order_state+'</li>\
					<li class="xghujg">服务项目：'+dasd.goods_content+'</li>\
					<li class="xghujg">服务地址：'+dasd.address+'</li>\
					<li class="xghujg">客户姓名：'+dasd.username+'</li>\
					<li class="xghujg">客户电话：'+dasd.phone+'</li>\
					<li class="xghujg">商品 ID：'+dasd.goods_card+'</li>\
					<li class="xghujg">卖家名称：'+dasd.goods_name+'</li>\
					<li class="xghujg">货品名称：'+dasd.goods_number+'</li>\
					<li class="xghujg">颜色分类：'+dasd.goods_color+'</li>'
	content_sd.appendChild(ul);
}







function pipeisd(p_id,_this){
	//console.log(_this)
	resize(p_id,_this)
}
//对话框形状自动调整
function resize(data,_this) {
	var overlay= document.getElementById("attr-overlay")
	var content= document.getElementById("attr-content");
	var widget_title=document.getElementById("widget-title");
	widget_title.innerHTML="匹配sku"
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
//匹配真sku ajax
function zhenajaxs(pia,_this) {
	var request = new XMLHttpRequest();
	request.open("POST", "http://m.weibaishi.com/Admin/Aingdan/skui");
	var data = "p_id="+pia;
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				//console.log(request.responseText)
				var data = JSON.parse(request.responseText);
				xunsku(data,pia,_this);
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}

// 渲染选择sku
function xunsku(data,pia,_this){
	var content= document.getElementById("attr-content");
	var content_sd= document.getElementById("content_sd");
	var ul = document.createElement("ul");
	ul.className="attr-content-con";
	for (var i = 0; i < data.length; i++) {
		var btnspan = document.createElement("li");
		btnspan.innerHTML="<div class='left'>"+data[i].sku_name+"</div>"+"<div class='reft'>"+data[i].sku_money+"<span></span></div>";
		btnspan.setAttribute("data",data[i].sku_id)
		ul.appendChild(btnspan);
	};
	content_sd.appendChild(ul);
	var button = document.createElement("button");
	button.className="attr-content-button"
	button.innerHTML="匹配";
	content_sd.appendChild(button);
	//content.appendChild(pagination);

	var li=content.getElementsByTagName("li");
	for (var i = 0; i < li.length; i++) {
		li[i].addEventListener('click', function(e) {
			e = e || window.event;
			yanse(this,button,pia,_this)

		}, false);
	};
}

function yanse(_this,button,pia,_dsa){
	var content= document.getElementById("attr-content");
	var content_sd= document.getElementById("content_sd");
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
		pocku(pia,_this.getAttribute("data"),_dsa);
		emptys(content_sd);
	}, false);
}

function pocku(pia,bih,_dsa){
	var request = new XMLHttpRequest();
	request.open("POST", "http://m.weibaishi.com/Admin/Aingdan/pipei");
	var data = "p_id="+pia+"&sku_id="+bih;
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				//console.log(request.responseText)
				xiaos(_dsa)
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}
function xiaos(_dsa){
	var el=_dsa.parentNode.parentNode.parentNode.parentNode;
	//console.log(get_nextsibling(el))
	el.parentNode.removeChild(el.previousSibling);
	el.parentNode.removeChild(el)
}
function get_nextsibling(n) {
	console.log(n)
	var x = n.nextSibling;
	while (x.nodeType != 1) {
		x = x.nextSibling;
	}
	return x;
}


//清空元素
function emptys(selector){
	while (selector.firstChild){
		selector.removeChild(selector.firstChild);
	}
}

//关闭
function close(){
	var overlay= document.getElementById("attr-overlay")
	var content= document.getElementById("attr-content")
	overlay.style.display="none";
	content.style.display="none";
	var content_sd= document.getElementById("content_sd");
	emptys(content_sd);
}


//暂不做
function buzuo(data,_this){
	// console.log(data)
	piajaxs("buzuo",data,_this);
};

//不符合
function buffuhe(data,_this){
	//var data =_this.parentNode.parentNode.getAttribute("data");
	piajaxs("buffuhe",data,_this)
};


//匹配否sku ajax
function piajaxs(zhut,pia,_this) {
	var request = new XMLHttpRequest();
	if(zhut=="buzuo"){
		request.open("POST", "http://m.weibaishi.com/Admin/Aingdan/zhanbuzuo");
	}else if(zhut=="buffuhe"){
		request.open("POST", "http://m.weibaishi.com/Admin/Aingdan/bufuhe");
	}else if(zhut=="xiadans"){
		request.open("POST", "http://m.weibaishi.com/Admin/Aingdan/xiadan");
	}
	var data = "p_id="+pia;
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				//console.log(request.responseText);
				if(request.responseText){
					xiaos(_this)
				}
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}

function quanbuwe1(url) {
	var dege = ["序号", "下单时间", "订单状态", "SKU", "服务地址", "旗标","客户姓名","客户电话","卖家名称","订单编号","商品ID"]
	var request = new XMLHttpRequest();
	request.open("GET", url, true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				//var data = JSON.parse(request.responseText);
				/*var main_center = document.getElementById("main-center")
				main_center.innerHTML = '<table style="width:150%"  class="table table2" cellspacing="0" cellpadding="0">\
		            <thead></thead>\
		            <tbody></tbody>\
		        </table>';
				var thead = document.getElementsByTagName('thead');
				var chser = document.createElement("tr");
				thead[0].appendChild(chser);
				var tbody = document.getElementsByTagName('tbody');
				for (var i = 0; i < dege.length; i++) {
					var chsers = document.createElement("th");
					chsers.innerHTML = dege[i];
					chser.appendChild(chsers);
				};
				for (var i = 0; i < data.length; i++) {
					var chsera = document.createElement("tr");
					chsera.innerHTML = '<td>' + (i + 1) + '</td>\
		        	<td width="136">' + data[i].order_time+'</td>\
					<td width="124" class="zhunghf" data='+data[i].ztt +'>' + data[i].ztt + '</td>\
					<td width="318">' + data[i].goods_name+'<span class="skuvc fr" data='+data[i].ztt +'></span></td>\
					<td width="300">' + data[i].address + '<span class="skuvcre fr" data='+data[i].dizhizt +'></span></td>\
					<td width="200">' + data[i].qibiao + '</td>\
					<td width="200">' + data[i].username + '</td>\
					<td width="200">' + data[i].phone + '</td>\
					<td width="200">' + data[i].shop_card +'</td>\
					<td width="200">' + data[i].order_number +'</td>\
					<td width="200">' + data[i].goods_card +'</td>';
					tbody[0].appendChild(chsera);
				};
				console.log(data)
				$r(".skuvcre").each(function(i,n) {
					switch (n.getAttribute("data")) {
						case "1":
							n.classList.add("fuhe");
							n.innerHTML="√";
							break;
						case "2":
							n.classList.add("bufuhe");
							n.innerHTML="×";
							break;
						//default:
							//alert('case都不是的执行');
					}
				})
				$r(".zhunghf").each(function(i,n) {
					switch (n.getAttribute("data")) {
						case "0":
							n.innerHTML="条件不足";
							break;
						case "1":
							n.innerHTML="已下单";
							break;
						case "2":
							n.innerHTML="已下单已发货";
							break;
						case "5":
							n.innerHTML="等待下单";
							break;
						//default:
							//alert('case都不是的执行');
					}
				})
				$r(".skuvc").each(function(i,n) {
					//console.log(n.getAttribute("data"))
					switch (n.getAttribute("data")) {
						case "0":
							n.classList.add("bufuhe");
							n.innerHTML="不符";
							break;
						case "1":
							n.classList.add("fuhe");
							n.innerHTML="符合";
							break;
						case "2":
							n.classList.add("fuhe");
							n.innerHTML="符合";
							break;
						case "3":
							n.classList.add("bufuhe");
							n.innerHTML="不符";
							break;
						case "4":
							n.classList.add("bufuhe");
							n.innerHTML="不符";
							break;
						case "5":
							n.classList.add("fuhe");
							n.innerHTML="符合";
							break;
						//default:
							//alert('case都不是的执行');
					}
				})*/
				//console.log(data)

			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}


function daijieajax(url) {
	var dege = ["序号", "下单时间", "订单状态", "服务项目", "服务地址", "客户姓名","客户电话","订单编号"]
	var request = new XMLHttpRequest();
	request.open("GET", url, true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				var data = JSON.parse(request.responseText);
				var main_center = document.getElementById("main-center")
				main_center.innerHTML = '<table  class="table" cellspacing="0" cellpadding="0">\
		            <thead></thead>\
		            <tbody></tbody>\
		        </table>';
				var thead = document.getElementsByTagName('thead');
				var chser = document.createElement("tr");
				thead[0].appendChild(chser);
				var tbody = document.getElementsByTagName('tbody');
				for (var i = 0; i < dege.length; i++) {
					var chsers = document.createElement("th");
					chsers.innerHTML = dege[i];
					chser.appendChild(chsers);
					//console.log(dege[i])
				};
				for (var i = 0; i < data.length; i++) {
					var chsera = document.createElement("tr");
					var chserac = document.createElement("tr");
					chsera.innerHTML = '<td>' + (i + 1) + '</td>\
		        	<td>' + data[i].goods_name+'</td>\
					<td>' + data[i].goods_color + '</td>\
					<td>' + data[i].username + '</td>\
					<td>' + data[i].phone + '</td>\
					<td>' + data[i].goods_card + '</td>';
					chserac.innerHTML='<tr>\
					<td colspan="8">\
					<div class="anniu-center">\
						<div class="anniu fl">\
								<span>匹配SKU</span>\
								<span>暂不做</span>\
								<span>不符合</span>\
						</div>\
						<div class="anniu_hu fr">\
								<span>订单详情</span>\
						</div>\
					</div>\
					</td>\
					</tr>'
					tbody[0].appendChild(chsera);
					tbody[0].appendChild(chserac);
				};

			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}

function daixias() {
	var main_center = document.getElementById("main-center")
	main_center.innerHTML = '<ul id="nav_top" class="tabsd flex-wrap">\
			<li data_type="daixiadan1" class="flex-con active">待下单</li>\
			<li data_type="daixiadan2" class="flex-con">已下单未发货</li>\
		</ul>';
	daixiadanl();
	var nav_top= document.getElementById("nav_top");
	var tab_li = nav_top.getElementsByTagName("li");
	for (var i = 0; i < tab_li.length; i++) {
		! function(i) {
			tab_li[i].onclick = function() {
				eventdd(i, this.getAttribute("data_type"));
			}
		}(i)
	}
};

function eventdd(index,data_type){
	var nav_top= document.getElementById("nav_top");
	var tab_li = nav_top.getElementsByTagName("li");
	for (var i = 0; i < tab_li.length; i++) {
		tab_li[i].classList.remove("active");
	}
	tab_li[index].classList.add("active");
	switch (data_type) {
		case "daixiadan1":
			daixiadanl();
			break;
		case "daixiadan2":
			daixiadanlsd();
			break;
		case "yixiadan1":
			yixiadannav1();
			break;
		case "yixiadan2":
			yixiadannav2();
			break;
		default:
			alert('case都不是的执行');
	}
}



function daixiadanl() {
	var tabgy = document.getElementById("main-center");
	var tabgys = tabgy.getElementsByTagName("table");
	var urls="https://item.taobao.com/item.htm?id"
	if(tabgys.length){
		tabgys[0].parentNode.removeChild(tabgys[0]);
	}
	var dege = ["序号", "下单时间", "订单状态", "服务项目", "服务地址", "客户姓名","客户电话","订单编号"]
	var request = new XMLHttpRequest();
	request.open("GET", "http://m.weibaishi.com/Admin/Aingdan/t_list", true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				var data = JSON.parse(request.responseText);
				var main_center = document.getElementById("main-center");
				var table=document.createElement("table");
				table.setAttribute("cellspacing","0")
				table.setAttribute("cellpadding","0")
				table.className="table";
				//class="table" cellspacing="0" cellpadding="0"
				table.innerHTML='<thead></thead>\
		            <tbody></tbody>';
				main_center.appendChild(table);
				var thead = main_center.getElementsByTagName('thead');
				var chser = document.createElement("tr");
				thead[0].appendChild(chser);
				var tbody = main_center.getElementsByTagName('tbody');
				for (var i = 0; i < dege.length; i++) {
					var chsers = document.createElement("th");
					chsers.innerHTML = dege[i];
					chser.appendChild(chsers);
					//console.log(dege[i])
				};
				for (var i = 0; i < data.length; i++) {
					//console.log(data[i])
					var chsera = document.createElement("tr");
					var chserac = document.createElement("tr");
					chsera.innerHTML = '<td>' + (i + 1) + '</td>\
		        	<td>' + data[i].revise_time+'</td>\
					<td>' + data[i].order_state + '</td>\
					<td>' + data[i].goods_number + '</td>\
					<td>' + data[i].address + '</td>\
					<td>' + data[i].username + '</td>\
					<td>' + data[i].phone + '</td>\
					<td>' + data[i].order_number + '</td>';
					chserac.innerHTML='<tr>\
					<td colspan="8">\
					<div class="anniu-center">\
						<div class="anniu fl">\
								<span onclick="xiadans('+data[i].p_id+',this)">下单</span>\
								<span>发送短信</span>\
								<span class="bijichu" onclick="bujidu('+data[i].p_id+',this)">笔记\
								<div style="display:none" class="tanbuks">\
									<div class="shuop">\
										<textarea data="4147" class="shubhg_pc" name="content" autocomplete="off" >'+data[i].beizhu+'</textarea>\
									</div>\
                                </div>\
								</span>\
								<span onclick="openxin(\'https://item.taobao.com/item.htm?id=\'+'+data[i].goods_card+')">查看商品</span>\
						</div>\
						<div class="anniu_hu fr">\
								<span onclick="xiangqo('+data[i].p_id+',this)">订单详情</span>\
						</div>\
					</div>\
					</td>\
					</tr>'
					tbody[0].appendChild(chsera);
					tbody[0].appendChild(chserac);
				};
				//console.log(data)
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}
function openxin(url){
	//console.log(_url)
	window.open(url);
}

function xiadans(data,_this){
	//console.log(pid)
	piajaxs("xiadans",data,_this);
}

function bujidu(pis,_this){
	var e = e || window.event;
	e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true;
	_this.children[0].style.display="block";
	var shugy=_this.children[0].getElementsByTagName("textarea")[0];
	shugy.addEventListener("change", function() {
		_this.children[0].style.display="none";
		//console.log(shugy.value)
		beizhu(pis,shugy.value);
	}, false);

	// if(!zgyanf){
		
	// }
	var zgyanf=true;
	var body=document.body;
	body.onclick = function() {
		if(zgyanf){
			_this.children[0].style.display="none";
			// console.log(zgyanf)
		}
		zgyanf=false;
	}

}

function beizhu(pia,value) {
	var request = new XMLHttpRequest();
	request.open("POST", "http://m.weibaishi.com/Admin/Aingdan/beizhu");
	var data = "p_id="+pia+"&beizhu="+value;
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				var data = JSON.parse(request.responseText);
				//console.log(data)
				//xiangqx(data,pia,_this);
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}

function daixiadanlsd() {
	var tabgy = document.getElementById("main-center");
	var tabgys = tabgy.getElementsByTagName("table");
	if(tabgys.length){
		tabgys[0].parentNode.removeChild(tabgys[0]);
	}
	var dege = ["序号", "下单时间", "订单状态", "服务项目", "服务地址", "客户姓名","客户电话","订单编号"]
	var request = new XMLHttpRequest();
	request.open("GET", "http://m.weibaishi.com/Admin/Aingdan/g_list", true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				var data = JSON.parse(request.responseText);
				var main_center = document.getElementById("main-center");
				var table=document.createElement("table");
				table.setAttribute("cellspacing","0")
				table.setAttribute("cellpadding","0")
				table.className="table";
				//class="table" cellspacing="0" cellpadding="0"
				table.innerHTML='<thead></thead>\
		            <tbody></tbody>';
				main_center.appendChild(table);
				var thead = main_center.getElementsByTagName('thead');
				var chser = document.createElement("tr");
				thead[0].appendChild(chser);
				var tbody = main_center.getElementsByTagName('tbody');
				for (var i = 0; i < dege.length; i++) {
					var chsers = document.createElement("th");
					chsers.innerHTML = dege[i];
					chser.appendChild(chsers);
					//console.log(dege[i])
				};
				for (var i = 0; i < data.length; i++) {
					var chsera = document.createElement("tr");
					var chserac = document.createElement("tr");
					chsera.innerHTML = '<td>' + (i + 1) + '</td>\
		        	<td>' + data[i].revise_time+'</td>\
					<td>' + data[i].order_state + '</td>\
					<td>' + data[i].goods_number + '</td>\
					<td>' + data[i].address + '</td>\
					<td>' + data[i].username + '</td>\
					<td>' + data[i].phone + '</td>\
					<td>' + data[i].order_number + '</td>';
					chserac.innerHTML='<tr>\
					<td colspan="8">\
					<div class="anniu-center">\
						<div class="anniu fl">\
								<span onclick="xiadans('+data[i].p_id+',this">取消</span>\
								<span onclick="openxin(\'https://item.taobao.com/item.htm?id=\'+'+data[i].goods_card+')">查看商品</span>\
						</div>\
						<div class="anniu_hu fr">\
								<span onclick="xiangqo('+data[i].p_id+',this)">订单详情</span>\
						</div>\
					</div>\
					</td>\
					</tr>'
					tbody[0].appendChild(chsera);
					tbody[0].appendChild(chserac);
				};
				//console.log(data)
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}




function yixiadanfn() {
	var main_center = document.getElementById("main-center")
	main_center.innerHTML = '<ul id="nav_top" class="tabsd flex-wrap">\
			<li data_type="yixiadan1" class="flex-con active">无物流单号</li>\
			<li data_type="yixiadan2" class="flex-con">有物流单号</li>\
		</ul>';
	yixiadannav1();
	var nav_top= document.getElementById("nav_top");
	var tab_li = nav_top.getElementsByTagName("li");
	for (var i = 0; i < tab_li.length; i++) {
		! function(i) {
			tab_li[i].onclick = function() {
				eventdd(i, this.getAttribute("data_type"));
			}
		}(i)
	}
};
function yixiadannav1() {
	var tabgy = document.getElementById("main-center");
	var tabgys = tabgy.getElementsByTagName("table");
	if(tabgys.length){
		tabgys[0].parentNode.removeChild(tabgys[0]);
	}
	var dege = ["序号", "下单时间", "订单状态", "服务项目", "服务地址", "客户姓名","客户电话","订单编号"]
	var request = new XMLHttpRequest();
	request.open("GET", "http://m.weibaishi.com/Admin/Aingdan/order", true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				var data = JSON.parse(request.responseText);
				var main_center = document.getElementById("main-center");
				var table=document.createElement("table");
				table.setAttribute("cellspacing","0")
				table.setAttribute("cellpadding","0")
				table.className="table";
				//class="table" cellspacing="0" cellpadding="0"
				table.innerHTML='<thead></thead>\
		            <tbody></tbody>';
				main_center.appendChild(table);
				var thead = main_center.getElementsByTagName('thead');
				var chser = document.createElement("tr");
				thead[0].appendChild(chser);
				var tbody = main_center.getElementsByTagName('tbody');
				for (var i = 0; i < dege.length; i++) {
					var chsers = document.createElement("th");
					chsers.innerHTML = dege[i];
					chser.appendChild(chsers);
					//console.log(dege[i])
				};
				for (var i = 0; i < data.length; i++) {
					var chsera = document.createElement("tr");
					var chserac = document.createElement("tr");
					chsera.innerHTML = '<td>' + (i + 1) + '</td>\
		        	<td>' + data[i].revise_time+'</td>\
					<td>' + data[i].order_state + '</td>\
					<td>' + data[i].goods_number + '</td>\
					<td>' + data[i].address + '</td>\
					<td>' + data[i].username + '</td>\
					<td>' + data[i].phone + '</td>\
					<td>' + data[i].order_number + '</td>';
					chserac.innerHTML='<tr>\
					<td colspan="8">\
					<div class="anniu-center">\
						<div class="anniu fl">\
								<span>填写单号</span>\
								<span onclick="openxin(\'https://item.taobao.com/item.htm?id=\'+'+data[i].goods_card+')">查看商品</span>\
								<span>取消订单</span>\
						</div>\
						<div class="anniu_hu fr">\
								<span onclick="xiangqo('+data[i].p_id+',this)">订单详情</span>\
						</div>\
					</div>\
					</td>\
					</tr>'
					tbody[0].appendChild(chsera);
					tbody[0].appendChild(chserac);
				};
				//console.log(data)
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}
function yixiadannav2() {
	var tabgy = document.getElementById("main-center");
	var tabgys = tabgy.getElementsByTagName("table");
	if(tabgys.length){
		tabgys[0].parentNode.removeChild(tabgys[0]);
	}
	var dege = ["序号", "下单时间", "订单状态", "服务项目", "服务地址", "客户姓名","客户电话","订单编号"]
	var request = new XMLHttpRequest();
	request.open("GET", "http://m.weibaishi.com/Admin/Aingdan/order1", true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				var data = JSON.parse(request.responseText);
				var main_center = document.getElementById("main-center");
				var table=document.createElement("table");
				table.setAttribute("cellspacing","0")
				table.setAttribute("cellpadding","0")
				table.className="table";
				//class="table" cellspacing="0" cellpadding="0"
				table.innerHTML='<thead></thead>\
		            <tbody></tbody>';
				main_center.appendChild(table);
				var thead = main_center.getElementsByTagName('thead');
				var chser = document.createElement("tr");
				thead[0].appendChild(chser);
				var tbody = main_center.getElementsByTagName('tbody');
				for (var i = 0; i < dege.length; i++) {
					var chsers = document.createElement("th");
					chsers.innerHTML = dege[i];
					chser.appendChild(chsers);
					//console.log(dege[i])
				};
				for (var i = 0; i < data.length; i++) {
					var chsera = document.createElement("tr");
					var chserac = document.createElement("tr");
					chsera.innerHTML = '<td>' + (i + 1) + '</td>\
		        	<td>' + data[i].revise_time+'</td>\
					<td>' + data[i].order_state + '</td>\
					<td>' + data[i].goods_number + '</td>\
					<td>' + data[i].address + '</td>\
					<td>' + data[i].username + '</td>\
					<td>' + data[i].phone + '</td>\
					<td>' + data[i].order_number + '</td>';
					chserac.innerHTML='<tr>\
					<td colspan="8">\
					<div class="anniu-center">\
						<div class="anniu fl">\
								<span>查看物流</span>\
								<span>取消订单</span>\
						</div>\
						<div class="anniu_hu fr">\
								<span onclick="xiangqo('+data[i].p_id+',this)">订单详情</span>\
						</div>\
					</div>\
					</td>\
					</tr>'
					tbody[0].appendChild(chsera);
					tbody[0].appendChild(chserac);
				};
				//console.log(data)
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}


var $r = (function() {
	var e = function(e) {
		var a = this,
			t = 0;
		for (t = 0; t < e.length; t++) {
			a[t] = e[t];
		}
		return a.length = e.length, this
	};
	e.prototype = {
		addClass: function(e) {
			if ("undefined" == typeof e) return this;
			for (var a = e.split(" "), t = 0; t < a.length; t++)
				for (var r = 0; r < this.length; r++) this[r].classList.add(a[t]);
			return this
		},
		each: function(e) {
			for (var a = 0; a < this.length; a++) e.call(this[a], a, this[a]);
			return this
		},
		html: function(e) {
			if ("undefined" == typeof e) return this[0] ? this[0].innerHTML : void 0;
			for (var a = 0; a < this.length; a++) this[a].innerHTML = e;
			return this
		},
		find: function(a) {
			for (var t = [], r = 0; r < this.length; r++)
				for (var i = this[r].querySelectorAll(a), s = 0; s < i.length; s++) t.push(i[s]);
			return new e(t)
		},
		append: function(a) {
			var t, r;
			for (t = 0; t < this.length; t++)
				if ("string" == typeof a) {
					var i = document.createElement("div");
					for (i.innerHTML = a; i.firstChild;) this[t].appendChild(i.firstChild)
				} else if (a instanceof e)
				for (r = 0; r < a.length; r++) this[t].appendChild(a[r]);
			else this[t].appendChild(a);
			return this
		},
	}
	var a = function(a, t) {
		var r = [],
			i = 0;
		if (a && !t && a instanceof e) {
			return a;
		}
		if (a) {
			if ("string" == typeof a) {
				var s, n, o = a.trim();
				if (o.indexOf("<") >= 0 && o.indexOf(">") >= 0) {
					var l = "div";
					for (0 === o.indexOf("<li") && (l = "ul"), 0 === o.indexOf("<tr") && (l = "tbody"), (0 === o.indexOf("<td") || 0 === o.indexOf("<th")) && (l = "tr"), 0 === o.indexOf("<tbody") && (l = "table"), 0 === o.indexOf("<option") && (l = "select"), n = document.createElement(l), n.innerHTML = a, i = 0; i < n.childNodes.length; i++) r.push(n.childNodes[i])
				} else
					for (s = t || "#" !== a[0] || a.match(/[ .<>:~]/) ? (t || document).querySelectorAll(a) : [document.getElementById(a.split("#")[1])], i = 0; i < s.length; i++) s[i] && r.push(s[i])
			} else if (a.nodeType || a === window || a === document) {
				r.push(a);
			} else if (a.length > 0 && a[0].nodeType) {
				for (i = 0; i < a.length; i++) {
					r.push(a[i]);
				}
			}
		}
		return new e(r)
	};
	return a;
}())