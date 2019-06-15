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
 * Get the Delivery days selected in the DTWC Admin Settings
 *
 * @return string|bool
 */
function dtwc_business_delivery_days() {
    $business = get_option( 'dtwc_business' );

    if ( isset( $business['delivery_days'] ) && '' !== $business['delivery_days'] ) {
        $delivery_days = $business['delivery_days'];
    } else {
        $delivery_days = FALSE;
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

    if ( isset( $business['opening_time'] ) && '' !== $business['opening_time'] ) {
        $opening_time = $business['opening_time'];
    } else {
        $opening_time = FALSE;
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

    if ( isset( $business['closing_time'] ) && '' !== $business['closing_time'] ) {
        $closing_time = $business['closing_time'];
    } else {
        $closing_time = FALSE;
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

    if ( isset( $basic['delivery_date_label'] ) && '' !== $basic['delivery_date_label'] ) {
        $delivery_date_label = $basic['delivery_date_label'];
    } else {
        $delivery_date_label = 'Delivery date';
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

    if ( isset( $basic['require_delivery_date'] ) && '' !== $basic['require_delivery_date'] ) {
        $require_delivery_date = $basic['require_delivery_date'];
    } else {
        $require_delivery_date = 'off';
    }

	return apply_filters( 'dtwc_require_delivery_date', $require_delivery_date );
}

/**
 * Get the delivery time label added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_business_delivery_time_label() {
    $basic = get_option( 'dtwc_basic' );

    if ( isset( $basic['delivery_tume_label'] ) && '' !== $basic['delivery_time_label'] ) {
        $delivery_time_label = $basic['delivery_time_label'];
    } else {
        $delivery_time_label = 'Delivery time';
    }

	return apply_filters( 'dtwc_business_delivery_time_label', $delivery_time_label );
}

/**
 * Get the require delivery time option added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_require_delivery_time() {
    $basic = get_option( 'dtwc_basic' );

    if ( isset( $basic['require_delivery_time'] ) && '' !== $basic['require_delivery_time'] ) {
        $require_delivery_time = $basic['require_delivery_time'];
    } else {
        $require_delivery_time = 'off';
    }

	return apply_filters( 'dtwc_require_delivery_time', $require_delivery_time );
}

/**
 * Get the prep days added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_business_delivery_prep_days() {
    $basic = get_option( 'dtwc_basic' );

    if ( isset( $basic['prep_days'] ) && '' !== $basic['prep_days'] ) {
        $prep_days = $basic['prep_days'];
    } else {
        $prep_days = NULL;
    }

	return apply_filters( 'dtwc_business_delivery_prep_days', $prep_days );
}

/**
 * Get the prep time added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_business_delivery_prep_time() {
    $basic = get_option( 'dtwc_basic' );

    if ( isset( $basic['prep_time'] ) && '' !== $basic['prep_time'] ) {
        $prep_time = $basic['prep_time'];
    } else {
        $prep_time = NULL;
    }

	return apply_filters( 'dtwc_business_delivery_prep_time', $prep_time );
}

/**
 * Get the pre-order days added in the DTWC admin settings
 *
 * @return string|bool
 */
function dtwc_business_delivery_preorder_days() {
    $basic = get_option( 'dtwc_basic' );

    if ( isset( $basic['preorder_days'] ) && '' !== $basic['preorder_days'] ) {
        $preorder_days = $basic['preorder_days'];
    } else {
        $preorder_days = NULL;
    }

	return apply_filters( 'dtwc_business_delivery_preorder_days', $preorder_days );
}
