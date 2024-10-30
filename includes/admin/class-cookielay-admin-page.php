<?php
/**
 * Cookielay Admin Page Class (Abstract)
 * 
 * The abstract class for the pages in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin
 */

abstract class Cookielay_Admin_Page {
    protected $loader;
    protected $status;

    function __construct($loader, $status) {
        $this->loader = $loader;
        $this->status = $status;

        $this->global_settings();
        $this->global_functions();
    }

    abstract public function run();

    abstract public function add_page();

    abstract public function render_template();

    protected function global_functions() {
        $this->loader->add_action('admin_init', $this, 'global_settings');
        $this->loader->add_action('wp_ajax_reset_cookie', $this, 'reset_cookie');
    }

    public function global_settings() {
        register_setting('cookielay_token', 'cookielay_settings_token');
    }

    public function render_alerts() {
        echo '<div class="cl-alert success" data-cl-alert="cookielay-active"><span><i class="ti-check"></i></span>' . __('Cookielay has been activated.', 'cookielay') . '</div>';
        echo '<div class="cl-alert success" data-cl-alert="cookielay-inactive"><span><i class="ti-check"></i></span>' . __('Cookielay has been disabled.', 'cookielay') . '</div>';
        echo '<div class="cl-alert error" data-cl-alert="cookielay-failed"><span><i class="ti-check"></i></span>' . __('An error has occurred.', 'cookielay') . '</div>';
        echo '<div class="cl-alert success" data-cl-alert="cookie-active"><span><i class="ti-check"></i></span>'.__('The cookie has been activated.', 'cookielay').'</div>';
        echo '<div class="cl-alert success" data-cl-alert="cookie-inactive"><span><i class="ti-check"></i></span>'.__('The cookie has been deactivated.', 'cookielay').'</div>';
        echo '<div class="cl-alert error" data-cl-alert="cookie-failed"><span><i class="ti-check"></i></span>'.__('An error has occurred.', 'cookielay').'</div>';
        echo '<div class="cl-alert success" data-cl-alert="token-reset"><span><i class="ti-check"></i></span>'.__('The Cookielay cookie has been successfully reset.', 'cookielay').'</div>';
        echo '<div class="cl-alert error" data-cl-alert="token-failed"><span><i class="ti-check"></i></span>'.__('The Cookielay cookie could not be reset.', 'cookielay').'</div>';
    }

    protected function show_response() {
        $status = get_settings_errors();
        if($status) {
            $setting = $status[0]["setting"];
            $code = $status[0]["code"];
            $message = $status[0]["message"];
            $type = $status[0]["type"];
            echo '<div class="cl-alert visible '.$type.'"><span><i class="ti-check"></i></span>'.$message.'</div>';
        }
    }

    protected function get_current_site() {
        if(isset($_GET["page"])) {
            $page = sanitize_title($_GET['page']);
        } else {
            $page = "";
        }
        return $page;
    }

    protected function show_status_header() {
        if($this->status) {
            echo '<div class="status active"><span><i class="ti-check"></i></span>'.__('Cookielay is active', 'cookielay').'</div><div class="status inactive" style="display:none;"><span><i class="ti-close"></i></span>'.__('Cookielay is inactive', 'cookielay').'</div>';
        } else {
            echo '<div class="status active" style="display:none;"><span><i class="ti-check"></i></span>'.__('Cookielay is active', 'cookielay').'</div><div class="status inactive"><span><i class="ti-close"></i></span>'.__('Cookielay is inactive', 'cookielay').'</div>';
        }
    }

    public function reset_cookie() {
        $token = uniqid(time());
        $status = update_option('cookielay_token', $token);
        echo $status;
        wp_die();
    }
}

?>