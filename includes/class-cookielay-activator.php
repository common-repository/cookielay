<?php
/**
 * Cookielay Activator Class
 * 
 * Used fo the plugin activation.
 * 
 * @package cookielay
 * @subpackage cookielay/includes
 */

class Cookielay_Activator {
    public function activate() {
        $this->create_tables();
        $this->fill_tables();
        $this->load_default_settings();
        flush_rewrite_rules();
    }

    private function create_tables() {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        $tablename_groups = $wpdb->prefix . 'cookielay_groups';
        $sql_groups = "CREATE TABLE IF NOT EXISTS $tablename_groups (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        description text NOT NULL,
        PRIMARY KEY (id)
        ) $charset_collate;";

        $tablename_cookies = $wpdb->prefix . 'cookielay_cookies';
        $sql_cookies = "CREATE TABLE IF NOT EXISTS $tablename_cookies (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        provider VARCHAR(255) NOT NULL,
        description text NOT NULL,
        lifetime text NOT NULL,
        cookie_group int NOT NULL,
        privacy text NOT NULL,
        imprint text NOT NULL,
        execute_header boolean NOT NULL,
        allow_script text NOT NULL,
        disallow_script text NOT NULL,
        active int NOT NULL DEFAULT 0,
        PRIMARY KEY (id)
        ) $charset_collate;";

        dbDelta($sql_groups);
        dbDelta($sql_cookies);
    }

    private function fill_tables() {
        global $wpdb;

        $tablename_groups = $wpdb->prefix . 'cookielay_groups';
        $groups = $wpdb->get_results("SELECT * FROM $tablename_groups");
        $rows_groups = $wpdb->num_rows;
        if($rows_groups == 0) {
            $wpdb->insert($tablename_groups, array("name" => __('Essential', 'cookielay'), "description" => __('Essential cookies are needed for the basic functionality of the website.', 'cookielay')));
            $wpdb->insert($tablename_groups, array("name" => __('Statistics', 'cookielay'), "description" => __('Statistics cookies track the user and associated browsing behavior to improve the user experience.', 'cookielay')));
        }

        $tablename_cookies = $wpdb->prefix . 'cookielay_cookies';
        $cookies = $wpdb->get_results("SELECT * FROM $tablename_cookies");
        $rows_cookies = $wpdb->num_rows;
        if($rows_cookies == 0) {
            $wpdb->insert($tablename_cookies, array("title" => "Cookielay", "name" => "cookielay", "provider" => "Cookielay", "description" => __('Saves the cookie settings of the visitor.', 'cookielay'), "lifetime" => __('1 year', 'cookielay'), "cookie_group" => 1, "privacy" => "https://www.cookielay.com/privacy-policy", "imprint" => "https://www.cookielay.com/imprint", "execute_header" => 0, "active" => 1));
        }
    }

    private function load_default_settings() {
        if(!get_option('cookielay_settings_status')) {
            register_setting('cookielay_status', 'cookielay_settings_status');
            update_option('cookielay_status', 0);
        }
        if(!get_option('cookielay_settings_version')) {
            register_setting('cookielay_version', 'cookielay_settings_version');
            update_option('cookielay_version', COOKIELAY_VERSION);
        }
        if(!get_option('cookielay_settings_token')) {
            register_setting('cookielay_token', 'cookielay_settings_token');
            $token = uniqid(time());
            update_option('cookielay_token', $token);
        }
        if(!get_option('cookielay_settings_main')) {
            register_setting('cookielay_main', 'cookielay_settings_main');
            update_option('cookielay_settings_main', array(
                "posts-exceptions" => array(),
                "posttypes-exceptions" => array(),
                "deactivate-bots" => "on",
                "reload" => "",
                "imprint-page" => "",
                "privacy-page" => "",
                "domain" => get_site_url(),
                "essential-group" => 1,
                "cookielay-cookie" => 1,
                "cookielay-lifetime" => 365,
                "hide-empty-groups" => "on",
                "hide-checkboxes" => "",
                "enable-scroll" => "",
                "hide-branding" => "",
                "delay" => 0
            ));
        }
        if(!get_option('cookielay_settings_style')) {
            register_setting('cookielay_style', 'cookielay_settings_style');
            update_option('cookielay_settings_style', array(
                "layout" => "bottom",
                "preset" => "cookielay",
                "overlay-background" => "#ffffff",
                "cookielay-background" => "#1a696b",
                "headline-color" => "#ffffff",
                "text-color" => "#ffffff",
                "link-color" => "#ffffff",
                "border-color" => "#ffffff",
                "accordion-background" => "#155556",
                "accordion-text" => "#ffffff",
                "switch-background" => "#427778",
                "switch-toggle-background-inactive" => "#8eadae",
                "switch-toggle-background-active" => "#ffffff",
                "link-button-color-normal" => "#ffffff",
                "link-button-color-hover" => "#ffffff",
                "primary-button-color-normal" => "#1a696b",
                "primary-button-color-hover" => "#1a696b",
                "primary-button-background-normal" => "#ffffff",
                "primary-button-background-hover" => "#ffffff",
                "secondary-button-color-normal" => "#ffffff",
                "secondary-button-color-hover" => "#1a696b",
                "secondary-button-border-normal" => "#ffffff",
                "secondary-button-border-hover" => "#ffffff",
                "branding-primary" => "#ffffff",
                "branding-secondary" => "#f1f1f1",
                "css" => ""
            ));
        }
        if(!get_option('cookielay_settings_text')) {
            register_setting('cookielay_text', 'cookielay_settings_text');
            update_option('cookielay_settings_text', array(
                "general-headline" => __('Cookie settings', 'cookielay'),
                "general-description" => __('Cookies are used on this website. These are needed for the operation of the website or help us to improve the website.', 'cookielay'),
                "general-button-all" => __('Allow all cookies', 'cookielay'),
                "general-button-selected" => __('Save selection', 'cookielay'),
                "general-button-reject" => __('Reject', 'cookielay'),
                "general-button-individual" => __('Individual settings', 'cookielay'),
                "general-privacy" => __('Privacy policy', 'cookielay'),
                "general-imprint" => __('Imprint', 'cookielay'),
                "general-active" => __('Active', 'cookielay'),
                "general-inactive" => __('Inactive', 'cookielay'),
                "individual-headline" => __('Individual settings', 'cookielay'),
                "individual-description" => __('This is an overview of all cookies used on the website. You have the option to make individual cookie settings. Give your consent to individual cookies or entire groups. Essential cookies cannot be disabled.', 'cookielay'),
                "individual-button-safe" => __('Save', 'cookielay'),
                "individual-button-cancel" => __('Cancel', 'cookielay'),
                "individual-button-showcookies" => __('Show cookies', 'cookielay'),
                "cookie-title" => __('Title', 'cookielay'),
                "cookie-name" => __('Name', 'cookielay'),
                "cookie-provider" => __('Provider', 'cookielay'),
                "cookie-function" => __('Function', 'cookielay'),
                "cookie-time" => __('Lifetime', 'cookielay'),
                "cookie-privacy" => __('Privacy policy', 'cookielay'),
                "cookie-imprint" => __('Imprint', 'cookielay')
            ));
        }
    }
}

?>