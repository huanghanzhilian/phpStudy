<?php if (!defined('THINK_PATH')) exit(); if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="" id="<?php echo ($kk["questiontype_id"]); ?>">
                    <div class="zhuti_rom_list_r fr">
                        <form style="display:inline-block; margin-right:35px;" method="post" action="/Admin/Shangpin/upadd" enctype="multipart/form-data">
                        <span class="Return_button_a1 bccdrefd">
                            
                                <input type="file" name="imgg">
                                <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                                <input type="hidden" name="questiontype_id" value='<?php echo ($kk["questiontype_id"]); ?>'>
                                
                            
                            <img class="inh_iconnm"src="/Public/<?php echo ($kk["imgg"]); ?>" alt="无" width=50 height=50 />
                        </span>
                        <input class="bcbza" type="submit"  value='上传'>
                        </form>
                        
                        <form style="display:inline-block; margin-right:35px;" method="post" action="/Admin/Shangpin/upaddd" enctype="multipart/form-data">
                        <span class="Return_button_a1 bccdrefd">
                            
                                <input type="file" name="imgg">
                                <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                                <input type="hidden" name="questiontype_id" value='<?php echo ($kk["questiontype_id"]); ?>'>
                                
                            
                            <img class="inh_iconnm"src="/Public/<?php echo ($kk["imggg"]); ?>" alt="无" width=50 height=50 />
                        </span>
                        <input class="bcbza" type="submit"  value='上传'>
                        </form>
                        
                        
                        
                        <a class="Return_button_a1" href="/Admin/Shangpin/xwt/questiontype_id/<?php echo ($kk["questiontype_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">关联小问题</a>
                        <span class="vbcxv">
                            <a class="shang_up" href='javascript:void(0)'onclick='as1(<?php echo ($kk["questiontype_id"]); ?>,this)'></a>
                            <a class="xia_up" href='javascript:void(0)'onclick='as2(<?php echo ($kk["questiontype_id"]); ?>,this)'></a>
                        </span>
                        
                    </div>
                        <a class="zjnmk_pp" style="float:none; display:inline-block;" href="/Admin/Shangpin/wtshanchu/questiontype_id/<?php echo ($kk["questiontype_id"]); ?>/brand_id/<?php echo ($brand_id); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                        
                        <form style="display:inline-block;" method="post" action="/Admin/Shangpin/questiontypeup">
                            <strong class="buctrese">
                                
                                <input style="width:90px;" readonly="true" class="xiubuttce xiubuttce_as1" type="text" name="questiontype_name" value='<?php echo ($kk["questiontype_name"]); ?>'>
                            
                                <span class="mzsaw mzsaw_cc1">
                                    <input style="display:none; background:#fff;" class="Return_button_a1" type="submit" value='确定'>
                                    <span class="btn_xiuga btrui cursor">修改</span>
                                    <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                                </span>
                            </strong>
                            <input type="hidden" name="questiontype_id" value='<?php echo ($kk["questiontype_id"]); ?>'>
                            <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
                            <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                            <input type="hidden" name="brand_id" id='brand_id' value='<?php echo ($brand_id); ?>'>
                        </form>
                        
                   
                </li><?php endforeach; endif; ?>