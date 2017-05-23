<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-订单详情</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
body{ background:#f1f1f1;}
.mnuber {
    display: block;
    margin-left: 70px;
    margin-right: 40px;
}
</style>
</head>
<body>
<div class="header">
    <span><a href="/Home/Index/dingdan"></a></span>
    <div class="rder_sw">
        <ul>
            <li>
                <a href="http://m.weibaishi.com/anarchy/<?php echo ($arr19["id"]); ?>">订单状态</a>
            </li>
            <li>
                <a class="on" href="http://m.weibaishi.com/details/<?php echo ($arr19["id"]); ?>">订单详情</a>
            </li>
        </ul>
    </div>
</div><!--头-->

    

<div class="content">
    <div class="content_con" style="padding-bottom:20px;">
        <div class="content_con_one">
            <h1 class="da_con_ce">订单编号：<?php echo ($arr19["ddh"]); ?></h1>
            <div class="da_con">
                <ul>
                    <li>
                        工程师：<span><?php echo ($arr19["user_username"]); ?></span>
                    </li>
                    <li>
                        手机：<span><?php echo ($arr19["user_name"]); ?></span><a class="ousc" href="tel:<?php echo ($arr19["user_name"]); ?>">拨打</a>
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
            
            <div class="da_con">
                <ul>
                    <li>
                        服务方式：<span><?php echo ($arr19["ways_name"]); ?></span>
                    </li>
                    <li>
                        上门地址：<span><?php echo ($arr19["shangmen"]); ?></span>
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
                        姓名：<span><?php echo ($arr19["u_name"]); ?></span>
                    </li>
                    <li>
                        手机：<span><?php echo ($arr19["u_phone"]); ?></span>
                    </li>
                </ul>
            </div>
            <div class="da_con da_con_cv">
                <ul>
                    <li>
                        机型：<span><?php echo ($arr19["model_name"]); ?></span>
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
                        备注：<span><?php echo ($arr19["u_note"]); ?></span>
                    </li>
                </ul>
            </div>
            <h1 class="da_con_ce da_con_ce_1">订单预估价格：
			<?php if(strtoupper($arr19['amountd']) == 需检测): echo ($arr19["amountd"]); ?>
			<?php else: ?> 
			<?php echo ($arr19["amountd"]); ?> <span>元</span><?php endif; ?>
			</h1>
            <h1 class="da_con_ce da_con_ce_1 da_con_ce_2 da_con_ce_3">订单应付价格：
                <span class="tf_null"><?php echo ($arr19["amount"]); ?></span>
                <span>元</span>
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
                    产品添加：<?php if(is_array($arr190)): foreach($arr190 as $key=>$k): echo ($k["cpk_name"]); endforeach; endif; ?>
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