<?php if (!defined('THINK_PATH')) exit();?>
    
    
    <div class="ceomer_com">
    <?php if(is_array($arr)): foreach($arr as $aa=>$kk): ?><div class="rnmbur rnmbur_cm">
            <ul>
                <li>
                     <span class="chuangmbr">
                        
                     
						  
                    
                          </span>
                          <span class="bimnb fr"><?php echo ($aa); ?></span>
                </li>
                <li>
                     商品：<span class="chuangmbr">
                             
                          </span>
                </li>
                <li>
                    <span class="desc">
                        <?php if(is_array($kk)): foreach($kk as $key=>$cc): echo ($cc["cpk_name"]); ?> <br /><?php endforeach; endif; ?>
                    </span>
                </li>
                
                <li>
                     <span class="bimnb fr"><?php echo ($cc["xd_time"]); ?> </span>
					 <span class="chuangmbrmo">总价格：<?php echo ($cc["amount"]); ?> 元 </span>
                </li>
            </ul>
            <a class="shifu_aclc nubbc_nu" href="/Home/Gouwuche/peijian_xiangq/id/<?php echo ($cc["id"]); ?>"></a>
        </div>
		<div class="muucdrt_con">
			<a data="<?php echo ($shanchu); ?>" class="muucdrt" href='javascript:void(0)'onclick='de(<?php echo ($cc["id"]); ?>)'><!--<?php echo ($shanchu); ?>--></a>
        </div><?php endforeach; endif; ?>
    </div>