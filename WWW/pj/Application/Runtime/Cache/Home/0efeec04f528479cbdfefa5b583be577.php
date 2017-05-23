<?php if (!defined('THINK_PATH')) exit();?>
	<!--<?php if(is_array($arr)): foreach($arr as $aa=>$kk): ?>订单号:<?php echo ($aa); ?> <br />
		商品:<br />
		<?php if(is_array($kk)): foreach($kk as $key=>$cc): echo ($cc["cpk_name"]); ?> <br /><?php endforeach; endif; ?> 已完成 <br /> <br /><?php endforeach; endif; ?>	-->
    
    
    <div class="ceomer_com">
    <?php if(is_array($arr)): foreach($arr as $aa=>$kk): ?><a class="shifu_aclc" href="/Home/Gouwuche/peijian_xqyfk">
        <div class="rnmbur">
            <ul>
                <li>
                     方式：<span class="chuangmbr">
                              配件邮寄
                          </span>
                          <span class="bimnb fr"><?php echo ($aa); ?></span>
                </li>
                <li>
                     商品：<span class="chuangmbr">
                               
                          </span>
                </li>
                <li>
                    <span class="desc">
                        <?php if(is_array($kk)): foreach($kk as $key=>$cc): echo ($cc["cpk_name"]); ?><br><?php endforeach; endif; ?>
                    </span>
                </li>
                
                <li>
                     已完成
                </li>
            </ul>
        </div>
    </a><?php endforeach; endif; ?>
    </div>