<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>简陋测试页面</title>
<script src="//cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>
<script src="/Public/js/pingpp-pc.js" type="text/javascript"></script>
<script type="text/javascript">

	function pay(id,type){
		$.post("<?php echo U('pay');?>",{id:id,type:type},function(data){
			if(data != "error"){
				pingppPc.createPayment(data, function(result, err) {
				    console.log(result);
				    console.log(err.msg);
				    console.log(err.extra);
				});
			}
		});
	}

</script>
<script src="/Public/js/pingpp.js" type="text/javascript"></script>
<script type="text/javascript">

	function wap_pa(id,type){
		$.post("<?php echo U('pay');?>",{id:id,type:type},function(data){
			if(data != "error"){
				pingpp.createPayment(data, function(result, err) {
				    console.log(result);
				    console.log(err.msg);
				    console.log(err.extra);
				});
			}
		});
	}

</script>
</head>
<body>
	<div>
		<ul>
			<li>id:<?php echo ($dingdanhao['id']); ?></li>
			<li>名称:<?php echo ($dingdanhao['u_title']); ?></li>
			<li>价格:<?php echo ($dingdanhao['amount']); ?></li>
			<li>描述:<?php echo ($dingdanhao['u_title']); ?></li>
			<li><a href="javascript:pay(<?php echo ($dingdanhao['id']); ?>,'alipa_pc_direct');">支付宝电脑购买</a></li><br /><br />
			<li><a href="javascript:wap_pay(<?php echo ($dingdanhao['id']); ?>,'alipa_wap');">支付宝手机购买</a></li><br /><br />
			<li><a href="/index.php/Home/Gouwuche/xinyongedu/id/<?php echo ($dingdanhao['id']); ?>">信用额度付款</a></li>
		</ul>
	</div>
</body>

</html>