<?php

/**
 * The WooCommerce settings
 *
 * @link       https://www.deviodigital.com/
 * @since      1.2
 *
 * @package    DTWC
 * @subpackage DTWC/admin
 */

/**
 * Add delivery time to admin order data
 */
function dtwc_woocommerce_admin_order_data_after_address( $order ) {
    // Order ID.
    $order_id = $order->get_id();

    // Get the delivery date.
    $delivery_date_meta = get_post_meta( $order_id, 'dtwc_delivery_date', true );

    // Create readable delivery date.
    $delivery_date = date( apply_filters( 'dtwc_date_format', 'M j, Y' ), strtotime( $delivery_date_meta ) );

    // Get the delivery time.
    $delivery_time_meta = get_post_meta( $order_id, 'dtwc_delivery_time', true );

    // Create readable delivery time.
    $delivery_time = date( apply_filters( 'dtwc_time_format', 'g:i a' ), strtotime( $delivery_time_meta ) );

    // Display the delivery details.
    if ( '' != $delivery_date_meta ) {
        // Get delivery driver details.
        $delivery_details = '<p class="dtwc-delivery-date"><strong>' . dtwc_delivery_date_label() . ':</strong><br />' . $delivery_date . ' @ ' . $delivery_time . '</p>';

        echo apply_filters( 'dtwc_admin_order_received_delivery_details', $delivery_details );
    }
}

/**
 * Run specific codes on WooCommerce init
 *
 * @since 1.2
 * @return void
 */
function dtwc_woocommerce_init() {
    $after_address = dtwc_delivery_time_edit_order_display();
    if ( 'billing' == $after_address ) {
        add_action( 'woocommerce_admin_order_data_after_billing_address', 'dtwc_woocommerce_admin_order_data_after_address', 10, 1 );
    } else {
        add_action( 'woocommerce_admin_order_data_after_shipping_address', 'dtwc_woocommerce_admin_order_data_after_address', 10, 1 );
    }
}
add_action( 'woocommerce_init', 'dtwc_woocommerce_init' );
