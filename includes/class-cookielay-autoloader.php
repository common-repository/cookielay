<?php
/**
 * Cookielay Autoloader Class
 * 
 * Loads all classes.
 * 
 * @package cookielay
 * @subpackage cookielay/includes
 */

class Cookielay_Autoloader {

    public function __construct() {
        $this->register();
    }

    private function register() {
        spl_autoload_register(array($this, 'loadMain'));
        spl_autoload_register(array($this, 'loadFrontend'));
        spl_autoload_register(array($this, 'loadBackend'));
    }

    private function fileValid($file) {
        if(file_exists($file)) {
            return true;
        } else {
            return false;
        }
    }

    public function loadMain($class) {
        $file = plugin_dir_path(__FILE__) . 'class-'.strtolower(str_replace("_", "-", $class.'.php'));
        if($this->fileValid($file)) {
            include $file;
        }
    }

    public function loadFrontend($class) {
        $file = plugin_dir_path(__FILE__) . 'public/class-'.strtolower(str_replace("_", "-", $class.'.php'));
        if($this->fileValid($file)) {
            include $file;
        }
    }

    public function loadBackend($class) {
        $file = plugin_dir_path(__FILE__) . 'admin/class-'.strtolower(str_replace("_", "-", $class.'.php'));
        if($this->fileValid($file)) {
            include $file;
        }
    }
}

?>