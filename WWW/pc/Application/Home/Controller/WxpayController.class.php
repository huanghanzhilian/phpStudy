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
		$ddh=I('get.id');
		$hh=M('goods');
	Vendor("wxpay.JsApiPay");
     $wxpay = new \JsApiPay();
     $openid = $wxpay->GetOpenid();

    $this->openid = $openid;
		$good=$hh->where("ddh='$ddh'")->find();
		$this->assign('good',$good);
		//echo $openid;die;
    	$this->display();
		
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
				if($payinfo['paid']==true){
					$map['order_no'] = $payinfo['order_no']; 
					$data['buyer'] = $payinfo['transaction_no'];
					$data['status'] = 1;
					$result = M('Carts')->where($map)->save($data);
					echo "支付成功";
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

    $openid = I('post.openid');
      $goods_id = I('post.id');
      $mysql= M("goods");
      $goods_info=$mysql->find($goods_id);
      /**/$user = md5(get_client_ip());
    $chanel = I('post.type');
      $goods_info['order_no'] = $order_no = substr(md5(time()), 0, 12);
    $data = array(
          'gid'      => $goods_id,
          'amount'   => $goods_info['amount'],
          'order_no' => $order_no,
          'user'     => $user,
        );
      $sql = M('Carts');
    $arr=$sql->add($data);

      if( $arr ){//
            $p['open_id'] = $openid;
        $this->code = ping_pay($chanel='wx_pub',$goods_info,$p);
        echo $this->code;
      }
  }

}



