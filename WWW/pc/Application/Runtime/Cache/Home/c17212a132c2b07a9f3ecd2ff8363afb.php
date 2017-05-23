<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>

</head>
					
					 
						
						 <!---->
                       <div class="tc_dizhi" id="tc_dizhi"  >
                           <div class="tc_dizhi_top">
                            <span></span>
                            <h1 id="dat_sj">请选择</h1>
                           </div>
						<ul id="slm" class="on">
                        
                        
                           <input type="hidden" name="ways_id" id='ways_id' value='<?php echo ($ways_id); ?>'>
						<?php if(is_array($arr4)): foreach($arr4 as $key=>$vv): ?><li><a href='javascript:void(0)'onclick='ajaxsheng(<?php echo ($vv["region_id"]); ?>)'><?php echo ($vv["region_name"]); ?></a></li><?php endforeach; endif; ?>
                        
                        </ul>
                        
                        </div>
					
				
                
       <script>
//位置






				/* $("#cxjz").click(function(event){
					$(".dfgh").remove();
					$(".Maskc1").css({'display':'block'});
					$(".tc_dizhi").css({'display':'block'});
					$("#slm").css({'display':'block'});
					event.stopPropagation();
				})
				
				$(".tc_dizhi>span").click(function(event){
					$(".Maskc1").css({'display':'none'});
					$(".tc_dizhi").css({'display':'none'})
					event.stopPropagation();
				})*/
</script>
                
                
			
			
		
			
				
				
</html>