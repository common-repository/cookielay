<?php
/**
 * Cookielay "Header" template (Admin)
 * 
 * The template for the header in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin/templates/partials
 */
?>


<?php $this->show_response(); ?>

<?php $this->render_alerts(); ?>

<header class="cookielay-header">
    <a href="?page=cookielay" class="logo">
        <img src="<?php echo COOKIELAY_ROOT_URL . '/admin/'; ?>img/logo.svg">
        <div class="name"><?php echo COOKIELAY_NAME; ?><span><?php _e('Free', 'cookielay'); ?></span></div>
    </a>
    <div class="info">
        <?php $this->show_status_header(); ?>
    </div>
</header>

<nav class="cookielay-menu">
    <div class="cookielay-menu__toggle d-lg-none"><span></span></div>
    <ul>
        <li <?php if($this->get_current_site() == 'cookielay') { echo 'class="active"'; } ?>><a href="?page=cookielay"><?php _e('Dashboard', 'cookielay'); ?></a></li>
        <li <?php if($this->get_current_site() == 'cookielay-settings') { echo 'class="active"'; } ?>><a href="?page=cookielay-settings"><?php _e('Settings', 'cookielay'); ?></a></li>
        <li <?php if($this->get_current_site() == 'cookielay-style') { echo 'class="active"'; } ?>><a href="?page=cookielay-style"><?php _e('Style', 'cookielay'); ?></a></li>
        <li <?php if($this->get_current_site() == 'cookielay-text') { echo 'class="active"'; } ?>><a href="?page=cookielay-text"><?php _e('Text', 'cookielay'); ?></a></li>
        <li <?php if($this->get_current_site() == 'cookielay-cookies') { echo 'class="active"'; } ?>><a href="?page=cookielay-cookies"><?php _e('Cookies', 'cookielay'); ?></a></li>
        <li <?php if($this->get_current_site() == 'cookielay-shortcodes') { echo 'class="active"'; } ?>><a href="?page=cookielay-shortcodes"><?php _e('Shortcodes', 'cookielay'); ?></a></li>
        <li <?php if($this->get_current_site() == 'cookielay-prime') { echo 'class="active"'; } ?>><a href="?page=cookielay-prime"><?php _e('Premium', 'cookielay'); ?></a></li>
        <li class="support"><a href="?page=cookielay-help"><?php _e('Help & Support', 'cookielay'); ?></a></li>
    </ul>
</nav>