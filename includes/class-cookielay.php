<?php
/**
 * Main Cookielay Class
 * 
 * The main plugin class
 * 
 * @package cookielay
 * @subpackage cookielay/includes
 */

class Cookielay {
    private $loader;
    private $status;
    private $updater;
    private $frontend;
    private $backend;
    private $shortcode;

    public function __construct() {
        $this->loader = new Cookielay_Loader();
        $this->status = $this->get_status();
        $this->updater = new Cookielay_Updater($this->loader);
        $this->frontend = new Cookielay_Public($this->loader, $this->status);
        $this->backend = new Cookielay_Admin($this->loader, $this->status);
        $this->shortcode = new Cookielay_Shortcode();
    }

    public function run() {
        $this->updater->update();
        $this->load_dependencies();
        $this->frontend->run();
        $this->backend->run();
    }

    private function load_dependencies() {
        $this->shortcode->register_shortcode();
    }

    private function get_status() {
        $status = get_option("cookielay_status");
        return $status;
    }
}

?>