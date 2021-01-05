<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.deviodigital.com/
 * @since      1.0
 *
 * @package    DTWC
 * @subpackage DTWC/admin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get the Delivery time format selected in the DTWC Admin Settings
 *
 * @return string|bool
 */
function dtwc_business_delivery_time_format() {
    $business = get_option( 'dtwc_business' );
    // Set to false (default).
    $delivery_time_format = FALSE;

    if ( isset( $business['delivery_time_format'] ) && '' !== $business['delivery_time_format'] ) {
        $delivery_time_format = $business['delivery_time_format'];
    }

	return apply_filters( 'dtwc_business_delivery_time_format', $delivery_time_format );
}

/**
 * Get the Delivery days selected in the DTWC Admin Settings
 *
 * @return string|bool
 */
function dtwc_business_delivery_days() {
    $business = get_option( 'dtwc_business' );
    // Set to false (default).
    $delivery_days = FALSE;

    if ( isset( $business['delivery_days'] ) && '' !== $business['delivery_days'] ) {
        $delivery_days = $business['delivery_days'];
    }

	return apply_filters( 'dtwc_business_delivery_days', $delivery_days );
}

/**
 * Get the Opening time selected in the DTWC Admin Settings
 *
 * @return string
 */
function dtwc_business_opening_time() {
    $business = get_option( 'dtwc_business' );
    // Set to false (default).
    $opening_time = FALSE;

    if ( isset( $business['opening_time'] ) && '' !== $business['opening_time'] ) {
        $opening_time = $business['opening_time'];
    }

	return apply_filters( 'dtwc_business_opening_time', $opening_time );
}

/**
 * Get the Closing time selected in the DTWC Admin Settings
 *
 * @return string|bool
 */
function dtwc_business_closing_time() {
    $business = get_option( 'dtwc_business' );
    // Set to false (default).
    $closing_time = FALSE;

    if ( isset( $business['closing_time'] ) && '' !== $business['closing_time'] ) {
        $closing_time = $business['closing_time'];
    }

	return apply_filters( 'dtwc_business_closing_time', $closing_time );
}

/**
 * Get the delivery date label added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_delivery_date_label() {
    $basic = get_option( 'dtwc_basic' );

    // Set default delivery date label.
    $delivery_date_label = __( 'Delivery date', 'delivery-times-for-woocommerce' );

    if ( isset( $basic['delivery_date_label'] ) && '' !== $basic['delivery_date_label'] ) {
        $delivery_date_label = $basic['delivery_date_label'];
    }

	return apply_filters( 'dtwc_delivery_date_label', $delivery_date_label );
}

/**
 * Get the require delivery date option added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_require_delivery_date() {
    $basic = get_option( 'dtwc_basic' );

    // Turn off delivery date requirement.
    $require_delivery_date = 'off';

    if ( isset( $basic['require_delivery_date'] ) && '' !== $basic['require_delivery_date'] ) {
        $require_delivery_date = $basic['require_delivery_date'];
    }

	return apply_filters( 'dtwc_require_delivery_date', $require_delivery_date );
}

/**
 * Get the delivery time label added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_delivery_time_label() {
    $basic = get_option( 'dtwc_basic' );

    // Set default delivery time label.
    $delivery_time_label = __( 'Delivery time', 'delivery-times-for-woocommerce' );

    if ( isset( $basic['delivery_time_label'] ) && '' !== $basic['delivery_time_label'] ) {
        $delivery_time_label = $basic['delivery_time_label'];
    }

	return apply_filters( 'dtwc_delivery_time_label', $delivery_time_label );
}

/**
 * Get the require delivery time option added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_require_delivery_time() {
    $basic = get_option( 'dtwc_basic' );

    // Turn off delivery time requirement.
    $require_delivery_time = 'off';

    if ( isset( $basic['require_delivery_time'] ) && '' !== $basic['require_delivery_time'] ) {
        $require_delivery_time = $basic['require_delivery_time'];
    }

	return apply_filters( 'dtwc_require_delivery_time', $require_delivery_time );
}

/**
 * Get the prep days added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_delivery_prep_days() {
    $basic = get_option( 'dtwc_basic' );

    // Prep days (default).
    $prep_days = 0;

    if ( isset( $basic['prep_days'] ) && '' !== $basic['prep_days'] ) {
        $prep_days = $basic['prep_days'];
    }

	return apply_filters( 'dtwc_delivery_prep_days', $prep_days );
}

/**
 * Get the prep time added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_delivery_prep_time() {
    $basic = get_option( 'dtwc_basic' );

    // Prep time (default).
    $prep_time = NULL;

    if ( isset( $basic['prep_time'] ) && '' !== $basic['prep_time'] ) {
        $prep_time = $basic['prep_time'];
    }

	return apply_filters( 'dtwc_delivery_prep_time', $prep_time );
}

/**
 * Get the pre-order days added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_delivery_preorder_days() {
    $basic = get_option( 'dtwc_basic' );

    // Preorder days (default).
    $preorder_days = NULL;

    if ( isset( $basic['preorder_days'] ) && '' !== $basic['preorder_days'] ) {
        $preorder_days = $basic['preorder_days'];
    }

	return apply_filters( 'dtwc_delivery_preorder_days', $preorder_days );
}

/**
 * Get the Delivery time placement for Edit Order screens
 *
 * @return string|bool
 */
function dtwc_delivery_time_edit_order_display() {
    $business = get_option( 'dtwc_advanced' );

    // Turn off display (default).
    $display = FALSE;

    if ( isset( $business['delivery_time_edit_order_display'] ) && '' !== $business['delivery_time_edit_order_display'] ) {
        $display = $business['delivery_time_edit_order_display'];
    }

	return apply_filters( 'dtwc_delivery_time_edit_order_display', $display );
}
