<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    DTWC
 * @subpackage DTWC/admin
 * @author     Devio Digital <contact@deviodigital.com>
 * @license    GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://www.deviodigital.com
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    DTWC
 * @subpackage DTWC/admin
 * @author     Devio Digital <contact@deviodigital.com>
 * @license    GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://www.deviodigital.com
 */
class Delivery_Times_For_WooCommerce_Admin {

    /**
     * The ID of this plugin.
     *
     * @since  1.0
     * @access private
     * @var    string    $_plugin_name    The ID of this plugin.
     */
    private $_plugin_name;

    /**
     * The version of this plugin.
     *
     * @since  1.0
     * @access private
     * @var    string    $_version    The current version of this plugin.
     */
    private $_version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $_plugin_name - The name of this plugin.
     * @param string $_version     - The version of this plugin.
     * 
     * @since 1.0.0
     */
    public function __construct( $_plugin_name, $_version ) {

        $this->plugin_name = $_plugin_name;
        $this->version     = $_version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since  1.0
     * @return void
     */
    public function enqueue_styles() {
        //wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dtwc-admin.css', array(), $this->version, 'all' );
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since  1.0
     * @return void
     */
    public function enqueue_scripts() {
        //wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dtwc-admin.js', array( 'jquery' ), $this->version, false );
    }

}
