<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    DTWC
 * @subpackage DTWC/includes
 * @author     Devio Digital <contact@deviodigital.com>
 * @license    GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://www.deviodigital.com
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    DTWC
 * @subpackage DTWC/includes
 * @author     Devio Digital <contact@deviodigital.com>
 * @license    GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://www.deviodigital.com
 */
class Delivery_Times_For_WooCommerce_i18n {


    /**
     * Load the plugin text domain for translation.
     *
     * @since  1.0
     * @return void
     */
    public function load_plugin_textdomain() {

        load_plugin_textdomain(
            'delivery-times-for-woocommerce',
            false,
            dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
        );

    }



}
