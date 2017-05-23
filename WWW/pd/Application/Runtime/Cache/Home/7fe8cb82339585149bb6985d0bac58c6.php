<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>新订单</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
</head>
<body style="background:#f5f5f5">
<div class="header header1">
    <span onclick="window.history.back()"></span>
    <h1>历史订单<!--<?php echo ($my); ?>--></h1>
    <!-- <em>去购买</em> -->
</div><!--头-->
<div class="content">
    <div class="content_con">
        <!--tab头-->
        <div class="shifudu_top">
            <ul class="pubcvt shifudu_top_ul">
                <li class="pubcvt_v shifudu_top_li ">
                    <a href="/Home/Shifu/history_a">已完成<span>(4)</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li">
                    <a href="/Home/Shifu/history_b">已取消<span>(0)</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li shifudu_top_li_1">
                    <a href="/Home/Shifu/history_a ">售后中<span>(2)</span></a>
                </li>
            </ul>
        </div>
        <!--tab头-->
        <!--内容-->
        <div class="ceomer_com">
            <?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><a class="shifu_aclc" href="/Home/Shifu/daiwanchengxq/id/<?php echo ($vv["id"]); ?>">
                    <div class="rnmbur">
                        <ul>
                            <li>
                                 方式：<span class="chuangmbr">
                                          <?php if(strtoupper($vv['ways_id']) == 1): ?>上门服务
                                             <?php elseif(strtoupper($vv['ways_id']) == 2): ?> 
                                             到店服务
                                             <?php elseif(strtoupper($vv['ways_id']) == 3): ?>
                                             寄修服务<?php endif; ?>
                                      </span>
                                      <span class="bimnb fr"><?php echo ($vv["ddh"]); ?></span>
                            </li>
                            <li>
                                 时间：<span class="chuangmbr"><?php echo ($vv["xo_time"]); ?></span>
                            </li>
                            <li>
                                 机型：<span class="chuangmbr"><?php echo ($vv["model_name"]); ?></span>
                            </li>
                            <li>
                                 问题：<span class="chuangmbr"><?php echo ($vv["model_name"]); echo ($vv["question_name"]); ?></span>
                            </li>
                            <li>
                                 地址：<span class="chuangmbr">上门维修</span>
                            </li>
                        </ul>
                    </div>
                </a><?php endforeach; endif; ?>
        </div>
        <!--内容-->
        
        

    </div>
</div>

<!--底部-->
<!--<div class="footer footer1">
    <div class="bot">
      <ul class=" pubcvt">
          
          <li class="pubcvt_v">
              <a href="#" >
                  <span class="sh_icon2"></span>
                  <p>仓库</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="#" class="on" >
                  <span class="sh_icon3"></span>
                  <p>师傅中心</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="#" >
                  <span class="sh_icon4"></span>
                  <p>我的</p>
              </a>
          </li>
         
      </ul>
    </div>
</div>-->
<!--底部-->
</body>
</html>