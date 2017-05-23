<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-工程师-提现信息</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>

</style>
</head>
<body style=" background:#f0f0f0;"> 
<div class="header">
   <a href="/Home/Gouwuche/my_wallet"><span></span></a>
    <h1>提现信息</h1>
</div><!--头-->
<!--内容-->
<div class="content">
    <div class="content_con">
    
        <div class="ceomer_com">
            <?php if(is_array($arr)): foreach($arr as $key=>$k): ?><h1 class="da_con_ce"><?php echo ($k["txsq_time"]); ?>
                    <span class="shifu_qx shifu_qx_c">
                        <?php if(strtoupper($k['zta']) == 1): ?>申请中
                           <?php elseif(strtoupper($k['zta']) == 2): ?> 
                                  申请成功
                           <?php elseif(strtoupper($k['zta']) == 3): ?> 
                                  申请失败
                              <?php else: endif; ?>
                    </span>
                </h1>
                <div class="rnmbur rnmbur1c">
                    <ul>
                        <li>
                             提现金额：<span class="chuangmbr">
                                      <?php echo ($k["amt"]); ?> 元
                                  </span>
                                  <span class="bimnb fr"></span>
                        </li>
                        <li>
                             提现账户：<span class="chuangmbr">
                                     <?php echo ($k["kahao"]); ?>  
                                  </span>
                        </li>
                        <li>
                             <span class="chuangmbr">
                                     <?php echo ($kk["cpk_name"]); ?>
                                  </span>
                        </li>
                        <li>
                            <span class="desc">
                               提现单号：<?php echo ($k["ddh"]); ?>
                            </span>
                        </li>
                        
                        
                        
                    </ul>
                </div><?php endforeach; endif; ?>
	</div>
    
    
    
    
    
    
<!--<a href="/Home/Gouwuche/yuer_tixian">返回</a><br /><br /><br />
	<div id='ssc'>
	<?php if(is_array($arr)): foreach($arr as $key=>$k): ?>单号:<?php echo ($k["ddh"]); ?> <br />
			提现金额:<?php echo ($k["amt"]); ?><br />		
			账号:<?php echo ($k["kahao"]); ?><br />
			申请时间:<?php echo ($k["txsq_time"]); ?><br />
			<br />
		<?php if(strtoupper($k['zta']) == 1): ?>申请中
         <?php elseif(strtoupper($k['zta']) == 2): ?> 
				申请成功
		<?php elseif(strtoupper($k['zta']) == 3): ?> 
				申请失败
            <?php else: endif; ?>
	 <br /><br /><br /><?php endforeach; endif; ?>
</div>-->

    </div>
</div>
</body>
</html>