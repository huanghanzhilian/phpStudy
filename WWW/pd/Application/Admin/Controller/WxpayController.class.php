<?php

/**
 * ping ++ demo 支付后处理
 *
 * @author widuu <admin@widuu.com>
 */

namespace Admin\Controller;

use Think\Controller;

class WxpayController extends Controller {


public function index(){
	//echo 2;DIE;
	  $id=I('get.id');
	$mysql=M('goods','','connection');
	$goodin=$mysql->where("id='$id'")->find();
	if($goodin)
	//var_dump($goodinfo);die;
		$_SESSION['goodin'] = $goodin;
	 Vendor("wxpayy.JsApiPay");
	$wxpay = new \JsApiPay();
	$open = $wxpay->GetOpenid();
	$this->assign('good',$_SESSION['goodin']);
	$this->assign('open',$open);
	
	$this->display();
	
   
}
public function shifu(){
	//echo 2;DIE;
	  $id=I('get.id');
	$mysql=M('sfgoods','','connection');
	$goodin=$mysql->where("id='$id'")->find();
	if($goodin)
	//var_dump($goodinfo);die;
		$_SESSION['goodin'] = $goodin;
	 Vendor("wxpayy.JsApiPay");
	$wxpay = new \JsApiPay();
	$open = $wxpay->GetOpenid();
	$this->assign('good',$_SESSION['goodin']);
	$this->assign('open',$open);
	
	$this->display();
	
   
}
public function getOpenid()
{

		
}

	public function notifyy(){
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
					$ui=M('Carts','','connection');
					$sql=M('goods','','connection');
					$res=$ui->where("order_no='$order_no'")->find();
						$id=$res['gid'];
					$result = $ui->where("order_no='$order_no'")->save($data);
					if($result){
						$tt['fk_zt']='2';
						$art=$sql->where("id='$id'")->save($tt);
						$my= M('dd_time','','connection');
						$tf['fukuan_time']=date('Y-m-d H:i:s', time());//服务结束步骤的时间
						$arr6=$my->where("goods_id='$id'")->save($tf);
					
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
  $openid = I('post.openid');//echo $openid;exit;
     $id = I('post.id');
	 $sqll= M('sfgoods','','connection');
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
      $sql = M('Cartss','','connection');
	 $arr=$sql->add($data);
     if( $arr ){
		//$chanel='wx_pub';
        $u['open_id'] = $openid;
        $goods = array(
        	'u_title'=>$good['u_title'],
        	'amount' => $good['amount'],
        	'order_no' => $order_no,
        	);
        $this->code = piii('wx_pub',$goods,$u);
        echo $this->code;
     }
  }



 public function wxpay()
  {

     $openid = I('post.openid');//echo $openid;exit;
     $id = I('post.id');
	 $sqll= M('goods','','connection');
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
      $sql = M('Carts','','connection');
	 $arr=$sql->add($data);
     if( $arr ){
		//$chanel='wx_pub';
        $u['open_id'] = $openid;
        $goods = array(
        	'u_title'=>$good['u_title'],
        	'amount' => $good['amount'],
        	'order_no' => $order_no,
        	);
        $this->code = piii('wx_pub',$goods,$u);
        echo $this->code;
     }
  }
}

