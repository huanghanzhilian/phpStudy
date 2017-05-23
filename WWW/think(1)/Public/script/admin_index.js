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
	console.log(_this)
	
	switch (_this) {
		case "chuli":
			var dege=["序号","货品名称","颜色","客户姓名","客户电话","订单编号"]
			cureds("index.php/home/index/xuchuli",dege);
			break;
		case "daixia":
			cureds("index.php/home/index/t_list")
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

function cureds(url,dege){
	var request = new XMLHttpRequest();
	request.open("GET",url, true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			if (request.status === 200) {
				var data = JSON.parse(request.responseText);
				var main_center=document.getElementById("main-center")
				main_center.innerHTML = '<table  class="table" cellspacing="0" cellpadding="0">\
		            <thead></thead>\
		            <tbody></tbody>\
		        </table>';
		        var thead=document.getElementsByTagName('thead');
		        var chser=document.createElement("tr");
		        thead[0].appendChild(chser);
		        var tbody=document.getElementsByTagName('tbody');
		        for (var i = 0; i < dege.length; i++) {
		        	var chsers=document.createElement("th");
		        	chsers.innerHTML=dege[i];
		        	chser.appendChild(chsers);
		        	//console.log(dege[i])
		        };
		        for (var i = 0; i < data.length; i++) {
		        	var chsera=document.createElement("tr");
		        	chsera.innerHTML='<td>'+(i+1)+'</td><td>'+data[i].goods_name+'</td><td>'+data[i].goods_color+'</td><td>'+data[i].username+'</td><td>'+data[i].phone+'</td><td>'+data[i].goods_card+'</td>'
		        	tbody[0].appendChild(chsera);
		        	//var chsersas=document.createElement("td");
		        	//chsersas.innerHTML="1"//data[i].goods_name;
		        	//chsera.appendChild(chsersas);
		        	//data[i].goods_name
		        	console.log(i)
		        };
				console.log(data)
			} else {
				alert("发生错误：" + request.status);
			}
		}
	}
}


