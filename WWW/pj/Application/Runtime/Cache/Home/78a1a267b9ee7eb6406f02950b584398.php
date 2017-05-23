<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-手机维修-回收的仓库</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>

<style>


/*320px布局*/
html{font-size: 100px;}
body{}

/* iphone 6 */
@media (min-device-width : 375px) and (max-device-width : 667px) and (-webkit-min-device-pixel-ratio : 2){
    html{font-size: 117.1875px;}
}
/* iphone6 plus */
@media (min-device-width : 414px) and (max-device-width : 736px) and (-webkit-min-device-pixel-ratio : 3){
    html{font-size: 129.375px;}
}

.hkl_cmop{ font-size: 0.13rem;/*实际相当于12px*/ padding-bottom:0.25rem; background:#fff;}
.hkl_cmop li{ padding:0 12px; height:0.4rem; line-height:0.4rem; border-bottom:1px solid #e5e5e5; position:relative}
.mbbgu_l{ display:block; margin-right:0.7rem; clear:#4c4c4c;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.funb_r_po{ color:#b2b2b2;}

.zhiem {
    background: url(../../../../Public/img/images/qrdg_2_03.png) center center no-repeat;
    position: absolute;
    right: 12px;
    top: 50%;
    margin-top: -9px;
    background-size: 100%;
    width: 18px;
    height: 18px;
    display: inline-block;
    vertical-align: middle;
}
.zhiem.on {
    background: url(../../../../Public/img/images/qrdg_1_03.png);
    background-size: 100%;
}
.nudt_1_r_poc{ margin-right:22px;}
.chmn_dmk_u{ display:none;}
.submit_sd_but{
	background: #3e7edb;
    width: 100%;
    height: 42px;
    line-height: 42px;
    text-align: center;
    color: #fff;
	font-family:"微软雅黑";
	position:fixed;
	bottom:0px;
}
.submit_hide{ display:none;}
</style>
</head>

<body style=" background:#f5f5f5;">
<div class="header">
   <a href="/Home/Gouwuche/cangkua"><span></span></a>
    <h1>回收仓库</h1>
    <em class="lsycrd"><a href="/Home/Gouwuche/huishoudd">回收订单</a></em>
</div><!--头-->

<div class="content">
    <div class="content_con">
        <form id="chuannko" method="post" action="/Home/Gouwuche/hqajax" onSubmit="return Checkedr()">
            <ul class="hkl_cmop">
                <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li>
                    <div class="funb_r funb_r_po">
                        <span class="nudt_1_r nudt_1_r_poc"><?php echo ($kk["cpk_price"]); ?>元</span><input class="chmn_dmk_u" type="radio" name="cangku_id" value='<?php echo ($kk["cangku_id"]); ?>'><em class="zhiem"></em>
                    </div>
                    <span class="mbbgu_l">
                        <?php echo ($kk["cpk_name"]); ?>
                    </span>
					<input type="hidden" name="huishou_id" value='<?php echo ($kk["huishou_id"]); ?>'>
                </li><?php endforeach; endif; ?>
            </ul>
            <button id="hukkop_mo" class="submit_sd_but submit_hide" type="submit" >提交</button>
        </form>
    </div>
</div>

<script>
$(function(){
	$(".hkl_cmop li").click(function(){
	   $(this).find('input').attr("checked",true);
	   $('input[name="cangku_id"]').each(function(){
		  if($(this).attr('checked')){
			  $(this).next().addClass('on')
			  $("#hukkop_mo").removeClass('submit_hide')
		  }else{
			  $(this).next().removeClass('on')
			  //$("#hukkop_mo").addClass('submit_hide')
		  }
	  })
	})
})


</script>
</body>
</html>