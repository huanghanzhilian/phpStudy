<?php
namespace Admin\Controller;
use Think\Controller;
class DingdanController extends Controller {
	  public function wallet(){
			file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$yz=M('sf_user','','connection');
			$mysql=M('bank_card','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			echo  json_encode($yanzheng);
		}

	  }
	    public function bankcard(){
			file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$yz=M('sf_user','','connection');
			$mysql=M('bank_card','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$ct['card_name']=addslashes($_POST['card_name']);
			$ct['card_number']=addslashes($_POST['card_number']);
			$ct['sf_id']=$yanzheng['sf_id'];
			$arr=$mysql->add($ct);
		}

	  }
	  public  function  tixian(){
		file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$yz=M('sf_user','','connection');
			$mysql=M('bank_card','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			$sf_id=$yanzheng['sf_id'];
			$sf_username=$yanzheng['sf_username'];
			$arr=$mysql->where("sf_id='$sf_id'")->select();
			$sfzt = array('z'=>$arr,'t'=>$sf_username);
				echo  json_encode($sfzt);
		}
	  
	  }
	      public function tixianadd(){
			file_get_contents('php://input');
			$sfphone=$_POST['sfphone'];
			$tixian_amount=$_POST['tixian_amount'];
			$yz=M('sf_user','','connection');
			$mysql=M('bank_card','','connection');
			$yanzheng=$yz->where("sf_phone='$sfphone'")->find();
			if(!$yanzheng){
				$sfzt = array('zt'=>'0');
				echo  json_encode($sfzt);
			}else{
			if($yanzheng['balance'] < $tixian_amount){
			$ct['card_id']=$_POST['card_id'];
			$ct['tixian_zt']='1';
			$ct['tixian_amount']=$tixian_amount;
			$ct['tixian_time']=date('Y-m-d H:i:s', time());
			$arr=$mysql->add($ct);
		
			}else{
				$this->error('超额');
			}
			}

	  }
	  public function mingxi(){
		
	  
	  }

}