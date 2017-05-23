<?php

/**
 * ping ++ demo 支付
 *
 * @author widuu <admin@widuu.com>
 */

namespace Admin\Controller;

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
	
		$dingdanhao=$_GET['dingdanhao'];
		
		$hh= M('goods','','connection');
		$good=$hh->where("dingdanhao='$dingdanhao'")->find();
		//print_r($good);die;
		if($good['fk_zt']==1 ){
		$this->error('此订单已付款!');	
		}else{
		$this->assign('good',$good);
		//echo $openid;die;
    	$this->display();
	}
	
    }
	 public function shifu(){
	
		$dingdanhao=$_GET['dingdanhao'];
		
		$hh= M('sfgoods','','connection');
		$good=$hh->where("dingdanhao='$dingdanhao'")->find();
		//print_r($good);die;
		if($good['fk_zt']==1 ){
		$this->error('此订单已付款!');	
		}else{
		$this->assign('good',$good);
		//echo $openid;die;
    	$this->display();
	}
	
    }
	public function panduan(){
		$dingdanhao=$_GET['dingdanhao'];
	
		$this->assign('dingdanhao',$dingdanhao);
		$this->display();
	}
    public function pay(){
				$id = I('post.id');
				$mysql= M('goods','','connection');
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
			$sql = M('Carts','','connection');
			$sql->where("(xd_time < $datae) and stau=0")->delete();
			$arr=$sql->add($data);
    	if( $arr ){
    		$this->code = pingp($chanel,$good);
    		echo $this->code;
    	}
    }
	 public function payy(){
				$id = I('post.id');
				$mysql= M('goods','','connection');
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
			$sql = M('Carts','','connection');
			$sql->where("(xd_time < $datae) and stau=0")->delete();
			$arr=$sql->add($data);
    	if( $arr ){
    		$this->code = pingpa($chanel,$good);
    		echo $this->code;
    	}
    }
	

}
