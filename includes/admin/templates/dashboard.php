<?php
/**
 * Cookielay "Dashboard" template (Admin)
 * 
 * The template for the dashboard in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates
 */
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-headline">
        <h1><?php _e('Dashboard', 'cookielay'); ?></h1>
        <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo str_replace(array("http://", "https://"), "", COOKIELAY_WEBSITE); ?></a>
    </section>

    <section class="cookielay-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <main class="cookielay-content__main">
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Status', 'cookielay'); ?></h2>
                                <div class="switch-wrapper toggle-cookielay">
                                    <div class="label"><?php _e('Enable Cookielay', 'cookielay'); ?></div>
                                    <label class="switch">
                                        <input type="checkbox" <?php if($this->status) {echo "checked";} ?>>
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="status">
                                    <div class="label"><?php _e('Status', 'cookielay'); ?></div>
                                    <div class="value"><?php $this->show_status(); ?></div>
                                </div>
                                <div class="status">
                                    <div class="label"><?php _e('License', 'cookielay'); ?></div>
                                    <div class="value"><?php _e('Free', 'cookielay'); ?></div>
                                </div>
                                <div class="status">
                                    <div class="label"><?php _e('Version', 'cookielay'); ?></div>
                                    <div class="value"><?php $this->show_version(); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Quick start', 'cookielay'); ?></h2>
                                <a href="?page=cookielay-help" class="cl-button primary"><?php _e('Help & Support', 'cookielay'); ?></a>
                            </div>
                            <div class="cookielay-box__content">
                                <ul class="quickstart">
                                    <li>
                                        <span>1</span>
                                        <div class="title"><?php _e('Configure Cookielay', 'cookielay'); ?></div>
                                        <div class="desc"><?php _e('You have successfully installed Cookielay! Now, as a first step, you should configure everything as you need it. Change the general settings, adjust the style and change the texts according to your preferences.', 'cookielay'); ?></div>
                                    </li>
                                    <li>
                                        <span>2</span>
                                        <div class="title"><?php _e('Add cookies', 'cookielay'); ?></div>
                                        <div class="desc"><?php _e('What kind of cookies does your website set? If you are unsure, you can find instructions on how to do this under "Help and Support". Add the cookies and create cookie groups if necessary.', 'cookielay'); ?></div>
                                    </li>
                                    <li>
                                        <span>3</span>
                                        <div class="title"><?php _e('Add shortcodes', 'cookielay'); ?></div>
                                        <div class="desc"><?php _e('You should give your website visitors the opportunity to change cookie settings or revoke them altogether. Surprise: Under the menu item "Shortcodes" you can find suitable shortcodes. Simply insert them at the appropriate place on your website.', 'cookielay'); ?></div>
                                    </li>
                                    <li>
                                        <span>4</span>
                                        <div class="title"><?php _e('Enable Cookielay', 'cookielay'); ?></div>
                                        <div class="desc"><?php _e('Now it gets serious: you are ready to go live with Cookielay and give your website visitors the ability to manage their Cooke preferences. To do this, simply check the "Enable Cookielay" option on the dashboard.', 'cookielay'); ?></div>
                                    </li>
                                </ul>
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