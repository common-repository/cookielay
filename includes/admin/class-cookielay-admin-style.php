<?php
/**
 * Cookielay Style Class (Admin)
 * 
 * The class for the style page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin
 */

class Cookielay_Admin_Style extends Cookielay_Admin_Page {
    public function run() {
        $this->loader->add_action('admin_init', $this, 'register_settings');
        $this->loader->add_action('admin_menu', $this, 'add_page');
        $this->loader->add_filter('pre_update_option', $this, 'style_preset', 10, 2);
        $this->loader->add_filter('pre_update_option', $this, 'check_values', 10, 2);
    }

    public function add_page() {
        $this->suffix = add_submenu_page( 'cookielay', __('Style', 'cookielay'), __('Style', 'cookielay'), 'administrator', 'cookielay-style', array( $this, 'render_template' ));
    }

    public function register_settings() {
        register_setting('cookielay_style', 'cookielay_settings_style');
    }

    public function render_template() {
        include COOKIELAY_ROOT_PATH . 'includes/admin/templates/style.php';
    }

    public function check_values($value, $option) {
        if($option == "cookielay_settings_style") {
            if(!isset($value["css"])) {
                $value["css"] = "";
            }
        }
        return $value;
    }

    public function style_preset($value, $option) {
        if($option == "cookielay_settings_style") {
            $preset = $value["preset"];
            switch($preset) {
                case "cookielay":
                    $background = "#1a696b";
                    $secondary = "#155556";
                    $text = "#ffffff";
                    $border = "#ffffff";
                    $switch_background = "#427778";
                    $switch_toggle = "#8eadae";
                    $branding_primary = "#ffffff";
                    $branding_secondary = "#f1f1f1";
                    break;
                case "light":
                    $background = "#ffffff";
                    $secondary = "#efefef";
                    $text = "#151515";
                    $border= "#f0f0f0";
                    $switch_background = "#bfbfbf";
                    $switch_toggle = "#737373";
                    $branding_primary = "#151515";
                    $branding_secondary = "#434343";
                    break;
                case "dark":
                    $background = "#151515";
                    $secondary = "#2f2f2f";
                    $text = "#ffffff";
                    $border = "#323232";
                    $switch_background = "#595959";
                    $switch_toggle = "#9b9b9b";
                    $branding_primary = "#ffffff";
                    $branding_secondary = "#f1f1f1";
                    break;
            }
            $value["overlay-background"] = $text;
            $value["cookielay-background"] = $background;
            $value["headline-color"] = $text;
            $value["text-color"] = $text;
            $value["link-color"] = $text;
            $value["border-color"] = $border;
            $value["checkbox-color"] = $text;
            $value["checkbox-color-icon"] = $background;
            $value["accordion-background"] = $secondary;
            $value["accordion-text"] = $text;
            $value["switch-background"] = $switch_background;
            $value["switch-toggle-background-inactive"] = $switch_toggle;
            $value["switch-toggle-background-active"] = $text;
            $value["link-button-color-normal"] = $text;
            $value["link-button-color-hover"] = $text;
            $value["primary-button-color-normal"] = $background;
            $value["primary-button-color-hover"] = $background;
            $value["primary-button-background-normal"] = $text;
            $value["primary-button-background-hover"] = $text;
            $value["secondary-button-color-normal"] = $text;
            $value["secondary-button-color-hover"] = $background;
            $value["secondary-button-border-normal"] = $text;
            $value["secondary-button-border-hover"] = $text;
            $value["branding-primary"] = $branding_primary;
            $value["branding-secondary"] = $branding_secondary;
        }
        return $value;
    }
}

?>