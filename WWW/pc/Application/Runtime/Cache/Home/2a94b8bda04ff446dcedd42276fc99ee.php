<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title>维百士-高效,专业的智能产品上门快修服务平台</title>
<meta name="description" content="维百士专注于手机、平板、VR设备、无人机等智能设备的上门快修服务，我们将智能设备的配件供应
商、用户和维修工程师有机连接，搭建了一个互利互惠共享共赢的服务平台。">
<meta name="Keywords" content="维百士,手机维修,VR设备维修,无人机维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/pc/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/pc/Public/img/ioc/16.png" type="images/png"/>
<link href="/pc/Public/styles/public.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/pc/Public/styles/jquery.fullPage.css">
<style>
.index_nav{
	margin: 0;
	padding: 0;
	position: fixed;
	left: 0px;
	top: 0px;
	z-index: 70;
	height: 70px;
	/*background: red;*/
	width: 100%;
	min-width: 1127px;
}
.index_logo{
	background: url(/pc/Public/img/index1/logo.png) no-repeat center;
	width: 200px;
	height: 70px;
/*    background-size: cover;*/
}
.telsert{
	background: url(/pc/Public/img/index1/dianhua.png) no-repeat 0 center;
	width: 328px;
	height: 70px;
	line-height: 70px;
	color: #fff;
	text-indent: 35px;
}
.fl{
	float: left;
}
.fr{
	float: right;
}
#menu {
	list-style-type: none;
	height: 100%;
}
#menu li {
	float: left;
	margin: 0 5px 0 0;
	font-size: 14px;
	height: 100%;
	line-height: 70px;
}
#menu a {
	float: left;
	padding: 0px 20px;
	/*background-color: #fff;*/
	color: #fff;
	text-decoration: none;
}
#menu .active a {
	color: #fff;
	background-color: #5784e0;
}
.section {
	text-align: center;
	font: 50px "Microsoft Yahei";
	color: #fff;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
}
.sections1 {
	background-image: url(/pc/Public/img/index1/home.png);
}
.sections2 {
	background-image: url(/pc/Public/img/index1/jigong.png);
}
 .sdfsqw{
	width: 100%;
	height: 100%;
	 position: absolute;
	top: 0;
	left: 0; 
}
/*.aqwesss{
 	left: 0;
background-image: url(/pc/Public/img/index1/ledts1.png);
background-size: 100%;
}
.saaaq{
right: 0;
background-image: url(/pc/Public/img/index1/ledts2.png);
background-size: 100%;
}*/
.boxserpo{
	width: 1100px;
	height: 100%;
	margin: 0 auto;
	position: relative;
	/*background: red;*/
}
.sljaop{
	position: absolute;
	width: 500px;
	right: 0px;
	top: 50%;
	margin-top: -222px;
	background: url(/pc/Public/img/index1/phone-text.png) no-repeat right center;
	height: 455px;
}
.sljaop a{
	width: 145px;
	height: 55px;
	display: inline-block;
	background-image: url(/pc/Public/img/index1/download.png);
	position: absolute;
	right:53px;
	top: 306px;
}
.shuwkal{
	/*background: #ccc;*/
	position: absolute;
	left: 0px;
	top: 130px;
	font-size: 16px;
	position: relative;
	text-align: left;
	margin-bottom: 40px;
}
.shuwkal p{
	opacity: .8;
}
.shuwkal p.saxckl{
	text-align: left;
	display: inline-block;
	position: relative;
}
.shuwkal p.saxckl:before {
   content: "";
   position: absolute;
   top: 8px;
   left: 105%;
   width: 7px;
   height: 7px;
   background: #b4c4ff;
   border-radius: 50%;
}  
.shuwkal p.saxckl:after {
   content: "";
   position: absolute;
   top: 11px;
   left: 105%;
   width: 193px;
   height: 1px;
   background: #b4c4ff;
}  

.shuwkal p.saxckl.slop:after {
   content: "";
   position: absolute;
   top: 11px;
   left: 105%;
   width: 145px;
   height: 1px;
   background: #b4c4ff;
}
.saxcklsa{
	font-size: 9px;
}

.sections3 {
	background-image: url(/pc/Public/img/index1/hezuo.png);
}
.sections4 {
	background-image: url(/pc/Public/img/index1/fwxm-bg.png);
}
.shuagt{
	width: 962px;
	/*height: 50%;*/
	/*background: #ccc;*/
	margin: auto;
	overflow: hidden;
	position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
}
.shuagt_top{
	background: url(/pc/Public/img/index1/fwxm-text.png) center center no-repeat;
	height: 106px;
	width: 100%;
	/*margin-top: 180px;*/
}
.shuagt_content{
	background: url(/pc/Public/img/index1/fwxm-table.png) center 0 no-repeat;
	height: 362px;
	width: 100%;
	margin-top: 16px;
}

.sections5 {
	background-image: url(/pc/Public/img/index1/fuwufw.png);
}
.shuagts_content{
	width: 100%;
	height: 607px;
	background: url(/pc/Public/img/index1/fuwufw-map.png) center center no-repeat;
}

.sections6 {
	background-image: url(/pc/Public/img/index1/xuueyuan.png);
}
.pci_footer{
	position: fixed;
	bottom: 0px;
	width: 100%;
	height: 55px;
	background: #2d3340;
	color: rgba(119,124,135,.6);
	text-align: center;
	padding-top: 20px;
}
.nugrde{
	width: 400px;
	/*background: red;*/
	position: absolute;
	right: 200px;
	top: 50%;
	margin-top: -90px;
}
.nugrde_se{
	width: 298px;
	height: 95px;
	background: url(/pc/Public/img/index1/ssdsa.png) no-repeat center;
	display: inline-block;
}
.nugrde_ses{
	background-image: url(/pc/Public/img/index1/dsfsdf.png)
}
.nugrde_sesa{
	background-image: url(/pc/Public/img/index1/lopjwgs.png)
}
a.nugrde_se:hover{
	opacity:0.8;
}
.mian{
	width: 1127px;
	height: 100%;
	margin: 0 auto;
	/*background: red;*/
	position: relative;
}
.main_box{
	width: 100%;
	height: 340px;
	/*background: #ccc;*/
	position: absolute;
	left: 50%;
	top: 50%;
	-webkit-transform: translate(-50%,-50%);
	transform: translate(-50%,-50%);
	color: #e2e4eb;
}
.mian .main_box li{
	font-size: 16px;
	text-align: left;
	line-height: 32px;
	padding-left: 28px;
	position: relative;
}
.mian .main_box li:before{
	content: "";
	position: absolute;
	top: 13px;
	left: 3px;
	width: 6px;
	height: 6px;
	background: #5672d2;
	border-radius: 50%;
	box-shadow: 0px 0px 10px 6px #364782;
}
/* .mian .main_box li:after{
	content: "";
	position: absolute;
	top: 16px;
	left: 4px;
	width: 6px;
	height: 6px;
	background: #5974d2;
	border-radius: 50%;
	box-shadow: 0px 0px 10px 6px #364782;
} */

.mian .main_box h1{
	font-size: 34px;
	text-align: left;
	font-weight: 500;
	line-height: 50px;
	margin-bottom: 24px;
}
.mian .main_box h2{
	font-size: 30px;
	text-align: left;
	font-weight: 500;
	line-height: 50px;
}
.mian .main_box .box{
	/* background:#102058; */
	background: rgba(10,32,88,.6);
	height: 340px;
	width: 605px;
	position: relative;
	
	/* filter: alpha(opacity:60);
	    opacity: 0.6; */
}

.mian .main_box .box .loapmw{
	position: absolute;
	/*left: 50%;*/
	top: 50%;
	-webkit-transform: translate(0,-50%);
	transform: translate(0,-50%);
	padding-left: 32px;
}
.mian .main_box .box.boxer{
	width: 350px;
	background: none;
}
.mian .main_box .box.boxer .loapmw{
	padding-left: 0;
}
.lsjagwu{
	position: absolute;
	left: 95%;
	top: 50%;
	-webkit-transform: translate(0,-50%);
	transform: translate(0,-50%);
	height: 22px;
	width: 133px;
	background-image: url(/pc/Public/img/index1/jiantou.png)
}



</style>
<script src="/pc/Public/js/jquery-1.8.3.min.js"></script>
<script src="/pc/Public/js/jquery.fullPage.min.js"></script>
<script>
$(function(){
	$('#dowebok').fullpage({
		// sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', '#f90'],
		anchors: ['page1', 'page2', 'page3', 'page4', 'page5', 'page6'],
		menu: '#menu'
	});
});
</script>
</head>

<body>
<!-- header -->
<div class="index_nav">
	<div class="index_logo fl"></div>
	<ul id="menu" class="clearfix fl">
		<li data-menuanchor="page1" class="active"><a href="#page1">首页</a></li>
		<li data-menuanchor="page2"><a href="#page2">我是技工</a></li>
		<li data-menuanchor="page3"><a href="#page3">商家合作</a></li>
		<li data-menuanchor="page4"><a href="#page4">服务产品</a></li>
		<li data-menuanchor="page5"><a href="#page5">服务范围</a></li>
		<li data-menuanchor="page6"><a href="#page6">维百士学院</a></li>
	</ul>
	<div class="telsert fr">全国热线：400-803-0603</div>
</div>
<!-- header end -->


<div id="dowebok">
	<div class="section sections1">
		<!-- <h3>第一屏</h3>
		<p>fullPage.js — 绑定菜单演示</p> -->
	</div>
	<div class="section sections2">
		<!-- <h3>第二屏</h3>
		<p>请查看左上角，点击可以控制</p> -->
		<div class="sdfsqw saaaq">
			<div class="boxserpo">
				<div class="sljaop">
					<div class="shuwkal">
						<p class="saxckl">加入我们</p>
						<p class="saxcklsa">WEL COME TO JOIN US</p>
					</div>
					<div class="shuwkal">
						<p class="saxckl slop">工程师APP下载</p>
						<p class="saxcklsa">WEL COME TO JOIN US</p>
					</div>
					<!-- <img src="/pc/Public/img/index1/QR.png"> -->
					<a target="_blank" href="/pc/Public/DownloadAPP/one/3fd5833a3e5190bd073ac538b320d86c.apk"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="section sections3">
		<!-- <h3>第三屏</h3>
		<p>绑定的菜单没有默认的样式，你需要自行编写</p> -->
		<div class="mian">
			<div class="main_box">
				<div class="fl box">
					<div class="lsjagwu"></div>
					<div class="loapmw">
						<div class="content">
							<h2>服务质量好,服务效率高</h2>
							<h1>更好的客户体验,更多的订单</h1>
						</div>
						<ul>
							<li>订单就近匹配,服务效率更高</li>
							<li>追求极致效率,随时随地上门修</li>
							<li>八大节点监控,打造完美用户体验</li>
						</ul>
					</div>
					
				</div>
				<div class="fr box boxer">
					<div class="loapmw">
						<a target="_blank" class="nugrde_se nugrde_ses" href="http://weibaishi.com/Admin/Eingdan/login"></a>
						<a target="_blank" class="nugrde_se" href="http://weibaishi.com/Admin/Eingdan/sign_up.html"></a>
						<a target="_blank" class="nugrde_se nugrde_sesa" href="/pc/Home/Index/learn_more.html"></a>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="nugrde">
			<a target="_blank" class="nugrde_se nugrde_ses" href="http://weibaishi.com/Admin/Eingdan/login"></a>
			<a target="_blank" class="nugrde_se" href="http://weibaishi.com/Admin/Eingdan/sign_up.html"></a>
		</div> -->
	</div>

	<div class="section sections4">
		<div class="sdfsqw">
			<div class="shuagt">
				<div class="shuagt_top"></div>
				<div class="shuagt_content"></div>
			</div>
		</div>
	</div>
	<div class="section sections5">
		<div class="sdfsqw">
			<div class="shuagt">
				<div class="shuagts_content"></div>
			</div>
		</div>
	</div>
	<div class="section sections6">
	</div>
</div>

<div class="pci_footer">
	<p>Copyright © 2017 - 2018 weibaishi.com. All </p>
	<p>维百士 京ICP备15051058号-2</p>
</div>

</body>
</html>