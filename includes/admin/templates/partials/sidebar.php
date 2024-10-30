<?php
/**
 * Cookielay "Sidebar" template (Admin)
 * 
 * The template for the sidebar in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates/partials
 */
?>

<aside class="cookielay-content__sidebar">
    <div class="cookielay-box">
        <div class="cookielay-box__header">
            <h2><?php _e('Buy Premium Now', 'cookielay'); ?></h2>
        </div>
        <div class="cookielay-box__content">
            <p><?php _e('Upgrade to Cookielay Premium now and expand your possibilities. Get access to many useful features and functions that allow you to customize Cookielay even better for your website. These include:', 'cookielay'); ?></p>
            <ul class="benefits">
                <li><span><i class="ti-check"></i></span><?php _e('Multilingual-Support (WPML & Polylang)', 'cookielay'); ?></li>
                <li><span><i class="ti-check"></i></span><?php _e('Multisite-Support', 'cookielay'); ?></li>
                <li><span><i class="ti-check"></i></span><?php _e('Automatic cookie detection', 'cookielay'); ?></li>
                <li><span><i class="ti-check"></i></span><?php _e('Remove branding', 'cookielay'); ?></li>
            </ul>
            <div class="cl-button-group">
                <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank" class="cl-button white"><?php _e('Buy Premium Now', 'cookielay'); ?></a>
                <a href="?page=cookielay-prime" class="cl-link white"><?php _e('Learn more', 'cookielay'); ?></a>
            </div>
        </div>
    </div>
    <div class="cookielay-box">
        <div class="cookielay-box__header">
            <h2><?php _e('Reset Cookielay cookie', 'cookielay'); ?></h2>
        </div>
        <div class="cookielay-box__content">
            <form method="POST" action="options.php" id="reset-form">
                <?php settings_fields('cookielay_token'); ?>
                <p><?php _e('In some cases, it is advisable to display Cookielay to the website visitor again, even though he has already made his cookie settings. This should happen, for example, after adding a cookie or changing an essential setting.', 'cookielay'); ?></p>
                <label class="checkbox">
                    <input type="checkbox" required>
                    <span></span>
                    <div class="caption"><?php _e('Confirm reset', 'cookielay'); ?></div>
                </label>
                <button type="submit" class="cl-button outline" disabled><?php _e('Reset cookie', 'cookielay'); ?></button>
            </form>
        </div>
    </div>
    <div class="cookielay-box">
        <div class="cookielay-box__header">
            <h2><?php _e('Help & Support', 'cookielay'); ?></h2>
        </div>
        <div class="cookielay-box__content">
            <p><?php _e('You need help or something does not work as it should? Surely there is already a solution for your problem. Of course you also have the possibility to contact the support.', 'cookielay'); ?></p>
            <a href="?page=cookielay-help" class="cl-button outline"><?php _e('Help & Support', 'cookielay'); ?></a>
        </div>
    </div>
    <div class="cookielay-legal">
        <div class="cookielay-legal__credit"><a href="<?php echo COOKIELAY_AUTHOR_WEBSITE; ?>" target="_blank"><?php _e("Made by"); ?> <strong><?php echo COOKIELAY_AUTHOR_NAME; ?></strong>.</a></div>
        <div class="cookielay-legal__support"><?php _e("Supported by"); ?> <a href="https://www.pechschwarz.de" target="_blanK">pechschwarz</a> and André.</div>
    </div>
</aside>