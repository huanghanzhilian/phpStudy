<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
					<!--<span style=''id='f'>
					<select name="sheng" id='sheng' onchange='ajaxsheng()'>
						<option value="省">
							省
						</option>
						<?php if(is_array($arr4)): foreach($arr4 as $key=>$vv): ?><option value="<?php echo ($vv["region_id"]); ?>">
								<?php echo ($vv["region_name"]); ?>
							</option><?php endforeach; endif; ?>
					</select>
				</span>
				<span id='s'>		
				</span>
				<span id='ss'>		
				</span><br />
				<label>详细地址:</label>
				<span><input type="text" class="txt" name="address" id="address"/></span>
				
				<input type="hidden" name="ways_id" id='ways_id' value='1'><br /><br />-->
				<!-- <a href='javascript:void(0)'onclick='sma(2)'>预约时间：</a><br /><br/><div id='sma'></div> -->
                <!--<div class="row">
                    <label class="bqf">地 址：</label><em>地图定位</em>
                </div>-->
                <div class="row" id="dsj">
                    <i class="addr_ass"></i>
                    <label class="bqf">时间：</label><div class="rootu"><em id="my_droce">请选择上门时间范围</em></div>
                </div>
				<input type="hidden" name="ways_id" value='<?php echo ($ways_id); ?>'>
</html>