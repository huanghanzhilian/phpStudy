<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-订单指派</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<style>
.ungut_onb{ padding:10px 0;}
.ungut_onb_box{}
.ungut_onb_list{ width:50%; text-align:center; margin-bottom:15px;}
.ungut_onb_nbn{ width:50%; height:30px; line-height:30px; vertical-align:middle; display:inline-block; border:1px solid #ccc; color:#999; border-radius:4px;}
.ungut_onb_nbn.on{background:#3e7edb; color:#fff; border:1px solid #3e7edb;}
.vbcx{ display:none;}
.nbn_pomk{ position:absolute; bottom:0px; width:100%; height:46px; background:#3e7edb; color:#fff; text-align: center; line-height:46px; left:0px;}
</style>
<script>

</script>
</head>
<body class="body1_color">
<div class="header">
    <span><a href="/Admin/Ddguanli/xiangqing/id/<?php echo ($id); ?>/ways_id/<?php echo ($ways_id); ?>"></a></span>
    <h1>订单指派</h1>
</div>
<div class="content">
    <div class="content_con">
        <!--tab头-->
        <div class="shifudu_top">
            <ul class="pubcvt shifudu_top_ul shifudu_top_ul_gd">
                
                <li class="pubcvt_v shifudu_top_li shifudu_top_li_1">
                    <a href="/Admin/Ddguanli/shangmen/ways_id/1">休息中</a>
                </li>
                <li class="pubcvt_v shifudu_top_li ">
                    <a href="/Admin/Ddguanli/daodian/ways_id/2">工作中</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li ">
                    <a href="/Admin/Ddguanli/jixiu/ways_id/3">放假</a>
                </li>
                
            </ul>
        </div>
        <!--tab头-->
        <form method="post" action="/Admin/Ddguanli/cxfpup" onSubmit="return Checked();">
            <div class="ungut_onb">
                <ul class="ungut_onb_box">
                    <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="ungut_onb_list fl">
                            <span class="ungut_onb_nbn"><?php echo ($kk["user_username"]); ?></span><input class="vbcx" type="radio" name="user_id" value='<?php echo ($kk["user_id"]); ?>'>
                        </li><?php endforeach; endif; ?>
                </ul>
                <input type="hidden" name="id" value='<?php echo ($id); ?>'>
                <input class="nbn_pomk" type="submit" value='确定修改'>
            </div>
        </form>
    </div>
</div>

<script>
$(function(){
	$(".ungut_onb_box li.ungut_onb_list").click(function(){
		$(this).find('input.vbcx').attr("checked",true);
		$( ".vbcx" ).each(function(index){
			if($(this).attr('checked')){
				$(this).prev().addClass('on');
			}else{
				$(this).prev().removeClass('on');
			}
		});
		
	})
})

function Checked(){
	var nnmuo=$("input.vbcx[type=radio][checked]").length;
	//alert(nnmuo)
	if(nnmuo<1){
		alert('请指派师傅')
		return false;
	}
	
	return true;
}
</script>
	
</body>
</html>