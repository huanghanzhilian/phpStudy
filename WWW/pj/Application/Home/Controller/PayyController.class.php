<?php

/**
 * ping ++ demo 支付
 *
 * @author widuu <admin@widuu.com>
 */

namespace Home\Controller;

use Think\Controller;

class payyController extends Controller {


	/**
	 * 模拟购物
	 * @author widuu <admin@widuu.com>
	 */
	public  function demo(){
		$this->display();
	}
    public function index(){
		$ddh=I('post.ddh');
		if($ddh){
		$ddh=I('post.ddh');
		}
		$dd=I('get.ddh');
		if($dd){
		$ddh=I('get.ddh');
		}
		$hh=M('goods');
	 // Vendor("wxpay.JsApiPay");
     // $wxpay = new \JsApiPay();
   // $openid = $wxpay->GetOpenid();

    // $this->openid = $openid;
		$good=$hh->where("ddh='$ddh'")->find();
		$this->assign('good',$good);
		//echo $openid;die;
    	$this->display();
		
	
    }
	 public function peijian(){
		//print_r($_GET);DIE;
	$ddh=I('get.ddh');//die;echo 	
		$sql = M('Cartsss');
		$xd_time=time();
		$datae=$xd_time-(60*60*24);
		$sql->where("(xd_time < $datae) and stau=0")->delete();
		$f = M("dingdanhao");
		$good=$f->where("ddh='$ddh'")->find();
		  $user_id=$good['user_id'];//die;echo
		$mysql=M('m_user');
		$arr4=$mysql->where("user_id='$user_id'")->find();
		$yuemoney=$arr4['yuemoney'];
		 $xinyong=$arr4['xyed']-$arr4['yixiaofei'];//die;echo
		$h="余额付款";
		$b="信用支付";
		$this->assign('yuemoney',$yuemoney);
		$this->assign('xinyong',$xinyong);
		$this->assign('good',$good);
		$this->assign('b',$b);
		$this->assign('h',$h);
    	$this->display();

    }
	 public function maichu(){
		$ddh=I('get.ddh');
		$sql = M('Cartssss');
		$xd_time=time();
		$datae=$xd_time-(60*60*24);
		$sql->where("(xd_time < $datae) and stau=0")->delete();
		$f = M("maichu");
		$good=$f->where("ddh='$ddh'")->find();
		$h="余额付款";
		$b="信用支付";
		 $maifang=$good['maifang'];
		$mysql=M('m_user');
		$arr4=$mysql->where("user_name='$maifang'")->find();
		$yuemoney=$arr4['yuemoney'];//die;echo	
		$xinyong=$arr4['xyed']-$arr4['yixiaofei'];
		$h="余额付款";
		$b="信用支付";
		$this->assign('yuemoney',$yuemoney);
		$this->assign('xinyong',$xinyong);
		$this->assign('good',$good);
		$this->assign('b',$b);
		$this->assign('h',$h);
    	$this->display();
		
	
    }
	 public function huankuana(){
		 $ddh=I('get.ddh');//die;echo
		$mysql= M("huankuan");
		$good=$mysql->where("ddh='$ddh'")->find();
		$user_id=$good['user_id'];
		$sql=M('m_user');
		$arr4=$sql->where("user_id='$user_id'")->find();
		 $yuemoney=$arr4['yuemoney'];	//die;echo
	
		$h="余额付款";
		$this->assign('yuemoney',$yuemoney);
		$this->assign('good',$good);
    	$this->display();
		
	
    }
    public function pay(){
				$id = I('post.id');
				$mysql= M("goods");
				$good=$mysql->find($id);
				$user = md5(get_client_ip());
				$chanel = I('post.type');
				$good['order_no'] = $order_no = substr(md5(time()), 0, 12);
				$xd_time=time();
				$data = array(
				'user'     => $user,
				'gid'      => $id,
				'amount'   => $good['amount'],
				'order_no' => $order_no,
				'xd_time'=>$xd_time,
			);
	
			$xd_time=time();
			$datae=$xd_time-(60*60*24);
			$sql = M('Carts');
			$sql->where("(xd_time < $datae) and stau=0")->delete();
			$arr=$sql->add($data);
    	if( $arr ){
			$p['open_id'] = 'wx5e99bbf914658fb6';
    		$this->code = ping_pay($chanel,$good);
    		echo $this->code;
    	}
    }
	 public function payy(){
			$id = I('post.id');
				$sqll= M("dingdanhao");
				$good=$sqll->find($id);
				$user = md5(get_client_ip());
				$chanel = I('post.type');
				$good['order_no'] = $order_no = substr(md5(time()), 0, 12);
				$xd_time=time();
				$data = array(
				'user'     => $user,
				'gid'      => $id,
				'amount'   => $good['amount'],
				'order_no' => $order_no,
				'xd_time'=>$xd_time,
			);
			$xd_time=time();
			$datae=$xd_time-(60*60*24);
			$sql = M('Cartss');
			$sql->where("(xd_time < $datae) and stau=0")->delete();
			$arr=$sql->add($data);

    	if( $arr ){//
    		$this->code = ping_p($chanel,$good);
    		echo $this->code;
    	}
    }
public function payyy(){
			$id = I('post.id');
				$myql= M("huankuan");
				$good=$myql->find($id);
				$user = md5(get_client_ip());
				$chanel = I('post.type');
				$good['order_no'] = $order_no = substr(md5(time()), 0, 12);
				$xd_time=time();
				$data = array(
				'user'     => $user,
				'gid'      => $id,
				'amount'   => $good['amount'],
				'order_no' => $order_no,
				'xd_time'=>$xd_time,
			);
			$sql = M('Cartsss');
			$xd_time=time();
			$datae=$xd_time-(60*60*24);
			$sql->where("(xd_time < $datae) and stau=0")->delete();
			$arr=$sql->add($data);

    	if( $arr ){//
    		$this->code = ping_pa($chanel,$good);
    		echo $this->code;
    	}
    }
	public function payyyy(){
				$id = I('post.id');
				$myql= M("maichu");
				$good=$myql->find($id);
				$user = md5(get_client_ip());
				$chanel = I('post.type');
				$good['order_no'] = $order_no = substr(md5(time()), 0, 12);
				$xd_time=time();
				$data = array(
				'user'     => $user,
				'gid'      => $id,
				'amount'   => $good['amount'],
				'order_no' => $order_no,
				'xd_time'=>$xd_time,
			);
			$sql = M('Cartssss');
			$xd_time=time();
			$datae=$xd_time-(60*60*24);
			$sql->where("(xd_time < $datae) and stau=0")->delete();
			$arr=$sql->add($data);

    	if( $arr ){//
    		$this->code = ping($chanel,$good);
    		echo $this->code;
    	}
    }
}
