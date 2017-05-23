<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-工程师-待完成订单</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
</head>
<body style="background:#f5f5f5">

<div class="header header1">
    <span class="shuaxin"><a href="/Home/Shifu/shouhou_list">售后订单</a></span>
    <h1>我的订单</h1>
  <em class="lsycrd"><a href="/Home/Shifu/history_a">历史订单</a></em>
</div><!--头-->


<div class="content">
    <div class="content_con">
        <!--tab头-->
        <div class="shifudu_top">
            <ul class="pubcvt shifudu_top_ul shifudu_top_ul_gd">
                
                <li class="pubcvt_v shifudu_top_li shifudu_top_li_1">
                    <a href="/Home/Shifu/daiwancheng">进行中<span>(<?php echo ($nums2); ?>)</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li">
                    <a href="/Home/Shifu/yiwancheng">待评价<span>(<?php echo ($nums3); ?>)</span></a>
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
                                 问题：<span class="chuangmbr"><?php echo ($vv["question_name"]); ?></span>
                            </li>
                            <li>
                                 地址：<span class="chuangmbr"><?php echo ($vv["shangmen"]); ?></span>
                            </li>
                        </ul>
                    </div>
                </a><?php endforeach; endif; ?>
        </div>
        <!--内容-->

    </div>
</div>

<!--底部-->
<div class="footer footer1">
    <div class="bot">
      <ul class=" pubcvt">
          
          <li class="pubcvt_v">
              <a href="/Home/Shifu/index" >
                  <span class="sh_icon2"></span>
                  <p>首页</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="/Home/Shifu/shifu"  >
                  <span class="sh_icon3"></span>
                  <p>订单</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a  class="on" href="/Home/Shifu/daiwancheng" >
                  <span class="sh_icon5"></span>
                  <p>服务</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="/Home/Shifu/my_wode" >
                  <span class="sh_icon4"></span>
                  <p>我的</p>
              </a>
          </li>
         
      </ul>
    </div>
</div>
<!--底部--




</body>
</html>