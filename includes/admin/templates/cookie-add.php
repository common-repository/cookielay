<?php
/**
 * Cookielay "Group add" template (Admin)
 * 
 * The template for the group add page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates
 */
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-headline">
        <h1><?php _e('Add cookie', 'cookielay'); ?></h1>
        <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo str_replace(array("http://", "https://"), "", COOKIELAY_WEBSITE); ?></a>
    </section>

    <section class="cookielay-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <form action="<?php echo admin_url('admin.php?page=cookielay-cookies'); ?>" method="POST" class="cookielay-content__main">
                        <?php wp_nonce_field('cookie-add'); ?>
                        <input type="hidden" name="action" value="cookie-add">
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Presets', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input" style="margin-bottom:0;">
                                    <div class="label">
                                        <span><?php _e('Preset', 'cookielay'); ?></span>
                                        <?php _e('The preset, with the help of which a cookie can be easily created.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <select id="select-preset">
                                            <option value="custom" selected><?php _e('Custom', 'cookielay'); ?></option>
                                            <?php $this->print_presets(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('General', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Title', 'cookielay'); ?></span>
                                        <?php _e('The freely selected title of the cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="title" placeholder="<?php _e('Title', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Name', 'cookielay'); ?></span>
                                        <?php _e('The unique name of the cookie as it is stored in the browser of the user.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="name" placeholder="<?php _e('Name', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Provider', 'cookielay'); ?></span>
                                        <?php _e('The provider of the cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="provider" placeholder="<?php _e('Provider', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Group', 'cookielay'); ?></span>
                                        <?php _e('The group to be assigned to the cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <select name="group" required>
                                            <?php $this->get_groups(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Function', 'cookielay'); ?></span>
                                        <?php _e('The function of the cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="description" placeholder="<?php _e('Function', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Lifetime', 'cookielay'); ?></span>
                                        <?php _e('The lifetime of the cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="lifetime" placeholder="<?php _e('Lifetime', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Privacy policy', 'cookielay'); ?></span>
                                        <?php _e('The privacy policy of the cookie or cookie provider.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="url" name="privacy" placeholder="<?php _e('Privacy policy', 'cookielay'); ?>">
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Imprint', 'cookielay'); ?></span>
                                        <?php _e('The imprint of the cookie or cookie provider.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="url" name="imprint" placeholder="<?php _e('Imprint', 'cookielay'); ?>">
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Add cookie', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Scripts', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Execute scripts in the head', 'cookielay'); ?></span>
                                        <?php _e('The scripts are executed prioritized in the head tag of the website.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="switch-wrapper">
                                            <label class="switch">
                                                <input type="checkbox" name="execute_header">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Scripts (Allow)', 'cookielay'); ?></span>
                                        <?php _e('The scripts (with the script tag) are executed when the cookie is allowed by the visitor.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <textarea rows="10" name="allow_script" class="codeeditor-html"></textarea>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Scripts (Block)', 'cookielay'); ?></span>
                                        <?php _e('The scripts (with the script tag) will be executed if the cookie was blocked by the visitor.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <textarea rows="10" name="disallow_script" class="codeeditor-html"></textarea>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Add cookie', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4">
                    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/sidebar.php'; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/footer.php'; ?>
</div>