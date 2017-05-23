<?php
if(empty($_COOKIE['username'])){
			$my='<a href='.__MODULE__.'/Shifu/tuichua>请登录</a>';
		}else{
			$user_name=$_COOKIE['username'];
			$my='欢迎&nbsp;'.$_COOKIE['username'].'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href='.__MODULE__.'/Shifu/shifu>维修中心</a>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href='.__MODULE__.'/Grzx/index>个人中心</a>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href='.__MODULE__.'/Gouwuche/peijiandingdan>配件订单</a>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href='.__MODULE__.'/Shifu/tuichua>退出登录</a>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href='.__MODULE__.'/Gouwuche/goumaichanpin>购买产品</a>';
			
			}
		

?>