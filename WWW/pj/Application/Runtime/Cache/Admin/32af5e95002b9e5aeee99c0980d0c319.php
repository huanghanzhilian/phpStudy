<?php if (!defined('THINK_PATH')) exit();?>
    
    
<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="" id="<?php echo ($kk["model_id"]); ?>">
                    <div class="zhuti_rom_list_r fr">
                        <a class="Return_button_a1" href="/Admin/Shangpin/yanse/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">颜色</a>
                        <a class="Return_button_a1" href="/Admin/Shangpin/xiaowenti/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">问题</a>
                        <a class="Return_button_a1" href="/Admin/Shangpin/fangan/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">解决方案</a>
                        <a class="Return_button_a1" href="/Admin/Shangpin/chanpinkua/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">产品库</a>
                        <!--<a id="<?php echo ($kk["model_id"]); ?>" class="Return_button_a1" href="/Admin/Shangpin/paixu/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">排序</a>-->
                        <span class="vbcxv">
                            <a class="shang_up" href='javascript:void(0)'onclick='as1(<?php echo ($kk["model_id"]); ?>,this)'></a>
                            <a class="xia_up" href='javascript:void(0)'onclick='as2(<?php echo ($kk["model_id"]); ?>,this)'></a>
                        </span>
                        <a class="zjnmk_pp" href="/Admin/Shangpin/modelshanchu/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                    </div>
                    
                        <form style="display:inline-block;" method="post" action="/Admin/Shangpin/model_nameup">
                            <strong class="buctrese">
                                
                                <input readonly="true" class="xiubuttce xiubuttce_as1" style="text-align:left; width:130px;" type="text" name="model_name" value='<?php echo ($kk["model_name"]); ?>'>
                            
                                <span class="mzsaw mzsaw_cc1">
                                    <input style="display:none; background:#fff;" class="Return_button_a1" type="submit" value='确定'>
                                    <span class="btn_xiuga btrui cursor">修改</span>
                                    <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                                </span>
                            </strong>
                            <input type="hidden" name="model_id" value='<?php echo ($kk["model_id"]); ?>'>
                           <!-- <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>-->
                            <input type="hidden" name="brand_id" id='brand_id' value='<?php echo ($brand_id); ?>'>
                        </form>
                    
                   
                </li><?php endforeach; endif; ?>