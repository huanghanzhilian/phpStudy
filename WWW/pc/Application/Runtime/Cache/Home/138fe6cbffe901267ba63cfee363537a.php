<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>配件订单</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
</head>
<body>
<div class="header header1">
    <span onclick="window.history.back()"></span>
    <h1>配件订单</h1>
    <a href="/index.php/Home/Gouwuche/goumaichanpin">去购买</a>
</div><!--头-->


<div class="content">
    <div class="content_con">
        <div class="dingdan">
            <ul class="clearfix">
                 <li>
                    <a class="on" href='javascript:void(0)'onclick='wei(0)'>未付款</a> 
                 </li>
                 <li>
                    <a href='javascript:void(0)'onclick='yifk(1)'>已付款</a>
                 </li>
                 <li>
                    <a href='javascript:void(0)'onclick='yi(2)'>已完成</a>
                 </li>
            </ul>
        </div><!--内容头-->
    
    
<!--    
<a href="/index.php/Home/Gouwuche/goumaichanpin">购买商品</a>
<center><?php echo ($my); ?></center>
<center><a href="/index.php/Home/Gouwuche/cangkua">仓库</a></center>
	 <center>
     <a href='javascript:void(0)'onclick='wei(0)'>未付款</a> 
     <a href='javascript:void(0)'onclick='yifk(1)'>已付款</a>
     <a href='javascript:void(0)'onclick='yi(2)'>已完成</a>
     </center>-->
     
     
     
        <div id='ff'>
            <?php if(is_array($arr)): foreach($arr as $aa=>$kk): ?><div class="jixing">
                    <div class="jixing_title jixing_title1">
                        <span></span>
                        订单编号：<?php echo ($aa); ?>
                        <em>等待付款</em>
                    </div>
                    
                    <div class="jixing_con">
                        <ul>
                            <?php if(is_array($kk)): foreach($kk as $key=>$cc): ?><li><?php echo ($cc["cpk_name"]); ?><span  class="fr">￥200 * <i class="wai"> 1 </i></span></li><?php endforeach; endif; ?> 
                        </ul>
                    </div>
                    
                    <div class="jixing_btn_1">
                        <h1>合计：<em class="yellow">￥600</em></h1>
                        <div class="bdr_c">
                            <span>取消订单</span>
                            <span class="on">去付款</span>
                        </div>
                    </div>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
</div>    
    
<div class="footer footer1">
    <div class="bot">
      <ul class="clearfix">
          <li>
              <a class="on"  href="/index.php/Home/Gouwuche/peijiandingdan" >
                  <span class="sh_icon1"></span>
                  <p>配件订单</p>
              </a>
          </li>
          <li>
              <a href="/index.php/Home/Gouwuche/cangkua" >
                  <span class="sh_icon2"></span>
                  <p>仓库</p>
              </a>
          </li>
          <li>
              <a href="/index.php/Home/Index/shifu">
                  <span class="sh_icon3"></span>
                  <p>师傅中心</p>
              </a>
          </li>
          <li>
              <a href="/index.php/Home/Grzx/index" >
                  <span class="sh_icon4"></span>
                  <p>我的</p>
              </a>
          </li>
         
      </ul>
    </div>
</div><!--底部固定-->
</body>
</html>
<script type="text/javascript">
	function yifk(fkzt){
		//alert(ways_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/yifukuan/fkzt/"+fkzt,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
}
	}
function wei(fkzt){
		//alert(ways_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/wfk/fkzt/"+fkzt,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
}
	}
function yi(fkzt){
		//alert(ways_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/yiwancheng/fkzt/"+fkzt,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
}
	}
</script>