<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-余额提现</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
/*320px布局*/
html{font-size: 100px;}
body{ font-size: 0.12rem;/*实际相当于12px*/ }

/* iphone 6 */
@media (min-device-width : 375px) and (max-device-width : 667px) and (-webkit-min-device-pixel-ratio : 2){
    html{font-size: 117.1875px;}
}
/* iphone6 plus */
@media (min-device-width : 414px) and (max-device-width : 736px) and (-webkit-min-device-pixel-ratio : 3){
    html{font-size: 129.375px;}
}



</style>
</head>

<body>


    <div class="toamu_xho" style="display:none;">
        
    </div>



<div class="header">
    <a href="/Home/Gouwuche/my_wallet"><span></span></a>
    <h1>余额提现</h1>
    <em class="lsycrd"><a href="/Home/Gouwuche/tixianxinxi">提现信息</a></em>
</div><!--头-->
<div class="content">
    <div class="content_con">
        <div class="buttcmk">
            <h2 class="fhuop_name"><?php echo ($user_username); ?></h2>
            <strong class="fhuop_yeu">余额(元)</strong>
            <h1 class="fhuop_jucan"><?php echo ($yuemoney); ?></h1>
        </div>
        <div class="buttcmk_com">
            <form method="post" action="/Home/Gouwuche/tijiaoshenqing" onSubmit="return Checkedr()">
                <ul class="hcoompe">
                    <li>
                        <div class="omkkcti">提现金额(元)</div>
                        <div class="omkkcti">
                            <div class="omkkcti_inp_box">
                                <input class="money" id="money" name="amt" placeholder="请输入提现金额" type="tel" autocomplete="off"/>
								<input type="hidden" name="am" value='<?php echo ($yuemoney); ?>'>
                            </div>
                        </div>
                        <div class="omkkcti">账户信息</div>
                        <div class="omkkcti">
                            <div class="omkkcti_r fr" onClick="tianjia()">添加银行卡</div>
                            <div class="omkkcti_l"><?php echo ($user_username); ?></div>
                        </div>
                    </li>
					<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="mlb_houc">
                        <div class="yingh_r fr"><input class="xua_zu" type="radio" name="yinhang_id" value="<?php echo ($kk["yinhang_id"]); ?>"><em class="xua_zu_num"></em></div>
                        <div class="yingh_l"><?php echo ($kk["kahao"]); ?>(<?php echo ($kk["yinhang_name"]); ?>)</div>
                    </li><?php endforeach; endif; ?>
                </ul>
                <button  class="submit_sd submit_sd_tx" type="submit">提交申请</button>
            </form>
        </div>
    </div>
</div>


<script>



$(function(){
	$('input:radio[name="yinhang_id"]').eq(0).attr("checked",true).next().addClass('on');
	$(".mlb_houc").click(function(){
	   $(this).find('input').attr("checked",true);
	   $('input:radio[name="yinhang_id"]').each(function(){
		  if($(this).attr('checked')){
			  $(this).next().addClass('on')
		  }else{
			  $(this).next().removeClass('on')
		  }
	  })
   })
})
function tianjia(){
	$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
	$(window.document.body).append('<div class="toamu_xho"></div><div class="Maskc3" style="display:block"></div>');
	
	$.ajax({
			url: "/Home/Gouwuche/yianghc",
			//data:{'cpk_id':cpk_id},
			dataType: "html",
			type:'get',
			success: function (data) {
			    $(".toamu_xho").html( data);
				
				$(".mmbuttcn").click(function(){
					$(".toamu_xho").remove();
					$(".Maskc3").remove();
					//$("html,body").css({"overflow-y": "auto",'height':'auto'});
					//$("#kk").show();
					//event.stopPropagation();
					
					
				})
				
			}
	})
	
}


/*function Checkedrmmop(){
	alert(1)
	var reg = /^[0-9]*$/
	var kaopoa_a=$("#kaopoa_a").val();
	if(kaopoa_a ==''){
		$("#kaopoa_a").val('')
		$("#kaopoa_a").focus().addClass("tips");
		$("#kaopoa_a").attr("placeholder", "请输入卡号");
		return false;
	}
	return true;
}*/


function Checkedr(){
	var reg = /^[0-9]*$/
	var qxzdz=$("#money").val();
	if(qxzdz =='' || qxzdz == null || !reg.test(qxzdz)){
		$("#money").val('')
		$("#money").focus().addClass("tips");
		$("#money").attr("placeholder", "请输入金额");
		return false;
	}
	if ( $(".xua_zu").length == 0 ) {
		$(".omkkcti_r").click()
		return false;
	}

	
	
	
	return true;
}
</script>

</body>
</html>