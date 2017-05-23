<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-首页</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
.fpnm_zhua_box{ position:relative; }
.fpnm_zhua_box:after{ content: ""; width:25px; height:25px; background:#bec0c1;  position:absolute; left:0px;  top:0px; border-radius: 100%;
    box-shadow: 0 0 10px 0 rgba(155,143,143,0.6);
    -webkit-box-shadow: 0 0 10px 0 rgba(155,143,143,0.6);
    -moz-box-shadow: 0 0 10px 0 rgba(155,143,143,0.6);
	
}
.fpnm_zhua_box a{ display:block; text-align:right; padding:0 12px; color:#afb1b2;
    
}

.fpnm_zhua_box1{ background:#fff;}
.fpnm_zhua_box.fpnm_zhua_box1 a{text-align: left; color:#6da6f8; 
	
}
.fpnm_zhua_box1:after{ content: ""; right:0px; left:auto; background:#73c1ff;
    
 }
 
.fpnm_zhua_box2:after{ content: ""; background:none;
box-shadow: 0 0 0px 0 rgba(155,143,143,0.6);
    -webkit-box-shadow: 0 0 0px 0 rgba(155,143,143,0.6);
    -moz-box-shadow: 0 0 0px 0 rgba(155,143,143,0.6);
}
.fpnm_zhua_box2 a{ text-align:center;}
</style>

<script type="text/javascript">
$(function(){
    var llp=$("#fpnm_zhua_box").find('a').text()
	if(llp=='休息中'){
		$("#fpnm_zhua_box").removeClass('fpnm_zhua_box1')
		$("#fpnm_zhua_box").removeClass('fpnm_zhua_box2')
	}else if(llp=='工作中'){
		$("#fpnm_zhua_box").addClass('fpnm_zhua_box1');
		$("#fpnm_zhua_box").removeClass('fpnm_zhua_box2')
	}else{
		$("#fpnm_zhua_box").find('a').removeAttr("onclick");
		$("#fpnm_zhua_box").addClass('fpnm_zhua_box2');
		//alert(1)
	}
	
	var chenggl= parseFloat($("#chenggl").attr('data'))
	var chenggl2=chenggl.toFixed(2)
	
	var fenshu= parseFloat($("#fenshu").attr('data'))
	var fenshu2=fenshu.toFixed(2)
	
	//console.log(fenshu2);
	$("#fenshu").text(fenshu2)
	$("#chenggl").text(chenggl2+'%')
	
	
	
	
	//师傅订单详情价格
	$( ".timjh_l span").each(function() {
		
		var tf_nuller=$(this).text();
		var tf_nullervv = $.trim(tf_nuller)
		
		if(tf_nullervv==""){
			$(this).text('--')
		}
		//console.log($(this).text());
	})
    //师傅订单详情价格
	
	
	var iopmg=$("#iopmg").attr('src')
	if(iopmg=='/Public/'){
		$("#iopmg").attr('src','../../../../Public/img/shifu_duan/wo_topm.png')
		//$("#weixian_renz").append('<div class="ssyuipo">微信认证</div>')
	}
	//console.log(iopmg)
	
})



	function ko(id){
		/*var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Shifu/shifuzhuangtai/id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('fpnm_zhua_box').innerHTML=ajax.responseText
				}
			}*/
			
		$.ajax({
			url: "/Home/Shifu/shifuzhuangtai/brand_id/",
			data:{'id':id},
			dataType: "html",
			type:'get',
			success: function (data) {
				//$this.attr("disabled", "true");
			    $("#fpnm_zhua_box").html( data);
		    	var llp=$("#fpnm_zhua_box").find('a').text()
			    if(llp=='休息中'){
					$("#fpnm_zhua_box").removeClass('fpnm_zhua_box1')
				}else if(llp=='工作中'){
			        $("#fpnm_zhua_box").addClass('fpnm_zhua_box1');
		        }else{
					$("#fpnm_zhua_box").find('a').removeAttr("onclick");
				}
			}
		})
		
		
		
		
	}
</script>


</head>

<body  style="background:#f5f5f5">
<div class="shiff_banner">
    <div class="shiff_banner_top">
    <a id="weixian_renz" class="weixian_renz" href="/Home/Shifu/shangchuan"><img id="iopmg" src="/Public/<?php echo ($avatar); ?>" width=50 height=50 /></a>
       
    </div>
    <h1 class="shji_name"><?php echo ($user_username); ?></h1>
    <div class="fpnm_zhua">
        <span id="fpnm_zhua_box" class="fpnm_zhua_box">
            <a href='javascript:void(0)' onclick="ko(<?php echo ($sfzt); ?>)"><?php echo ($kongxian); ?></a>
        </span>
    </div>
</div>

<div class="combutut">
    <div class="combutut_box">
        <!--1-->
        <div class="combutut_box_cnn">
            <div class="combutut_box_top_top">
                共维修<?php echo ($nums); ?>单
            </div>
            <div class="combutut_box_top_con pubcvt">
                <li class="pubcvt_v">
                    <a href="/Home/Shifu/wxcgl"><span id="chenggl" data="<?php echo ($lv); ?>">100%</span>
                    <p>维修成功率</p></a>
                </li>
                <li class="pubcvt_v">
                    <a href="/Home/Shifu/pjpf"><span data="<?php echo ($xingji); ?>" id="fenshu"><?php echo ($xingji); ?></span>
                    <p>平均评分</p></a>
                </li>
				<li class="pubcvt_v">
                    <a href="/Home/Shifu/tckh"><span><?php echo ($cj); ?></span>
                    <p>推荐客户</p></a>
                </li>
                <li class="pubcvt_v">
                    <span>--</span>
                    <p>售后率</p>
                </li>
            </div>
            <div class="combutut_box_top_but">
                <a href="/Home/Gouwuche/my_evaluate">我的评价</a>
            </div>
        </div>
        <!--1-->
        
        <!--2-->
        <div class="combutut_box_cnn">
            
            <div class="combutut_box_top_con pubcvt">
                <li class="pubcvt_v bumck">
                    <em class="timjh"><a href="/Home/Gouwuche/yuer_tixian">提现</a></em>
                    <div class="timjh_l">
                        <span><?php echo ($yuemoney); ?></span>
                        <p>我的余额</p>
                    </div>
                </li>
                <li class="pubcvt_v bumck">
                    <em class="timjh"><a href="/Home/Gouwuche/huankuan_tixian">还款</a></em>
                    <div class="timjh_l">
                        <span>-<?php echo ($yue); ?></span>
                        <p>信用透支</p>
                    </div>
                </li>
                
            </div>
            <div class="combutut_box_top_but">
                <a href="/Home/Gouwuche/my_wallet">我的钱包</a>
            </div>
        </div>
        <!--2-->
        
        <!--3-->
        <div class="combutut_box_cnn">
           
            <div class="combutut_box_top_con pubcvt">
                
                <li class="pubcvt_v bumck bumck1">
                    <a href="/Home/Gouwuche/peijiandingdan">
                        <img src="../../../../Public/img/shifu_duan/ccmkhdfg1_03.png">
                        <span>配件订单</span>
                    </a>
                </li>
                <li class="pubcvt_v bumck bumck1">
                    <a href="/Home/Gouwuche/goumaichanpin">
                        <img src="../../../../Public/img/shifu_duan/ccmkhdfg_03.png">
                        <span>配件商城</span>
                    </a>
                </li>
            </div>
            <div class="combutut_box_top_but">
                <a href="/Home/Gouwuche/cangkua">我的仓库</a>
            </div>
        </div>
        <!--3-->
        
        
    </div>
</div>




<!--底部-->
<div class="footer footer1">
    <div class="bot">
      <ul class=" pubcvt">
          
          <li class="pubcvt_v">
              <a class="on" href="/Home/Shifu/index" >
                  <span class="sh_icon2"></span>
                  <p>首页</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="/Home/Shifu/shifu"  >
                  <span class="sh_icon3"></span>
                  <p>订单</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="/Home/Shifu/daiwancheng" >
                  <span class="sh_icon5"></span>
                  <p>服务</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="/Home/Shifu/my_wode" >
                  <span class="sh_icon4"></span>
                  <p>我的</p>
              </a>
          </li>
         
      </ul>
    </div>
</div>
<!--底部--


</body>
</html>