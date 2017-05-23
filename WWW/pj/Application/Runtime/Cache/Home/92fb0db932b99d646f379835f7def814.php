<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>待完成</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/ceshi/www/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/ceshi/www/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/ceshi/www/Public/js/jquery-1.7.1.min.js"></script>
<script src="/ceshi/www/Public/js/script.js"></script>
</head>
<body style="background:#f5f5f5">

<div class="header header1">
    <span onclick="window.history.back()"></span>
    <h1>师傅中心</h1>
    <em>去购买</em>
</div><!--头-->


<div class="content">
    <div class="content_con">
        <div class="dingdan">
            <ul class="clearfix">
                 <li>
                    <a href="/ceshi/www/index.php/Home/Index/shifu">新订单</a>
                 </li>
                 <li>
                    <a class="on" href="/ceshi/www/index.php/Home/Index/daiwancheng">待完成</a>
                 </li>
                 <li>
                    <a href="/ceshi/www/index.php/Home/Index/yiwancheng">已完成</a>
                 </li>
            </ul>
        </div>
        
        <?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><div class="jixing">
      
            <div class="jixing_title jixing_title1 jixing_title2">
                <span></span>
                订单编号：<?php echo ($vv["u_number"]); ?>
                <em><a href="/ceshi/www/index.php/Home/Index/daiwanchengxq/id/<?php echo ($vv["id"]); ?>">详情</a></em>
            </div>
            <div class="jixing_con">
                <ul>
                    <li>手机号：<?php echo ($vv["u_phone"]); ?></li>
                    <li>机型问题：<?php echo ($vv["model_name"]); ?>:<?php echo ($vv["question_name"]); ?></li>
                    <li>服务方式：<?php echo ($vv["ways_name"]); ?></li>
                </ul>
            </div>
            <div class="jixing_btn">
                 
                <h1>2016-6-3 11:32<span>编辑</span></h1>
                
                <div class="pan_k">
                </div>
            </div>
        </div><?php endforeach; endif; ?>




<!--<center><?php echo ($my); ?></center>
<a href="/ceshi/www/index.php/Home/Index/index">返回</a><br /><br />
<a href="/ceshi/www/index.php/Home/Index/xindingdan">新订单</a><br /><br />
	<a href="/ceshi/www/index.php/Home/Index/daiwancheng">待完成</a><br /><br />
	<a href="/ceshi/www/index.php/Home/Index/yiwancheng">已完成</a><br /><br />
	<table border=1>
    <th>订单编号:</th>
	<th>机型问题:</th>
	<th>服务方式:</th>
	<th>手机号:</th>
	<th>状态</th>
<?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><tr>
	<td><?php echo ($vv["u_number"]); ?></td>
	<td><?php echo ($vv["model_name"]); ?>:<?php echo ($vv["question_name"]); ?></td>
	<td><?php echo ($vv["ways_name"]); ?></td>
	<td><?php echo ($vv["u_phone"]); ?></td>
	<td><a href="/ceshi/www/index.php/Home/Index/daiwanchengxq/id/<?php echo ($vv["id"]); ?>">详情</a></td>	
</tr><?php endforeach; endif; ?>	
</table>
-->


    </div>
</div>

<div class="footer footer1">
    <div class="bot">
      <ul class="clearfix">
          <li>
              <a href="#" >
                  <span class="sh_icon1"></span>
                  <p>配件订单</p>
              </a>
          </li>
          <li>
              <a href="#" >
                  <span class="sh_icon2"></span>
                  <p>仓库</p>
              </a>
          </li>
          <li>
              <a href="#" class="on">
                  <span class="sh_icon3"></span>
                  <p>师傅中心</p>
              </a>
          </li>
          <li>
              <a href="#" >
                  <span class="sh_icon4"></span>
                  <p>我的</p>
              </a>
          </li>
         
      </ul>
    </div>
</div>


</body>
</html>