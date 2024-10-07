<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nebiyu.com
 * @since             1.0.0
 * @package           Article_Fetch
 *
 * @wordpress-plugin
 * Plugin Name:       Article fetch
 * Plugin URI:        https://newsapi.org
 * Description:       Get the latest news and articles here
 * Version:           1.0.0
 * Author:            Nebiyu
 * Author URI:        https://nebiyu.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       article-fetch
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ARTICLE_FETCH_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-article-fetch-activator.php
 */
function activate_article_fetch() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-article-fetch-activator.php';
	Article_Fetch_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-article-fetch-deactivator.php
 */
function deactivate_article_fetch() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-article-fetch-deactivator.php';
	Article_Fetch_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_article_fetch' );
register_deactivation_hook( __FILE__, 'deactivate_article_fetch' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-article-fetch.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_article_fetch() {

	$plugin = new Article_Fetch();
	$plugin->run();

}
run_article_fetch();
