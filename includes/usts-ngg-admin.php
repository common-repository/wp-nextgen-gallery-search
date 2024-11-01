<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function usts_ngg_reset(){
	  // search box	
      update_option('ngg_search_box_width','200');
      update_option('ngg_search_box_height','30');
      update_option('ngg_search_box_border_color','E2E2E2');      
	  update_option('ngg_search_box_bg_color','F9F9F9');		
	  update_option('ngg_search_box_font_color','090909');
      update_option('ngg_search_box_border_radius','0');        
	  // search button
	  update_option('ngg_search_button_width','100');
	  update_option('ngg_search_button_height','30');
	  update_option('ngg_search_button_border_color','E2E2E2');
	  update_option('ngg_search_button_bg_color1','D9DADA');
	  update_option('ngg_search_button_bg_color2','D9DADA');
	  update_option('ngg_search_button_font_color','FFFFFF');
	  update_option('ngg_search_btn_hov_color1','5D636A');
	  update_option('ngg_search_btn_hov_color2','5D636A');
	  update_option('ngg_search_btn_hov_text_color','FFFFFF');
	  update_option('ngg_search_button_border_radius','0');
	  //search result
	  update_option('ngg_search_result_bg_color','FFFFFF');
	  update_option('ngg_show_caption','1');
	  update_option('ngg_image_border_radious','5');
	  update_option('ngg_image_width','250');
	  update_option('ngg_image_height','250');
	  
	  
      echo '<div id="message" class="updated fade"><p>Your settings were reset !</p></div>';
}

function usts_ngg_admin_option(){
	
	if(isset($_POST['ngg_status_submit']) && $_POST['ngg_status_submit']==1){			
	  //Search Box	
      update_option('ngg_search_box_width',$_POST['ngg_search_box_width']);      
      update_option('ngg_search_box_height',$_POST['ngg_search_box_height']);
      update_option('ngg_search_box_border_color',intval($_POST['ngg_search_box_border_color']));      
      update_option('ngg_search_box_bg_color',$_POST['ngg_search_box_bg_color']);
      update_option('ngg_search_box_font_color',$_POST['ngg_search_box_font_color']);
      update_option('ngg_search_box_border_radius',$_POST['ngg_search_box_border_radius']);
	  //Search Button
	  update_option('ngg_search_button_width',$_POST['ngg_search_button_width']);
	  update_option('ngg_search_button_height',$_POST['ngg_search_button_height']);
	  update_option('ngg_search_button_border_color',$_POST['ngg_search_button_border_color']);
	  update_option('ngg_search_button_bg_color1',$_POST['ngg_search_button_bg_color1']);
	  update_option('ngg_search_button_bg_color2',$_POST['ngg_search_button_bg_color2']);
	  update_option('ngg_search_button_font_color',$_POST['ngg_search_button_font_color']);
	  update_option('ngg_search_btn_hov_color1',$_POST['ngg_search_btn_hov_color1']);
	  update_option('ngg_search_btn_hov_color2',$_POST['ngg_search_btn_hov_color2']);
	  update_option('ngg_search_btn_hov_text_color',$_POST['ngg_search_btn_hov_text_color']);
	  update_option('ngg_search_button_border_radius',$_POST['ngg_search_button_border_radius']);
	  //Search Result
	  update_option('ngg_search_result_bg_color',$_POST['ngg_search_result_bg_color']);
	  update_option('ngg_show_caption',$_POST['ngg_show_caption']);
	  update_option('ngg_image_border_radious',$_POST['ngg_image_border_radious']);
	  update_option('ngg_image_width',$_POST['ngg_image_width']);
	  update_option('ngg_image_height',$_POST['ngg_image_height']);
	  //      
      echo '<div id="message" class="updated fade"><p>Your settings were saved !</p></div>';
	}
	if(isset($_POST['ngg_status_submit']) && $_POST['ngg_status_submit']==2){
		usts_ngg_reset();
	}
	
	?>
    <h2>Nextgen Gallery Search Settings</h2>
    <form method="post" id="ngg_options">
    	<input type="hidden" name="ngg_status_submit" id="ngg_status_submit" value="2"  />
    	<div class="tabs">
           <div class="tab" style="z-index:100;">
               <input type="radio" id="tab-1" name="tab-group-1" checked>
               <label for="tab-1">Search Box Setting</label>
               <div class="content">
               
               		<table width="100%" cellspacing="2" cellpadding="5" class="editform">
                   	  <tr>
                          <td>Search Box Width</td>
                          <td>
                            <input name="ngg_search_box_width" size="4" maxlength="4" value="<?php echo (get_option('ngg_search_box_width'));?>" /> px (number only)
                          </td>
                      </tr>
                      <tr>
                          <td>Search Box Height</td>
                          <td>
                            <input name="ngg_search_box_height" size="4" maxlength="4" value="<?php echo (get_option('ngg_search_box_height'));?>" /> px (number only)
                          </td>
                      </tr>
                      <tr>
                      	<td>Search Box border Color:</td>
                        <td>
                          <input type="text" name="ngg_search_box_border_color" size="10" id="ngg_search_box_border_color" class="color" value="<?php echo get_option('ngg_search_box_border_color')?>" /> 
                        </td>
                      </tr>
                      <tr>
                      	<td>Search Box Background Color:</td>
                        <td>
                          <input type="text" name="ngg_search_box_bg_color" size="10" id="ngg_search_box_bg_color" class="color" value="<?php echo get_option('ngg_search_box_bg_color')?>" /> 
                        </td>
                      </tr>
                      <tr>
                      	<td>Search Box Font Color:</td>
                        <td>
                          <input type="text" name="ngg_search_box_font_color" size="10" id="ngg_search_box_font_color" class="color" value="<?php echo get_option('ngg_search_box_font_color')?>" /> 
                        </td>
                      </tr>
                      <tr valign="top"> 
                            <td width="150" scope="row">Box Border Radius:</td>
                            <td>
                            <select name="ngg_search_box_border_radius">
                                <option value="0" <?php if (get_option('ngg_search_box_border_radius')==0):?> selected="selected"<?php endif;?>>0</option>
                                <option value="1" <?php if (get_option('ngg_search_box_border_radius')==1):?> selected="selected"<?php endif;?>>1</option>
                                <option value="2" <?php if (get_option('ngg_search_box_border_radius')==2):?> selected="selected"<?php endif;?>>2</option>
                                <option value="3" <?php if (get_option('ngg_search_box_border_radius')==3):?> selected="selected"<?php endif;?>>3</option>
                                <option value="4" <?php if (get_option('ngg_search_box_border_radius')==4):?> selected="selected"<?php endif;?>>4</option>
                                <option value="5" <?php if (get_option('ngg_search_box_border_radius')==5):?> selected="selected"<?php endif;?>>5</option>                
                            </select>
                            </td>
                      </tr>
                    </table>  
                    
               </div>
           </div>   
           <div class="tab" style="z-index:100;">
               <input type="radio" id="tab-2" name="tab-group-1">
               <label for="tab-2">Search Button Setting</label>
               <div class="content" >
               	  <table width="100%" cellspacing="2" cellpadding="5" class="editform">
               	  	 <tr>
                          <td>Search Button Width</td>
                          <td>
                            <input name="ngg_search_button_width" size="4" maxlength="4" value="<?php echo (get_option('ngg_search_button_width'));?>" /> px (number only)
                          </td>
                          <td colspan="2"></td>
                      </tr>
                      <tr>
                          <td>Search Button Height</td>
                          <td>
                            <input name="ngg_search_button_height" size="4" maxlength="4" value="<?php echo (get_option('ngg_search_button_height'));?>" /> px (number only)
                          </td>
                          <td colspan="2"></td>
                      </tr>
                      <tr>
                      	<td>Search Button Border Color:</td>
                        <td>
                          <input type="text" name="ngg_search_button_border_color" size="10" id="ngg_search_button_border_color" class="color" value="<?php echo get_option('ngg_search_button_border_color')?>" /> 
                        </td>
                        <td colspan="2"></td>
                      </tr>
                      <tr>
                      	<td>Search Button Background Color:</td>
                        <td>
                          <input type="text" name="ngg_search_button_bg_color1" size="10" id="ngg_search_button_bg_color1" class="color" value="<?php echo get_option('ngg_search_button_bg_color1')?>" />
                          <input type="text" name="ngg_search_button_bg_color2" size="10" id="ngg_search_button_bg_color2" class="color" value="<?php echo get_option('ngg_search_button_bg_color2')?>" />[gradient color]
                        </td>
                        <td colspan="2"></td>
                      </tr>
                       <tr>
                      	<td>Search Button Font Color:</td>
                        <td>
                          <input type="text" name="ngg_search_button_font_color" size="10" id="ngg_search_button_font_color" class="color" value="<?php echo get_option('ngg_search_button_font_color')?>" /> 
                        </td>
                        <td colspan="2"></td>
                      </tr>
                      <tr>
                            <td>Button Hover Color</td>
                            <td>
                              <input type="text" name="ngg_search_btn_hov_color1" size="4" id="ngg_search_btn_hov_color1" class="color" value="<?php echo get_option('ngg_search_btn_hov_color1')?>" />
                              <input type="text" name="ngg_search_btn_hov_color2" size="4" id="ngg_search_btn_hov_color2" class="color" value="<?php echo get_option('ngg_search_btn_hov_color2')?>" />[gradient color]
                            </td>
                            <td>&emsp;Button Text Hover Color</td>
                            <td>
                              <input type="text" name="ngg_search_btn_hov_text_color" size="4" id="ngg_search_btn_hov_text_color" class="color" value="<?php echo get_option('ngg_search_btn_hov_text_color')?>" /> 
                            </td>
                      </tr>
                     
                      <tr valign="top"> 
                            <td width="150" scope="row">Search Button Border Radius:</td>
                            <td>
                            <select name="ngg_search_button_border_radius">
                                <option value="0" <?php if (get_option('ngg_search_button_border_radius')==0):?> selected="selected"<?php endif;?>>0</option>
                                <option value="1" <?php if (get_option('ngg_search_button_border_radius')==1):?> selected="selected"<?php endif;?>>1</option>
                                <option value="2" <?php if (get_option('ngg_search_button_border_radius')==2):?> selected="selected"<?php endif;?>>2</option>
                                <option value="3" <?php if (get_option('ngg_search_button_border_radius')==3):?> selected="selected"<?php endif;?>>3</option>
                                <option value="4" <?php if (get_option('ngg_search_button_border_radius')==4):?> selected="selected"<?php endif;?>>4</option>
                                <option value="5" <?php if (get_option('ngg_search_button_border_radius')==5):?> selected="selected"<?php endif;?>>5</option>                
                            </select>
                            </td>
                            <td colspan="2"></td>
                      </tr>		
                  </table>		
                    
               </div>
           </div>
           <div class="tab" style="z-index:100;">
               <input type="radio" id="tab-3" name="tab-group-1">
               <label for="tab-3">Search Result Settings</label>
               <div class="content" >
               
                	<table width="100%" cellspacing="2" cellpadding="5" class="editform">
                    	<tr>
                           <td>Search Result Background Color:</td>
                           <td>
                           <input type="text" name="ngg_search_result_bg_color" size="10" id="ngg_search_result_bg_color" class="color" value="<?php echo get_option('ngg_search_result_bg_color')?>" /> 
                           </td>
                        </tr>
                        <tr valign="top"> 
                            <td width="150" scope="row">Show Caption Below Image?:</td>
                            <td>
                            <select name="ngg_show_caption">
                                <option value="1"<?php if (get_option('ngg_show_caption')=='1'):?> selected="selected"<?php endif;?>>Yes</option>
                                <option value="0"<?php if (get_option('ngg_show_caption')=='0'):?> selected="selected"<?php endif;?>>No</option>                
                            </select>
                            </td>
                        </tr>
                        <tr>
                          <td>Image Border Radious</td>
                          <td>
                            <input name="ngg_image_border_radious" size="4" maxlength="4" value="<?php echo (get_option('ngg_image_border_radious'));?>" /> px (number only)
                          </td>
                          <td colspan="2"></td>
                        </tr>
                        <tr>
                          <td>Image Width</td>
                          <td>
                            <input name="ngg_image_width" size="4" maxlength="4" value="<?php echo (get_option('ngg_image_width'));?>" /> px (number only)
                          </td>
                          <td colspan="2"></td>
                      </tr>
                      <tr>
                          <td>Image Height</td>
                          <td>
                            <input name="ngg_image_height" size="4" maxlength="4" value="<?php echo (get_option('ngg_image_height'));?>" /> px (number only)
                          </td>
                          <td colspan="2"></td>
                      </tr>
                    </table>
                    
               </div>
           </div>
        </div> 
        <table width="100%" cellspacing="2" cellpadding="5" class="editform">
      		<tr valign="top">
				<td colspan="2" scope="row">			
					<input type="button" name="save" onclick="document.getElementById('ngg_status_submit').value='1'; document.getElementById('ngg_options').submit();" value="Save Settings" class="button-primary" />
          <input type="button" name="reset" onclick="document.getElementById('ngg_status_submit').value='2'; document.getElementById('ngg_options').submit();" value="Default settings" class="button-primary" />
				</td> 
			</tr>
		</table>      
    </form>
    <?php
}