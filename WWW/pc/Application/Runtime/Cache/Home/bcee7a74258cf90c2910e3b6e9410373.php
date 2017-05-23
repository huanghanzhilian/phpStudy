<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>待完成-详情</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
body{ background:#f1f1f1;}
</style>
</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>订单详情</h1>
</div><!--头-->

<div class="content">
    <div class="content_con" >
    
    
    <div class="da_con">
        <h1>订单编号：<?php echo ($arr["ddh"]); ?></h1>
        <ul>
            <li>
                机型：<?php echo ($arr["model_name"]); ?>
            </li>
            <li>
                颜色：<?php echo ($arr["color_name"]); ?>
            </li>
            <li>
               问题：<?php if(is_array($question)): foreach($question as $key=>$kk): echo ($kk["question_name"]); ?>,<?php endforeach; endif; ?>
            </li>
            <li>
                解决方案：<?php if(is_array($plan)): foreach($plan as $key=>$k): echo ($k["plan_name"]); ?>,<?php endforeach; endif; ?>
            </li>
            <li>
                保修期：180天
            </li>
            <li>
                备注：<?php echo ($arr["u_note"]); ?>
            </li>
        </ul>
        <div class="da_inte_bun">
            <span class="fl">优惠：<?php echo ($arr["amountt"]); ?></span>
            <span class="fr">预计：<?php echo ($arr["amountd"]); ?></span>            
        </div>
    </div>
    
    <div class="da_con">
        <ul>
            <li>
                产品价格：￥<?php echo ($arr["amounttt"]); ?>
            </li>
            <li>
                修前检测：<?php if(is_array($arr8)): foreach($arr8 as $key=>$kk): echo ($kk["jc_name"]); endforeach; endif; ?>
            </li>
            <li>
                产品添加：<?php if(is_array($arr10)): foreach($arr10 as $key=>$k): echo ($k["cpk_name"]); endforeach; endif; ?>
            </li>
            <li>
                修后检测：<?php if(is_array($arr9)): foreach($arr9 as $key=>$v): echo ($kk["jc_name"]); endforeach; endif; ?>
            </li>
            <li>
                服务方式：<?php echo ($arr["ways_name"]); ?>
            </li>
            <li>
                维修地点：<?php echo ($arr["wxzx_name"]); ?>
            </li>
            <li>
                服务人员：<?php echo ($arr["user_username"]); ?>
            </li>
			<li>
                经纬度：<span id="jjccr"><?php echo ($fanwei); ?></span>
                <a id="zhouba" href="http://m.amap.com/navi/?start=&dest=116.330369,39.908381&destName=去上门&key=94ca4100199c2f2a8f33300cece2eba2">走吧</a>
            </li>
        </ul>
        <div class="da_inte_bun clearfix">
            <span class="fl"></span>
            <span class="fr">最终价格：￥<?php echo ($arr["amount"]); ?></span>            
        </div>
    </div>
    
    
    <div class="da_con">
        <ul>
            <li>
                姓名：<?php echo ($arr["u_name"]); ?>
            </li>
            <li>
                电话：<?php echo ($arr["u_phone"]); ?>
            </li>
            <li>
                地址：<span id="smddz"><?php echo ($arr["u_address"]); ?></span>
            </li>
        </ul>
    </div>
    
    
    
<!--<a href="/index.php/Home/Index/daiwancheng">返回</a><br /><br />
  订单号：<?php echo ($arr["u_number"]); ?> <br /><br />
	机型：<?php echo ($arr["model_name"]); ?> <br /><br />
	颜色：<?php echo ($arr["color_name"]); ?> <br /><br />
	问题：<?php if(is_array($question)): foreach($question as $key=>$kk): echo ($kk["question_name"]); ?>,<?php endforeach; endif; ?> <br /><br />
	解决方案：<?php if(is_array($plan)): foreach($plan as $key=>$k): echo ($k["plan_name"]); ?>,<?php endforeach; endif; ?> <br /><br />
    预计价格：<?php echo ($arr["amountd"]); ?> <br /><br />
	已优惠：<?php echo ($arr["amountt"]); ?> <br /><br />
	备注：<?php echo ($arr["u_note"]); ?> <br /><br />
	保修期{}<br /><br />
	产品价格:<?php echo ($arr["amounttt"]); ?><br /><br />
	最终价格:<?php echo ($arr["amount"]); ?><br /><br />
	修前检测：<?php echo ($arr["xqjc_id"]); ?> <br /><br />
	产品添加：<?php echo ($arr["cpk_name"]); ?><br /><br />
	修后检测：<?php echo ($arr["xhjc_id"]); ?> <br /><br />
	服务方式:<?php echo ($arr["ways_name"]); ?><br /><br />
	维修地点：<?php echo ($arr["wxzx_name"]); ?><br /><br />
	服务人员：<?php echo ($arr["user_username"]); ?><br /><br />
	姓名：<?php echo ($arr["u_name"]); ?><br /><br />
	电话:<?php echo ($arr["u_phone"]); ?><br /><br />
	地址:<?php echo ($arr["u_address"]); ?><br /><br />
<?php echo ($r); ?> <br />

		-->
    
   
    </div>
</div>

<div class="jiedan">
    <div class="jiedan_box clearfix">
       <!-- <?php echo ($b); ?> -->
	    <a  href="/index.php/Home/Index/tuidan/id/<?php echo ($arr["id"]); ?>/stau/<?php echo ($arr["stau"]); ?>"><?php echo ($r); ?></a>
        <a class="on" style=""  href="/index.php/Home/Index/jiedan/id/<?php echo ($arr["id"]); ?>/stau/<?php echo ($arr["stau"]); ?>"><?php echo ($b); ?></a>
    </div>
</div>

</body>
<script type="text/javascript">
var jjccr=document.getElementById("jjccr").innerHTML;    //经纬度
var smddz=document.getElementById("smddz").innerHTML;    //经纬度

console.log(smddz);

var str=document.getElementById("zhouba");
str.setAttribute("href","http://m.amap.com/navi/?start=&dest="+jjccr+"&destName="+smddz+"&key=94ca4100199c2f2a8f33300cece2eba2"); 
//document.write(str.replace(/Microsoft/,"W3School"))

</script>

</html>