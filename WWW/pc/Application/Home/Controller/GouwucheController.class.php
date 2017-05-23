<?php
namespace Home\Controller;
use Think\Controller;
class GouwucheController extends Controller {
		public function goumaichanpin(){
		require_once APP_PATH.'Common/Cf/shifu.php';
		$mysql=M('maintenance_brand');
		$arr=$mysql->select();
		$sql=M('maintenance_model');
		$arr1=$sql->where("brand_id='1'")->select();
		$gh=M('chanpinku');
		$arr2=$gh->where("model_id=1 and sf='n'")->select();
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username'")->find();
	
		$user_id=$arr8['user_id'];//die;ech
		$gw=M('gouwuche');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				if($arr4){
				foreach ($arr4 as $k=>$v){
						$nums.=','.$v['nums'];
				}
				if($nums){
				$nums=substr($nums,1);
				$nums=array_sum(explode(',',$nums));
				}
				}
		$this->assign('nums',$nums);
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->assign('arr2',$arr2);
		$this->display();
	
	}
	public function yuefk(){
		$id=I('get.id');
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username'")->find();
		$user_id=$arr8['user_id'];
		$yuemoney=$arr8['yuemoney'];//die;echo 
		$mysql=M('dingdanhao');
		$arr=$mysql->where("id='$id'")->find();
		$this->assign('yuemoney',$yuemoney);
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function yuequfukuan(){
		$id=I('post.id');
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username'")->find();
		$user_id=$arr8['user_id'];
		$yuemoney=$arr8['yuemoney'];
		$mysql=M('dingdanhao');
		$arr=$mysql->where("id='$id'")->find();
		$amount=$arr['amount'];
			if(($yuemoney-$amount)<0){
				$this->error('余额不足');
			}else{
			$post['yuemoney']=$yuemoney-$amount;
		$ar=$s->where("user_id='$user_id'")->save($post);
		
		if($ar){
			$data['fkzt']=1;
			$data['peijianzhifu_type']=2;
			$aa=$mysql->where("id='$id'")->save($data);
		if($aa){
			header('location:'.__CONTROLLER__.'/peijiandingdan');
			}
		}
	
	}
	}

	public function branda(){
		require_once APP_PATH.'Common/Cf/shifu.php';
		$brand_id=I('get.brand_id');//die;echo
		$mysql=M('maintenance_brand');
		$arr=$mysql->select();
		$sql=M('maintenance_model');
		$arr1=$sql->where("brand_id='$brand_id'")->select();
		$arr7=$sql->where("brand_id='$brand_id'")->find();
			$model_id=$arr7['model_id'];
		$sele=M('chanpinku');
		$arr2=$sele->where("model_id='$model_id' and sf='n'")->select();
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username'")->find();
	
		$user_id=$arr8['user_id'];//die;ech
		$gw=M('gouwuche');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				if($arr4){
				foreach ($arr4 as $k=>$v){
						$nums.=','.$v['nums'];
				}
				if($nums){
				$nums=substr($nums,1);
				$nums=array_sum(explode(',',$nums));
				}
				}
		$this->assign('nums',$nums);
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->assign('arr2',$arr2);
		$this->display();
	
	}
	public function chanpinajax(){
		require_once APP_PATH.'Common/Cf/shifu.php';
		$model_id=I('get.model_id');
		$mysql=M('maintenance_brand');
		$arr=$mysql->select();
		$sql=M('maintenance_model');
		$arr1=$sql->where("brand_id='1'")->select();
		$gh=M('chanpinku');
		$arr2=$gh->where("model_id='$model_id' and sf='n'")->select();
		$username=$_COOKIE['username'];
		$s=M('m_user');
		$arr8=$s->where("user_name='$username'")->find();
	
		$user_id=$arr8['user_id'];//die;ech
		$gw=M('gouwuche');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				if($arr4){
				foreach ($arr4 as $k=>$v){
						$nums.=','.$v['nums'];
				}
				if($nums){
				$nums=substr($nums,1);
				$nums=array_sum(explode(',',$nums));
				}
				}
		$this->assign('nums',$nums);
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->assign('arr1',$arr1);
		$this->assign('arr2',$arr2);
		$this->display();
	
	}
	public function chanpinkuajax(){
		$model_id=I('get.model_id');
			$username=$_COOKIE['username'];
		$sqll=M('m_user');
		$ar=$sqll->where("user_name='$username'")->find();
		
			$gh=M('chanpinku');
			$arr2=$gh->where("model_id='$model_id' and sf='n'")->select();
		$this->assign('arr2',$arr2);
		$this->assign('arr3',$arr3);
		$this->display();
		
	}
	public function gwc(){
		if(empty($_COOKIE['username'])){
			echo '请登录再购买';die;
		}else{
		 $id=I('get.id');//echo//
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
	
		$user_id=$arr1['user_id'];//die;echo	
	
		$mysql=M('gouwuchea');
		$sqll=M('gouwuche');
		$arr=$mysql->where("cpk_id='$id' and user_id='$user_id'")->find();
		$us=M('chanpinku');
			$arr5=$us->where("cpk_id='$id'")->find();
		if($arr){
				$data['nums']=$arr['nums']+1;//die;	echo
				$data['gw_price']=$arr5['cpk_price']*$data['nums'];
				$r=$mysql->where("cpk_id='$id'")->save($data);
				if($r){
					$pos['gw_price']=$arr5['cpk_price'];
					$pos['gw_pricee']=$arr5['cpk_price'];
					$pos['modelid']=$arr5['model_id'];
					$pos['cpk_id']=$id;//die;echo
					$pos['user_id']=$user_id;
					$pos['nums']=1;
				for ($i = 1; $i <= 8; $i++) {
				 $rt.=(chr(rand(97, 122)));
				}
				$pos['skma']=$rt;
				$sqll->add($pos);
				
				}
		}else{
				$post['gw_price']=$arr5['cpk_price'];
				$post['gw_pricee']=$arr5['cpk_price'];
				$post['modelid']=$arr5['model_id'];
				$post['cpk_id']=$id;//die;echo
				$post['user_id']=$user_id;
				$post['nums']=1;
				for ($i = 1; $i <= 8; $i++) {
				 $rt.=(chr(rand(97, 122)));
				}
				$post['skma']=$rt;
				$t=$mysql->add($post);
				if($t){
				$postt['gw_price']=$arr5['cpk_price'];
				$postt['gw_pricee']=$arr5['cpk_price'];
				$postt['modelid']=$arr5['model_id'];
				$postt['cpk_id']=$id;//die;echo
				$postt['user_id']=$user_id;
				$postt['nums']=1;
				for ($i = 1; $i <= 8; $i++) {
				 $rt.=(chr(rand(97, 122)));
				}
				$postt['skma']=$rt;
				$sqll->add($postt);
				}
			
		}
		$gw=M('gouwuchea');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				foreach ($arr4 as $k=>$v){
						$nums.=','.$v['nums'];
				}
				$nums=substr($nums,1);
				$nums=array_sum(explode(',',$nums));
				echo $nums;
		
		}
}
public function gouwuche(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Index/login');
		}else{
				require_once APP_PATH.'Common/Cf/shifu.php';
		$username=$_COOKIE['username'];
		$db=M('m_user');
		$arr=$db->where("user_name='$username'")->find();
		$user_id=$arr['user_id'];
		$mysql=M('gouwuchea');
		$arr1=$mysql->join('chanpinku on gouwuchea.cpk_id=chanpinku.cpk_id')->where("user_id ='$user_id' ")->select();
		$gw=M('gouwuchea');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				
				foreach ($arr4 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				
				$gw_price=substr($gw_price,1);
				if($gw_price){
				$price=array_sum(explode(',',$gw_price));
				$zjg='总价格:';
				$qr='去结算';
				}
				foreach ($arr4 as $k=>$v){
						$nums.=','.$v['nums'];
				}
				$nums=substr($nums,1);
				$nums=array_sum(explode(',',$nums));
		$this->assign('zjg',$zjg);
		$this->assign('qr',$qr);
		$this->assign('nums',$nums);		
		$this->assign('price',$price);
		$this->assign('my',$my);
		$this->assign('arr1',$arr1);
		$this->display();
		}
}
public function jia_number(){
		$id=I('get.id');
		$username=$_COOKIE['username'];
		$db=M('m_user');
		$arr=$db->where("user_name='$username'")->find();
		$user_id=$arr['user_id'];
		$mysql=M('gouwuchea');
		$sqll=M('gouwuche');
		$tt=$mysql->where("gw_id='$id' and user_id='$user_id'")->find();
		$cpk_id=$tt['cpk_id'];
		$us=M('chanpinku');
		$arr5=$us->where("cpk_id='$cpk_id'")->find();
				//print_r($arr5);die;
				$postt['gw_price']=$arr5['cpk_price'];
				$postt['gw_pricee']=$arr5['cpk_price'];
				$postt['modelid']=$arr5['model_id'];
				$postt['cpk_id']=$cpk_id;//die;echo
				$postt['user_id']=$user_id;
				$postt['nums']=1;
				for ($i = 1; $i <= 8; $i++) {
				 $rt.=(chr(rand(97, 122)));
				}
				$postt['skma']=$rt;
				$f=$sqll->add($postt);
		if($f){
		$arr1=$mysql->where("gw_id ='$id' and user_id='$user_id'")->find();
		$post['nums']=$nums=$arr1['nums']+1;
	    $post['gw_price']=$nums*$arr1['gw_pricee'];
		$mysql->where("gw_id='$id' and user_id='$user_id'")->save($post);
		$arr4=$mysql->where("user_id='$user_id'")->select();
				foreach ($arr4 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				$gw_price=substr($gw_price,1);
				$price=array_sum(explode(',',$gw_price));
			$number_price['price']=$price;
			$number_price['nums']=$nums;

				if($arr4){
				foreach ($arr4 as $k=>$v){
						$gwnums.=','.$v['nums'];
				}
			
				$gwnums=substr($gwnums,1);
				$gwnums=array_sum(explode(',',$gwnums));
				}
		
		$number_price['gwnums']=$gwnums;
		$data = array(
			'gwnums'=>$number_price['gwnums'],
            'price'=>$number_price['price'],
            'nums'=>$number_price['nums'],
            );
				//print_r($data);die;
			echo json_encode($data);
		}	
}
public function jian_number(){
		$id=I('get.id');//die;echo 
		$mysql=M('gouwuchea');
		$username=$_COOKIE['username'];
		$db=M('m_user');
		$arr=$db->where("user_name='$username'")->find();
		$user_id=$arr['user_id'];
		$arr1=$mysql->where("gw_id ='$id' and user_id='$user_id'")->find();
		$nums=$post['nums']=$arr1['nums']-1;
		if($nums<=0){
			$nums=$post['nums']=1;
		}else{
	    $post['gw_price']=$nums*$arr1['gw_pricee'];
		$cpkid=$arr1['cpk_id'];
		$mysqll=M('gouwuche');
		$ff=$mysqll->where("cpk_id='$cpkid' and user_id='$user_id'")->find();
		$hhid=$ff['gw_id'];
		$rt=$mysqll->where("gw_id='$hhid' and user_id='$user_id'")->delete();
			if($rt){
		$g=$mysql->where("gw_id='$id'")->save($post);
			$arr4=$mysql->where("user_id='$user_id'")->select();
				foreach ($arr4 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				
				$gw_price=substr($gw_price,1);
				$price=array_sum(explode(',',$gw_price));
			$number_price['price']=$price;
			$number_price['nums']=$nums;
			
		
				if($arr4){
				foreach ($arr4 as $k=>$v){
						$gwnums.=','.$v['nums'];
				}
				
				$gwnums=substr($gwnums,1);
				$gwnums=array_sum(explode(',',$gwnums));
				}
		$number_price['gwnums']=$gwnums;
		$data = array(
			'gwnums'=>$number_price['gwnums'],
            'price'=>$number_price['price'],
            'nums'=>$number_price['nums'],
            );

			echo json_encode($data);
		
			}	
		}
	}
	public function gouwucheajax(){
		$username=$_COOKIE['username'];
		$db=M('m_user');
		$arr=$db->where("user_name='$username'")->find();
		$user_id=$arr['user_id'];
		 $id=I('get.id');
		$mysql=M('gouwuchea');
		$sql=M('gouwuche');
		$arr2=$mysql->where("gw_id='$id'")->find();
			$cpk_id=$arr2['cpk_id'];
		$arr3=$sql->where("cpk_id='$cpk_id' and user_id='$user_id'")->delete();
		if($arr3){
		$arr5=$mysql->where("gw_id='$id' and user_id='$user_id'")->delete();
		if($arr5){
		
		$mysql=M('gouwuchea');
		$arr1=$mysql->join('chanpinku on gouwuchea.cpk_id=chanpinku.cpk_id')->where("user_id ='$user_id'")->select();
		$gw=M('gouwuchea');
		$arr4=$gw->where("user_id in ($user_id)")->select();
				foreach ($arr4 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				$gw_price=substr($gw_price,1);
				
				if($gw_price){
				$price=array_sum(explode(',',$gw_price));
				$zjg='总价格:';
				$qr='去结算';
				}
		}
		}
		$this->assign('zjg',$zjg);
		$this->assign('qr',$qr);
		$this->assign('price',$price);
		$this->assign('arr1',$arr1);
		$this->display();
	}
	public function querendingdan(){
		$mysql=M('peijianfangshi');
		$arr=$mysql->select();
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$ways1='上门';
		$ways2='自取';
		$ways3='邮寄';
		//$ways_id=I('get.id');
		$sqq=M('city');
		//echo $ways_id;die;//
		$arr4=$sqq->where("parent_id=1")->select();
		//print_r($arr4);die;
		$mysqll=M('jxzx');
		$arr5=$mysqll->select();
		//print_r($arr);die;//
		$my=M('gouwuche');
		$arr6=$my->join('chanpinku on gouwuche.cpk_id=chanpinku.cpk_id')->where("user_id ='$user_id'")->select();
		foreach ($arr6 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				$gw_price=substr($gw_price,1);
				$price=array_sum(explode(',',$gw_price));
		$this->assign('price',$price);
		$this->assign('arr4',$arr4);
		$this->assign('arr5',$arr5);
		$this->assign('arr6',$arr6);
		$this->assign('username',$username);
		$this->assign('user_username',$user_username);
		$this->assign('ways1',$ways1);
		$this->assign('ways2',$ways2);
		$this->assign('ways3',$ways3);
		$this->display();
	}
	public function youji(){
		$ways_id=I('get.id');
		$sqq=M('city');
		//echo $ways_id;die;//
	$arr4=$sqq->where("parent_id=1")->select();
	//print_r($arr4);die;
	$mysql=M('jxzx');
	$arr=$mysql->select();
		//print_r($arr);die;//
		$this->assign('arr4',$arr4);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function shi(){
		$id=I('get.id');
		//echo $id;die;
		$sqq=M('city');
		$arr=$sqq->where("parent_id='$id'")->select();
		$this->assign('arr',$arr);
		$this->display();
	}
	public function qu(){
		$id=I('get.id');
		//echo $id;die;
		$sqq=M('city');
		$arr=$sqq->where("parent_id='$id'")->select();
		//print_r($arr);
		$this->assign('arr',$arr);
		$this->display();
	}
public function daodian(){
	$ways_id=I('get.id');
	$mysql=M('wxzx');
	$arr=$mysql->select();
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	}
	public function shangmen(){
		$ways_id=I('get.id');
		$sqq=M('city');
		//echo $ways_id;die;//
		$arr4=$sqq->where("parent_id=1")->select();
		//print_r($arr4);die;
		//$mysql=M('wxzx');
	//	$arr=$mysql->where("ways_id='$ways_id'")->select();
		//print_r($arr);die;//
		$this->assign('arr4',$arr4);
		//$this->assign('arr',$arr);
		$this->display();
	
	}
	public function addorder(){
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$sql=M('m_user');
			//print_r($_POST);die;
			$sheng=I('post.sheng');
			$shi=I('post.shi');
			$qu=I('post.qu');
			$ways_id=I('post.ways_id');
			$mysql=M('city');
			$r=$sheng.','.$shi.','.$qu;
			if($qu){
			$arr1=$mysql->where("region_id in($r)")->select();
			//print_r($arr1);die;//
			$ss='';
			foreach ($arr1 as $k=>$v){
				$ss.=','.$v['region_name'];
			}
			$ss=substr($ss,1);
			}
			$data['note']=I('post.u_note','','trim');
			$data['ways_id']=$ways_id=I('post.ways_id','','trim');
			if($ways_id==1){
				$data['smwx_id']=1;
			}
			$data['jxzx_id']=I('post.jxzx_id');
			//$data['smzx_id']=I('post.wxzx_id','','trim');
			$address=I('post.address');//=
			if($address){
			$data['shangmendizhi']=$ss.','.$address;
			
			}
			//echo 1;die;
		$arr1=$sql->where("user_name='$username'")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$my=M('gouwuche');
		$arr6=$my->join('chanpinku on gouwuche.cpk_id=chanpinku.cpk_id')->where("user_id ='$user_id'")->select();
		$a=count($arr6);
		
		$data['ddh']=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 7);
		foreach ($arr6 as $k=>$v){
						$gw_price.=','.$v['gw_price'];
				}
				$gw_price=substr($gw_price,1);
				$price=array_sum(explode(',',$gw_price));//die;echo
		$data['xd_time']=date('Y-m-d H:i:s', time());
		$data['amount']=$price;
		$data['u_title']='手机配件';
		$data['fkzt']=0;
		$data['user_id']=$user_id;
		$mysql=M('dingdanhao');
		$arr2=$mysql->add($data);
		//echo 2;die;
		if($arr2){
			$my=M('gouwuche');
			$arr6=$my->where("user_id ='$user_id'")->select();
		 ///echodie;echodie;/
			foreach ($arr6 as $k=>$v){
				$cpkid.=','.$v['cpk_id'];//echo 	dIE;
				$useid.=','.$v['user_id'];
				$nums.=','.$v['nums'];
				$zprice.=','.$v['gw_price'];
				$dprice.=','.$v['gw_pricee'];
				//
				$modelid.=','.$v['modelid'];
				$skma.=','.$v['skma'];
				//$gwid.=','.$v['gw_id'];
			}
			//echo '2';die;	ECHODIE;	
				$cpkid=substr($cpkid,1);
				$cpkid=explode(',',$cpkid);
				
				 $useid=substr($useid,1);
				$useid=explode(',',$useid);
				
				 $nums=substr($nums,1);
				$nums=explode(',',$nums);
				
				 $zprice=substr($zprice,1);//die;echo 
				$zprice=explode(',',$zprice);
				
				$dprice=substr($dprice,1);	//echo 
			$dprice=explode(',',$dprice);

				$modelid=substr($modelid,1);
				$modelid=explode(',',$modelid);
				 $skma=substr($skma,1);
				$skma=explode(',',$skma);
				 $a=count($arr6);
				for($i=0;$i<$a;$i++){
				$cpk_id=$cpkid[$i];//DIE;ECHO 	
					$use_id=$useid[$i];
					 $n_ums=$nums[$i];
					$z_price=$zprice[$i];
					 $dp_rice=$dprice[$i];
					$model_id=$modelid[$i];
					$sk_ma=$skma[$i];
$ee[]=array('cpk_id'=>$cpk_id,'use_id'=>$use_id,'dd_nums'=>$n_ums,'z_price'=>$z_price,'d_price'=>$dp_rice,'modelidd'=>$model_id,'skm'=>$sk_ma,'dingdanhaoid'=>$arr2,);
				}
				
				$db=M('ddxxb');
				$db->addAll($ee);
				if($db){
				//	echo 3;die;
				$my=M('gouwuche');
							$ass=$my->join('chanpinku on gouwuche.cpk_id=chanpinku.cpk_id')->where("user_id ='$user_id'")->select();
							foreach ($ass as $k=>$v){
								$gw_id.=','.$v['gw_id'];
								
								
							}
									$gw_id=substr($gw_id,1);
									
						$myy=M('gouwuchea');
						$ghj=$myy->where("user_id='$user_id'")->select();
						foreach ($ghj as $k=>$v){
								$gww_id.=','.$v['gw_id'];
								
							}
							$gww_id=substr($gww_id,1);
							//	echo 4;die;
							$dd=$myy->where("gw_id in($gww_id)")->delete();
						if($dd){
							
						$rf=$my->where("gw_id in($gw_id)")->delete();
					if($rf){
						//
						$mysql=M('dingdanhao');
						$sd=$mysql->where("id='$arr2'")->find();
						$ddh=$sd['ddh'];
						header('location:'.__MODULE__."/Payy/peijian/ddh/{$ddh}");
						}
			
						
					
				 }
	}
	}
	}
	public function peijiandingdan(){
		header("Content-type: text/html; charset=utf-8");
		require_once APP_PATH.'Common/Cf/shifu.php';
		
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$myy=M('dingdanhao');
		$arr5=$myy->where("user_id ='$user_id'")->select();
		foreach ($arr5 as $k=>$v){
			$id.=','.$v['id'];
		}
		$id=substr($id,1);//die;echo
		if(!$id){
			$arr6=$myy->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			//	->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
				->join("maintenance_ways on dingdanhao.ways_id=maintenance_ways.ways_id")->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id='$id'")->select();
		
		}else{
		$arr6=$myy->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			//->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
			->join("maintenance_ways on dingdanhao.ways_id=maintenance_ways.ways_id")->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id in($id) and fkzt=0")->select();
		}
		foreach ($arr6 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
	//	print_r($arr);die;
		$this->assign('my',$my);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function xinyongedu(){
		 $id=I('get.id');//die;echo
		
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$xyed=$arr1['xyed']-$arr1['yixiaofei'];
		

		$mysql=M('dingdanhao');
		$arr=$mysql->where("id='$id'")->find();
		$this->assign('arr',$arr);
		$this->assign('xyed',$xyed);
		$this->display();
	}
	public function fukuan(){
		$id=I('post.id');//die;	echo
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_id=$arr1['user_id'];
		$xyed=$arr1['xyed'];
		$mysql=M('dingdanhao');
		$arr=$mysql->where("id='$id'")->find();
		$post['yixiaofei']=$arr['amount']+$arr1['yixiaofei'];//die;	echo 
		if($xyed-$post['yixiaofei']<0){
			$this->error('余额不足');
		}
		$ar=$sql->where("user_id='$user_id'")->save($post);
		//echo '1';die;
		if($ar){
			//echo $id;die;
			$data['fkzt']=1;
			$data['peijianzhifu_type']=3;
			$aa=$mysql->where("id='$id'")->save($data);
		if($aa){
	
			header('location:'.__CONTROLLER__.'/peijiandingdan');
			}
		}
		}



public function wfk(){
		header("Content-type: text/html; charset=utf-8");
		$fkzt=I('get.fkzt');
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_username=$arr1['user_username'];
		$user_id=$arr1['user_id'];
		$my=M('dingdanhao');
		$arr5=$my->where("user_id ='$user_id'")->select();
		foreach ($arr5 as $k=>$v){
			$id.=','.$v['id'];
		}
		$id=substr($id,1);
		if(!$id){
		$arr6=$my->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			//->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
			->join("maintenance_ways on dingdanhao.ways_id=maintenance_ways.ways_id")->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id='$id' and fkzt=0")->select();
		
		}else{
		$arr6=$my->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			//->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
			->join("maintenance_ways on dingdanhao.ways_id=maintenance_ways.ways_id")->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id in($id) and fkzt=0")->select();
		}
		foreach ($arr6 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	}
	public function yifukuan(){
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		//$user_username=$arr1[''];
		$user_id=$arr1['user_id'];
		$my=M('dingdanhao');
		$arr5=$my->where("user_id ='$user_id'")->select();
		foreach ($arr5 as $k=>$v){
			$id.=','.$v['id'];
		}
		$id=substr($id,1);//die;echo
		if(!$id){
			$arr6=$my->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			//	->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
				->join("maintenance_ways on dingdanhao.ways_id=maintenance_ways.ways_id")->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id='$id' and fkzt='1'")->select();
		}else{
		$arr6=$my->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
			//->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
			->join("maintenance_ways on dingdanhao.ways_id=maintenance_ways.ways_id")->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id in($id) and fkzt='1'")->select();
		}
		foreach ($arr6 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	}
	public function yiwancheng(){
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_username=$arr1[''];
		$user_id=$arr1['user_id'];
		$my=M('dingdanhao');
		$arr5=$my->where("user_id ='$user_id'")->select();
		foreach ($arr5 as $k=>$v){
			$id.=','.$v['id'];
		}
		$id=substr($id,1);//die;echo
		if(!$id){
			$arr6=$my->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
				//->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
				->join("maintenance_ways on dingdanhao.ways_id=maintenance_ways.ways_id")->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id='$id' and fkzt='1'")->select();
		}else{
		$arr6=$my->join('ddxxb on dingdanhao.id=ddxxb.dingdanhaoid')
		//->join("wxzx on dingdanhao.wxzx_id=wxzx.wxzx_id")
			->join("maintenance_ways on dingdanhao.ways_id=maintenance_ways.ways_id")->join("chanpinku on ddxxb.cpk_id=chanpinku.cpk_id")->join("m_user on dingdanhao.user_id=m_user.user_id")->where("id in($id) and fkzt='2'")->select();
		}
		foreach ($arr6 as $row) {
		    $arr[$row['ddh']][] = $row;
		}
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	}
	public function cangkua(){
		$db=M('cangku');
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_id=$arr1['user_id'];
		$arr6=$db->where("user_id='$user_id'")->select();
		if(!$arr6){
			$this->error('没有产品请购买');
		}

		foreach ($arr6 as $v=>$k) {
		   $cpk_id.=','.$k['cpk_id'];
		}
	$cpk_id=substr($cpk_id,1);//echo 	echo	die;die;
		$mysql=M('chanpinku');
		$arr5=$mysql->where("cpk_id in($cpk_id)")->select();
		foreach ($arr5 as $v=>$k) {
		   $model_id.=','.$k['model_id'];
		}
		$model_id=substr($model_id,1);//	die;echo echo 	
		$my=M('maintenance_model');
		$arr3=$my->where("model_id in ($model_id)")->select();
		//print_r($arr3);die;
		
		foreach ($arr3 as $v=>$k) {
		   $brand_id.=','.$k['brand_id'];
		}
			 $brand_id=substr($brand_id,1);
		$m=M('maintenance_brand');
		$arr4=$m->where("brand_id='$brand_id'")->select();	
		$arr=$mysql->where("cpk_id in($cpk_id) and model_id='$model_id'")->select();
		foreach($arr as $k=>$v){
		  $cpk_id=$v['cpk_id'];
		$arr2=$db->where("user_id='$user_id' and cpk_id in ($cpk_id)")->select();
			$arr[$k]['data']=$arr2;
		}
		foreach ($arr2 as $v=>$k) {
		   $numss.=','.$k['numss'];
		}
		
		$numss=substr($numss,1);
		$numss=array_sum(explode(',',$numss));
		$this->assign('numss',$numss);
		$this->assign('arr3',$arr3);
		$this->assign('arr',$arr);
		$this->assign('arr4',$arr4);
		$this->display();
	}
	public function quan(){
		$model_id=I('get.model_id');
		$db=M('cangku');
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_id=$arr1['user_id'];
		$arr6=$db->where("user_id='$user_id'")->select();
		//print_r($arr6);die;
		$this->assign('arr4',$arr4);
		$this->display();

	}
	public function peijian(){
		$db=M('cangku');
		$model_id=I('get.model_id');
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username'")->find();
		$user_id=$arr1['user_id'];
		$arr6=$db->where("user_id='$user_id'")->select();
		//$cpk_id='';
		foreach ($arr6 as $v=>$k) {
		   $cpk_id.=','.$k['cpk_id'];
		}
	$cpk_id=substr($cpk_id,1);//echo 	echo	die;die;
		$mysql=M('chanpinku');
		$my=M('maintenance_model');
		$arr3=$my->where("model_id in ($model_id)")->select();
		//print_r($arr3);die;
		
		foreach ($arr3 as $v=>$k) {
		   $brand_id.=','.$k['brand_id'];
		}
			 $brand_id=substr($brand_id,1);
		$m=M('maintenance_brand');
		$arr4=$m->where("brand_id='$brand_id'")->select();	
		$arr=$mysql->where("cpk_id in($cpk_id) and model_id='$model_id'")->select();
		foreach($arr as $k=>$v){
		  $cpk_id=$v['cpk_id'];
		$arr2=$db->where("user_id='$user_id' and cpk_id in ($cpk_id)")->select();
			$arr[$k]['data']=$arr2;
		}
		foreach ($arr2 as $v=>$k) {
		   $numss.=','.$k['numss'];
		}
		
		$numss=substr($numss,1);
		$numss=array_sum(explode(',',$numss));
		$this->assign('numss',$numss);
		$this->assign('arr3',$arr3);
		$this->assign('arr',$arr);
		$this->assign('arr4',$arr4);
		$this->display();
	}

}
?>