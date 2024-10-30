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

<?php
$id = esc_attr($_GET["id"]);
$cookie = $this->get_cookie($id);
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-headline">
        <h1><?php echo $cookie["title"]; ?></h1>
        <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo str_replace(array("http://", "https://"), "", COOKIELAY_WEBSITE); ?></a>
    </section>

    <section class="cookielay-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <form action="<?php echo admin_url('admin.php?page=cookielay-cookies'); ?>" method="POST" class="cookielay-content__main">
                        <?php wp_nonce_field('cookie-edit'); ?>
                        <input type="hidden" name="action" value="cookie-edit">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                                        <?php if($cookie["cookielay_cookie"]): ?>
                                        <input type="hidden" name="title" value="<?php echo esc_attr($cookie["title"]); ?>" required>
                                        <a href="<?php echo admin_url('admin.php?page=cookielay-prime'); ?>" class="prime"><span><i class="ti-lock"></i></span><?php _e('Available with Cookielay Premium!', 'cookielay'); ?></a>
                                        <?php else: ?>
                                        <input type="text" name="title" value="<?php echo esc_attr($cookie["title"]); ?>" placeholder="<?php _e('Title', 'cookielay'); ?>" required>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Name', 'cookielay'); ?></span>
                                        <?php _e('The unique name of the cookie as it is stored in the browser of the user.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <?php if($cookie["cookielay_cookie"]): ?>
                                        <input type="hidden" name="name" value="<?php echo esc_attr($cookie["name"]); ?>" required>
                                        <a href="<?php echo admin_url('admin.php?page=cookielay-prime'); ?>" class="prime"><span><i class="ti-lock"></i></span><?php _e('Available with Cookielay Premium!', 'cookielay'); ?></a>
                                        <?php else: ?>
                                        <input type="text" name="name" value="<?php echo esc_attr($cookie["name"]); ?>" placeholder="<?php _e('Name', 'cookielay'); ?>" required>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Provider', 'cookielay'); ?></span>
                                        <?php _e('The provider of the cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <?php if($cookie["cookielay_cookie"]): ?>
                                        <input type="hidden" name="provider" value="<?php echo esc_attr($cookie["provider"]); ?>" required>
                                        <a href="<?php echo admin_url('admin.php?page=cookielay-prime'); ?>" class="prime"><span><i class="ti-lock"></i></span><?php _e('Available with Cookielay Premium!', 'cookielay'); ?></a>
                                        <?php else: ?>
                                        <input type="text" name="provider" value="<?php echo esc_attr($cookie["provider"]); ?>" placeholder="<?php _e('Provider', 'cookielay'); ?>" required <?php if($cookie["cookielay_cookie"]) { echo "disabled"; }?>>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Group', 'cookielay'); ?></span>
                                        <?php _e('The group to be assigned to the cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <?php if($cookie["cookielay_cookie"]): ?>
                                        <input type="hidden" name="group" value="<?php echo esc_attr($cookie["group"]); ?>" required>
                                        <?php endif; ?>
                                        <select name="group" required <?php if($cookie["cookielay_cookie"]) { echo "disabled"; }?>>
                                            <?php $this->get_groups(esc_html($cookie["group"])); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Function', 'cookielay'); ?></span>
                                        <?php _e('The function of the cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="description" value="<?php echo esc_attr($cookie["description"]); ?>" placeholder="<?php _e('Function', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Lifetime', 'cookielay'); ?></span>
                                        <?php _e('The lifetime of the cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="lifetime" value="<?php echo esc_attr($cookie["lifetime"]); ?>" placeholder="<?php _e('Lifetime', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Privacy policy', 'cookielay'); ?></span>
                                        <?php _e('The privacy policy of the cookie or cookie provider.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="url" name="privacy" value="<?php echo esc_attr($cookie["privacy"]); ?>" placeholder="<?php _e('Privacy policy', 'cookielay'); ?>">
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Imprint', 'cookielay'); ?></span>
                                        <?php _e('The imprint of the cookie or cookie provider.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="url" name="imprint" value="<?php echo esc_attr($cookie["imprint"]); ?>" placeholder="<?php _e('Imprint', 'cookielay'); ?>">
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
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
                                        <?php _e('The scripts (with the script tag) are executed prioritized in the head tag of the website.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="switch-wrapper">
                                            <label class="switch">
                                                <input type="checkbox" name="execute_header" <?php if($cookie["execute_header"] == 1){echo "checked";} ?>>
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
                                        <textarea rows="10" name="allow_script" class="codeeditor-html"><?php echo esc_textarea(html_entity_decode($cookie["allow_script"])); ?></textarea>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Scripts (Block)', 'cookielay'); ?></span>
                                        <?php _e('The scripts will be executed if the cookie was blocked by the visitor.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <textarea rows="10" name="disallow_script" class="codeeditor-html"><?php echo esc_textarea(html_entity_decode($cookie["disallow_script"])); ?></textarea>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
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