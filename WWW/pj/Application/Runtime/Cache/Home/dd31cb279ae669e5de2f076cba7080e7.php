<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-工程师-手机配件</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style type="text/css">
#gw{float:right;margin-right:300px;}

/*手机配件22*/
.mkloop_l{ margin-right:80px;}





/*手机配件22*/

</style>
</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>手机配件</h1>
    
</div><!--头-->
<!--内容-->
<div class="content">
    <div class="content_con">

	     <div id='de'>
            <div class="peijian_m">
                <div class="peijian_m_box">
                    <ul>
                        <?php if(is_array($arr1)): foreach($arr1 as $key=>$vv): ?><li>
                            <div class="mkloop_r">
                                <span data="<?php echo ($vv["gw_id"]); ?>" onclick="jian(this,<?php echo ($vv["gw_id"]); ?>);" class="jianqu"></span>
                                <em id='first<?php echo ($vv["gw_id"]); ?>'><?php echo ($vv["nums"]); ?></em>
                                <span onclick="jia(<?php echo ($vv["gw_id"]); ?>);" class="jiadd"></span>
                            </div>
                            <div class="mkloop_l">
                                <span><?php echo ($vv["cpk_name"]); ?></span>
                                <span class="biansd"><?php echo ($vv["gw_pricee"]); ?>元</span><!--<a href="javascript:void(0)" onclick='del(<?php echo ($vv["gw_id"]); ?>)'>删除</a>-->
                            </div> 
                        </li><?php endforeach; endif; ?>
                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--内容-->  
<!--nav固定-->
<div class="nav_gd">
    <div class="nudt_1a cunmgy">
        <li class="nudt_1_lb">
            <div class="fkun_l">
                <div class="goubujk">
                    
                    <span id="fi"><?php echo ($nums); ?></span>
                </div>
            </div>
            <div class="dinbbbu">
                订单总额:<span id="abc"><?php echo ($price); ?></span>元
            </div>
        </li>
        <li id="dupun_ct" class="nudt_1_rc">
            <a id="buttnmute" href="/Home/Gouwuche/querendingdan">下一步<!--<?php echo ($qr); ?>--></a>
        </li>
    </div>
</div>

<!--nav固定-->
</body>
</html>
<script type="text/javascript">



function mkous(){
	if($("#fi").text()=='0'){
		$("#buttnmute").attr('href','javascript:void(0);')
		$("#dupun_ct").removeClass('nudt_1_rc1');
	}else{
		$("#dupun_ct").addClass('nudt_1_rc1');
		$("#buttnmute").attr('href','/Home/Gouwuche/querendingdan')
	}
}
mkous()





		/*function jia(id){
		//var	price=$('#abc').html()
		
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/jia_number/id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
						document.getElementById('first'+id).innerHTML=ajax.responseText
						//document.getElementById('abc').innerHTML=ajax.responseText
					
				}
			}

	}*/
			function jia(id){
			//	alert(id);
                        $.ajax({
                            url:"/Home/Gouwuche/jia_number",
                            data:{'id':id},
                            dataType:'json',
                            type:'get',
                            success:function(msg){
                                $('#first'+id).html(msg.nums);
								$('#fi').html(msg.gwnums);
								$('#abc').html(msg.price);		
                            }
                        });
                    }
			function jian(mmk,id){
				  
                        $.ajax({
                            url:"/Home/Gouwuche/jian_number",
                            data:{'id':id},
                            dataType:'json',
                            type:'get',
                            success:function(msg){
                                $('#first'+id).html(msg.nums);
								
								$('#fi').html(msg.gwnums);	
								$('#abc').html(msg.price);
								
								/*var nipo=msg.nums;
								if(nipo==1){
									
								}
								console.log(nipo);*/
                            }
                        });
						
						var unttu=($(mmk).attr('data'))
						console.log(unttu)
						var hioum=$(mmk).next('em').text()
						if(hioum==1){
							if(window.confirm('你确定要取消此订单吗？')){
								del(unttu)
								window.location.reload()
								//alert("确定");
								//return true;
								}else{
								//alert("取消");
								//return false;
							} 
							
						}
						
						
                    }
					
					
			
			/*if($('#first'+id).text()==1){
				$('#first'+id).click(function(){
					alert(2)
				})
			
			}*/
			
			
			/*$(".jianqu").click(function(){
			   // $(this).prev('input').attr("checked",true);
			     var huq_id=$(this).attr('data')
				 console.log(huq_id);
				$( ".peijian_m_box em" ).each(function(){
					if($(this).text()==1){
						del(huq_id)
					}
				})
			})*/
		function del(id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/gouwucheajax/id/"+id)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('de').innerHTML=ajax.responseText
				}
			}
	}	
					
			

</script>