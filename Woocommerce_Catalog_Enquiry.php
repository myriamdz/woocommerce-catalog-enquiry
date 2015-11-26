<?php
/**
Plugin Name: Woocommerce Catalog Enquiry
Plugin URI: http://dualcube.com
Description: Convert your WooCommerce store into a catalog website in a click
Author: Prabhakar Kumar Shaw, Dualcube 
Version: 2.3.0
Author URI: http://dualcube.com
*/
if(!isset($_SESSION)) {
			session_start();
}
if ( ! class_exists( 'WC_Dependencies_woocommerce_catalog_enquiry' ) )
	require_once trailingslashit(dirname(__FILE__)).'includes/class-dc-dependencies.php';
require_once trailingslashit(dirname(__FILE__)).'includes/wc-Woocommerce-Catalog-Enquiry-core-functions.php';
require_once trailingslashit(dirname(__FILE__)).'config.php';
if(!defined('ABSPATH')) exit; // Exit if accessed directly
if(!defined('WC_WOOCOMMERCE_CATALOG_ENQUIRY_PLUGIN_TOKEN')) exit;
if(!defined('WC_WOOCOMMERCE_CATALOG_ENQUIRY_TEXT_DOMAIN')) exit;
if(!WC_Dependencies_woocommerce_catalog_enquiry::woocommerce_active_check()) {
  add_action( 'admin_notices', 'woocommerce_catalog_enquiry_alert_notice' );
}
/**
* Plugin page links
*/
function woocommerce_catalog_enquiry_plugin_links( $links ) {	
	$plugin_links = array(
		'<a href="' . admin_url( 'admin.php?page=wc-Woocommerce-Catalog-Enquiry-setting-admin' ) . '">' . __( 'Settings', WC_WOOCOMMERCE_CATALOG_ENQUIRY_TEXT_DOMAIN ) . '</a>',
		'<a href="http://dualcube.com/">' . __( 'Support', WC_WOOCOMMERCE_CATALOG_ENQUIRY_TEXT_DOMAIN ) . '</a>',			
	);	
	return array_merge( $plugin_links, $links );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'woocommerce_catalog_enquiry_plugin_links' );


if(!class_exists('WC_Woocommerce_Catalog_Enquiry')) {
	require_once( trailingslashit(dirname(__FILE__)).'classes/class-wc-Woocommerce-Catalog-Enquiry.php' );
	global $WC_Woocommerce_Catalog_Enquiry;
	$WC_Woocommerce_Catalog_Enquiry = new WC_Woocommerce_Catalog_Enquiry( __FILE__ );
	$GLOBALS['WC_Woocommerce_Catalog_Enquiry'] = $WC_Woocommerce_Catalog_Enquiry;
}
?>
