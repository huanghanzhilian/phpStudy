<?php
if(empty($_COOKIE['username'])){
			$my='<a href='.__MODULE__.'/Index/login>请登录</a>';
		}else{
			$my='欢迎&nbsp;'.$_COOKIE['username'].'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href='.__MODULE__.'/Index/membercentent>用户中心</a>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href='.__MODULE__.'/Index/tuichu>退出登录</a>';
			}
		


?>