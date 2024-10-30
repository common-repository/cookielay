<?php
/**
 * Cookielay Updater
 * 
 * Compares the current and the old version of Cookielay and updates settings if necessary
 * 
 * @package cookielay
 * @subpackage cookielay/includes
 */

class Cookielay_Updater {
    private $loader;
    private $version;

    public function __construct($loader) {
        $this->loader = $loader;
        $this->version = get_option('cookielay_version');
    }

    public function update() {
        if($this->check_version()) {
            $this->loader->add_action('plugins_loaded', $this, 'update_settings');
        }
    }

    private function check_version() {
        $status = false;
        if(version_compare($this->version, COOKIELAY_VERSION, "<")) {
            $status = true;
        }
        return $status;
    }

    private function update_version() {
        update_option('cookielay_version', COOKIELAY_VERSION);
    }

    private function reset_token() {
        $token = uniqid(time());
        update_option('cookielay_token', $token);
    }

    public function update_settings() {
        global $wpdb;

        if(version_compare($this->version, "1.1.0", "<")) {
            $tablename = $wpdb->prefix . 'cookielay_cookies';
            $sql = "ALTER TABLE $tablename ADD COLUMN execute_header boolean NOT NULL AFTER imprint";
            $wpdb->query($sql);

            $text = get_option('cookielay_settings_text');
            $text["general-button-selected"] = __('Save selection', 'cookielay');
            update_option("cookielay_settings_text", $text);

            $style = get_option('cookielay_settings_style');
            $style["checkbox-color"] = $style["overlay-background"];
            $style["checkbox-color-icon"] = $style["cookielay-background"];
            update_option("cookielay_settings_style", $style);
        }

        if(version_compare($this->version, "1.1.2", "<")) {
            $settings = get_option('cookielay_settings_main');
            $settings["hide-empty-groups"] = "on";
            update_option("cookielay_settings_main", $settings);
        }

        if(version_compare($this->version, "1.1.4", "<")) {
            $tablename = $wpdb->prefix . 'cookielay_cookies';
            $sql = "ALTER TABLE $tablename CHANGE function description text NOT NULL, CHANGE time lifetime text NOT NULL";
            $wpdb->query($sql);
        }

        if(version_compare($this->version, "1.2.0", "<")) {
            $settings = get_option('cookielay_settings_main');
            $settings["hide-checkboxes"] = "";
            update_option("cookielay_settings_main", $settings);

            $text = get_option('cookielay_settings_text');
            $text["general-button-reject"] = __('Reject', 'cookielay');
            update_option("cookielay_settings_text", $text);

            $style = get_option('cookielay_settings_style');
            switch($style["preset"]) {
                case "cookielay":
                    $style["branding-primary"] = "#ffffff";
                    $style["branding-secondary"] = "#f1f1f1";
                    break;
                case "dark":
                    $style["branding-primary"] = "#ffffff";
                    $style["branding-secondary"] = "#f1f1f1";
                    break;
                case "light":
                    $style["branding-primary"] = "#151515";
                    $style["branding-secondary"] = "#434343";
                    break;
                default:
                    $style["branding-primary"] = "#ffffff";
                    $style["branding-secondary"] = "#f1f1f1";
            }
            update_option("cookielay_settings_style", $style);
        }

        $this->reset_token();
        $this->update_version();
    }
}