<?php
/**
 * Plugin Name: WooCommerce & Google Tag Manager
 * Version: 1.0
 * Description: E-commerce advanced with Google Tag Manager & WooCommerce
 * Author: Víctor Alonso
 * Text Domain: ec-tag-manager
 * Domain Path: /languages/
 * License: GPL v3
 */

/*
* Insert Google Tag Manager
*/ 
function woo_tagmanager_pixel() {
	include(plugin_dir_path( __FILE__ ) . 'code.php');
}
add_action('wp_head', 'woo_tagmanager_pixel');

/*
* Insert Pixel Google Tag Manager
*/ 
function woo_tagmanager_content_after_body_open_tag() {
	include(plugin_dir_path( __FILE__ ) . 'pixel.php');
}
add_action('banium_after_body_open_tag', 'woo_tagmanager_content_after_body_open_tag');

/*
* Checkout
*/
function woo_tagmanager_add_datalayer() {

	global $woocommerce;

	if ( is_product_category() || is_product_tag() || is_front_page() || is_shop() ) {

		include(plugin_dir_path( __FILE__ ) . 'views/products.php');

	}elseif(is_product()){
		
		$postid = get_the_ID();
		$product = wc_get_product( $postid );
		$product_id = $product->get_id();
		$_product_cats = get_the_terms( $product_id, 'product_cat' );
		$product_cat = $_product_cats[0]->name;
		include(plugin_dir_path( __FILE__ ) . 'views/product.php');

	}elseif(is_cart()){

		

	}elseif(is_order_received_page()){

		$order_id = $GLOBALS[ "wp" ]->query_vars[ "order-received" ];
		$order = wc_get_order( $order_id );
		include(plugin_dir_path( __FILE__ ) . 'views/purchase.php');

	}elseif(is_checkout()){

		$products_remarketing = array();
		$totalvalue = 0;
		foreach ( $woocommerce->cart->get_cart() as $item => $values ) :
			$products_remarketing[] = $values['product_id'];
			$totalvalue += $values['quantity'] * get_post_meta($values['product_id'] , '_price', true);
        endforeach;
		include(plugin_dir_path( __FILE__ ) . 'views/checkout.php');

	}
	
}
add_action('woo_tagmanager_insert_datalayer', 'woo_tagmanager_add_datalayer');