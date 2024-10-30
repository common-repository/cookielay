<?php
/**
 * The main loader
 * 
 * Register all actions and filter for Cookielay
 * 
 * @package cookielay
 * @subpackage cookielay/includes
 */

class Cookielay_Loader {
    public function add_action($hook, $component, $callback, $priority = 10, $args = 1) {
        add_action($hook, array($component, $callback), $priority, $args);
    }

    public function add_filter($hook, $component, $callback, $priority = 10, $args = 1) {
        add_filter($hook, array($component, $callback), $priority, $args);
    }
}