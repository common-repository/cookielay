<?php
/**
 * Cookielay "Shortcodes" template (Admin)
 * 
 * The template for the shortcodes page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates
 */
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-headline">
        <h1><?php _e('Shortcodes', 'cookielay'); ?></h1>
        <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo str_replace(array("http://", "https://"), "", COOKIELAY_WEBSITE); ?></a>
    </section>

    <section class="cookielay-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <main class="cookielay-content__main">
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Cookie settings', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="shortcode">
                                    <div class="label">
                                        <span><?php _e('Edit cookies', 'cookielay'); ?></span>
                                        <?php _e('Generates a link to open the Cookielay overlay to adjust settings.', 'cookielay'); ?>
                                    </div>
                                    <div class="value">
                                        <input type="text" data-cookielay="shortcode" value='[cookielay action="open" text="<?php _e('Edit cookie settings', 'cookielay'); ?>" class="custom-class"]' readonly>
                                        <button class="cl-button primary" data-cookielay="shortcode-copy" data-cookielay-alt="<?php _e('Copied!', 'cookielay'); ?>"><?php _e('Copy', 'cookielay'); ?></button>
                                    </div>
                                </div>
                                <hr />
                                <div class="shortcode">
                                    <div class="label">
                                        <span><?php _e('Reset cookie settings', 'cookielay'); ?></span>
                                        <?php _e('Generates a link to reset all cookie settings.', 'cookielay'); ?>
                                    </div>
                                    <div class="value">
                                        <input type="text" data-cookielay="shortcode" value='[cookielay action="reset-settings" text="<?php _e('Reset cookie settings', 'cookielay'); ?>" class="custom-class"]' readonly>
                                        <button class="cl-button primary" data-cookielay="shortcode-copy" data-cookielay-alt="<?php _e('Copied!', 'cookielay'); ?>"><?php _e('Copy', 'cookielay'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Disagree cookie', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Select cookie', 'cookielay'); ?></span>
                                        <?php _e('The cookie to which, with the help of the shortcode, you want to object.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <select id="delete-cookie-select">
                                            <option value="" selected disabled><?php _e('Select cookie', 'cookielay'); ?></option>
                                            <?php $this->get_cookies(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="shortcode">
                                    <div class="label">
                                        <span><?php _e('Shortcode', 'cookielay'); ?></span>
                                        <?php _e('Generates a link to object to the selected cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="value">
                                        <input type="text" data-cookielay="shortcode" id="delete-cookie-shortcode" value='<?php _e('Please select cookie.', 'cookielay'); ?>' readonly>
                                        <button class="cl-button primary" data-cookielay="shortcode-copy" data-cookielay-alt="<?php _e('Copied!', 'cookielay'); ?>"><?php _e('Copy', 'cookielay'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
                    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/sidebar.php'; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/footer.php'; ?>
</div>