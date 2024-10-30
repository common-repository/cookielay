<?php
/**
 * Cookielay "Text" template (Admin)
 * 
 * The template for the text page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates
 */
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-headline">
        <h1><?php _e('Text', 'cookielay'); ?></h1>
        <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo str_replace(array("http://", "https://"), "", COOKIELAY_WEBSITE); ?></a>
    </section>

    <section class="cookielay-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <form method="POST" action="options.php" class="cookielay-content__main">
                        <?php
                        settings_fields('cookielay_text');
                        $settings = get_option('cookielay_settings_text');
                        ?>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('General', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Headline', 'cookielay'); ?></span>
                                        <?php _e('The heading in the general part of the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[general-headline]" value="<?php echo $settings["general-headline"]; ?>" placeholder="<?php _e('Headline', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Description', 'cookielay'); ?></span>
                                        <?php _e('The description in the general part of the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <textarea rows="4" name="cookielay_settings_text[general-description]" placeholder="<?php _e('Description', 'cookielay'); ?>" required><?php echo $settings["general-description"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Button (Allow all)', 'cookielay'); ?></span>
                                        <?php _e('The label of the button to allow all used cookies.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[general-button-all]" value="<?php echo $settings["general-button-all"]; ?>" placeholder="<?php _e('Button (Allow all)', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Button (Save selection)', 'cookielay'); ?></span>
                                        <?php _e('The label of the button to allow all of the selected groups / cookies.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[general-button-selected]" value="<?php echo $settings["general-button-selected"]; ?>" placeholder="<?php _e('Button (Save selection)', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Button (Recet)', 'cookielay'); ?></span>
                                        <?php _e('The label of the button to reject all cookies.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[general-button-reject]" value="<?php echo $settings["general-button-reject"]; ?>" placeholder="<?php _e('Button (Reject)', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Button (Individual settings)', 'cookielay'); ?></span>
                                        <?php _e('The label of the button to set individual settings.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[general-button-individual]" value="<?php echo $settings["general-button-individual"]; ?>" placeholder="<?php _e('Button (Individual settings)', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Privacy policy', 'cookielay'); ?></span>
                                        <?php _e('The link text for privacy policy in the general part of the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[general-privacy]" value="<?php echo $settings["general-privacy"]; ?>" placeholder="<?php _e('Privacy policy', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Imprint', 'cookielay'); ?></span>
                                        <?php _e('The link text for the imprint in the general part of the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[general-imprint]" value="<?php echo $settings["general-imprint"]; ?>" placeholder="<?php _e('Imprint', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Active', 'cookielay'); ?></span>
                                        <?php _e('The label for the active state of a cookie or cookie group.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[general-active]" value="<?php echo $settings["general-active"]; ?>" placeholder="<?php _e('Active', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Inactive', 'cookielay'); ?></span>
                                        <?php _e('The label for the inactive state of a cookie or cookie group.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[general-inactive]" value="<?php echo $settings["general-inactive"]; ?>" placeholder="<?php _e('Inactive', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Individual settings', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Headline', 'cookielay'); ?></span>
                                        <?php _e('The heading in the part of the individual settings of the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[individual-headline]" value="<?php echo $settings["individual-headline"]; ?>" placeholder="<?php _e('Headline', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Description', 'cookielay'); ?></span>
                                        <?php _e('The description in the part of the individual settings of the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <textarea rows="4" name="cookielay_settings_text[individual-description]" placeholder="<?php _e('Description', 'cookielay'); ?>"><?php echo $settings["individual-description"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Button (Save)', 'cookielay'); ?></span>
                                        <?php _e('The label of the button to save the individual settings.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[individual-button-safe]" value="<?php echo $settings["individual-button-safe"]; ?>" placeholder="<?php _e('Button (Save)', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Button (Cancel)', 'cookielay'); ?></span>
                                        <?php _e('The label of the button to not save the individual settings.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[individual-button-cancel]" value="<?php echo $settings["individual-button-cancel"]; ?>" placeholder="<?php _e('Button (Cancel)', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Button (Show cookies)', 'cookielay'); ?></span>
                                        <?php _e('The label of the button to display the cookies of a cookie group.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[individual-button-showcookies]" value="<?php echo $settings["individual-button-showcookies"]; ?>" placeholder="<?php _e('Button (Show cookies)', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Cookie', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Title', 'cookielay'); ?></span>
                                        <?php _e('The label for the cookie title in the cookie details view.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[cookie-title]" value="<?php echo $settings["cookie-title"]; ?>" placeholder="<?php _e('Title', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Name', 'cookielay'); ?></span>
                                        <?php _e('The label for the cookie name in the cookie details view.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[cookie-name]" value="<?php echo $settings["cookie-name"]; ?>" placeholder="<?php _e('Name', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Provider', 'cookielay'); ?></span>
                                        <?php _e('The label for the cookie provider in the cookie details view.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[cookie-provider]" value="<?php echo $settings["cookie-provider"]; ?>" placeholder="<?php _e('Provider', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Function', 'cookielay'); ?></span>
                                        <?php _e('The label for the cookie function in the cookie details view.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[cookie-function]" value="<?php echo $settings["cookie-function"]; ?>" placeholder="<?php _e('Function', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Lifetime', 'cookielay'); ?></span>
                                        <?php _e('The label for the cookie lifetime in the cookie details view.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[cookie-time]" value="<?php echo $settings["cookie-time"]; ?>" placeholder="<?php _e('Lifetime', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Privacy Policy', 'cookielay'); ?></span>
                                        <?php _e('The label for the privacy policy of the cookie in the cookie detail view.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[cookie-privacy]" value="<?php echo $settings["cookie-privacy"]; ?>" placeholder="<?php _e('Privacy Policy', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Imprint', 'cookielay'); ?></span>
                                        <?php _e('The label for the imprint of the cookie in the cookie detail view.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cookielay_settings_text[cookie-imprint]" value="<?php echo $settings["cookie-imprint"]; ?>" placeholder="<?php _e('Imprint', 'cookielay'); ?>" required>
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