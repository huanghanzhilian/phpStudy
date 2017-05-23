<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-工程师-订单详情</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
body{ background:#f1f1f1;}
.form_qangd{ background:red; width:100%; height:100px;}
.jiedan_box span{ background:#3e7edb}

</style>
</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>订单详情</h1>
</div><!--头-->

<div class="content">
    <div class="content_con" >
    

    
    <div class="content_con_one">
        <h1 class="da_con_ce">订单编号：<?php echo ($arr["ddh"]); ?></h1>
        <div class="da_con">
            <ul>
                <li>
                    工程师：<span><?php echo ($user_username); ?></span>
                </li>
                
                <li>
                    维修内容：
                    <span>
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
                    <strong style=" float:left; font-weight:normal;">邮寄地址：</strong><span style="display:block; margin-left:70px; "><?php echo ($jxzx_n); ?></span>
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
                <!--<li>
                    手机：<span><?php echo ($arr["u_phone"]); ?></span><a class="ousc" href="tel:<?php echo ($arr["u_phone"]); ?>">拨打</a>
                </li>-->
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
                        <?php if(is_array($arr9)): foreach($arr9 as $key=>$vv): echo ($v["jc_name"]); echo ($vv["zt"]); ?> <br /><?php endforeach; endif; ?>
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

<div class="jiedan">
    <div class="jiedan_box clearfix">
        
	    <!--<a  href="/Home/Shifu/tuidan/id/<?php echo ($arr["id"]); ?>/stau/<?php echo ($arr["stau"]); ?>"><?php echo ($c); ?></a>-->
		 <!--<a  href='javascript:void(0)'onclick='a()'><?php echo ($e); ?></a>-->
        <!-- <a  href="/Home/Shifu/jiedan/id/<?php echo ($arr["id"]); ?>/stau/<?php echo ($arr["stau"]); ?>"></a> -->
		<span class="on" >
        <form  method="post" action="/Home/Shifu/jiedan">
			<input type="hidden" name="id" value='<?php echo ($arr["id"]); ?>'>
			<input type="hidden" name="stau" value='<?php echo ($arr["stau"]); ?>'>
			<input class="tijao" type="submit" value='<?php echo ($b); ?>'>
		</form>
        </span>
		<!-- <a class="on qiangdan"  href="/id//stau/<?php echo ($arr["stau"]); ?>"> -->
		<span class="on"><form method="post" action="/Home/Shifu/qiangdan">
			<input type="hidden" name="id" value='<?php echo ($arr["id"]); ?>'>
			<input type="hidden" name="stau" value='<?php echo ($arr["stau"]); ?>'>
			<input class="tijao" type="submit" value='<?php echo ($v); ?>'>
		</form></span>
		
		
		
        
       
    </div>
</div>

<script>
//报价判断
		  $(".tijao").each(function() {
			  if($(this).val()==''){
				 $(this).parent().parent().remove(); 
				 /* $(".cdret_1").text('需检测');
				  $("#amountd").val('需检测');
				 $(".sxgg>i") .remove();
				 $(this).text('需检测')
				 $(this).nextAll().remove();*/
			  }
		  })
		  //报价判断
</script>
<script type="text/javascript">
var jingweo=$("#get_butt").attr('data')
var dizhixq=$("#get_butt").text()
$("#daohang").attr('href',"http://m.weibaishi.com/Home/Shifu/map_zgd/?"+jingweo);
</script>
</body>
</html>