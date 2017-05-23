<?php

/**
 * ping ++ demo 支付后处理
 *
 * @author widuu <admin@widuu.com>
 */

namespace Home\Controller;

use Think\Controller;

class WxpayController extends Controller {


public function index(){
	
	$id=I('post.id');
	$mysql=M('goods');
	$goodinfo=$mysql->where("ddh='$id'")->find();
	//var_dump($goodinfo);die;
	if($goodinfo)
		$_SESSION['goodinfo'] = $goodinfo;
	Vendor("wxpay.JsApiPay");
	$wxpay = new \JsApiPay();
	$open = $wxpay->GetOpenid();
	//$_SESSION['openid'] = $open;
//	var_dump($goodinfo);die;	
	$this->assign('good',$_SESSION['goodinfo']);
	$this->assign('open',$open);
	$this->display();
	
   }

public function getOpenid()
{

		
}

	public function notify(){
		$event = json_decode(file_get_contents("php://input"),true);
		//file_put_contents('notify.txt', file_get_contents("php://input"));
		// 对异步通知做处理
		if (!isset($event['type'])) {
		    header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request');
		    exit("fail");
		}
		switch ($event['type']) {
		    case "charge.succeeded":
				$payinfo = $event['data']['object'];
				file_put_contents('./uu.txt',$payinfo);
				if($payinfo['paid']==true){
					$order_no=$map['order_no'] = $payinfo['order_no']; 
					$data['buyer'] = $payinfo['transaction_no'];
					$data['stau'] = 1;
					$ui=M('Carts');
					$res=$ui->where("order_no='$order_no'")->find();
						$id=$res['gid'];
					$result = $ui->where("order_no='$order_no'")->save($data);
					if($result){
				$sql=M('goods');
				$post['fk']=1;
				$post['stau']=5;
				$post['fk_time']=date('Y-m-d H:i:s', time());
				$arr1=$sql->where("id='$id'")->find();
					$yq_id=$arr1['yq_id'];
					$am=$arr1['amount'];
					$yonghuwx_id=$arr1['yonghuwx_id'];
				if($am >149){
				if(!$yq_id==''){
				$hjob=M('yaoqingma');
				$rtyu=$hjob->join("m_user on yaoqingma.yq_user_id=m_user.user_id")->join("wd_customer on m_user.customer_id=wd_customer.customer_id")->where("yq_id='$yq_id'")->find();
				$openid=$rtyu['openid'];
				vendor('Hongbao.oauth2');
				$wxapi = new \Wxapi();
				$res = $wxapi->pay($openid);
				}
				}
				if($yonghuwx_id){
				$hjob=M('yonghuwx');
				$rtyu=$hjob->where("yonghuwx_id='$yonghuwx_id'")->find();
				$openid=$rtyu['openid'];
				vendor('Hongbao.oauth2');
				$wxapi = new \Wxapi();
				$res = $wxapi->pay($openid);
				}
				$yhq_id=$arr1['yhq_id'];
			
				if($arr1['wxfy']){
				$wxfy=$arr1['wxfy']*0.3;
				}
				
				
				$amountt=$arr1['amountt'];
				$cangku_id=$arr1['cangku_id'];
				$amount=$arr1['amount'];
				$datat['cpk_id']=$cppk_id=$arr1['cppk_id'];
				$user_id=$datat['user_id']=$user_id=$arr1['user_id'];
				$datat['goodid']=$ddh=$arr1['ddh'];
				$datat['zt']=1;
				$datat['time']=date('Y-m-d H:i:s', time());
				$datat['ddh']=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
						$userr=M('m_user');
						$arr13=$userr->where("user_id='$user_id'")->find();
				$arr=$sql->where("id='$id'")->save($post);
				if($arr){
					$h=M('yue');
					$dat['user_id']=$user_id;
					$dat['yue_type']='维修订单';
					$dat['ddh']=$ddh;
					if($arr1['ways_id']==1){
						$amoun=$amount-$wxfy;
						$dat['jy_money']='+'.$amoun;
					}else if($arr1['ways_id']==2 || $arr1['ways_id']==3){
						$amoun=$amount-30-$wxfy;
						$dat['jy_money']='+'.$amoun;
					}
					$dat['jy_time']=date('Y-m-d H:i:s', time());
					$arrt=$h->add($dat);
					if($arrt){
					if($cangku_id){
				$my=M('cangku');
				$arr5=$my->where("cangku_id in($cangku_id)")->delete();
					if($arr5){
						if($cppk_id){
							$mysqll=M('huishou');
							$arr6=$mysqll->add($datat);
							if($arr6){
							   if(($arr1['ways_id']==2) || ($arr1['ways_id']==3)){
								 $yu['yuemoney']=($arr13['yuemoney']+(($arr1['amount']-30-$wxfy)+$amountt));
								 $arr12=$userr->where("user_id='$user_id'")->save($yu);
									if($arr12){
								if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
									if($sd){
									$h=M('yue');
										$dat['user_id']=$user_id;
										$dat['yue_type']='优惠金额';
										$dat['ddh']=$ddh;
										$dat['jy_money']='+'.$amountt;
										$dat['jy_time']=date('Y-m-d H:i:s', time());
										$arrt=$h->add($dat);
										echo "支付成功";
									}
										
										}
									}
								}else{
									$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-$wxfy)+$amountt);
									$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
								if($sd){
									$h=M('yue');
										$dat['user_id']=$user_id;
										$dat['yue_type']='优惠金额';
										$dat['ddh']=$ddh;
										$dat['jy_money']='+'.$amountt;
										$dat['jy_time']=date('Y-m-d H:i:s', time());
										$arrt=$h->add($dat);
										echo "支付成功";
									}
										}
								}
								}
					
							}
						}else{
						
							if(($arr1['ways_id']==2)||($arr1['ways_id']==3)){
								$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-30-$wxfy)+$amountt);
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
									if($sd){
									$h=M('yue');
										$dat['user_id']=$user_id;
										$dat['yue_type']='优惠金额';
										$dat['ddh']=$ddh;
										$dat['jy_money']='+'.$amountt;
										$dat['jy_time']=date('Y-m-d H:i:s', time());
										$arrt=$h->add($dat);
										echo "支付成功";
									}
										}
								}
						
							}else{
								$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-$wxfy)+$amountt);
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
								if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
									if($sd){
									$h=M('yue');
										$dat['user_id']=$user_id;
										$dat['yue_type']='优惠金额';
										$dat['ddh']=$ddh;
										$dat['jy_money']='+'.$amountt;
										$dat['jy_time']=date('Y-m-d H:i:s', time());
										$arrt=$h->add($dat);
										echo "支付成功";
									}
										}
								}
							}
						}
					}
					}else{
							$userr=M('m_user');
						if(($arr1['ways_id']==2) || ($arr1['ways_id']==3)){
								$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-30-$wxfy)+$amountt);//die;echo 
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
									if($sd){
									$h=M('yue');
										$dat['user_id']=$user_id;
										$dat['yue_type']='优惠金额';
										$dat['ddh']=$ddh;
										$dat['jy_money']='+'.$amountt;
										$dat['jy_time']=date('Y-m-d H:i:s', time());
										$arrt=$h->add($dat);
										echo "支付成功";
									}
										}
								}
						
							}else{
								$yu['yuemoney']=$arr13['yuemoney']+(($arr1['amount']-$wxfy)+$amountt);
								$arr12=$userr->where("user_id='$user_id'")->save($yu);
								if($arr12){
									if($yhq_id){
									$ff=M('yhq');
									$ctt['zt']=1;
									$sd=$ff->where("yhq_id='$yhq_id'")->save($ctt);
									if($sd){
									$h=M('yue');
										$dat['user_id']=$user_id;
										$dat['yue_type']='优惠金额';
										$dat['ddh']=$ddh;
										$dat['jy_money']='+'.$amountt;
										$dat['jy_time']=date('Y-m-d H:i:s', time());
										$arrt=$h->add($dat);
										echo "支付成功";
									}
										}
								}
							}
					
					
					}
				}
			}
			
		}
				
				}else{
					$map['order_no'] = $payinfo['order_no']; 
					$data['buyer'] = $payinfo['transaction_no'];
					$data['status'] = 2;
					$result = M('Carts')->where($map)->save($data);
			
					echo "支付失败";
				}

		        header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK');
		        break;
		    case "refund.succeeded":
		        // 开发者在此处加入对退款异步通知的处理代码
		        header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK');
		        break;
		    default:
		        header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request');
		        break;
		}
	}
 public function pay()
  {
    $openid = I('post.open');
     $id = I('post.id');
	// $id='95';
	 $sqll= M("goods");
	 $good=$sqll->find($id);
      /**/$user = md5(get_client_ip());
     $chanel = I('post.type');
      $goods_info['order_no'] = $order_no = substr(md5(time()), 0, 12);
	  $xd_time=time();
     $data = array(
          'gid'      => $id,
          'amount'   => $good['amount'],//$goods_info['amount'],
          'order_no' => $order_no,
          'user'     => $user,
		  'xd_time'=>$xd_time,
        );
      $sql = M('Carts');
    $arr=$sql->add($data);

      if( $arr ){
		 //$chanel;
         $p['open_id'] = $openid;
        $this->code = pii($chanel='wx_pub',$good,$p);
        echo $this->code;
      }
  }



 public function wxpay()
  {

     $openid = I('post.openid');//echo $openid;exit;
     $id = I('post.id');
	 $sqll= M("goods");
	 $good=$sqll->find($id);
	 //print_r($good);exit;
    $user = md5(get_client_ip());
     $chanel = I('post.type');
      $goods_info['order_no'] = $order_no = substr(md5(time()), 0, 12);
	  $xd_time=time();
     $data = array(
          'gid'      => $id,
          'amount'   => $good['amount'],//$goods_info['amount'],
          'order_no' => $order_no,
          'user'     => $user,
		  'xd_time'=>$xd_time,
        );
      $sql = M('Carts');
	 $arr=$sql->add($data);
     if( $arr ){
		//$chanel='wx_pub';
        $u['open_id'] = $openid;
        $goods = array(
        	'u_title'=>$good['u_title'],
        	'amount' => $good['amount'],
        	'order_no' => $order_no,
        	);
        $this->code = pii('wx_pub',$goods,$u);
        echo $this->code;
     }
  }
}

