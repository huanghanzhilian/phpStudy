<?php if (!defined('THINK_PATH')) exit();?>
    <div class="ceomer_com ceomer_com_2c">
            <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><h1 class="da_con_ce da_con_ce2_c">订单编号：<?php echo ($kk["ddh"]); ?><!--<span class="shifu_qx">取消订单</span>--></h1>
            <div class="rnmbur rnmbur_cn rnmbur_c">
                <ul>
                    <li>
                         退货人：<span class="chuangmbr">
                                 <?php echo ($kk["tuihuouser"]); ?>
                              </span>
                              <span class="bimnb fr"><a href='javascript:void(0)'onclick='de({kk.id})'>删除</a></span>
                    </li>
                    <li>
                         金额：<span class="chuangmbr">
                                 <?php echo ($kk["cpk_price"]); ?>元  
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
                    
                   
                </ul>
            </div><?php endforeach; endif; ?>
        </div>