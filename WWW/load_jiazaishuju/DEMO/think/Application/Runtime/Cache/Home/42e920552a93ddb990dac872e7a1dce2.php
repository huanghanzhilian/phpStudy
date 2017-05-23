<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>小旗子标注设置</title>
	<link rel="stylesheet" type="text/css" href="/ceshi/DEMO/think/Public/style/public.css">
	<link rel="stylesheet" type="text/css" href="/ceshi/DEMO/think/Public/style/style.css">
	<link rel="stylesheet" type="text/css" href="/ceshi/DEMO/think/Public/style/qizhi.css">
</head>
<body>
	<div class="main">
		<div class="header" id="header">
			<h1 class="qizi-title">小旗子标注设置
			<a class="pull-right" href="/ceshi/DEMO/think/index.php/Home/Index/tuichua">退出登录</a>
			</h1>
			<div class="con-nav"></div>
		</div>

		<div class="containers conta-qz" id="containers">
			<div class="qizi-log-con" id="cvmnd">
				<div class="qizhi-bsar clearfix" id="qizhi-bsar">
					<div class="row flex-wrap" >
						<label class="bdhu">下单</label>
						<ul class="rootu flex-wrap flex-con" id="xd">
							<li class="flex-con hong" data="红旗">
								<span></span>
							</li>
							<li class="flex-con huang" data="黄旗">
								<span></span>
							</li>
							<li class="flex-con lu" data="绿旗">
								<span></span>
							</li>
							<li class="flex-con lan" data="蓝旗">
								<span></span>
							</li>
							<li class="flex-con zhi" data="紫旗">
								<span></span>
							</li>
						</ul>
					</div>
					<div class="row flex-wrap" >
						<label class="bdhu">刷单</label>
						<ul class="rootu flex-wrap flex-con" id="sd">
							<li class="flex-con hong" data="红旗">
								<span></span>
							</li>
							<li class="flex-con huang" data="黄旗">
								<span></span>
							</li>
							<li class="flex-con lu" data="绿旗">
								<span></span>
							</li>
							<li class="flex-con lan" data="蓝旗">
								<span></span>
							</li>
							<li class="flex-con zhi" data="紫旗">
								<span></span>
							</li>
						</ul>
					</div>
				</div>
				<button class="qizi-login shyuji" id="butnkd" onclick="chdsem(this)">确定</button>
			</div>

			<!-- <?php if(is_array($arr)): foreach($arr as $key=>$kk): echo ($kk["qizi_color"]); ?>
			<?php echo ($kk["qizi_name"]); endforeach; endif; ?> -->
			<div class="qizi-log-con" id="hjgf">
				<div class="qizhi-bsar clearfix" >
					<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><div class="row flex-wrap" >
							<label class="bdhu"><?php echo ($kk["qizi_color"]); ?></label>
							<ul class="rootu rootu2 flex-con">
								<li class="flex-con on" data="<?php echo ($kk["qizi_name"]); ?>">

								</li>
							</ul>
						</div><?php endforeach; endif; ?>
					
				</div>
				<button class="qizi-login shyuji" id="xiugai">修改</button>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="/ceshi/DEMO/think/Public/script/qizhi.js"></script>
	<script type="text/javascript">

		var hjgf=document.getElementById("hjgf")
		var hjgf_li=hjgf.getElementsByTagName("li");
		var cvmnd=document.getElementById("cvmnd");
		var xiugai=document.getElementById("xiugai");
		xiugai.onclick=function(){
			hjgf.style.display="none";
			cvmnd.style.display="block"
		};
		if(hjgf_li.length==0){
			hjgf.style.display="none"
		}else{
			cvmnd.style.display="none"
		}
		console.log(hjgf_li.length)
		for (var i = 0; i < hjgf_li.length; i++) {
			switch (hjgf_li[i].getAttribute('data')) {
				case "红旗":
					hjgf_li[i].classList.add("hong");
					break;
				case "黄旗":
					hjgf_li[i].classList.add("huang");					break;
				case "绿旗":
					hjgf_li[i].classList.add("lu");
					break;
				case "蓝旗":
					hjgf_li[i].classList.add("lan");
					break;
				case "紫旗":
					hjgf_li[i].classList.add("zhi");
					break;
				default:
					//alert('case都不是的执行');
			}
		};
		function chdsem(_this) {
			if (_this.getAttribute('data') && _this.getAttribute('datas')) {
				var k = _this.getAttribute('data');
				var s = _this.getAttribute('datas');

				var request = new XMLHttpRequest();
				request.open("POST", "/ceshi/DEMO/think/index.php/Home/Index/qztj");
				var data = "qizi_name=" + ["下单", "刷单"] + "&qizi_color=" + [k, s];
				console.log(data);
				request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				request.send(data);
				request.onreadystatechange = function() {
					if (request.readyState === 4) {
						if (request.status === 200) {
							console.log(request.responseText)
							if(request.responseText=="1"){
								location.href = "/ceshi/DEMO/think/index.php/Home/Index/qz";
							}
						} else {
							alert("发生错误：" + request.status);
						}
					}
				}
			}
		}
	</script>
</body>
</html>