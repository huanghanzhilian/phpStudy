<?php if (!defined('THINK_PATH')) exit();?><div class="ceomer_com">
        <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><h1 class="da_con_ce">订单编号：<?php echo ($kk["ddh"]); ?>
        <span class="shifu_qx">
             <?php if(strtoupper($kk['zt']) == 0): ?><a href="/Home/Gouwuche/quxiaomaichu/id/<?php echo ($kk["id"]); ?>/cangku_id/<?php echo ($kk["cangku_id"]); ?>" onclick="if(confirm('确定取消?')==false)return false;">取消订单</a>
             <?php elseif(strtoupper($kk['zt']) == 1): ?> 
                    已付款
                <?php else: endif; ?>
        </span>
    </h1>
    
    
    <div class="rnmbur rnmbur_c">
        <ul>
            <li>
                 买方：<span class="chuangmbr">
                         <?php echo ($kk["maifang"]); ?>
                      </span>
                      <span class="bimnb fr"></span>
            </li>
            <li>
                金额：<span class="chuangmbr"><?php echo ($kk["amount"]); ?>元</span>
            </li>
            <li>
                 <span class="chuangmbr">
                        <?php echo ($kk["cpk_name"]); ?>
                      </span>
            </li>
            <li>
                <span class="desc">
                  
                </span>
            </li>
            
            <li>
                金额：<span class="chuangmbr"><?php echo ($kk["cangku_name"]); ?></span><span class="bimnb fr">成本:<?php echo ($kk["cpk_price"]); ?>元</span>
            </li>
        </ul>
		  <?php if(strtoupper($kk['zt']) == 0): ?><div class="fukk_lan">
               <a href="/Home/Payy/maichu/ddh/<?php echo ($kk["ddh"]); ?>"> 付款</a>
			</div>
          <?php elseif(strtoupper($kk['zt']) == 1): ?> 
               <div class="fukk_lan fukk_lan_c">
              <a href="javascript:void(0)">已付款</a>
		    	</div>
             <?php else: endif; ?>
    </div><?php endforeach; endif; ?>
</div>