<?php if (!defined('THINK_PATH')) exit(); if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="clearfix" id="<?php echo ($kk["pai"]); ?>">
                    
                    
					 
                     
                     
                     
                     
                     
                     <div class="zhuti_rom_list_r fr" style="width:130px;">
                         <a class="zjnmk_pp" href="/Admin/Shangpin/brandshanchu/brand_id/<?php echo ($kk["brand_id"]); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                         <span class="vbcxv vbcxv_pp">
                             <a class="shang_up" href='javascript:void(0)'onclick='as1(<?php echo ($kk["pai"]); ?>,this)'></a>
                             <a class="xia_up" href='javascript:void(0)'onclick='as2(<?php echo ($kk["pai"]); ?>,this)'></a>
                         </span>
                         <input type="hidden" name="type_id" value='<?php echo ($type_id); ?>' id='type_id'>
                     </div>
                     
                     <a class="bvbawe" href="/Admin/Shangpin/model/brand_id/<?php echo ($kk["brand_id"]); ?>">
                        <!-- <strong class="buctrese"><?php echo ($kk["brand_name"]); ?></strong><b class="buctrese_lian bvbawennb">修改</b>-->
                         <span class="bvbaw">
                         <form class="" style="display:inline-block;" method="post" action="/Admin/Shangpin/model_nameup">
                            <strong class="buctrese">
                                
                                <input readonly="true" class="xiubuttce xiubuttce_as1 bvbaw" style="text-align:left; width:80px;" type="text" name="model_name" value='<?php echo ($kk["brand_name"]); ?>'>
                            
                                <span class="mzsaw mzsaw_cc1">
                                    <input style="display:none; background:#fff;" class="Return_button_a1" type="submit" value='确定'>
                                    <span class="btn_xiuga btrui cursor bvbawennb">修改</span>
                                    <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                                </span>
                            </strong>
                            <input type="hidden" name="model_id" value='<?php echo ($kk["model_id"]); ?>'>
                           <!-- <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>-->
                            <input type="hidden" name="brand_id" id='brand_id' value='<?php echo ($brand_id); ?>'>
                        </form>
                        </span>
                         
                         
                         
                     </a>
                     
                </li><?php endforeach; endif; ?>