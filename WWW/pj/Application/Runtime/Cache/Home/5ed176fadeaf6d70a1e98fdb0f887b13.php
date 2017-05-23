<?php if (!defined('THINK_PATH')) exit();?>            <div class="ceomer_com">
                <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a class="shifu_aclc" href="/Home/Shifu/shouhouxq/id/<?php echo ($kk["id"]); ?>">
                        <div class="rnmbur">
                            <ul>
                                <li>
                                     <span class="chuangmbr"><?php echo ($kk["dd"]); ?></span>
                                </li>
                                <li>
                                     机型：<span class="chuangmbr"><?php echo ($kk["model_name"]); ?></span>
                                </li>
                                <li>
                                     故障描述：<span class="chuangmbr"><?php echo ($kk["contentt"]); ?></span>
                                </li>
                            </ul>
                        </div>
                    </a><?php endforeach; endif; ?>
            </div>