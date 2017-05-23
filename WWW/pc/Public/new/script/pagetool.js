/**
 * Copyright 2014, zhihong Ye
 * Date: 2014-09-29
 * Version:1.0
 */
/**
 * 分页工具
 * @param total
 * @param pageSize
 * @param totalPage
 * @returns
 */
function Pageglobal(data,pama,view_id,pagecount){
	/**
	 * 当前页码
	 */
	this.curPage = 0;
	/**
	 * 数据
	 */
	this.data = eval(data);
	/**
	 * 总记录数
	 */
	this.total = this.data.length;
	/**
	 * 每页显示数
	 */
	this.pageSize = 10;
	/**
	 * 总页数
	 */
	this.totalPage = Math.ceil(this.total/this.pageSize);
	/**
	 * 数据列集合 - 显示顺序列，按顺序
	 */
	this.pama = pama;
	/**
	 * 显示数据的id
	 */
	this.view_id = view_id||"listTable";
	/**
	 * 页码显示区id
	 */
	this.pagecount = pagecount||"pagecount";
}
Pageglobal.prototype={//添加方法
	setData: function(data){
		this.data = data;
	},
	getData: function(){
		return this.data;
	},
	getTotal: function(){
		return this.total;
	},
	getPageSize: function(){
		return this.pageSize;
	},
	getTotalPage: function(){
		return this.totalPage;
	},
	getCurPage: function(){
		return this.curPage;
	},
	setCurPage: function(curPage){
		this.curPage = curPage;
	},
	setTotalPage: function(totalPage){
		this.totalPage = totalPage;
	},
	setTotal: function(total){
		this.total = total;
	},
	setPageSize: function(pageSize){
		this.pageSize = pageSize;
	},
	setPama: function(name, value){
		this.pama[name] = value;
	},
	setTableData : function(page){
		this.curPage = page;
		var view_cur;
		//每页显示数大于大于总数view_cur等于总数  否则等于10
		if(this.pageSize > this.total){
			view_cur = this.total;
		}else{
			view_cur = this.pageSize;
		}
		var j = 0;
		//begin_cur等于参数减去1乘以10
		var begin_cur = (page-1)*this.pageSize;//开始数据
		var i = 0;
		//获取tbody id
		var main_center = document.getElementById(this.view_id);
		var dege = ["序号", "下单时间", "订单状态", "SKU", "服务地址", "旗标","客户姓名","客户电话","卖家名称","订单编号","商品ID"]
		while (main_center.hasChildNodes()) {main_center.removeChild(main_center.lastChild);}//清空

		main_center.innerHTML = '<table style="width:150%"  class="table table2" cellspacing="0" cellpadding="0">\
		            <thead></thead>\
		            <tbody></tbody>\
		        </table>';
		var thead = main_center.getElementsByTagName('thead');
		var chser = document.createElement("tr");
		thead[0].appendChild(chser);
		var tbody = main_center.getElementsByTagName('tbody')[0];
		for (var v = 0; v < dege.length; v++) {
			var chsers = document.createElement("th");
			chsers.innerHTML = dege[v];
			chser.appendChild(chsers);
		};

		while(i < view_cur){
			var tr=document.createElement("tr");
			tr.id=++j;
			var inti=begin_cur+i;
			//tr.innerHTML='<td>' + this.data[inti].username + '</td>';
			if(inti<this.total){
				tr.innerHTML = '<td>' + (inti + 1) + '</td>\
	        	<td width="136">' + this.data[inti].order_time+'</td>\
				<td width="124" class="zhunghf" data='+this.data[inti].ztt +'>' + this.data[inti].ztt + '</td>\
				<td width="318">' + this.data[inti].goods_name+'<span class="skuvc fr" data='+this.data[inti].ztt +'></span></td>\
				<td width="300">' + this.data[inti].address + '<span class="skuvcre fr" data='+this.data[inti].dizhizt +'></span></td>\
				<td width="200">' + this.data[inti].qibiao + '</td>\
				<td width="200">' + this.data[inti].username + '</td>\
				<td width="200">' + this.data[inti].phone + '</td>\
				<td width="200">' + this.data[inti].shop_card +'</td>\
				<td width="200">' + this.data[inti].order_number +'</td>\
				<td width="200">' + this.data[inti].goods_card +'</td>';
			}
			i++;
			tbody.appendChild (tr);

			$r(".skuvcre").each(function(i, n) {
				switch (n.getAttribute("data")) {
					case "1":
						n.classList.add("fuhe");
						n.innerHTML = "√";
						break;
					case "2":
						n.classList.add("bufuhe");
						n.innerHTML = "×";
						break;
						//default:
						//alert('case都不是的执行');
				}
			})
			$r(".zhunghf").each(function(i, n) {
				switch (n.getAttribute("data")) {
					case "0":
						n.innerHTML = "条件不足";
						break;
					case "1":
						n.innerHTML = "已下单";
						break;
					case "2":
						n.innerHTML = "已下单已发货";
						break;
					case "5":
						n.innerHTML = "等待下单";
						break;
						//default:
						//alert('case都不是的执行');
				}
			})
			$r(".skuvc").each(function(i, n) {
				//console.log(n.getAttribute("data"))
				switch (n.getAttribute("data")) {
					case "0":
						n.classList.add("bufuhe");
						n.innerHTML = "不符";
						break;
					case "1":
						n.classList.add("fuhe");
						n.innerHTML = "符合";
						break;
					case "2":
						n.classList.add("fuhe");
						n.innerHTML = "符合";
						break;
					case "3":
						n.classList.add("bufuhe");
						n.innerHTML = "不符";
						break;
					case "4":
						n.classList.add("bufuhe");
						n.innerHTML = "不符";
						break;
					case "5":
						n.classList.add("fuhe");
						n.innerHTML = "符合";
						break;
						//default:
						//alert('case都不是的执行');
				}
			})


		}
		this.setTablePageStr();
	},
	/**
	 * 添加方法,获取显示表单
	 */
	getPageData : function(page){
		//var data=[{name:"a",age:12},{name:"b",age:11},{name:"c",age:13},{name:"d",age:14}];  
		this.curPage = page;
		var str="";
		var begin_cur = (page-1)*this.pageSize;//开始数据
		//for(var o in this.data){//o和s得到的是序号而已可以用data[o].name/data[o]["name"]得到name对应的value
		var i = 0;
		var view_cur;
		if(this.pageSize > this.total){
			view_cur = this.total;
		}else{
			view_cur = this.pageSize;
		}
		while(i < view_cur){
			str +="<tr>";
			for(var s in this.pama){
				//alert(begin_cur+i+"-"+this.pama[s]);
				str += "<td>"+this.data[begin_cur+i][this.pama[s]]+"</td>";
			}
			i++;
			str += "</tr>";
		}
		//}
		return str;
	},
	/**
	 * 获取分页脚本
	 */
	setTablePageStr : function(){
		var pageStr = "";
		//页码大于最大页数 
	    if(this.curPage>this.totalPage&&this.totalPage>0) this.curPage = this.totalPage; 
	    //页码小于1
	    if(this.curPage<1&&this.total>0) this.curPage=1;
	    pageStr = "<span>共"+this.total+"条</span><span>"+this.curPage +"/"+this.totalPage+"</span>"; 
	    //如果是第一页 
	    if(this.curPage<=1){
	        pageStr += "<span>首页</span><span>上一页</span>"; 
	    }else{ 
	        pageStr += "<span><a href='javascript:setTableData(1)'>首页</a></span><span><a href='javascript:setTableData("+(parseInt(this.curPage)-1)+")' >上一页</a></span>"; 
	    }
	    //如果是最后页 
	    if(this.curPage>=this.totalPage){
	        pageStr += "<span>下一页</span><span>尾页</span>"; 
	    }else{ 
	        pageStr += "<span><a href='javascript:setTableData("+(parseInt(this.curPage)+1)+")'>下一页</a>"+
	        "</span><span><a href='javascript:setTableData("+this.totalPage+")'>尾页</a></span>"; 
	    }
	    
	    var pagecountObj = document.getElementById(this.pagecount);
		pagecountObj.innerHTML=pageStr;
	},
	getPama: function(name){
		return this.pama[name];
	},
	init: function(){
		if(this.totalPage){
			this.curPage = 1;
		}
		this.setTablePageStr();
		//var viewObj = document.getElementById(this.view_id);
		this.setTableData(this.curPage);
	}
};