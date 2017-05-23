<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/Admin/Index/index/">返回</a>
	订单号：<?php echo ($arr["ddh"]); ?> <br /><br />
	机型：<?php echo ($arr["model_name"]); ?> <br /><br />
	颜色：<?php echo ($arr["color_name"]); ?> <br /><br />
	问题：<?php if(is_array($question)): foreach($question as $key=>$kk): echo ($kk["question_name"]); ?>,<?php endforeach; endif; ?> <br /><br />
	解决方案：<?php if(is_array($plan)): foreach($plan as $key=>$k): echo ($k["plan_name"]); ?>,<?php endforeach; endif; ?> <br /><br />
    预计价格：<?php echo ($arr["amountd"]); ?> <br /><br />
	已优惠：<?php echo ($arr["amountt"]); ?> <br /><br />
	备注：<?php echo ($arr["u_note"]); ?> <br /><br />
	保修期{}<br /><br />
	预估价格:<?php echo ($arr["amounttt"]); ?><br /><br />
	最终价格:<?php echo ($arr["amount"]); ?><br /><br />
	修前检测：<?php if(is_array($arr8)): foreach($arr8 as $key=>$kk): echo ($kk["jc_name"]); endforeach; endif; ?><br /><br />
	产品添加：<?php if(is_array($arr10)): foreach($arr10 as $key=>$k): echo ($k["cpk_name"]); endforeach; endif; ?><br /><br />
	修后检测：<?php if(is_array($arr9)): foreach($arr9 as $key=>$v): echo ($kk["jc_name"]); endforeach; endif; ?> <br /><br />
	服务方式:<?php echo ($arr["ways_name"]); ?><br /><br />
	维修地点：<?php echo ($arr["wxzx_name"]); ?><br /><br />
	服务人员：<?php echo ($arr["user_username"]); ?><br /><br />
	下单时间：<?php echo ($arr1["xo_time"]); ?><br /><br />
	姓名：<?php echo ($arr["u_name"]); ?><br /><br />
	电话:<?php echo ($arr["u_phone"]); ?><br /><br />
	地址:<?php echo ($arr["u_address"]); ?><br /><br />
</body>
</html>