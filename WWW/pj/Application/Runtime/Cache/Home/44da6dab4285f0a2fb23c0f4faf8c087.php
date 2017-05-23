<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-手机维修</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/index.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public_rem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public_button.css" rel="stylesheet" type="text/css">

<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
.gezxin_top{ height:1.65rem; background-image:linear-gradient(to bottom, #01b6fa,#3674fa); position:relative;}
.gezxin_top:before{ content: ""; height:100%; width:100%; background: url(../../../../Public/img/images/gerenzhong_a_2.png) left bottom no-repeat; position:absolute; top:0px; left:0px; background-size:100%; }
.gezxin_top_dis{ height:100%;  position:absolute; left:0px; top:0px; z-index:1211;}
.gezxin_top_dis li{ line-height:1.65rem; color:#fff; font-size:0.14rem; width:100%; text-align:center; position:relative;}
.gezxin_top_dis li.routy{ text-align:right; padding-right:0.12rem;}
.gezxin_top_dis li>a.yuanpp_a{  display:inline-block; vertical-align:middle; line-height:0.35rem; /*border:2px solid #1399fa; border-radius:100%;*/}
.gezxin_top_dis li>a>img{ width:0.75rem; height:0.75rem; overflow:hidden; display:block; margin:auto; border:2px solid #02b5fa; border-radius:100%;}
.gezxin_top_dis li em{ color: rgba(255,255,255,0.7); font-style:normal; display:inline-block; white-space: nowrap;}
.content_con_quchu{ padding:0;}
.kehu_tiue{ position:absolute; line-height:20px; width:100%; bottom:0.12rem;}
</style>
<script>
$(function(){
	var icopll=$("#icopll").attr('src')
	var dianhuah=$("#dianhuah").text()
	var dianhuah1 = $.trim(dianhuah)
	console.log(dianhuah1);
	if(icopll==''&&dianhuah1==''){
		$(".footer_4").remove();
		$("#icopll").attr('src','../../../../Public/img/shifu_duan/wo_topm.png')
	}else if(icopll==''&&dianhuah1!=''){
		$("#icopll").attr('src','../../../../Public/img/shifu_duan/mubercta_3_ll_03.png');
		$("#lianjie").attr('href','/Home/Index/wx');
	}
	
	if($("#qdrr").text()=='请登录'){
		$("#adrrw").remove();
	}
	
	/*if(dianhuah1==''){
		$(".footer_4").remove();
	}else if(dianhuah1!=''){
		$("#lianjie").attr('href','/Home/Index/wx');
	}
	*/
	
})
</script>
</head>
<body style="background:none; padding-bottom:100px;">
<div class="gezxin_top">
    <ul class="pubcvt gezxin_top_dis">
        <li class="">
            <a id="lianjie" class="yuanpp_a" href="http://m.weibaishi.com/inquiries">
               <img id="icopll" src="<?php echo ($avatar); ?>" />
               <em id="qdrr"><?php echo ($denglu); ?></em><em id="adrrw"><?php echo ($yanz); echo ($wxusername); ?></em>
            </a>
			<div class="kehu_tiue" id="dianhuah"><?php echo ($username); ?></div>
        </li>
        <!--<li class=" routy" id="dianhuah">
            <?php echo ($username); ?><a  href="/Home/Index/wx"></a>
        </li>-->
    </ul>
</div>

<div class="content">
    <div class="content_con content_con_quchu">
        <div class="grdzx">
            <ul class="bbunnmk_vty">
                <li>
                    <a href="/Home/Index/<?php echo ($lianjiea); ?>">
                    <span></span>
                    邀请有礼
                    </a>
                </li>
                <li>
                    <a href="/Home/Index/youhuiquan_show">
                        <span class="me_2"></span>
                        我的优惠券
                    </a>
                </li>
                <li>
                <a href="javascript:void(0)">
                    <span  class="me_3"></span>
                    地址管理
                </a>
                </li>
                <li>
                <a href="http://m.weibaishi.com/complaints">
                    <span class="me_4"></span>
                    意见反馈
                </a>
                </li>
                <li>
                <a href="tel:400-9911-906">
                    <span class="me_5"></span>
                    客服电话
                </a>
                </li>
            </ul>
        </div>
       <!-- <a href="/Home/Index/index">维修下单</a>
        <center><?php echo ($my); ?></center>
        <a href="/Home/Index/dingdan">订单详情</a>
        <a href="/Home/Index/youhuiquan">优惠券</a>-->
    </div>
</div>
<div class="footer_4">
      <div class="tuichudr">
		<a href="/Home/Index/tuichu">退出登录</a>
	  </div>
</div>

<div class="nav_gd">
    <ul>
        <li>
            <a class="on" href="http://m.weibaishi.com">
                <em class="ico_list1"></em>
                <p class="">维修</p>
            </a>
        </li>
        <li>
            <a class="on" href="/Home/Index/huishou">
                <em class="ico_list2 "></em>
                <p class="">回收</p>
            </a>
        </li>
        
        
        <li>
            <a id="tanchua" class="anniu_anjio" href="javascript:;">
                
            </a>
        </li>
        
        <li>
            <a class="on" href="http://m.weibaishi.com/inquiries">
                <em class="ico_list3 "></em>
                <p class="">订单</p>
            </a>
        </li>	
        <li>
            <a class="on" href="http://m.weibaishi.com/membercentent">
                <em class="ico_list4  on"></em>
                <p class="on">我的</p>
            </a>
        </li>
    </ul>
</div><!--nav固定-->

<div id="xianlop_p" class="nav_gd nav_gd_pop ">
    <i class="huanbi_p"></i>
    
</div>
<div class="kpomk_lo cdaki" id="kpomk_lo">
    <div class="tanc_top_guang">
        <img src="/Public/img/images/ico_we_bnm/ico_we_ppo_a.png">
    </div>
    <div class="taunj_pokl">
        <div class="annmbhu">
            <ul class="pubcvt uiklng">
                <li class="pubcvt_v">
                    <a href="tel:400-9911-906">
                        <i class="ico_we_bnm1"></i>
                        <p>电话客服</p>
                    </a>
                </li>
                <li class="pubcvt_v">
                    <a href="/Home/Index/yichuang">
                        <i class="ico_we_bnm2"></i>
                        <p>在线咨询</p>
                    </a>
                </li>
                <li class="pubcvt_v">
                    <a href="http://m.weibaishi.com/orders">
                        <i class="ico_we_bnm3"></i>
                        <p>快速下单</p>
                    </a>
                </li>
                <li class="pubcvt_v">
                    <a href="http://m.weibaishi.com/Home/Index/lnv_polite">
                        <i class="ico_we_bnm4"></i>
                        <p>邀请有礼</p>
                    </a>
                </li>
            </ul>

            <ul class="pubcvt uiklng">
                <li class="pubcvt_v">
                    <a href="/Home/Index/pingjia_show">
                        <i class="ico_we_bnm5"></i>
                        <p>用户评价</p>
                    </a>
                </li>
                <li class="pubcvt_v">
                    <a href="http://m.weibaishi.com/process">
                        <i class="ico_we_bnm6"></i>
                        <p>维修流程</p>
                    </a>
                </li>
                <li class="pubcvt_v">
                    <a href="http://m.weibaishi.com/price">
                        <i class="ico_we_bnm7"></i>
                        <p>价目查询</p>
                    </a>
                </li>
                <li class="pubcvt_v">
                    <a href="http://m.weibaishi.com/service">
                        <i class="ico_we_bnm8"></i>
                        <p>服务范围</p>
                    </a>
                </li>
            </ul>
            
            <ul class="pubcvt uiklng">
                <li class="pubcvt_v">
                    <a href="javascript:;">
                        <i class="ico_we_bnm9"></i>
                        <p>拆修攻略</p>
                    </a>
                </li>
                <li class="pubcvt_v">
                    <a href="/Home/Index/bangzhu_my">
                        <i class="ico_we_bnm10"></i>
                        <p>帮助中心</p>
                    </a>
                </li>
                <li class="pubcvt_v">
                    <a href="http://m.weibaishi.com/complaints">
                        <i class="ico_we_bnm11"></i>
                        <p>投诉反馈</p>
                    </a>
                </li>
                <li class="pubcvt_v">
                    <a href="#">
                        
                    </a>
                </li>
            </ul>
            
            
        </div>
    </div>
</div>
<script>
$(function(){
	$("#tanchua").click(function(){
		$("#xianlop_p").show().addClass('nav_gd_pop1');
		$("#kpomk_lo").show()
	})
	$("#xianlop_p").click(function(){
		$(this).hide().removeClass('nav_gd_pop1');
		$("#kpomk_lo").hide()
	})
})

</script>
</body>
</html>