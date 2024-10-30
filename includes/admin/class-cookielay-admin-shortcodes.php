<?php
/**
 * Cookielay Shortcodes Class (Admin)
 * 
 * The class for the shortcodes page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin
 */

class Cookielay_Admin_Shortcodes extends Cookielay_Admin_Page {
    public function run() {
        $this->loader->add_action('admin_menu', $this, 'add_page');
    }

    public function add_page() {
        $this->suffix = add_submenu_page( 'cookielay', __('Shortcodes', 'cookielay'), __('Shortcodes', 'cookielay'), 'administrator', 'cookielay-shortcodes', array( $this, 'render_template' ));
    }

    public function render_template() {
        include COOKIELAY_ROOT_PATH . 'includes/admin/templates/shortcodes.php';
    }

    private function get_settings() {
        $settings = get_option("cookielay_settings_main");
        return $settings;
    }

    private function get_cookies() {
        global $wpdb;
        $settings = $this->get_settings();
        $essential_group = $settings["essential-group"];
        echo $essential_group;
        $tablename = $wpdb->prefix . 'cookielay_cookies';
        $cookies = $wpdb->get_results("SELECT * FROM $tablename WHERE cookie_group != $essential_group");
        $rows = $wpdb->num_rows;
        
        foreach($cookies as $cookie) {
            $value = '[cookielay action="remove-cookie" text="'.$cookie->title.'-Cookie '.__('disagree', 'cookielay').'" id="'.$cookie->id.'" class="custom-class"]';
            echo "<option value='".$value."'>".$cookie->title."</option>";
        }
    }
}

?>