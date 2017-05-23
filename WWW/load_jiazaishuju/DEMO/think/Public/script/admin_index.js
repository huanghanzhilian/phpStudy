window.onload = function() {
	tab();
}

function tab() {
	var tab = document.getElementById("tabs");
	var tab_li = tab.getElementsByTagName("li");
	for (var i = 0; i < tab_li.length; i++) {
		! function(i) {
			tab_li[i].onclick = function() {
				event(i, this.getAttribute("data_type"));
			}
		}(i)
	}
}

function event(index, _this) {
	var tab = document.getElementById("tabs");
	var tab_li = tab.getElementsByTagName("li");
	for (var i = 0; i < tab_li.length; i++) {
		tab_li[i].className = "";
	}
	tab_li[index].className = "active";
	//console.log(_this)

	switch (_this) {
		case "chuli":
			var dege = ["序号", "货品名称", "颜色", "客户姓名", "客户电话", "订单编号"]
			cureds("index.php/home/index/xuchuli", dege);
			break;
		case "daixia":
			//var dege=["序号","下单时间","颜色","客户姓名","客户电话","订单编号"]
			//cureds("index.php/home/index/t_list")
			daixias();
			break;
		case "quanbhu":
			cureds("index.php/home/index/quanbu")
			break;
		case "yixia":
			cureds("http://www.huanghanlian.com/data_location/list.json")
			break;
		case "daijie":
			cureds("http://www.huanghanlian.com/data_location/list.json")
			break;
		case "quanbu2":
			cureds("http://www.huanghanlian.com/data_location/list.json")
			break;
		default:
			alert('case都不是的执行');
	}

}

function cureds(url, dege) {
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
					chsera.innerHTML = '<td>' + (i + 1) + '</td>\
		        	<td>' + data[i].goods_name + '\
		        		<div class="anniu">\
							<span>匹配SKU</span>\
							<span>匹配SKU</span>\
							<span>匹配SKU</span>\
						</div>\
					</td>\
					<td>' + data[i].goods_color + '</td>\
					<td>' + data[i].username + '</td>\
					<td>' + data[i].phone + '</td>\
					<td>' + data[i].goods_card + '\
						<div class="xianghu">\
                        	<span class="fr">订单详情</span>\
                        </div>\
					</td>'
					tbody[0].appendChild(chsera);
				};
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}

function daixias() {
	var main_center = document.getElementById("main-center")
	main_center.innerHTML = '<ul class="tabsd flex-wrap">\
			<li class="flex-con active">待下单</li>\
			<li class="flex-con">已下单未发货</li>\
		</ul>';
	daixiadanl();
}

function daixiadanl() {
	var dege = ["序号", "下单时间", "订单状态", "服务项目", "服务地址", "客户姓名","客户电话","订单编号"]
	var request = new XMLHttpRequest();
	request.open("GET", "index.php/home/index/t_list", true);
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
					chsera.innerHTML = '<td>' + (i + 1) + '</td>\
		        	<td>' + data[i].revise_time+'</td>\
					<td>' + data[i].order_state + '</td>\
					<td>' + data[i].goods_number + '</td>\
					<td>' + data[i].address + '</td>\
					<td>' + data[i].username + '</td>\
					<td>' + data[i].username + '</td>'
					tbody[0].appendChild(chsera);
				};
				console.log(data)
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}