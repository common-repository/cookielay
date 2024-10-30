<?php
/**
 * Cookielay Dashboard Class (Admin)
 * 
 * The class for the dashboard in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin
 */

class Cookielay_Admin_Dashboard extends Cookielay_Admin_Page {
    public function run() {
        $this->loader->add_action('admin_init', $this, 'register_settings');
        $this->loader->add_action('admin_menu', $this, 'add_page');
        $this->loader->add_action('wp_ajax_toggle_cookielay', $this, 'toggle_cookielay');
    }

    public function add_page() {
        $this->suffix = add_submenu_page( 'cookielay', __('Dashboard', 'cookielay'), __('Dashboard', 'cookielay'), 'administrator', 'cookielay', array( $this, 'render_template' ));
    }

    public function register_settings() {
        register_setting('cookielay_status', 'cookielay_settings_status');
    }

    public function render_template() {
        include COOKIELAY_ROOT_PATH . 'includes/admin/templates/dashboard.php';
    }

    public function toggle_cookielay() {
        $status = false;
        if(isset($_POST["active"])) {
            $active = (int) $_POST["active"];
            $status = update_option('cookielay_status', $active);
        }
        echo $status;
        wp_die();
    }

    public function show_status() {
        if($this->status) {
            echo '<span class="active">'.__('Active', 'cookielay').'</span><span class="inactive" style="display:none;">' . __('Inactive', 'cookielay') . '</span>';
        } else {
            echo '<span class="active" style="display:none;">'.__('Active', 'cookielay').'</span><span class="inactive">' . __('Inactive', 'cookielay') . '</span>';
        }
    }

    public function show_version() {
        echo COOKIELAY_VERSION;
    }
}

?>