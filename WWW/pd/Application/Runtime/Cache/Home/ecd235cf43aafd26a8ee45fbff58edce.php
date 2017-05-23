<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<div class="Maskc_box">
    <div class="lili_c_ico">故障解决方案<span></span></div>
    <div class="tjiao">
    <ul style="position:relative;">
    
        <!--<li>机型：<?php echo ($model_name); ?>(<?php echo ($color_name); ?>)</li>-->
		<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><div class="ui_box_a">
			<li>
				<span class="udge1"><?php echo ($question); ?></span><?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><b class="udge2"><?php echo ($ee["question_name"]); ?></b><?php endforeach; endif; ?>
            </li>
			
			 <li class="">
            <div class="lanscd1">
                <span style=" float:left; font-weight:normal;">维修方案：</span>
                <span class="udge3" style="display:block; margin-left:62px; margin-right:70px;" ><?php echo ($kk["plan_name"]); ?></span>
                <b style="position: absolute; right: 0px; top: 50%; margin-top: -12px;" class="bbupok_a"><span class="iibuet"><?php echo ($kk["money"]); ?></span><i>.00元</i></b>
            </div>
            <div class="lanscd1 lanscd1nn">维修时长：<span><?php echo ($kk["m_time"]); ?></span><i>(分钟)</i>
            
            </div>
            <div class="lanscd1">维修说明：<span><?php echo ($kk["instructions_name"]); ?></span></div>
			
            </li>
            </div><?php endforeach; endif; ?>          
          
    </ul>
    </div>
     <div class="total">合计总价：<span><?php echo ($money); ?></span><i>.00 元</i><p>维修成功后付款</p></div> 
<center id="next_step" class="next_step"><form method="post" action="<?php echo ($lianjie); ?>">
  <input type="hidden" name="question_id" value='<?php echo ($question_id); ?>'>
  <input type="hidden" name="model_name" value='<?php echo ($model_name); ?>'>
  <input type="hidden" name="color_name" value='<?php echo ($color_name); ?>'>
  <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
  <input type="hidden" name="plan_id" value='<?php echo ($t); ?>'>
  <input type="hidden" name="color_id" value='<?php echo ($color_id); ?>'>
   <input type="hidden" name="id" value='<?php echo ($id); ?>'>
  <button class="next_step_ys" style="width:100%;height:50px;display:block;background-color:#3e7edb; font-size:15px; font-family:'微软雅黑';" type="submit" ><?php echo ($queren); ?></button>
</form></center>
    
</div>
</body>
</html>