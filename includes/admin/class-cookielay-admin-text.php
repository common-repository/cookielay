<?php
/**
 * Cookielay Text Class (Admin)
 * 
 * The class for the text page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin
 */

class Cookielay_Admin_Text extends Cookielay_Admin_Page {
    public function run() {
        $this->loader->add_action('admin_init', $this, 'register_settings');
        $this->loader->add_action('admin_menu', $this, 'add_page');
    }

    public function add_page() {
        $this->suffix = add_submenu_page( 'cookielay', __('Text', 'cookielay'), __('Text', 'cookielay'), 'administrator', 'cookielay-text', array( $this, 'render_template' ));
    }

    public function register_settings() {
        register_setting('cookielay_text', 'cookielay_settings_text');
    }

    public function render_template() {
        include COOKIELAY_ROOT_PATH . 'includes/admin/templates/text.php';
    }
}

?>