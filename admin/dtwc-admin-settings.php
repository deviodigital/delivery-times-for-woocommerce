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
			'title' => esc_attr__( 'Basic Settings', 'dtwc' ),
		)
	);
	// Section: Business Settings.
	$dtwc_obj->add_section(
		array(
			'id'    => 'dtwc_business',
			'title' => esc_attr__( 'Business Hours', 'dtwc' ),
		)
	);
	// Section: Advanced Settings.
	$dtwc_obj->add_section(
		array(
			'id'    => 'dtwc_advanced',
			'title' => esc_attr__( 'Advanced Settings', 'dtwc' ),
		)
	);

    // Field: Pre-order days.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'                => 'preorder_days',
			'type'              => 'number',
			'name'              => esc_attr__( 'Pre-order days', 'dtwc' ),
			'desc'              => esc_attr__( 'How many days ahead are customers allowed to place an order? (leave blank for no limit)', 'dtwc' ),
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
			'name'              => esc_attr__( 'Delivery days prep', 'dtwc' ),
			'desc'              => esc_attr__( 'How many days notice do you require for delivery? (leave blank to allow same-day delivery)', 'dtwc' ),
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
			'name'              => esc_attr__( 'Delivery time prep', 'dtwc' ),
			'desc'              => esc_attr__( 'How many hours notice do you require for delivery? (useful for same-day delivery)', 'dtwc' ),
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
			'name'    => esc_attr__( 'Delivery date label', 'dtwc' ),
			'desc'    => esc_attr__( 'The label displayed on checkout page and in order details', 'dtwc' ),
			'default' => esc_attr__( 'Delivery date', 'dtwc' ),
		)
	);

	// Field: Require delivery date.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'   => 'require_delivery_date',
			'type' => 'checkbox',
			'name' => esc_attr__( 'Require delivery date', 'dtwc' ),
			'desc' => esc_attr__( 'Check this box to require customers select a delivery date during checkout', 'dtwc' ),
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
			'name'    => esc_attr__( 'Delivery time label', 'dtwc' ),
			'desc'    => esc_attr__( 'The label displayed on checkout page and in order details', 'dtwc' ),
			'default' => esc_attr__( 'Delivery time', 'dtwc' ),
		)
	);

    // Field: Require delivery time.
	$dtwc_obj->add_field(
		'dtwc_basic',
		array(
			'id'   => 'require_delivery_time',
			'type' => 'checkbox',
			'name' => esc_attr__( 'Require delivery time', 'dtwc' ),
			'desc' => esc_attr__( 'Check this box to require customers select a delivery time during checkout', 'dtwc' ),
		)
	);

	// Array: Delivery days.
	$delivery_days = array(
		'sunday'    => esc_attr__( 'Sunday', 'dtwc' ),
		'monday'    => esc_attr__( 'Monday', 'dtwc' ),
		'tuesday'   => esc_attr__( 'Tuesday', 'dtwc' ),
		'wednesday' => esc_attr__( 'Wednesday', 'dtwc' ),
		'thursday'  => esc_attr__( 'Thursday', 'dtwc' ),
		'friday'    => esc_attr__( 'Friday', 'dtwc' ),
		'saturday'  => esc_attr__( 'Saturday', 'dtwc' ),
	);

	// Field: Multicheck.
	$dtwc_obj->add_field(
		'dtwc_business',
		array(
			'id'      => 'delivery_days',
			'type'    => 'multicheck',
			'name'    => esc_attr__( 'Delivery Days', 'dtwc' ),
			'desc'    => esc_attr__( 'Select the days of the week that you are open for business', 'dtwc' ),
			'options' => apply_filters( 'dtwc_settings_delivery_days_options', $delivery_days ),
		)
	);

    // Field: Opening time.
	$dtwc_obj->add_field(
		'dtwc_business',
		array(
			'id'      => 'opening_time',
			'type'    => 'time',
			'name'    => esc_attr__( 'Opening time', 'dtwc' ),
			'desc'    => esc_attr__( 'What time does your business start delivering orders?', 'dtwc' ),
		)
	);

    // Field: Opening time.
	$dtwc_obj->add_field(
		'dtwc_business',
		array(
			'id'      => 'closing_time',
			'type'    => 'time',
			'name'    => esc_attr__( 'Closing time', 'dtwc' ),
			'desc'    => esc_attr__( 'What time does your business stop delivering orders?', 'dtwc' ),
		)
	);

    // Field: Delivery time edit order display.
	$dtwc_obj->add_field(
		'dtwc_advanced',
		array(
			'id'      => 'delivery_time_edit_order_display',
			'type'    => 'select',
			'name'    => esc_attr__( 'Delivery time admin placement', 'dtwc' ),
			'desc'    => esc_attr__( 'Choose where to display the delivery time on the Edit Order screen', 'dtwc' ),
            'options' => array(
                'billing'  => esc_attr__( 'After the billing address', 'dtwc' ),
                'shipping' => esc_attr__( 'After the shipping address', 'dtwc' )
            ),
            'default' => 'shipping',
		)
	);



}
