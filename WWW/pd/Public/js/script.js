$(function(){
	
	$("#ccp").click(function(){
		if($(this).hasClass('ccp')){
			$(this).removeClass('ccp')
			$(this).addClass('ccppp');
		}else{
			$(this).addClass('ccp');
			$(this).removeClass('ccppp')
		}
	})
	
	//品牌
	$(".brands>.brands_lis ul li:first-child").addClass("on");
    $(".brands>.brands_lis ul li").click(function(){
		$(this).addClass("on").siblings().removeClass("on")
	});

    //型号
	   
	//$(".models>.models_lis>#list >ul> li").click(function(){
		/*if($(this).hasClass('on')){
			$(this).removeClass('on')
		}else{
			$(this).addClass('on');
		}*/
		//$(this).addClass('on').siblings().removeClass('on');
	//});
	
	
	
	$(".models>.models_lis>ul> li").click(function(){
		
					
		if($(this).hasClass('on')){
			$(this).removeClass('on')
			$(this).find('b').css({'background-color':'#e6e6e6'})
		}else{
		$(this).addClass('on').siblings().removeClass('on').find('b').css({'background-color':'#e6e6e6'});
		$(this).find('b').css({'background-color':'#3e7edb'})
		};
	});
	
	$( ".models>.models_lis>ul> li" ).each(function( index ) {
		$(this).find('b').text(index+1)
	});
	
	
	
	//手机维修筛选
	$(".header>h1>span").click(function(){
		$(".popup>ul").slideDown();
		//$(".popup>ul").addClass('on');
		if($(".popup>ul").hasClass('on')){
			$(".popup>ul").slideUp();
			$(".popup>ul").removeClass('on')
		}else{
			$(".popup>ul").addClass('on');
		}
	});
	
	
	//配件订单
	$(".dingdan>ul>li>a").click(function(){
			$(this).addClass('on').parent().siblings().children().removeClass('on');
	})
	
	
	
	
	/*$(".brands_lis>ul").click(function(){
		$(this).css({
			 "-webkit-transform":"translateY(0%)",
			 "-webkit-transition":"-webkit-transform 0.5s ease-out 1s",
		 })
	})*/
	/*var aboveY=0; // 设一个全局变量记录上一次内部块滑动的位置
	$(".brands_lis>ul").bind('touchstart', function(event) {
	   var start_y = event.originalEvent.targetTouches[0].clientY;
       //alert(start_y);
    });
	
	$(".brands_lis>ul").bind("touchMove", function(event) {
	    var start1_y = event.originalEvent.targetTouches[0].clientY;
		var yy=start1_y-start_y;
		$(this).css({'top':'yy'})
    }); 
	
	$(".brands_lis>ul").bind("touchend", function(event) {
	     
       alert(yy)
    }); */
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/*	var start_x, start_y, end_x, end_y, move_num;
    //var client_height = $(window).height();
	var dfd=$(".brands_lis>ul").height();
    //var aboveY=0; // 设一个全局变量记录上一次内部块滑动的位置
	 aboveY = 0    //获取页面滚动与顶部的距离
	
	
    $(".models>.models_lis").on("touchstart", function(e) {
        //start_x = e.originalEvent.targetTouches[0].clientX;
        start_y = e.originalEvent.targetTouches[0].pageY;
        //console.log(start_x);
        //console.log(start_y);
        
    });
    $(".models>.models_lis").on("touchmove", function(e) {
        end_y = e.originalEvent.targetTouches[0].pageY;
        var move_num = (end_y - start_y).toFixed(2);         //去掉舍入
		tf_num = "translateY(" + move_num+aboveY + "px)";
        $(this).css("-webkit-transform", tf_num);
		
    });
    
	var nnj=$(this).css({"top":move_num+aboveY+'px'});
	
	$(".models>.models_lis").on("touchend", function() {
		//console.log(tf_num);
		
        abovec=parseInt(move_num+aboveY);//touch结束后记录内部滑块滑动的位置 在全局变量中体现 一定要用parseInt()将其转化为整数字;
		
		aboveY+=abovec
		console.log(aboveY);
		//alert(aboveY)
		if (move_num >0) {
 
            $(this).css({"-webkit-transform": "translateY(0px)"});
 
        }else{
			//$(this).css("-webkit-transform", tf_num);
			//$(this).css({"-webkit-transform": "translateY(" +aboveY + "px)"});
		}
		
	});*/







/*
    var start_x, start_y, end_x, end_y, move_num;
    var client_height = $(window).height();

    $(".models>.models_lis").on("touchstart", function(e) {
       // e.preventDefault();
        start_x = e.originalEvent.targetTouches[0].clientX;
        start_y = e.originalEvent.targetTouches[0].clientY;
        console.log(start_x);
        console.log(start_y);

    });
    $(".models>.models_lis").on("touchmove", function(e) {
        //e.preventDefault();

        $(this).removeClass("slow_action");
        end_x = e.originalEvent.targetTouches[0].clientX;
        end_y = e.originalEvent.targetTouches[0].clientY;
        move_num = (end_y - start_y).toFixed(2);
        console.log(move_num);
        var tf_num = "translateY(" + move_num + "px)";
        $(this).css("-webkit-transform", tf_num);

    });
    $(".models>.models_lis").on("touchend", function() {
        $(this).addClass("slow_action");
        if (move_num < -(client_height / 2)) {

            $(this).css({
                "-webkit-transform": "translateY(-900px)",

            });

        } else if (move_num > 0) {
            $(this).css({
                "-webkit-transform": "translateY(0px)",

            });
        } else {
            $(this).css({
                "-webkit-transform": "translateY(0px)",

            });

        }

});

*/


		   
           /* var startX,//触摸时的坐标
            startY,
             x, //滑动的距离
             y,
             aboveY=0; // 设一个全局变量记录上一次内部块滑动的位置
          documentHeight=$("#models_lis_c").height();//内部滑动模块的高度
          wapperHeight=$("#models_lis").height(); //外部框架的高度
          //console.log(documentHeight);
		  //console.log(wapperHeight);

         var inner=document.getElementById("models_lis_c");  

            function touchStart(e){//触摸开始
                //e.preventDefault();
                var touch=e.touches[0];
                startY = touch.pageY;   //刚触摸时的坐标                       
            }

            function touchMove(e){//滑动
                 //e.preventDefault();
                var  touch = e.touches[0];               
                 y = touch.pageY - startY;//滑动的距离                                          
                 inner.style.top=aboveY+y+"px";    
                         
                               
            }  

            function touchEnd(e){//手指离开屏幕                         
                 aboveY=parseInt(inner.style.top);//touch结束后记录内部滑块滑动的位置 在全局变量中体现 一定要用parseInt()将其转化为整数字;
                  if(y>0&&aboveY>0){//当滑动到最顶端时候不能再网上滑动
                      //inner.style.top=0;
                       $("#models_lis_c").animate({top:0},200);
                       aboveY=0;
                    } 
                  
                  if(y<0&&(aboveY<(-(documentHeight-wapperHeight)))){//当滑动到最底部时候不能再网下滑动
                    // inner.style.top=-(documentHeight-wapperHeight)+"px";
                      $("#models_lis_c").animate({top:-(documentHeight-wapperHeight)},200);
                     aboveY=-(documentHeight-wapperHeight);
                  } 
            }//
             document.getElementById("models_lis").addEventListener('touchstart', touchStart,false);  
             document.getElementById("models_lis").addEventListener('touchmove', touchMove,false);  
             document.getElementById("models_lis").addEventListener('touchend', touchEnd,false);  */
			
			

/*            var start_x, start_y, end_x, end_y, move_num;
            var aboveY=0; // 设一个全局变量记录上一次内部块滑动的位置
          documentHeight=$("#models_lis_c").height();//内部滑动模块的高度
          wapperHeight=$("#models_lis").height(); //外部框架的高度
          console.log(documentHeight);
		  console.log(wapperHeight);

         var inner=document.getElementById("models_lis_c");  
			
			$("#models_lis").on("touchstart", function(e) {
			   // e.preventDefault();
				start_Y = e.originalEvent.targetTouches[0].clientY;
			});

			
			$("#models_lis").on("touchmove", function(e) {
				//e.preventDefault();
				end_y = e.originalEvent.targetTouches[0].clientY;
				move_num = parseInt(end_y - start_Y)//.toFixed(0);
				console.log(move_num);
				var tf_num = parseInt(move_num+aboveY)
				
				$("#models_lis_c").css("top", tf_num+'px');
		
			}); 
			
			

      
             
			$("#models_lis").on("touchend", function() {
                aboveY=$('#models_lis_c').position().top;  //touch结束后记录内部滑块滑动的位置 在全局变量中体现 一定要用parseInt()将其转化为整数字;
				console.log(aboveY);
				if(move_num>0&&aboveY>0){//当滑动到最顶端时候不能再网上滑动
                       $("#models_lis_c").animate({top:0},200);
                       aboveY=0;
                    } 
                  
                  if(move_num<0&&(aboveY<(-(documentHeight-wapperHeight)))){//当滑动到最底部时候不能再网下滑动
                    // inner.style.top=-(documentHeight-wapperHeight)+"px";
                      $("#models_lis_c").animate({top:-(documentHeight-wapperHeight)},200);
                     aboveY=-(documentHeight-wapperHeight);
					 
                  } 
		  });
*/
/*
	    $(".brands>.brands_lis ul li").click(function(){
			$("#models_lis_c").css("top", 0);
		})
	*/
	
	
	
	
	
	
	
	$(".title_h3").click(function(){
		//$(this).children("span").addClass("on")
		if($(this).children("span").hasClass('on')){
			
			$(this).children("span").removeClass('on');
			$(this).children("ul").slideUp();
			$(this).removeClass('on');
		}
		else{
			$(this).addClass('on');
			$(this).children("span").addClass('on');
			$(this).children("ul").stop(true,false).slideDown();
			$(this).siblings().children("ul").slideUp(100);
			$(this).siblings().removeClass('on');
			$(this).siblings().children("span").removeClass('on');
			var _this_h=$(this).offset().top
			//$('html,body').animate({'scrollTop':_this_h-86},500);
			//$(this).offset().top=0;
			//console.log(_this_h)
			
		}
		
		$(this).children("ul").click(function(event){
            event.stopPropagation();
        });
	})
	
	$(".title_h3").each(function( index ) {
		$(this).click(function(){
			var _ttx=index+1
			$('html,body').animate({'scrollTop':_ttx*46},500);
	        console.log(_ttx)
		})
		//$(this).find('b').text(index+1)
	});
	
	
	
	$(".title_h3 > ul > li").click(function(){
		
		var _$thc=$(this).find("input[type='checkbox']");
		if(_$thc.hasClass('on')){
			_$thc.attr("checked",false);
		    _$thc.removeClass('on');
			_$thc.parent().find("u").removeClass('on');
			_$thc.parents('.title_h3').css({'color':'#4c4c4c'}).find(".hide_icpo").css({'display':'none'}).siblings().css({'display':'inline-block'});
		}else{
		
		_$thc.attr("checked",true);
		_$thc.addClass('on');
		_$thc.parent().find("u").addClass('on');
		_$thc.parents('.title_h3').css({'color':'#3e7edb'}).find(".show_icpo").css({'display':'none'}).siblings().css({'display':'inline-block'});
		}
		
		            var $ul_on = $(this).parent("ul").find(".on"),
                        li_len = $ul_on.length;
                    if(li_len > 0){
                        $(this).parent().parent().find("em").addClass('on');
						
                    }else{
                        $(this).parent().parent().find("em").removeClass('on');
						
                    }
					k()
					
					/*$(".title_h3>ul").each(function(){
						var uuiocbb=$(this).find("input[type='checkbox'][name='aa'][checked]").length
						console.log(uuiocbb)
						if ($(this).length>=1) {
						   $("#open").show();
						}else{
							$("#open").hide();
						}
					})*/
					
					
					
		
		
	})
	function k(){
	
	/*document.getElementById('open').style.display='block';*/
	$('.content_con ').each(function(){
		  var uuioc=$(this).find("input[type='checkbox'][name='aa'][checked]").length
		  console.log(uuioc)
		  if(uuioc){
			  $("#open").show();
			  //alert(1)
		  }else{
			  $("#open").hide();
		  }
	  })
    }
	
	
	
	
	
	
	
	//维修确认提交
    $("#kk").click(function(){
		$(".Maskc").css({'display':'block'});
		$(".lili_c").css({'display':'block'});
	})	
	
	
	//收回
	$(".lili_c_ico>span").click(function(){
		alert(1)
		$("#li").fadeOut("slow");
		$(this).fadeOut("slow");
		$("html,body").css({"overflow-y": "auto",'height':'auto'});
		//$("#kk").show();
		//event.stopPropagation();
	})
	
	
	
	//tab
	$(".wx_tab>a").click(function(){
		var tab_dsy=$(this).index();
		$(this).find("span").addClass('on');
		$(this).siblings().find("span").removeClass('on');
		$(this).find("p").addClass('on');
		$(this).siblings().find("p").removeClass('on');
		$(".zhusu_tit>strong").eq(tab_dsy).css({'display':'block'}).siblings().css({'display':'none'})
		$(this).addClass('on').siblings().removeClass('on');
	})
	
	
	//位置
	$(".gb_ce").click(function(){
		$(".dfgh").remove();
		$(".tc_dizhi>h1").text("请选择");
		$(".Maskc1").css({'display':'block'});
		$(".tc_dizhi").css({'display':'block'});
		$("#slm").css({'display':'block'});
	})
	
	$(".tc_dizhi>span").click(function(){
		$(".Maskc1").css({'display':'none'});
		$(".tc_dizhi").css({'display':'none'})
	})
	
	$("#slm>li").click(function(){
		alert(1)
		/*var sl=$(this).find("a").text();
		alert(sl)*/
		//var sda=$(".tc_dizhi>h1").text(sl)
	});
	
	$("#sqlm>li").click(function(){
		var sqlm=$(this).text()
		$("#sqlm").hide()
		$("#qklm").show()
		$(".tc_dizhi>h1").append(sqlm)
	});
	
	$("#qklm>li").click(function(){
		var sqlm22=$(this).text()
		$("#qklm").hide()
		$(".tc_dizhi>h1").append(sqlm22);
		$(".Maskc1").css({'display':'none'});
		$(".tc_dizhi").css({'display':'none'});
		//alert($(".tc_dizhi>h1").text())
		$(".gb_ce>p").text($(".tc_dizhi>h1").text())
	})
	

	
	
	
	
	//时间
	$("#dsj").click(function(){
		//$("body").height(100).css({"overflow-y": "hidden"});
		$(".dfgh").remove();
		$(".Maskc1").remove();
		$(window.document.body).append('<div class="tc_dizhi dfgh" id="dest_y" style="display:block"><span></span><h1 id="dat_sj">请选择</h1><ul class="on" id="li_box"></ul><ul class="on" id="li_box2" style="display:none"><li class="t9">9:00</li><li class="t10">10:00</li><li class="t11">11:00</li><li class="t12">12:00</li><li class="t13">13:00</li><li class="t14">14:00</li><li class="t15">15:00</li><li class="t16">16:00</li><li class="t17">17:00</li><li class="t18">18:00</li><li class="t19">19:00</li></ul><ul style="display:none" class="on" id="li_box3"><li class="t10">10:00</li><li class="t11">11:00</li><li class="t12">12:00</li><li class="t13">13:00</li><li class="t14">14:00</li><li class="t15">15:00</li><li class="t16">16:00</li><li class="t17">17:00</li><li class="t18">18:00</li><li class="t19">19:00</li><li class="t9">20:00</li></ul></div><div class="Maskc1" style="display:block"></div>')
		//$(".Maskc1").css({'display':'block'});
		//$(".tc_dizhi").css({'display':'block'});
		//$("#slm").css({'display':'block'});
	
	
	
	var date=new Date();
	var Week = date.getDay();  //星期
	var Hours = date.getHours();  //时
	var m = date.getMinutes();    //分
    var day = date.getFullYear()+"-"+ (date.getMonth()+1)+"-"+ date.getDate();    //年+月+日
	
	if(m<10){
            m="0" + m;
        }
        var current_time = Hours+"."+m;
        var a=0,b=7,w=1;
        if(current_time > 19){
            a=1,b=8,Week=Week+1;
        }
        for(i=a;i<b;i++){
            var dat=new Date((+date)+i*24*3600*1000);
            Week = Week+1;
            if(Week%7==0){var week = "六";}
            if(Week%7==1){var week = "日";}
            if(Week%7==2){var week = "一";}
            if(Week%7==3){var week = "二";}
            if(Week%7==4){var week = "三";}
            if(Week%7==5){var week = "四";}
            if(Week%7==6){var week = "五";}
            var dateStr = dat.getFullYear()+"-";
            if(dat.getMonth() < 9) {
                dateStr += "0";
            }
            dateStr = dateStr+(dat.getMonth()+1)+"-";
            if(dat.getDate() < 10) {
                dateStr += "0";
            }
            dateStr += dat.getDate();
            if(i==0){
                $("#li_box").append("<li date='"+dateStr+"'>"+dat.getFullYear()+"-"+ (dat.getMonth()+1)+"-"+ dat.getDate()+" 星期"+week+"  (今天)</li>");
            }else if(i==1){
                $("#li_box").append("<li date='"+dateStr+"'>"+dat.getFullYear()+"-"+ (dat.getMonth()+1)+"-"+ dat.getDate()+" 星期"+week+"  (明天)</li>");
            }else{
                $("#li_box").append("<li date='"+dateStr+"'>"+dat.getFullYear()+"-"+ (dat.getMonth()+1)+"-"+ dat.getDate()+" 星期"+week+"</li>");
            }
        }
		
		
		
		
	//$("#li_box").append('<li>'+date.getFullYear()+"-"+ (date.getMonth()+1)+"-"+ (date.getDate()+6)+''+dfs[Week-1]+'</li>');
	
	
	
	
	$("#li_box>li").click(function(){
		 var $this = $(this);
            var _theDate = $this.text();
            var _date = $this.attr("date");
            $("#dat_sj").html(_theDate);
            $("#dat_sj").attr("date", _date);
            if(_theDate.indexOf(day) >= 0 ){
                var T = Hours+1;
                if(current_time < 19){
                    $("#li_box2").find(".t"+T).prevAll("li").hide();
                }else if(current_time=19){
                    T = Hours;
                    $("#li_box2").find(".t"+T).prevAll("li").hide();
               
				}
            }else{
                $("#li_box2").find("li").show();
            }
			$("#li_box").css({'display':'none'});
			$("#li_box2").show(0,function(){
				$(this).find("#li_box2>li").click(function(){
				    var _beginDate = $(this).text();
					 $("#dat_sj").append('('+_theDate1+')&nbsp;至&nbsp');
					 var stime= _date+" "+$(this).text()+":00";
					 
				})
			});
	     })
		 
		 $("#li_box2>li").click(function(){
			 var kd = Hours+1;
			 var thigg=$(this).text()
		     var qgh= thigg.split(":",1);
			 
			 var hkl =parseInt(qgh)
			 var gghk=hkl+1;
			 if(qgh < 19){
                    $("#li_box3").find(".t"+gghk).prevAll("li").hide();
                }else if(qgh==19){
					gghk = kd;
					//alert(gghk)
                    $("#li_box3").find(".t"+gghk).prevAll("li").hide();
               
				}
				
			 //alert(1)
			 $("#li_box2").hide();
			 $("#li_box3").show();
		      var $this1 = $(this);
			  var _theDate1 = $this1.text();
			  $("#dat_sj").append('('+_theDate1+')&nbsp;至&nbsp');
  
		 })
		 $("#li_box3>li").click(function(){
		     $("#li_box3,#dest_y,.Maskc1").hide();
			 var $this2 = $(this);
			 var _theDate2 = $this2.text();
			 $("#dat_sj").append('('+_theDate2+')');
			 var chuanz=$("#dat_sj").text();
			 $("#dsj>em").text(chuanz)
		 })
	      $("#dest_y>span").click(function(){
			  $("#dest_y,.Maskc1").hide();
			  
		  })
	
	})
	
	//遮照层禁止滚动
	$('.Maskc,Maskc1').bind( "touchmove", function (e) {
	    e.preventDefault();
	});
	
	//alert(dfs[Week])
	
	
	
	/*.removeClass('on')
		}else{
			$(this).addClass('on');
		}
	});
	*/
	
	
	//pc焦点图
	var sWidth = $(".focus").width(); //获取焦点图的宽度（显示面积）
	var len = $(".focus").find("ul li").length; //获取焦点图个数
	var index = 0;
	var picTimer;
	
	   $(".preNext").hover(function(){
		  $(this).stop(true,false).animate({"opacity":"0.5"},300);},function(){
		  $(this).stop(true,false).animate({"opacity":"0.2"},300);
		  });
		  
		  //上一页按钮
			$("#preNext_per").click(function() {
				index -= 1;
				if(index == -1) {index = len -1;}
				showPics(index);
			});
		
			//下一页按钮
			$("#preNext_next").click(function() {
				index += 1;
				if(index == len) {index = 0;}
				showPics(index);
			});
			
			
			
			//为小按钮添加鼠标滑入事件，以显示相应的内容
			$(".focus"+" .imgnum a").click(function() {
				index = $(".focus"+" .imgnum a").index(this);
				showPics(index);
			}).eq(0).trigger("mouseenter");
		  
		  
		  //鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
			$(".focus").hover(function() {
				clearInterval(picTimer);
			},function() {
				picTimer = setInterval(function() {
					showPics(index);
					index++;
					if(index == len) {index = 0;}
				},3000); //此4000代表自动播放的间隔，单位：毫秒
			}).trigger("mouseleave");
		  
		  //显示图片函数，根据接收的index值显示相应的内容
			function showPics(index) { //普通切换
				var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
				$(".focus ul").stop(true,false).animate({"left":nowLeft},500); //通过animate()调整ul元素滚动到计算出的position
				$(".focus"+" .imgnum a").removeClass("active").eq(index).addClass("active"); //为当前的按钮切换到选中的效果
				$(".focus"+" .imgnum a").stop(true,false).animate({"opacity":"1"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
			}
		
	
	      /*$(".e_vcr").each(function() {
			  console.log($(this).tetx());
			  if($(this).prev().text()=='需检测'){
				  $(this).remove();
				  alert(1)
				  
			  }
		  });*/
		  
		  $(".mmbuggt").each(function() {
			  if($(this).text()=='需检测'){
				  $(this).next().remove();
				  $(".cdret_1").text('需检测');
				  $(".total > i").remove();
				  
			  }
		  })
		  
		  
		   $(".e_vcefop").each(function() {
			  if($(this).text()==''){
				  $(this).next().text('需检测');
			  }
			     //console.log($(this).text());
		  })
		  
		  //报价判断
		  $(".e_vce").each(function() {
			  //console.log($(this).tetx());
			  if($(this).text()=='需检测'){
				  $(".cdret_1").text('需检测');
				  $("#amountd").val('需检测');
				 $(".sxgg>i") .remove();
				 $(this).text('需检测')
				 $(this).nextAll().remove();
			  }
		  })
		  //报价判断
	
	//循环删除显示
	$( ".da_con>ul>li>span" ).each(function() {
		
		var poestr=$(this).text();
		var lcrstr = $.trim(poestr)
		
		if(lcrstr==""||$(this).text()==" 至 "){
			$(this).parent().remove()
		}
		//console.log($(this).text());
	})
    //循环删除显示
	
	//弹窗
	function tanchuang(obv){
		$(".Maskc1").remove();
		$("#dest_y").remove();
		$(window.document.body).append('<div class="tc_dizhi dfgh" id="dest_y" style="display:block"><div class="tc_dizhi_top"><span></span><h1 id="dat_sj">请选择</h1></div><ul class="on" id="li_box">'+(obv)+'</ul></div><div class="Maskc1" style="display:block"></div>')
		$('.Maskc1').bind( "touchmove", function (e) {
			e.preventDefault();
		});
		$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
		//关闭按钮
		$(".tc_dizhi span").click(function(){
			$("#dest_y,.Maskc1").hide();
			$("html,body").css({"overflow-y": "auto",'height':'auto'});
				  
		})
	}
	//弹窗   
	$("#kcr_cu").click(function(){
		tanchuang('<li class="onces">手机维修</li>')
		    $(".onces").click(function(){
				$("#pinbb").val($(this).text());
				$("#kcr_cu").text($(this).text())
				$("#dest_y,.Maskc1").hide();
				$("html,body").css({"overflow-y": "auto",'height':'auto'});
			})
	})	 
    
	
	
	//师傅订单详情价格
	$( ".tf_null" ).each(function() {
		
		var tf_null=$(this).text();
		var tf_nullr = $.trim(tf_null)
		
		if(tf_nullr==""){
			$(this).parent().remove()
		}else if(tf_nullr=="需检测"){
			$(this).next().remove()
		}
		//console.log($(this).text());
	})
    //师傅订单详情价格
	
	
	//订单详情按钮
	$( ".tijao" ).each(function() {
		
		var tijao=$(this).val();
		var tijaor = $.trim(tijao)
		
		if(tijaor==""){
			$(this).parents('.jiedan').remove()
		}
		//console.log($(this).text());
	})
    //订单详情按钮
	
	
	//订单详情按钮
	$( "#quxiaopp" ).each(function() {
		
		var quxiaopp=$(this).text();
		var quxiaoppr = $.trim(quxiaopp)
		
		if(quxiaoppr==""){
			$(this).parents('.shifu_qx').remove()
		}
		//console.log($(this).text());
	})
    //订单详情按钮
	
	
	
	
	
	
	
	
})

//显示隐藏
/*	function ysd(ee){
		if(ee.className == ""){
		    ee.className="on"
			ee.parentNode.parentNode.style.height="auto";
			ee.innerHTML="收起";	
		}else{
			ee.className="";
			ee.parentNode.parentNode.style.height="68px";
			ee.innerHTML="查看";	
		}
	}*/			  
//显示隐藏



//刷新
function reloadPage(){
   window.location.reload()
}
//刷新























