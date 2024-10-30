<?php
/**
 * Cookielay "Style" template (Admin)
 * 
 * The template for the style page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates
 */
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-headline">
        <h1><?php _e('Style', 'cookielay'); ?></h1>
        <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo str_replace(array("http://", "https://"), "", COOKIELAY_WEBSITE); ?></a>
    </section>

    <section class="cookielay-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <form method="POST" action="options.php" class="cookielay-content__main">
                        <?php
                        settings_fields('cookielay_style');
                        $settings = get_option('cookielay_settings_style');
                        ?>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Layout', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Select layout', 'cookielay'); ?></span>
                                        <?php _e('The basic layout of the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-layout">
                                            <label class="radio">
                                                <input type="radio" name="cookielay_settings_style[layout]" value="bottom" <?php if($settings["layout"] == "bottom") { echo "checked"; } ?>>
                                                <div class="images">
                                                    <img src="<?php echo COOKIELAY_ROOT_URL . '/admin/'; ?>img/layout_1_active.jpg" class="active">
                                                    <img src="<?php echo COOKIELAY_ROOT_URL . '/admin/'; ?>img/layout_1.jpg" class="inactive">
                                                </div>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="cookielay_settings_style[layout]" value="center" <?php if($settings["layout"] == "center") { echo "checked"; } ?>>
                                                <div class="images">
                                                    <img src="<?php echo COOKIELAY_ROOT_URL . '/admin/'; ?>img/layout_2_active.jpg" class="active">
                                                    <img src="<?php echo COOKIELAY_ROOT_URL . '/admin/'; ?>img/layout_2.jpg" class="inactive">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Logo', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Logo', 'cookielay'); ?></span>
                                        <?php _e('The logo that is displayed above the cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <a href="<?php echo admin_url('admin.php?page=cookielay-prime'); ?>" class="prime"><span><i class="ti-lock"></i></span><?php _e('Available with Cookielay Premium!', 'cookielay'); ?></a>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Logo size', 'cookielay'); ?></span>
                                        <?php _e('The size of the logo that is displayed above the cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <a href="<?php echo admin_url('admin.php?page=cookielay-prime'); ?>" class="prime"><span><i class="ti-lock"></i></span><?php _e('Available with Cookielay Premium!', 'cookielay'); ?></a>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Font', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Font family', 'cookielay'); ?></span>
                                        <?php _e('The font family of the text and headlines in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <a href="<?php echo admin_url('admin.php?page=cookielay-prime'); ?>" class="prime"><span><i class="ti-lock"></i></span><?php _e('Available with Cookielay Premium!', 'cookielay'); ?></a>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Font size (headline)', 'cookielay'); ?></span>
                                        <?php _e('The font size of the headlines in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <a href="<?php echo admin_url('admin.php?page=cookielay-prime'); ?>" class="prime"><span><i class="ti-lock"></i></span><?php _e('Available with Cookielay Premium!', 'cookielay'); ?></a>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Font size (text)', 'cookielay'); ?></span>
                                        <?php _e('The font size of the text in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <a href="<?php echo admin_url('admin.php?page=cookielay-prime'); ?>" class="prime"><span><i class="ti-lock"></i></span><?php _e('Available with Cookielay Premium!', 'cookielay'); ?></a>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Colors', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Preset', 'cookielay'); ?></span>
                                        <?php _e('The default setting for the appearance of the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <select id="preset-select" name="cookielay_settings_style[preset]">
                                            <option value="custom" disabled><?php _e('Custom (Cookielay Premium only)', 'cookielay'); ?></option>
                                            <option value="cookielay" <?php if($settings["preset"] == "cookielay") { echo "selected"; } ?>><?php echo COOKIELAY_NAME; ?></option>
                                            <option value="light" <?php if($settings["preset"] == "light") { echo "selected"; } ?>><?php _e('Light', 'cookielay'); ?></option>
                                            <option value="dark" <?php if($settings["preset"] == "dark") { echo "selected"; } ?>><?php _e('Dark', 'cookielay'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Overlay (Background)', 'cookielay'); ?></span>
                                        <?php _e('The background color of the overlay that overlays the website while Cookielay is open.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[overlay-background]" value="<?php echo $settings["overlay-background"]; ?>" class="colorpicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Cookielay (Background)', 'cookielay'); ?></span>
                                        <?php _e('The background color of the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[cookielay-background]" value="<?php echo $settings["cookielay-background"]; ?>" class="colorpicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Headline', 'cookielay'); ?></span>
                                        <?php _e('The color of the headings in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[headline-color]" value="<?php echo $settings["headline-color"]; ?>" class="colorpicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Text', 'cookielay'); ?></span>
                                        <?php _e('The color of the texts in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[text-color]" value="<?php echo $settings["text-color"]; ?>" class="colorpicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Link', 'cookielay'); ?></span>
                                        <?php _e('The color of the links in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[link-color]" value="<?php echo $settings["link-color"]; ?>" class="colorpicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Border', 'cookielay'); ?></span>
                                        <?php _e('The color of the border in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[border-color]" value="<?php echo $settings["border-color"]; ?>" class="colorpicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Accordion (Background)', 'cookielay'); ?></span>
                                        <?php _e('The background color of the Accordions in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[accordion-background]" value="<?php echo $settings["accordion-background"]; ?>" class="colorpicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Accordion (Text)', 'cookielay'); ?></span>
                                        <?php _e('The color of the texts inside the accordion in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[accordion-text]" value="<?php echo $settings["accordion-text"]; ?>" class="colorpicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Switch (Background)', 'cookielay'); ?></span>
                                        <?php _e('The background color of the switches in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[switch-background]" value="<?php echo $settings["switch-background"]; ?>" class="colorpicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Switch (Toggle)', 'cookielay'); ?></span>
                                        <?php _e('The color of the toggle inside the switch in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[switch-toggle-background-inactive]" value="<?php echo $settings["switch-toggle-background-inactive"]; ?>" class="colorpicker">
                                                <span><?php _e('Active', 'cookielay'); ?></span>
                                            </div>
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[switch-toggle-background-active]" value="<?php echo $settings["switch-toggle-background-active"]; ?>" class="colorpicker">
                                                <span><?php _e('Inactive', 'cookielay'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Link Button (Text)', 'cookielay'); ?></span>
                                        <?php _e('The text color of the link button in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[link-button-color-normal]" value="<?php echo $settings["link-button-color-normal"]; ?>" class="colorpicker">
                                                <span><?php _e('Normal', 'cookielay'); ?></span>
                                            </div>
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[link-button-color-hover]" value="<?php echo $settings["link-button-color-hover"]; ?>" class="colorpicker">
                                                <span><?php _e('Hover', 'cookielay'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Primary Button (Text)', 'cookielay'); ?></span>
                                        <?php _e('The text color of the primary button in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[primary-button-color-normal]" value="<?php echo $settings["primary-button-color-normal"]; ?>" class="colorpicker">
                                                <span><?php _e('Normal', 'cookielay'); ?></span>
                                            </div>
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[primary-button-color-hover]" value="<?php echo $settings["primary-button-color-hover"]; ?>" class="colorpicker">
                                                <span><?php _e('Hover', 'cookielay'); ?><</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Primary Button (Background)', 'cookielay'); ?></span>
                                        <?php _e('The background color of the primary button in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[primary-button-background-normal]" value="<?php echo $settings["primary-button-background-normal"]; ?>" class="colorpicker">
                                                <span><?php _e('Normal', 'cookielay'); ?></span>
                                            </div>
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[primary-button-background-hover]" value="<?php echo $settings["primary-button-background-hover"]; ?>" class="colorpicker">
                                                <span><?php _e('Hover', 'cookielay'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Secondary Button (Text)', 'cookielay'); ?></span>
                                        <?php _e('The text color of the secondary button in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[secondary-button-color-normal]" value="<?php echo $settings["secondary-button-color-normal"]; ?>" class="colorpicker">
                                                <span><?php _e('Normal', 'cookielay'); ?></span>
                                            </div>
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[secondary-button-color-hover]" value="<?php echo $settings["secondary-button-color-hover"]; ?>" class="colorpicker">
                                                <span><?php _e('Hover', 'cookielay'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Secondary button (Border)', 'cookielay'); ?></span>
                                        <?php _e('The border color of the secondary button in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="select-color">
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[secondary-button-border-normal]" value="<?php echo $settings["secondary-button-border-normal"]; ?>" class="colorpicker">
                                                <span><?php _e('Normal', 'cookielay'); ?></span>
                                            </div>
                                            <div class="color">
                                                <input type="text" name="cookielay_settings_style[secondary-button-border-hover]" value="<?php echo $settings["secondary-button-border-hover"]; ?>" class="colorpicker">
                                                <span><?php _e('Hover', 'cookielay'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Custom CSS-Code', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('CSS', 'cookielay'); ?></span>
                                        <?php _e('Custom CSS-Code (without style tag), which is automatically output in the header.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <textarea rows="10" name="cookielay_settings_style[css]" class="codeeditor-css"><?php echo $settings["css"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
                    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/sidebar.php'; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/footer.php'; ?>
</div>