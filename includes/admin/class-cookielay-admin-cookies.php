<?php
/**
 * Cookielay Cookies Class (Admin)
 * 
 * The class for the cookies page in the admin area.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/admin
 */

class Cookielay_Admin_Cookies extends Cookielay_Admin_Page {
    private $presets;

    public function __construct($loader, $status) {
        parent::__construct($loader, $status);
        $this->presets = new Cookielay_Admin_Cookies_Presets();
    }

    public function run() {
        $this->loader->add_action('admin_menu', $this, 'add_page');
        $this->loader->add_action('admin_init', $this, 'actions');
        $this->loader->add_action('wp_ajax_toggle_cookie_status', $this, 'toggle_cookie_status');
        $this->loader->add_action('wp_ajax_get_preset', $this, 'get_preset');
    }

    public function add_page() {
        $this->suffix = add_submenu_page( 'cookielay', __('Cookies', 'cookielay'), __('Cookies', 'cookielay'), 'administrator', 'cookielay-cookies', array( $this, 'render_template' ));
    }

    public function render_template() {
        $actions = ["edit-group", "add-group", "edit-cookie", "add-cookie"];
        if(isset($_GET['action']) && in_array($_GET['action'], $actions)) {
            $action = $_GET['action'];
            switch($action) {
                case("edit-group"):
                    include COOKIELAY_ROOT_PATH . 'includes/admin/templates/group-edit.php';
                    break;
                case("add-group"):
                    include COOKIELAY_ROOT_PATH . 'includes/admin/templates/group-add.php';
                    break;
                case("edit-cookie"):
                    include COOKIELAY_ROOT_PATH . 'includes/admin/templates/cookie-edit.php';
                    break;
                case("add-cookie"):
                    include COOKIELAY_ROOT_PATH . 'includes/admin/templates/cookie-add.php';
                    break;
                default:
                    include COOKIELAY_ROOT_PATH . 'includes/admin/templates/cookies.php';
            }
        } else {
            include COOKIELAY_ROOT_PATH . 'includes/admin/templates/cookies.php';
        }
    }

    public function toggle_cookie_status() {
        global $wpdb;
        $status = false;
        if(isset($_POST["id"]) && isset($_POST["active"])) {
            $id = (int) $_POST["id"];
            $active = (int) $_POST["active"];
            $tablename = $wpdb->prefix . 'cookielay_cookies';
            $status = $wpdb->update($tablename, array("active" => $active), array("id" => $id));
        }
        echo $status;
        wp_die();
    }

    private function get_settings() {
        $settings = get_option("cookielay_settings_main");
        return $settings;
    }

    private function show_groups() {
        global $wpdb;
        $settings = $this->get_settings();
        $tablename = $wpdb->prefix . 'cookielay_groups';
        $groups = $wpdb->get_results("SELECT * FROM $tablename"); 
        $rows = $wpdb->num_rows;

        if($rows == 0) {
            echo '<div class="empty">'.__('No groups added.', 'cookielay').'</div>';
        } else {
            $i = 1;
            foreach($groups as $group) {
                $tablename_cookie = $wpdb->prefix . 'cookielay_cookies';
                $cookie = $wpdb->get_results("SELECT * FROM $tablename_cookie WHERE cookie_group = $group->id");
                if($group->id == $settings["essential-group"]) {
                    $disabled = 'disabled';
                    $tooltip = '<span class="tooltip">'.__('The essential cookie group cannot be deleted.', 'cookielay').'</span>';
                } else {
                    if($cookie) {
                        $disabled = 'disabled';
                        $tooltip = '<span class="tooltip">'.__('The group still contains cookies.', 'cookielay').'</span>';
                    } else {
                        $disabled = '';
                        $tooltip = '';
                    }
                }
                $delete_url = wp_nonce_url(admin_url('admin.php?page=cookielay-cookies&action=delete-group&id='.$group->id), 'delete-group');
                echo '<div class="cookie">
                            <div class="info">
                                <span>'.$group->name.'</span>
                                '.$group->description.'
                            </div>
                            <div class="actions">
                                <a href="'.admin_url('admin.php?page=cookielay-cookies').'&action=edit-group&id='.$group->id.'"><i class="ti-pencil"></i></a>
                                <button data-cl-url="'.$delete_url.'" data-cl-name="'.$group->name.'" data-cl-action="delete" data-cl-modal="delete_group" '.$disabled.'>'.$tooltip.'<i class="ti-trash"></i></button>
                            </div>
                        </div>';
                if($i != $rows) {
                    echo '<hr />';
                }
                $i++;
            }
        }
    }

    private function show_cookies() {
        global $wpdb;
        $settings = $this->get_settings();
        $tablename = $wpdb->prefix . 'cookielay_cookies';
        $cookies = $wpdb->get_results("SELECT * FROM $tablename");
        $rows = $wpdb->num_rows;
        
        if($rows == 0) {
            echo '<div class="empty">'.__('No cookies added.', 'cookielay').'</div>';
        } else {
            $i = 1;
            foreach($cookies as $cookie) {
                $tablename_group = $wpdb->prefix . 'cookielay_groups';
                $group = $wpdb->get_row("SELECT * FROM $tablename_group WHERE id = $cookie->cookie_group");
                if($cookie->active == 1) {
                    $checked = "checked";
                } else {
                    $checked = "";
                }
                if($cookie->id == $settings["cookielay-cookie"]) {
                    $disabled = 'disabled';
                    $tooltip = '<span class="tooltip">'.__('The Cookielay-Cookie cannot be deleted.', 'cookielay').'</span>';
                } else {
                    $disabled = '';
                    $tooltip = '';
                }
                $delete_url = wp_nonce_url(admin_url('admin.php?page=cookielay-cookies&action=delete-cookie&id='.$cookie->id), 'delete-cookie');
                echo '<div class="cookie" data-id="'.$cookie->id.'">
                        <div class="info">
                            <span>'.$cookie->title.'</span>
                            '.$group->name.'
                        </div>
                        <div class="actions">
                            <div class="switch-wrapper">
                                <div class="label">'.__('Activate', 'cookielay').'</div>
                                <label class="switch">
                                    <input type="checkbox" '.$checked.' '.$disabled.'>
                                    <span></span>
                                </label>
                            </div>
                            <a href="'.admin_url('admin.php?page=cookielay-cookies').'&action=edit-cookie&id='.$cookie->id.'"><i class="ti-pencil"></i></a>
                            <button data-cl-url="'.$delete_url.'" data-cl-name="'.$cookie->title.'" data-cl-action="delete" data-cl-modal="delete_cookie" '.$disabled.'>'.$tooltip.'<i class="ti-trash"></i></button>
                        </div>
                    </div>';
                if($i < $rows) {
                    echo '<hr />';
                }
                $i++;
            }
        }
    }

    private function count_cookies() {
        global $wpdb;
        $settings = $this->get_settings();
        $tablename = $wpdb->prefix . 'cookielay_cookies';
        $cookies = $wpdb->get_var("SELECT COUNT(*) FROM $tablename");
        return $cookies;
    }

    private function print_cookie_add() {
        $cookies= $this->count_cookies();
        if($cookies < 5) {
            echo '<a href="'.admin_url('admin.php?page=cookielay-cookies').'&action=add-cookie" class="cl-button primary">'.__('Add cookie', 'cookielay').'</a>';
        } else {
            echo '<a href="#" class="cl-button primary disabled"><span class="tooltip">'.__('You have reached the maximum. Upgrade now!', 'cookielay').'</span>'.__('Add cookie', 'cookielay').'</a>';
        }
    }

    private function get_groups($id = false) {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_groups';
        $groups = $wpdb->get_results("SELECT * FROM $tablename"); 
        $rows = $wpdb->num_rows;
        if($id) {
            foreach($groups as $group) {
                if($id == $group->id) {
                    echo '<option value="'.$group->id.'" selected>'.$group->name.'</option>';
                } else {
                    echo '<option value="'.$group->id.'">'.$group->name.'</option>';
                }
            }
        } else {
            echo '<option value="" disabled selected>'.__('Select group', 'cookielay').'</option>';
            foreach($groups as $group) {
                echo '<option value="'.$group->id.'">'.$group->name.'</option>';
            }
        }
    } 

    private function get_group($id) {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_groups';
        $row = $wpdb->get_row("SELECT * FROM $tablename WHERE id = $id");
        $group = array(
            "name" => $row->name,
            "description" => $row->description
        );
        return $group;
    }

    private function edit_group($id, $name, $description) {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_groups';
        $status = $wpdb->update($tablename, array("name" => $name, "description" => $description), array("id" => $id));
        return $status;
    }

    private function add_group($name, $description) {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_groups';
        $status = $wpdb->insert($tablename, array("name" => $name, "description" => $description));
        return $status;
    }

    private function delete_group($id) {
        global $wpdb;
        $status = false;
        $cookie_table = $wpdb->prefix . 'cookielay_cookies';
        $cookie = $wpdb->get_row("SELECT * FROM $cookie_table WHERE cookie_group = $id");
        if(!$cookie) {
            $group_table = $wpdb->prefix . 'cookielay_groups';
            $status = $wpdb->delete($group_table, array("id" => $id));
        }
        return $status;
    }

    private function get_cookie($id) {
        global $wpdb;
        $settings = $this->get_settings();
        $tablename = $wpdb->prefix . 'cookielay_cookies';
        $row = $wpdb->get_row("SELECT * FROM $tablename WHERE id = $id");
        $cookielay_cookie = false;
        if($settings["cookielay-cookie"] == $id) {
            $cookielay_cookie = true;
        }
        $cookie = array(
            "title" => $row->title,
            "name" => $row->name,
            "provider" => $row->provider,
            "group" => $row->cookie_group,
            "description" => $row->description,
            "lifetime" => $row->lifetime,
            "privacy" => $row->privacy,
            "imprint" => $row->imprint,
            "execute_header" => $row->execute_header,
            "allow_script" => $row->allow_script,
            "disallow_script" => $row->disallow_script,
            "cookielay_cookie" => $cookielay_cookie
        );
        return $cookie;
    }

    private function edit_cookie($id, $title, $name, $provider, $group, $description, $lifetime, $privacy, $imprint, $execute_header, $allow_script, $disallow_script) {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_cookies';
        $status = $wpdb->update($tablename, array("title" => $title, "name" => $name, "provider" => $provider, "description" => $description, "lifetime" => $lifetime, "cookie_group" => $group, "privacy" => $privacy, "imprint" => $imprint, "execute_header" => $execute_header, "allow_script" => $allow_script, "disallow_script" => $disallow_script), array("id" => $id));
        return $status;
    }

    private function add_cookie($title, $name, $provider, $group, $description, $lifetime, $privacy, $imprint, $execute_header, $allow_script, $disallow_script) {
        global $wpdb;
        $cookies= $this->count_cookies();
        $status = false;
        if($cookies < 5) {
            $tablename = $wpdb->prefix . 'cookielay_cookies';
            $status = $wpdb->insert($tablename, array("title" => $title, "name" => $name, "provider" => $provider, "description" => $description, "lifetime" => $lifetime, "cookie_group" => $group, "privacy" => $privacy, "imprint" => $imprint, "execute_header" => $execute_header, "allow_script" => $allow_script, "disallow_script" => $disallow_script));
        }
        return $status;
    }

    private function delete_cookie($id) {
        global $wpdb;
        $tablename = $wpdb->prefix . 'cookielay_cookies';
        $status = $wpdb->delete($tablename, array("id" => $id));
        return $status;
    }

    private function print_presets() {
        $presets = $this->presets->get_presets();
        foreach($presets as $preset) {
            echo '<option value="'.$preset["title"].'">'.$preset["title"].'</option>';
        }
    }

    public function get_preset() {
        if(isset($_POST["preset"])) {
            $preset_name = sanitize_text_field($_POST["preset"]);
            $preset = json_encode($this->presets->get_preset($preset_name));
            echo $preset;
        }
        wp_die();
    }

    public function actions() {
        $actions = ["group-edit", "group-add", "cookie-edit", "cookie-add", "delete-group", "delete-cookie"];
        if(isset($_POST["action"]) && in_array($_POST["action"], $actions)) {
            $action = $_POST["action"];
            switch($action) {
                case "group-edit":
                    check_admin_referer('group-edit');
                    $status = false;
                    if(!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["description"])) {
                        $id = (int) sanitize_text_field($_POST["id"]);
                        $name = sanitize_text_field($_POST["name"]);
                        $description = sanitize_textarea_field($_POST["description"]);
                        $status = $this->edit_group($id, $name, $description);
                    }
                    if($status !== false) {
                        add_settings_error('edit_group','group_edited', __('The cookie group was successfully saved.', 'cookielay'), 'success');
                    } else {
                        add_settings_error('edit_group','group_edited', __('The cookie group could not be saved.', 'cookielay'), 'error');
                    }
                    break;
                case "group-add":
                    check_admin_referer('group-add');
                    $status = false;
                    if(!empty($_POST["name"]) && !empty($_POST["description"])) {
                        $name = sanitize_text_field($_POST["name"]);
                        $description = sanitize_textarea_field($_POST["description"]);
                        $status = $this->add_group($name, $description);
                    }
                    if($status !== false) {
                        add_settings_error('add_group','group_added', __('The cookie group was added successfully.', 'cookielay'), 'success');
                    } else {
                        add_settings_error('add_group','group_added', __('The cookie group could not be added.', 'cookielay'), 'error');
                    }
                    break;
                case "cookie-edit":
                    check_admin_referer('cookie-edit');
                    $status = false;
                    if(!empty($_POST["id"]) && !empty($_POST["title"]) && !empty($_POST["name"]) && !empty($_POST["provider"]) && !empty($_POST["group"]) && !empty($_POST["description"]) && !empty($_POST["lifetime"])) {
                        $id = (int) sanitize_text_field($_POST['id']);
                        $title = sanitize_text_field($_POST["title"]);
                        $name = sanitize_text_field($_POST["name"]);
                        $provider = sanitize_text_field($_POST["provider"]);
                        $group = sanitize_text_field($_POST["group"]);
                        $description = sanitize_text_field($_POST["description"]);
                        $lifetime = sanitize_text_field($_POST["lifetime"]);
                        $privacy = isset($_POST["privacy"]) ? sanitize_text_field($_POST["privacy"]) : "";
                        $imprint = isset($_POST["imprint"]) ? sanitize_text_field($_POST["imprint"]) : "";
                        $execute_header = isset($_POST["execute_header"]) ? 1 : 0;
                        $allowed_tags = array("script" => array("async" => array(), "crossorigin" => array(), "defer" => array(), "integrity" => array(), "nomodule" => array(), "referrerpolicy" => array(), "src" => array(), "type" => array()));
                        $allow_script = isset($_POST["allow_script"]) ? wp_kses(wp_unslash($_POST["allow_script"]), $allowed_tags) : "";
                        $disallow_script = isset($_POST["disallow_script"]) ? wp_kses(wp_unslash($_POST["disallow_script"]), $allowed_tags) : "";
                        $status = $this->edit_cookie($id, $title, $name, $provider, $group, $description, $lifetime, $privacy, $imprint, $execute_header, $allow_script, $disallow_script);
                    }
                    if($status !== false) {
                        add_settings_error('add_cookie','cookie_edited', __('The cookie was successfully saved.', 'cookielay'), 'success');
                    } else {
                        add_settings_error('add_cookie','cookie_edited', __('The cookie could not be saved.', 'cookielay'), 'error');
                    }
                    break;
                case "cookie-add":
                    check_admin_referer('cookie-add');
                    $status = false;
                    if(!empty($_POST["title"]) && !empty($_POST["name"]) && !empty($_POST["provider"]) && !empty($_POST["group"]) && !empty($_POST["description"]) && !empty($_POST["lifetime"])) {
                        $title = sanitize_text_field($_POST["title"]);
                        $name = sanitize_text_field($_POST["name"]);
                        $provider = sanitize_text_field($_POST["provider"]);
                        $group = sanitize_text_field($_POST["group"]);
                        $description = sanitize_text_field($_POST["description"]);
                        $lifetime = sanitize_text_field($_POST["lifetime"]);
                        $privacy = isset($_POST["privacy"]) ? sanitize_text_field($_POST["privacy"]) : "";
                        $imprint = isset($_POST["imprint"]) ? sanitize_text_field($_POST["imprint"]) : "";
                        $execute_header = isset($_POST["execute_header"]) ? 1 : 0;
                        $allowed_tags = array("script" => array("async" => array(), "crossorigin" => array(), "defer" => array(), "integrity" => array(), "nomodule" => array(), "referrerpolicy" => array(), "src" => array(), "type" => array()));
                        $allow_script = isset($_POST["allow_script"]) ? wp_kses(wp_unslash($_POST["allow_script"]), $allowed_tags) : "";
                        $disallow_script = isset($_POST["disallow_script"]) ? wp_kses(wp_unslash($_POST["disallow_script"]), $allowed_tags) : "";
                        $status = $this->add_cookie($title, $name, $provider, $group, $description, $lifetime, $privacy, $imprint, $execute_header, $allow_script, $disallow_script);
                    }
                    if($status !== false) {
                        add_settings_error('edit_cookie','cookie_added', __('The cookie was added successfully.', 'cookielay'), 'success');
                    } else {
                        add_settings_error('edit_cookie','cookie_added', __('The cookie could not be added.', 'cookielay'), 'error');
                    }
                    break;
            }
        }
        if(isset($_GET["action"]) && in_array($_GET["action"], $actions)) {
            $action = $_GET["action"];
            switch($action) {
                case 'delete-group':
                    check_admin_referer('delete-group');
                    $status = false;
                    if(!empty($_GET["id"])) {
                        $id = (int) sanitize_text_field($_GET["id"]);
                        $status = $this->delete_group($id);
                    }
                    if($status !== false) {
                        add_settings_error('delete_group','group_deleted', __('The cookie group was successfully deleted.', 'cookielay'), 'success');
                    } else {
                        add_settings_error('delete_group','group_deleted', __('The cookie group could not be deleted.', 'cookielay'), 'error');
                    }
                    break;
                case 'delete-cookie':
                    check_admin_referer('delete-cookie');
                    $status = false;
                    if(!empty($_GET["id"])) {
                        $id = (int) sanitize_text_field($_GET["id"]);
                        $status = $this->delete_cookie($id);
                    }
                    if($status !== false) {
                        add_settings_error('delete_cookie','cookie_deleted', __('The cookie was successfully deleted.', 'cookielay'), 'success');
                    } else {
                        add_settings_error('delete_cookie','cookie_deleted', __('The cookie could not be deleted.', 'cookielay'), 'error');
                    }
                    break;
            }
        }
    }
}

?>