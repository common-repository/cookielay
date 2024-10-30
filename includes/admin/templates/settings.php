<?php
/**
 * Cookielay "Settings" template (Admin)
 * 
 * The template for the settings page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates
 */
?>

<div id="cookielay-container">
    <?php include COOKIELAY_ROOT_PATH . 'includes/admin/templates/partials/header.php'; ?>

    <section class="cookielay-headline">
        <h1><?php _e('Settings', 'cookielay'); ?></h1>
        <a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo str_replace(array("http://", "https://"), "", COOKIELAY_WEBSITE); ?></a>
    </section>

    <section class="cookielay-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <form method="POST" action="options.php" class="cookielay-content__main">
                        <?php
                        settings_fields('cookielay_main');
                        $settings = get_option('cookielay_settings_main');
                        ?>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('General settings', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Exceptions (Pages)', 'cookielay'); ?></span>
                                        <?php _e('Cookielay is not displayed on the selected pages.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <?php
                                        $posts = $this->get_posts();
                                        ?>
                                        <select multiple="multiple" size="<?php if(count($posts) < 10) { echo count($posts); } else { echo 10; } ?>" name="cookielay_settings_main[posts-exceptions][]">
                                            <?php
                                            foreach($posts as $post) {
                                                $selected = false;
                                                if($settings["posts-exceptions"] != "") {
                                                    foreach($settings["posts-exceptions"] as $id) {
                                                        if($id == $post["id"]) {
                                                            $selected = true;
                                                        }
                                                    }
                                                }
                                                if($selected == true) {
                                                    echo '<option value="'.$post["id"].'" selected>'.$post["title"].'</option>';
                                                } else {
                                                    echo '<option value="'.$post["id"].'">'.$post["title"].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Exceptions (Types)', 'cookielay'); ?></span>
                                        <?php _e('Cookielay is not displayed on the selected post types.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <?php
                                        $posttypes = $this->get_posttypes();
                                        ?>
                                        <select multiple size="<?php if(count($posttypes) < 10) { echo count($posttypes); } else { echo 10; } ?>" name="cookielay_settings_main[posttypes-exceptions][]">
                                            <?php
                                            foreach($posttypes as $posttype) {
                                                $selected = false;
                                                if($settings["posttypes-exceptions"] != "") {
                                                    foreach($settings["posttypes-exceptions"] as $name) {
                                                        if($name == $posttype["name"]) {
                                                            $selected = true;
                                                        }
                                                    }
                                                }
                                                if($selected == true) {
                                                    echo '<option value="'.$posttype["name"].'" selected>'.$posttype["label"].'</option>';
                                                } else {
                                                    echo '<option value="'.$posttype["name"].'">'.$posttype["label"].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Disable for bots / crawlers', 'cookielay'); ?></span>
                                        <?php _e('Disable Cookielay for search engine bots and crawlers.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="switch-wrapper">
                                            <label class="switch">
                                                <input type="checkbox" name="cookielay_settings_main[deactivate-bots]" <?php if($settings["deactivate-bots"] == 'on'){echo "checked";} ?>>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Reload after selection', 'cookielay'); ?></span>
                                        <?php _e('Reloads the page after the visitor has made his cookie settings.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="switch-wrapper">
                                            <label class="switch">
                                                <input type="checkbox" name="cookielay_settings_main[reload]" <?php if($settings["reload"] == 'on'){echo "checked";} ?>>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Imprint', 'cookielay'); ?></span>
                                        <?php _e('The page where the imprint can be found.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <select name="cookielay_settings_main[imprint-page]">
                                            <option value="" selected><?php _e('Select page', 'cookielay'); ?></option>
                                            <?php
                                            foreach($posts as $post) {
                                                if($settings["imprint-page"] == $post["id"]){
                                                    echo '<option value="'.$post["id"].'" selected>'.$post["title"].'</option>';
                                                } else {
                                                    echo '<option value="'.$post["id"].'">'.$post["title"].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Privacy policy', 'cookielay'); ?></span>
                                        <?php _e('The page where the privacy policy can be found.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <select name="cookielay_settings_main[privacy-page]">
                                            <option value="" selected><?php _e('Select page', 'cookielay'); ?></option>
                                            <?php
                                            foreach($posts as $post) {
                                                if($settings["privacy-page"] == $post["id"]){
                                                    echo '<option value="'.$post["id"].'" selected>'.$post["title"].'</option>';
                                                } else {
                                                    echo '<option value="'.$post["id"].'">'.$post["title"].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Domain settings', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Automatic domain recognition', 'cookielay'); ?></span>
                                        <?php _e('Automatically detect the domain of the website where Cookielay is displayed.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <a href="<?php echo admin_url('admin.php?page=cookielay-prime'); ?>" class="prime"><span><i class="ti-lock"></i></span><?php _e('Available with Cookielay Premium!', 'cookielay'); ?></a>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Manual domain entry', 'cookielay'); ?></span>
                                        <?php _e('Manually enter the domain of the website where Cookielay is displayed.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="url" name="cookielay_settings_main[domain]" value="<?php echo $settings["domain"]; ?>" placeholder="<?php _e('Manual domain entry', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Cookie settings', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Essential cookie group', 'cookielay'); ?></span>
                                        <?php _e('The group where the essential cookies are stored.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <?php
                                        $groups = $this->get_groups();
                                        ?>
                                        <select name="cookielay_settings_main[essential-group]" required>
                                            <?php
                                            foreach($groups as $group) {
                                                if($settings["essential-group"] == $group["id"]){
                                                    echo '<option value="'.$group["id"].'" selected>'.$group["name"].'</option>';
                                                } else {
                                                    echo '<option value="'.$group["id"].'">'.$group["name"].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Cookielay-Cookie', 'cookielay'); ?></span>
                                        <?php _e('The primary cookie that stores all the cookie settings of the visitor.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <a href="<?php echo admin_url('admin.php?page=cookielay-prime'); ?>" class="prime"><span><i class="ti-lock"></i></span><?php _e('Available with Cookielay Premium!', 'cookielay'); ?></a>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Lifetime', 'cookielay'); ?></span>
                                        <?php _e('The duration (in days) of storage at the visitor of the primary cookie.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="number" name="cookielay_settings_main[cookielay-lifetime]" value="<?php echo $settings["cookielay-lifetime"]; ?>" placeholder="<?php _e('Lifetime', 'cookielay'); ?>" required>
                                    </div>
                                </div>
                                <div class="safe">
                                    <button type="submit" class="cl-button primary"><?php _e('Save', 'cookielay'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="cookielay-box">
                            <div class="cookielay-box__header">
                                <h2><?php _e('Overlay settings', 'cookielay'); ?></h2>
                            </div>
                            <div class="cookielay-box__content">
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Hide empty groups', 'cookielay'); ?></span>
                                        <?php _e('Hides cookie groups in the cookie overlay if they do not contain cookies.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="switch-wrapper">
                                            <label class="switch">
                                                <input type="checkbox" name="cookielay_settings_main[hide-empty-groups]" <?php if($settings["hide-empty-groups"] == 'on'){echo "checked";} ?>>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Hide checkboxes', 'cookielay'); ?></span>
                                        <?php _e('Hides the checkboxes in the cookie overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="switch-wrapper">
                                            <label class="switch">
                                                <input type="checkbox" name="cookielay_settings_main[hide-checkboxes]" <?php if($settings["hide-checkboxes"] == 'on'){echo "checked";} ?>>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Allow scrolling', 'cookielay'); ?></span>
                                        <?php _e('Allow scrolling while the cookie overlay is active.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="switch-wrapper">
                                            <label class="switch">
                                                <input type="checkbox" name="cookielay_settings_main[enable-scroll]" <?php if($settings["enable-scroll"] == 'on'){echo "checked";} ?>>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Remove branding', 'cookielay'); ?></span>
                                        <?php _e('Removes the branding and link in the Cookielay overlay.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <div class="switch-wrapper">
                                            <label class="switch">
                                                <input type="checkbox" name="cookielay_settings_main[hide-branding]" <?php if($settings["hide-branding"] == 'on'){echo "checked";} ?>>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input">
                                    <div class="label">
                                        <span><?php _e('Delay', 'cookielay'); ?></span>
                                        <?php _e('The delay (in seconds) before the Cookielay overlay is displayed.', 'cookielay'); ?>
                                    </div>
                                    <div class="field">
                                        <input type="number" name="cookielay_settings_main[delay]" value="<?php echo $settings["delay"]; ?>" placeholder="<?php _e('Delay', 'cookielay'); ?>" required>
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