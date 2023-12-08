<?php
/*
 * Plugin Name: Payment Gateway for BroadPay
 * Plugin URI: https://github.com/sparcopay/wc-broadpay-payment-gateway
 * Description: Accept Mobile Money and Credit Card payments.
 * Version: 1.0.0
 * Author: BroadPay
 * Author URI: https://broadpayzm.com
 * text-domain: broadpay-gateway
*/


/**
 * Class WC_Gateway_Sparco file.
 *
 * @package WooCommerce\Broadpay
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

if (! in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) return;


add_action('plugins_loaded', 'sparco_payment_init', 11);

function sparco_payment_init(){
    if(class_exists('WC_Payment_Gateway')){

		require plugin_dir_path(__FILE__) . '/includes/class-wc-broadpay-payment-gateway.php';
		require plugin_dir_path(__FILE__) . '/includes/class-broadpay-signature.php';

	}
}

add_filter('woocommerce_payment_gateways', 'add_to_woo_sparco_payment_gateway');

function add_to_woo_sparco_payment_gateway($gateways)
{
    $gateways[] = 'WC_Gateway_Sparco';

    return $gateways;
}