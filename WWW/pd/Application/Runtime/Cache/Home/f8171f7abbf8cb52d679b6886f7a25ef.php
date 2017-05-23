<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>简陋测试页面</title>
</head>
<body>
	<div>
		<form action="<?php echo U('pay/index');?>" method="post">
		<input type="hidden" name="amount" id="amount" value = "0.01"/>
		<ul>
			<li>id:<?php echo ($oredr); ?></li>
			<li>名称:test1</li>
			<li>价格:0.01</li>
			<li>描述:test1</li>
			<li>
				<!--<input type="radio" name="channel" value="alipay_pc_direct"/>支付宝PC
				<input type="radio" name="channel" value="alipay_wap"/>支付宝手机
				
				<select name="channel" id="channel">
					<option value="alipay_pc_direct">支付宝PC</option>
					<option value="alipay_wap">支付宝手机</option>
				</select>-->
				
			</li>
			<li><input type="button" name="button" value="提交" onclick="wap_pay('alipay_wap')"/></li>
		</ul>
		</form>
	</div>
<script src="/ceshi/yuzuo/Public/js/pingpp.js" type="text/javascript"></script>	
<script src="/ceshi/yuzuo/Public/js/pingpp-pc.js" type="text/javascript"></script>
<script type="text/javascript">
    function wap_pay(channel) {
		var url = "<?php echo U('pay/index');?>";
        var amount = document.getElementById('amount').value * 100;
        var xhr = new XMLHttpRequest();
        xhr.open("POST",url, true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(JSON.stringify({
            channel: channel,
            amount: amount
        }));
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                pingpp.createPayment(xhr.responseText, function(result, err) {
                    alert(result);
					console.log(result);
                    console.log(err);
                });
            }
        }
    }
</script>
</body>

</html>