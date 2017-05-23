<?php if (!defined('THINK_PATH')) exit(); if(is_array($arr)): foreach($arr as $key=>$kk): ?>订单号:<?php echo ($kk["ddh"]); ?><br /> <br />
			退货人: <?php echo ($kk["tuihuouser"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($kk["username"]); ?><br /> <br />
			退货编号:<?php echo ($kk["cangku_name"]); ?><br /> <br />
			退货产品:<?php echo ($kk["cpk_name"]); ?><br /> <br />
			退货价格:<?php echo ($kk["cpk_price"]); ?><br /> <br />
	
<?php if(strtoupper($kk['zt']) == 0): ?><a href="/Admin/Guanlishifu/tuihuotg/tuihuo_id/<?php echo ($kk["tuihuo_id"]); ?>"><?php echo ($tg); ?></a><br /><br />
<a href="/Admin/Guanlishifu/tuihuobtg/tuihuo_id/<?php echo ($kk["tuihuo_id"]); ?>"><?php echo ($btg); ?></a><?php elseif(strtoupper($kk['zt']) == 1): ?> 		
				
				<?php echo ($ywc); ?>
<?php elseif(strtoupper($kk['zt']) == 2): ?> 
			<?php echo ($sb); ?>
            <?php else: endif; ?><br /> <br /><br /> <br /><?php endforeach; endif; ?>