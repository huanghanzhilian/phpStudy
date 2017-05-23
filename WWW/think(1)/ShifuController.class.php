<?php
namespace Home\Controller;
use Think\Controller;
use Org\Net\Video;
class ShifuController extends Controller {
public function tw(){
	header("Content-type: text/html; charset=utf-8"); 
	$host = "http://jisusfzsm.market.alicloudapi.com";
    $path = "/idcardverify/verify";
    $method = "GET";
	$idcard='210623199110250930';
	$sfusername='郭曦仁';
    $appcode = "da629d96ac3843c880e70b2e6e6d1b82";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
	Vendor("alyshimingrenzheng.Demo");
    $querys = "idcard=$idcard&realname=$sfusername";
    $bodys = "";
    $url = $host . $path . "?" . $querys;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  // curl_setopt($curl, CURLOPT_HEADER, true);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
	$result=curl_exec($curl);
	$jsonarr = json_decode($result, true);
//var_dump($jsonarr);
if($jsonarr['status'] != 0)
{
    echo $jsonarr['msg'];
    exit();
}
 
$result = $jsonarr['result'];
echo $result['idcard'].' '.$result['realname'].' '.$result['province'].' '.$result['city'].' '.$result['town'].'<br>';
echo $result['sex'].' '.$result['birth'].' '.$result['verifystatus'].' '.$result['verifymsg'].'<br>';
}
	public function cc(){
		file_get_contents('php://input');
		$username=$_POST['username'];
		$pwd=$_POST['pwd'];
		$mysql=M('m_user');
		$ree=$mysql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if($ree){
			if($ree['pwd']==$pwd){
					cookie('username',$username,3600*24*100);
				echo  json_encode($ree);
			}else{
				$usrInfo = array('user_name'=>1);
			echo json_encode($usrInfo);
			}
			
			}else{
				$usrInfo = array('user_name'=>0);
			echo  json_encode($usrInfo);
			}
		
	
		
	}
	public function gg(){
		file_get_contents('php://input');
		$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('mp4', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath  =      './';
			$upload->savePath  =      './Public/Uploads/video/'; // 设置附件上传目录    // 上传文件 
			$dir ='./Public/Uploads';
			$time=date('Y-m-d H:i:s', time());
			$ioc=$_POST['goods_id'];
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
					$data[]=array("ioc"=>$ioc ,"uid"=>'',"accuracy"=>$goods_img,);
				}

			$obj=M('class');
			$re=$obj->addAll($data);

			//$arr1=$mysql->where("c_id='$re'")->find();
			//$p_count = count($info);
			//$usrInfo = array('user_name'=>$p_count);
		//	echo  json_encode($_FILES);
			 
			}
	}
		
	
		
	
	//public function upload(){
//	$this->display();
	
	//}
	public function video_init(){
		$secretkey = "293751c44b1c95f0f035f181ef29d31a"; // 用户仪表盘上的私钥
$user_unique = "a4lsgehfki"; //必须赋值这两个值
$format = "json";

$video = new Video($secretkey, $user_unique, $format);

$video_info = $_REQUEST;

$file_size = isset($video_info['file_size']) ? intval($video_info['file_size']) : 0 ;
$uploadtype = isset($video_info['uploadtype']) ? intval($video_info['uploadtype']) : 0 ;
$uc1 = isset($video_info['uc1']) ? intval($video_info['uc1']) : 0 ;
$uc2 = isset($video_info['uc2']) ? intval($video_info['uc2']) : 0 ;
$nodeid = isset($video_info['nodeid']) ? intval($video_info['nodeid']) : 0 ;
$client_ip = $_SERVER['REMOTE_ADDR'];

// 若有token，则为断点续传，分发给断点续传接口
if (isset($video_info['token']) && !empty($video_info['token'])) {
    echo $video->resume($video_info['token'], $client_ip, $uploadtype);
}

// 若为上传初始化，视频名称为必须值
if (isset($video_info['videoname']) && !empty($video_info['videoname'])) {
    echo $video->init($video_info['videoname'], $file_size, $client_ip, $uploadtype, $uc1, $uc2, $nodeid);
}

// 若为下载初始化，视频id为必须值
if (isset($video_info['videoid']) && !empty($video_info['videoid'])) {
    echo $video->download($video_info['videoid']);
}

}
public function speed_init(){
	
	$api_getTestNodes = 'http://dispatcher.cloud.letv.com/api/getTestNodes';

	$client_ip = $_SERVER['REMOTE_ADDR'];

	$final_url = $api_getTestNodes . '?client_ip=' . $client_ip;

	//print htmlspecialchars($final_url);
	echo file_get_contents($final_url); //htmlspecialchars($final_url);

}
	public function index(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				header('location:'.__MODULE__.'/Shifu/mima');
			}else{
				$useridd=$yanzheng['user_id'];
			$a=M('m_user');
			$username=$_COOKIE['username'];
			$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$yue=$arr7['yixiaofei'];
			$user_username=$arr7['user_username'];
			$yuemoney=$arr7['yuemoney'];
			$arr8=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$img=$arr8['img'];//die;echo
			if($img){
				$img=$arr8['img'];
				$yanz='修改头像';
			}else{
				$yanz='上传头像';
			}
				$user_id=$arr8['user_id'];
				$b=M('goods');
				$nums=$b->where("user_id='$user_id' and fk=1")->count();
				$sfzt=$arr8['sfzt'];
				if($sfzt=='1'){
					$kongxian='工作中';
				}else if($sfzt=='2'){
					$kongxian='忙碌中';
				}
				else if($sfzt=='3'){
					$kongxian='休息中';
				}
				$sqlp=M('goods');
			$cttt=M('pingjia');
			$ar=$sqlp->where("user_id='$user_id'")->count();
			$art=$sqlp->where("user_id='$user_id' and fk='1'")->count();
			$lv=($art/$ar)*100;
			$lv=substr($lv,0,5);
			if($lv=='100'){
			$lv='99.99';
			}
			$mysql=M('top');
			 $pingjianums=$cttt->where("user_id='$user_id'")->count();
				$ping=$cttt->where("user_id='$user_id'")->select();
				//($ping);die;print_r
						$pjx='';
				foreach ($ping as  $k=>$n){
						$pjx+=$n['pjx']+1;
				}
					 $pjx;
				$xingji=($pjx/$pingjianums);
				$xingji=substr($xingji,0,4);
				$fqfq=M('yaoqingma');
				$zsd=$fqfq->where("yq_user_id='$user_id'")->find();
				$yq_id=$zsd['yq_id']; 
				$num=$sqlp->where("fk='1' and yq_id='$yq_id'")->count();
			$sq=$mysql->where("user_id='$user_id'")->find();
			if($sq){
				$post['wx']=$lv;
				$post['pf']=$xingji;
				$post['cj']=$num;
				$arr1=$mysql->where("user_id='$user_id'")->save($post);	
			}else{
				$post['wx']=$lv;
				$post['pf']=$xingji;
				$post['cj']=$num;
				$post['user_id']=$user_id;
				$arr1=$mysql->add($post);
			}
				
				
				$sdd=$mysql->where("user_id='$user_id'")->find();
				 $lv=$sdd['wx'];//die;echo
			$xingji=$sdd['pf'];
				$cj=$sdd['cj'];
			$nums=$sqlp->where("user_id='$user_id'")->count();
			$sq=$mysql->where("user_id='$user_id'")->find();
			}
}			
				
				$this->assign('useridd',$useridd);
				$this->assign('lv',$lv);
				$this->assign('cj',$cj);
				$this->assign('xingji',$xingji);
				$this->assign('user_username',$user_username);
				$this->assign('wxusername',$wxusername);
				$this->assign('avatar',$img);
				$this->assign('username',$username);
				$this->assign('yanz',$yanz);
				$this->assign('sfzt',$sfzt);
				$this->assign('kongxian',$kongxian);
				$this->assign('yuemoney',$yuemoney);
				$this->assign('nums',$nums);
				$this->assign('yue',$yue);
				$this->display();
		
		
	}
	public function shouhou_list(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$yanzheng['user_id'];
			
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
		$mysql=M('goods');
		$sql=M('shouhou');
			$arr1=$sql->where("zt in(1,2) and usid='$user_id'")->select();
			$nums1=$sql->where("zt in(1,2) and usid='$user_id'")->count();
			$nums2=$sql->where("zt in(3) and usid='$user_id'")->count();
				$shouhou_id = '';
			foreach($arr1 as $k=>$v){
			$shouhou_id .= ','.$v['shouhou_id'];
		}
 		 $shouhou_id=substr($shouhou_id,1);
		 if($shouhou_id){
		$arr=$mysql->join("maintenance_model on goods.model_id=maintenance_model.model_id")->join("shouhou on goods.id=shouhou.goods_id")->where("shouhou_id in($shouhou_id)")->select();
		}else{
		 
		 $arr=$sql->where("shouhou_id ='$shouhou_id'")->find();
		 }
			
		}
	}
		$this->assign('arr',$arr);
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->display();
	}
	public function shouhou_wc(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$yanzheng['user_id'];
			
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
		$zt=I('get.zt');
		if($zt==1){
		$zt='1,2';
		}
		if($zt==3){
		$zt='3';
		}
	//echo 	$zt;die;
		$mysql=M('goods');
		$sql=M('shouhou');
			$arr1=$sql->where("zt in($zt) and usid='$user_id'")->select();
			$shouhou_id = '';
			foreach($arr1 as $k=>$v){
			$shouhou_id .= ','.$v['shouhou_id'];
		}
 		 $shouhou_id=substr($shouhou_id,1);
		 if($shouhou_id){
		$arr=$mysql->join("maintenance_model on goods.model_id=maintenance_model.model_id")->join("shouhou on goods.id=shouhou.goods_id")->where("shouhou_id in($shouhou_id)")->select();
		}else{
		 
		 $arr=$sql->where("shouhou_id ='$shouhou_id'")->find();
		 }
			
		
		}
		}
		//print_r($arr);die;
		$this->assign('arr',$arr);
		$this->display();
	
	}
	public function shouhouxq(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		 $id=I('get.id');
	 $shouhou_id=I('get.shouhou_id');
		$mysql=M('goods');
		$et=$mysql->where("id='$id'")->find();
		$question_id=$et['question_id'];
		$plan_id=$et['plan_id'];
		$quest=M('maintenance_question');
		//维修的问题
		$question=$quest->where("question_id in ($question_id)")->select();
		$pla=M('maintenance_plan');
		//解决方案
		$plan=$pla->where("plan_id in ($plan_id)")->select();
		$mysql=M('goods');
		$arr=$mysql
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("shouhou on goods.id=shouhou.goods_id")
	//	->join("m_user on shouhou.usid=m_user.user_id")
		->where("id='$id'")->find();
		//echo $arr['jxzx_id'].','.$arr['wxzx_id'];die;
		$arr13=$mysql
		->join("shouhou on goods.id=shouhou.goods_id")
		->join("m_user on shouhou.usid=m_user.user_id")
		->where("id='$id'")->find();
		$sqlsql=M('shouhou');
		$ddd=$sqlsql->where("shouhou_id='$shouhou_id'")->find();
		$my=M('gdhf');
			$arrg1=$my->where("goods_id='$id' and gdhf_type='1'")->select();
			$arrg2=$my->where("goods_id='$id' and gdhf_type='2'")->select();
			$arrg3=$my->where("goods_id='$id' and gdhf_type='3'")->select();
		$zt=$ddd['zt'];
		if($zt==1){
		$ztaa='填写售后信息';
		}
		$ways_id=$arr['ways_id'];
		if($ways_id==1){
			$ways_name='上门维修';
		}else if($ways_id==2){
			$ways_name='到店维修';
		}else if($ways_id==3){
			$ways_name='全国邮寄';
		}
				$cc=M('jiance');
		if($arr['dasj']){
			$dasj=date("Y-m-d H:00", $arr['dasj']);
			}//die;echo
			if($arr['dasjc']){
			$dasjc=date("Y-m-d H:00",$arr['dasjc']);
			}
			if($arr['wxzx_id']){
				 $wxzx_id=$arr['wxzx_id'];
				$wx=M('wxzx');
				$a1=$wx->where("wxzx_id='$wxzx_id'")->find();
				if($a1){
					$wxzx_n=$a1['wxzx_n'];
					$wxzx_name=$a1['wxzx_name'];
					$wxzx_phone=$a1['wxzx_phone'];
					$wxzx_time=$a1['wxzx_time'];
					//$wxzx_name=$a1['wxzx_name'];
					}
			}
			
			if($arr['jxzx_id']){
				$jxzx_id=$arr['jxzx_id'];
				$wx=M('jxzx');
				$a1=$wx->where("jxzx_id='$jxzx_id'")->find();
				if($a1){
					$jxzx_n=$a1['jxzx_n'];
					$jxzx_name=$a1['jxzx_name'];
					$jxzx_phone=$a1['jxzx_phone'];
					$jxzx_username=$a1['jxzx_username'];
				}
			}
			
			if($arr['smwx_id']){
				$smwx_id=$arr['smwx_id'];
				$wx=M('smwx');
				$a1=$wx->where("smwx_id='$smwx_id'")->find();
				$smwx_name=$a1['smwx_name'];
			}
			//echo $wxzx_n.','.$jxzx_n;die;
			$fanwei=$arr['fanwei'];
		
		$us=M('m_user');
			$user_id=$arr['user_id'];//die;echo
			if($user_id){
				$userr=$us->where("user_id='$user_id'")->find();

				 $user_username=$userr['user_username'];
				 $user_name=$userr['user_name'];
			}
			$bb=M('chanpinku');	
			$cc=M('jiance');
			$xhjc_id=$arr['xhjc_id'];
			$cppk_id=$cpk_id=$arr['cppk_id'];
			$xqjc_id=$arr['xqjc_id'];
			$wxfy=$arr['wxfy'];
			$cpk_namee=$arr['cpk_namee'];
			if($xqjc_id){
				//维修前的检测
			$arr8=$cc->where("jc_id in($xqjc_id)")->select();
			//print_r($arr8);die;
			}
			if($xhjc_id){
				//维修后的检测
			$arr9=$cc->where("jc_id in($xhjc_id)")->select();
			//print_r($arr9);die;
			}
			if($cpk_namee){
				//维修所用到的产品配件
			$arr10=$bb->where("cpk_id in ($cpk_namee)")->select();
			//print_r($arr10);die;
			}
			$s=$arr['id'];
			$stau=$arr['stau'];
		//整个师傅维修过程及状态
		if($stau==2){
			$r='已接单';
			$b="开始服务";
			
		}else if($stau==4){
			$r='服务结束待付款';
		} else if($stau==3){//判断服务状态
		 if($cpk_namee || $wxfy){
			$r='服务中';
			$b="修后检测";
			}elseif($xqjc_id ){
			$r='服务中';
			$b="产品添加";
			}else{
			$r='服务中';
			$b="修前检测";
			}	
		}
		}
		}
		if($arr['stau']<=2){
			$xiugai='修改';
		}
		if($xqjc_id){
		if($arr['fk']==0 && $arr['stau']>2 && $arr['stau']<7){
		
		$chongzhi='重置';
		}
		}
		if(($arr['stau']==4)&& ($arr['fk']==0)){
			$ddh=$arr['ddh'];
			$lj='生成付款二维码';
		}
		$this->assign('arrg1',$arrg1);
		$this->assign('arrg2',$arrg2);
		$this->assign('arrg3',$arrg3);
		$this->assign('arr13',$arr13);
		$this->assign('shouhou_id',$shouhou_id);
		$this->assign('ztaa',$ztaa);
		$this->assign('zt',$zt);
		$this->assign('ddh',$ddh);
		$this->assign('lj',$lj);
		$this->assign('xiugai',$xiugai);
		$this->assign('chongzhi',$chongzhi);
		$this->assign('user_name',$user_name);
		$this->assign('ways_name',$ways_name);
		$this->assign('dasjc',$dasjc);
		$this->assign('dasj',$dasj);
		$this->assign('smwx_name',$smwx_name);
		$this->assign('jxzx_n',$jxzx_n);
		$this->assign('jxzx_name',$jxzx_name);
		$this->assign('jxzx_phone',$jxzx_phone);
		$this->assign('jxzx_username',$jxzx_username);
		$this->assign('wxzx_n',$wxzx_n);
		$this->assign('wxzx_name',$wxzx_name);
		$this->assign('wxzx_phone',$wxzx_phone);
		$this->assign('wxzx_time',$wxzx_time);
		$this->assign('user_username',$user_username);
		$this->assign('plan',$plan);
		$this->assign('fanwei',$fanwei);
		$this->assign('question',$question);
		$this->assign('arr10',$arr10);
		$this->assign('arr8',$arr8);
		$this->assign('arr9',$arr9);
		$this->assign('b',$b);
		$this->assign('arr',$arr);
		$this->assign('r',$r);
		$this->display();
	
	
	}
	public function shouhouxx(){
		$id=I('get.id');
		$shouhou_id=I('get.shouhou_id');
		$this->assign('shouhou_id',$shouhou_id);
		$this->assign('id',$id);
		$this->display();
	
	}
	public function tijiao(){
		
		$shouhou_id=I('post.shouhou_id');
		$sql=M('shouhou');
		$id=I('post.id');
		$mysql=M('goods');
		$data['shouhoua']=3;
		$arr1=$sql->where("id='$id'")->save($data);
		$rty['xiaojie']=I('post.xiaojie');
		$rty['addres']=I('post.uuid');
		
			$rty['zt']=3;
			$arr6=$sql->where("shouhou_id='$shouhou_id'")->save($rty);
			if($arr6){
			header('location:'. __CONTROLLER__."/shouhou_list");
			}
	
	}
	public function wancheng(){
		$id=I('get.id');
		$shouhou_id=I('get.shouhou_id');
		$mysql=M('goods');
		$sql=M('shouhou');
		$arr3=$sql->where("shouhou_id='$shouhou_id'")->find();
		$dd=$arr3['dd'];
		$usid=$arr3['usid'];
		$sqll=M('m_user');
		$arr=$mysql->where("id='$id'")->find();
		$user_id=$arr['user_id'];
		$shouhoutype=$arr['shouhoutype'];
		if($shouhoutype==1){
			$arr1=$sqll->where("user_id='13'")->find();
			 $post['yuemoney']=($arr1['yuemoney']-60);
			$arr2=$sqll->where("user_id='$user_id'")->save($post);
			if($arr2){
				$h=M('yue');
					$dat['user_id']=$user_id;
					$dat['yue_type']='售后问题';
					$dat['ddh']=$dd;
					$dat['jy_money']='-60';
					$dat['jy_time']=date('Y-m-d H:i:s', time());
					$arrt=$h->add($dat);
				if($arrt){
					//echo 1;die;
					$arr4=$sqll->where("user_id='$usid'")->find();
					$postt['yuemoney']=($arr1['yuemoney']+30);
					$arr5=$sqll->where("user_id='$usid'")->save($postt);
				if($arr5){
				$h=M('yue');
					$datt['user_id']=$usid;
					$datt['yue_type']='解决售后';
					$datt['ddh']=$dd;
				$datt['jy_money']='+30';
					$datt['jy_time']=date('Y-m-d H:i:s', time());
					$arrtt=$h->add($datt);
					if($arrtt){
						$rty['zt']=3;
						$arr6=$sql->where("shouhou_id='$shouhou_id'")->save($rty);
						if($arr6){
						header('location:'. __CONTROLLER__."/shouhouxq/id/{$id}");
						}
					}
					
					}
			}
		}
		
	}else if($shouhoutype==2){
			$arr4=$sqll->where("user_id='$usid'")->find();
					$postt['yuemoney']=($arr1['yuemoney']+30);
					$arr5=$sqll->where("user_id='$usid'")->save($postt);
					if($arr5){
				$h=M('yue');
					$datt['user_id']=$usid;
					$datt['yue_type']='解决售后';
					$datt['ddh']=$dd;
					$datt['jy_money']='+30';
					$datt['jy_time']=date('Y-m-d H:i:s', time());
					$arrtt=$h->add($dat);
					if($arrtt){
						$rty['zt']=3;
						$arr6=$sql->where("shouhou_id='$shouhou_id'")->save($rty);
						if($arr6){
						header('location:'. __CONTROLLER__."/shouhouxq/id/{$id}");
						}
	}
					}
	}else if($shouhoutype==3){
			$rty['zt']=3;
			$arr6=$sql->where("shouhou_id='$shouhou_id'")->save($rty);
			if($arr6){
			header('location:'. __CONTROLLER__."/shouhouxq/id/{$id}");
			}
		
	
	}
	}
	public function wxcgl(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$yanzheng['user_id'];
			 $img=$yanzheng['img'];

			if(!$yanzheng){
				$this->error('非法操作');
			}else{
			$mysql=M('top');
			$arr=$mysql->join("m_user on top.user_id=m_user.user_id")->where("sfzt in(1,2,3)")->order('wx desc')->select();
			$arr1=$mysql->where("user_id='$user_id'")->find();
			}
			}
			$this->assign('yanzheng',$yanzheng);
			$this->assign('arr1',$arr1);
			$this->assign('arr',$arr);
			$this->display();
	}
	public function pjpf(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$yanzheng['user_id'];
			//$img=$yanzheng['img'];
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
			
			$mysql=M('top');
			$arr=$mysql->join("m_user on top.user_id=m_user.user_id")->where("sfzt in(1,2,3)")->order('pf desc')->select();
			$arr1=$mysql->where("user_id='$user_id'")->find();
			}
			}
			$this->assign('yanzheng',$yanzheng);
			$this->assign('arr1',$arr1);
			$this->assign('arr',$arr);
			$this->display();
	}
		 public function scc(){
		 	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			 $post['gdhf_name']=$us_name=$yanzheng['user_username'];
			$post['goods_id']=$id=I('post.id');
			$post['gdhf_time']=$time=date('Y-m-d H:i:s', time());
			$post['gdhf_type']=2;
			$mysql=M('goods');
			$arr=$mysql->where("id='$id'")->find();
			$ways_id=$arr['ways_id'];
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath  =      './';
			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件
			
			 $info   =   $upload->upload(); 
			 if(!$info) {      
				 $this->error($upload->getError());   
			 }else{
			$new_info=$info['img']['savepath'].$info['img']['savename']; 
			$image = new \Think\Image();
		   // $image->open($new_info);
		   // $image->thumb(150, 150)->save($new_info);
			$obj=M('gdhf');
			$post['img']=str_replace("./Public/","",$new_info);
			
			$re=$obj->add($post);
			if($re){
			header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
			}
		}
		}
		}
	   }
	public function tckh(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$yanzheng['user_id'];
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
			$mysql=M('top');
			$arr=$mysql->join("m_user on top.user_id=m_user.user_id")->where("sfzt in(1,2,3)")->order('cj desc')->select();
			$arr1=$mysql->where("user_id='$user_id'")->find();
			}
			}
			$this->assign('yanzheng',$yanzheng);
			$this->assign('arr1',$arr1);
			$this->assign('arr',$arr);
			$this->display();
	}
	public function xiugaimima(){
		$this->display();
	}

	public function shengcheng(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
			$post['yq_user_id']=$yanzheng['user_id'];
			$mysql=M('yaoqingma');
			$post['yq_name']=substr($username,5);
			$post['yq_price']=20;
			$arr=$mysql->add($post);
			if($arr){
			header('location:'.__CONTROLLER__.'/my_wode');
			}
			}
		}
	
	
	}
	public function savepaswd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
				$pwd=I('post.pwd');
				$pass=I('post.pass');
				$mysql=M('m_user');
				$arr=$mysql->where("user_name='$username' and sfzt in(1,2,3)")->find();
				 $pwdd=$arr['pwd'];//die;echo
				if(!($pwdd===$pwd)){
				$this->success('旧密码不对!',__CONTROLLER__.'/xiugaimima',2);
				}else{
					$post['pwd']=$pass;
				$arr2=$mysql->where("user_name='$username' and sfzt in(1,2,3)")->save($post);
					if($arr2){
				$this->success('修改成功!',__CONTROLLER__.'/my_wode',1);
					}
				}
				}
	}
	}
	public function shifu_map(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
			$sql=M('m_user');
			$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$arr1['user_id'];
			$smwx_id=$arr1['smwx_id'];
			$mysql=M('goods');
			$arr=$mysql->where("stau='0' and ways_id='1' and smwx_id='$smwx_id'")->order("id desc")->select();
			//print_r($arr);die;
		}
		}
			$this->assign('arr',$arr);
			$this->display();
	}
	public function shangchuan(){
	
			$this->display();
	}
	public function my_wode(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$yanzheng['user_id'];
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
				$ct=M('yaoqingma');
				$yao=$ct->where("yq_user_id='$user_id'")->find();
				$yq_name=$yao['yq_name'];
				if($yao){
					$yaoqing='我的邀请码';
					$lianjie='<a href='.__CONTROLLER__.'/fsyhm>';
				}else{
					$lianjie='<a href='.__CONTROLLER__.'/shengcheng>';
					$yaoqing='生成邀请码';
				}
			$a=M('m_user');
			$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$yue=$arr7['yixiaofei'];
			$user_username=$arr7['user_username'];
			$yuemoney=$arr7['yuemoney'];
			$arr8=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
				$customer_id=$arr8['customer_id'];//die;echo 
				if($customer_id){
					$fff=M('wd_customer');
					$sdf=$fff->where("customer_id='$customer_id'")->find();
					 $avatar=$sdf['avatar'];//die;echo
					$wxusername=$sdf['username'];
				}else{
					$yanz='微信认证';
				}
				$user_id=$arr8['user_id'];
				$b=M('goods');
				$nums=$b->where("user_id='$user_id' and fk=1")->count();
				$sfzt=$arr8['sfzt'];
				if($sfzt=='1'){
					$kongxian='工作中';
				}
				else if($sfzt=='3'){
					$kongxian='休息中';
				}
				}
}	
				$this->assign('lianjie',$lianjie);
				$this->assign('yaoqing',$yaoqing);
				$this->assign('username',$username);
				$this->assign('user_username',$user_username);
				$this->assign('wxusername',$wxusername);
				$this->assign('avatar',$avatar);
				$this->assign('yanz',$yanz);
				$this->assign('sfzt',$sfzt);
				$this->assign('kongxian',$kongxian);
				$this->assign('yuemoney',$yuemoney);
				$this->assign('nums',$nums);
				$this->assign('yue',$yue);
				$this->display();
	}
	public function fsyhm(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$yanzheng['user_id'];
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
				$ct=M('yaoqingma');
				$yao=$ct->where("yq_user_id='$user_id'")->find();
				$yq_name=$yao['yq_name'];
			}
			
			}
		$this->assign('user_id',$user_id);
		$this->assign('yq_name',$yq_name);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function fsyhmadd(){
		//print_r($_POST);die;
		 $yh_name=I('post.youhuima');//die;echo
		$user_id=I('post.user_id');
		$mysql=M('m_user');
		$arr=$mysql->where("user_id='$user_id' and sfzt in(1,2,3)")->find();
		 $user_username=$arr['user_username'];
		$user_name=$arr['user_name'];//die;echo
		$phone=I('post.phone');
		$url = 'http://sms.jiangukj.com/SendSms.aspx?';
		header("Content-type: text/html; charset=utf-8");
		$data = array('action' => 'code',
		'username' => 'bjjxsg',
		'userpass' => '7bi58n',
		'mobiles' => $phone,
		'content' => $yh_name.'|'.$user_username.'|'.$user_name,
		'codeid' => '4296');
		$db = new UtilController();
		$result = $db->request($url, 'POST',$data);
		if($result){
		header('location:'.__CONTROLLER__.'/fsyhm');
		}
	}
	public function upadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
			$a=M('m_user');
			$arr7=$a->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$arr7['user_id'];
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->rootPath  =      './';
			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
			 $info   =   $upload->upload(); 
			 if(!$info) {      
				 $this->error($upload->getError());   
			 }else{
			$new_info=$info['img']['savepath'].$info['img']['savename']; 
			$image = new \Think\Image(); 
			$_POST['img']=str_replace("./Public/","",$new_info);
			$obj=M('m_user');
			$re=$obj->where("user_id='$user_id'")->save($_POST);
			if($re){
				header('location:'.__CONTROLLER__.'/index');
			} else {    
				$this->error('添加失败');
			}
		}
	}
	}
	}
	public function	shifuzhuangtai(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$id=I('get.id');//echodie;
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
			$sql=M('m_user');
			$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
			$user_id=$arr1['user_id'];
			if($id==1){
				$post['sfzt']=3;
			$mysql=M('m_user');
			$arr=$mysql->where("user_id='$user_id'")->save($post);
			if($arr){
				
			echo "<a href='javascript:void(0)'onclick='ko(3)'>休息中</a>";//die;
			}
			}
			
			if($id==3){
				$post['sfzt']=1;
				$mysql=M('m_user');
			$arr=$mysql->where("user_id='$user_id'")->save($post);
			if($arr){
			echo "<a href='javascript:void(0)'onclick='ko(1)'>工作中</a>";//die;
			}
			
			}
	}
		}
		}
	public function shifu(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		//师傅导航加载
		require_once APP_PATH.'Common/Cf/shifu.php';
		$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
		$mysql=M('goods');
		$sql=M('m_user');//维修人员表
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$useridd=$yanzheng['user_id'];
		$user_username=$yanzheng['user_username'];
		$arr5=$sql->select();
		$question_name = '';
			foreach($arr5 as $k=>$v){
			$smwx_id .= ','.$v['smwx_id'];
		}
		$smwxid=substr($smwx_id,1);
		
		$user_id=$arr1['user_id'];
		$smwx_id=$arr1['smwx_id'];
		$sfzt=$arr1['sfzt'];
		//$arr=$mysql->where("")->select();
		if($sfzt==1 or $sfzt==2){//师傅在空闲状态
		//显示分配的订$sfzt==1单以及可以抢的订单
	$arr=$mysql
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("zt_time on goods.id=zt_time.goods_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->join("goodssmwx on goods.id=goodssmwx.goodsid")
		->where("(stau='1' and user_id='$user_id') or (ways_id='1' and stau='0' and smwxid in($smwx_id))")->order('id desc')->select();
		}
	$arra=$mysql
		->where("(stau='1' and user_id='$user_id') or (ways_id='1' and stau='0')")->select();
		if($arra){
		$nums1=count($arra);
		}
		$arrb=$mysql
		->where("stau in(2,3,4)and user_id ='$user_id'")->select();
		if($arrb){
		$nums2=count($arrb);
		}
		$arrc=$mysql
		->where("stau ='5'and user_id ='$user_id'")->select();
		if($arrc){
		$nums3=count($arrc);
		}
		}
		}
		$this->assign('user_username',$user_username);
		$this->assign('useridd',$useridd);
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('arr',$arr);
		$this->assign('my',$my);
		$this->display();
	
		}
		public function sfquxiao(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
				//print_r($_POST);die;
			$id=I('post.id');
			$post['quxiaocontent']=I('post.quxiaocontent');
			$mysql=M('goods');
			$post['fk']=110;
			$post['stau']=10;
			$ck=M('cangku');
			$arr4=$mysql->where("id='$id'")->find();
			$cangku_id=$arr4['cangku_id'];
			$arr=$mysql->where("id='$id'")->save($post);
			if($arr){
				$sql=M('m_user');
				$arr3=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
				$sfzt=$arr3['sfzt'];
				if($sfzt==1){
					if($cangku_id){
						$fg['zta']=0;
						$sqd=$ck->where("cangku_id='$cangku_id'")->save($fg);
						if($sqd){
						header('location:'.__CONTROLLER__.'/daiwancheng');
						}
					}else{
					header('location:'.__CONTROLLER__.'/daiwancheng');
					}
				}else{
				$data['sfzt']=1;
				$arr2=$sql->where("user_name='$username' and sfzt in(1,2,3)")->save($data);
				if($arr2){
					if($cangku_id){
						$fg['zta']=0;
						$sqd=$ck->where("cangku_id='$cangku_id'")->save($fg);
						if($sqd){
						header('location:'.__CONTROLLER__.'/daiwancheng');
						}
					}else{
					header('location:'.__CONTROLLER__.'/daiwancheng');
					}
				}else{
				$this->error('失败');
				
				}
				
				}
			}
		}
		}
		}
	public function history_a(){
		//师傅导航加载
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		require_once APP_PATH.'Common/Cf/shifu.php';
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');//维修人员表
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$sfzt=$arr1['sfzt'];
		$mysql=M('goods');
		//师傅在空闲状态
		//显示分配的订单以及可以抢的订单
		$arr=$mysql
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("zt_time on goods.id=zt_time.goods_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("user_id='$user_id' and pingjiazt='1' and stau='6'")->select();
	$arr4=$mysql->where("user_id='$user_id' and pingjiazt='1'")->order('id desc')->select();
		if($arr4){
		$nums1=count($arr4);
		}else{
		$nums1=0;
		}
		$arr5=$mysql
		->where("user_id='$user_id' and fk='110'")->select();
		if($arr5){
		$nums2=count($arr5);
		}else{
		$nums2=0;
		}
		}
		}
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('arr',$arr);
		$this->assign('my',$my);
		$this->display();
	
		}
		public function history_b(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		//师傅导航加载
		require_once APP_PATH.'Common/Cf/shifu.php';
		$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
		$sql=M('m_user');//维修人员表
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$sfzt=$arr1['sfzt'];
		$mysql=M('goods');
		//师傅在空闲状态
		//显示分配的订单以及可以抢的订单
		$arr=$mysql
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("zt_time on goods.id=zt_time.goods_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("user_id='$user_id' and fk='110' and stau='10'")->order('id desc')->select();
		
		//print_r($arr);die;
			//print_r($arr);die;
	$arr4=$mysql->where("user_id='$user_id' and pingjiazt='1'")->select();
		if($arr4){
		$nums1=count($arr4);
		}else{
		$nums1=0;
		}
		$arr5=$mysql
		->where("user_id='$user_id' and fk='110'")->select();
		if($arr5){
		$nums2=count($arr5);
		}else{
		$nums2=0;
		}
		}
		}
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('arr',$arr);
		$this->assign('my',$my);
		$this->display();
	
		}
	public function chanpin(){//维修过程需要产品配件，分类显示
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$id=I('get.id');
		$myysql=M('goods');
		$arr9=$myysql->where("id='$id'")->find();
		$model_id=$arr9['model_id'];
		$db=M('cangku');
		$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		//师傅本人仓库的配件
		$arr6=$db->where("user_id='$user_id' and zta='0' ")->find();
		$mysql=M('chanpinku');
		//print_r($arr6);die;
		if(!$arr6){
			$arr6=$db->where("user_id='$user_id' and zta='0' ")->find();
			$arr11=$mysql->where("model_id='$model_id' and sf='y' and cpk_zt='0'")->select();
			$b="<input type='submit' value='确认'>";
			//print_r($arr11);die;
		}else{
		$arr6=$db->where("user_id='$user_id' and zta='0'")->select();
		foreach ($arr6 as $v=>$k) {
		   $cpk_id.=','.$k['cpk_id'];//有哪些配件
		}
		$cpk_id=substr($cpk_id,1);
		
		//可以回收的配件
		
		$arr11=$mysql->where("model_id='$model_id' and sf='y' and cpk_zt='0'")->select();
		$arr5=$mysql->where("cpk_id in($cpk_id)")->select();
		foreach ($arr5 as $v=>$k) {
		   $model_id.=','.$k['model_id'];
		}
		$model_id;
		$my=M('maintenance_model');
		//机型
		$arr3=$my->where("model_id in ($model_id)")->select();
		foreach ($arr3 as $v=>$k) {
		   $brand_id.=','.$k['brand_id'];
		}
		 $brand_id=substr($brand_id,1);
		$m=M('maintenance_brand');
		$arr9=$m->select();
		//品牌
		$arr4=$m->where("brand_id='$brand_id'")->select();	
		$arr=$mysql->where("cpk_id in($cpk_id) and model_id='$model_id'")->select();
		
		$b="<input type='submit' value='确认'>";

		foreach($arr as $k=>$v){
		  $cpk_id=$v['cpk_id'];
		  //师傅仓库的配件
		$arr2=$db->where("user_id='$user_id' and cpk_id in ($cpk_id) and zta='0'")->select();
			$arr[$k]['data']=$arr2;
		}
		foreach ($arr2 as $v=>$k) {
		   $numss.=','.$k['numss'];
		}	
		}
		}
	}
		$numss=substr($numss,1);
		$numss=array_sum(explode(',',$numss));
		$this->assign('b',$b);
		$this->assign('numss',$numss);
		$this->assign('id',$id);
		$this->assign('arr',$arr);
		$this->assign('arr11',$arr11);
		$this->display();
	
	}
	public function xiugaiadd(){
			if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$id=$_POST['id'];
		$wxfy=$_POST['wxfy'];
		$cangku_id=$_POST['cangku_id'];//die;echo 
		$sql=M('goods');
		$cppk_id=$_POST['cppk_id'];
		$cangku_id=implode(',',$cangku_id);
		 $cppk_id=implode(',',$cppk_id);
		if($cangku_id){
		$my=M('cangku');
		$arrh=$sql->where("id='$id'")->find();
			$cangkuid=$arrh['cangku_id'];
		if($cangkuid){
		$lo['zta']=0;
		$sdcv=$my->where("cangku_id='$cangkuid'")->save($lo);
		}
		$arr3=$my->where("cangku_id in($cangku_id)")->select();
			foreach ($arr3 as $k=>$v){
			 $cpk_id.=','.$v['cpk_id'];
			}
			$cpk_id=substr($cpk_id,1);
		$mysql=M('chanpinku');
		$arr=$mysql->where("cpk_id in ($cpk_id)")->select();
		
	if($cppk_id){//判别是否有回收的配件
		$arr4=$mysql->where("cpk_id in ($cppk_id)")->select();
			foreach ($arr4 as $k=>$vv){
			 $price+=$vv['cpk_price'];
			}
		foreach ($arr as $k=>$v){
			 $cpk_name.=','.$v['cpk_name'];
			
			 $post['amount']=$amount+=$v['cpp_price'];
		}
		$wxfy=$_POST['wxfy'];
			$post['amount']=($post['amount']-$price)+$wxfy;//配件的价格
			$post['amounttt']=($amount-$price)+$wxfy;
			$post['cppk_id']=$cppk_id;//回收的配件
			$post['cangku_id']=$cangku_id;//用到仓库的配件
			$post['cpk_namee']=$cpk_id;//需要的配件
			$post['wxfy']=$wxfy;
				$data['cppk_id']='';
			$arr67=$sql->where("id='$id'")->save($data);
			$arr1=$sql->where("id='$id'")->save($post);
			if($cangku_id){
				$ryt['zta']=9;
				$fdg=$my->where("cangku_id='$cangku_id'")->save($ryt);
				if($fdg){
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
				}
				}else{
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
				
				}
		}else{
			//没有回收的配件
			foreach ($arr as $k=>$v){
			 $cpk_name.=','.$v['cpk_name'];
			
			 $post['amount']=$amount+=$v['cpp_price'];
			}
			$wxfy=$_POST['wxfy'];
			$post['amount']=$post['amount']+$wxfy;
			$post['amounttt']=$amount+$wxfy;
			$post['cpk_namee']=$cpk_id;
			$post['cangku_id']=$cangku_id;
			$post['wxfy']=$wxfy;
			$arr1=$sql->where("id='$id'")->save($post);
			if($arr1){
				//跳转到下一个服务状态
				if($cangku_id){
				$ryt['zta']=9;
				$fdg=$my->where("cangku_id='$cangku_id'")->save($ryt);
				if($fdg){
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
				}
				}else{
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
				
				}
			}else{
			  $this->error('修改失败');
			 }
		}
			}else{
				$wxfy=$_POST['wxfy'];
				$post['amount']=$wxfy;//配件的价格
				$post['amounttt']=$wxfy;
				$post['wxfy']=$wxfy;
				$data['cpk_namee']='';
				$data['cppk_id']='';
			$arr1=$sql->where("id='$id'")->save($data);
			$arr1=$sql->where("id='$id'")->save($post);
			if($arr1){
				//跳转到下一个服务状态
				if($cangku_id){
				$ryt['zta']=9;
				$fdg=$my->where("cangku_id='$cangku_id'")->save($ryt);
				if($fdg){
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
				}
				}else{
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
				
				}
			}else{
			  $this->error('修改失败');
			 }


		}
	
	}
	}
	}
	public function xiugaichanpin(){
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$id=I('get.id');
		$myysql=M('goods');
		$arr9=$myysql->where("id='$id'")->find();
		$model_id=$arr9['model_id'];
		$cangku_id=$arr9['cangku_id'];
		$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		//师傅本人仓库的配件
		$db=M('cangku');
		$arr6=$db->where("user_id='$user_id' and zta='0' ")->find();
		//print_r($arr6);die;
		if(!$arr6){
			$arr6=$db->where("user_id='$user_id' and zta='0' ")->find();
			$arr11=$mysql->where("model_id='$model_id' and sf='y' and cpk_zt='0'")->select();
			$b="<input type='submit' value='确认'>";
		}else{
		$arr6=$db->where("user_id='$user_id' and zta='0'")->select();
		foreach ($arr6 as $v=>$k) {
		   $cpk_id.=','.$k['cpk_id'];//有哪些配件
		}
		$cpk_id=substr($cpk_id,1);
		$mysql=M('chanpinku');
		//可以回收的配件
		$arr11=$mysql->where("model_id='$model_id' and sf='y' and cpk_zt='0'")->select();
		
		$arr5=$mysql->where("cpk_id in($cpk_id)")->select();
		foreach ($arr5 as $v=>$k) {
		   $model_id.=','.$k['model_id'];
		}
		$model_id;
		$my=M('maintenance_model');
		//机型
		$arr3=$my->where("model_id in ($model_id)")->select();
		foreach ($arr3 as $v=>$k) {
		   $brand_id.=','.$k['brand_id'];
		}
		 $brand_id=substr($brand_id,1);
		$m=M('maintenance_brand');
		$arr9=$m->select();
		//品牌
		$arr4=$m->where("brand_id='$brand_id'")->select();	
		$arr=$mysql->where("cpk_id in($cpk_id) and model_id='$model_id'")->select();
		
		$b="<input type='submit' value='确认'>";
		foreach($arr as $k=>$v){
		  $cpk_id=$v['cpk_id'];
		  //师傅仓库的配件
		$arr2=$db->where("user_id='$user_id' and cpk_id in ($cpk_id) and zta='0'")->select();
			$arr[$k]['data']=$arr2;
		}
		foreach ($arr2 as $v=>$k) {
		   $numss.=','.$k['numss'];
		}	
		}
		}
	}
	
		$numss=substr($numss,1);
		$numss=array_sum(explode(',',$numss));
		$this->assign('b',$b);
		$this->assign('numss',$numss);
		$this->assign('id',$id);
		$this->assign('arr',$arr);
		$this->assign('arr11',$arr11);
		$this->display();
	
	}

	
	

		public function daiwancheng(){//待完成的订单显示
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
		$useridd=$yanzheng['user_id'];
		$user_username=$yanzheng['user_username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$stau='2,3,4';//维修的状态一共有5个状态0-5
		$mysql=M('goods');
		$arr=$mysql
		//->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		//->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("zt_time on goods.id=zt_time.goods_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("stau in($stau)and user_id ='$user_id'")->order('id desc')->select();
		//print_r($arr);DIE;
		//print_r($arr);die;
		$arra=$mysql
		->where("(stau='1' and user_id='$user_id') or (ways_id='1' and stau='0')")->select();
		if($arra){
		$nums1=count($arra);
		}else{
		$nums1=0;
		}
		$arrb=$mysql
		->where("stau in(2,3,4)and user_id ='$user_id'")->select();
		if($arrb){
		$nums2=count($arrb);
		}else{
		$nums2=0;
		}
		$arrc=$mysql
		->where("stau ='5'and user_id ='$user_id'")->select();
		if($arrc){
		$nums3=count($arrc);
		}else{
		$nums3=0;
		}
		}
		}	
		
		$this->assign('user_username',$user_username);
		$this->assign('useridd',$useridd);
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function yiwancheng(){//已完成的订单显示
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
			$yz=M('m_user');
			$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
			if(!$yanzheng){
				$this->error('非法操作');
			}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
	
		
		$mysql=M('goods');
		$arr=$mysql
			//->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_plan on goods.plan_id=maintenance_plan.plan_id")
		->join("zt_time on goods.id=zt_time.goods_id")
		->join("maintenance_question on goods.question_id=maintenance_question.question_id")
		->where("stau='5' and user_id ='$user_id'")->order('id desc')->select();
		$arra=$mysql
		->where("(stau='1' and user_id='$user_id') or (ways_id='1' and stau='0')")->select();
		if($arra){
		$nums1=count($arra);
		}else{
		$nums1=0;
		}
		$arrb=$mysql
		->where("stau in(2,3,4)and user_id ='$user_id'")->select();
		if($arrb){
		$nums2=count($arrb);
		}else{
		$nums2=0;
		}
		$arrc=$mysql
		->where("stau ='5'and user_id ='$user_id'")->select();
		if($arrc){
		$nums3=count($arrc);
		}else{
		$nums3=0;
		}
		}
		}
		$this->assign('nums1',$nums1);
		$this->assign('nums2',$nums2);
		$this->assign('nums3',$nums3);
		$this->assign('arr',$arr);
		$this->display();
	}
		public function qrcode()
  {
		$ddh=I('get.ddh');
		$url="http://m.weibaishi.com/home/payy/index/ddh/{$ddh}";
		$level=3;
		$size=100;
       Vendor('phpqrcode.phpqrcode');
       $errorCorrectionLevel =intval($level) ;//容错级别 
       $matrixPointSize = intval($size);//生成图片大小 
       //生成二维码图片 
       $object = new \QRcode();
       $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);
		//$this->display();
  }
	public function daiwanchengxq(){//订单详情
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$useridd=$yanzheng['user_id'];
		$user_username=$yanzheng['user_username'];
		$id=I('get.id');
		$mysql=M('goods');
		$et=$mysql->where("id='$id'")->find();
		$question_id=$et['question_id'];
		$plan_id=$et['plan_id'];
		$quest=M('maintenance_question');
		//维修的问题
		$question=$quest->where("question_id in ($question_id)")->select();
		$pla=M('maintenance_plan');
		//解决方案
		$plan=$pla->where("plan_id in ($plan_id)")->select();
		$mysql=M('goods');
		$arr=$mysql
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->join("maintenance_ways on goods.ways_id=maintenance_ways.ways_id")
		->where("id='$id'")->find();
		$my=M('gdhf');
			$arrg1=$my->where("goods_id='$id' and gdhf_type='1'")->select();
			$arrg2=$my->where("goods_id='$id' and gdhf_type='2'")->select();
			$arrg3=$my->where("goods_id='$id' and gdhf_type='3'")->select();
		
		
	
		if($arr['fk']==0){
		$amount='￥'.$arr['amount'];
		}
		//echo $amount;die;
		$ways_id=$arr['ways_id'];
		if($ways_id==1){
			$ways_name='上门维修';
		}else if($ways_id==2){
			$ways_name='到店维修';
		}else if($ways_id==3){
			$ways_name='全国邮寄';
		}
				$cc=M('jiance');
		if($arr['dasj']){
			$dasj=date("Y-m-d H:00", $arr['dasj']);
			}//die;echo
			if($arr['dasjc']){
			$dasjc=date("Y-m-d H:00",$arr['dasjc']);
			}
			if($arr['wxzx_id']){
				$wxzx_id=$arr['wxzx_id'];
				$wx=M('wxzx');
				$a1=$wx->where("wxzx_id='$wxzx_id'")->find();
					$wxzx_n=$a1['wxzx_n'];
					$wxzx_name=$a1['wxzx_name'];
					$wxzx_phone=$a1['wxzx_phone'];
					$wxzx_time=$a1['wxzx_time'];
					//$wxzx_name=$a1['wxzx_name'];
			}
			if($arr['jxzx_id']){
				$jxzx_id=$arr['jxzx_id'];
				$wx=M('jxzx');
				$a1=$wx->where("jxzx_id='$jxzx_id'")->find();
					$jxzx_n=$a1['jxzx_n'];
					$jxzx_name=$a1['jxzx_name'];
					$jxzx_phone=$a1['jxzx_phone'];
					$jxzx_username=$a1['jxzx_username'];

			}
			if($arr['smwx_id']){
				$smwx_id=$arr['smwx_id'];
				$wx=M('smwx');
				$a1=$wx->where("smwx_id='$smwx_id'")->find();
				$smwx_name=$a1['smwx_name'];
			}
			$fanwei=$arr['fanwei'];
		
		$us=M('m_user');
			$user_id=$arr['user_id'];//die;echo
			if($user_id){
				$userr=$us->where("user_id='$user_id'")->find();

				 $user_username=$userr['user_username'];
				 $user_name=$userr['user_name'];
			}
			$bb=M('chanpinku');	
			$cc=M('jiance');
			$xhjc_id=$arr['xhjc_id'];
			$cppk_id=$cpk_id=$arr['cppk_id'];
			$xqjc_id=$arr['xqjc_id'];
			$wxfy=$arr['wxfy'];
			$cpk_namee=$arr['cpk_namee'];
			if($xqjc_id){
				//维修前的检测
			$arr8=$cc->where("jc_id in($xqjc_id)")->select();
			//print_r($arr8);die;
			}
			if($xhjc_id){
				//维修后的检测
			$arr9=$cc->where("jc_id in($xhjc_id)")->select();
			//print_r($arr9);die;
			}
			if($cpk_namee){
				//维修所用到的产品配件
			$arr10=$bb->where("cpk_id in ($cpk_namee)")->select();
			//print_r($arr10);die;
			}
			$s=$arr['id'];
			$stau=$arr['stau'];
		//整个师傅维修过程及状态
		if($stau==2){
			$r='已接单';
			$b="开始服务";
			
		}else if($stau==4){
			$r='服务结束待付款';
		} else if($stau==3){//判断服务状态
		 if($cpk_namee || $wxfy){
			$r='服务中';
			$b="修后检测";
			}elseif($xqjc_id ){
			$r='服务中';
			$b="产品添加";
			}else{
			$r='服务中';
			$b="修前检测";
			}	
		}
		}
		}
		if($arr['stau']<=2){
			$xiugai='修改';
		}
		if($xqjc_id){
		if($arr['fk']==0 && $arr['stau']>2 && $arr['stau']<7){
		
		$chongzhi='重置';
		}
		}
		if(($arr['stau']==4)&& ($arr['fk']==0)){
			$ddh=$arr['ddh'];
			$lj='生成付款二维码';
		}
		if($arr['gzt']==0 && ($arr['stau']==5 || $arr['stau']==6)){
			$gf='退货退款';
		}
		if($arr['gzt']==1 ){
			$gl='申请中';
		}
	

		$this->assign('useridd',$useridd);
		$this->assign('arrg1',$arrg1);
		$this->assign('arrg2',$arrg2);
		$this->assign('arrg3',$arrg3);
		$this->assign('gf',$gf);
		$this->assign('gl',$gl);
		$this->assign('ddh',$ddh);
		$this->assign('amount',$amount);
		$this->assign('lj',$lj);
		$this->assign('xiugai',$xiugai);
		$this->assign('chongzhi',$chongzhi);
		$this->assign('user_name',$user_name);
		$this->assign('ways_name',$ways_name);
		$this->assign('dasjc',$dasjc);
		$this->assign('dasj',$dasj);
		$this->assign('smwx_name',$smwx_name);
		$this->assign('jxzx_n',$jxzx_n);
		$this->assign('jxzx_name',$jxzx_name);
		$this->assign('jxzx_phone',$jxzx_phone);
		$this->assign('jxzx_username',$jxzx_username);
		$this->assign('wxzx_n',$wxzx_n);
		$this->assign('wxzx_name',$wxzx_name);
		$this->assign('wxzx_phone',$wxzx_phone);
		$this->assign('wxzx_time',$wxzx_time);
		$this->assign('user_username',$user_username);
		$this->assign('plan',$plan);
		$this->assign('fanwei',$fanwei);
		$this->assign('question',$question);
		$this->assign('arr10',$arr10);
		$this->assign('arr8',$arr8);
		$this->assign('arr9',$arr9);
		$this->assign('b',$b);
		$this->assign('arr',$arr);
		$this->assign('r',$r);
		$this->display();
	
	}
	public function thtk(){
		$id=I('get.id');
		$mysql=M('goods');
		$post['gzt']=1;
		$arr=$mysql->where("id='$id'")->save($post);
		if($arr){
			 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
		}
	}
	public function chongzhi(){
			$id=I('post.id');
			$mysql=M('goods');
			$sqll=M('cangku');
			$arr4=$mysql->where("id='$id'")->find();
			$cangku_id=$arr4['cangku_id'];
			$user_id=$arr4['user_id'];
			if($cangku_id){
				 $pp['zta']=0;
				$sqll->where("cangku_id in($cangku_id)")->save($pp);
			}
			$sql=M('zt_time');
			$sqlsql=M('m_user');
			$data['qo_time']='';
			$data['ho_time']='';
			$data['qx_time']='';
			$post['stau']='2';
			$post['xqjc_id']='';
			$post['xhjc_id']='';
			$post['amount']='';
			$post['amounttt']='';
			$post['cppk_id']='';
			$post['cpk_namee']='';
			$post['cangku_id']='';
			$post['wxfy']='';
			$arr=$mysql->where("id='$id'")->save($post);
			if($arr){
			$arr1=$sql->where("goods_id='$id'")->save($data);
			if($arr1){
				$cs['sfzt']=1;
				$sdf=$sqlsql->where("user_id='$user_id'")->save($cs);
				
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
				
			}
			}
	}
	public function shifuxiangqing(){//抢单，接单的详情页面
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			$usid=$yanzheng['user_id'];
		$id=I('get.id');	
		$mysql=M('goods');
		$et=$mysql->where("id='$id'")->find();
		$question_id=$et['question_id'];
		$userid=$et['user_id'];
		if($userid){
		if(!($usid==$userid)){
		$this->success('此单被抢走，下次快点啊!',__CONTROLLER__.'/shifu',1);
		}else{
		$plan_id=$et['plan_id'];
		$quest=M('maintenance_question');
		$question=$quest->where("question_id in ($question_id)")->select();
		$pla=M('maintenance_plan');
		$plan=$pla->where("plan_id in ($plan_id)")->select();	
		$mysql=M('goods');
		$arr=$mysql
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->where("id='$id'")->find();
		$fanwei=$arr['fanwei'];
		$ways_id=$arr['ways_id'];
		if($ways_id==1){
			$ways_name='上门维修';
		}else if($ways_id==2){
			$ways_name='到店维修';
		}else if($ways_id==3){
			$ways_name='全国邮寄';
		}
		$cc=M('jiance');
		if($arr['dasj']){
			$dasj=date("Y-m-d H:00", $arr['dasj']);
			}
			if($arr['dasjc']){
			$dasjc=date("Y-m-d H:00",$arr['dasjc']);
			}
			if($arr['wxzx_id']){
				$wxzx_id=$arr['wxzx_id'];
				$wx=M('wxzx');
				$a1=$wx->where("wxzx_id='$wxzx_id'")->find();
					$wxzx_n=$a1['wxzx_n'];
					$wxzx_name=$a1['wxzx_name'];
					$wxzx_phone=$a1['wxzx_phone'];
					$wxzx_time=$a1['wxzx_time'];
					//$wxzx_name=$a1['wxzx_name'];
			}
			if($arr['jxzx_id']){
				$jxzx_id=$arr['jxzx_id'];
				$wx=M('jxzx');
				$a1=$wx->where("jxzx_id='$jxzx_id'")->find();
					$jxzx_n=$a1['jxzx_n'];
					$jxzx_name=$a1['jxzx_name'];
					$jxzx_phone=$a1['jxzx_phone'];
					$jxzx_username=$a1['jxzx_username'];

			}
			if($arr['smwx_id']){
				$smwx_id=$arr['smwx_id'];
				$wx=M('smwx');
				$a1=$wx->where("smwx_id='$smwx_id'")->find();
				$smwx_name=$a1['smwx_name'];
			}
		$us=M('m_user');
			$user_id=$arr['user_id'];
			if($user_id){
				$userr=$us->where("user_id='$user_id'")->find();

				$user_username=$userr['user_username'];//die;echo
			}
			$bb=M('chanpinku');	
			$xhjc_id=$arr['xhjc_id'];
			$cpk_id=$arr['cppk_id'];
			$xqjc_id=$arr['xqjc_id'];
			if($xqjc_id){
			$arr8=$cc->where("jc_id in($xqjc_id)")->select();//print_r($arr);die;
			}
			if($xhjc_id){
			$arr9=$cc->where("jc_id in($xhjc_id)")->select();
			}
			if($cpk_id){
			$arr10=$bb->where("cpk_id in ($cpk_id)")->select();
			}
			//判别抢单还是接单
			if($arr['ways_id']==1 &&(!$arr['user_id'])){
				$v='抢单';
				$r='等待接单';
				$e='快抢啊';
			}else{
			$r='等待接单';
			$b="接单";
			$c="拒单";
			}
		}
		}else{
		$plan_id=$et['plan_id'];
		$quest=M('maintenance_question');
		$question=$quest->where("question_id in ($question_id)")->select();
		$pla=M('maintenance_plan');
		$plan=$pla->where("plan_id in ($plan_id)")->select();	
		$mysql=M('goods');
		$arr=$mysql
		->join("maintenance_model on goods.model_id=maintenance_model.model_id")
		->join("maintenance_color on goods.color_id=maintenance_color.color_id")
		->where("id='$id'")->find();
		$fanwei=$arr['fanwei'];
		$ways_id=$arr['ways_id'];
		if($ways_id==1){
			$ways_name='上门维修';
		}else if($ways_id==2){
			$ways_name='到店维修';
		}else if($ways_id==3){
			$ways_name='全国邮寄';
		}
		$cc=M('jiance');
		if($arr['dasj']){
			$dasj=date("Y-m-d H:00", $arr['dasj']);
			}
			if($arr['dasjc']){
			$dasjc=date("Y-m-d H:00",$arr['dasjc']);
			}
			if($arr['wxzx_id']){
				$wxzx_id=$arr['wxzx_id'];
				$wx=M('wxzx');
				$a1=$wx->where("wxzx_id='$wxzx_id'")->find();
					$wxzx_n=$a1['wxzx_n'];
					$wxzx_name=$a1['wxzx_name'];
					$wxzx_phone=$a1['wxzx_phone'];
					$wxzx_time=$a1['wxzx_time'];
					//$wxzx_name=$a1['wxzx_name'];
			}
			if($arr['jxzx_id']){
				$jxzx_id=$arr['jxzx_id'];
				$wx=M('jxzx');
				$a1=$wx->where("jxzx_id='$jxzx_id'")->find();
					$jxzx_n=$a1['jxzx_n'];
					$jxzx_name=$a1['jxzx_name'];
					$jxzx_phone=$a1['jxzx_phone'];
					$jxzx_username=$a1['jxzx_username'];

			}
			if($arr['smwx_id']){
				$smwx_id=$arr['smwx_id'];
				$wx=M('smwx');
				$a1=$wx->where("smwx_id='$smwx_id'")->find();
				$smwx_name=$a1['smwx_name'];
			}
		$us=M('m_user');
			$user_id=$arr['user_id'];
			if($user_id){
				$userr=$us->where("user_id='$user_id'")->find();

				$user_username=$userr['user_username'];//die;echo
			}
			$bb=M('chanpinku');	
			$xhjc_id=$arr['xhjc_id'];
			$cpk_id=$arr['cppk_id'];
			$xqjc_id=$arr['xqjc_id'];
			if($xqjc_id){
			$arr8=$cc->where("jc_id in($xqjc_id)")->select();//print_r($arr);die;
			}
			if($xhjc_id){
			$arr9=$cc->where("jc_id in($xhjc_id)")->select();
			}
			if($cpk_id){
			$arr10=$bb->where("cpk_id in ($cpk_id)")->select();
			}
			//判别抢单还是接单
			if($arr['ways_id']==1 &&(!$arr['user_id'])){
				$v='抢单';
				$r='等待接单';
				$e='快抢啊';
			}else{
			$r='等待接单';
			$b="接单";
			$c="拒单";
			}
		}
		}
		}
		$this->assign('fanwei',$fanwei);	
		$this->assign('ways_name',$ways_name);
		$this->assign('dasjc',$dasjc);
		$this->assign('dasj',$dasj);
		$this->assign('smwx_name',$smwx_name);
		$this->assign('jxzx_n',$jxzx_n);
		$this->assign('jxzx_name',$jxzx_name);
		$this->assign('jxzx_phone',$jxzx_phone);
		$this->assign('jxzx_username',$jxzx_username);
		$this->assign('wxzx_n',$wxzx_n);
		$this->assign('wxzx_name',$wxzx_name);
		$this->assign('wxzx_phone',$wxzx_phone);
		$this->assign('wxzx_time',$wxzx_time);
		$this->assign('user_username',$user_username);
		$this->assign('arr10',$arr10);
		$this->assign('arr8',$arr8);
		$this->assign('arr9',$arr9);
		$this->assign('question',$question);
		$this->assign('plan',$plan);
		$this->assign('c',$c);
		$this->assign('b',$b);
		$this->assign('v',$v);
		$this->assign('e',$e);
		$this->assign('arr',$arr);
		$this->assign('r',$r);
		$this->display();
		
	}
	public function peijiana(){//师傅的仓库
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$db=M('cangku');
		$model_id=I('get.model_id');
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$arr6=$db->where("user_id='$user_id'")->select();
		//$cpk_id='';
		foreach ($arr6 as $v=>$k) {
		   $cpk_id.=','.$k['cpk_id'];
		}
	$cpk_id=substr($cpk_id,1);
		$mysql=M('chanpinku');
		$my=M('maintenance_model');
		$arr3=$my->where("model_id in ($model_id)")->select();
		foreach ($arr3 as $v=>$k) {
		   $brand_id.=','.$k['brand_id'];
		}
			 $brand_id=substr($brand_id,1);
		$m=M('maintenance_brand');
		$arr4=$m->where("brand_id='$brand_id'")->select();	
		$arr=$mysql->where("cpk_id in($cpk_id) and model_id='$model_id'")->select();
		if($arr){
		
		$b="<input type='submit' value='确认'>";
		}
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
		}
		}
		
		$this->assign('numss',$numss);
		$this->assign('arr3',$arr3);
		$this->assign('arr',$arr);
		$this->assign('arr4',$arr4);
		$this->assign('b',$b);
		$this->display();
	}
	public function tjjj(){	//添加所需要的配件
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		
		$id=$_POST['id'];
		$wxfy=$_POST['wxfy'];//die;echo 
		$cangku_id=$_POST['cangku_id'];//die;echo 
		$sql=M('goods');
		$arr6=$sql->where("id='$id'")->find();
			$cpk_namee=$arr6['cpk_namee'];
			$wxfy=$arr6['wxfy'];
			if($cpk_namee || $wxfy){
				$this->success('您已经提交过了!',__CONTROLLER__.'/daiwancheng',3);
			}else{
		$cppk_id=$_POST['cppk_id'];
		$cangku_id=implode(',',$cangku_id);
		$cppk_id=implode(',',$cppk_id);
	if($cangku_id){
		$my=M('cangku');
		$arr3=$my->where("cangku_id in($cangku_id)")->select();
			foreach ($arr3 as $k=>$v){
			 $cpk_id.=','.$v['cpk_id'];
			}
			$cpk_id=substr($cpk_id,1);
		$mysql=M('chanpinku');
		$arr=$mysql->where("cpk_id in ($cpk_id)")->select();
	
	if($cppk_id){
		$arr4=$mysql->where("cpk_id in ($cppk_id)")->select();
			foreach ($arr4 as $k=>$vv){
			 $price+=$vv['cpk_price'];
			}
		foreach ($arr as $k=>$v){
			 $cpk_name.=','.$v['cpk_name'];
			
			 $post['amount']=$amount+=$v['cpp_price'];
		}
		$wxfy=$_POST['wxfy'];
			$post['amount']=($post['amount']-$price)+$wxfy;//配件的价格
			$post['amounttt']=($amount-$price)+$wxfy;
			$post['cppk_id']=$cppk_id;//回收的配件
			$post['cangku_id']=$cangku_id;//用到仓库的配件
			$post['cpk_namee']=$cpk_id;
			$post['wxfy']=$wxfy;
			//需要的配件
		}else{
			//没有回收的配件
			foreach ($arr as $k=>$v){
			 $cpk_name.=','.$v['cpk_name'];
			
			 $post['amount']=$amount+=$v['cpp_price'];
			}
			$wxfy=$_POST['wxfy'];
			 $post['amount']=$post['amount']+$wxfy;//die;echo
			$post['amounttt']=$amount+$wxfy;
			$post['cpk_namee']=$cpk_id;
			$post['cangku_id']=$cangku_id;
			$post['wxfy']=$wxfy;

		}
			$arr1=$sql->where("id='$id'")->save($post);
			if($arr1){
				//跳转到下一个服务状态
				$ryt['zta']=9;
				$fdg=$my->where("cangku_id in($cangku_id)")->save($ryt);
				if($fdg){
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
				 }
			}else{
			  $this->error('修改失败');
			 }
			
			}else{
			$wxfy=$_POST['wxfy'];
			$post['amount']=$wxfy;
			$post['amounttt']=$wxfy;
			$post['wxfy']=$wxfy;//die;echo 
			$arr1=$sql->where("id='$id'")->save($post);
			if($arr1){
				
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
				 
			}else{
			  $this->error('修改失败');
			 }
			}
			
		}
	 }
	}
}
	public function jcqq(){
		//修后检测的时间
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			$id=$_GET['id'];
			$sql=M('zt_time');
			$arr==$sql->where("goods_id='$id'")->find();
			if($arr['ho_time']){
				$this->success('您已经提交过了!',__CONTROLLER__.'/daiwancheng',3);
			}else{
			$data['ho_time']=date('Y-m-d H:i:s', time());
			$arr1=$sql->where("goods_id='$id'")->save($data);	
			if($arr1){
				 header('location:'. __CONTROLLER__."/xhjc/id/{$id}");
			}else{
			  $this->error('修改失败');
			 }
			}
	}
	}
	}
public function jcq(){
	//维修前检测的时间
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			$id=$_GET['id'];
			$sql=M('zt_time');
			$arr==$sql->where("goods_id")->find();
			if($arr['qo_time']){
				$this->success('您已经提交过了!',__CONTROLLER__.'/daiwancheng',3);
			}else{
			$dd=$_GET['dd'];
			$data['qo_time']=date('Y-m-d H:i:s', time());
			$arr1=$sql->where("goods_id='$id'")->save($data);
			if($arr1){
				 header('location:'. __CONTROLLER__."/xqjc/id/{$id}");
			}else{
			  $this->error('修改失败');
			 }
			}
	}
}
}
	public function xqjcc(){
		//检测内容
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		 $id=$_GET['id'];
		 $mysql=M('goods');
		 $arr=$mysql->where("id='$id'")->find();
		 $model_id=$arr['model_id'];
		 $sql=M('maintenance_model');
		 $arr1=$sql->where("model_id='$model_id'")->find();
		 $jc_id= $arr1['jc_id'];
		 $sq=M('jiance');
		 $arr2=$sq->where("jc_id in($jc_id)")->select();
		 $this->assign('arr2',$arr2);
		 $this->assign('id',$id);
		 $this->display();
		}
		}
	}
		//检测内容
	public function xqjc(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		 $id=$_GET['id'];
		 $mysql=M('goods');
		 $arr=$mysql->where("id='$id'")->find();
		 $model_id=$arr['model_id'];
		 $sql=M('maintenance_model');
		 $arr1=$sql->where("model_id='$model_id'")->find();
		 $jc_id= $arr1['jc_id'];
		 $sq=M('jiance');
		 $arr2=$sq->where("jc_id in(1,2,3,4,5,6,7,8,9,10,11)")->select();
		 $arr3=$sq->where("jc_id in(12,13,14,15,16,17,18,19,20,21,22)")->select();
		 $this->assign('arr3',$arr3);
		 $this->assign('arr2',$arr2);
		 $this->assign('id',$id);
		 $this->display();
		}
		}
	}
	public function tj(){
	//在订单添加检测内容
	if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		 $id=$_POST['id'];
		 $jcid=$_POST['jc_id'];
		 $mysql=M('goods');
		  $arr6=$mysql->where("id='$id'")->find();
		 //$arr6['xqjc'];//die; echo 
		if($arr6['xqjc_id']){
			$this->success('您已经提交过了!',__CONTROLLER__.'/daiwancheng',3);
		}else{
			
		  $post['xqjc_id']=implode(',',$jcid);
		
		 $arr=$mysql->where("id='$id'")->save($post);
		 if($arr){
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");;
			}else{
			  $this->error('修改失败');
			 }
			}
	}
	}
	}
	public function gdhfadd(){
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
			
	
			
			 $post['gdhf_name']=$us_name=$yanzheng['user_username'];
			$post['goods_id']=$id=I('post.id');
			$mysql=M('goods');
			$arr1=$mysql->where("id='$id'")->find();
		//	$ddh=$arr1['ddh'];
		//	$user_id=$arr1['user_id'];
			$post['gdhf_content']=$gdhf_content=I('post.gdhf_content');
			$post['gdhf_time']=$time=date('Y-m-d H:i:s', time());
			$post['gdhf_type']=2;
			$sql=M('gdhf');
			$arr=$sql->add($post);
			$my=M('gdhf');
			$arrg1=$my->where("goods_id='$id' and gdhf_type='1'")->select();
			$arrg2=$my->where("goods_id='$id' and gdhf_type='2'")->select();
			$arrg3=$my->where("goods_id='$id' and gdhf_type='3'")->select();
		
		}
		}
		$this->assign('arrg1',$arrg1);
		$this->assign('arrg2',$arrg2);
		$this->assign('arrg3',$arrg3);
		$this->display();
}
	public function tjj(){
		//修后检测的提交
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		header("Content-type: text/html; charset=utf-8");
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$id=$_POST['id'];//die;echo 
		  $mysql=M('goods');
		 $arr6=$mysql->where("id='$id'")->find();
		 $user_id=$arr6['user_id'];
		// echo $arr6['xhjc'];die;
		if($arr6['xhjc_id']){
			$this->success('您已经提交过了!',__CONTROLLER__.'/daiwancheng',3);
		}else{
		 $jcid=$_POST['jc_id'];
		 $post['xhjc_id']=implode(',',$jcid);//echodie;
		 $post['stau']=4;
		 $arr=$mysql->where("id='$id'")->save($post);
		 if($arr){
			$userr=M('m_user');
			$yu['sfzt']=1;
			$arr12=$userr->where("user_id='$user_id'")->save($yu);
			if($arr12){
			 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
			}else{
			 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
			}
		 }
		}
	}
	}
	}
	public function xhjc(){
		//修后检测的内容
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		 $id=$_GET['id'];
		 $mysql=M('goods');
		 $arr=$mysql->where("id='$id'")->find();
		 $model_id=$arr['model_id'];
		 $sql=M('maintenance_model');
		 $arr1=$sql->where("model_id='$model_id'")->find();
		 $jc_id= $arr1['jc_id'];
		 $sq=M('jiance');
		 $arr2=$sq->where("jc_id in(1,2,3,4,5,6,7,8,9,10,11)")->select();
		 $arr3=$sq->where("jc_id in(12,13,14,15,16,17,18,19,20,21,22)")->select();
		 }
		 }
		 $this->assign('arr3',$arr3);
		 $this->assign('arr2',$arr2);
		 $this->assign('id',$id);
		 $this->display();
		
	}
		public function qiangdan(){
		//print_r();die;
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
		$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$id=$_POST['id'];
		 $stau=$_POST['stau'];
		$mysql=M('goods');
		$arr=$mysql->where("id='$id'")->find();
		$stau=$arr['stau'];
		$user_id=$arr['user_id'];
		$u_phone=$stau=$arr['u_phone'];
		$fk=$arr['fk'];
		if(($user_id > 0) || $fk==110){
			$this->success('此单被抢走，下次快点啊!',__CONTROLLER__.'/daiwancheng',1);
		}else{
		$username=$_COOKIE['username'];
		$sql=M('m_user');
		$arr1=$sql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_id=$arr1['user_id'];
		$post['stau']=2;
		$post['user_id']=$user_id;
		$user_username=$arr1['user_username'];
		$user_name=$arr1['user_name'];
		//修改抢单成功的状态
		$arr2=$mysql->where("id='$id'")->save($post);
		if($arr2){
		$sql=M('zt_time');
		$data['po_time']=date('Y-m-d H:i:s', time());//派单接单的时间
		$data['jo_time']=date('Y-m-d H:i:s', time());
		$arr7=$sql->where("goods_id='$id'")->save($data);
		if($arr7){
				$url = 'http://sms.jiangukj.com/SendSms.aspx?';
				header("Content-type: text/html; charset=utf-8");
				$data = array('action' => 'code',
				'username' => 'bjjxsg',
				'userpass' => '7bi58n',
				'mobiles' => $u_phone,
				'content' => $user_username.'|'.$user_name,
				'codeid' =>'4348',
				);
				$db = new UtilController();
				$result = $db->request($url, 'POST',$data);
			 header('location:'. __CONTROLLER__."/daiwancheng");
		}
		}
		
	}
		}
		}
		}
	public function jiedan(){
		//接单
		if(empty($_COOKIE['username'])){
			header('location:'.__MODULE__.'/Shifu/mima');
		}else{
			$username=$_COOKIE['username'];
		$yz=M('m_user');
		$yanzheng=$yz->where("user_name='$username' and sfzt in(1,2,3)")->find();
		$user_username=$yanzheng['user_username'];
		if(!$yanzheng){
			$this->error('非法操作');
		}else{
		$id=$_POST['id'];
		$mysql=M('goods');
	
		$arry=$mysql->where("id='$id'")->find();

		$stau=$arry['stau'];
		$u_phone=$arry['u_phone'];
		$user_id=$arry['user_id'];
		//$fk=$arry['fk'];
	//	if(($user_id > 0) || $fk==110){
		//	$this->success('此单被抢走，下次快点啊!',__CONTROLLER__.'/shifu',1);
	//	}else{

		$sql=M('zt_time');
		$yanzhenga=$sql->where("goods_id='$id'")->find();
		if($stau==1){
			$stau=2;
			$post['stau']=$stau;
			$sql=M('zt_time');
			$url = 'http://sms.jiangukj.com/SendSms.aspx?';
				header("Content-type: text/html; charset=utf-8");
				$data = array('action' => 'code',
				'username' => 'bjjxsg',
				'userpass' => '7bi58n',
				'mobiles' => $u_phone,
				'content' => $user_username.'|'.$username,
				'codeid' =>'4348',
				);
				$db = new UtilController();
				$result = $db->request($url, 'POST',$data);
		if($yanzhenga['jo_time']){
			$this->success('您已经提交过了!',__CONTROLLER__.'/daiwancheng',3);
		}else{
		 $data['jo_time']=date('Y-m-d H:i:s', time());//接单时间
		 $arr1=$sql->where("goods_id='$id'")->save($data);
		 }
			if($arr1){
			$mysql=M('goods');
				//修改刚接单后的状态
				$arr=$mysql->where("id='$id'")->save($post);
				if($arr){
					 header('location:'. __CONTROLLER__."/daiwancheng");
				}else{
				  $this->error('修改失败');
				 }
			
			}
		}else if($stau==2){
			//接单后的状态开始服务
			 $stau=3;
			$post['stau']=$stau;
			$sql=M('zt_time');
			if($yanzhenga['ko_time']){
			$this->success('您已经提交过了!',__CONTROLLER__.'/daiwancheng',3);
			}else{
			//服务开始时间
			$data['ko_time']=date('Y-m-d H:i:s', time());
			//更新时间状态
			$arr1=$sql->where("goods_id='$id'")->save($data);
			$user_name=$_COOKIE['username'];
				$userr=M('m_user');
				$datat['sfzt']=2;
				//更新服务状态
				$userr->where("user_name='$user_name' and sfzt in(1,2,3)")->save($datat);
				}
		}else if($stau==3){//服务中的状态,
			$stau=3;
			$post['stau']=$stau;
			$pp=M('goods');
			$po=$pp->where("id='$id'")->find();
		if($po['cpk_namee'] || $po['wxfy']){//判断是否添加了配件
			//修后检测的地址
				header('location:'. __CONTROLLER__."/jcqq/stau/{$stau}/id/{$id}");
			}else if($po['xqjc_id']){//判断是否修前检测过
				//添加维修需要的产品地址
				header('location:'. __CONTROLLER__."/chanpin/stau/{$stau}/id/{$id}");
			}else{
				//修前检测地址
				header('location:'. __CONTROLLER__."/jcq/stau/{$stau}/id/{$id}");
		}
		}else if($stau==4){
		
			 header('location:'. __MODULE__."/payy/index/id/{$id}"); 
		
		}
		
			$mysql=M('goods');
			//修改状态
			$arr=$mysql->where("id='$id'")->save($post);
			if($arr){
				 header('location:'. __CONTROLLER__."/daiwanchengxq/id/{$id}");
			}else{
			  $this->error('修改失败');
			 }
	
	
	}
	}
	}
	 public function tuichua(){
	   //师傅退出登录
           cookie('username',null);  //清空cookie
		   header('location:'. __CONTROLLER__.'/mima');   
   }
   public function mima(){
		 $this->display();
	}
	
	public function chem(){
		//师傅登陆的验证
	$pwd=I('get.pwd');
	$username=I('get.username');
		$mysql=M('m_user');
		$re=$mysql->where("user_name='$username' and sfzt in(1,2,3)")->find();
		if($re){
			if($re['pwd']===$pwd){
					cookie('username',$username,3600*24*100);
			}else{
			echo "1";
			}
			}else{
			echo "2";
			}
	}


}
?>