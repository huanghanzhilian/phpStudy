<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
						<?php if(strtoupper ($tu == 1)): if(is_array($arr)): foreach($arr as $key=>$kk): ?><li><!--<span><i></i><em></em></span>--><b></b><?php echo ($kk["model_name"]); ?>
                            <ul>
                             <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><li>
                                    <a href="http://m.weibaishi.com/model/<?php echo ($kk["model_id"]); ?>/<?php echo ($ee["color_id"]); ?>/<?php echo ($id); ?>"><?php echo ($ee["color_name"]); ?></a>
                                    </li><?php endforeach; endif; ?> 
                            </ul>
                            </li><?php endforeach; endif; ?>
						 <?php else: ?>
						<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li><!--<span><i></i><em></em></span>--><b></b><?php echo ($kk["model_name"]); ?>
                            <ul>
                             <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><li>
                                    <a href="/Home/Index/wenti/model_id/<?php echo ($kk["model_id"]); ?>/color_id/<?php echo ($ee["color_id"]); ?>/id/<?php echo ($id); ?>"><?php echo ($ee["color_name"]); ?></a>
                                    </li><?php endforeach; endif; ?> 
                            </ul>
                            </li><?php endforeach; endif; endif; ?>
</html>