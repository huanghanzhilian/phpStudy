<?php if (!defined('THINK_PATH')) exit();?><div class="ceomer_com">
      <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><h1 class="da_con_ce">订单编号：<?php echo ($kk["ddh"]); ?></h1>
    <div class="rnmbur rnmbur_c">
        <ul>
            <li>
                 买方：<span class="chuangmbr">
                         <?php echo ($kk["maifang"]); ?>
                      </span>
                      <span class="bimnb fr"></span>
            </li>
            <li>
                 金额：<span class="chuangmbr">
                         <?php echo ($kk["amount"]); ?>元  
                      </span>
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
                <span class="chuangmbr"><?php echo ($kk["cangku_name"]); ?></span><span class="bimnb fr">成本:<?php echo ($kk["cpk_price"]); ?>元</span>
            </li>
			
        </ul>
    </div><?php endforeach; endif; ?>
</div>