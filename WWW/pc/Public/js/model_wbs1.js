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
	$.fn.openModelType = function(parameter, getApi) {
		if (typeof parameter == 'function') { //重载
			getApi = parameter;
			parameter = {};
		} else {
			parameter = parameter || {};
			getApi = getApi || function() {};
		}
		var defaults = {
			dataUrl: 'http://weibaishi.com/admin/Eingdan/model_list', //数据库地址
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
            var zhuangtai=false;
			$.ajax({
				url: options.dataUrl,
				// data:{'p_id':datas},
				dataType: "json",
				type: 'get',
				success: function(data) {
					//console.log(data)
					var Html = '';
					//渲染dom
					Html += '<p class="title" id="city_title2">选择服务项目<span id="opskwo" class="fr">s</span></p>\
					<div class="minslis_box clearfix">\
						<div class="minslis types">\
							<a href="javascript:;">\
								<span>请选择安装类目...</span>\
								<div><b></b></div>\
							</a>\
						</div>\
						<div class="minslis brands">\
							<a href="javascript:;">\
								<span>请选择品牌...</span>\
								<div><b></b></div>\
							</a>\
						</div>\
						<div class="minslis models">\
							<a href="javascript:;">\
								<span>请选择机型...</span>\
								<div><b></b></div>\
							</a>\
						</div>\
						<div class="minslis sku">\
							<a href="javascript:;">\
								<span>请选择服务内容...</span>\
								<div><b></b></div>\
							</a>\
						</div>\
						</div>';
					$("#a2").html(Html);
					/*var $types = $(".types"),
						$brands = $(".brands"),
						$models = $(".models"),
						$sku = $(".sku");*/
					var $types = $this.find('.' + options.typesdEl),
		                $brands = $this.find('.' + options.brandsdEl),
		                $models = $this.find('.' + options.modelsdEl),
		                $sku=$this.find('.' + options.skudEl);

					var types, brands, models, sku;
					var updateData = function() {
						types = [], brands = [], models = [], sku = [];
						//获取类型types
						for (var i = 0; i < data.length; i++) {
							types[i] = data[i];
							if (options.types) {
								if (options.types == data[i].type_id) {
									if(!data[i].data.length){
										zhuangtai=false;
									}else{
										zhuangtai=true;
									}
									for (var j = 0; j < data[i].data.length; j++) {
										brands[j] = data[i].data[j];
										if (options.brands) {
											if (options.brands == data[i].data[j].brand_id) {
												if(!data[i].data[j].data.length){
													zhuangtai=false;
												}else{
													zhuangtai=true;
												}
												for (var c = 0; c < data[i].data[j].data.length; c++) {
													models[c] = data[i].data[j].data[c];
													if (options.models) {
														if (options.models == data[i].data[j].data[c].model_id) {
															if(!data[i].data[j].data[c].data.length){
																zhuangtai=false;
															}else{
																zhuangtai=true;
															}
															for (var d = 0; d < data[i].data[j].data[c].data.length; d++) {
																sku[d] = data[i].data[j].data[c].data[d];
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
						//console.log(sku)
					}
					var format = {
						types: function() {
							$types.empty();
							$types.append('<a href="javascript:;">\
										<span>请选择安装类目...</span>\
										<div><b></b></div>\
									</a>\
									<div class="chosen-drop">\
                                        <div class="chosen-search"><input type="text" autocomplete="off" tabindex="2"></div>\
										<ul class="chosen-results">\
										</ul>\
									</div>');
							for (var i in data) {
								$types.find("ul").append('<li class="active-result" data="' + data[i].type_id + '">' + data[i].type_name + '</li>');
							}

							if (options.types) {
								//console.log(types)
                                for (var i = 0; i < types.length; i++) {
									if(types[i].type_id==options.types){
										$types.find("span").text(types[i].type_name)
									}
								}
                                //$types.find("span").text(data[options.types])
                            }
							this.brands();
						},
						brands: function() {
							// brands
							$brands.empty();
							$brands.append('<a href="javascript:;">\
										<span>请选择品牌...</span>\
										<div><b></b></div>\
									</a>\
									<div class="chosen-drop">\
                                        <div class="chosen-search"><input type="text" autocomplete="off" tabindex="2"></div>\
										<ul class="chosen-results">\
										</ul>\
									</div>');
							for (var i = 0; i < brands.length; i++) {
								$brands.find("ul").append('<li class="active-result" data="' + brands[i].brand_id + '">' + brands[i].brand_name + '</li>');
							}
							if (options.brands) {
                                for (var i = 0; i < brands.length; i++) {
									if(brands[i].brand_id==options.brands){
										$brands.find("span").text(brands[i].brand_name)
									}
								}
                                //$types.find("span").text(data[options.types])
                            }
							this.models();
						},
						models: function() {
							$models.empty();
							$models.append('<a href="javascript:;">\
										<span>请选择机型...</span>\
										<div><b></b></div>\
									</a>\
									<div class="chosen-drop">\
                                        <div class="chosen-search"><input type="text" autocomplete="off" tabindex="2"></div>\
										<ul class="chosen-results">\
										</ul>\
									</div>');
							for (var i = 0; i < models.length; i++) {
								$models.find("ul").append('<li class="active-result" data="' + models[i].model_id + '">' + models[i].model_name + '</li>');
							}
							if (options.models) {
                                for (var i = 0; i < models.length; i++) {
									if(models[i].model_id==options.models){
										$models.find("span").text(models[i].model_name)
									}
								}
                                //$types.find("span").text(data[options.types])
                            }
							this.sku();
						},
						sku: function() {
							$sku.empty();
							$sku.append('<a href="javascript:;">\
										<span style="margin-right: 95px;">请选择服务内容...</span>\
										<div><b></b></div>\
									</a>\
									<div class="chosen-drop">\
                                        <div class="chosen-search"><input type="text" autocomplete="off" tabindex="2"></div>\
										<ul class="chosen-results">\
										</ul>\
									</div>');
							// console.log(options.models)
							for (var i = 0; i < sku.length; i++) {
								$sku.find("ul").append('<li class="active-result" data="' + sku[i].sku_id + '">' + sku[i].sku_name + '<i>￥' + sku[i].sku_money + '</i></li>');
							}
							if (options.sku) {
                                for (var i = 0; i < sku.length; i++) {
									if(sku[i].sku_id==options.sku){
										$sku.find("span").html('' + sku[i].sku_name + '<i>￥' + sku[i].sku_money + '</i>')
									}
								}
                                //$types.find("span").text(data[options.types])
                            }
						}
					};

					//获取当前状态信息
					_api.getInfo = function() {
						var status = {
							types: (function() {
								var data;
								for (var i = 0; i < types.length; i++) {
									if (options.types) {
										if (options.types == types[i].type_id) {
											data = types[i].type_name;
										}
									}
								}
								return data;
							})() || '',
							brands: (function() {
								var data;
								for (var i = 0; i < brands.length; i++) {
									if (options.brands) {
										if (options.brands == brands[i].brand_id) {
											data = brands[i].brand_name;
										}
									}
								}
								return data;
							})() || '',
							models: (function() {
								var data;
								for (var i = 0; i < models.length; i++) {
									if (options.models) {
										if (options.models == models[i].model_id) {
											data = models[i].model_name;
										}
									}
								}
								return data;
							})() || '',
							sku: (function() {
								var data;
								for (var i = 0; i < sku.length; i++) {
									if (options.sku) {
										if (options.sku == sku[i].sku_id) {
											data = sku[i].sku_name;
										}
									}
								}
								return data;
							})() || '',
							sku_money: (function() {
								var data;
								for (var i = 0; i < sku.length; i++) {
									if (options.sku) {
										if (options.sku == sku[i].sku_id) {
											data = sku[i].sku_money;
										}
									}
								}
								return data;
							})() || '',
							sku_id: (function() {
								var data;
								for (var i = 0; i < sku.length; i++) {
									if (options.sku) {
										if (options.sku == sku[i].sku_id) {
											data = sku[i].sku_id;
										}
									}
								}
								return data;
							})() || '',
							zhuangtai:zhuangtai
							/*brands: data[options.brands] || '',
							models: data[options.models] || '',*/
							//codeid: options.area || options.city || options.province
						};
						return status;
					};



					//事件绑定tyoe
					$types.on('click', 'a', function(event) {
						if ($types.hasClass('chosen-with-drop')) {
							$types.removeClass('chosen-with-drop');
						} else {
							$types.addClass('chosen-with-drop');

						}
						$types.find('input').focus();
						$types.siblings().removeClass('chosen-with-drop');
						event.stopPropagation();
					})
					$types.on('click','input',function(event){
                        event.stopPropagation();
                    })

					$types.on('keyup','input',function(event){
                        $types.find("ul").empty();
                        var text=$(this).val();
                        var huang=false;
                        //var k=new RegExp('\['+text+'\]','g');
                        var k=new RegExp(text,'ig');
                        for (var i=0;i<types.length;i++) {
                            if(k.test(types[i].type_name)){
                                huang=true;
                                $types.find("ul").append('<li class="active-result" data="'+types[i].type_id+'">' + types[i].type_name + '</li>');
                            }
                        }
                        if(!huang){
                            $types.find("ul").html('<div class="active-result">查询的内容不存在,<span>"'+text+'"</span></div>');
                        }
                        event.stopPropagation();
                    })


					$types.on('click', 'li', function() {
						if ($types.hasClass('chosen-with-drop')) {
							$types.removeClass('chosen-with-drop');
						} else {
							$types.addClass('chosen-with-drop');
						}
						options.types = $(this).attr("data");
						$types.find("span").text($(this).text());
						options.brands = 0;
						options.models = 0;
						options.sku = 0;
						updateData();
						format.brands();
						options.onChange(_api.getInfo());
							//options.onChange(_api.getInfo());
					})



					//事件绑定brands
					$brands.on('click', 'a', function(event) {
						if ($brands.hasClass('chosen-with-drop')) {
							$brands.removeClass('chosen-with-drop');
						} else {
							$brands.addClass('chosen-with-drop');

						}
						$brands.find('input').focus();
						$brands.siblings().removeClass('chosen-with-drop');
						event.stopPropagation();
					})
					$brands.on('click','input',function(event){
                        event.stopPropagation();
                    })

                    $brands.on('keyup','input',function(event){
                        $brands.find("ul").empty();
                        var text=$(this).val();
                        var huang=false;
                        //var k=new RegExp('\['+text+'\]','g');
                        var k=new RegExp(text,'ig');
                        for (var i=0;i<brands.length;i++) {
                            if(k.test(brands[i].brand_name)){
                                huang=true;
                                $brands.find("ul").append('<li class="active-result" data="'+brands[i].brand_id+'">' + brands[i].brand_name + '</li>');
                            }
                        }
                        if(!huang){
                            $brands.find("ul").html('<div class="active-result">查询的内容不存在,<span>"'+text+'"</span></div>');
                        }
                        event.stopPropagation();
                    })

					$brands.on('click', 'li', function() {
						if ($brands.hasClass('chosen-with-drop')) {
							$brands.removeClass('chosen-with-drop');
						} else {
							$brands.addClass('chosen-with-drop');
						}
						options.brands = $(this).attr("data");
						$brands.find("span").text($(this).text());
						options.models = 0;
						options.sku = 0;
						updateData();
						format.models();
						options.onChange(_api.getInfo());
							//options.onChange(_api.getInfo());
					})


					//事件绑定models
					$models.on('click', 'a', function(event) {
						if ($models.hasClass('chosen-with-drop')) {
							$models.removeClass('chosen-with-drop');
						} else {
							$models.addClass('chosen-with-drop');

						}
						$models.find('input').focus();
						$models.siblings().removeClass('chosen-with-drop');
						event.stopPropagation();
					})
					$models.on('click','input',function(event){
                        event.stopPropagation();
                    })

					$models.on('keyup','input',function(event){
                        $models.find("ul").empty();
                        var text=$(this).val();
                        var huang=false;
                        //var k=new RegExp('\['+text+'\]','g');
                        var k=new RegExp(text,'ig');
                        for (var i=0;i<models.length;i++) {
                            if(k.test(models[i].model_name)){
                                huang=true;
                                $models.find("ul").append('<li class="active-result" data="'+models[i].model_id+'">' + models[i].model_name + '</li>');
                            }
                        }
                        if(!huang){
                            $models.find("ul").html('<div class="active-result">查询的内容不存在,<span>"'+text+'"</span></div>');
                        }
                        event.stopPropagation();
                    })

					$models.on('click', 'li', function() {
						if ($models.hasClass('chosen-with-drop')) {
							$models.removeClass('chosen-with-drop');
						} else {
							$models.addClass('chosen-with-drop');
						}
						options.models = $(this).attr("data");
						$models.find("span").text($(this).text());
						options.sku = 0;
						updateData();
						format.sku();
						options.onChange(_api.getInfo());
							/*format.models();*/
							//options.onChange(_api.getInfo());
					})


					//事件绑定models
					$sku.on('click', 'a', function(event) {
						if ($sku.hasClass('chosen-with-drop')) {
							$sku.removeClass('chosen-with-drop');
						} else {
							$sku.addClass('chosen-with-drop');

						}
						$sku.find('input').focus();
						$sku.siblings().removeClass('chosen-with-drop');
						event.stopPropagation();
					})
					$sku.on('click','input',function(event){
                        event.stopPropagation();
                    })

					$sku.on('keyup','input',function(event){
                        $sku.find("ul").empty();
                        var text=$(this).val();
                        var huang=false;
                        //var k=new RegExp('\['+text+'\]','g');
                        var k=new RegExp(text,'ig');
                        for (var i=0;i<sku.length;i++) {
                            if(k.test(sku[i].sku_name)){
                                huang=true;
                                $sku.find("ul").append('<li class="active-result" data="' + sku[i].sku_id + '">' + sku[i].sku_name + '<i>￥' + sku[i].sku_money + '</i></li>');
                            }
                        }
                        if(!huang){
                            $sku.find("ul").html('<div class="active-result">查询的内容不存在,<span>"'+text+'"</span></div>');
                        }
                        event.stopPropagation();
                    })

					$sku.on('click', 'li', function() {
						if ($sku.hasClass('chosen-with-drop')) {
							$sku.removeClass('chosen-with-drop');
						} else {
							$sku.addClass('chosen-with-drop');
						}
						options.sku = $(this).attr("data");
						$sku.find("span").html($(this).html());
						options.onChange(_api.getInfo());
							/*format.models();*/
							//options.onChange(_api.getInfo());
					})



                    $('body').on('click',function(){
                    	if ($types.hasClass('chosen-with-drop')) {
							$types.removeClass('chosen-with-drop');
						}
						if ($brands.hasClass('chosen-with-drop')) {
							$brands.removeClass('chosen-with-drop');
						}
						if ($models.hasClass('chosen-with-drop')) {
							$models.removeClass('chosen-with-drop');
						}
                        updateData();
                        format.types();
                        //console.log(1,options.province,2,options.city,3,options.area)

                    })

/*types
brands
models
sku*/

					//初始化
					updateData();
					//options   types
					format.types();
					//getApi(_api);
				}
			});


		})
	};
}));