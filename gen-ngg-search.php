<?php
/**
Plugin Name: WP NextGen Gallery Search
Description: Enables Search functionality for the images of NextGEN Gallery
Author: UpScaleThought
Version: 1.5
Author URI: http://www.upscalethought.com/
Plugin URI: http://www.upscalethought.com/
Text Domain: gen-wp-ngg-search
Domain Path: /i18n/languages/
 
Copyright (C) 2015 UpScaleThought
@package NextGEN Gallery
**/

define('GEN_USTS_NGGS_PLUGIN_URL', plugins_url('',__FILE__));
define("GEN_USTS_BASE_URL", WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)));
define('GEN_USTS_NGGS_DIR', plugin_dir_path(__FILE__) );

//$usts_ngg_page = get_page_by_title('Gen Ngg Gallery Search');
$usts_ngg_page = get_page_by_path('gen-gallery-search');
$usts_ngg_page_id = 0;
if($usts_ngg_page){
	$usts_ngg_page_id = $usts_ngg_page->ID;
}
define('GEN_USTS_NGG_GALLERYSEARCH_PAGEID',$usts_ngg_page_id);

include_once('includes/create_page.php');
include_once('includes/usts-ngg-admin.php');
include_once('includes/usts_ngg_init.php');
include_once('includes/search_ngg_image.php');

add_action('admin_menu', 'gen_nextgen_plugin_admin_menu');
function gen_nextgen_plugin_admin_menu(){
	add_object_page('WP NextGen Gallery Search', 'WP NextGen Gallery Search', 'publish_posts', 'custom_gallerysearch', 'gen_nextgensearch_settings_menu');
}
function gen_nextgensearch_settings_menu(){
  include_once('includes/nextgen_gallery_features.php');
}
function gen_nextgen_gallery_search_add_menu(){
  add_submenu_page( 'custom_gallerysearch', 'NGG Settings', 'NGG Settings', 'manage_options', 'ngg-settings', 'usts_ngg_admin_option');
  add_submenu_page( 'custom_gallerysearch', 'Front CSS Fix', 'Front CSS Fix', 'manage_options', 'ngg-front-cssfix', 'gen_usts_ngg_front_cssfix');
  add_submenu_page( 'custom_gallerysearch', 'Pro Version', 'Pro Vesrion', 'manage_options', 'pro-version-menu', 'pro_version_settings');
}
function gen_usts_ngg_front_cssfix(){
	include_once('includes/add_cssfix_front.php');
}
function pro_version_settings(){
  include_once('includes/gallerysearch_pro_version.php');
  
}
add_action('admin_menu','gen_nextgen_gallery_search_add_menu');

function gen_nextgengallerysearchcss_front(){
	wp_register_style( 'add_style_front_css',plugins_url('/assets/css/style.css',__FILE__));
    wp_enqueue_style( 'add_style_front_css');
	
}
add_action('wp_enqueue_scripts','gen_nextgengallerysearchcss_front');
function gen_usts_ngg_init_scripts(){
  wp_enqueue_style('ngg-admin-tab',GEN_USTS_NGGS_PLUGIN_URL.'/assets/css/usts-tab-style.css');
  wp_enqueue_script('ngg-jscolor', GEN_USTS_NGGS_PLUGIN_URL.'/assets/js/colorpicker/jscolor.js');
}

add_action('init','gen_usts_ngg_init_scripts');

register_activation_hook( __FILE__, 'gen_usts_nggsearch_install' );
register_deactivation_hook( __FILE__, 'gen_usts_nggsearch_uninstall' );

function gen_usts_ngg_save_cssfixfront(){
  if ( count($_POST) > 0 ){ 
    global $table_prefix,$wpdb;
    $cssfix = $_REQUEST['cssfix'];
    $css = $_REQUEST['css'];
    $isupdate ="";
    if($cssfix == "front"){
      $isupdate = update_option('ngg_cssfix_front',$css);
    }
    if($isupdate){
      echo "added";
    }
  }
  exit;
}
add_action( 'wp_ajax_nopriv_gen_usts_ngg_save_cssfixfront','gen_usts_ngg_save_cssfixfront' );
add_action( 'wp_ajax_gen_usts_ngg_save_cssfixfront', 'gen_usts_ngg_save_cssfixfront' );