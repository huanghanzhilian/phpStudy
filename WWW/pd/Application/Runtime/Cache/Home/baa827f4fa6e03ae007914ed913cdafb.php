<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>维百士-工程师-售后详情</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>

<style>
body{ background:#f0f0f0;}
.da_con_ce{ position:relative;}
.shifu_qx{  position:absolute; right:0px; top:50%; margin-top:-13px; border:1px solid #b2b2b2; height:26px; width:70px; line-height:26px; border-radius: 4px; text-align:center;}
.tijao_pokl{ background:none; color:#fff; ont-family: "微软雅黑",Helvetica,sans-serif; font-size:14px;}
.komgh_cyu{  display:inline-block;}
.jiedan_ppmbr {
    width: 100%;
    position: fixed;
    bottom: 0px;
    z-index: 1005; background:#3e7edb;
}
</style>
</head>
<body>
<div class="header">
    <span><a href="/Home/Shifu/daiwancheng"></a></span>
    <h1>售后详情</h1>

    <em class="lsycrd">
        <form class="komgh_cyu" method="post" action="http://m.weibaishi.com/phone" onSubmit="return dellk();">
            <input type="hidden" name="id" value='<?php echo ($arr["id"]); ?>'>
            <input class="tijao_pokl" type="submit" value='<?php echo ($xiugai); ?>'>
        </form> 
        <form class="komgh_cyu" method="post" action="/Home/Shifu/chongzhi" onSubmit="return dellk();">
            <input type="hidden" name="id" value='<?php echo ($arr["id"]); ?>'>
            <input class="tijao_pokl" type="submit" value='<?php echo ($chongzhi); ?>'>
        </form> 
    </em>
</div><!--头-->

<div class="content">
    <div class="content_con" >
    
    
		<!--<div >
		姓名:<?php echo ($arr13["username"]); ?><br />
		电话:<?php echo ($arr13["tell"]); ?><br />
		邮寄地址:<?php echo ($arr13["addres"]); ?><br />
		回寄地址:<?php echo ($arr13["addre"]); ?><br />
		机型:<?php echo ($arr["model_name"]); ?><br />
		售后师傅:<?php echo ($arr13["user_username"]); ?><br />
		售后小结:<?php echo ($arr13["xiaojie"]); ?>
		</div>-->
        
        
        <div class="content_con_one">
        
        
        
        <h1 class="da_con_ce">订单编号：<?php echo ($arr["ddh"]); ?><span class="shifu_qx">
		<a id="quxiaopp" data="/Home/Shifu/sfquxiao/id/<?php echo ($arr["id"]); ?>" href="javascript:void(0)" onClick="Checkedr()">
		
		 <?php if(strtoupper($arr['stau']) < 5): ?>取消订单
            <?php else: endif; ?>
		
		</a>
		
		</span>
        </h1>
        
        <div class="da_con">
            <ul>
                <li>
                    客户姓名：<span><?php echo ($arr13["username"]); ?></span>
                </li>
                <li>
                    手机：<span><?php echo ($arr13["tell"]); ?></span>
                </li>
                <li>
                    机型：<span><?php echo ($arr["model_name"]); ?></span>
                </li>
                <li>
                    售后师傅：<span><?php echo ($arr13["user_username"]); ?></span>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal;">故障描述：</strong><span style="display:block; margin-left:70px; margin-right:40px;"><?php echo ($arr13["contentt"]); ?></span>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal;">邮寄地址：</strong><span style="display:block; margin-left:70px; margin-right:40px;"><?php echo ($arr13["addres"]); ?></span>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal;">回寄地址：</strong><span style="display:block; margin-left:70px; margin-right:40px;"><?php echo ($arr13["addre"]); ?></span>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal;">售后小结：</strong><span style="display:block; margin-left:70px; margin-right:40px;"><?php echo ($arr13["xiaojie"]); ?></span>
                </li>
            </ul>
        </div>
        
        <div class="da_con">
            <ul>
                <li>
                    工程师：<span><?php echo ($user_username); ?></span>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal;">维修内容：</strong>
                    <span style="display:block; margin-left:70px; margin-right:40px;">
			            <?php if(is_array($arr10)): foreach($arr10 as $key=>$kk): echo ($kk["cpk_name"]); endforeach; endif; ?>
                    </span>
                   
                </li>
            </ul>
        </div>
        
        <div class="da_con">
            <ul>
                <li>
                    服务方式：<span><?php echo ($ways_name); ?></span>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal;">上门地址：</strong>
                    <span id="get_butt"  data="<?php echo ($fanwei); ?>" style="display:block; margin-left:70px; margin-right:40px;"><?php echo ($arr["shangmen"]); ?></span>
                    <a id="daohang" style=" float:right;" class="ousc" href="http://m.amap.com/navi/?start=&dest=116.314315,39.982103&destName=北京中关村店&key=94ca4100199c2f2a8f33300cece2eba2">导航</a>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal;">预约时间：</strong>
                    <span style="display:block; margin-left:70px; margin-right:40px;"><?php echo ($dasj); ?> 至 <?php echo ($dasjc); ?></span>
                </li>
                <li>
                    维修中心：<span><?php echo ($jxzx_name); ?></span>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal;">邮寄地址：</strong><span style="display:block; margin-left:70px; margin-right:40px;"><?php echo ($jxzx_n); ?></span>
                </li>
                <li>
                    收件人：<span><?php echo ($sjxzx_username); ?></span>
                </li>
                <li>
                    电话：<span><?php echo ($jxzx_phone); ?></span><a class="ousc" href="tel:<?php echo ($jxzx_phone); ?>">拨打</a>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal;">回寄地址：</strong><span style="display:block; margin-left:70px; margin-right:40px;"><?php echo ($arr19["u_address"]); ?></span>
                </li>
                <li>
                    维修店铺：<span><?php echo ($wxzx_name); ?></span>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal;">店铺地址：</strong><span style="display:block; margin-left:70px; margin-right:40px;"><?php echo ($wxzx_n); ?></span><a style=" float:right;" class="ousc" href="http://m.amap.com/navi/?start=&dest=116.314315,39.982103&destName=北京中关村店&key=94ca4100199c2f2a8f33300cece2eba2">导航</a>
                </li>
                <li>
                    店铺电话：<span><?php echo ($wxzx_phone); ?></span><a class="ousc" href="tel:<?php echo ($wxzx_phone); ?>">拨打</a>
                </li>
                <li>
                    姓名：<span><?php echo ($arr["u_name"]); ?></span>
                </li>
                <li>
                    手机：<span><?php echo ($arr["u_phone"]); ?></span><a class="ousc" href="tel:<?php echo ($arr["u_phone"]); ?>">拨打</a>
                </li>
            </ul>
        </div>
        <div class="da_con">
            <ul>
                <li>
                    机型：<span><?php echo ($arr["model_name"]); echo ($arr["color_name"]); ?></span>
					

                </li>
                    
                <li>
                   <strong style=" float:left; font-weight:normal;">问题：</strong>
                   <span style="display:block; margin-left:45px;">
                       <?php if(is_array($question)): foreach($question as $key=>$kk): echo ($kk["question_name"]); ?>,<?php endforeach; endif; ?>
                   </span>
                        
                </li>
                <li>
                    方案：
                        <span>
                            <?php if(is_array($plan)): foreach($plan as $key=>$k): echo ($k["plan_name"]); ?>,<?php endforeach; endif; ?>
                        </span>
                             
                </li>
            </ul>
        </div>
        <div class="da_con">
            <ul>
                <li>
                    备注：<span><?php echo ($arr["u_note"]); ?></span>
                </li>
            </ul>
        </div>
        
        <div class="da_con da_con_cv">
            <ul>
                <li>
				
                    <strong style=" float:left; font-weight:normal; height: inherit;">修前检测：</strong>
                    <span class="mnuber">
                        <?php if(is_array($arr8)): foreach($arr8 as $key=>$v): echo ($v["jc_name"]); echo ($v["zt"]); ?> <br /><?php endforeach; endif; ?>
                    </span>
                </li>
                <li>
                    <strong style=" float:left; font-weight:normal; height: inherit;">修后检测：</strong>
                    <span class="mnuber">
                        <?php if(is_array($arr9)): foreach($arr9 as $key=>$v): echo ($v["jc_name"]); echo ($v["zt"]); ?> <br /><?php endforeach; endif; ?>
                    </span>
                </li>
            </ul>
        </div>
        
        <h1 class="da_con_ce da_con_ce_1 da_con_ce_2">订单预估价格：
        <span class="tf_null">
        <?php if(strtoupper($arr19['amountd']) == 需检测): echo ($arr["amountd"]); ?>
        <?php else: ?> 
        <?php echo ($arr["amountd"]); endif; ?>
        </span>
        <span>元</span>
        </h1>
        <h1 class="da_con_ce da_con_ce_1 da_con_ce_2 da_con_ce_3">订单应付价格：<span class="tf_null"><?php echo ($arr["amount"]); ?></span><span>元</span>
        </h1>
        
           
     
 
    </div>
    
    </div>
</div>

 

<div class="jiedan_ppmbr">

     <a style="color:#fff; display:block; width:100%; line-height:50px; text-align:center;" href="/Home/Shifu/shouhouxx/id/<?php echo ($arr13["id"]); ?>/shouhou_id/<?php echo ($arr13["shouhou_id"]); ?>"><?php echo ($ztaa); ?></a>

</div>


<script type="text/javascript">
function dellk(){
	 var rpp=window.confirm('您确定要修改吗');
    if (rpp==true){
        return true;
    }
    else{
        return false;
    } 	 
	 
}


var jingweo=$("#get_butt").attr('data')
var dizhixq=$("#get_butt").text()
console.log(dizhixq);
$("#daohang").attr('href',"http://m.weibaishi.com/Home/Shifu/map_zgd/?"+jingweo);
var muybu=$("#daohangmm").text()
if(muybu==''){
	$("#daohangmm").remove();
}

function Checkedr(){
	$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
	$(window.document.body).append('<div class="f_bz"><div class="f_bz_top f_bz_top_a">您确定此次操作吗</div><ul class="pubcvt"><li id="qberc1" class="pubcvt_v eryv" data="no确定"><a href="/Home/Shifu/sfquxiao/id/<?php echo ($arr["id"]); ?>">确定</a></li><li id="xqux" class="pubcvt_v">取消</li></ul></div><div class="Maskc3" style="display:block"></div>');
	
	$("#qberc1").click(function(){
		$(this).attr('data','确定')
		var href_q=$("#quxiaopp").attr('data')
		$("#quxiaopp").attr('href',href_q)
		var hrefyy=$("#quxiaopp").attr('href')
		$("#quxiaopp").removeAttr("onclick");
		
		//$("#quxiaopp").click()
		
		//alert(1)
		//fuoopy()
		$("html,body").css({"overflow-y": "auto",'height':'auto'});
		$(".f_bz").remove();
		$(".Maskc3").remove();
		//windown.open(hrefyy);
		$("#quxiaopp").click()
	})
	
	$("#xqux").click(function(){
	    $("html,body").css({"overflow-y": "auto",'height':'auto'});
		$(".f_bz").remove();
		$(".Maskc3").remove();
		$('input:radio[name="cangku_id"]:checked').attr("checked",false);
		$('.zhiem').removeClass('on')
	})
	
}


</script>

</body>
</html>