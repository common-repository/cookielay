<?php
/**
 * Cookielay "Group edit" template (Admin)
 * 
 * The template for the group edit page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates
 */
?> 

<?php
$id = esc_attr($_GET["id"]);
$group = $this->get_group($id);
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-headline">
        <h1><?php echo $group["name"]; ?></h1>
        <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo str_replace(array("http://", "https://"), "", COOKIELAY_WEBSITE); ?></a>
    </section>

    <section class="cookielay-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <form action="<?php echo admin_url('admin.php?page=cookielay-cookies'); ?>" method="POST" class="cookielay-content__main">
                        <?php wp_nonce_field('group-edit'); ?>
                        <input type="hidden" name="action" value="group-edit">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('General', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Name', 'cookielay'); ?></span>
                                        <?php _e('The name of the cookie group.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="name" value="<?php echo esc_attr($group["name"]); ?>" placeholder="<?php _e('Name', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Description', 'cookielay'); ?></span>
                                        <?php _e('The description of the cookie group.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <textarea rows="5" name="description" placeholder="<?php _e('Description', 'cookielay'); ?>" required><?php echo esc_textarea($group["description"]); ?></textarea>
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