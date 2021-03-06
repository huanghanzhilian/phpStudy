<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>产品库管理_机型回收站</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/Admin_modify.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
</head>
<body class="body1_color">
<div class="header public_width">
    <h1 class="header_h1">产品库 &gt; 手机维修 &gt; <?php echo ($brand_name); echo ($model_name); echo ($brand_id); ?>机型回收站</h1>
</div>

<div class="container public_width">
    <!--公共返回-->
    <div class="Return">
        <!--<span class="Return_button cursor" onClick="window.history.back()">返回</span>-->
        <a class="Return_button" href="/Admin/Shangpin/model/brand_id/<?php echo ($brand_id); ?>">返回</a>
    </div>
    <!--公共返回-->
    
    <div class="container_modify" id="xgpinpan">
        <ul class="zhuti_rom">
            <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="">
                    <div class="zhuti_rom_list_r fr zhuti_rom_list_ncon">
                        <a class="Return_button_a1" href="/Admin/Shangpin/modelhuifu/brand_id/<?php echo ($kk["brand_id"]); ?>/model_id/<?php echo ($kk["model_id"]); ?>" onclick="if(confirm('确定恢复?')==false)return false;">恢复</a>
                    </div>
                    <strong class="buctrese"><?php echo ($kk["model_name"]); ?></strong>
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>


</body>
</html>