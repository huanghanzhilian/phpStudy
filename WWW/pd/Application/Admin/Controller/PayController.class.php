<?php

/**
 * ping ++ demo 支付后处理
 *
 * @author widuu <admin@widuu.com>
 */
namespace Admin\Controller;
use Think\Controller;
class PayController extends Controller {
	public function index(){
		
		$out_trade_no = I('get.out_trade_no');
			$sqlll=M('Carts','','connection');
			$arr7=$sqlll->where("order_no='$out_trade_no'")->find();
			echo $id=$arr7['gid'];die;
		
	}
	
	
}