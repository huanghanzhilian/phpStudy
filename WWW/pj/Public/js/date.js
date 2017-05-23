$(function(){
	//时间
	$("#dsj").click(function(){
		$(".dfgh").remove();
		$(".Maskc1").remove();
        $("html,body").height($(window).height()).css({"overflow-y": "hidden"});
		$(window.document.body).append('<div class="tc_dizhi dfgh" id="dest_y" style="display:block"><div class="tc_dizhi_top"><span></span><h1 id="dat_sj">请选择</h1></div><ul class="on" id="li_box"></ul><ul class="on" id="li_box2" style="display:none"><li class="t9">9:00</li><li class="t10">10:00</li><li class="t11">11:00</li><li class="t12">12:00</li><li class="t13">13:00</li><li class="t14">14:00</li><li class="t15">15:00</li><li class="t16">16:00</li><li class="t17">17:00</li><li class="t18">18:00</li><li class="t19">19:00</li></ul><ul style="display:none" class="on" id="li_box3"><li class="t10">10:00</li><li class="t11">11:00</li><li class="t12">12:00</li><li class="t13">13:00</li><li class="t14">14:00</li><li class="t15">15:00</li><li class="t16">16:00</li><li class="t17">17:00</li><li class="t18">18:00</li><li class="t19">19:00</li><li class="t9">20:00</li></ul></div><div class="Maskc1" style="display:block"></div>')
		//$(".Maskc1").css({'display':'block'});
		//$(".tc_dizhi").css({'display':'block'});
		//$("#slm").css({'display':'block'});
	    $('.Maskc1').bind( "touchmove", function (e) {
			e.preventDefault();
		});
	
	
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
			
			 if(hkl < 19){
                    $("#li_box3").find(".t"+gghk).prevAll("li").hide();
                }else if(hkl==19){
					//var gghk = kd;
					//console.log(gghk);
					//alert(gghk)
                   // $("#li_box3").find(".t"+hkl).prevAll("li").hide();
				   $("#li_box3").find(".t"+19).prevAll("li").hide();
               //alert(1)
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
			 $("#my_droce").text(chuanz).css({'color':'#3e7edb'});
			 
			 
			 
			 var wsfgf= chuanz.split("-");
			 var riqi=wsfgf[2].split(" ");
			 var riqi=wsfgf[2].split(":");
			 var riqic=riqi[0].split(" ");
			 var riqicr=riqic[0];
			 var khdy=riqi[0].split("(");
			 var lkgh=riqi[riqi.length-2].split("");
			 var cdfse = lkgh[lkgh.length-2].concat( lkgh[lkgh.length-1] );
			 
			 //console.log(wsfgf[0]);   //年
			 //console.log(wsfgf[1]);   //月
			 //console.log(riqicr);       //日
			 //console.log(khdy[khdy.length-1]);   //起时
     		 //console.log(cdfse)                  //尾时
			 
			 //var th_wd=parseFloat($(this).attr('data-lat'));
			 var nn=parseInt(wsfgf[0]);
			 var yy=parseInt('0'+wsfgf[1]-1);
			 var rr=parseInt(riqicr);
			 var ssa=parseInt(khdy[khdy.length-1]);
			 var ssb=parseInt(cdfse)
			 var sbl=00
			 
			 function kjhu(kf){
				 var ime=new Date(nn,yy,rr,kf,00,00);
				 var fhdz=(parseInt(ime.getTime()/1000));
				 return fhdz;
			     
			 }
			 var mmb=kjhu(ssa)
			 var mmbc=kjhu(ssb)
			 
			 var ime=new Date(nn,yy,rr,ssa,00,00);
			 //console.log(ime);
						 
			 //console.log(mmb);
			 //console.log(mmbc);
//			 console.log(mmbc);
			 $("#dasj").val(mmb)
			 $("#dasjc").val(mmbc)
			 
			 
			 $("html,body").css({"overflow-y": "auto",'height':'auto'});
			 datecs(mmb,mmbc)
		  })
		  
		  
	      $("#dest_y span").click(function(){
			  $("#dest_y,.Maskc1").hide();
			  $("html,body").css({"overflow-y": "auto",'height':'auto'});			  
		  })
		  
	
	    })
	
				
				
				
				
          
				
					

})




/*function datecs(mmb,mmbc){
	var sid=$("#dsj").attr('data')
	$.ajax({
		url: "__CONTROLLER__/datechuli",
		data:{'mmb':mmb,'mmbc':mmbc,'id':sid},
		dataType: "html",
		type:'post',
		success: function (data) {
			console.log(data)
		}
	});
	
	//alert(mmb+''+mmbc)
}
*/
















