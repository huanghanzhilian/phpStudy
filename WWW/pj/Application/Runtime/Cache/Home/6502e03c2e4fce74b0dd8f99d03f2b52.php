<?php if (!defined('THINK_PATH')) exit();?>
<div class="Maskc_box">
    <div class="lili_c_ico"><p></p><span></span></div>
            <ul class="lili_c_ico_dv">
			<form id="chuannko" method="post" action="/Home/Gouwuche/baosunadd" onSubmit="return Checkedr()">
				
		
                <?php if(is_array($arr10)): foreach($arr10 as $key=>$kk): ?><li class="my_bu_x">
                    <div class="funb_r">
                        <span class="nudt_1_r"><?php echo ($kk["cpk_price"]); ?>元</span><input class="chmn_dmk" type="radio" name="cangku_id" value='<?php echo ($kk["cangku_id"]); ?>'><em class="zhiem"></em>
                        
                    </div>
                    <div class="nudt_2"><span class="nudt_1_l"><?php echo ($kk["cangku_name"]); ?></span></div>
                    
                    </li><?php endforeach; endif; ?>
                    
                    <!--nav固定-->
                    <div class="nav_gd nav_gddd">
                        <div class="nudt_1a cunmgy">
                            <li class="nudt_1_rc nudt_1_rc2">
                                <a href="javascript:void(0)" onClick="bbmut('baosunadd')">报损</a>
                            </li>
                            <li class="nudt_1_rc nudt_1_rc2" onClick="bbmut1('maichu')">
                                <a href="javascript:void(0)">卖出</a>
                            </li>
                            <li class="nudt_1_rc nudt_1_rc2">
                                <a href="javascript:void(0)" onClick="bbmut2('tuihuo')">退货</a>
                            </li>
                        </div>
                    </div>
                    <!--nav固定-->
                
                <button style="display:none" class="submit_sd" type="submit">提交</button>
                	
				</form>
            </ul>
</div>