<?php
header("Content-Type:text/html; charset=utf-8");
$dsn="DRIVER=Microsoft Access Driver (*.mdb);DBQ=".realpath("ee.mdb");
$conn=odbc_connect($dsn,"","jjwangxing0523",SQL_CUR_USE_ODBC );
  $pid=$_POST['pid'];
 $query=odbc_do($conn,"select * from dingdan where id={$pid}");
  $r=iconv('gb2312','utf-8',odbc_result($query,1));
 
  $usernamee=iconv('gb2312','utf-8',odbc_result($query,5));//昵称
  $phone=iconv('gb2312','utf-8',odbc_result($query,9));//手机
  $post_code=iconv('gb2312','utf-8',odbc_result($query,10));//邮编
  $city=iconv('gb2312','utf-8',odbc_result($query,11));//市
  $province=iconv('gb2312','utf-8',odbc_result($query,12));//省
  $district=iconv('gb2312','utf-8',odbc_result($query,13));//区
  $country=iconv('gb2312','utf-8',odbc_result($query,14));//国家
  $conno=iconv('gb2312','utf-8',odbc_result($query,26));//地址id
  $logistics_number=iconv('gb2312','utf-8',odbc_result($query,27));//物流订单号
  $goods_name=iconv('gb2312','utf-8',odbc_result($query,28));//货品名称
  $goods_na=iconv('gb2312','utf-8',odbc_result($query,29));//货品简称
  $goods_number=iconv('gb2312','utf-8',odbc_result($query,30));//货号
  $goods_price=iconv('gb2312','utf-8',odbc_result($query,31));//货品价格
  $goods_nums=iconv('gb2312','utf-8',odbc_result($query,32));//货品数量
  $discount_price=iconv('gb2312','utf-8',odbc_result($query,34));//优惠金额
  $sum_price=iconv('gb2312','utf-8',odbc_result($query,37));//总金额



$que=odbc_do($conn,"select * from shou where id={$conno}");
$username=iconv('gb2312','utf-8',odbc_result($que,5));//姓名
$qibiao=iconv('gb2312','utf-8',odbc_result($que,57));//旗子
$revise_time=iconv('gb2312','utf-8',odbc_result($que,50));//订单修改时间
$order_state=iconv('gb2312','utf-8',odbc_result($que,63));//订单状态
$forum=iconv('gb2312','utf-8',odbc_result($que,61));//平台
$address=iconv('gb2312','utf-8',odbc_result($que,7));//收货地址
 $order_time=iconv('gb2312','utf-8',odbc_result($que,50));
  
  $quee=odbc_do($conn,"select * from item where id={$pid}");
  
  $goods_content=iconv('gb2312','utf-8',odbc_result($quee,22)).'22';//商品描述

 $goods_color=iconv('gb2312','utf-8',odbc_result($quee,29)).'29';//颜色
 $shop_card=iconv('gb2312','utf-8',odbc_result($quee,41)).'41';//店铺ID
 $goods_card=iconv('gb2312','utf-8',odbc_result($quee,42)).'42';//货品ID
 //$goods_img=iconv('gb2312','utf-8',odbc_result($quee,47)).'47';//图片
$sku_id=iconv('gb2312','utf-8',odbc_result($quee,49)).'49';//sku-id
$order_number=iconv('gb2312','utf-8',odbc_result($quee,50)).'50';//子订单号
$link=mysql_connect('127.0.0.1','root','root');
mysql_select_db('user',$link);
$mysql="select * from dingdan where logistics_number='$logistics_number'";
$ree=mysql_query($mysql);
$arr=mysql_fetch_assoc($ree);

if($arr==''){
//echo 1;exit;
$sql="insert into dingdan(username,usernamee,phone,post_code,country,province,city,district,address,logistics_number,goods_name,goods_na,goods_number,goods_price,goods_nums,discount_price,sum_price,goods_content,goods_color,shop_card,goods_card,sku_id,qibiao,forum,order_state,revise_time,order_number,order_time,zt)values('$username','$usernamee','$phone','$post_code','$country','$province','$city','$district','$address','$logistics_number','$goods_name','$goods_na','$goods_number','$goods_price','$goods_nums','$discount_price','$sum_price','$goods_content','$goods_color','$shop_card','$goods_card','$sku_id','$qibiao','$forum','$order_state','$revise_time','$order_number','$order_time','1')";
		
		$re=mysql_query($sql);
		if($re){
		$mysqll="select * from dingdan where logistics_number='$logistics_number'";
		$reel=mysql_query($mysqll);
		$arr5=mysql_fetch_assoc($reel);
		 echo json_encode($arr5);die;
		}else{
		 "2";
		}

}else{
if($arr['username']==$username && $arr['phone']==$phone &&  $arr['city']==$city &&  $arr['province']==$province && $arr['district']==$district &&  $arr['address']==$address && $arr['qibiao']==$qibiao &&  $arr['order_state']==$order_state  && $arr['revise_time']==$revise_time){

	$mysqll="select * from dingdan where logistics_number='$logistics_number'";
		$reel=mysql_query($mysqll);
		$arr5=mysql_fetch_assoc($reel);
		 echo json_encode($arr5);die;
	}else{
		if($arr['phone']==$phone){
			$arr2="update dingdan set username='$username',phone='$phone',city='$city',province='$province',district='$district',address='$address',qibiao='$qibiao',order_state='$order_state',revise_time='$revise_time',zt='3' where logistics_number='$logistics_number'";
		$ef=mysql_query($arr2);
	 if($ef){
	$mysqll="select * from dingdan where logistics_number='$logistics_number'";
		$reel=mysql_query($mysqll);
		$arr5=mysql_fetch_assoc($reel);
		 echo json_encode($arr5);die;
		}else{
		 "2";
		}
		}else{
			$arr1="update dingdan set username='$username',phone='$phone',city='$city',province='$province',district='$district',address='$address',qibiao='$qibiao',order_state='$order_state',revise_time='$revise_time',zt='1' where logistics_number='$logistics_number'";
		$e=mysql_query($arr1);
	 if($e){
	$mysqll="select * from dingdan where logistics_number='$logistics_number'";
		$reel=mysql_query($mysqll);
		$arr5=mysql_fetch_assoc($reel);
		 echo json_encode($arr5);die;
		}else{
		 "2";
		}
	
		}
	
	
	}
	
 

}
?>