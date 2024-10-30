<?php
/**
 * Cookielay Settings Class (Admin)
 * 
 * The class for the settings page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin
 */

class Cookielay_Admin_Settings extends Cookielay_Admin_Page {
    public function run() {
        $this->loader->add_action('admin_init', $this, 'register_settings');
        $this->loader->add_action('admin_menu', $this, 'add_page');
        $this->loader->add_filter('pre_update_option', $this, 'set_essential_cookie', 10, 2);
        $this->loader->add_filter('pre_update_option', $this, 'change_essential_group', 10, 2);
        $this->loader->add_filter('pre_update_option', $this, 'check_values', 10, 2);
    }

    public function add_page() {
        $this->suffix = add_submenu_page( 'cookielay', __('Settings', 'cookielay'), __('Settings', 'cookielay'), 'administrator', 'cookielay-settings', array( $this, 'render_template' ));
    }

    public function register_settings() {
        register_setting('cookielay_main', 'cookielay_settings_main');
    }

    public function render_template() {
        include COOKIELAY_ROOT_PATH . 'includes/admin/templates/settings.php';
    }

    public function check_values($value, $option) {
        if($option == "cookielay_settings_main") {
            if(!isset($value["posts-exceptions"])) {
                $value["posts-exceptions"] = "";
            }
            if(!isset($value["posttypes-exceptions"])) {
                $value["posttypes-exceptions"] = "";
            }
            if(!isset($value["deactivate-bots"])) {
                $value["deactivate-bots"] = "";
            }
            if(!isset($value["reload"])) {
                $value["reload"] = "";
            }
            if(!isset($value["hide-empty-groups"])) {
                $value["hide-empty-groups"] = "";
            }
            if(!isset($value["hide-checkboxes"])) {
                $value["hide-checkboxes"] = "";
            }
            if(!isset($value["enable-scroll"])) {
                $value["enable-scroll"] = "";
            }
            if(!isset($value["hide-branding"])) {
                $value["hide-branding"] = "";
            }
        }
        return $value;
    }

    public function change_essential_group($value, $option) {
        if($option == "cookielay_settings_main") {
            global $wpdb;
            $cookie_id = $value["cookielay-cookie"];
            $essential_group = $value["essential-group"];
            $tablename = $wpdb->prefix . 'cookielay_cookies';
            $wpdb->update($tablename, array("active" => 1, "cookie_group" => $essential_group), array("id" => $cookie_id));
        }
        return $value;
    }

    public function set_essential_cookie($value, $option) {
        $settings = get_option('cookielay_settings_main');
        if($option == "cookielay_settings_main" && !isset($value["cookielay-cookie"])) {
            $value["cookielay-cookie"] = $settings["cookielay-cookie"];
        }
        return $value;
    }

    private function get_posts() {
        $objects = get_posts(array('numberposts' => 99, 'post_type' => 'page', "order" => "ASC"));
        $posts = array();
        foreach($objects as $object) {
            array_push($posts, array("id" => $object->ID, "title" => $object->post_title));
        }
        return $posts;
    }

    private function get_posttypes() {
        $objects = get_post_types([], "objects");
        $posttypes = array();
        foreach($objects as $object) {
            $exclude = array("attachment", "revision", "nav_menu_item", "custom_css", "customize_changeset", "oembed_cache", "user_request", "wp_block", "polylang_mo");
            if(!in_array($object->name, $exclude)) {
                array_push($posttypes, array("name" => $object->name, "label" => $object->label));
            }
        }
        return $posttypes;
    }

    private function get_groups() {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_groups';
        $rows = $wpdb->get_results("SELECT * FROM $tablename");
        $groups = array();
        foreach($rows as $group) {
            array_push($groups, array("id" => $group->id, "name" => $group->name));
        }
        return $groups;
    }
}

?>