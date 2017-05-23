<?php if (!defined('THINK_PATH')) exit();?><li class="">
                <div class="zhuti_rom_list_r fr zhuti_rom_list_r_a1c" style="width:405px;">
                    <span class="mzsaw">
                        师傅价格
                    </span>
                    <span class="mzsaw">
                       用户价格
                    </span>
                    <span class="mzsaw">
                        是否回收
                    </span>
                    <span class="mzsaw">
                        维修说明
                    </span>
                </div>
                <strong class="buctrese">产品名称</strong>
            </li>
            <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><li id="<?php echo ($v["cpk_id"]); ?>" class="">
                    <form method="post" action="/Admin/Shangpin/chanpinupp">
                        <div class="zhuti_rom_list_r fr zhuti_rom_list_r_a1c" style="width:405px;">
                                            
                        <span class="mzsaw">
                            <input readonly="true" class="xiubuttce" type="text" name="cpk_price" value='<?php echo ($v["cpk_price"]); ?>' autocomplete="off">
                        </span>
                        <span class="mzsaw">
                            <input readonly="true" class="xiubuttce" type="text" name="cpp_price" value='<?php echo ($v["cpp_price"]); ?>' autocomplete="off">
                        </span>
                        <span class="mzsaw mmbucts">
                            <input readonly="true" class="xiubuttce" type="text" name="sf" value='<?php echo ($v["sf"]); ?>' autocomplete="off">
                        </span>
                        <span class="mzsaw mzsaw_cc1">
                            <input style="display:none; background:#fff;" class="Return_button_a1" type="submit" value='确定'>
                            <b class="Return_button_a1 btn_xiuga">修改</b>
                            <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                        </span>
                        <span class="vbcxv">
                            <a class="shang_up" href='javascript:void(0)'onclick='as1(<?php echo ($v["cpk_id"]); ?>,this)'></a>
                            <a class="xia_up" href='javascript:void(0)'onclick='as2(<?php echo ($v["cpk_id"]); ?>,this)'></a>
                        </span>
                        </div>
                        <a class="zjnmk_pp" style="float:none; display:inline-block;" href="/Admin/Shangpin/chanpinshanchu/cpk_id/<?php echo ($v["cpk_id"]); ?>/model_id/<?php echo ($model_id); ?>/brand_id/<?php echo ($brand_id); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                        <strong class="buctrese">
                            <input readonly="true" class="xiubuttce xiubuttce_as1" style="text-align:left; width:260px;" type="text" name="cpk_name" value='<?php echo ($v["cpk_name"]); ?>' autocomplete="off">
                        </strong>
                        <!--<input type="hidden" name="cpk_id" value='<?php echo ($v["cpk_id"]); ?>'>-->
                        <input type="hidden" name="model_id" id="model_id" value='<?php echo ($model_id); ?>'>
                        <input type="hidden" name="brand_id" id="brand_id" value='<?php echo ($brand_id); ?>'>
                        
                    </form> 
                </li><?php endforeach; endif; ?>