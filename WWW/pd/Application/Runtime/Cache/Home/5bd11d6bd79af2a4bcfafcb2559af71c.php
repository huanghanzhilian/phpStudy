<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

     <div class="row" id="xxdz">
         <label class="bqf">街道：</label><div class="rootu"><input type="text" class="" name="address" id="address" onFocus="NEW_L()" onBlur="NEW_c()" placeholder="收件人所在的街道及门牌号"></div>
      </div>



	<!--<span id="xxdz"><input type="text" class="txt" name="address" id="address" placeholder="<?php echo ($t); ?>"/></span>-->
				<!--<span style=''id='f'>
					<select name="wxzx_id" id='wxzx_id'>
						<?php if(is_array($arr9)): foreach($arr9 as $key=>$gf): ?><option value="<?php echo ($gf["wxzx_id"]); ?>">
								<?php echo ($gf["wxzx_name"]); endforeach; endif; ?>
					</select>
				</span>-->
				<input type="hidden" name="ways_id" id='ways_id' value='3'>
</body>
</html>