<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> -->
<title>维百士-手机维修</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>

<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=94ca4100199c2f2a8f33300cece2eba2&plugin=AMap.Autocomplete"></script>



 <style>
	.r{font-size:30px;color:back;}
	h2{text-align:center;font-size:16px;}
	.form{width:100%;background:#FFF;  border-top:1px solid #EAEAEA; padding:2px 0px;}
	.form .row{margin:0 auto; font-size:15px;}
	.form .row label{margin-right:10px;}
	/*.txt,.textarea{padding:1%;border:1px solid #EAEAEA;width:300px;border-radius:2px;}*/
	.textarea{height:70px;}
	.vtop{vertical-align:top; height:30px; line-height:30px; color:#555;}
	
	.bt-save{ background:none; width:100%; height:100%;cursor:pointer;border:none;color:#FFF; font-size:16px;}
	
	.Maskc1{ background:rgba(0,0,0,0);}
	
</style> 

</head>
<body><!---->

<div class="header">
    <span onClick="window.history.back()"></span>
    <h1>请填写个人信息</h1>
    
</div><!--头-->
<div class="content" >
    <div class="wos_86" id="wos_86">
            <center style="display:none;"><?php echo ($my); ?></center>
            <div class="wx_tab">
				<a class="on" href='javascript:void(0)'onclick='ass2(1)'>
                   <div>
                    <span class="sy_ioc1 on"></span>
                    <p id="weik" class="on"><?php echo ($ways1); ?></p>
                    <p id="weik1"></p>
                  </div>
                </a>
                <a href='javascript:void(0)'onclick='ass(3)'>
                    <div>
                    <span class="sy_ioc2"></span>
                    <p><?php echo ($ways3); ?></p>
                    </div>                
                </a>
				<a href='javascript:void(0)'onclick='ass1(2)'>
                    <div>
                    <span class="sy_ioc3"></span>
                    <p><?php echo ($ways2); ?></p>
                    </div>
                </a>
           </div>
            <div class="zhusu_tit">
               <strong style="display:block;">免费上门服务，快速当面修好，<a href="#" id="shangm_1">流程说明</a></strong>
               <strong>寄修往返包邮，全程录像直播<a href="#" id="shangm_2">流程说明</a></strong>
               <strong>到店无需等待，即来即修好礼送<a href="#" id="shangm_3">流程说明</a></strong>
           </div>    
	        <div id="wrap">
    <script>
	    
        function Checked(){
			if ( $("#ditu").length > 0 ) {
			    var qxzdz=$("#ditu").val();
				if(qxzdz =='' || qxzdz == null){
					$("#ditu").focus().addClass("tips");
					$("#ditu").attr("placeholder", "点击选择地址");
					return false;
				}
			}
			
			if ( $("#ditu1").length > 0 ) {
			    var qxzmh=$("#ditu1").val();
				if(qxzmh =='' || qxzmh == null){
					$("#ditu1").focus().addClass("tips");
					$("#ditu1").attr("placeholder", "请填写详细地址");
					return false;
				}
			}
			
			if ( $("#yjwecz").length > 0 ) {
			    var yjweczc=$("#yjwecz").val();
				if(yjweczc =='' || yjweczc == null){
					$("#fwq").click();
					return false;
				}
			}
			
			if ( $("#ddwecz").length > 0 ) {
			    var ddweczc=$("#ddwecz").val();
				if(ddweczc =='' || ddweczc == null){
					$("#dsj_dd").click();
					return false;
				}
			}
			
	        var tutle_n=$("#u_name").val();
			if(tutle_n =='' || tutle_n == null){
				$("#u_name").focus().addClass("tips");
				return false;
			}
			var tel =$("#u_phone").val();
        	var mobile = /^0{0,1}(14[0-9]|17[0-9]|13[0-9]|15[0-9]|18[0-9]|14[0-9])[0-9]{8}$/;
			
			//if(tutle_n.value==''){ alert("请填写您的姓名！"); tutle_n.focus(); return false; }
			if(!mobile.test(tel)){
				$("#u_phone").val('');
				$("#u_phone").attr("placeholder", "请输入正确的手机号码");
				$("#u_phone").one("blur", function(){
					$("#u_phone").attr("placeholder", "请输入能联系到您的手机号");
				});
				$("#u_phone").focus().addClass("tips");
				return false;
			}
			var cityId=$("#dsj").find("em").text();
			if(cityId == '请选择上门时间范围') {
				$("#dsj").click();
				return false;
			}
			
			var xzdmc=$("#xzdm").text();
			if(xzdmc == '选择店面') {
				$("#dsj_dd").click();
				return false;
			}
			
			
			
			var yjwx=$("#shill").val();
			if(yjwx == '收件人所在的省市区县(回寄)') {
				$("#shill").click();
				return false;
			}
			 
			if ( $("#address").length > 0 ) {
			    var addre=$("#address").val();
				if(addre =='' || addre == null){
					$("#address").focus().addClass("tips");
					return false;
				}
			}	
			
			var xzdmcss=$("#chru").text();
			if(xzdmcss == '请选择维修服务区') {
				$("#chru").click();
				return false;
			}
			
			if(!$("#tongy").attr('checked')){
				$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
				$(window.document.body).append('<div class="f_bz"><div style="text-align: center;" class="f_bz_top">请同意维百士服务条款</div><ul><li data="no确定" id="qberc">确定</li></ul></div><div class="Maskc3" style="display:block"></div>'); 
				$("#qberc").click(function(){
					$("html,body").css({"overflow-y": "auto",'height':'auto'});
					$(".f_bz").remove();
					$(".Maskc3").remove();
				})
				return false;	
			}
			return true;
		}
		$(function(){
			
			$("#tjq_zy").click(function(){
				if($(this).hasClass('tjq_zy1')){
					$(this).removeClass('tjq_zy1')
					$("#tongy").attr("checked",true);
				}else{
					$(this).addClass('tjq_zy1');
					$("#tongy").attr("checked",false);
				}
			})
			
			$("input,textarea,#address,#ditu1").focus(function(){
				$(".cldrt_1").css({'position':'static'});
				$("#wos_86").css({'padding-bottom':'0'})
			});
			$("input,textarea,#address,#ditu1").blur(function(){
				$(".cldrt_1").css({'position':'fixed'});
				$("#wos_86").css({'padding-bottom':'86px'})
			});
			
			function tanchang(imgc){
				$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
				$("#dest_y").remove();
	        	$(".Maskc1").remove();
				$(window.document.body).append('<div class="tc_dizhi dfgh" id="dest_y" style="display:block"><div class="tc_dizhi_top"><span></span><h1 id="dat_sj">服务流程</h1></div><ul class="on" id="li_box_dds"></ul></div><div class="Maskc1" style="display:block"></div>');
				$("#li_box_dds").append(imgc)
				console.log(imgc);	
				$(".tc_dizhi span").click(function(){
					$("#dest_y,.Maskc1").hide();
					$("html,body").css({"overflow-y": "auto",'height':'auto'});
						  
				})
			}
			
			$("#shangm_1").click(function(){
				tanchang('<img src="/Public/img/c_3.png">')
			})
			$("#shangm_2").click(function(){
				tanchang('<img src="/Public/img/c_2.png">')
			})
			$("#shangm_3").click(function(){
				tanchang('<img src="/Public/img/c_1.png">')
			});
			
			
			
			
		})
	</script>
	<form action="/Home/Index/add_order.html/" method="post" onSubmit="return Checked();" id="form2" name="form2">
		<div class="form">
            <!--<?php if(is_array($youjia)): foreach($youjia as $key=>$j): echo ($j["jxzx_name"]); ?> <br />
			<?php echo ($j["jxzx_n"]); ?> <br />
			<?php echo ($j["jxzx_phone"]); ?> <br />
			<?php echo ($j["jxzx_username"]); ?> <br /><?php endforeach; endif; ?>
		<?php if(is_array($daodiana)): foreach($daodiana as $key=>$jj): echo ($jj["wxzx_name"]); ?> <br />
			<?php echo ($jj["wxzx_n"]); ?> <br />
			<?php echo ($jj["wxzx_phone"]); ?> <br />
			<?php echo ($jj["wxzx_time"]); ?> <br /><?php endforeach; endif; ?>-->
            <div class="row" id="name_4">
			    <label class="bqf">姓名：</label><div class="rootu"><input type="text" class="txt" name="u_name" id="u_name" placeholder="请输入姓名" autocomplete="off"/></div>
			</div>
			<div class="row">
				<label class="bqf">手机：</label><div class="rootu"><input type="tel" class="txt" name="u_phone" id="u_phone" placeholder="请输入手机号码" autocomplete="off"/></div>
			</div>
            
			
           
            
            <div id='ff'>
             
		    </div>
			
            
            
            
            <div class="row row_1">
				<label class="bqf bqf_1" id="bz">备注:</label>
				<textarea class="textarea" name="u_note" id="u_note" placeholder="您还有其他要求吗？(非必填)"></textarea>
			</div>
				<input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
				<input type="hidden" name="plan_id" value='<?php echo ($plan_id); ?>'>
				<input type="hidden" name="question_id" value='<?php echo ($question_id); ?>'>
				<input type="hidden" name="color_id" value='<?php echo ($color_id); ?>'>
				<input type="hidden" name="amountd" id="amountd" value='<?php echo ($money); ?>'>
				<input type="hidden" name="color_name" value='<?php echo ($color_name); ?>'>
				<input type="hidden" name="u_title" value='维修:<?php echo ($model_name); ?>'>
            <div class="wxnr">维修内容</div>
            <div class="kuangx">
                <div class="kuangx1">
			<div class="row" style=" height:auto; line-height:35px; margin-bottom:10px; font-size:16px; color:#ff7e00;">
				机型：<?php echo ($model_name); ?>(<?php echo ($color_name); ?>)<br/>
                	
			</div>

                    <div class="hdgs">问题：<?php echo ($question_name); ?></div>
                <?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><div class="row duan_c" style="  line-height:35px; margin-bottom:10px;">
                  
                    <div class="lanscd">方案：<?php echo ($kk["plan_name"]); ?><br/>
                    估计价格：<b class="e_vce"><?php echo ($kk["money"]); ?></b> <span class="e_vcr">元</span><em onClick="ysd(this)">查看</em></div>
                    维修时间：<b class="e_vce"><?php echo ($kk["m_time"]); ?></b> <span class="e_vcr">分钟</span><br/>
                    保修期：<b class="e_vce"><?php echo ($kk["warranty_name"]); ?></b> <span class="e_vcr">天</span>
                  </div><?php endforeach; endif; ?>
                
                
                </div>
             </div>
			
                <div class="cldrt_1">
                      <div class="grent_1">
                        <span id="tjq_zy" class="tjq_zy"></span>
                        <input type="checkbox" name="tongy" id="tongy" checked="checked"/>
                        我已阅读并同意此条款<a href="javascript:void(0);" onClick="tiaok()">《维百士服务条款》</a>
                  </div>
                      <div class="clearfix ws_box">
                          <div class="total ws_l sxgg">合计总价：<span class="cdret_1"><?php echo ($money); ?></span><i>(元)</i><p>维修成功后付款</p></div>  
                          <div class="next_step ws_r sxgg">
                              <label></label>
                              <button type="submit" name="submit" class="bt-save">提交</button>
                          </div>
                      </div>
                 </div>
            </div>
		</form>
	</div>
</div>
</div>
 <div class="Maskc1"></div>
</body>
</html>

<script type="text/javascript">
/*document.onkeydown=function(event){
	var e = event || window.event || arguments.callee.caller.arguments[0];
	if(e && e.keyCode==27){ // 按 Esc 
		alert('要做的事情1')//要做的事情
	  }
	if(e && e.keyCode==113){ // 按 F2 
		 alert('要做的事情2')//要做的事情
	   }            
	 if(e && e.keyCode==13){ // enter 键
		 alert('要做的事情3')//要做的事情
	}
}; */

    function tiaok(){
		$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
		$(window.document.body).append('<div class="f_bz f_bz_2" id="tiaokuan_1"></div><div class="Maskc3" style="display:block"></div>'); 
		$.ajax({
			url: "/Home/Index/clause",
			//data:{'model_id':id},
			dataType: "html",
			type:'get',
			success: function (data) {
			    $("#tiaokuan_1").html( data);
				$("#tk_gb_1").click(function(){
					$(".Maskc3").remove();
					$("#tiaokuan_1").remove();
					$("html,body").css({"overflow-y": "auto",'height':'auto'});
				})
			}
		});
	}


    
	if($("#weik").text()==''){
		ass(3);
		$(".wx_tab>a").eq(1).find("span").addClass('on');
		$(".wx_tab>a").eq(1).siblings().find("span").removeClass('on');
		$(".wx_tab>a").eq(1).addClass('on');
		$(".wx_tab>a").eq(0).removeClass('on');
		$(".wx_tab>a").eq(1).find("p").addClass('on');
		$("#weik1").text("上门维修")
	}else{
        ass2(1)
	}
//ass2(1)

    
	//var jsks=document.getElementById("tc_dizhi");
	
	function ggghj(){
	    document.getElementById('tc_dizhi').style.display='block';
		$(this).val("")
	}
	
	
	

	


	function ass(ways_id){
		$(".Maskc2").remove();
		$("#fwq").remove();
		$("#ddwecz").remove();
		$("#yjwecz").remove();
		$("#u_name").attr("placeholder", "收件人的真实姓名(回寄)");
		$("#u_phone").attr("placeholder", "收件人的手机号码(回寄)");
		//alert(ways_id);
		
		$.ajax({
			url: "/Home/Index/sheng_1",
			//data:{'id':id},
			dataType: "html",
			type:'get',
			success: function (data) {
			    $("#ff").html(data);
				$(".Maskc").remove();
				$("#fwq").remove();
					$("#dsj_dd").remove();
					$("#idtu").remove();
					$("#idtu1").remove();
					$("#name_4").before('<input id="yjwecz" type="hidden" name="jxzx_id"><div class="row yjsb" style="height:auto" id="fwq"><b></b><span>选择您要邮寄的维修中心</span></div>')
				$("#fwq").click(function(){
					$('.Maskc1').bind( "touchmove", function (e) {
						e.preventDefault();
					});
					$(".dfgh").remove();
					$(".Maskc1").remove();
					/*$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
					$(window.document.body).append('<div class="tc_dizhi dfgh" id="dest_y" style="display:block"><div class="tc_dizhi_top"><span></span><h1 id="dat_sj">请选择</h1></div><ul class="on" id="li_box_dds"></ul></div><div class="Maskc1" style="display:block"></div>');
					$("#li_box_dds").append("<li>北京总部</li>");*/
					
					$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
					$(window.document.body).append('<div class="tc_dizhi dfgh" id="dest_y" style="display:block"><div class="tc_dizhi_top"><span></span><h1 id="dat_sj">请选择</h1></div><ul class="on" id="li_box_dds"></ul></div><div class="Maskc1" style="display:block"></div>');
					/*$("#li_box_dds").append("<li>北京总部</li>");*/
					$("#li_box_dds").append('<?php if(is_array($youjia)): foreach($youjia as $key=>$j): ?><li id="<?php echo ($j["jxzx_id"]); ?>" class="cder"><i class="mm"></i><em class="ii"></em><p class="bz_1"><?php echo ($j["jxzx_name"]); ?></p><p>邮寄地址：<?php echo ($j["jxzx_n"]); ?></p><p>收件人：<?php echo ($j["jxzx_username"]); ?> 手机：<?php echo ($j["jxzx_phone"]); ?></p></li><?php endforeach; endif; ?>');
								
					
					$(".tc_dizhi>ul li").click(function(){
						//$(this).addClass('on').siblings().removeClass('on');
					    var th_cc=$(this).find('.bz_1').html();
						var th_cc1=('<li class="cder onn on1">'+(th_cc)+'</li>');
						console.log(th_cc);
						 $("#li_box3,#dest_y,.Maskc1").hide();
						 $("#fwq").html('<b class="on"></b><span class="on">'+(th_cc)+'</span>').addClass('yjsb1');
						 $("#yjwecz").val($(this).attr('id'))
					     $("html,body").css({"overflow-y": "auto",'height':'auto'});
						})
						
						$("#dest_y span").click(function(){
							$("#dest_y,.Maskc1").hide();
							$("html,body").css({"overflow-y": "auto",'height':'auto'});			  
						})
				});
			}
		});	
	}
	
	var hjghs=document.getElementById("cxjz");
	
	

   function cxjz(ways_id){
	    $(".tc_dizhi").remove();
	    $("#xxdz").remove();
		$(".Maskc1").remove();
	   
	   /* $("body").ajaxStart(function(){ 
			$(this).append('<div class="jztp"><img src="/Public/img/jz.GIF"/></div>');
			$(".Maskc1").show();
			$("#list>ul").remove();
		});
		$("body").ajaxStop(function(){
			$(".jztp").remove();
			//$(".Maskc1").hide();
		});*/
		
		var $this = $(this);
		$.ajax({
			url: "/Home/Index/youji",
			data:{'id':ways_id},
			dataType: "html",
			type:'get',
			success: function (data) {
				//$this.attr("disabled", "true");
			//$(".models>.models_lis>ul").html( data);
			$(window.document.body).append('<div class="Maskc1" style="display:block"></div>')
			$(window.document.body).append(data)
			$('.Maskc1').bind( "touchmove", function (e) {
				e.preventDefault();
			});
					$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
	          
				$(".tc_dizhi span").click(function(){
		            $(".Maskc1").css({'display':'none'});
		            $(".tc_dizhi").css({'display':'none'});
					$("html,body").css({"overflow-y": "auto",'height':'auto'});
	            })
				
			}
		});	
	   
	   
	 
   
   }
	
	
	
/*	function klj(){
		$.ajax({
			url: "/Home/Index/youji",
			//data:{'id':id},
			dataType: "html",
			type:'get',
			success: function (data) {
			    $("#ff").html(data);	
			}
		});	
	}*/
	
	
	
	
	function ass1(ways_id){
		$(".Maskc2").remove();
		$("#fwq").remove();
		$("#ddwecz").remove();
		$("#yjwecz").remove();
		$("#u_name").attr("placeholder", "我们怎么称呼您");
		$("#u_phone").attr("placeholder", "能联系到您的手机号码");
		//alert(ways_id);
		$.ajax({
			url: "/Home/Index/daodian",
			//data:{'id':id},
			dataType: "html",
			type:'get',
			success: function (data) {
			    $("#ff").html(data);
				$("#fwq").remove();
					$("#dsj_dd").remove();
					$("#idtu").remove();
					$("#idtu1").remove();
					$("#name_4").before('<input id="ddwecz" type="hidden" name="wxzx_id"><div yuc_dr><a id="my_qz" href="http://m.amap.com/navi/?start=&dest=116.314315,39.982103&destName=北京中关村店&key=94ca4100199c2f2a8f33300cece2eba2"></a><div class="row yjsb" id="dsj_dd" style="height:auto;"><b class="onn"></b><span>选择您要去的维修中心</span></div></div>')	
					$("#dsj_dd").click(function(){
					    
					$(".dfgh").remove();
					$(".Maskc1").remove();
					$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
					$(window.document.body).append('<div class="tc_dizhi dfgh" id="dest_y" style="display:block"><div class="tc_dizhi_top"><span></span><h1 id="dat_sj">请选择</h1></div><ul class="on" id="li_box_dds"></ul></div><div class="Maskc1" style="display:block"></div>');
					$("#li_box_dds").append('<?php if(is_array($daodiana)): foreach($daodiana as $key=>$jj): ?><li id="<?php echo ($jj["wxzx_id"]); ?>" class="cder"><i class="mm"></i><em class="ii ii_1"></em><p class="ddhs"><?php echo ($jj["wxzx_name"]); ?></p><p>店铺地址：<?php echo ($jj["wxzx_n"]); ?></p><p>店铺电话：<?php echo ($jj["wxzx_phone"]); ?></p><p>营业时间：<?php echo ($jj["wxzx_time"]); ?></p></li><?php endforeach; endif; ?>');
					
						
						$(".tc_dizhi>ul li").click(function(){
						//$(this).addClass('on').siblings().removeClass('on');
					    var th_cc=$(this).find('.ddhs').html();
						var th_cc1=('<li class="cder onn on1">'+(th_cc)+'</li>');
						console.log(th_cc);
						 $("#li_box3,#dest_y,.Maskc1").hide();
						 $("#dsj_dd").html('<div class="elect"><div class="election_l"><b class="oncc"></b><span class="on">'+(th_cc)+'</span></div><div class="election_r"><a href="http://m.amap.com/navi/?start=&dest=116.314315,39.982103&destName=北京中关村店&key=94ca4100199c2f2a8f33300cece2eba2"><b class="nus"></b>查看路线</a></div></div>').addClass('yjsb1');
						 $("#my_qz").addClass('my_qz');
						 $("#ddwecz").val($(this).attr('id'))
					     $("html,body").css({"overflow-y": "auto",'height':'auto'});
						})
						
						$("#dest_y span").click(function(){
							$("#dest_y,.Maskc1").hide();
							$("html,body").css({"overflow-y": "auto",'height':'auto'});			  
						})
				    });
			}
			        
		});
		
	}
	
	
	
	
	
	
	function ass2(ways_id){
		$(".Maskc2").remove();
		if($("#weik").text()==''){
			$(".Maskc1").remove();
			$("html,body").height($(window).height()).css({"overflow-y": "hidden"});			
			$(window.document.body).append('<div class="f_bz"><div class="f_bz_top">抱歉，您的问题不支持上门服务，请选择其他方式维修</div><ul><li><a href="tel:400-9911-906">马上咨询</a></li><li id="ery" ><a href="javascript:void(0);" >暂不咨询</a></li></ul></div><div class="Maskc2" style="display:block"></div>');
			$("#ery").click(function(){
				$(".f_bz").remove();
				$("html,body").css({"overflow-y": "auto",'height':'auto'});
				$(".Maskc2").css({"top": "162px"});
			})
		}
		
		
		
		$("#fwq").remove();
		$("#ddwecz").remove();
		$("#yjwecz").remove();
		$("#u_name").attr("placeholder", "我们怎么称呼您");
		$("#u_phone").attr("placeholder", "能联系到您的手机号码");
		//alert(ways_id);
		$.ajax({
			url: "/Home/Index/shangmen",
			//data:{'id':id},
			dataType: "html",
			type:'get',
			success: function (data) {
			    $("#ff").html(data);
			    $("#fwq").remove();
					$("#dsj_dd").remove();
					$("#idtu").remove();
					$("#idtu1").remove();
					$("#wsdt_box").remove();
					$("#name_4").before('<div class="row" id="idtu"><i class="addr_ass" style=" z-index:10; "></i><input id="fanwei" type="hidden" name="fanwei"/><input id="fanweia" type="hidden" name="fanweia"/><input id="dasj" type="hidden" name="dasj"><input id="dasjc" type="hidden" name="dasjc"><label class="bqf">上门地址：</label><div class="rootu"><input readonly="true " type="text" class="txt" name="shill" id="ditu" placeholder="选择如小区/大厦/学校 " autocomplete="off"><i class="ddttb"></i></div></div><div class="row" id="idtu1"><label class="bqf">详细地址：</label><div class="rootu"><input type="text" class="txt" name="address" id="ditu1"  onfocus="NEW_L()" onblur="NEW_c()" placeholder="例16号楼402室" autocomplete="off"></div></div><div id="wsdt_box"></div>')
				    
					
					
					
				//触发地图事件
				$("#ditu").click(function(){
					 $("html,body").height($(window).height()).css({"overflow-y": "hidden"});
					 $(".amap-sug-result").remove();
				    
					$.ajax({
						url: "/Home/Index/locaddr",
						data:{id:'id'},
						dataType: "html",
						type:'get',
						success: function (data) {
							
							//$this.attr("disabled", "true");
						    $("#wsdt_box").html(data);
							//输入时触发的事件
							$("#keyword").focus(function(){
								/*$(".amap-sug-result").css({
									'visibility':'visible',
									'display':'block',
									'left:':'11px',
									'top':'42px',
									'min-width':'1865px',
									}).hide();
									*/
								//console.log(ddl)
								$('#tip>span').animate({'left':'-35px'},200);
								$('.gjz').animate({'padding-left':'12px','padding-right':'45px'},200);
								$('.gjz>i').animate({'left':'12px'},200);
								$('#tip>em').animate({'right':'0px'},200);
								
								
								$(".amap-sug-result").css({'display':'block'})
								$(".amap-sug-result").css({'visibility':'visible'})
							})
							//输入时触发的事件
							
							//输入时回车的事件
							$('#keyword').keydown(function(e){
								$(".talk_xz").remove();
								if(e.keyCode==13){
									
									$(window.document.body).append('<div class="talk_xz">请从下列地址中选择</div>')
									$(".talk_xz").animate({"opacity":"0"},2000)
									alert('请从下列地址中选择')
								}
							}) 
							//输入时回车的事件
							
							//取消事件
							$("#tip>em").click(function(){
								$('#tip>span').animate({'left':'0px'},200);
								$('.gjz').animate({'padding-left':'35px','padding-right':'12px'},200);
								$('.gjz>i').animate({'left':'38px'},200);
								$('#tip>em').animate({'right':'-40px'},200);
								$("#keyword").val('');
							})
							//取消事件
							//返回上一步
							$("#tip>span").click(function(){
								$("#container,#show,#tip").hide();
								$("html,body").css({"overflow-y": "auto",'height':'auto'});
							})
							//返回上一步
							
							
							var map, geolocation;
							//加载地图，调用浏览器定位服务
							map = new AMap.Map('container', {
							
							});
							
							map.plugin(["AMap.Scale"],function(){                         //加载插件
								var scale = new AMap.Scale();                             //new对象
								map.addControl(scale);                                    //插入对象
							});
							
							
							//写字楼撒选
							$(".sxpd ul li").click(function(){
								$(this).addClass('onx').siblings().removeClass('onx');
							});
							$("#pdsa").click(function(){
								fzzbjs()
							});
							$("#pdsa1").click(function(){
								fzzbjs("写字楼")
							});
							$("#pdsa2").click(function(){
								fzzbjs("小区")
							});
							$("#pdsa3").click(function(){
								fzzbjs("学校")
							});
							//写字楼撒选
							
							
							map.setZoom(16);
							var items=[];
							var idd=[];
							var lng=[];
							var lat=[];
							var wdzs=[]
							
							//console.log(map.getCenter())      //打印中心点
							
							
							var mk= new AMap.Marker({
								map:map,
								//draggable:true                      //设置点标记是否可拖拽移动，默认为false
							});
							
							mk.hide();
							
														
							//输入检索
							var windowsArr = [];
							var marker = [];
							AMap.plugin(['AMap.Autocomplete','AMap.PlaceSearch'],function(){
							  var autoOptions = {
								city: "北京", //城市，默认全国
								input: "keyword",//使用联想输入的input的id
								//count: 20
								
							  };
							  autocomplete= new AMap.Autocomplete(autoOptions);
							  var placeSearch = new AMap.PlaceSearch({
									city:'北京',
									map:map
									
							  })
							  AMap.event.addListener(autocomplete, "select", select);//注册监听，当选中某条记录时会触发
							  function select(e) {
								  if (e.poi && e.poi.location) {
									  map.setZoom(17);
									  map.setCenter(e.poi.location);
									  console.log(mk.getPosition());
									  fzzbjs()
									  $("#pdsa").click();
								  }
							  }
							  
							  /*AMap.event.addListener(autocomplete, "select", function(e){
								 //TODO 针对选中的poi实现自己的功能
								 //placeSearch.search(e.poi.name);
								 mk.setPosition(map.getCenter());        //设置点标记位置
								 //console.log(e);
								 //console.log(e.poi.name);
								 mk.setPosition(map.getCenter()); 
								 console.log(e.poi.name);
								 console.log(e.poi.id);
								 console.log(e.poi.location.lat);
								 console.log(e.poi.location.lng);
								 
								 
								 
							  });*/
							});
							
							
							
							
							//输入检索
							
							//封装周边检索
							function fzzbjs(jsbc){
							    items.length = 0;
								idd.length = 0;
							    lng.length = 0;
							    lat.length = 0;
								wdzs.length = 0;
							    //$("#item_list").remove();
								//$("#show").append('<div id="item_list"></div>')
								//alert(1)
								//$(".mar_top15").remove();
								$("#item_list").empty();
								mk.setPosition(map.getCenter());        //设置点标记位置
								
								map.plugin(['AMap.PlaceSearch'], function (){
								var pl = new AMap.PlaceSearch({
									    extensions:'all',
										type:jsbc,
										pageSize:40
									});
									pl.searchNearBy('',map.getCenter(),1000);
									//pl.setPageIndex(20)
									//pl.search('香山')
									AMap.event.addListener(pl,'complete',function(e){                
										console.log(e);
										
										var pois=e.poiList.pois;
										var n=pois.length>25?25:pois.length;
										for(var i=0;i<n;i++){
											items.push(pois[i]['name']);
											wdzs.push(pois[i]['address'])
											idd.push(pois[i]['id']);
											lng.push(pois[i].location.lng);
											lat.push(pois[i].location.lat);
										}
											//console.log(items);
											new Render(items).showUI();
						
									})
								});
								
								var Render=function(items){
								this.items=items;                                //获取的数组
								this.idd=idd; 
								this.lng=lng; 
								this.lat=lat; 
								this.wdzs=wdzs; 
								this.list=document.getElementById('item_list');   //父容器
										 
								};
								Render.prototype={
									
									_addItem:function(data,i){
										//console.log(this.idd[i]);
										
										var el=document.createElement('div');
										var esl=document.createElement('span');
										
										el.className='mar_top15 item_'+i;
										el.innerHTML=data;
										el.setAttribute("data-ID",this.idd[i]);
										el.setAttribute("data-lng",this.lng[i]);
										el.setAttribute("data-lat",this.lat[i]);
										esl.innerHTML=this.wdzs[i];
										
										
										//this.list.innerHTML=el;
										//document.getElementById("item_list").innerHTML=el;
										//$(".mar_top15").remove();
										
										this.list.appendChild(el);
										el.appendChild(esl);
										},
										showUI:function(items){
											for(var i=0,n=(this.items.length>25?25:this.items.length);i<n;i++){
												this._addItem(this.items[i],i+0);
												}
												//点击准确位置返回input
											 $("#item_list>div").click(function(event){
												  console.log($(this).text());
												  console.log($(this).attr('data-ID'));
												  console.log($(this).attr('data-lng'));
												  console.log($(this).attr('data-lat'));
												  var wsiid=$(this).attr('data-ID');
												  var wsjd=$(this).attr('data-lng');
												  var wswd=$(this).attr('data-lat');
												  var qqddz=$(this).html();
												  var wksqg= qqddz.split("<");
												  $("#ditu").val(wksqg[0]);
												  //alert($(this).text())
												  $("#ditu").attr("data-ID",wsiid);
												  $("#ditu").attr("data-lng",wsjd);
												  $("#ditu").attr("data-lat",wswd);
												  $("#wsdt_box").remove();
												  $("#fanwei").val(wsiid+','+wsjd+','+wswd);
												  $("#name_4").before('<div id="wsdt_box"></div>');
												  event.stopPropagation();
												  $("html,body").css({"overflow-y": "auto",'height':'auto'});
												  
											  })
											  //点击准确位置返回input
											 cscg();
											  
											  
											  
											 
											}
										 
										 
										};
							}
							//封装周边检索
							
							//监听拖拽事件
							AMap.event.addListener(map,'dragend',function(){                
							    
								fzzbjs()
								$("#pdsa").click();
								
							});
							//监听拖拽事件
							
							                 
							
										
										
										
							
							
							
							
							
							
							
							map.plugin('AMap.Geolocation', function() {
								
								geolocation = new AMap.Geolocation({
									enableHighAccuracy: true,//是否使用高精度定位，默认:true
									timeout: 10000,          //超过10秒后停止定位，默认：无穷大
									maximumAge: 0,           //定位结果缓存0毫秒，默认：0
									convert: true,           //自动偏移坐标，偏移后的坐标为高德坐标，默认：true
									showButton: true,        //显示定位按钮，默认：true
									buttonPosition: 'LB',    //定位按钮停靠位置，默认：'LB'，左下角
									buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
									showMarker: true,        //定位成功后在定位到的位置显示点标记，默认：true
									showCircle: false,        //定位成功后用圆圈表示定位精度范围，默认：true
									panToLocation: true,     //定位成功后将定位到的位置作为地图中心点，默认：true
									zoomToAccuracy:true,     //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
									showButton:true          //是否显示定位按钮
									
								});
								    
								map.addControl(geolocation);
								geolocation.getCurrentPosition();
								AMap.event.addListener(geolocation, 'complete', onComplete);//返回定位信息
								AMap.event.addListener(geolocation, 'error', onError);      //返回定位出错信息
							});
							
							        $(".amap-geo").click(function(){
										$(this).css({'background-position':'9px -224px'})
									})
							
							//解析定位结果
							function onComplete(data) {
								var str=['定位成功'];
								str.push('经度：' + data.position.getLng());
								str.push('纬度：' + data.position.getLat());
								str.push('精度：' + data.accuracy + ' 米');
								str.push('是否经过偏移：' + (data.isConverted ? '是' : '否'));
								//document.getElementById('tip').innerHTML = str.join('<br>');
								
								map.setZoom(16);                  //设置地图缩放比
								$('.amap-geo').css({'background-position':'9px -183px'})
								fzzbjs()
								 $("#pdsa").click();
								 
							
							}
							
							
							
							
							
							//解析定位错误信息
							function onError(data) {
								//document.getElementById('tip').innerHTML = '定位失败';
							}
							
							
							
							//多边形
							/*var polygonArr = new Array();//多边形覆盖物节点坐标数组
							polygonArr.push([115.880759,40.204716]);
							polygonArr.push([115.389121,39.015593]);
							polygonArr.push([117.660545,39.141388]);
							polygonArr.push([117.638572, 40.353488]);
							var  polygon = new AMap.Polygon({
								path: polygonArr,//设置多边形边界路径
								strokeColor: "#FF33FF", //线颜色
								strokeOpacity: 0.2, //线透明度
								strokeWeight: 3,    //线宽
								fillColor: "#1791fc", //填充色
								fillOpacity: 0.35//填充透明度
							});
							
							
							var polygonArr = new Array();//多边形覆盖物节点坐标数组
							polygonArr.push([116.990379,39.129671]);
							polygonArr.push([115.41909,38.503724]);
							polygonArr.push([117.586387,38.848943]);
							polygonArr.push([117.749809,39.17227]);
							var  polygon1 = new AMap.Polygon({
								path: polygonArr,//设置多边形边界路径
								strokeColor: "#FF33FF", //线颜色
								strokeOpacity: 0.2, //线透明度
								strokeWeight: 3,    //线宽
								fillColor: "#1791fc", //填充色
								fillOpacity: 0.35//填充透明度
							});
							var wozb=[117.19431,39.114045]//我的为止
	
							polygon.setMap(map);
							polygon.setExtData('北京')
							var ssd=polygon.contains(wozb)
							var ssd1=polygon1.contains(wozb)
							
							
							polygon1.setMap(map);
							polygon1.setExtData('天津')
							//alert(qjbldc)
							
							//polygon.hide(); //隐藏多边形
							//var mj=polygon.getArea();   //面积
							//var zb='116.403322, 39.920244'
							//var zzjj=polygon.contains(mk)
//							console.log(ssd1);
//							
//							console.log(polygon.getExtData());
//							console.log(wozb);
							
							if(ssd){
								console.log('北京');
							}else if(ssd1){
								console.log('天津');
							}else{
								console.log('不在范围内');
							}
							*/
		  
							//多边形
							
							
							function cscg(){
								 //测试
							$("#item_list>div").click(function(){
								$(".f_bz").remove();
								var th_jd=parseFloat($(this).attr('data-lng'));
								var th_wd=parseFloat($(this).attr('data-lat'));
								/*var qjbldc = new Array();
								qjbldc[0] = th_jd
								qjbldc[1] = th_wd*/
								//qjbldc1=qjbldc.push[qjbldc.join()];
								var qjbldc1=[th_jd,th_wd];
								//qjbldc2=qjbldc1.split()
								console.log(qjbldc1);
								
								
								//多边形
								var polygonArr = new Array();//多边形覆盖物节点坐标数组
								polygonArr.push([116.103917,40.002339]);
								polygonArr.push([116.090184,40.014961]);
								polygonArr.push([116.094304,39.981296]);
								polygonArr.push([116.139622,39.882309]);
								polygonArr.push([116.103917,39.70504]);
								
								polygonArr.push([116.316777,39.694474]);
								polygonArr.push([116.331883,39.698701]);
								polygonArr.push([116.480199,39.729336]);
								
								polygonArr.push([116.675206,39.827489]);
								polygonArr.push([116.708165,39.933927]);
								polygonArr.push([116.699925,39.997079]);
								polygonArr.push([116.627141,40.093798]);
								polygonArr.push([116.548863,40.145256]);
								polygonArr.push([116.428013,40.156802]);
								polygonArr.push([116.259099,40.168347]);
								polygonArr.push([116.154729,40.129508]);
								polygonArr.push([116.142369,40.074886]);
								polygonArr.push([116.106663,40.032839]);
								var  polygon = new AMap.Polygon({
									path: polygonArr,//设置多边形边界路径
									strokeColor: "#FF33FF", //线颜色
									strokeOpacity: 0.2, //线透明度
									strokeWeight: 3,    //线宽
									fillColor: "#1791fc", //填充色
									fillOpacity: 0.35//填充透明度
								});
								
								
								var polygonArr = new Array();//多边形覆盖物节点坐标数组
								polygonArr.push([117.032262,39.287512]);
								polygonArr.push([117.087193,39.012748]);
								polygonArr.push([117.437382,39.038353]);
								polygonArr.push([117.357732,39.322579]);
								var  polygon1 = new AMap.Polygon({
									path: polygonArr,//设置多边形边界路径
									strokeColor: "#FF33FF", //线颜色
									strokeOpacity: 0.2, //线透明度
									strokeWeight: 3,    //线宽
									fillColor: "#1791fc", //填充色
									fillOpacity: 0.35//填充透明度
								});
								//var wozb=[116.414449, 39.9055]//我的为止
								//console.log(wozb);
								polygon.setMap(map);
								polygon.setExtData('北京');
								
								polygon1.setMap(map);
								polygon1.setExtData('天津')
								
								var ssd=polygon.contains(qjbldc1)
								var ssd1=polygon1.contains(qjbldc1)
								
								
								
								//alert(qjbldc)
								
								polygon.hide(); //隐藏多边形
								polygon1.hide(); //隐藏多边形
								//var mj=polygon.getArea();   //面积
								//var zb='116.403322, 39.920244'
								//var zzjj=polygon.contains(mk)
	//							console.log(ssd1);
	//							
	//							console.log(polygon.getExtData());
	//							console.log(wozb);
								
								if(ssd){
									console.log('北京');
									$("#ditu").attr("data-fwq",'北京');
									$("#fanweia").val('北京服务范围')
									
									
									
								}else if(ssd1){
									console.log('天津');
									$("#ditu").attr("data-fwq",'天津');
									$("#fanweia").val('天津服务范围')
								}else{
									console.log('不在范围内');
									//$("#ditu").attr("data-fwq",'不在范围内');
									$("#ditu").val("");
									$("#ditu").removeAttr("data-lng");
									$("#ditu").removeAttr("data-lat");
									$("#ditu").removeAttr("data-ID");
									$("#fanwei").val('')
									$("#fanweia").val('')
									
									
									$(".Maskc1").remove();
									$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
									$(window.document.body).append('<div class="f_bz"><div class="f_bz_top">您选择的区域暂未开通上门，如有需求请咨询客服</div><ul><li><a href="tel:400-9911-906">马上咨询</a></li><li id="ery" ><a href="javascript:void(0);" >暂不咨询</a></li></ul></div><div class="Maskc1" style="display:block">');
									$("#ery").click(function(){
										$(".f_bz").remove();
										$("html,body").css({"overflow-y": "auto",'height':'auto'});
										$(".Maskc1").hide();
									})
					                					
								}
								
			                     
								//多边形
								
							})
							
							//测试
							}
							
						}
						    
						
					});	
					
			    })
				
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
			 $("#my_droce").text(chuanz);
			 
			 
			 
			 var wsfgf= chuanz.split("-");
			 var riqi=wsfgf[2].split(" ");
			 var riqi=wsfgf[2].split(":");
			 var riqic=riqi[0].split(" ");
			 var riqicr=riqic[0];
			 var khdy=riqi[0].split("(");
			 var lkgh=riqi[riqi.length-2].split("");
			 var cdfse = lkgh[lkgh.length-2].concat( lkgh[lkgh.length-1] );
			 
			 //console.log(wsfgf[0]);
//			 console.log(wsfgf[1]);
//			 console.log(riqicr);
//			 console.log(khdy[khdy.length-1]);
//			 console.log(cdfse)
			 
			 //var th_wd=parseFloat($(this).attr('data-lat'));
			 var nn=parseInt(wsfgf[0]);
			 var yy=parseInt('0'+wsfgf[1]);
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
			 //console.log(mmb);
//			 console.log(mmbc);
			 $("#dasj").val(mmb)
			 $("#dasjc").val(mmbc)
			 
			 
			 $("html,body").css({"overflow-y": "auto",'height':'auto'});
		  })
	      $("#dest_y span").click(function(){
			  $("#dest_y,.Maskc1").hide();
			  $("html,body").css({"overflow-y": "auto",'height':'auto'});			  
		  })
	
	    })
	
				
				
				
				
          
				
					
					
			}
		});	
	}
	
	
	$("body").ajaxStart(function(){ 
			$(this).append('<div class="jztp"><img src="/Public/img/jz.gif"/></div>');
			$(".Maskc1").show();
			$("#wos_86").hide()
			$("#slm").hide();
			console.log(1);
		});
		$("body").ajaxStop(function(){
			$(".jztp").remove();
			$("#slm").show();
			$("#wos_86").show()
			$(".Maskc1").hide();
		});
	
function ajaxsheng(sheng){
	     $(".jztp").remove();
	
	    
		
		$.ajax({
			url: "/Home/Index/shi",
			data:{'id':sheng},
			dataType: "html",
			type:'get',
			success: function (data) {
				//$this.attr("disabled", "true");
			$("#slm").html( data);
			}
		});	
        $('#slm>li').click(function(){
			var sl=$(this).find("a").text();
			var sda=$(".tc_dizhi h1").text(sl);
		});
	
		/*var ways_id=document.getElementById('ways_id').value;
		//alert(ways_id)
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/shi/id/"+sheng+"/ways_id/"+ways_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('slm').innerHTML=ajax.responseText
				}
				
			}
			$("#slm>li").click(function(){
				var sl=$(this).find("a").text();
				var sda=$(".tc_dizhi h1").text(sl);
			});
			*/
		    
			
	}
	
	
	
	function ajaxshi(shi){
		$(".jztp").remove();
		/*$("body").ajaxStart(function(){ 
			$(this).append('<div class="jztp"><img src="/Public/img/jz.GIF"/></div>');
			$(".Maskc1").show();
			$("#list>ul").remove();
			$("#slm").hide();
		});
		$("body").ajaxStop(function(){
			$(".jztp").remove();
			$("#slm").show();
			//$(".Maskc1").hide();
		});*/
		
		$.ajax({
			url: "/Home/Index/qu",
			data:{'id':shi},
			dataType: "html",
			type:'get',
			success: function (data) {
				//$this.attr("disabled", "true");
			$("#slm").html( data);
			}
		});	
		$("#sqlm>li").click(function(){
			var sqlm=$(this).find("a").text()
			$(".tc_dizhi h1").append(">"+sqlm)
		});
		
		
		
		/*//document.getElementById('ss').style.display='block';
		var ways_id=document.getElementById('ways_idd').value;
		//alert(ways_id)
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/qu/id/"+shi+"/ways_id/"+ways_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('slm').innerHTML=ajax.responseText
				}
			}
			//alert(1)
			$("#sqlm>li").click(function(){
				var sqlm=$(this).find("a").text()
				$(".tc_dizhi h1").append(">"+sqlm)
			});*/
	}
	
	function ajaxqu(qu){
		$(".jztp").remove();
		/*$("body").ajaxStart(function(){ 
			$(this).append('<div class="jztp"><img src="/Public/img/jz.GIF"/></div>');
			$(".Maskc1").show();
			$("#list>ul").remove();
			$("#slm").hide();
		});
		$("body").ajaxStop(function(){
			$(".jztp").remove();
			$("#slm").show();
			//$(".Maskc1").hide();
		});*/
		
		$.ajax({
			url: "/Home/Index/dizhia",
			data:{'id':qu},
			dataType: "html",
			type:'get',
			success: function (data) {
				//$this.attr("disabled", "true");
			$("#ff").append( data);
			}
		});	
		$("#qklm>li").click(function(){
			var sqlmff=$(this).find("a").text()
			$(".tc_dizhi h1").append(">"+sqlmff);
			$(".Maskc1").css({'display':'none'});
			$(".tc_dizhi").css({'display':'none'});
			//alert($(".tc_dizhi>h1").text())
			//$(".gb_ce>input").val("");
			$("#shill").val("")//.remove();
			$("#shill").val($(".tc_dizhi h1").text());
			$("html,body").css({"overflow-y": "auto",'height':'auto'});
		})
			    

		
/*		var ways_id=document.getElementById('ways_iddd').value;
		//alert(ways_id)
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/dizhia/ways_id/"+ways_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					//document.getElementById('ff').innerHTML=ajax.responseText
					$("#ff").append(ajax.responseText)
				}
				
				
				
				
			}
			    
			
			
			$("#qklm>li").click(function(){
					var sqlmff=$(this).find("a").text()
					$(".tc_dizhi h1").append(">"+sqlmff);
					$(".Maskc1").css({'display':'none'});
					$(".tc_dizhi").css({'display':'none'});
					//alert($(".tc_dizhi>h1").text())
					//$(".gb_ce>input").val("");
					$(".gb_ce>input").val("")//.remove();
					$(".gb_ce>input").val($(".tc_dizhi h1").text());
					$("html,body").css({"overflow-y": "auto",'height':'auto'});
				})*/
	}
	
	function NEW_L(){
			$(".cldrt_1").css({'position':'static'});
			$("#wos_86").css({'padding-bottom':'0'})
	}
	
	function NEW_c(){
			$(".cldrt_1").css({'position':'fixed'})
	}
	
	
	
	
	function sma(ways_id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/yuyueshijian/id/"+ways_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('sma').innerHTML=ajax.responseText
				}
	
             }


                
	}
	function shijian(sjid){
		//alert(sj);
		//var yid=document.getElementById('yid').value;
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/riqi/sjid/"+sjid,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('rq').innerHTML=ajax.responseText
				}
}
	}
	function shij(sd){
		//alert(sd)
	var sjid=document.getElementById('sjid').value;
		//ssalert(yid)
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/sja/sd/"+sd+"/sjid/"+sjid,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('xc').innerHTML=ajax.responseText
				}
}
	}
</script>