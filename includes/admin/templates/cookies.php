<?php
/**
 * Cookielay "Cookies" template (Admin)
 * 
 * The template for the cookies page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates
 */
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-headline">
        <h1><?php _e('Cookies', 'cookielay'); ?></h1>
        <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo str_replace(array("http://", "https://"), "", COOKIELAY_WEBSITE); ?></a>
    </section>

    <section class="cookielay-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <main class="cookielay-content__main">
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Groups', 'cookielay'); ?></h2>
                                <a href="<?php echo admin_url('admin.php?page=cookielay-cookies') . '&action=add-group'?>" class="cl-button primary"><?php _e('Add group', 'cookielay'); ?></a>
                            </div>
                            <div class="cookielay-box__content">
                                <?php $this->show_groups(); ?>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Cookies', 'cookielay'); ?></h2>
                                <div class="cl-button-group">
                                    <a href="#" class="cl-button primary outline disabled"><?php _e('Scan cookies', 'cookielay'); ?></a>
                                    <?php $this->print_cookie_add(); ?>
                                </div>
                            </div>
                            <div class="cookielay-box__content">
                                <?php $this->show_cookies(); ?>
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

    <div class="cl-modal" data-cl-id="delete_group">
        <div class="cl-modal__box">
            <div class="cl-box-text"><div class="cl-box-close"><i class="ti-close"></i></div><?php _e('Should the group', 'cookielay'); ?> <span></span> <?php _e('be deleted?', 'cookielay'); ?></div>
            <div class="cl-box-buttons">
                <a href="#" class="submit warning"><?php _e('Delete', 'cookielay'); ?></a>
                <button href="#" class="cancel"><?php _e('Cancel', 'cookielay'); ?></button>
            </div>
        </div>
    </div>

    <div class="cl-modal" data-cl-id="delete_cookie">
        <div class="cl-modal__box">
            <div class="cl-box-text"><div class="cl-box-close"><i class="ti-close"></i></div><?php _e('Should the cookie', 'cookielay'); ?> <span></span> <?php _e('be deleted?', 'cookielay'); ?></div>
            <div class="cl-box-buttons">
                <a href="#" class="submit warning"><?php _e('Delete', 'cookielay'); ?></a>
                <button class="cancel"><?php _e('Cancel', 'cookielay'); ?></button>
            </div>
        </div>
    </div>

    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/footer.php'; ?>
</div>