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
 * Add Delivery Date & Time checkout fields
 * 
 * @since 1.0
 */
function dtwc_delivery_info_checkout_fields( $checkout ) {

    // Set variables.
    $open_time  = strtotime( dtwc_business_opening_time() );
    $close_time = strtotime( dtwc_business_closing_time() );

    // Create delivery time.
    $delivery_time = $open_time;

    // Round to next 30 minutes (30 * 60 seconds)
    $delivery_time = ceil( $delivery_time / ( 30 * 60 ) ) * ( 30 * 60 );

    // Create times array with default option.
    $times = array( '' => apply_filters( 'dtwc_checkout_delivery_times_select_default_text', __( 'Select a desired time for delivery', 'dtwc' ) ) );

    // Loop through and add delivery times based on open/close times.
    while( $delivery_time <= $close_time && $delivery_time >= $open_time ) {

        // Delivery prep time.
        $delivery_prep = dtwc_delivery_prep_time();

        // Set the delivery prep time for the strtotime.
        if ( '1' == $delivery_prep ) {
            $strtotime = '+' . $delivery_prep . 'hour';
        } elseif ( $delivery_time > 1 ) {
            $strtotime = '+' . $delivery_prep . 'hours';
        } elseif ( '0' == $delivery_prep ) {
            $strtotime = 'now';
        } else {
            $strtotime = '';
        }

        // Get the prep time based on the settings in delivery prep.
        $prep_time = date( 'H:i', strtotime( $strtotime, strtotime( current_time( 'H:i' ) ) ) );

        // Remove times based on prep time setting.
        if ( NULL != $delivery_prep && '' != $delivery_prep && $prep_time > date( 'H:i', $delivery_time ) ) {
            // Do nothing.
        } else {
            // Add time to array.
            $times[date( 'H:i', $delivery_time )] = date( 'g:i a', $delivery_time );
        }

        // Update delivery time variable.
        $delivery_time = strtotime( '+30 minutes', $delivery_time );
    }

    // Require date?
    if ( 'on' == dtwc_require_delivery_date() ) {
        $require_date = TRUE;
    } else {
        $require_date = FALSE;
    }

    // Create Delivery date field.
    woocommerce_form_field( 'dtwc_delivery_date', array(
        'type'     => 'text',
        'class'    => array( 'dtwc_delivery_date form-row-wide' ),
        'label'    => dtwc_delivery_date_label(),
        'required' => $require_date,
    ), $checkout->get_value( 'dtwc_delivery_date' ) );

    // Require time?
    if ( 'on' == dtwc_require_delivery_time() ) {
        $require_time = TRUE;
    } else {
        $require_time = FALSE;
    }

    // Create Delivery time field.
    woocommerce_form_field( 'dtwc_delivery_time', array(
        'type'     => 'select',
        'class'    => array( 'dtwc_delivery_time form-row-wide' ),
        'label'    => dtwc_delivery_time_label(),
        'required' => $require_time,
        'options'  => $times
    ), $checkout->get_value( 'dtwc_delivery_time' ) );

}
add_action( 'woocommerce_after_checkout_billing_form', 'dtwc_delivery_info_checkout_fields' , 10, 1 );

/**
 * Process the Delivery Date & Time checkout fields
 * 
 * @since 1.0
 */
function dtwc_delivery_date_checkout_field_process() {

    // Create error message.
    $message = __( 'Please select a delivery date.', 'dtwc' );

    // Check if set, if its not set add an error.
    if ( ! $_POST['dtwc_delivery_date'] && 'on' == dtwc_require_delivery_date() ) {
        wc_add_notice( apply_filters( 'dtwc_delivery_date_error_notice', $message ), 'error' );
    }

    // Create error message.
    $message = __( 'Please select a delivery time.', 'dtwc' );

    // Check if set, if its not set add an error.
    if ( ! $_POST['dtwc_delivery_time'] && 'on' == dtwc_require_delivery_time() ) {
        wc_add_notice( apply_filters( 'dtwc_delivery_time_error_notice', $message ), 'error' );
    }
}
add_action( 'woocommerce_checkout_process', 'dtwc_delivery_date_checkout_field_process' );

/**
 * Save Delivery Date & Time checkout fields
 * 
 * @since 1.0
 */
function dtwc_add_order_delivery_info_to_order ( $order_id ) {
	if ( isset( $_POST ['dtwc_delivery_date'] ) && '' != $_POST ['dtwc_delivery_date'] ) {
		add_post_meta( $order_id, 'dtwc_delivery_date',  sanitize_text_field( $_POST ['dtwc_delivery_date'] ) );
	}
	if ( isset( $_POST ['dtwc_delivery_time'] ) && '' != $_POST ['dtwc_delivery_time'] ) {
		add_post_meta( $order_id, 'dtwc_delivery_time',  sanitize_text_field( $_POST ['dtwc_delivery_time'] ) );
	}
}
add_action( 'woocommerce_checkout_update_order_meta', 'dtwc_add_order_delivery_info_to_order' , 10, 1 );

/**
 * Add Delivery Date & Time checkout fields to WooCommerce emails.
 * 
 * @since 1.0
 */
function dtwc_add_delivery_info_to_emails( $fields, $sent_to_admin, $order ) {
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
        $fields[ dtwc_delivery_date_label() ] = array(
            'label' => dtwc_delivery_date_label(),
            'value' => $delivery_date,
        );
    }

    // Get the delivery time.
    $delivery_time = get_post_meta( $order_id, 'dtwc_delivery_time', true );

    // Create readable delivery time.
    $delivery_time = date( 'g:i a', strtotime( $delivery_time ) );

    // Display delivery time.
    if ( '' != $delivery_time ) {
        $fields[ 'Delivery time' ] = array(
            'label' => dtwc_delivery_time_label(),
            'value' => $delivery_time,
        );
    }

    return $fields;
}
add_filter( 'woocommerce_email_order_meta_fields', 'dtwc_add_delivery_info_to_emails' , 10, 3 );

/**
 * Add Delivery Date & Time checkout fields to WooCommerce thank you page.
 * 
 * @since 1.0
 */
function dtwc_add_delivery_info_to_order_received_page( $order ) {
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

    // Get the delivery time.
    $delivery_time = get_post_meta( $order_id, 'dtwc_delivery_time', true );

    // Create readable delivery time.
    $delivery_time = date( 'g:i a', strtotime( $delivery_time ) );

    // Display the delivery details.
    if ( '' != $delivery_date ) {
        $delivery_details = '<strong>' . dtwc_delivery_date_label() . ':</strong> ' . $delivery_date . ' @ ' . $delivery_time;
        echo '<p class="dtwc-delivery-date">' . apply_filters( 'dtwc_order_received_delivery_details', $delivery_details ) . '</p>';
	}
}
//add_filter( 'woocommerce_order_details_before_order_table', 'dtwc_add_delivery_date_to_order_received_page', 10 , 1 );
add_action( 'woocommerce_order_details_after_order_table_items', 'dtwc_add_delivery_info_to_order_received_page', 10 , 1 );
