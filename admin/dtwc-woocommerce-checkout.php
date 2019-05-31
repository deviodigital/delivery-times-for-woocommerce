<?php

/**
 * The WooCommerce checkout fields
 *
 * @link       https://www.deviodigital.com/
 * @since      1.0
 *
 * @package    DTWC
 * @subpackage DTWC/admin
 */

/**
 * Add Delivery Date checkout field
 * 
 * @since 1.0
 */
function dtwc_delivery_date_checkout_field( $checkout ) {

    // Create Delivery date field.
    woocommerce_form_field( 'dtwc_delivery_date', array(
        'type'     => 'text',
        'class'    => array( 'dtwc_delivery_date form-row-wide' ),
        'label'    => __( 'Delivery date', 'dtwc' ),
        'required' => true,
    ), $checkout->get_value( 'dtwc_delivery_date' ) );
}
add_action( 'woocommerce_after_checkout_billing_form', 'dtwc_delivery_date_checkout_field' , 10, 1 );

/**
 * Process the Delivery Date checkout field
 * 
 * @since 1.0
 */
function dtwc_delivery_date_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['dtwc_delivery_date'] ) {
        wc_add_notice( __( 'Please enter a delivery date.', 'dtwc' ), 'error' );
    }
}
add_action( 'woocommerce_checkout_process', 'dtwc_delivery_date_checkout_field_process' );

/**
 * Save Delivery Date checkout field
 * 
 * @since 1.0
 */
function dtwc_add_order_delivery_date_to_order ( $order_id ) {
	if ( isset( $_POST ['dtwc_delivery_date'] ) && '' != $_POST ['dtwc_delivery_date'] ) {
		add_post_meta( $order_id, 'dtwc_delivery_date',  sanitize_text_field( $_POST ['dtwc_delivery_date'] ) );
	}
}
add_action( 'woocommerce_checkout_update_order_meta', 'dtwc_add_order_delivery_date_to_order' , 10, 1 );

/**
 * Add Delivery Date checkout field to WooCommerce emails.
 * 
 * @since 1.0
 */
function dtwc_add_delivery_date_to_emails( $fields, $sent_to_admin, $order ) {
    // Get the Order ID.
    if ( version_compare( get_option( 'woocommerce_version' ), '3.0.0', ">=" ) ) {
        $order_id = $order->get_id();
    } else {
        $order_id = $order->id;
    }

    // Get the delivery date.
    $delivery_date = get_post_meta( $order_id, 'dtwc_delivery_date', true );

    // Create readable delivery date.
    $delivery_date = date( 'M j, Y', strtotime( $delivery_date ) );

    // Display delivery date.
    if ( '' != $delivery_date ) {
        $fields[ 'Delivery date' ] = array(
            'label' => __( 'Delivery date', 'dtwc' ),
            'value' => $delivery_date,
        );
    }
    return $fields;
}
add_filter( 'woocommerce_email_order_meta_fields', 'dtwc_add_delivery_date_to_emails' , 10, 3 );

/**
 * Add Delivery Date checkout field to WooCommerce thank you page.
 * 
 * @since 1.0
 */
function dtwc_add_delivery_date_to_order_received_page( $order ) {
    // Get the Order ID.
	if ( version_compare( get_option( 'woocommerce_version' ), '3.0.0', ">=" ) ) {
        $order_id = $order->get_id();
    } else {
        $order_id = $order->id;
    }

    // Get the delivery date.
    $delivery_date = get_post_meta( $order_id, 'dtwc_delivery_date', true );

    // Create readable delivery date.
    $delivery_date = date( 'M j, Y', strtotime( $delivery_date ) );

    // Display the delivery date.
    if ( '' != $delivery_date ) {
        echo '<p><strong>' . __( 'Delivery date', 'dtwc' ) . ':</strong> ' . $delivery_date . '</p>';
	}
}
//add_filter( 'woocommerce_order_details_before_order_table', 'dtwc_add_delivery_date_to_order_received_page', 10 , 1 );
add_action( 'woocommerce_order_details_after_order_table_items', 'dtwc_add_delivery_date_to_order_received_page', 10 , 1 );
