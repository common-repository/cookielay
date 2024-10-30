<?php
/**
 * Cookielay Prime Class (Admin)
 * 
 * The class for the prime page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin
 */

class Cookielay_Admin_Prime extends Cookielay_Admin_Page {
    public function run() {
        $this->loader->add_action('admin_menu', $this, 'add_page');
    }

    public function add_page() {
        $this->suffix = add_submenu_page( 'cookielay', __('Premium', 'cookielay'), __('Premium', 'cookielay'), 'administrator', 'cookielay-prime', array( $this, 'render_template' ));
    }

    public function render_template() {
        include COOKIELAY_ROOT_PATH . 'includes/admin/templates/prime.php';
    }
}

?>