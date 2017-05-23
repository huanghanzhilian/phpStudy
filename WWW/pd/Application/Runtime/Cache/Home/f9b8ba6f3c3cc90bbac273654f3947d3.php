<?php if (!defined('THINK_PATH')) exit();?><div class="Maskc_box">
    <div class="lili_c_ico"><p></p><span></span></div>
            <ul class="lili_c_ico_dv">
                <?php if(is_array($arr2)): foreach($arr2 as $key=>$h): ?><li class="my_bu_x">
                    <div class="funb_r">
                        <span class="nudt_1_r nudt_1_rcc"><?php echo ($h["cpk_price"]); ?></span><i>元</i>
                        <a class="jiadd" href='javascript:void(0)' data="<?php echo ($h["cpk_id"]); ?>" onclick='tjgwc(this,<?php echo ($h["cpk_id"]); ?>);'></a>
                    </div>
                    <div class="nudt_2 nudt_2cunb"><span class="nudt_1_l mobbuet"><?php echo ($h["cpk_name"]); ?></span></div>
                    
                    </li><?php endforeach; endif; ?>
            </ul>
</div>