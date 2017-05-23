<?php if (!defined('THINK_PATH')) exit();?><!--
	<div id='le'>
	<?php if(is_array($arr3)): foreach($arr3 as $key=>$k): ?><a href='javascript:void(0)'onclick='jixing(<?php echo ($k["model_id"]); ?>)'><?php echo ($k["model_name"]); ?></a><br /> <br /><?php endforeach; endif; ?>
	</div>
	
    
    <div id='list'>


	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a href='javascript:void(0)'onclick=''><h3><?php echo ($kk["cpk_name"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["cpp_price"]); ?>元&nbsp;&nbsp;&nbsp;&nbsp;</h3>
		<?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): echo ($ee["cangku_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp; 数量(<?php echo ($ee["numss"]); ?>)&nbsp;&nbsp;&nbsp;<br /><?php endforeach; endif; ?><br /><br /><?php endforeach; endif; ?>
	
</div>-->




		
	<!--<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><h3><?php echo ($kk["model_name"]); ?></h3>
		<?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><a href='javascript:void(0)'onclick='cpkajax(<?php echo ($ee["cpk_id"]); ?>)'><?php echo ($ee["cpk_name"]); echo ($ee["cpk_id"]); ?></a><br /><?php endforeach; endif; ?><br /><br /><?php endforeach; endif; ?>-->
    
    <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li><!--<span><i></i><em></em></span>--><b></b><?php echo ($kk["model_name"]); ?>
        <ul>
         <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><li>
                <a href='javascript:void(0)'onclick='cpkajax(<?php echo ($ee["cpk_id"]); ?>)'><?php echo ($ee["cpk_name"]); echo ($ee["cpk_id"]); ?></a>
                </li><?php endforeach; endif; ?> 
        </ul>
        </li><?php endforeach; endif; ?>