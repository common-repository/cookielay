<?php
/**
 * Cookielay "Prime" template (Admin)
 * 
 * The template for the prime page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates
 */
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-content">
        <div class="cookielay-content__prime">
            <div class="prime-features">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-md-10 col-md-12 col-sm-12 text-center">
                            <h2><?php _e('All functions at a glance', 'cookielay'); ?></h2>
                            <p><?php _e('With Cookielay Premium you get unlimited access to all features and functions. So you can customize and extend Cookielay according to your needs.', 'cookielay'); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="features-overview">
                                <div class="feature">
                                    <div class="title"><span><i class="ti-check"></i></span><?php _e('Multilingual-Support (WPML & Polylang)', 'cookielay'); ?></div>
                                    <div class="desc"><?php _e('Cookielay automatically supports your multilingual website. It does not matter if you use WPML or Polylang as plugin - it works.', 'cookielay'); ?></div>
                                </div>
                                <div class="feature">
                                    <div class="title"><span><i class="ti-check"></i></span><?php _e('Multisite-Support', 'cookielay'); ?></div>
                                    <div class="desc"><?php _e('You use a WordPress instance to manage multiple websites? With Cookielay Premium you get an easy and efficient multisite support.', 'cookielay'); ?></div>
                                </div>
                                <div class="feature">
                                    <div class="title"><span><i class="ti-check"></i></span><?php _e('Automatic cookie detection', 'cookielay'); ?></div>
                                    <div class="desc"><?php _e('Cookielay automatically detects the cookies used by you and your website and adds them to the cookie overview automatically if you wish.', 'cookielay'); ?></div>
                                </div>
                                <div class="feature">
                                    <div class="title"><span><i class="ti-check"></i></span><?php _e('Content-Blocker', 'cookielay'); ?></div>
                                    <div class="desc"><?php _e('With the Content-Blocker you can block certain content on your website. Only after the user gives his consent, they will become visible.', 'cookielay'); ?></div>
                                </div>
                                <div class="feature">
                                    <div class="title"><span><i class="ti-check"></i></span><?php _e('Custom overlay style', 'cookielay'); ?></div>
                                    <div class="desc"><?php _e('Regardless of the presets, you can change the colors, font family and font size of the overlay according to your preferences.', 'cookielay'); ?></div>
                                </div>
                                <div class="feature">
                                    <div class="title"><span><i class="ti-check"></i></span><?php _e('Change the name of the Cookielay cookie', 'cookielay'); ?></div>
                                    <div class="desc"><?php _e('Change the name of the essential Cookielay cookie. This will give you the possibility to brand Cookielay completely to you and your brand.', 'cookielay'); ?></div>
                                </div>
                                <div class="feature">
                                    <div class="title"><span><i class="ti-check"></i></span><?php _e('Add unlimited cookies', 'cookielay'); ?></div>
                                    <div class="desc"><?php _e('Your website uses more than five cookies? With Cookielay Premium you can add as many cookies as you want. It does not matter what kind of cookies they are.', 'cookielay'); ?></div>
                                </div>
                                <div class="feature">
                                    <div class="title"><span><i class="ti-check"></i></span><?php _e('Premium Support', 'cookielay'); ?></div>
                                    <div class="desc"><?php _e('Premium Support will treat your request with high priority if something does not work as expected or you have another problem with Cookielay.', 'cookielay'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="prime-cta">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-12 col-sm-12 text-center">
                            <h2><?php _e('Buy Premium Now', 'cookielay'); ?></h2>
                            <p><?php _e('Upgrade to Cookielay Premium now and expand your possibilities. Get access to many useful features and functions that allow you to customize Cookielay even better to your website.', 'cookielay'); ?></p>
                            <div class="cl-button-group">
                                <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank" class="cl-button white"><?php _e('Buy Premium Now', 'cookielay'); ?></a>
                                <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank" class="cl-button outline white"><?php _e('Learn more', 'cookielay'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/footer.php'; ?>
</div>