<?php
/**
 * Cookielay language
 * 
 * Define the internationalization functionality.
 * 
 * @package cookielay
 * @subpackage cookielay/includes
 */

class Cookielay_i18n {
    private $loader;

    public function __construct($loader) {
        $this->loader = $loader;
    }

    public function set_locale() {
        $this->loader->add_action('init', $this, 'load_languages');
    }

    public function load_languages() {
        $lang_path = dirname(dirname(plugin_basename( __FILE__ ))) . '/languages/';
        load_plugin_textdomain('cookielay', false, $lang_path);
    }
}