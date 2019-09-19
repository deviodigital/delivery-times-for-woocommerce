=== Delivery Times for WooCommerce ===
Contributors: deviodigital
Tags: delivery, delivery-times, courier, woocommerce, order-delivery
Requires at least: 3.0.1
Tested up to: 5.2.3
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allow your customers to choose their desired delivery date and time during checkout with WooCommerce

== Description ==

Allow your customers to choose their desired delivery date and time during checkout with WooCommerce

## Admin Settings

The Delivery Times for WooCommerce plugin comes with settings that help you customize what delivery date & time options are available for your customers during checkout.

### Basic Settings

* **Pre-order days** - How many days ahead are customers allowed to place an order?
* **Delivery days prep** - How many days notice do you require for delivery?
* **Delivery time prep** - How many hours notice do you require for delivery?
* **Delivery date label** - The label displayed on checkout page and in order details
* **Require delivery date** - Check this box to require customers select a delivery date during checkout
* **Delivery time label** - The label displayed on checkout page and in order details
* **Require delivery time** - Check this box to require customers select a delivery time during checkout

### Business Hours

* **Delivery days** - Check the box for each day of the week that you offer delivery
* **Opening time** - What time does your business start delivering orders?
* **Closing time** - What time does your business stop delivering orders?

### Delivery Drivers for WooCommerce

This plugin allows offers better driver management for all delivery services who use WooCommerce, streamlining your workflow and increasing your bottom line.

Learn more at [Delivery Drivers for WooCommerce](https://www.wordpress.org/plugins/delivery-drivers-for-woocommerce)

### Delivery Fees for WooCommerce

Our WooCommerce delivery fees plugin adds a custom shipping method to WooCommerce specifically for delivery services.

Learn more at [Delivery Fees for WooCommerce](https://www.wordpress.org/plugins/delivery-fees-for-woocommerce)

== Installation ==

1. In your dashboard, go to `Plugins -> Add New`
2. Search for `Delivery Times for WooCommerce` and install this plugin
3. Pat yourself on the back for a job well done :)

== Screenshots ==

1. Example of the `Delivery Date` & `Delivery Time` fields on checkout.
2. Date picker with days disabled based on your chosen settings
3. Time selection displaying 30min intervals based on your opening & closing times in settings
4. DTWC Settings Basic Settings screen
5. DTWC Settings Advanced Settings screen
6. Delivery date & time added to Successful Order details screen
7. Delivery date & time added to WooCommerce admin Order details screen

== Changelog ==

= 1.2 =
* Added JavaScript to remove delivery times if selected delivery date is today in `public/js/dtwc-publc.js`
* Added delivery times details to WooCommerce Edit order screen in `admin/dtwc-woocommerce-settings.php`
* Added delivery times details to Driver Dashboard order details in `admin/dtwc-ddwc-settings.php`
* Updated `delivery_date` and `delivery_time` variable names in `admin/dtwc-woocommerce-checkout.php`
* Updated checkout delivery times to include all times from open to close by default in `admin/dtwc-woocommerce-checkout.php`
* Updated text strings for localization in `languages/dtwc.pot`

= 1.1 =
* Added `dtwc_checkout_deliter_times_select_default_text` filter in `admin/dtwc-woocommerce-checkout.php`
* Added `dtwc_order_received_delivery_details` filter in `admin/dtwc-woocommerce-checkout.php`
* Added `dtwc_settings_delivery_days_options` filter in `admin/dtwc-admin-settings.php`
* Added `dtwc_order_received_delivery_details_before` action hook in `admin/dtwc-woocommerce-checkout.php`
* Added `dtwc_order_received_delivery_details_after` action hook in `admin/dtwc-woocommerce-checkout.php`
* Bugfix misspelling of `delivery_time_label` name in `admin/dtwc-helper-functions.php`
* Bugfix changed delivery time label text to use helper function in `admin/dtwc-woocommerce-checkout.php`
* Bugfix prep time check for delivery times options in `admin/dtwc-woocommerce-checkout.php`
* Updated text strings for localization in `languages/dtwc.pot`
* General code cleanup throughout multiple files

= 1.0 =
* Initial release