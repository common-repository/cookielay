<?php
/**
 * Cookielay Style Class (Public)
 * 
 * The class for the public style.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/public
 */

class Cookielay_Public_Style extends Cookielay_Public_Frontend {
    public function run() {
        $this->loader->add_action('wp_head', $this, 'load_style');
    }

    public function load_style() {
        echo '<style>';
        $this->generate_css();
        echo '</style>';
    }

    private function get_styles() {
        $styles = get_option("cookielay_settings_style");
        return $styles;
    }

    private function get_colors() {
        $styles = $this->get_styles();
        $colors = array(
            "overlay-background" => $styles["overlay-background"],
            "cookielay-background" => $styles["cookielay-background"],
            "headline-color" => $styles["headline-color"],
            "text-color" => $styles["text-color"],
            "link-color" => $styles["link-color"],
            "border-color" => $styles["border-color"],
            "checkbox-color" => $styles["checkbox-color"],
            "checkbox-color-icon" => $styles["checkbox-color-icon"],
            "accordion-background" => $styles["accordion-background"],
            "accordion-text" => $styles["accordion-text"],
            "switch-background" => $styles["switch-background"],
            "switch-toggle-background-inactive" => $styles["switch-toggle-background-inactive"],
            "switch-toggle-background-active" => $styles["switch-toggle-background-active"],
            "link-button-color-normal" => $styles["link-button-color-normal"],
            "link-button-color-hover" => $styles["link-button-color-hover"],
            "primary-button-color-normal" => $styles["primary-button-color-normal"],
            "primary-button-color-hover" => $styles["primary-button-color-hover"],
            "primary-button-background-normal" => $styles["primary-button-background-normal"],
            "primary-button-background-hover" => $styles["primary-button-background-hover"],
            "secondary-button-color-normal" => $styles["secondary-button-color-normal"],
            "secondary-button-color-hover" => $styles["secondary-button-color-hover"],
            "secondary-button-border-normal" => $styles["secondary-button-border-normal"],
            "secondary-button-border-hover" => $styles["secondary-button-border-hover"],
            "branding-primary" => $styles["branding-primary"],
            "branding-secondary" => $styles["branding-secondary"]
        );
        return $colors;
    }

    private function get_custom_css() {
        $styles = $this->get_styles();
        return $styles["css"];
    }

    private function generate_css() {
        $colors = $this->get_colors();
        $custom_css = $this->get_custom_css();
        include COOKIELAY_ROOT_PATH . 'includes/public/styles/styles.php';
    }
}

?>