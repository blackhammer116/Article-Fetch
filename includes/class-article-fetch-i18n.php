<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://nebiyu.com
 * @since      1.0.0
 *
 * @package    Article_Fetch
 * @subpackage Article_Fetch/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Article_Fetch
 * @subpackage Article_Fetch/includes
 * @author     Nebiyu <nebiyuhiyabu@gmail.com>
 */
class Article_Fetch_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'article-fetch',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
