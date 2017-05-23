(function(factory) {
	if (typeof define === "function" && (define.amd || define.cmd) && !jQuery) {
		// AMD或CMD
		define(["jquery"], factory);
	} else if (typeof module === 'object' && module.exports) {
		// Node/CommonJS
		module.exports = function(root, jQuery) {
			if (jQuery === undefined) {
				if (typeof window !== 'undefined') {
					jQuery = require('jquery');
				} else {
					jQuery = require('jquery')(root);
				}
			}
			factory(jQuery);
			return jQuery;
		};
	} else {
		//Browser globals
		factory(jQuery);
	}
}(function($) {
	$.support.cors = true;
	$.fn.orderStatus = function(parameter, getApi) {
		if (typeof parameter == 'function') { //重载
			getApi = parameter;
			parameter = {};
		} else {
			parameter = parameter || {};
			getApi = getApi || function() {};
		}
		var defaults = {
			dataUrl: 'http://weibaishi.com/home/Index/model_list', //数据库地址
			typesdEl: 'types', //服务类目字段名
			brandsdEl: 'brands', //服务品牌字段名
			modelsdEl: 'models', //服务机型字段名
			skudEl: 'sku', //服务内容字段名
			types: 0, //服务类目
			brands: 0, //服务品牌
			models: 0, //服务机型
			sku: 0, //服务内容
			onChange: function() {} //切换时触发,回调函数传入选择数据
		};
		var options = $.extend({}, defaults, parameter);
		return this.each(function() {
			//对象定义
            var _api = {};
            var $this = $(this);
			var Html = '';
				//渲染dom
				Html += '<p class="title" id="city_title3">订单是否已经签收</p>\
				<div class="minslis_box clearfix">\
					<div class="tabsuo clearfix">\
						<div class="fl on" id="also1">订单尚未签收</div>\
						<div class="fl" id="also2">订单已签收</div>\
					</div>\
					<div class="row" id="shuakl">\
						<label class="bqf">物流单号:</label>\
						<input type="text" class="txt tips" id="wuliu" placeholder="请填写订单物流单号" autocomplete="off">\
					</div>\
				</div>';
			$this.html(Html);
			var $also1 = $this.find("#also1"),
                $also2 = $this.find("#also2"),
                $shuakl=$this.find("#shuakl");
               	//$tabsuodiv = $this.find("#songau")
            //获取当前状态信息
			_api.getInfo = function(num) {
				var status = num || '';
				return status;
			}
			function dksjp(num){
				if(num==1){
					$shuakl.show();
					options.onChange(_api.getInfo(2));
				}else{
					$shuakl.hide();
					options.onChange(_api.getInfo(1));
				}
			}
            //事件
            $also1.on('click',function(){
            	$(this).addClass("on").siblings().removeClass("on");
            	dksjp(1)
            	//options.onChange(_api.getInfo());
            })
			$also2.on('click',function(){
				$(this).addClass("on").siblings().removeClass("on");
				dksjp(2)
            	//options.onChange(_api.getInfo());
            })
            $also1.click();

		})
	};
}));