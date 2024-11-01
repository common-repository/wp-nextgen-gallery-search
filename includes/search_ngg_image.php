<?php 
function gen_usts_gallery_image_search($atts){
	global $table_prefix,$wpdb;
	$tag = "";
	$sql_ngg_pictures = "";
	if(isset($_REQUEST['tag'])){
		$tag = $_REQUEST['tag'];
		$sql_ngg_pictures = "select * from ".$table_prefix."ngg_pictures nggp inner join ".$table_prefix."ngg_gallery ngg on nggp.galleryid = ngg.gid where nggp.alttext like '%". $tag ."%'";
	}
	if($_POST){
		if(isset($_REQUEST['txtnggSearchtag'])){
		   $tag = $_REQUEST['txtnggSearchtag'];
		}
		$sql_ngg_pictures = "select * from ".$table_prefix."ngg_pictures nggp inner join ".$table_prefix."ngg_gallery ngg on nggp.galleryid = ngg.gid where nggp.alttext like '%". $tag ."%'";
	}
	$pictures = $wpdb->get_results($sql_ngg_pictures);
	?>
    <style type="text/css">
		<?php echo get_option('ngg_cssfix_front'); ?>
		#wpngg_img_search_result{
		<?php
		if(get_option("ngg_search_result_bg_color")){
			echo "border-top: 1px solid #ccc;";
			echo "border-bottom: 1px solid #ccc;";
			echo "background: #".get_option("ngg_search_result_bg_color").";";
			echo "margin: 20px -50px;";
		}
		else {
			echo "border-top: 1px solid #ccc;";
			echo "border-bottom: 1px solid #ccc;";
			echo "background: #ffffff;";
			echo "margin: 20px -50px;";
		}	
		?>
		}
		.wpnggimgcls{
			<?php
			if(get_option("ngg_image_border_radious")){
   			  echo "background-color: #fff;";
			  echo "border: 1px solid #a9a9a9;";
			  echo "display: block;";
			  echo "margin: 4px 0 4px 4px;";
			  echo "padding: 4px;";
			  echo "position: relative;";
			
			  echo "border-radius: ".get_option("ngg_image_border_radious")."px;";
			  echo "box-shadow: 3px 3px 3px #787878;";
			}
			else{
				echo "background-color: #fff;";
			  echo "border: 1px solid #a9a9a9;";
			  echo "display: block;";
			  echo "margin: 4px 0 4px 4px;";
			  echo "padding: 4px;";
			  echo "position: relative;";
			
			  echo "border-radius: 10px;";
			  echo "box-shadow: 3px 3px 3px #787878;";
			}	
			?>
		}
		#wpngg_img_search_result img{
			<?php
			if(get_option('ngg_image_width')){
				echo "width: ".get_option('ngg_image_width')."px;";
			}
			else{
				echo "width: 250px;";
			}
			if(get_option('ngg_image_height')){
  				echo "height: ".get_option('ngg_image_height')."px;";
			}
			else{
  				echo "height: 250px;";
			}
			?>
			
		}
	</style>
    <?php
	$output .= '
	<div id="ngg_picture_gallery">';
	$output .= '<form id="frmgallerysearch" action="'.get_option("siteurl").'/?page_id='.GEN_USTS_NGG_GALLERYSEARCH_PAGEID.'" method="post">
				  <!-- <input type="text" id="txtnggSearchtag" name="txtnggSearchtag" value="" style="height:30px" />
				   <input type="submit" id="btnnggsearch" name="btnnggsearch" value="Image Search" style="width:115px;height:40px;" placeholder="Search Gallery Image" />-->
				</form>';
	$output .= '<div id="wpngg_img_search_result" class="thumbs">
				  <div style="float:left;"> 
					';
	if(count($pictures)>0){				
		foreach($pictures as $picture){
			$caption="";
			
			if(get_option('ngg_show_caption')==1){
				$caption = $picture->alttext;
			}
			
			$output .= '<div style="float:left;">
							<a href="'.get_option('siteurl').'/'.$picture->path.'/'.$picture->filename.'" title="'.$picture->alttext.'">
								<img class="wpnggimgcls" src="'.get_option('siteurl').'/'.$picture->path.'/thumbs/thumbs_'.$picture->filename.'" style="" /> 
							</a>
							<div>'.$caption.'</div>
						</div>';
		}
	}
	$output .= '</div>
			</div>';
	$output .= '</div>';
	return $output;
	
}	
add_shortcode('gen-usts-gallery-search','gen_usts_gallery_image_search');

function gen_usts_gallery_image_search_box(){
	?>
    <style type="text/css">
		<?php echo get_option('ngg_cssfix_front'); ?>
		
		#txtnggSearchtag_box{
		<?php
			if(get_option('ngg_search_box_width') != ""){
				echo 'width:'.get_option('ngg_search_box_width').'px;';
				echo 'min-height:'.get_option('ngg_search_box_height').'px;';
				echo 'border:solid 1px #'.get_option('ngg_search_box_border_color').';';
				echo 'background: #'.get_option('ngg_search_box_bg_color').';';
				echo 'color:#'.get_option('ngg_search_box_font_color').';';
				echo 'border-radius:'.get_option('ngg_search_box_border_radius').'px;';
			}
			else{
				echo 'width:200px;';
				echo 'min-height:30px;';
				echo 'border:solid 1px #E2E2E2;';
				echo 'background: #F9F9F9;';
				echo 'color:#090909;';
				echo 'border-radius:0px;';
			}
		?>	
		}
		#btnnggsearch_box{
		<?php
			if(get_option('ngg_search_button_width') != ""){
				echo 'width:'.get_option('ngg_search_button_width').'px;';
				echo 'min-height:'.get_option('ngg_search_button_height').'px;';
				echo 'border:solid 1px #'.get_option('ngg_search_button_border_color').';';
				echo 'background:linear-gradient(to bottom, #'.get_option('ngg_search_button_bg_color1').' 0%, #'.get_option('ngg_search_button_bg_color2').' 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);';
				echo 'color:#'.get_option('ngg_search_button_font_color').';';
				echo 'border-radius:'.get_option('ngg_search_button_border_radius').'px;';
			}
			else{
				echo 'width:90px;';
				echo 'min-height:30px;';
				echo 'border:solid 1px #E2E2E2;';
				echo 'background:linear-gradient(to bottom, #D9DADA 0%, #D9DADA 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);';
				echo 'color:#FFFFFF;';
				echo 'border-radius:0px;';
			}	
		?>
		}
		#btnnggsearch_box:hover{    
		<?php
			echo 'background:linear-gradient(to bottom, #'.get_option('ngg_search_btn_hov_color1').' 0%, #'.get_option('ngg_search_btn_hov_color2').' 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);';
			echo 'color:#'.get_option('ngg_search_btn_hov_text_color').';';
			
		?>
	    }
	</style>
    <?php
	if($_POST){
		$box_tag = "";
		if(isset($_REQUEST['btnnggsearch_box'])){
			$box_tag = $_REQUEST['txtnggSearchtag_box'];	
		} 
		wp_redirect( get_option("siteurl").'/?page_id='.GEN_USTS_NGG_GALLERYSEARCH_PAGEID.'&tag='.$box_tag); exit; 
	}	
	$output_box = '<form id="frmgallerysearch_box" action="'.get_option("siteurl").'/?page_id='.GEN_USTS_NGG_GALLERYSEARCH_PAGEID.'" method="post">
				   <input type="text" id="txtnggSearchtag_box" name="txtnggSearchtag_box" value="" style="height:30px" />
				   <input type="submit" id="btnnggsearch_box" name="btnnggsearch_box" value="Gallery Search" style="width:115px;height:40px;" placeholder="Search Gallery Image" />
				   <input type="hidden" value="fromwidget" name="from_widget" id="from_widget"/>
				</form>';
	return $output_box;			
}

add_shortcode('gen-usts-gallery-search-box','gen_usts_gallery_image_search_box');