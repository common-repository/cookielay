<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
	die;
}

function uninstall() {
	drop_tables();
	delete_settings();
}

function drop_tables() {
	global $wpdb;
	$group_table = $wpdb->prefix . 'cookielay_groups';
	$cookie_table = $wpdb->prefix . 'cookielay_cookies';
	$wpdb->query("DROP TABLE IF EXISTS $group_table,$cookie_table");
}

function delete_settings() {
	global $wpdb;
	$tablename = $wpdb->prefix . 'options';
	$wpdb->delete($tablename, array("option_name" => 'cookielay_status'));
	$wpdb->delete($tablename, array("option_name" => 'cookielay_version'));
	$wpdb->delete($tablename, array("option_name" => 'cookielay_token'));
	$wpdb->delete($tablename, array("option_name" => 'cookielay_settings_main'));
	$wpdb->delete($tablename, array("option_name" => 'cookielay_settings_style'));
	$wpdb->delete($tablename, array("option_name" => 'cookielay_settings_text'));
	$wpdb->delete($tablename, array("option_name" => 'cookielay_settings_prime'));
}

uninstall();

?>