<?php if (!defined('THINK_PATH')) exit(); if(is_array($arr)): foreach($arr as $key=>$k): ?><li class="" id="<?php echo ($k["question_id"]); ?>" style="padding:0;">
                    <div class="zhuti_rom_list_r fr" style="width:370px;">
                        
                        <a class="zjnmk_pp" href="/Admin/Shangpin/xiaoshanchu/model_id/<?php echo ($model_id); ?>/brand_id/<?php echo ($brand_id); ?>/question_id/<?php echo ($k["question_id"]); ?>/questiontype_id/<?php echo ($questiontype_id); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                        <span class="vbcxv fr">
                            <a class="shang_up" href='javascript:void(0)'onclick='as1(<?php echo ($k["question_id"]); ?>,this)'></a>
                            <a class="xia_up" href='javascript:void(0)'onclick='as2(<?php echo ($k["question_id"]); ?>,this)'></a>
                        </span>
                        <a class="Return_button_a1 fr bcrfgt" href="/Admin/Shangpin/ghjiejuefangan/model_id/<?php echo ($model_id); ?>/brand_id/<?php echo ($brand_id); ?>/questiontype_id/<?php echo ($k["questiontype_id"]); ?>/question_id/<?php echo ($k["question_id"]); ?>">更换解决方案</a>
                        <span class="vbcxv_pom"><?php echo ($k["plan_name"]); ?></span>
                        
                    </div>
                    <!--<strong class="buctrese"><?php echo ($k["question_name"]); ?></strong>-->
                    <form class="" style="display:inline-block; margin-right:40px;" method="post" action="/Admin/Shangpin/question_upp">
                        <strong class="buctrese">
                            
                            <input readonly="true" class="xiubuttce xiubuttce_as1 bvbaw" style="text-align:left; width:190px;" type="text" name="question_name" value='<?php echo ($k["question_name"]); ?>'>
                        
                            <span class="mzsaw mzsaw_cc1">
                                <input style="display:none; background:#fff;" class="Return_button_a1" type="submit" value='确定'>
                                <span class="btn_xiuga btrui cursor bvbawennb bvbaw">修改</span>
                                <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                            </span>
                        </strong>
                        <input type="hidden" name="question_id"  value='<?php echo ($k["question_id"]); ?>'>
                        
                        
                        <input type="hidden" name="questiontype_id" id="questiontype_id" value='<?php echo ($questiontype_id); ?>'>
                        <input type="hidden" name="brand_id" id='brand_id' value='<?php echo ($brand_id); ?>'>
                        <input type="hidden" name="model_id" id="model_id"  value='<?php echo ($model_id); ?>'>
                    </form>
                    <span class=""><?php echo ($k["money"]); ?></span>
                </li><?php endforeach; endif; ?>