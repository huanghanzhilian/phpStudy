<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-订单管理</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<style>

html,body{ height:100%; overflow:hidden;}

</style>
<script>
$(function() {   		
	var lkj=$(window).height();
	var cdkd=lkj-91;
	
	$("#list_l_box,#cbe_lix_r").height(cdkd);
})
</script>
</head>
<body class="body1_color">
<div class="header">
    <span><a href="/Admin/index/index"></a></span>
    <h1>订单管理</h1>
</div>
<div class="content">
    <div class="content_con">
        <!--tab头-->
        <div class="shifudu_top">
            <ul class="pubcvt shifudu_top_ul shifudu_top_ul_gd">
                
                <li class="pubcvt_v shifudu_top_li ">
                    <a href="/Admin/Ddguanli/shangmen/ways_id/1">上门</a>
                </li>
                <li class="pubcvt_v shifudu_top_li shifudu_top_li_1">
                    <a href="/Admin/Ddguanli/daodian/ways_id/2">到店</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li ">
                    <a href="/Admin/Ddguanli/jixiu/ways_id/3">寄修</a>
                </li>
                
            </ul>
        </div>
        <!--tab头-->
        
        <div class="clearfix opmhging">
            <div class="brands fl">
                <div class="">
                    <ul id="list_l_box" class="list_l_box">
                        <li class="aet_list on">
                            <a href="/Admin/Ddguanli/dengdai/ways_id/2">待分配</a>
                        </li>
                        <li class="aet_list">
                            <a href="/Admin/Ddguanli/yizhipai/ways_id/2">已指派</a>
                        </li>
                        <li class="aet_list">
                            <a href="/Admin/Ddguanli/yijiedan/ways_id/2">已接单</a>
                        </li>
                        <li class="aet_list">
                            <a href="/Admin/Ddguanli/weixiuzhong/ways_id/2">维修中</a>
                        </li>
                        <li class="aet_list">
                            <a href="/Admin/Ddguanli/daifukuan/ways_id/2">待付款</a>
                        </li>
                        <li class="aet_list">
                            <a href="/Admin/Ddguanli/jiaoyiwancheng/ways_id/2">已完成</a>
                        </li>
                        <li class="aet_list">
                            <a href="/Admin/Ddguanli/quxiaole">已取消</a>
                        </li>
                        <li class="aet_list">
                            <a href="/Admin/Ddguanli/shouhou">售后</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- 操作 -->
            <div class="models fr">
                <div id="cbe_lix_r" class="cbe_lix_r">
                    <ul class="upen_list_r">
                        <?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><li class="">
                            <a class="shifu_aclc" href="/Admin/Ddguanli/xiangqing/id/<?php echo ($vv["id"]); ?>/ways_id/<?php echo ($ways_id); ?>">
                                <div class="rnmbur ">
                                    <ul>
                                        <li>
                                            <span class="bimnb "><?php echo ($vv["ddh"]); ?></span>
                                        </li>
                                        <li>
                                            机型：<span class="chuangmbr"><?php echo ($vv["model_name"]); ?></span>
                                        </li>
                                        <li>
                                            问题：<span class="chuangmbr"><?php echo ($vv["question_name"]); ?></span>
                                        </li>
                                        <li>
                                            姓名：<span class="chuangmbr"><?php echo ($vv["u_name"]); ?></span>
                                        </li>
                                        <li>
                                            电话：<span class="chuangmbr"><?php echo ($vv["u_phone"]); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            <!--内容-->
        </div>



	
    </div>
</div>
</body>
</html>