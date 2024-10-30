<?php
/**
 * Cookielay Admin Class
 * 
 * Used to load all data in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin
 */

class Cookielay_Admin {
    private $loader;
    private $status;

    public function __construct($loader, $status) {
        $this->loader = $loader;
        $this->status = $status;
    }

    public function add_page() {
        $icon = base64_encode(file_get_contents(COOKIELAY_ROOT_PATH . 'admin/img/icon.svg'));
        add_menu_page('Cookielay', 'Cookielay', 'administrator', 'cookielay', '', 'data:image/svg+xml;base64,' . $icon, 99999);
    }

    private function load_subpages() {
        $dashboard = new Cookielay_Admin_Dashboard($this->loader, $this->status);
        $dashboard->run();
        $settings = new Cookielay_Admin_Settings($this->loader, $this->status);
        $settings->run();
        $style = new Cookielay_Admin_Style($this->loader, $this->status);
        $style->run();
        $text = new Cookielay_Admin_Text($this->loader, $this->status);
        $text->run();
        $cookies = new Cookielay_Admin_Cookies($this->loader, $this->status);
        $cookies->run();
        $shortcodes = new Cookielay_Admin_Shortcodes($this->loader, $this->status);
        $shortcodes->run();
        $prime = new Cookielay_Admin_Prime($this->loader, $this->status);
        $prime->run();
        $help = new Cookielay_Admin_Help($this->loader, $this->status);
        $help->run();
    }

    public function load_styles() {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style(COOKIELAY_PREFIX . 'themify', COOKIELAY_ROOT_URL . 'admin/css/themify-icons.css' , array(), COOKIELAY_VERSION, 'all');
        wp_enqueue_style(COOKIELAY_PREFIX . 'main', COOKIELAY_ROOT_URL . 'admin/css/app.css' , array(), COOKIELAY_VERSION, 'all');
    }

    public function load_scripts() {
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script(COOKIELAY_NAME, COOKIELAY_ROOT_URL . 'admin/js/app.js', array('jquery'), COOKIELAY_VERSION, true);
    }

    public function load_codeeditor() {
        $css_editor = wp_enqueue_code_editor(array('type' => 'text/css'));
        wp_localize_script('jquery', 'codeeditor_settings_css', $css_editor);
        $html_editor = wp_enqueue_code_editor(array('type' => 'text/html'));
        wp_localize_script('jquery', 'codeeditor_settings_html', $html_editor);
    }

    public function load_mediaselect() {
        wp_enqueue_media();
    }

    public function run() {
        $this->loader->add_action('admin_enqueue_scripts', $this, 'load_styles');
        $this->loader->add_action('admin_enqueue_scripts', $this, 'load_scripts');
        $this->loader->add_action('admin_enqueue_scripts', $this, 'load_codeeditor');
        $this->loader->add_action('admin_enqueue_scripts', $this, 'load_mediaselect');
        $this->loader->add_action('admin_menu', $this, 'add_page');
        $this->load_subpages();
    }
}

?>