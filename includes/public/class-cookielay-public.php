<?php
/**
 * Cookielay Frontend Class
 * 
 * Used to load all data in the frontend.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/public
 */

class Cookielay_Public { 
    private $loader;
    private $status;

    public function __construct($loader, $status) {
        $this->loader = $loader;
        $this->status = $status;
    }

    public function enqueue_styles() {
        wp_enqueue_style(COOKIELAY_NAME, COOKIELAY_ROOT_URL . 'public/css/cookielay.css' , array(), COOKIELAY_VERSION, 'all');
    }

    public function enqueue_scripts() {
        wp_enqueue_script(COOKIELAY_NAME, COOKIELAY_ROOT_URL . 'public/js/cookielay.js', array('jquery'), COOKIELAY_VERSION, true);
    }

    private function load_frontend() {
        $settings = new Cookielay_Public_Settings($this->loader, $this->status);
        $settings->run();
        $cookies = new Cookielay_Public_Cookies($this->loader, $this->status);
        $cookies->run();
        $style = new Cookielay_Public_Style($this->loader, $this->status);
        $style->run();
        $template = new Cookielay_Public_Template($this->loader, $this->status);
        $template->run();
    }

    public function run() {
        if($this->status) {
            $this->loader->add_action('wp_enqueue_scripts', $this, 'enqueue_styles');
            $this->loader->add_action('wp_enqueue_scripts', $this, 'enqueue_scripts');
            $this->load_frontend();
        }
    }
}

?>