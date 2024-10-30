<?php
/**
 * Cookielay Cookies Class (Public)
 * 
 * The class for the public cookie management.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/public
 */

class Cookielay_Public_Cookies extends Cookielay_Public_Frontend { 
    public function run() {
        $this->loader->add_action('wp_footer', $this, 'load_cookies');
    }

    public function load_cookies() {
        echo "<script id='cookielay-cookies'>";
        $this->generate_cookies_array();
        echo "\n";
        $this->generate_groups_array();
        echo "</script>";
    }

    private function get_cookies() {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_cookies';
        $cookies = $wpdb->get_results("SELECT * FROM $tablename WHERE active = 1");
        return $cookies;
    }

    private function get_groups() {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_groups';
        $groups = $wpdb->get_results("SELECT * FROM $tablename");
        return $groups;
    }

    private function generate_cookies_array() {
        $cookies = $this->get_cookies();
        $array = array();
        foreach($cookies as $cookie) {
            array_push($array, array(
                "id" => $cookie->id,
                "title" => $cookie->title,
                "name" => $cookie->name,
                "description" => $cookie->description,
                "lifetime" => $cookie->lifetime,
                "cookie_group" => $cookie->cookie_group,
                "execute_header" => $cookie->execute_header,
                "allow_script" => $cookie->allow_script,
                "disallow_script" => $cookie->disallow_script,
            ));
        }
        echo "var cookielay_cookies = " . json_encode($array) . ";";
    }

    private function generate_groups_array() {
        $groups = $this->get_groups();
        $array = array();
        foreach($groups as $group) {
            array_push($array, array(
                "id" => $group->id,
                "name" => $group->name,
                "description" => $group->description
            ));
        }
        echo "var cookielay_groups = " . json_encode($array) . ";";
    }
}

?>