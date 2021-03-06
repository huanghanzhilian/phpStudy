<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-手机维修-维修流程</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/TouchSlide.1.1.js"></script>
<style type="text/css">
/* css 重置 */


/* 内容 */
#content{ padding:46px 0 0 0; background:#fff;}
.path{ padding:0 0 5px 5px;   }

/* 效果导航 */
.effectNav{ margin-top:10px;  border-top:1px solid #666; background:#999; padding-bottom:10px;  }
.effectNav h3{ padding:0 10px; background:#ddd; background:#333; color:#fff;  }
.effectNav ul{ font-size:0;  }
.effectNav li{ display:inline-block; font-size:12px; padding:0 10px; margin:10px 0 0 10px;  background:#cdcdcd;  }
.effectNav li.new{ background:#fce8cd;  }
.tabBox .hd{ height:38px; line-height:38px;  font-size:20px; position: fixed; bottom:0px; width:100%; z-index:19;}
.tabBox .hd h3{ position:relative;  height:38px; line-height:33px;   text-align:center;    border-bottom:1px solid #fff; 	}
.tabBox .hd .type{ float:right;   }
.tabBox .hd .type a{ float:left; color:#666; font-size:20px; padding:0 5px; }
.tabBox .hd ul{ position:absolute; bottom:20px; height:8px; width:100%; text-align:center; z-index:14;}
.tabBox .hd ul li{ width:8px; height:8px; overflow:hidden; line-height:99px; background:#E8E8E8; display:inline-block; vertical-align:top; margin:0 5px;; 
-webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; }
.tabBox .hd ul .on{ background:#4097DE;  }

.tabBox .bd ul{ padding-top:15px; padding-bottom:50px;}
.tabBox .bd li{ height:33px; line-height:33px;   }
.tabBox .bd li a{ color:#666;  -webkit-tap-highlight-color:rgba(0,0,0,0); }  /* 去掉链接触摸高亮 */


.box_con{ padding:0 12px; position:relative; z-index:}
.box_con:after{ content: ""; width:43px; height:43px; background: #fff url(../../../../Public/img/images/ok_cc1.png) center center no-repeat; position:absolute; bottom:-40px; left:50%; z-index:15201; margin-left:-21px; background-size:100%;}
.smlc{ width:150px; height:55px; padding:0 12px; line-height:55px; border:1px solid #3e7edb; border-radius: 4px; margin:auto; color:#3e7edb; font-size:16px; background-color:#fff; position:relative; z-index:177;}
.smxx_2 .smlc{ border-color:#e99400; color:#e99400;}
.smxx_2 .liuc_a{ background-image:url(../../../../Public/img/images/liuc_a_2.png)}
.smxx_2 .liuc_a_1_1{ background-image: url(../../../../Public/img/images/liuc_b_1.png)}
.smxx_2 .liuc_a_1_2{ background-image: url(../../../../Public/img/images/liuc_b_2.png)}
.smxx_2 .liuc_a_1_a3{ background-image: url(../../../../Public/img/images/liuc_b_3.png)}
.smxx_2 .liuc_a_1_a4{ background-image: url(../../../../Public/img/images/liuc_b_4.png)}
.smxx_2 .liuc_a_1_a5{ background-image: url(../../../../Public/img/images/liuc_b_5.png)}
.smxx_2 .box_con:after{ background-image:url(../../../../Public/img/images/ok_cc3.png)}

.liuc_a{ background:url(../../../../Public/img/images/liuc_a_1.png) center center no-repeat; width:35px; height:35px; display:inline-block; background-size:100% 100%; vertical-align:middle; margin-right:8px;}
.smxx_1{ color:#3e7edb; position:relative; }
.smxx_1:after{ content: ""; width:1px; height:100%; display:block; background:#3e7edb; position:absolute; left:50%; top:0px; margin-top:50px;}
.smxx_1:before{ content: ""; width:10px; height:132px; display:block; background:#fff; position:absolute; left:50%; bottom:0px; margin-left:-5px; margin-top:50px; z-index:11;}
.smxx_2:after{ content: ""; width:1px; height:100%; display:block; background:#e99400; position:absolute; left:50%; top:0px; margin-top:50px;}
.smxx_2:before{ content: ""; width:10px; height:132px; display:block; background:#fff; position:absolute; left:50%; bottom:0px; margin-left:-5px; margin-top:50px; z-index:11;}
.smxx_2 .lic_x:before{ background:rgba(233,148,0,0.3);}
.smxx_2 .lic_x:after{ background:#e99400;}

.smxx_2{ color:#e99400 ;}
.smxx_3{ color:#00cae5; position:relative;}
.smxx_3 .smlc{ border-color:#00cae5; color:#00cae5;}
.smxx_3 .liuc_a{ background-image: url(../../../../Public/img/images/liuc_a_3.png);}
.smxx_3 .liuc_a_1_1{ background-image:url(../../../../Public/img/images/liuc_c_1.png)}
.smxx_3 .liuc_a_1_2{ background-image:url(../../../../Public/img/images/liuc_c_2.png)}
.smxx_3 .liuc_a_1_a3{ background-image:url(../../../../Public/img/images/liuc_c_3.png)}
.smxx_3 .liuc_a_1_a4{ background-image:url(../../../../Public/img/images/liuc_c_4.png)}
.smxx_3 .liuc_a_1_a5{ background-image:url(../../../../Public/img/images/liuc_c_5.png)}
.smxx_3 .liuc_a_1_a6{ background-image:url(../../../../Public/img/images/liuc_c_6.png)}
.smxx_3 .ljhg{ width:1px; height:100%; display:block; background:#00cae5; position:absolute; left:50%; top:0px; margin-top:50px;}
.smxx_3 .ljhgr{ width:10px; height:50px; display:block; background:#fff; position:absolute; left:50%; bottom:0px; margin-left:-5px; margin-top:50px; z-index:11; }
.smxx_3 .lic_x:before{ background:rgba(0,202,229,0.3);}
.smxx_3 .lic_x:after{ background:#00cae5;}
.smxx_3 .box_con:after{ background-image:url(../../../../Public/img/images/ok_cc2.png)}

.lic_x{ position:relative; min-height:120px;
	display: -webkit-box;
    display: -webkit-flex;
    display: flex;
}
.lic_x:after{ content: ""; width:9px; height:9px; position:absolute; background:#3e7edb; border-radius: 50%; top:50%; left:50%; margin-top:-4px; margin-left:-4px;}
.lic_x:before{ content: ""; width:13px; height:13px; position:absolute; background:rgba(62,126,219,0.3); border-radius: 50%; top:50%; left:50%; margin-top:-6px; margin-left:-6px;}
.lic_x_c{
	-webkit-box-flex: 1;
    -webkit-flex: 1;
    flex: 1;
}
.xyz{ text-align:right; padding-right:16px; font-size:16px;   position:relative;  padding-top:10px;}
.xyz1{ text-align: left; padding-left:16px;}
.liuc_a_1{ margin-left:12px; width:48px; height:48px; display:inline-block; background-size:100% 100%; vertical-align:middle; }
.liuc_a_1_b{ margin-left:auto; margin-right:12px;}
.liuc_a_1_1{ background-image:url(../../../../Public/img/images/liuc_a_1_a_1.png)}
.liuc_a_1_2{ background-image:url(../../../../Public/img/images/liuc_a_1_a_2.png)}
.cdefu{  display:inline-block;  position:absolute; bottom:0px; right:78px;}
.cdefu1{ left:76px; right:auto;}

.lic_x_l>p{ padding-top:8px; line-height:18px; padding-right:16px; font-size:10px; color:#808080; text-align:right;}
.lic_x_r>p{ padding-top:8px; line-height:18px; padding-left:16px; font-size:10px; color:#808080; text-align: left;}
.lic_x_l{ }

.liuc_a_1_a3{ background-image:url(../../../../Public/img/images/liuc_a_1.png)}
.liuc_a_1_a4{ background-image:url(../../../../Public/img/images/liuc_a_1_a4.png)}
.liuc_a_1_a5{ background-image:url(../../../../Public/img/images/liuc_a_1_a5.png)}
</style>
</head>

<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>维修流程</h1>
    
</div><!--头-->

<div id="content">

			<div id="tabBox" class="tabBox">
				<div id="tabBoxHd" class="hd">
					<span class="type"><a href="#"></a><a href="#"></a><a href="#"></a></span>
					<h3><b></b>
						<ul></ul>
					</h3>
				</div>
                
                
				<div class="bd">
						<ul class="smxx_1">
                            <div class="box_con">
                                <div class="smlc">
                                    <span class="liuc_a"></span>上门维修流程 
                                </div>
                                
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        <div class="xyz">
                                            <span class="cdefu">在线下单</span><span class="liuc_a_1 liuc_a_1_1"></span>
                                        </div>
                                        <p class="xyjz">您可通过维百士官网点选需要维修的机型及故障信息,并提交订单</p>
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                    
                                    </div>
                                </div>
                                
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                        <div class="xyz xyz1">
                                            <span class="liuc_a_1 liuc_a_1_2 liuc_a_1_b"></span><span class="cdefu cdefu1">工程师接单</span>
                                        </div>
                                        <p class="xyjz">维百士确认订单，制定维修方案并匹配专业工程师负责您设备的维修</p>
                                    </div>
                                </div>
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        <div class="xyz">
                                            <span class="cdefu">上门维修</span><span class="liuc_a_1 liuc_a_1_a3"></span>
                                        </div>
                                        <p class="xyjz">工程师上门维修您的手机，方便快捷高效</p>
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                    
                                    </div>
                                </div>
                                
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                        <div class="xyz xyz1">
                                            <span class="liuc_a_1 liuc_a_1_b liuc_a_1_a4"></span><span class="cdefu cdefu1">维修完成</span>
                                        </div>
                                        <p class="xyjz">请您试用手机，确定手机是否恢复正常</p>
                                    </div>
                                </div>
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        <div class="xyz">
                                            <span class="cdefu">在线支付</span><span class="liuc_a_1 liuc_a_1_a5"></span>
                                        </div>
                                        <p class="xyjz"></p>
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                    
                                    </div>
                                </div>
                                
                                
                            </div>
						</ul>
						<ul class="smxx_2">
							<div class="box_con">
                                <div class="smlc">
                                    <span class="liuc_a"></span>到店维修流程  
                                </div>
                                
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        <div class="xyz">
                                            <span class="cdefu">在线下单</span><span class="liuc_a_1 liuc_a_1_1"></span>
                                        </div>
                                        <p class="xyjz">您可通过维百士官网点选需要维修的机型及故障信息,并提交订单</p>
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                    
                                    </div>
                                </div>
                                
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                        <div class="xyz xyz1">
                                            <span class="liuc_a_1 liuc_a_1_2 liuc_a_1_b"></span><span class="cdefu cdefu1">导航到店</span>
                                        </div>
                                        <p class="xyjz">请您带好需要维修的手机到预约的维修中心</p>
                                    </div>
                                </div>
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        <div class="xyz">
                                            <span class="cdefu">工程师接单</span><span class="liuc_a_1 liuc_a_1_a3"></span>
                                        </div>
                                        <p class="xyjz">维百士确认订单，并指派专业工程师检查您的设备，制定维修方案</p>
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                    
                                    </div>
                                </div>
                                
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                        <div class="xyz xyz1">
                                            <span class="liuc_a_1 liuc_a_1_b liuc_a_1_a4"></span><span class="cdefu cdefu1">维修完成</span>
                                        </div>
                                        <p class="xyjz">工程师已修复您的手机，请试用设备，确定手机是否恢复正常</p>
                                    </div>
                                </div>
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        <div class="xyz">
                                            <span class="cdefu">在线支付</span><span class="liuc_a_1 liuc_a_1_a5"></span>
                                        </div>
                                        <p class="xyjz"></p>
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                    
                                    </div>
                                </div>
                                
                                
                            </div>
						</ul>
						<ul class="smxx_3">
                          <div class="ljhgr"></div>
							<div class="box_con">
                                <div class="smlc">
                                    <span class="liuc_a"></span>邮寄维修流程 
                                </div>
                                
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        <div class="xyz">
                                            <span class="cdefu">在线下单</span><span class="liuc_a_1 liuc_a_1_1"></span>
                                        </div>
                                        <p class="xyjz">您可通过维百士官网点选需要维修的机型及故障信息,并提交订单</p>
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                    
                                    </div>
                                </div>
                                
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                        <div class="xyz xyz1">
                                            <span class="liuc_a_1 liuc_a_1_2 liuc_a_1_b"></span><span class="cdefu cdefu1">邮寄设备</span>
                                        </div>
                                        <p class="xyjz">请您将故障设备寄送至维百士维修中心，以便我们检测维修</p>
                                    </div>
                                </div>
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        <div class="xyz">
                                            <span class="cdefu">收件并检测设备</span><span class="liuc_a_1 liuc_a_1_a3"></span>
                                        </div>
                                        <p class="xyjz">维百士收到您的设备、确认订单，并指派专业工程师检查您的设备，制定维修方案</p>
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                    
                                    </div>
                                </div>
                                
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                        <div class="xyz xyz1">
                                            <span class="liuc_a_1 liuc_a_1_b liuc_a_1_a4"></span><span class="cdefu cdefu1">设备维修</span>
                                        </div>
                                        <p class="xyjz">工程师根据制定的维修方案对您的设备进行维修</p>
                                    </div>
                                </div>
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        <div class="xyz">
                                            <span class="cdefu">在线支付</span><span class="liuc_a_1 liuc_a_1_a5"></span>
                                        </div>
                                        <p class="xyjz">设备维修完成后，请尽快完成订单支付，维百士将在您完成支付后安排回寄设备给您。</p>
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                    
                                    </div>
                                </div>
                                
                                <div class="lic_x">
                                    <div class="lic_x_c lic_x_l">
                                        
                                    </div>
                                    <div class="lic_x_c lic_x_r">
                                        <div class="xyz xyz1">
                                            <span class="liuc_a_1 liuc_a_1_b liuc_a_1_a6"></span><span class="cdefu cdefu1">回寄签收</span>
                                        </div>
                                        <p class="xyjz">您的设备将会通过顺丰回寄给您</p>
                                    </div>
                                </div>
                                
                            </div>
                          <div class="ljhg"></div>
						</ul>
				</div>
			</div>
			<script type="text/javascript">
				TouchSlide({
					slideCell:"#tabBox",
					titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
					effect:"leftLoop", 
					autoPage:true, //自动分页

					startFun:function(i,c){ // 切换当前标题
						var hd = document.getElementById("tabBoxHd");
						hd.getElementsByTagName("b")[0].innerText=hd.getElementsByTagName("a")[i].innerText;
					}
				})
			</script>



	</div>



</body>
</html>