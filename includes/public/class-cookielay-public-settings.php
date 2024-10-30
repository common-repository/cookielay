<?php
/**
 * Cookielay Settings Class (Public)
 * 
 * The class for the public settings.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/public
 */

class Cookielay_Public_Settings extends Cookielay_Public_Frontend { 
    public function run() {
        $this->loader->add_action('wp_footer', $this, 'load_settings');
    }

    public function load_settings() {
        echo "<script id='cookielay-settings'>";
        $this->generate_array();
        echo "</script>";
    }

    private function get_settings() {
        $settings = get_option("cookielay_settings_main");
        return $settings;
    }

    private function get_token() {
        $token = get_option("cookielay_token");
        return $token;
    }

    private function get_cookies() {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_cookies';
        $cookies = $wpdb->get_results("SELECT * FROM $tablename WHERE active = 1");
        return $cookies;
    }

    private function generate_cookie() {
        $settings = $this->get_settings();
        $cookies = $this->get_cookies();
        $cookielay_cookie;
        foreach($cookies as $cookie) {
            if($settings["cookielay-cookie"] == $cookie->id) {
                $cookielay_cookie = array(
                    "name" => $cookie->name,
                    "lifetime" => $cookie->lifetime
                );
            }
        }
        return $cookielay_cookie;
    }

    private function generate_array() {
        $settings = $this->get_settings();
        $cookie = $this->generate_cookie();
        $token = $this->get_token();
        $array = array(
            "posts-exceptions" => $settings["posts-exceptions"],
            "posttypes-exceptions" => $settings["posttypes-exceptions"],
            "post-id" => get_the_ID(),
            "post-type" => get_post_type(),
            "deactivate-bots" => $settings["deactivate-bots"],
            "reload" => $settings["reload"],
            "domain" => $settings["domain"],
            "essential-group" => $settings["essential-group"],
            "cookiename" => $cookie["name"],
            "cookietime" => $settings["cookielay-lifetime"],
            "enable-scroll" => $settings["enable-scroll"],
            "domain" => $settings["domain"],
            "delay" => $settings["delay"],
            "token" => $token
        );
        echo "var cookielay_settings = " . json_encode($array) . ";";
    }
}

?>