<?php if (!defined('THINK_PATH')) exit();?><!--<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
		<table border=1>
			<th>商品</th>
			<th>商品名称</th>
			<th>价格</th>
			<th>购买数量</th>
			<th>详情</th>
			<th>操作</th>
		<?php if(is_array($arr1)): foreach($arr1 as $key=>$vv): ?><tr>
				<td><img src="/Public/<?php echo ($vv["path"]); ?>" width=70 height=70/></td>
				<td><?php echo ($vv["cpk_name"]); ?></td>
				<td><span id='ddv'><?php echo ($vv["gw_pricee"]); ?></span></td>
				<td>
					<font size=5><a href="javascript:void(0)" onclick="jian(<?php echo ($vv["gw_id"]); ?>);"style="text-decoration:none">-</a>&nbsp&nbsp
					<span id='first<?php echo ($vv["gw_id"]); ?>'><?php echo ($vv["nums"]); ?></span>&nbsp;&nbsp<a href="javascript:void(0)"onclick="jia(<?php echo ($vv["gw_id"]); ?>);"style="text-decoration:none">+</a></font>
				</td>
				<td>开发中....</td>
				<td><a href="javascript:void(0)" onclick='del(<?php echo ($vv["gw_id"]); ?>)'>删除</a></td>
			</tr><?php endforeach; endif; ?>
	</table><br /><br />
	<div><?php echo ($zjg); ?><span id='abc'><?php echo ($price); ?></span>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Home/Gouwuche/querendingdan"><?php echo ($qr); ?></a></div>
	</div>
</body>
</html>-->



<div class="peijian_m">
    <div class="peijian_m_box">
        <ul>
            <?php if(is_array($arr1)): foreach($arr1 as $key=>$vv): ?><li>
                <div class="mkloop_r">
                    <span data="<?php echo ($vv["gw_id"]); ?>" onclick="jian(this,<?php echo ($vv["gw_id"]); ?>);" class="jianqu"></span>
                    <em id='first<?php echo ($vv["gw_id"]); ?>'><?php echo ($vv["nums"]); ?></em>
                    <span onclick="jia(<?php echo ($vv["gw_id"]); ?>);" class="jiadd"></span>
                </div>
                <div class="mkloop_l">
                    <span><?php echo ($vv["cpk_name"]); ?></span>
                    <span class="biansd"><?php echo ($vv["gw_pricee"]); ?>元</span><!--<a href="javascript:void(0)" onclick='del(<?php echo ($vv["gw_id"]); ?>)'>删除</a>-->
                </div> 
            </li><?php endforeach; endif; ?>
            
            
        </ul>
    </div>
</div>