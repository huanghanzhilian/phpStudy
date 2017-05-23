
function openModelType(){
	$.ajax({
		url: "http://weibaishi.com/home/Index/model_list",
		// data:{'p_id':datas},
		dataType: "json",
		type: 'get',
		success: function(data) {
			var options={
				"types":0,
				"brands":0,
				"models":0,
				"sku":0
			}
			var Html = '';
			//渲染dom
			Html+='<p class="title" id="city_title">选择服务项目</p>\
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
			var $types = $(".types"),
                $brands = $(".brands"),
                $models = $(".models"),
                $sku=$(".sku");
            var types, brands, models,sku;

            var updateData = function() {
            	types = [], brands = [], models = [],sku=[];
            	//获取类型types
            	for(var i=0;i<data.length;i++){
            		types[i]=data[i];
            		if(options.types){
            			if(options.types==data[i].type_id){
							for (var j = 0; j < data[i].data.length; j++) {
								brands[j]=data[i].data[j];
								if(options.brands){
									if(options.brands==data[i].data[j].brand_id){
										for (var c = 0; c < data[i].data[j].data.length; c++) {
											models[c]=data[i].data[j].data[c];
											if(options.models){
												if(options.models==data[i].data[j].data[c].model_id){
													for (var d = 0; d < data[i].data[j].data[c].data.length; d++) {
														sku[d]=data[i].data[j].data[c].data[d];
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
						console.log(data)
                        $types.find("ul").append('<li class="active-result" data="'+data[i].type_id+'">' + data[i].type_name + '</li>');
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
					for (var i=0;i<brands.length;i++) {
                        $brands.find("ul").append('<li class="active-result" data="'+brands[i].brand_id+'">' + brands[i].brand_name + '</li>');
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
					for (var i=0;i<models.length;i++) {
                        $models.find("ul").append('<li class="active-result" data="'+models[i].model_id+'">' + models[i].model_name + '</li>');
                    }
                    this.sku();
				},
				sku: function() {
					$sku.empty();
					$sku.append('<a href="javascript:;">\
										<span>请选择服务内容...</span>\
										<div><b></b></div>\
									</a>\
									<div class="chosen-drop">\
                                        <div class="chosen-search"><input type="text" autocomplete="off" tabindex="2"></div>\
										<ul class="chosen-results">\
										</ul>\
									</div>');
					// console.log(options.models)
					for (var i=0;i<sku.length;i++) {
                        $sku.find("ul").append('<li class="active-result" data="'+sku[i].sku_id+'">' + sku[i].sku_name + '<i>￥'+sku[i].sku_money+'</i></li>');
                    }
				}
			};

			//获取当前状态信息
            var getInfo = function() {
                var status = {
                    types: (function(){
                    	var data;
                    	for (var i = 0; i < types.length; i++) {
                    		if(options.types){
            					if(options.types==types[i].type_id){
            						data=types[i].type_name;
            					}
                    		}
                    	}
                    	return data;
                    })() || '',
                    brands: (function(){
                    	var data;
                    	for (var i = 0; i < brands.length; i++) {
                    		if(options.brands){
            					if(options.brands==brands[i].brand_id){
            						data=brands[i].brand_name;
            					}
                    		}
                    	}
                    	return data;
                    })() || '',
                    models: (function(){
                    	var data;
                    	for (var i = 0; i < models.length; i++) {
                    		if(options.models){
            					if(options.models==models[i].model_id){
            						data=models[i].model_name;
            					}
                    		}
                    	}
                    	return data;
                    })() || '',
                    sku: (function(){
                    	var data;
                    	for (var i = 0; i < sku.length; i++) {
                    		if(options.sku){
            					if(options.sku==sku[i].sku_id){
            						data=sku[i].sku_name;
            					}
                    		}
                    	}
                    	return data;
                    })() || '',
                    sku_money: (function(){
                    	var data;
                    	for (var i = 0; i < sku.length; i++) {
                    		if(options.sku){
            					if(options.sku==sku[i].sku_id){
            						data=sku[i].sku_money;
            					}
                    		}
                    	}
                    	return data;
                    })() || '',
                    /*brands: data[options.brands] || '',
                    models: data[options.models] || '',*/
                    //codeid: options.area || options.city || options.province
                };
                return status;
            };



			//事件绑定tyoe
            $types.on('click','a',function(event){
            	if ($types.hasClass('chosen-with-drop')) {
					$types.removeClass('chosen-with-drop');
				} else {
					$types.addClass('chosen-with-drop');

				}
                $types.find('input').focus();
				$types.siblings().removeClass('chosen-with-drop');
				event.stopPropagation();
            })
            $types.on('click','li',function(){
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
            	console.log(getInfo())
                //options.onChange(_api.getInfo());
            })



            //事件绑定brands
            $brands.on('click','a',function(event){
            	if ($brands.hasClass('chosen-with-drop')) {
					$brands.removeClass('chosen-with-drop');
				} else {
					$brands.addClass('chosen-with-drop');

				}
                $brands.find('input').focus();
				$brands.siblings().removeClass('chosen-with-drop');
				event.stopPropagation();
            })
            $brands.on('click','li',function(){
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
            	console.log(getInfo())
                //options.onChange(_api.getInfo());
            })


            //事件绑定models
            $models.on('click','a',function(event){
            	if ($models.hasClass('chosen-with-drop')) {
					$models.removeClass('chosen-with-drop');
				} else {
					$models.addClass('chosen-with-drop');

				}
                $models.find('input').focus();
				$models.siblings().removeClass('chosen-with-drop');
				event.stopPropagation();
            })
            $models.on('click','li',function(){
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
            	console.log(getInfo())
            	/*format.models();*/
                //options.onChange(_api.getInfo());
            })


            //事件绑定models
            $sku.on('click','a',function(event){
            	if ($sku.hasClass('chosen-with-drop')) {
					$sku.removeClass('chosen-with-drop');
				} else {
					$sku.addClass('chosen-with-drop');

				}
                $sku.find('input').focus();
				$sku.siblings().removeClass('chosen-with-drop');
				event.stopPropagation();
            })
            $sku.on('click','li',function(){
            	if ($sku.hasClass('chosen-with-drop')) {
					$sku.removeClass('chosen-with-drop');
				} else {
					$sku.addClass('chosen-with-drop');
				}
            	options.sku = $(this).attr("data");
            	$sku.find("span").html($(this).html());
            	console.log(getInfo())
            	/*format.models();*/
                //options.onChange(_api.getInfo());
            })




            //初始化
            updateData();
            //options   types
			format.types();
		}
	});
}