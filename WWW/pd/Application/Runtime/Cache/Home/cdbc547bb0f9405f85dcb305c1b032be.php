<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-工程师-修前检测</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style type="text/css">
a{text-decoration:none;}
#le{float:left;}
#list{float:left;margin-left:30px;}

.tianjbj{ background:#fff; color:#4c4c4c;}
.tianjbj>h1{ font-size:18px;  font-weight:normal;  height:50px; line-height:50px; text-align:center; border-bottom:1px solid #e5e5e5;}
.kmcobu{ }
.kmcobu_mk{ padding:0 12px;}
.kmcobu>ul>li{ font-size:14px; line-height:40px; border-bottom:1px solid #e5e5e5;}
.kmcobu>ul>li .clli_list{ height:40px; line-height:40px; margin-right:100px;
text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.kmcobu>ul>li .clli_list_y{ float: right; height:40px; line-height:40px; display:inline-block; margin:0; vertical-align:middle; color:#ff7e00;}

.muncvrt{ padding:0 12px; display:none;}
.muncvrt ul li{border-bottom:1px solid #e5e5e5; padding:0 12px; height:38px; line-height:38px; color:#808080;}
.my_biaoanm{ display: none;}
.my_biaoanm1{ display:none;}
.tianjbj1{ margin-top:16px;}
.muncvrt1{ display:block;}


.kmcobu1{ }
.kmcobu_mk{ padding:0 12px;}
.kmcobu1>ul>li{ font-size:14px; line-height:40px; border-bottom:1px solid #e5e5e5;}
.kmcobu1>ul>li .clli_list{ height:40px; line-height:40px; margin-right:100px;
text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.kmcobu1>ul>li .clli_list_y{ float: right; height:40px; line-height:40px; display:inline-block; margin:0; vertical-align:middle; color:#ff7e00;}
.dimnbvr{ height:50px; background:#fff; position:fixed; width:100%; bottom:0px; border-top:1px solid #e5e5e5;}
.qunyyc{ width:35%; float:right;}
.qunyyc input{ width:100%; height:50px; line-height:50px; text-align:center; color:#fff; font-size:16px; background:#3e7edb;}
.qunyyc_y{ height:100%; margin-right:35%; text-align:center;}
.qunyyc_y_top{ height:30px; vertical-align:bottom; color:#ff7e00; font-size:16px; line-height:30px;}
.qunyyc_y_bon{ height:20px; line-height:20px; font-size:10px; color:#808080; margin-top:-7px;}
.kmcobu_mm{  padding:2px 12px 20px; overflow:hidden; text-align:center;}
.kmcobu_mm input {
    width: 30%;
    height: 35px;
    line-height: 35px;
    border: 1px solid #e5e5e5;
    padding: 8px;
	font-size:14px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
}
.kmcobu_mm span{ color:#4c4c4c; margin-left:12px;}
.tianjbj>h1.mlophu{ border-bottom:none;}
</style>
</head>
<body  style=" background:#f0f0f0;">
<div class="header">
    <span><a href="/Home/Shifu/daiwancheng"></a></span>
    <h1>产品添加</h1>
    <em class="lsycrd"><a id="congzhi" href="javascript:void(0)">重置</a></em>
</div><!--头-->

<div class="content">
    <div class="content_con" >
<form method="post" action="/Home/Shifu/xiugaiadd">
<input type="hidden" name="id" value='<?php echo ($id); ?>'>
    <div class="tianjbj">
        <h1>添加配件</h1>
        <div class="kmcobu">
        <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><ul>
            
                <li>
                    <div class="kmcobu_mk">
                        <div class="clli_list_y">
                            <span class="yymuck"><?php echo ($kk["cpp_price"]); ?></span>元 <span class="xialagg"></span>
                        </div>
                        <div class="clli_list">
                            <?php echo ($kk["cpk_name"]); ?>
                        </div>
                       
                    </div>
                </li>
                 <div class="muncvrt">
                     <ul class="ppomuyu">
                         <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><li>
                                 <?php echo ($ee["cangku_name"]); ?> <input class="my_biaoanm" type="checkbox" name="cangku_id[]" value='<?php echo ($ee["cangku_id"]); ?>'><span></span>
                             </li><?php endforeach; endif; ?> 
                     </ul>
                 </div>
            
            </ul><?php endforeach; endif; ?>
        </div>
    </div>
    <div class="tianjbj tianjbj1">
        <h1>回收配件</h1>
        <div class="kmcobu1">
            <ul>
               <?php if(is_array($arr11)): foreach($arr11 as $key=>$k): ?><li>
                      <div class="kmcobu_mk">
                           <div class="clli_list_y">
                               <span class="nnoopmk"><?php echo ($k["cpk_price"]); ?></span>元 <span class="xialagg"></span>
                           </div>
                           <div class="clli_list">
                               <?php echo ($k["cpk_name"]); ?> <input class="my_biaoanm1" type="checkbox" name="cppk_id[]" value='<?php echo ($k["cpk_id"]); ?>'>
								<input type="hidden" name="amount" value='' id='amount'>
                           </div>
                         
                       </div>
                   </li><?php endforeach; endif; ?> 
           </ul>
       </div>
    </div>
    
    <div class="tianjbj tianjbj1">
        <h1 class="mlophu">添加维修费用</h1>
        <div class="kmcobu_mm">
            <ul>
               <li>
                   <div class="">
                       <input type="tel" name='wxfy' placeholder="请输金额" id="hsur_jine" value=""/><span>元</span>
                   </div>
               </li>
           </ul>
       </div>
    </div>











	<?php if(is_array($arr9)): foreach($arr9 as $key=>$k): ?><a href='javascript:void(0)'onclick='j()'><?php echo ($k["brand_name"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
	<div id='le'>
	
	</div>


    
    
    
    
    <!--<div onClick="congzhi()">ss</div>-->
    
    <!--<h1>配件</h1>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a href="javascript:void(0)"onclick=''><h3><?php echo ($kk["cpk_name"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["cpp_price"]); ?>元&nbsp;&nbsp;&nbsp;&nbsp;</h3>
		<?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><input  type="checkbox" name="cangku_id[]" value='<?php echo ($ee["cangku_id"]); ?>'><?php echo ($ee["cangku_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp; 数量(<?php echo ($ee["numss"]); ?>)&nbsp;&nbsp;&nbsp;<br /><?php endforeach; endif; ?><br /><br /><?php endforeach; endif; ?>
	<h1>回收:</h1>
	<?php if(is_array($arr11)): foreach($arr11 as $key=>$k): ?><input type="checkbox" name="cppk_id[]" value='<?php echo ($k["cpk_id"]); ?>'><?php echo ($k["cpk_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($k["cpk_price"]); ?>元<br /> <br /><?php endforeach; endif; ?>-->
    
    
	
        <div class="dimnbvr">
            <div class="qunyyc">
                <?php echo ($b); ?>
            </div>
            <div class="qunyyc_y">
                <div class="qunyyc_y_top">计总价：<span id="jiakk">0</span>(元)</div>
                <div class="qunyyc_y_bon">客户所需付款额</div>
            </div>
        </div>
	</form>
    
    
    
    
    </div>
</div>

</body>
</html>
<script type="text/javascript">

/*window.onload=function(){
var congzhi=document.getElementById("congzhi")
    congzhi.onclick=function(){
		$("input[type='checkbox']").each(function(){
			$(this).attr("checked",false);
		})
	}
}*/


$(function(){
	     
		 
		 
		 $("#congzhi").click(function(){
			 $("input[type='checkbox']").each(function(){
				 $(this).attr("checked",false);
			 })
			 $("#hsur_jine").val('');
			 pm()
			 pml()
			 hhtgrt()
			 mkllmuh()
		 })	
	
	
		$(".muncvrt ul li").click(function(){
			$(this).find('input').attr("checked",true).parent().siblings().find('input').attr("checked",false);
			pm()
			hhtgrt() 
			mkllmuh()   
	    })
		
		
		
		
		$(".kmcobu1>ul>li").click(function(){
			$(this).find('input').attr("checked",true).parents('li').siblings().find('input').attr("checked",false);
			pml()
			hhtgrt()
			mkllmuh()   
		})
		
		function pm(){
			$( ".my_biaoanm" ).each(function(){
				if($(this).attr('checked')){
					$(this).next().addClass('on')
				}else{
					$(this).next().removeClass('on')
				}
			})
		}
		
		function pml(){
			$( ".my_biaoanm1" ).each(function(){
				if($(this).attr('checked')){
					$(this).parents('.clli_list').prev().find('.xialagg').addClass('on')
				}else{
					$(this).parents('.clli_list').prev().find('.xialagg').removeClass('on')
				}
			})
		}
		
		$("#hsur_jine").keyup(function(){
		    hhtgrt() 
			mkllmuh()  
		})
		
		
		$(".kmcobu>ul>li").click(function(){
			if($(this).next().hasClass('on')){
				$(this).next().removeClass('on')
				$(this).next().stop(true,false).slideUp();
				$(this).find(".xialagg").css({'background-position':'-71px -321px  '})
			}else{
				$(this).next().addClass('on')
				$(this).next().stop(true,false).slideDown();
				$(this).parent().siblings().find('.muncvrt').stop(true,false).slideUp();
				$(this).parent().siblings().find('.muncvrt').removeClass('on');
				$(this).find(".xialagg").css({'background-position':'-48px -321px '})
				$(this).parent().siblings().find(".xialagg").css({'background-position':'-71px -321px  '})
			}
		})
		
		function mkllmuh(){
             var nnuytr=$("#jiakk").text()
	         $("#amount").val(nnuytr)
			 console.log($("#amount").val());
		 }
		
})


function hhtgrt(){
	//$("#jiakk").text(danjia)
	var s=0;
		$(".kmcobu>ul").each(function(){
		  var uuioc=$(this).find("input[type='checkbox'][name='cangku_id[]'][checked]").length
		  //var uuio=parseInt($(this).find('input[class*=my_biaoanm]').attr('checked'))
		  s+=uuioc*parseInt($(this).find('span[class*=yymuck]').text());
		  //console.log(parseInt($(this).find('span[class*=yymuck]').text()))
		  //console.log(uuioc)
		});
		$(".kmcobu1>ul>li").each(function(){
			var uuiocbb=$(this).find("input[type='checkbox'][name='cppk_id[]'][checked]").length
			console.log(uuiocbb)
			s-=uuiocbb*parseInt($(this).find('span[class*=nnoopmk]').text());
		})
		
		var tel =$("#hsur_jine").val();
        var mobile = /^[0-9]*$/
		
		if($("#hsur_jine").val()==''){
			s+=0
		}else if(!mobile.test(tel)){
			$("#hsur_jine").val('');
		}else{
			s+=parseInt($("#hsur_jine").val())
		}
		
		$("#jiakk").html(s.toFixed(2));
	
	
	/*$( ".muncvrt ul li input" ).each(function(indexr,llop){
	    if($(this).attr('checked')){
		    var hhkm=(parseInt($(this).parents('.muncvrt').prev('li').find(".yymuck").text()));
			//var hhkm=(parseInt($(this).text()));
			
			console.log(hhkm*indexr)
		}
    })*/
}
//hhtgrt()

	function jixing(model_id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Shifu/peijiana/model_id/"+model_id,true)
			//alert(model_id);/* style='display:none'*/
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
			}
	}


</script>