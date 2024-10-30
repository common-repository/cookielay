<?php
/**
 * Cookielay "Help" template (Admin)
 * 
 * The template for the help page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates
 */
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-headline">
        <h1><?php _e('Help & Support', 'cookielay'); ?></h1>
        <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo str_replace(array("http://", "https://"), "", COOKIELAY_WEBSITE); ?></a>
    </section>

    <section class="cookielay-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <main class="cookielay-content__main">
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Frequent questions and problems', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="cl-accordion">
                                    <div class="cl-accordion__header"><?php _e('Cookielay is not displayed on my website', 'cookielay'); ?></div>
                                    <div class="cl-accordion__content">
                                        <div class="inner">
                                            <p><?php _e('If Cookielay is not displayed on your website, then this may be due to various reasons. First of all, you should check if Cookielay is active at all. The current status is constantly displayed in the upper area. If it is currently inactive, you need to enable Cookielay in the Dashboard first. Additionally, you should check your settings.', 'cookielay'); ?></p>
                                            <p><?php _e('Cookielay is still not displayed? Open the JavaScript console on your website and see if any error messages are displayed. In many cases, these are helpful for troubleshooting.', 'cookielay'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="cl-accordion">
                                    <div class="cl-accordion__header"><?php _e('Cookielay is displayed again with every page view', 'cookielay'); ?></div>
                                    <div class="cl-accordion__content">
                                        <div class="inner">
                                            <p><?php _e('Please check your domain in the settings. If your entered URL is incorrect or incomplete, then the cookie cannot be set properly, which leads to repeated display of Cookielay.', 'cookielay'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="cl-accordion">
                                    <div class="cl-accordion__header"><?php _e('How do I know which cookies my website sets and for which I need to obtain consent?', 'cookielay'); ?></div>
                                    <div class="cl-accordion__content">
                                        <div class="inner">
                                            <p><?php _e('There are several ways to find out which cookies your website sets. The easiest way is to check the privacy settings of your browser to see which cookies belong to your website. Alternatively, there are also a bunch of websites out there that scan your site for cookies. Just search for them.', 'cookielay'); ?></p>
                                            <p><?php _e('Unfortunately, we can not give you legal advice on which cookies you need to get consent for. Basically, you should get consent from the user for every cookie, unless it is absolutely necessary for the operation of your website.', 'cookielay'); ?></p>
                                            <p><?php _e('Is that too complicated for you? Upgrade to Cookielay Premium and you will get, among many other useful features, a cookie scanner that lets you read your site cookies directly.', 'cookielay'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="cl-accordion">
                                    <div class="cl-accordion__header"><?php _e('How do I add a cookie to Cookielay?', 'cookielay'); ?></div>
                                    <div class="cl-accordion__content">
                                        <div class="inner">
                                            <p><?php _e('First of all, you should know what kind of cookie you want to add to Cookielay and what its function is. To add the cookie, click "Add cookie" under "Cookies". Enter a title that fits the cookie. In the corresponding field, enter the actual name of the cookie as it is stored in the browser. Fill in all other fields and select a cookie group. If you do not find a suitable group, you should create one first.', 'cookielay'); ?></p>
                                            <p><?php _e('Now it gets exciting: Copy the JavaScript code, which should be executed after the consent or after blocking the cookie, into the appropriate editors (with the script-tag). The corresponding code will then be executed on every page load. For example, for a statistics cookie, you add the tracking code in the "Scripts (Allow)" field.', 'cookielay'); ?></p>
                                            <p><?php _e('Now you just have to save the cookie and activate it in the overview.', 'cookielay'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Support', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <p><?php _e('Your problem still exists or you have a question about another topic? This is not a problem at all! Just contact the support or post your question in the official plugin forum and get additional help from many other users.', 'cookielay'); ?></p>
                                <div class="cl-button-group">
                                    <a href="mailto:support@cookielay.com" class="cl-button primary"><?php _e('Contact support', 'cookielay'); ?></a>
                                    <a href="https://wordpress.org/support/plugin/cookielay/" class="cl-button primary outline"><?php _e('Support-Forum', 'cookielay'); ?></a>
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