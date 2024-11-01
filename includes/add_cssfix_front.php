<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('#frmCssFix').on('submit',function(e){
		e.preventDefault();
		gen_usts_ngg_save_CssFixFront();
	});
	
});	

function gen_usts_ngg_save_CssFixFront(){
	var css = jQuery('#ngg_css').val();
	if(css == ""){
		alert('<?php _e("Field is Empty","gen-wp-ngg-search"); ?>');
		return;
	}
	jQuery.ajax({
		type: "POST",
      	url: '<?php echo admin_url( 'admin-ajax.php' );?>?cssfix=front',
		data: {
        action: 'gen_usts_ngg_save_cssfixfront',  
        css : css 
      	},
		success: function (data) {
				console.log(data);
				if(data.length>0){
					alert('<?php _e("added successfully","gen-wp-ngg-search"); ?>');
				}
		},
		error : function(s , i , error){
				console.log(error);
		}
	});
}	
</script>

<div class="wrapper">
  <div class="wrap" style="float:left; width:100%;">
    <div id="icon-options-general" class="icon32"></div>
    <div style="width:70%;float:left;"><h2><?php _e("Nextgen Gallery Search","gen-wp-ngg-search"); ?></h2></div>
       <div class="main_div">
     	<div class="metabox-holder" style="width:98%; float:left;">
          <div id="namediv" class="stuffbox" style="width:60%;">
          	<h3 class="top_bar"><?php _e("FrontEnd Css Fix","gen-wp-ngg-search"); ?></h3>
         	<form id="frmCssFix" action="" method="post" style="width:100%">
                <table style="margin:10px;width:300px;">
                    <tr>
                        <td><?php _e("CSS","gen-wp-ngg-search"); ?>: </td>
                        <td><textarea cols="50" rows="10" id="ngg_css" class="rounded" name="details"><?php echo get_option('gen_ngg_cssfix_front');?></textarea> </td>
                    </tr>
                    <tr><td colspan="2"></td></tr>
                    <tr>
                      <td></td>
                      <td>
                      	<input type="submit" id="btnaddcssfix" name="btnaddcssfix" value="Add Css" style="width:150px;background-color:#1E8CBE;"/>
                      </td>
                    </tr>
                </table>	
             </form>	 
          </div>
        </div>
       </div>  
  </div>
</div>