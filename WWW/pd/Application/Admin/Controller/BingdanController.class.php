<?php
namespace Admin\Controller;
use Think\Controller;
class BingdanController extends Controller {
	public function dingdan1(){
		//新订单抢单界面
		file_get_contents('php://input');
		$sfphone=$_POST['sfphone'];//师傅电话
		$yz=M('sf_user','','connection');//师傅表
		$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();//师傅身份验证
		if(!$yanzheng){
			$sfzt = array('zt'=>'0');//验证失败
			echo  json_encode($sfzt);
		}else{
		$mysql= M('goods','','connection');//订单表
		$arr=$mysql->where("wuliu_zt='4' and goods_zt='0'")->select();//物流状态wuliu_zt'4'已签收,订单状态goods_zt '0' 新订单没有接单
		echo  json_encode($arr);//验证成功饭后数据
	}
}
	
public function yiwancheng(){
		//已完成订单
		file_get_contents('php://input');
		$sfphone=$_POST['sfphone'];//师傅电话
		$yz=M('sf_user','','connection');//师傅表
		$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();//师傅身份验证
		$sfid=$yanzheng['sf_id'];//师傅id
		if(!$yanzheng){
			$sfzt = array('zt'=>'0');//验证失败
			echo  json_encode($sfzt);
		}else{
		$mysql= M('goods','','connection');//订单表
		$arr=$mysql->join("dd_time on goods.id=dd_time.goods_id")->where("goods_zt='2' and sfid='$sfid'")->select();//goods_zt '2' 已完成订单
		echo  json_encode($arr);//验证成功饭后数据
	}
}
	public function qiangdan(){
		//抢单
		file_get_contents('php://input');
		$sfphone=$_POST['sfphone'];
		$id=$_POST['id'];//订单id
		$yz=M('sf_user','','connection');
		$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
		$sfid=$yanzheng['sf_id'];//师傅id
		if(!$yanzheng){
			$sfzt = array('zt'=>'0');
			echo  json_encode($sfzt);
		}else{
		$mysql= M('goods','','connection');
		//预约时间状态 yy_zt '1'无法预约
		$num = $mysql->where("yy_zt=1 and sfid='$sfid'")->count();//计算无法预约的次数
		if($num >5){
			//超过5次不可抢单
			$sfzt = array('ddzt'=>'4');//无法预约超过5次
			echo  json_encode($sfzt);
		}else{			//服务是否结束fuwu_zt '1'服务结束,付款状态fk_zt '0'未付款	
		//$arr1=$mysql->where("fuwu_zt='1' and fk_zt='0' and sfid='$sfid'")->find();//
		//if($arr1){
			//服务结束未付款不可抢单
			//$sfzt = array('ddzt'=>'3');
			//echo  json_encode($sfzt);
		//}else{			//预约时间状态 yy_zt '1'没有预约时间
			$arr2=$mysql->where("yy_zt='0' and sfid='$sfid' and goods_zt='1' ")->find();
			if($arr2){
				//没有预约时间不可抢单
				$sfzt = array('ddzt'=>'5');//有没有预约的订单
				echo  json_encode($sfzt);
			}else{
		$arr=$mysql->where("id='$id'")->find();
			//此订单是否有师傅id
		if(!$arr['sfid']=='0'){
			//此订单已被抢
			$sfzt = array('ddzt'=>'1');
			echo  json_encode($sfzt);
		}else{
			$ty['sfid']=$sfid;
			$ty['goods_zt']='1';//已经接单修改状态
			$arr3=$mysql->where("id='$id'")->save($ty);
			if($arr3){
			$sqll=M('dd_time','','connection');//订单$sqll=M('dd_time','','connection');//订单操作步骤的时间表
			$yt['qiangdan_time']=date('Y-m-d H:i:s', time());//抢单的时间
			$yt['goods_id']=$id;//关联哪个订单
			$arr5=$sqll->add($yt);
			if($arr5){
				$wat=$yz->where("sf_id='$sfid'")->find();
			if($wat['qiangdan_order']=='0'){
			$rr['qiangdan_order']='1';
			$ar=$yz->where("sf_id='$sfid'")->save($rr);
			}else{
			$rr['qiangdan_order']=($wat['qiangdan_order']+1);
			$ar=$yz->where("sf_id='$sfid'")->save($rr);
			}
			$sfzt = array('ddzt'=>'2');
			echo  json_encode($sfzt);
			}
			}
		//}
			
		}
		}
	}
	
}
}
	public function wufayuyue(){
		//不能预约时间
		file_get_contents('php://input');
		$sfphone=$_POST['sfphone'];
		$id=$_POST['id'];
		$yz=M('sf_user','','connection');
		$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
		//$sfid=$yanzheng['sf_id'];
		if(!$yanzheng){
			$sfzt = array('zt'=>'0');
			echo  json_encode($sfzt);
		}else{
		$mysql= M('goods','','connection');
		$yt['yy_zt']='1';
		$arr=$mysql->where("id='$id'")->save($yt);
			$sfzt = array('zt'=>'1');
			echo  json_encode($sfzt);

		}
	
	}

	public function wddd(){
		//已抢到的订单
		file_get_contents('php://input');
		$sfphone=$_POST['sfphone'];
		//$id=$_POST['id'];
		$yz=M('sf_user','','connection');
		$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
		$sfid=$yanzheng['sf_id'];
		if(!$yanzheng){
			$sfzt = array('zt'=>'0');
			echo  json_encode($sfzt);
		}else{
		$mysql= M('goods','','connection');
		$arr=$mysql->where("sfid='$sfid' and goods_zt='1'")->select();
			echo  json_encode($arr);

		}
	}
		public function ddxq(){
			//订单详情
			file_get_contents('php://input');
			//echo  json_encode($_POST);die;
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			$sfid=$yanzheng['sf_id'];
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$mysql= M('goods','','connection');
			$arr1=$mysql->where("id='$id'")->find();
			$my= M('goods_sku','','connection');//订单sku表
			$myy= M('dd_time','','connection');
			$arr2=$myy->where("goods_id='$id'")->find();
			$arr=$my->where("goods_id='$id'")->select();
			foreach ($arr as $k=>$v){
				$skkuid.=','.$v['skku_id'];
			}
			$skku_id=substr($skkuid,1);
			//订单sku和所有联查
		$arr3=$my->join("sku on goods_sku.sku_id=sku.sku_id")->where("skku_id in($skku_id)")->select();
				$dd = array('sku'=>$arr3,'xq'=>$arr1,'sj'=>$arr2);
				echo  json_encode($dd);
			}
		}
		public function ddyy(){
			//预约时间
			file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$yy_time=$_POST['yuyuetime'];//预约的时间
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			$sfid=$yanzheng['sf_id'];
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$mysql= M('goods','','connection');
			$yt['yy_time']=$yy_time;
			$yt['yy_zt']='2';//已有预约时间
			$arr=$mysql->where("id='$id'")->save($yt);
			if($arr){
			$sqll=M('dd_time','','connection');
			$ty['yuyue_time']=date('Y-m-d H:i:s', time());//操作预约时间步骤的时间
			$arr5=$sqll->where("goods_id='$id'")->save($ty);
				
			}
				$yzzt = array('yzzt'=>'1');
				echo  json_encode($yzzt);
			}
		}
		public function qiandao1(){
			//位置签到
			file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			$sfid=$yanzheng['sf_id'];
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$mysql= M('goods','','connection');
			$sqll=M('dd_time','','connection');
			$arr1=$mysql->where("id='$id'")->find();
			$yy_time=$arr1['yy_time'];
			$timr=time();
			if($timr > $yy_time){//签到时间是否大于预约时间
			$yt['qiandao_zt']='3';//签到状态qiandao_zt '3'已超时
			}else{
			$yt['qiandao_zt']=$_POST['qiandao_zt'];//签到未超时为 qiandao_zt '1'且 是位置签到
			}
			$arr=$mysql->where("id='$id'")->save($yt);
				if($arr){
			
			$ty['qiandao_time']=date('Y-m-d H:i:s',$timr);//操作签到步骤的时间
			$arr5=$sqll->where("goods_id='$id'")->save($ty);
				
			}
				$yzzt = array('yzzt'=>'1');
				echo  json_encode($yzzt);

			}
		}
		public function qiandao2(){
			//短信签到
			file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$yzm=$_POST['yzm'];//验证码
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			$sfid=$yanzheng['sf_id'];
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$mysql= M('goods','','connection');
			$arr7=$mysql->where("id='$id'")->find();
			if(!$arr7['yzm']==$yzm){//验证验证码是否匹配
				$yzzt = array('yzzt'=>'0');
				echo  json_encode($yzzt);
			
			}else{
			$yy_time=$arr7['yy_time'];
			$timr=time();
			if($timr > $yy_time){
			$yt['qiandao_zt']='3';//超时处理
			$yt['yzm']='';
			}else{
			$yt['qiandao_zt']='2';
			$yt['yzm']='';
			//短信签到处理
			}
			$arr=$mysql->where("id='$id'")->save($yt);
			if($arr){
			$sqll=M('dd_time','','connection');
			$ty['qiandao_time']=date('Y-m-d H:i:s', $timr);
			$arr5=$sqll->where("goods_id='$id'")->save($ty);
				
			}
				$yzzt = array('zt'=>'1');
				echo  json_encode($yzzt);

			}
			}
		}
	public function duanxin(){
		//阿里云短信接口.
		file_get_contents('php://input');
		//echo json_encode($_POST);
			$phone=$_POST['sfphone'];
			$id=$_POST['id'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$phone'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
					$num=randomkey(5);//生成5位数组验证码
					$usrInfo = array('yzm'=>'1');
					echo json_encode($usrInfo);
					$mysql= M('goods','','connection');
					$yt['yzm']=$num;
					$arr=$mysql->where("id='$id'")->save($yt);
					
					$host = "http://sms.market.alicloudapi.com";
					$path = "/singleSendSms";
					$method = "GET";
					$appcode = "da629d96ac3843c880e70b2e6e6d1b82";
					$headers = array();
					
					array_push($headers, "Authorization:APPCODE " . $appcode);
					Vendor("alyshimingrenzheng.Demo");
					$name= "{'name':'$num'}";
					$querys = "ParamString=$name&RecNum=$phone&SignName=维百士&TemplateCode=SMS_34335158";
					$bodys = "";
					$url = $host . $path . "?" . $querys;

					$curl = curl_init();
					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($curl, CURLOPT_FAILONERROR, false);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					//curl_setopt($curl, CURLOPT_HEADER, true);
					if (1 == strpos("$".$host, "https://"))
					{
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
					}
					var_dump(curl_exec($curl));
						$yzzt = array('zt'=>'1');
				echo  json_encode($yzzt);
			
		}
		
	}
	public function yanzhengma(){
		//验证服务是否结束
		file_get_contents('php://input');
		//echo  json_encode($$_POST);
			$phone=$_POST['sfphone'];
			$id=$_POST['id'];
			$yzm=$_POST['yzm'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$phone'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
					
					$mysql= M('goods','','connection');
					$my= M('dd_time','','connection');
					$arr=$mysql->where("id='$id'")->find($yt);
						if($arr['yzm']==$yzm){
							$yt['fuwu_zt']='1';
							$yt['yzm']='';//验证码匹配验证成功
					$arr5=$mysql->where("id='$id'")->save($yt);
					if($arr5){
					$tt['fuwujieshu_time']=date('Y-m-d H:i:s', time());//服务结束步骤的时间
					$arr6=$my->where("goods_id='$id'")->save($tt);
						$usrInfo = array('yzm'=>'1');
					echo json_encode($usrInfo);
					}
						}else{
							$usrInfo = array('yzm'=>'0');
					echo json_encode($usrInfo);
						
						}
			
					
	}
	}

	public  function  shijian(){
		file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$qiandao_zt=$_POST['qiandao_zt'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			$sfid=$yanzheng['sf_id'];
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$mysql= M('goods','','connection');
			$arr=$mysql->where("yy_zt='1' and sfid='$sfid'")->order('views desc')->select($yt);
	
	}
	}
	public function  skuname(){
		//sku
		file_get_contents('php://input');
		//echo  json_encode($_POST);die;
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$mysql= M('sku','','connection');//所有sku表
			$sql= M('goods_sku','','connection');//此订单sku表
			
			$arr1=$sql->join('sku on goods_sku.sku_id=sku.sku_id')->where("goods_id='$id' and skku_type='1'")->select();//此订单原来的sku
			
			$arr2=$sql->join('sku on goods_sku.sku_id=sku.sku_id')->where("goods_id='$id' and skku_type='0'")->select();//此订单后来添加的sku
			$arr=$mysql->select();//多有sku
			$sku= array('m'=>$arr,'y'=>$arr1,'u'=>$arr2);
				echo  json_encode($sku);
		}
	}
	public function xiugai(){
	//添加新的sku
			file_get_contents('php://input');
		//	echo  json_encode($_POST);die;
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$k=$_POST['sku_id'];//多个sku添加
			$sku_id=explode(',',$k);//把字符串转化数组
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			//$sfid=$yanzheng['sf_id'];
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$mysql= M('goods_sku','','connection');//订单sku表
			$my= M('goods','','connection');//订单表
			$sql= M('sku','','connection');//所有sku表
			$a=count($sku_id);//计算长度
			for($i=0;$i<$a;$i++){
			$skuid=$sku_id[$i];//DIE;ECHO 	
			$ty[]=array('sku_id'=>$skuid,'goods_id'=>$id,'skku_type'=>'1');//skku_type '1' 后添加
			}
			$arr1=$mysql->addAll($ty);//循环全部添加
			if($arr1){
				$arr3=$sql->where("sku_id in($k)")->select();
				foreach ($arr3 as $k=>$v){
						$sku_money.=','.$v['sku_money'];//sku对应的价格
				}
			 $sku_money=substr($sku_money,1);
			 $amount=array_sum(explode(',',$sku_money));//把新添加的sku求和
				$arr2=$my->where("id='$id'")->find();
				$yy['amount']=($arr2['amount']+$amount);//此订单sku总和
				$arr4=$my->where("id='$id'")->save($yy);
				if($arr4){
					$zt = array('zt'=>'1');
				echo  json_encode($zt);
				}
		}
	}
}
public function shanchu(){
	//删除sku
		file_get_contents('php://input');
		//echo  json_encode($_POST);exit;
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$skku_id=$_POST['skku_id'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			//$sfid=$yanzheng['sf_id'];
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$mysql= M('goods_sku','','connection');//订单sku表
			$my= M('goods','','connection');//订单表
			$sql= M('sku','','connection');//所有sku表
			$arr1=$mysql->where("skku_id='$skku_id'")->find();
			$sku_id=$arr1['sku_id'];
			$arr2=$sql->where("sku_id='$sku_id'")->find();
			$sku_money=$arr2['sku_money'];
			$arr3=$my->where("id='$id'")->find();
			//更新当前订单价格
			$tt['amount']=($arr3['amount']-$sku_money);
			$arr4=$my->where("id='$id'")->save($tt);
			if($arr4){
				//更新后删除sku
				$arr5=$mysql->where("skku_id='$skku_id'")->delete();
			}
				$zt = array('zt'=>'1');
				echo  json_encode($zt);
			}
}
public function zhuandanadd(){
		file_get_contents('php://input');
	//	
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$sf_id=$_POST['sf_id'];
			$zd_content=$_POST['zd_content'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			$arr1=$yz->where("sf_id='$sf_id'")->find();
			//echo  json_encode($arr1);die;
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
				$my= M('goods','','connection');
				$arr1=$my->where("id='$id'")->find();
				if($arr1['fk_zt']=='0'){
				$tt['sfusername']=$arr1['sf_username'];
				$tt['sfphone']=$arr1['sf_phone'];
				$tt['zd_content']=$zd_content;
				$tt['goods_zt']='10';
				$time=(time()+60*2);
				$tt['zhuandan_time']=$time;
			$arr=$my->where("id='$id'")->save($tt);
			if($arr){
				$sfzt = array('zt'=>'1');
				echo  json_encode($sfzt);
			}
		}else{
			$sfzt = array('zt'=>'2');
				echo  json_encode($sfzt);
		}
}

}
	public function zhuandan(){
		file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$list = $yz->where("!(sf_phone='$sfphone')")->select();
			echo  json_encode($list);
			
}

}
public function wojiede(){
	//指派与转单的接受界面
			file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			$sfid=$yanzheng['sf_id'];
			//$sf_phone=$yanzheng['sf_phone'];
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$my= M('goods','','connection');//goods_zt '10' 转单中
			$arr=$my->join("sf_user on goods.sfid=sf_user.sf_id")->where("goods_zt='10' and sfphone='$sfphone'")->select();//sfphone 要转给的人 
			$sfzt = array('t'=>$arr,'z'=>$arr1);
				echo  json_encode($sfzt);
	}

}

public function wozhuande(){
	//转单记录
		file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			$sfid=$yanzheng['sf_id'];
			//$sf_phone=$yanzheng['sf_phone'];
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$my= M('goods','','connection');
			$arr=$my->join("sf_user on goods.sfid=sf_user.sf_id")->where("goods_zt='10'  and sfid='$sfid'")->select();//转出中
			
			$arr1=$my->join("sf_user on goods.sfid=sf_user.sf_id")->where("goods_zt='1'  and sfphone='$sfphone' ")->select();//转单成功
			$sfzt = array('t'=>$arr,'z'=>$arr1);
				echo  json_encode($sfzt);
	}

}
public function jszhuandan(){
	//接受转单
			file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			//$sfid=$yanzheng['sf_id'];
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
				$my= M('goods','','connection');
				$mysql= M('dd_time','','connection');
				$arr1=$my->where("id='$id'")->find();
				$sfid=$arr1['sfid'];
				$sh=$arr1['sfphone'];
				$arr3=$yz->where("sf_phone='$sh'")->find();//接受转单的
				$arr2=$yz->where("sf_id='$sfid'")->find();//转出的
				//接受转单清空之前的订单状态
				$ty['sfusername']=$arr2['sf_username'];
				$ty['sfphone']=$arr2['sf_phone'];
				$ty['goods_zt']='1';
				$ty['yy_time']='';
				$ty['yy_zt']='';
				$ty['qiandao_zt']='';
				$ty['fuwu_zt']='';
			$arr=$my->where("id='$id'")->save($ty);
			if($arr){
			$yr['qiangdan_time']=date('Y-m-d H:i:s', time());
			$arr5=$mysql->where("goods_id='$id'")->save($yr);
			$sfzt = array('zt'=>'1');
				echo  json_encode($sfzt);
			}
	}

}
public function jjzhuandan(){
	//拒绝转单
			file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$yz=M('sf_user','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
				$my= M('goods','','connection');
				$arr1=$my->where("id='$id'")->find();
				//清空回归之前状态
				$tt['sfusername']='';
				$tt['sfphone']='';
				$tt['zd_content']='';
				$tt['goods_zt']='1';
				$tt['zhuandan_time']='';
				$arr=$my->where("id='$id'")->save($zy);
				$sfzt = array('zt'=>'1');
				echo  json_encode($sfzt);
	}

}
public function upvideo(){
	//视频上传
		file_get_contents('php://input');
		$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('mp4', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath  =      './';
			$upload->savePath  =      './Public/Uploads/video/'; // 设置附件上传目录    // 上传文件 
			$dir ='./Public/Uploads';
			$time=date('Y-m-d H:i:s', time());
			$goods_id=$_POST['id'];
			 mkdir($dir,$time);
     
			 $info   =   $upload->upload(); 
			 if(!$info) {      
				 $this->error($upload->getError());   
			 }else{
			$p_count = count($info);
		   for($i=0;$i<$p_count;$i++){
					$new_info = $info[$i]['savepath'].$info[$i]['savename'];//全路径
					$image = new \Think\Image(); 
					$goods_img   = str_replace('./Public/', '', $new_info);//存到数据库中的原图片路径
					$data[]=array("ioc"=>$goods_id ,"uid"=>'',"accuracy"=>$goods_img,);
				}

			$obj= M('class_video','','connection');//订单视频路径表
			$re=$obj->addAll($data);
			$mysql= M('goods','','connection');
			$my= M('dd_time','','connection');
			$at['shipin_zt']='1';
			$at['goods_zt']='2';//订单完成更新状态
			$arr1=$mysql->where("id='$goods_id'")->save($at);
			if($arr1){
			$tt['jieshu_time']=$time;//服务结束步骤的时间
			$arr6=$my->where("goods_id='$id'")->save($tt);
			$sfzt = array('zt'=>'1');
				echo  json_encode($sfzt);
			 
			}
			 }
	}
	/*public function qrcode()
		{
		//$dingdanhao='2934334110766687';
		$url="http://m.weibaishi.com/admin/payy/index/dingdanhao/20170221170002505154995";
		$level=3;
		$size=20;
       Vendor('phpqrcode.phpqrcode');
       $errorCorrectionLevel =intval($level) ;//容错级别 
       $matrixPointSize = intval($size);//生成图片大小 
       //生成二维码图片 
       $object = new \QRcode();
	   $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);
	
    }*/
	public  function  quxiao(){
		//调取取消原因的列表
		file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			//$id=$_POST['id'];
			$yz=M('sf_user','','connection');
			$myy= M('quxiao','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$arr=$myy->select();
			echo  json_encode($arr);
		}
	}
		public  function  quxiaoadd(){
			//取消操作
			file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$quxiao_content=$_POST['quxiao_content'];//填写其它原因
			$quxiao_id=$_POST['quxiao_id'];//取消原因id
			$yz=M('sf_user','','connection');
			$myy= M('quxiao','','connection');//取消原因表
			$my= M('goods','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
				$er['quxiao_content']=$quxiao_content;
				$er['quxiao_type']=$quxiao_id;
				$er['goods_zt']='15';//15取消状态
				$er['quxiao_time']==date('Y-m-d H:i:s', time());//时间
			$arr=$my->where("id='$id'")->save($er);
				$sfzt = array('zt'=>'1');
				echo  json_encode($sfzt);
		}
	}
	public function zhuandanqx(){
		//取消转单
		file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$id=$_POST['id'];
			$yz=M('sf_user','','connection');
			$my= M('goods','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone' and sfzt='4'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$arr1=$my->where("id='$id'")->find();
			if($arr1['goods_zt']==10){
			//$datae=(time()-(60*2));
			//$time=date('Y-m-d H:i:s',$datae);
			$tt['sfusername']='';
			$tt['sfphone']='';
			$tt['zd_content']='';
			$tt['goods_zt']='1';
			$tt['zhuandan_time']='';
			$arr=$my->where("id='$id'")->save($tt);
				$sfzt = array('zt'=>'1');
					echo  json_encode($sfzt);
			}else{
				$sfzt = array('zt'=>'2');
				echo  json_encode($sfzt);
			
			}
		}
	}
	


}