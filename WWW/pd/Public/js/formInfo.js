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
	$.fn.formInfo = function(parameter, getApi) {
		if (typeof parameter == 'function') { //重载
			getApi = parameter;
			parameter = {};
		} else {
			parameter = parameter || {};
			getApi = getApi || function() {};
		}
		var defaults = {
			onChange: function() {} //切换时触发,回调函数传入选择数据
		};
		var options = $.extend({}, defaults, parameter);
		return this.each(function() {
			//对象定义
            var _api = {};
            var $this = $(this);
			var Html = '';
				//渲染dom
				Html += '<p class="title" id="city_title3">客户联系方式</p>\
				<div class="minslis_box clearfix">\
					<div class="row">\
						<label class="bqf">客户姓名:</label>\
						<input type="text" class="txt tips" id="username" placeholder="客户姓名" autocomplete="off">\
						<p class="msg"></p>\
					</div>\
					<div class="row">\
						<label class="bqf">客户电话:</label>\
						<input type="text" class="txt tips" id="tel" placeholder="客户联系电话" autocomplete="off">\
						<p class="msg"></p>\
					</div>\
					<div class="row">\
						<label class="bqf">服务地址:</label>\
						<span class="skalo">'+opsuyw+'</span>\
						<input style="width:280px" type="text" class="txt tips" id="songau" placeholder="请填写详细地址(街道门牌号)" autocomplete="off">\
						<p class="msg on"></p>\
					</div>\
				</div>';
			$this.html(Html);
			var $username = $this.find("#username"),
                $tel = $this.find("#tel"),
                $songau = $this.find("#songau")
            //获取当前状态信息
			_api.getInfo = function() {
				var status = {
					username: $username.val() || '',
					tel: $tel.val() || '',
					songau: $songau.val() || '',
				};
				return status;
			}
            //事件
            //用户名聚焦focus
            $username.on('blur',function(){
            	var parer=$(this).parents(".row");
            	if($(this).val()==""){
            		parer.find(".msg").show().html('<i class="cwe"></i>用户名不能为空');
            	}else{
            		parer.find(".msg").html('<i class="zqsw"></i>输入正确');
            	}
            })
            $username.on('keyup',function(){
            	options.onChange(_api.getInfo());
            })
			$tel.on('keyup',function(){
				var mobile_1 = /^0{0,1}(14[0-9]|17[0-9]|13[0-9]|15[0-9]|18[0-9]|14[0-9])[0-9]{8}$/;
				var parer=$(this).parents(".row");
				if(mobile_1.test($(this).val())){
					parer.find(".msg").html('<i class="zqsw"></i>输入正确');
				}
				options.onChange(_api.getInfo());
			})
			$tel.on("blur",function(){
				var mobile_1 = /^0{0,1}(14[0-9]|17[0-9]|13[0-9]|15[0-9]|18[0-9]|14[0-9])[0-9]{8}$/;
				var parer=$(this).parents(".row");
				if($(this).val()==""){
					parer.find(".msg").show().html('<i class="cwe"></i>客户电话不能为空');
				}else if(!mobile_1.test($(this).val())){
					parer.find(".msg").show().html('<i class="cwe"></i>客户电话有误');
				}else{
					parer.find(".msg").html('<i class="zqsw"></i>输入正确');
				}
			})

			$songau.on('keyup',function(){
				options.onChange(_api.getInfo());
			})
			$songau.on('blur',function(){
				var parer=$(this).parents(".row");
            	if($(this).val()==""){
            		parer.find(".msg").show().html('<i class="cwe"></i>服务地址不能为空');
            	}else{
            		parer.find(".msg").html('<i class="zqsw"></i>输入正确');
            	}
				jsuwo=opsuyw+' '+$(this).val();
				//opsuyw+=$(this).val();
				//再次获取经纬度
            	geocoder(jsuwo)
			})
		})
	};
}));