<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>已付款</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>我的订单</h1>
    
</div><!--头-->
<div class="content">
    <div class="content_con">
<a href="/index.php/Home/Index/index/" style="display:none;">返回首页</a><center style="display:none;"><?php echo ($my); ?></center>
	<center style="display:none;"><h1><a href="/index.php/Home/Index/dingdan">未付款</a> <a href="/index.php/Home/Index/fuku">已付款</a></h1></center>
    
    <div class="dingdan">
        <ul class="clearfix">
             <li>
                <a href="/index.php/Home/Index/dingdan">未付款</a>
             </li>
             <li>
                <a href="/index.php/Home/Index/fuku">已付款</a>
             </li>
             <li>
                <a href="/index.php/Home/Index/membercentent">用户中心</a>
             </li>
        </ul>
    </div>
    
    <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><div class="jixing">
        <div class="jixing_title">
            <span></span>
            机型：<?php echo ($kk["model_name"]); ?>
            <em><a href="/index.php/Home/Index/shouhou/id/<?php echo ($kk["id"]); ?>">售后保修</a></em>
        </div>
        <div class="jixing_con">
            <ul>
                <li>手机号：<?php echo ($kk["u_phone"]); ?></li>
                <li>问题：<?php echo ($kk["question_name"]); ?></li>
                <li>解决方案：<?php echo ($kk["plan_name"]); ?></li>
                <li>状态：<?php if('<?php echo ($kk["fk"]); ?>' != 1): ?>已付款
					<?php else: ?> 
					未付款<?php endif; ?>
                </li>
            </ul>
        </div>
        <div class="jixing_btn">
            <h1>订单编号：<?php echo ($kk["u_number"]); ?><span>2016-6-3 11:32</span></h1>
            <!--<div class="pan_k">
                <button>付款</button>
                <button>删除</button>
            </div>-->
        </div>
    </div><?php endforeach; endif; ?>
    
    
   <!-- <div class="jixing">
        <div class="jixing_title">
            <span class="pb"></span>
            机型：iPhone 6S（灰色）
            <em>详情</em>
        </div>
        <div class="jixing_con">
            <ul>
                <li>手机号：</li>
                <li>问题：内屏碎（图像不正常）</li>
                <li>解决方案：更换屏幕</li>
            </ul>
        </div>
        <div class="jixing_btn">
            <h1>订单编号：2016060348579857<span>2016-6-3 11:32</span></h1>
            <div class="pan_k">
                <button>付款</button>
                <button>删除</button>
            </div>
        </div>
    </div>
    
    <div class="jixing">
        <div class="jixing_title">
            <span class="pc_dn"></span>
            机型：iPhone 6S（灰色）
            <em>详情</em>
        </div>
        <div class="jixing_con">
            <ul>
                <li>手机号：</li>
                <li>问题：内屏碎（图像不正常）</li>
                <li>解决方案：更换屏幕</li>
            </ul>
        </div>
        <div class="jixing_btn">
            <h1>订单编号：2016060348579857<span>2016-6-3 11:32</span></h1>
            <div class="pan_k">
                <button>付款</button>
                <button>删除</button>
            </div>
        </div>
    </div>-->
    
    
	<!--<table border='1'>
    <th>订单编号:</th>
	<th>机型:</th>
	<th>颜色:</th>
	<th>问题:</th>
	<th>解决方案:</th>
	<th>手机号:</th>
	<th>状态</th>
	<th>详情</th>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><tr>
			<td><?php echo ($kk["u_number"]); ?></td>
			<td><?php echo ($kk["model_name"]); ?></td>
			<td><?php echo ($kk["color_name"]); ?></td>
			<td><?php echo ($kk["question_name"]); ?></td>
			<td><?php echo ($kk["plan_name"]); ?></td>
			<td><?php echo ($kk["u_phone"]); ?></td>
			<td>
				<?php if('<?php echo ($kk["fk"]); ?>' != 1): ?>已付款
					<?php else: ?> 
					未付款<?php endif; ?>
			</td>
			<td><a href="/index.php/Home/Index/shouhou/id/<?php echo ($kk["id"]); ?>">售后保修</a></td>
			
		</tr><?php endforeach; endif; ?>
	</table>-->
    </div>
</div>
</body>
</html>