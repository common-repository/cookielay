<?php
/**
 * Cookielay Template Class (Public)
 * 
 * The class for the public template.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/public
 */

class Cookielay_Public_Template extends Cookielay_Public_Frontend { 
    public function run() {
        $this->loader->add_action('wp_footer', $this, 'render_template');
    }

    public function render_template() {
        $text = $this->get_text();
        $settings = $this->get_settings();
        $styles = $this->get_styles();
        $icon = file_get_contents(COOKIELAY_ROOT_PATH . 'admin/img/icon.svg');
        $layout = $styles["layout"];
        switch($layout) {
            case "center":
                include COOKIELAY_ROOT_PATH . 'templates/cookielay-template-center.php';
                break;
            case "bottom":
                include COOKIELAY_ROOT_PATH . 'templates/cookielay-template-bottom.php';
                break;
            default:
                include COOKIELAY_ROOT_PATH . 'templates/cookielay-template-bottom.php';
        }
    }

    private function get_styles() {
        $styles = get_option("cookielay_settings_style");
        return $styles;
    }

    private function get_text() {
        $text = get_option("cookielay_settings_text");
        return $text;
    }

    private function get_settings() {
        $settings = get_option("cookielay_settings_main");
        return $settings;
    }

    private function get_cookies($group) {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_cookies';
        $cookies = $wpdb->get_results("SELECT * FROM $tablename WHERE cookie_group = $group AND active = 1");
        return $cookies;
    }

    private function get_groups() {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_groups';
        $groups = $wpdb->get_results("SELECT * FROM $tablename");
        return $groups;
    }

    private function show_checkboxes() {
        $groups = $this->get_groups();
        $settings = $this->get_settings();
        foreach($groups as $group) {
            if($group->id == $settings["essential-group"]) {
                echo '<label class="cl-checkbox cl-checkbox--essential"><input type="checkbox" data-cookielay-group="'.$group->id.'" checked disabled><span></span>'.$group->name.'</label>';
            } else {
                $cookies = $this->get_cookies($group->id);
                if($settings["hide-empty-groups"]) {
                    if($cookies) {
                        echo '<label class="cl-checkbox"><input type="checkbox" data-cookielay-group="'.$group->id.'"><span></span>'.$group->name.'</label>';
                    }
                } else {
                    echo '<label class="cl-checkbox"><input type="checkbox" data-cookielay-group="'.$group->id.'"><span></span>'.$group->name.'</label>';
                }
            }
        }
    }

    private function show_cookies($cookies, $essential) {
        $text = $this->get_text();
        foreach($cookies as $cookie) {
            include COOKIELAY_ROOT_PATH . 'includes/public/templates/cookie.php';
        }
    }

    private function show_groups() {
        $groups = $this->get_groups();
        $settings = $this->get_settings();
        $text = $this->get_text();
        foreach($groups as $group) {
            $essential = false;
            if($group->id == $settings["essential-group"]) {
                $essential = true;
            }
            $cookies = $this->get_cookies($group->id);
            if($settings["hide-empty-groups"]) {
                if($cookies) {
                    include COOKIELAY_ROOT_PATH . 'includes/public/templates/group.php';
                }
            } else {
                include COOKIELAY_ROOT_PATH . 'includes/public/templates/group.php';
            }
        }
    }
}

?>