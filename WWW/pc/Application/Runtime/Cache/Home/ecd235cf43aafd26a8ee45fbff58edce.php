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
		<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li>问题：
				<span class="udge1"><?php echo ($question); ?></span><?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><b class="udge2"><?php echo ($ee["question_name"]); ?></b><?php endforeach; endif; ?>
            </li>
			
			 <li class="duan_c">
            <div class="lanscd">方案：<span class="udge3"><?php echo ($kk["plan_name"]); ?></span><br/>
            价格：<span><?php echo ($kk["money"]); ?></span><i>(元)</i><em onClick="ysd(this)">查看</em></div>
            维修时间：<span><?php echo ($kk["m_time"]); ?></span><i>(分钟)</i><br/>
            保修期：<span><?php echo ($kk["warranty_name"]); ?></span><i>(天)</i><?php endforeach; endif; ?>          
          
    </ul>
    </div>
     <div class="total">合计总价：<span><?php echo ($money); ?></span><i>(元)</i><p>维修成功后付款</p></div> 
<center id="next_step" class="next_step"><form method="post" action="/Home/Index/chuangjian">
  <input type="hidden" name="question_id" value='<?php echo ($question_id); ?>'>
  <input type="hidden" name="model_name" value='<?php echo ($model_name); ?>'>
  <input type="hidden" name="color_name" value='<?php echo ($color_name); ?>'>
  <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
  <input type="hidden" name="plan_id" value='<?php echo ($t); ?>'>
  <input type="hidden" name="color_id" value='<?php echo ($color_id); ?>'>
  <button class="next_step_ys" style="width:100%;height:50px;display:block;background-color:#3e7edb; font-size:15px; font-family:'微软雅黑';" type="submit" >确认报修</button>
</form></center>
    
</div>
</body>
</html>