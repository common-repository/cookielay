<?php
/**
 * Cookielay "Style" template (Public)
 * 
 * The template for the css styles.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/public/styles
 */
?>

#cookielay:before {
    background: <?php echo $colors["overlay-background"]; ?>;
}
#cookielay .cookielay__box .cl-box {
    background: <?php echo $colors["cookielay-background"]; ?>;
}
#cookielay .cookielay__content,
#cookielay .cookielay__settings {
    background: <?php echo $colors["cookielay-background"]; ?>;
}
#cookielay .cl-button--text {
    color: <?php echo $colors["link-button-color-normal"]; ?>;
}
#cookielay .cl-button--text:hover {
    color: <?php echo $colors["link-button-color-hover"]; ?>;
}
#cookielay .cl-button--text:after {
    background: <?php echo $colors["link-button-color-normal"]; ?>;
}
#cookielay .cl-button--text:hover:after {
    background: <?php echo $colors["link-button-color-hover"]; ?>;
}
#cookielay .cl-button--primary {
    color: <?php echo $colors["primary-button-color-normal"]; ?>;
    background: <?php echo $colors["primary-button-background-normal"]; ?>;
}
#cookielay .cl-button--primary:hover {
    color: <?php echo $colors["primary-button-color-hover"]; ?>;
    background: <?php echo $colors["primary-button-background-hover"]; ?>;
}
#cookielay .cl-button--secondary {
    color: <?php echo $colors["secondary-button-color-normal"]; ?>;
    border-color: <?php echo $colors["secondary-button-border-normal"]; ?>;
}
#cookielay .cl-button--secondary:hover {
    color: <?php echo $colors["secondary-button-color-hover"]; ?>;
    border-color: <?php echo $colors["secondary-button-border-hover"]; ?>;
    background: <?php echo $colors["secondary-button-border-hover"]; ?>;
}
#cookielay .cl-close:before,
#cookielay .cl-close:after {
    background: <?php echo $colors["text-color"]; ?>;
}
#cookielay .cl-title {
    color: <?php echo $colors["headline-color"]; ?>;
    border-bottom: solid 1px <?php echo $colors["border-color"]; ?>;
}
#cookielay .cl-desc {
    color: <?php echo $colors["text-color"]; ?>;
}
#cookielay .cl-checkbox {
    color: <?php echo $colors["checkbox-color"]; ?>;
}
#cookielay .cl-checkbox span {
    border-color: <?php echo $colors["checkbox-color"]; ?>;
}
#cookielay .cl-checkbox input:checked + span {
    background: <?php echo $colors["checkbox-color"]; ?>;
}
#cookielay .cl-checkbox input:checked + span:before {
    color: <?php echo $colors["checkbox-color-icon"]; ?>;
}
#cookielay .cl-footer {
    border-top: solid 1px <?php echo $colors["border-color"]; ?>;
}
#cookielay .cl-footer .cl-links a {
    color: <?php echo $colors["link-color"]; ?>;
}
#cookielay .cl-footer .cl-branding a {
    color: <?php echo $colors["text-color"]; ?>;
}
#cookielay .cl-footer .cl-branding a svg .st0 {
    fill: <?php echo $colors["branding-secondary"]; ?>;
}
#cookielay .cl-footer .cl-branding a svg .st1 {
    fill: <?php echo $colors["branding-primary"]; ?>;;
}
#cookielay .cl-inner {
    border-color: <?php echo $colors["accordion-background"]; ?>;
}
#cookielay .cl-accordions .cl-accordion .cl-accordion__inner {
    background: <?php echo $colors["accordion-background"]; ?>;
    color: <?php echo $colors["accordion-text"]; ?>;
}
#cookielay .cl-accordions .cl-accordion .cl-accordion__inner .cl-accordion__content .cl-cookies {
    border-color: <?php echo $colors["cookielay-background"]; ?>;
}
#cookielay .cl-accordions .cl-accordion .cl-accordion__inner .cl-accordion__content .cl-cookies .cl-cookie {
    border-color: <?php echo $colors["cookielay-background"]; ?>;
}
#cookielay .cl-accordions .cl-accordion .cl-accordion__inner .cl-accordion__content .cl-cookies .cl-cookie table tr td a {
    color: <?php echo $colors["accordion-text"]; ?>;
}
#cookielay .cl-switch .cl-switch__slider {
    background: <?php echo $colors["switch-background"]; ?>;
}
#cookielay .cl-switch .cl-switch__slider:before {
    background: <?php echo $colors["switch-toggle-background-inactive"]; ?>;
}
#cookielay .cl-switch .cl-switch__slider:after {
    color: <?php echo $colors["switch-toggle-background-inactive"]; ?>;
}
#cookielay .cl-switch input:checked + .cl-switch__slider:before {
    background: <?php echo $colors["switch-toggle-background-active"]; ?>;
}
#cookielay .cl-switch input:checked + .cl-switch__slider:after {
    color: <?php echo $colors["switch-toggle-background-active"]; ?>;
}
<?php echo $custom_css; ?>