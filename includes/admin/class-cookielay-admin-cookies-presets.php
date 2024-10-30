<?php
/**
 * Cookielay Cookies Class Presets (Admin)
 * 
 * The class for the cookie presets.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin
 */

class Cookielay_Admin_Cookies_Presets {
    private $presets;

    public function __construct() {
        $this->generate_presets();
    }

    private function generate_presets() {
        $presets = array();
        array_push($presets, $this->facebook_pixel());
        array_push($presets, $this->polylang());
        array_push($presets, $this->wpml());
        array_push($presets, $this->woocommerce());
        array_push($presets, $this->google_analytics());
        array_push($presets, $this->google_tag_manager());
        array_push($presets, $this->google_adsense());
        array_push($presets, $this->hubspot());
        array_push($presets, $this->matomo());
        array_push($presets, $this->matomo_tag_manager());
        $this->presets = $presets;
    }

    public function get_presets() {
        return $this->presets;
    }

    public function get_preset($preset_name) {
        $preset = array_search($preset_name, array_column($this->presets, "title"));
        return $this->presets[$preset];
    }

    private function facebook_pixel() {
        $preset = array(
            "title" => "Facebook Pixel",
            "name" => "_fbp, act, c_user, datr, fr, m_pixel_ration, pl, presence, sb, spin, wd, xs",
            "provider" => "Facebook Ireland Limited",
            "description" => __('Required for the operation of Facebook Pixel, an analytics tool from Facebook Ireland Limited that tracks and analyzes user behavior.', 'cookielay'),
            "lifetime" => __('1 year / session', 'cookielay'),
            "privacy" => "https://www.facebook.com/policies/cookies",
            "imprint" => "https://www.facebook.com/legal/terms",
            "execute_header" => 1,
            "allow_script" => file_get_contents("scripts/allow/facebook_pixel.php", true),
            "disallow_script" => file_get_contents("scripts/disallow/facebook_pixel.php", true)
        );
        return $preset;
    }

    private function polylang() {
        $preset = array(
            "title" => "Polylang",
            "name" => "pll_language",
            "provider" => __('The operator of the website', 'cookielay'),
            "description" => __('Stores the language settings of the visitor.', 'cookielay'),
            "lifetime" => __('1 year', 'cookielay'),
            "privacy" => "",
            "imprint" => "",
            "execute_header" => 0,
            "allow_script" => file_get_contents("scripts/allow/polylang.php", true),
            "disallow_script" => file_get_contents("scripts/disallow/polylang.php", true)
        );
        return $preset;
    }

    private function wpml() {
        $preset = array(
            "title" => "WPML",
            "name" => "_icl_*, wpml_*, wp-wpml_*",
            "provider" => __('The operator of the website', 'cookielay'),
            "description" => __('Stores the language settings of the visitor.', 'cookielay'),
            "lifetime" => __('1 day', 'cookielay'),
            "privacy" => "",
            "imprint" => "",
            "execute_header" => 0,
            "allow_script" => file_get_contents("scripts/allow/wpml.php", true),
            "disallow_script" => file_get_contents("scripts/disallow/wpml.php", true)
        );
        return $preset;
    }

    private function woocommerce() {
        $preset = array(
            "title" => "WooCommerce",
            "name" => "woocommerce_cart_hash, woocommerce_items_in_cart, wp_woocommerce_session_, woocommerce_recently_viewed, store_notice[notice id]",
            "provider" => __('The operator of the website', 'cookielay'),
            "description" => __('Stores a code that can be used to display the shopping cart of the visitor. It also allows changes to the shopping cart to be recorded.', 'cookielay'),
            "lifetime" => __('Session / 2 days', 'cookielay'),
            "privacy" => "",
            "imprint" => "",
            "execute_header" => 0,
            "allow_script" => file_get_contents("scripts/allow/woocommerce.php", true),
            "disallow_script" => file_get_contents("scripts/disallow/woocommerce.php", true)
        );
        return $preset;
    }

    private function google_analytics() {
        $preset = array(
            "title" => "Google Analytics",
            "name" => "_ga, _gat, _gid",
            "provider" => "Google LLC",
            "description" => __('Required for the operation of Google Analytics, an analysis tool of Google LLC, which tracks and analyzes user behavior.', 'cookielay'),
            "lifetime" => __('2 years', 'cookielay'),
            "privacy" => "https://policies.google.com/privacy",
            "imprint" => "",
            "execute_header" => 1,
            "allow_script" => file_get_contents("scripts/allow/google_analytics.php", true),
            "disallow_script" => file_get_contents("scripts/disallow/google_analytics.php", true)
        );
        return $preset;
    }

    private function google_tag_manager() {
        $preset = array(
            "title" => "Google Tag Manager",
            "name" => "_ga, _gat, _gid",
            "provider" => "Google LLC",
            "description" => __('Required for the operation of Google Tag Manager, an event handling tool of Google LLC.', 'cookielay'),
            "lifetime" => __('2 years', 'cookielay'),
            "privacy" => "https://policies.google.com/privacy",
            "imprint" => "",
            "execute_header" => 1,
            "allow_script" => file_get_contents("scripts/allow/google_tag_manager.php", true),
            "disallow_script" => file_get_contents("scripts/disallow/google_tag_manager.php", true)
        );
        return $preset;
    }

    private function google_adsense() {
        $preset = array(
            "title" => "Google AdSense",
            "name" => "DSID, IDE",
            "provider" => "Google LLC",
            "description" => __('Required for the operation of AdSense, a tool of Google LLC, which is used for ad targeting and ad measurement.', 'cookielay'),
            "lifetime" => __('1 year', 'cookielay'),
            "privacy" => "https://policies.google.com/privacy",
            "imprint" => "",
            "execute_header" => 0,
            "allow_script" => file_get_contents("scripts/allow/google_adsense.php", true),
            "disallow_script" => file_get_contents("scripts/disallow/google_adsense.php", true)
        );
        return $preset;
    }

    private function hubspot() {
        $preset = array(
            "title" => "HubSpot",
            "name" => "__hs_opt_out, __hs_d_not_track, hs_ab_test, hs-messages-is-open, hs-messages-hide-welcome-message, __hstc, hubspotutk, __hssc, __hssrc, messagesUtk",
            "provider" => "HubSpot Inc.",
            "description" => __('Required for the operation of HubSpot, a customer or user management tool used on the website for analysis and marketing purposes.', 'cookielay'),
            "lifetime" => __('Session / 30 minutes / 1 day / 1 year / 13 months', 'cookielay'),
            "privacy" => "https://legal.hubspot.com/privacy-policy",
            "imprint" => "https://legal.hubspot.com/legal-stuff",
            "execute_header" => 0,
            "allow_script" => file_get_contents("scripts/allow/hubspot.php", true),
            "disallow_script" => file_get_contents("scripts/disallow/hubspot.php", true)
        );
        return $preset;
    }

    private function matomo() {
        $preset = array(
            "title" => "Matomo",
            "name" => "_pk_ref, _pk_cvar, _pk_id, _pk_ses, _pk_hsr",
            "provider" => "Matomo",
            "description" => __('Required for the operation of Matomo, an analysis tool that tracks and analyzes user behavior.', 'cookielay'),
            "lifetime" => __('Session / 30 minutes / 6 months / 13 months', 'cookielay'),
            "privacy" => "https://matomo.org/privacy-policy/",
            "imprint" => "",
            "execute_header" => 0,
            "allow_script" => file_get_contents("scripts/allow/matomo.php", true),
            "disallow_script" => file_get_contents("scripts/disallow/matomo.php", true)
        );
        return $preset;
    }

    private function matomo_tag_manager() {
        $preset = array(
            "title" => "Matomo Tag Manager",
            "name" => "",
            "provider" => "Matomo",
            "description" => __('Required for the operation of Matomo Tag Manager, a tool that controls event handling.', 'cookielay'),
            "lifetime" => "",
            "privacy" => "https://matomo.org/privacy-policy/",
            "imprint" => "",
            "execute_header" => 0,
            "allow_script" => file_get_contents("scripts/allow/matomo_tag_manager.php", true),
            "disallow_script" => file_get_contents("scripts/disallow/matomo_tag_manager.php", true)
        );
        return $preset;
    }
}