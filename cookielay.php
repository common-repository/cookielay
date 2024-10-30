<?php
/**
 * Plugin Name:       Cookielay
 * Plugin URI:        https://www.cookielay.com
 * Description:       With Cookielay you manage cookies in a privacy compliant way.
 * Version:           1.2.0
 * Requires at least: 4.9
 * Requires PHP:      5.4
 * Author:            Jonas Marlo Lörken
 * Author URI:        https://www.iamjonas.de
 * License:           GPL v3
 * License URI:       http://www.gnu.org/licenses/gpl.html
 * Text Domain:       cookielay
 */

if(!defined('ABSPATH')) {
    exit;
}

define('COOKIELAY_NAME', 'Cookielay');
define('COOKIELAY_PREFIX', 'cookielay_');
define('COOKIELAY_ROOT_PATH', plugin_dir_path(__FILE__));
define('COOKIELAY_ROOT_URL', plugin_dir_url(__FILE__));
define('COOKIELAY_VERSION', '1.2.0');
define('COOKIELAY_WEBSITE', 'https://www.cookielay.com');
define('COOKIELAY_AUTHOR_NAME', 'Jonas Marlo Lörken');
define('COOKIELAY_AUTHOR_WEBSITE', 'https://www.iamjonas.de');

include plugin_dir_path(__FILE__).'includes/class-cookielay-autoloader.php';
$autoloader = new Cookielay_Autoloader();

function cookielay_register_links() {
    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'cookielay_action_links', 10, 2);
}

function cookielay_action_links($links) {
    $customLinks = array(
        '<a href="'.admin_url('admin.php?page=cookielay').'">'.__('Settings', 'cookielay').'</a>',
        '<a href="'.admin_url('admin.php?page=cookielay-help').'">'.__('Help', 'cookielay').'</a>',
        '<a href="'.admin_url('admin.php?page=cookielay-prime').'" style="color:#1a696b;font-weight:bold;">'.__('Premium', 'cookielay').'</a>',
    );
    return array_merge($links, $customLinks);
}

function cookielay_activate() {
    $activator = new Cookielay_Activator();
    $activator->activate();
}

function cookielay_deactivate() {
    $deactivator = new Cookielay_Deactivator();
    $deactivator->deactivate();
}

register_activation_hook(__FILE__, 'cookielay_activate');
register_deactivation_hook(__FILE__, 'cookielay_deactivate');

function cookielay_run() {
    cookielay_register_links();

    $cookielay = new Cookielay();
    $cookielay->run();
} 
cookielay_run();

?>