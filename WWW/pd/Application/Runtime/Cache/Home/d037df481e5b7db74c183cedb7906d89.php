<?php if (!defined('THINK_PATH')) exit();?> <div class="ceomer_com ceomer_com_2c">
            <?php if(is_array($arr)): foreach($arr as $key=>$k): ?><h1 class="da_con_ce">订单编号：<?php echo ($k["ddh"]); ?><!--<span class="shifu_qx">取消订单</span>--></h1>
            <div class="rnmbur rnmbur_c">
                <ul>
                    <li>
                         金额：<span class="chuangmbr">
                                 <?php echo ($k["cpk_price"]); ?>元  
                              </span>
                    </li>
                    <li>
                         <span class="chuangmbr">
                                 <?php echo ($k["cpk_name"]); ?>
                              </span>
                    </li>
                    <li>
                       <span class="chuangmbr">
                                 <?php echo ($k["time"]); ?>
                              </span>
                    </li>
                    
                </ul>
            </div><?php endforeach; endif; ?>
        </div>
    
    
	</div>
    
    
    
    </div>