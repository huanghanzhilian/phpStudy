<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-我的订单</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/index.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public_button.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public_rem.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>


</style>
</head>
<body style="background:#eee;">
<div class="header">
    <span><a href="/Home/Index/index"></a></span>
    <h1>我的订单</h1>
    
</div><!--头-->
<div class="content">
    <div class="content_con">
        <a style="display:none;" href="/Home/Index/index/">返回首页</a><center style="display:none;"><?php echo ($my); ?></center>
	<!--<div class="dingdan">
        <ul class="clearfix">
             <li>
                <a href="/Home/Index/dingdan">订单</a>
             </li>
             <li>
                <a href="/Home/Index/membercentent">用户中心</a>
             </li>
        </ul>
    </div>-->
    
<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a class="my_aduc" href="http://m.weibaishi.com/anarchy/<?php echo ($kk["id"]); ?>"><!--<?php echo ($c); ?>-->
        <div class="jixing">
            <div class="jixing_title">
                <!--<span class="pb"></span>-->
                <!--机型：<?php echo ($kk["model_name"]); ?>-->
                订单编号：<i class="bianhao"><?php echo ($kk["ddh"]); ?></i>
                <em>
			<?php if(strtoupper($kk['fk']) == 110): ?>已取消
                 <?php elseif((strtoupper($kk['stau']) == 0) or (strtoupper($kk['stau']) == 1)): ?>
                        等待接单 
                <?php elseif(strtoupper($kk['stau']) == 2): ?> 
                        等待维修
				<?php elseif(strtoupper($kk['stau']) == 3): ?> 
						 维修中
				<?php elseif(strtoupper($kk['stau']) == 4): ?> 
						等待付款
				<?php elseif(strtoupper($kk['stau']) == 5): ?> 
						待评价
                 <?php elseif(strtoupper($kk['stau']) == 6): ?>
					 已完成<?php endif; ?>             
                </em>
            </div>
            <div class="jixing_con">
                <ul>
                    <li>服务方式：<?php echo ($kk["ways_name"]); ?></li>
                    <li>创建时间：<?php echo ($kk["xo_time"]); ?></li>
                    <li>维修机型：<?php echo ($kk["model_name"]); ?></li>
                    <!--<li>手机号：<?php echo ($kk["u_phone"]); ?></li>
                    <li>问题：<?php echo ($kk["question_name"]); ?></li>
                    <li>解决方案：<?php echo ($kk["plan_name"]); ?></li>-->
                  
                </ul>
            </div>
            
            
        </div>
    </a> 
    <div class="jixing_btn">
         <div class="jixing_btn_nec jixing_btn_nec_kk">
             <span class="ousc ousc1_c"> 
				<?php if((strtoupper($kk['fapiaoa']) == '') && (strtoupper($kk['stau']) >= 5)&& (strtoupper($kk['stau']) < 7)): ?><a href="/Home/Index/fapiao/id/<?php echo ($kk["id"]); ?>">申请发票</a>
				<?php elseif((strtoupper($kk['fapiaoa']) == 1) ): endif; ?>  
            </span>
            <span class="ousc"> 
				<?php if((strtoupper($kk['pingjiazt']) == '') && (strtoupper($kk['stau']) == 5)): ?><a href="/Home/Index/pingjia/id/<?php echo ($kk["id"]); ?>">去评价</a>
				<?php elseif((strtoupper($kk['pingjiazt']) == 1) ): endif; ?>  
            </span>
			 <span class="ousc"> 
				<?php if((strtoupper($kk['stau']) >= 5) && (strtoupper($kk['fk']) < 7) && (strtoupper($kk['shouhoua']) == '')): ?><a href="/Home/Index/shouhou/id/<?php echo ($kk["id"]); ?>" onclick="if(confirm('确定申请?')==false)return false;">申请售后</a>
				<?php elseif((strtoupper($kk['shouhoua']) == 1) ): ?>
					售后中
					<?php elseif((strtoupper($kk['shouhoua']) == 2) ): endif; ?>  
            </span>
         </div>
    </div><?php endforeach; endif; ?>    
    </div>  	
</div>	



<div class="nav_gd">
    <ul>
        <li>
            <a class="on" href="http://m.weibaishi.com">
                <em class="ico_list1 "></em>
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
                <em class="ico_list3 on"></em>
                <p class="on">订单</p>
            </a>
        </li>	
        <li>
            <a class="on" href="http://m.weibaishi.com/membercentent">
                <em class="ico_list4 "></em>
                <p class="">我的</p>
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

<script type="text/javascript">
	/*function fukuan(fk){
			//alert(fk);
			var ajax=new XMLHttpRequest()
				ajax.open("get","/Home/Index/fuku/fk/"+fk,true)
				ajax.send()
				ajax.onreadystatechange=function(){
					if(ajax.readyState==4 && ajax.status==200){
						document.getElementById('e').innerHTML=ajax.responseText
					}
				}
	} */
	
$(function(){
	
	$(".ousc").each(function() {
		//var ousc=$(this).text()
		//console.log(ousc);
		var $str=$(this).text();
		var lstr = $.trim($str)
		//var str = $str.get(0);
		//console.log(lstr)
		
		if(lstr== ''){
			$(this).remove()
		}
	});
	$(".jixing_btn_nec_kk").each(function() {
		//var ousc=$(this).text()
		//console.log(ousc);
		var $str=$(this).text();
		var lstr = $.trim($str)
		//var str = $str.get(0);
		//console.log(lstr)
		if(lstr== ''){
			$(this).parent().remove()
		}
	});
})
</script>
</html>