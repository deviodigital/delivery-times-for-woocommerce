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
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'DTWC_ADMIN_VERSION' ) ) {
	define( 'DTWC_ADMIN_VERSION', '1.0.0' );
}
if ( ! defined( 'DTWC_ADMIN_NAME' ) ) {
	define( 'DTWC_ADMIN_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}
if ( ! defined( 'DTWC_ADMIN_DIR' ) ) {
	define( 'DTWC_ADMIN_DIR', WP_PLUGIN_DIR . '/' . DTWC_ADMIN_NAME );
}
if ( ! defined( 'DTWC_ADMIN_URL' ) ) {
	define( 'DTWC_ADMIN_URL', WP_PLUGIN_URL . '/' . DTWC_ADMIN_NAME );
}

/**
 * WP-OOP-Settings-API Initializer
 *
 * Initializes the WP-OOP-Settings-API.
 *
 * @since   1.0.0
 */

/**
 * Class `WP_OOP_Settings_API`.
 *
 * @since 1.0.0
 */
require_once DTWC_ADMIN_DIR . '/class-dtwc-admin-settings.php';

/**
 * Actions/Filters
 *
 * Related to all settings API.
 *
 * @since  1.0.0
 */
if ( class_exists( 'DTWC_ADMIN_SETTINGS' ) ) {
	/**
	 * Object Instantiation.
	 *
	 * Object for the class `DTWC_ADMIN_SETTINGS`.
	 */
	$dtwc_obj = new DTWC_ADMIN_SETTINGS();

    // Section: Basic Settings.
	$dtwc_obj->add_section(
		array(
			'id'    => 'dtwc_basic',
			'title' => __( 'Basic Settings', 'dtwc' ),
		)
	);
	// Section: Other Settings.
	$dtwc_obj->add_section(
		array(
			'id'    => 'dtwc_business',
			'title' => __( 'Business Hours', 'dtwc' ),
		)
	);

    // Field: Pre-order days.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'                => 'preorder_days',
			'type'              => 'number',
			'name'              => __( 'Pre-order days', 'dtwc' ),
			'desc'              => __( 'How many days ahead are customers allowed to place an order? (leave blank for no limit)', 'dtwc' ),
			'default'           => '',
			'sanitize_callback' => 'intval',
		)
    );

	// Field: Preparation days.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'                => 'prep_days',
			'type'              => 'number',
			'name'              => __( 'Delivery days prep', 'dtwc' ),
			'desc'              => __( 'How many days notice do you require for delivery? (leave blank to allow same-day delivery)', 'dtwc' ),
			'default'           => '',
			'sanitize_callback' => 'intval',
		)
	);

	// Field: Delivery time prep.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'                => 'prep_time',
			'type'              => 'number',
			'name'              => __( 'Delivery time prep', 'dtwc' ),
			'desc'              => __( 'How many hours notice do you require for delivery? (useful for same-day delivery)', 'dtwc' ),
			'default'           => '',
			'sanitize_callback' => 'intval',
		)
	);

    // Field: Separator.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'   => 'separator_1',
			'type' => 'separator',
		)
	);

    // Field: Delivery date label.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'      => 'delivery_date_label',
			'type'    => 'text',
			'name'    => __( 'Delivery date label', 'dtwc' ),
			'desc'    => __( 'The label displayed on checkout page and in order details', 'dtwc' ),
			'default' => __( 'Delivery date', 'dtwc' ),
		)
	);

	// Field: Require delivery date.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'   => 'require_delivery_date',
			'type' => 'checkbox',
			'name' => __( 'Require delivery date', 'dtwc' ),
			'desc' => __( 'Check this box to require customers select a delivery date during checkout', 'dtwc' ),
		)
	);

    // Field: Separator.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'   => 'separator_2',
			'type' => 'separator',
		)
	);

    // Field: Delivery time label.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'      => 'delivery_time_label',
			'type'    => 'text',
			'name'    => __( 'Delivery time label', 'dtwc' ),
			'desc'    => __( 'The label displayed on checkout page and in order details', 'dtwc' ),
			'default' => __( 'Delivery time', 'dtwc' ),
		)
	);

    // Field: Require delivery time.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'   => 'require_delivery_time',
			'type' => 'checkbox',
			'name' => __( 'Require delivery time', 'dtwc' ),
			'desc' => __( 'Check this box to require customers select a delivery time during checkout', 'dtwc' ),
		)
	);

	// Array: Delivery days.
	$delivery_days = array(
		'sunday'    => __( 'Sunday', 'dtwc' ),
		'monday'    => __( 'Monday', 'dtwc' ),
		'tuesday'   => __( 'Tuesday', 'dtwc' ),
		'wednesday' => __( 'Wednesday', 'dtwc' ),
		'thursday'  => __( 'Thursday', 'dtwc' ),
		'friday'    => __( 'Friday', 'dtwc' ),
		'saturday'  => __( 'Saturday', 'dtwc' ),
	);

	// Field: Multicheck.
	$dtwc_obj->add_field(
		'dtwc_business',
		array(
			'id'      => 'delivery_days',
			'type'    => 'multicheck',
			'name'    => __( 'Delivery Days', 'dtwc' ),
			'desc'    => __( 'Select the days of the week that you are open for business', 'dtwc' ),
			'options' => apply_filters( 'dtwc_settings_delivery_days_options', $delivery_days ),
		)
	);

    // Field: Opening time.
	$dtwc_obj->add_field(
		'dtwc_business',
		array(
			'id'      => 'opening_time',
			'type'    => 'time',
			'name'    => __( 'Opening time', 'dtwc' ),
			'desc'    => __( 'What time does your business start delivering orders?', 'dtwc' ),
		)
	);

    // Field: Opening time.
	$dtwc_obj->add_field(
		'dtwc_business',
		array(
			'id'      => 'closing_time',
			'type'    => 'time',
			'name'    => __( 'Closing time', 'dtwc' ),
			'desc'    => __( 'What time does your business stop delivering orders?', 'dtwc' ),
		)
	);


}