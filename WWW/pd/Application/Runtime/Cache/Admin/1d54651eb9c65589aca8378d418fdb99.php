<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>产品库管理</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/Admin_modify.css" rel="stylesheet" type="text/css">
</head>
<body class="body1_color">
<div class="header public_width">
    <h1 class="header_h1">产品库管理</h1>
</div>
<div class="container public_width">
    <!--公共返回-->
    <div class="Return">
        <!--<span class="Return_button cursor" onClick="window.history.back()">返回</span>-->
        <a class="Return_button" href="/Admin/Shangpin/">返回</a>
    </div>
    <!--公共返回-->
    <div class="append_cp">
        <div class="append_cp_box clearfix">
            <form method="post" action="/Admin/Shangpin/typeup">
                <input class="append_cp_text fl" type="text" name="type_name" placeholder="请添加维修种类"/>
                <input class="append_cp_anniu fl cursor" type="submit" value='添加'>
            </form>
        </div>
    </div>
    
    <div class="container_modify">
        <ul class="zhuti_rom">
            <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li>
                    <a class="zjnmk_pp" href="/Admin/Shangpin/typeshanchu/type_id/<?php echo ($kk["type_id"]); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                    <a class="zjnmk" href="/Admin/Shangpin/brand/type_id/<?php echo ($kk["type_id"]); ?>"><?php echo ($kk["type_name"]); ?></a>
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>
</body>
</html>