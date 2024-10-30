<?php
/**
 * Cookielay Shortcode
 * 
 * Used for register the cookielay shortcode
 * 
 * @package cookielay
 * @subpackage cookielay/includes
 */

class Cookielay_Shortcode {
    public function register_shortcode() {
        add_shortcode('cookielay', array($this, 'render_shortcode'));
    }

    public function render_shortcode($atts = array()) {
        $atts = array_change_key_case((array) $atts, CASE_LOWER);
        $params = shortcode_atts(
            array(
                "action" => "open",
                "id" => "",
                "text" => __('Edit cookie settings', 'cookielay'),
                "class" => "cookielay-open-link",
            ),
            $atts
        );
        $link = '<a href="#" class="'.$params["class"].'" data-cookielay-action="'.$params["action"].'" data-cookielay-cookie="'.$params["id"].'">'.$params["text"].'</a>';
        return $link;
    }
}