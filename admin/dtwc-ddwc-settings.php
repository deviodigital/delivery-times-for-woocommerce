<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.deviodigital.com/
 * @since      1.2
 *
 * @package    DTWC
 * @subpackage DTWC/admin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Delivery Drivers for WooCommerce
 * 
 * Adds delivery date details to the Driver Dashboard order details
 * table below the order date.
 * 
 * @since 1.2
 */
function dtwc_driver_dashboard_order_details_table_tbody_bottom() {
    // Order ID.
    $order_id = $_GET['orderid'];

    // Get the delivery date.
    $delivery_date_meta = get_post_meta( $order_id, 'dtwc_delivery_date', true );

    // Create readable delivery date.
    $delivery_date = date( 'm-j-y', strtotime( $delivery_date_meta ) );

    // Get the delivery time.
    $delivery_time_meta = get_post_meta( $order_id, 'dtwc_delivery_time', true );

    // Create readable delivery time.
    $delivery_time = date( 'h:i a', strtotime( $delivery_time_meta ) );

    // Display the delivery details.
    if ( '' != $delivery_date_meta ) {
        // Get delivery driver details.
        $delivery_times = '<tr><td class="dtwc-delivery-date"><strong>' . dtwc_delivery_date_label() . '</strong></td><td>' . $delivery_date . ' - ' . $delivery_time . '</td></tr>';

        echo apply_filters( 'dtwc_driver_dashboard_order_details_table_tbody_bottom', $delivery_times );
    }
}
add_action( 'ddwc_driver_dashboard_order_details_table_tbody_bottom', 'dtwc_driver_dashboard_order_details_table_tbody_bottom' );
