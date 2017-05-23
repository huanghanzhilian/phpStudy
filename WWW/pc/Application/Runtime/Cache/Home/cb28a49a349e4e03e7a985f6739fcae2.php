<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-订单详情</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
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
    <span><a href="/Home/Index/dingdan"></a></span>
    <div class="rder_sw">
        <ul>
            <li>
                <a href="/Home/Index/zhuangtai/id/<?php echo ($arr["id"]); ?>.html">订单状态</a>
            </li>
            <li>
                <a class="on" href="/Home/Index/xiangqing/id/<?php echo ($arr["id"]); ?>.html">订单详情</a>
            </li>
        </ul>
    </div>
</div><!--头-->

    

<div class="content">
    <div class="content_con" style="padding-bottom:20px;">
        <div class="content_con_one">
            <h1 class="da_con_ce">订单编号：<?php echo ($arr["ddh"]); ?></h1>
            <div class="da_con">
                <ul>
                    <li>
                        服务方式：<span><?php echo ($arr["ways_name"]); ?></span>
                    </li>
                    <li>
                        上门地址：<span><?php echo ($arr["shangmen"]); ?></span>
                    </li>
                    <li>
                        预约时间：<span><?php echo ($dasj); ?> 至 <?php echo ($dasjc); ?></span></span>
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
                        <strong style=" float:left; font-weight:normal;">回寄地址：</strong><span style="display:block; margin-left:70px; margin-right:40px;"><?php echo ($arr["u_address"]); ?></span>
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
                        手机：<span><?php echo ($arr["u_phone"]); ?></span>
                    </li>
                </ul>
            </div>
            <div class="da_con">
                <ul>
                    <li>
                        机型：<span><?php echo ($arr["model_name"]); ?></span>
                    </li>
                    <li>
                       问题：<?php if(is_array($question)): foreach($question as $key=>$kk): ?><span><?php echo ($kk["question_name"]); ?>,</span><?php endforeach; endif; ?>
                    </li>
                    <li>
                        方案：<?php if(is_array($plan)): foreach($plan as $key=>$k): ?><span><?php echo ($k["plan_name"]); ?>,</span><?php endforeach; endif; ?>
                    </li>
                </ul>
            </div>
            <div class="da_con da_con_cv">
                <ul>
                    <li>
                        备注：<span><?php echo ($arr["u_note"]); ?></span>
                    </li>
                </ul>
            </div>
            <h1 class="da_con_ce da_con_ce_1">订单预估价格：
			<?php if(strtoupper($arr['amountd']) == 需检测): echo ($arr["amountd"]); ?>
			<?php else: ?> 
			<?php echo ($arr["amountd"]); ?> <span>元</span><?php endif; ?>
			</h1>
        
            <!--<div class="da_con">
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
                <span class="yuji fr">预计：<em>￥<?php echo ($arr["amountd"]); ?></em></span>            
            </div>
        </div>
        
            <div class="da_con">
            <ul>
                <li>
                    实际价格：￥<?php echo ($arr["amounttt"]); ?>
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
            </ul>
            <div class="da_inte_bun clearfix">
                <span class="fl"></span>
                <span class="yuji fr">最终价格：<em>￥<?php echo ($arr["amount"]); ?></em></span>            
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
                    地址：<?php echo ($arr["u_address"]); ?>
                </li>
                <li>
                状态:<?php if(strtoupper($arr['fk']) == 0): ?>未付款
                        <?php elseif(strtoupper($arr['fk']) == 1): ?> 
                        已付款
                        <?php elseif(strtoupper($arr['fk']) == 110): ?>
                        已取消<?php endif; ?>
                    
    </li>
            </ul>
        </div>-->
        </div>
    </div>
</div>


</body>
</html>